<?php

namespace App\Http\Controllers;

use App\Helpers\CurrencyHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    // register
    public function Register(){

        return view('users.auth.register',[
            'captcha' => rand(1000,9999),
            'ref' => request('ref') ?? '',
            'page' => 'register'
        ]);
    }
    // login
    public function Login(){

        return view('users.auth.login',[
            'page' => 'login'
        ]);
    }
   
    // dashboard
    public function Dashboard(){
        $regular_packages=DB::table('packages')->where('available','>','0')->where('vip_level','regular')->orderBy('cost','asc')->get();
        $vip_packages=DB::table('packages')->where('available','>','0')->whereNot('vip_level','regular')->orderBy('cost','asc')->get();
        return view('users.dashboard',[
            'total_balance' => CurrencyHelper::format(Auth::guard('users')->user()->main_balance + Auth::guard('users')->user()->deposit_balance,'NGN',DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->display_currency),
            'main_balance' => CurrencyHelper::format(Auth::guard('users')->user()->main_balance,'NGN',DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->display_currency),
            'deposit_balance' => CurrencyHelper::format(Auth::guard('users')->user()->deposit_balance,'NGN',DB::table('users')->where('id',Auth::guard('users')->user()->id)->first()->display_currency),
            'regular_packages' => $regular_packages,
            'vip_packages' => $vip_packages,
            'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->value ?? '{}'),
            'social_settings' => json_decode(DB::table('settings')->where('key','social_settings')->first()->value ?? '{}'),
            'finance_settings' => json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}'),
            'active_plans' => DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
            'total_earnings' => DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->sum('package->earning'),
            'total_referrals' => DB::table('users')->where('ref',Auth::guard('users')->user()->id)->count(),
            'total_withdrawn' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','withdrawal')->where('status','success')->sum('amount'),
            'checked_in' => DB::table('transactions')->where('type','daily_check_in')->where('user_id',Auth::guard('users')->user()->id)->whereDate('date',Carbon::today())->exists()
        ]);
    }

    // active products
    public function ActiveProducts(){
        $total=DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id);
        $income=DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->where('cycle','>','0');
        $active_packages=DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->where('cycle','>','0');
        $completed_packages=DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','completed');
        $total=$total->count();
        $income=$income->sum('package->earning');
        $active_packages=$active_packages->orderBy('date','desc')->paginate(50);
        $active_packages->getCollection()->transform(function($each){
            $each->package=json_decode($each->package);
            $each->next=Carbon::parse($each->updated)->addDay()->format(' h:i').(Carbon::parse($each->updated)->format('H') >= 12 ? ' PM' : ' AM');
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->nextIncome=max(0,now()->diffInSeconds(Carbon::parse($each->updated)->addDay(),false));
            return $each;
        });
         $completed_packages=$completed_packages->orderBy('date','desc')->paginate(50);
        $completed_packages->getCollection()->transform(function($each){
            $each->package=json_decode($each->package);
            $each->next=Carbon::parse($each->updated)->addDay()->format(' h:i').(Carbon::parse($each->updated)->format('H') >= 12 ? ' PM' : ' AM');
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            $each->nextIncome=max(0,now()->diffInSeconds(Carbon::parse($each->updated)->addDay(),false));
            return $each;
        });
        return view('users.products.active',[
            'total' => $total,
            'income' => $income,
            'active_packages' => $active_packages,
            'completed_packages' => $completed_packages,
            'total_assets' => DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->count(),
            'active_assets' => DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','active')->count(),
            'completed_assets' => DB::table('purchased_packages')->where('user_id',Auth::guard('users')->user()->id)->where('status','completed')->count()
        ]);
    }

    // profile
    public function Profile(){
        return view('users.profile');
    }

    // transactions
    public function Transactions(){
        $total=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id);
        $trx=DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id);
        $trx=$trx->orderBy('date','desc')->paginate(10);
        $trx->getCollection()->transform(function($each){
            $each->frame=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        $total=$total->count();
        return view('users.transactions',[
            'total' => $total,
            'trx' => $trx
        ]);
    }

    // withdraw
    public function Withdraw(){
        $finance_settings=json_decode(DB::table('settings')->where('key','finance_settings')->first()->value ?? '{}');
        return view('users.withdraw',[
            'finance_settings' => $finance_settings
        ]);
    }

    // add bank
    public function AddBank(){
      
        $banks=file_get_contents(database_path('data/banks.json'));
        $banks=json_decode($banks);
        $banks=collect($banks)->sortBy('name')->all();
     
        return view('users.bank',[
            'banks' => $banks,
            'next' => request('next') ?? null
        ]);
    }

    // password update
    public function PasswordUpdate(){
        return view('users.settings.password');
    }

    // logout
    public function Logout(){
        Auth::guard('users')->logout();
        return redirect('users/login');
    }

    // invite
    public function Invite(){
        return view('users.invite',[
            'total_referrals' => DB::table('users')->where('ref',Auth::guard('users')->user()->id)->count(),
            'total_reward' => DB::table('transactions')->where('user_id',Auth::guard('users')->user()->id)->where('type','referral_commission')->sum('amount'),
            'referral_settings' => json_decode(DB::table('settings')->where('key','referral_settings')->first()->value ?? '{}')
        ]);
    }

    // redeem gift code
    public function RedeemGiftCode(){
        return view('users.giftcode');
    }

    // recharge
    public function Recharge(){
        $gateways=collect((array) json_decode(file_get_contents(database_path('data/gateways.json')))->deposit)
    ->filter(fn ($status) => $status === 'active');
        return view('users.recharge.general',[
            'gateways' => $gateways,
            'packages' => DB::table('packages')->where('status','active')->orderBy('cost','asc')->limit(9)->get()
        ]);
    }

    // referrals
    public function Referrals(){
        $referrals=DB::table('users')->where('ref',Auth::guard('users')->user()->id)->orderBy('date','desc')->paginate(10);
        $referrals->getCollection()->transform(function($each){
            $each->products=DB::table('purchased_packages')->where('user_id',$each->id)->count();
            $each->commission=DB::table('transactions')->where('type','referral_commission')->where('user_id',$each->id)->where('status','success')->sum('amount');
            $each->date=Carbon::parse($each->date)->diffForHumans();
            return $each;
        });
        return view('users.referrals',[
            'referrals' => $referrals,
            'team_size' => DB::table('users')->where('ref',Auth::guard('users')->user()->id)->count()
        ]);
    }

    // salary
    public function Salary(){
        $salary=DB::table('salary')->orderBy('referrals','asc')->limit(50)->get();
        $salary->transform(function($each){
            $each->earned=DB::table('salaries')->where('user_id',Auth::guard('users')->user()->id)->where('salary->id',$each->id)->exists() ? 1 : 0;
            return $each;
        });
       
        return view('users.salary',[
            'salary' => $salary,
            'ref' => DB::table('users')->where('ref',Auth::guard('users')->user()->id)->whereIn('id',function($q){
                $q->select('user_id')->from('purchased_packages')->distinct();
            })->count(),
        ]);
    }

      // manual deposit checkout
    public function ManualDepositCheckout(){
        $validator=Validator::make(request()->all(),[
            'id' => 'required|regex:/^[0-9]+$/|exists:transactions,id,status,initiated'
        ]);
        if($validator->fails()){
           return redirect('users/recharge');
        }
        return view('users.recharge.checkout',[
            'id' => request('id'),
            'trx' => DB::table('transactions')->where('id',request('id'))->first(),
            'bank_settings' => json_decode(DB::table('settings')->where('key','bank_settings')->first()->value ?? '{}'),
        ]);
    }

    // exchange
    public function Exchange(){
        return view('users.exchange');
    }

    
}
