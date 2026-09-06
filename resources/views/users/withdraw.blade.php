@extends('layout.users.app')
@section('title')
    Withdraw
@endsection
@section('css')
     <style class="css">
        @font-face{
            font-family: 'share tech';
            src: url('{{asset('vitecss/fonts/ShareTechMono-Regular.ttf')}}');
        }
    </style>
@endsection
    @section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">Withdraw</span>
        <span></span>

    </div>
@endsection
@section('main')
     <section class="w-full g-10px column">
       
          <section class="column w-full g-10px">
           <div class="w-full no-select column g-10px br-15px p-15px bg-black-transparent border-width-1px border-style-solid border-color-primary">
            <div class="w-fit br-1000px font-weight-900 p-5px p-x-20px bg-secondary secondary-text">
                1 WTT = &#8358;1
            </div>
            <div class="w-full space-between row align-center g-10px">
                {{-- new column --}}
                <div class="column">
                    <span class="opacity-07">WTT Balance</span>
                    <strong class="desc font-weight-900">
                        &#8361;{{ number_format(Auth::guard('users')->user()->main_balance) }}
                    </strong>
                </div>
                <img src="{{ asset('photos/IMG_1419.png') }}" alt="" class="w-70px">
            </div>
        </div>
        </section>
        {{-- new section /body --}}
        <section x-data="{ 
            ToReceive : 0,
            Amount : 0,
            Fee : {{ $finance_settings->withdrawal->fee }}
         }" x-init="
         $watch('Amount', (value) => {
            if(value >= 0){
                ToReceive = Amount - (Fee/100)*Amount;
            }
         })
         " class="section column g-10px body">
            <form x-on:submit="PostRequest(event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url('users/transactions') }}');
            }
        })" method="POST" action="{{ url('users/post/withdraw/process') }}" class="box-shadow bg-black-transparent border-width-1px border-style-solid border-color-primary-05 w-full column br-15px g-5px p-15px max-w-500 m-x-auto column g-5">
                {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
               {{-- new input --}}
                <div class="column g-10 w-full">
                 <label>Withdrawal Amount</label>
                <div class="cont">
                    <strong class="font-1 h-full  row perfect-square align-center justify-center g-10 no-shrink">&#8361;</strong>
                    <input x-on:focus="$el.value == 0 ? $el.value='' : ''" x-model="Amount" name="amount" data-fee="{{ $finance_settings->withdrawal->fee }}" oninput="CalculateToReceive(this)" placeholder="0.00" inputmode="numeric" type="number" class="inp input required">
                </div>
               </div>
               
               {{-- new --}}
               <div class="w-full column g-5px border-width-1px border-style-solid border-color-primary-05 br-inherit p-15px">
                <strong class="font-size-1rem m-bottom-5px block font-weight-900">
                    Transaction Details
                </strong>
                {{-- new row --}}
                <div class="row align-center w-full space-between g-10px">
                    <span class="opacity-07">You will receive:</span>
                    <span class="font-weight-700">
                         &#8358;<span x-ref="ToReceive" x-text="ToReceive"></span>

                    </span>
                </div>
                 {{-- new row --}}
                <div class="row align-center w-full space-between g-10px">
                    <span class="opacity-07">Service Fee:</span>
                    <span class="font-weight-700">
                        <span>{{ $finance_settings->withdrawal->fee }}%</span>

                    </span>
                </div>
                 {{-- new row --}}
                <div class="row align-center w-full space-between g-10px">
                    <span class="opacity-07">Processing Time:</span>
                    <span class="font-weight-700">
                        1 - 5 Hours
                    </span>
                </div>
                 {{-- new row --}}
                <div class="row align-center w-full space-between g-10px">
                    <span class="opacity-07">Minimum Withdrawal:</span>
                    <span class="font-weight-700">
                       &#8361;{{ number_format($finance_settings->withdrawal->minimum) }}
                    </span>
                </div>
                {{-- new row --}}
                <div class="row align-center w-full space-between g-10px">
                    <span class="opacity-07">Daily Limit:</span>
                    <span class="font-weight-700">
                       {{ number_format($finance_settings->withdrawal->daily) }} {{ $finance_settings->withdrawal->daily > 1 ? 'Withdrawals' : 'Withdrawal' }} per day
                    </span>
                </div>
               </div>
              @isset (Auth::guard('users')->user()->bank)
                  
               @if ($finance_settings->withdrawal->portal == 'off')
                  <div style="background:linear-gradient(to bottom,coral,red);border:1px solid coral;" class="g-5 m-top-10 w-full h-40px br-10px row align-center justify-center no-select no-pointer">
                 Withdrawal Unavailable at the moment  
                </div>
                 <div class="w-full font-size-07 text-center br-10px bg-primary-01 c-primary-lighter border-width-1px border-style-dashed border-color-primary-05 p-10px">
                  Withdrawal unavailable at the moment, please check back later  
                </div>  
               @else
               <button style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);height:40px;" class="post">Withdraw</button>
                 <div class="w-full br-10px font-size-07 text-align-center bg-primary-01 c-primary-lighter border-width-1px border-style-dashed border-color-primary-05 p-10px">
                  Important: Please verify the target account details before confirming the transaction.  
                </div>  
               @endif
              @else
                  <div onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" style="background:linear-gradient(to bottom,#ffd700,#4e4300);border:1px solid #ffd700;" class="g-5 text-center p-5 m-top-10 w-full h-40px br-10px row align-center justify-center no-select pointer">

                   Add Bank
                </div> 
              @endisset
            </form>
          {{-- group --}}
          <section class="group w-full column g-10">
              {{-- new div --}}
            <div class="column border-width-1px border-style-solid border-color-primary-05 w-full box-shadow bg-black-transparent br-15px g-10px p-15px">
           
          @isset(Auth::guard('users')->user()->bank)

           
             <div class="w-full bg-primary-02 pos-relative overflow-hidden column g-5px box-shadow border-width-1px border-style-solid border-color-primary max-w-500 m-x-auto br-15px p-15px column g-10">
              
                <div class="column z-index-300 pos-relative w-full g-5px">
                  <div class="column w-full">
                      <small class="opacity-07">Account Number</small>
                    <span class="desc">{{ json_decode(Auth::guard('users')->user()->bank)->account_number }}</span>
               
                  </div>
                  <div class="column w-full">
                      <small class="opacity-07">Account Name</small>
                 
               <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->account_name }}</span>
                  </div>
                  <div class="column w-full">
                      <small class="opacity-07">Bank</small>
                 
               <span class="uppercase">{{ json_decode(Auth::guard('users')->user()->bank)->bank_name }}</span>
                  </div>
                    <span x-on:touchstart="$el.classList.add('bg-white','c-primary')" x-on:touchend="$el.classList.remove('bg-white','c-primary')" x-on:click="Vitecss.navigate('{{ url('users/bank?next=withdrawal') }}')" class="p-3px p-x-5px transition-all br-4px no-select pointer row c-primary-lighter align-center g-2px m-left-auto">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M16.7574 2.99678L14.7574 4.99678H5V18.9968H19V9.23943L21 7.23943V19.9968C21 20.5491 20.5523 20.9968 20 20.9968H4C3.44772 20.9968 3 20.5491 3 19.9968V3.99678C3 3.4445 3.44772 2.99678 4 2.99678H16.7574ZM20.4853 2.09729L21.8995 3.5115L12.7071 12.7039L11.2954 12.7064L11.2929 11.2897L20.4853 2.09729Z"></path></svg>

            Edit Bank</span>
               </div>
            </div>
             @else 
             <strong class="font-size-1rem text-align-center font-weight-900 c-primary-lighter">Target Account Required</strong>
             <span class="text-center m-bottom-10px block">You have not added a target account yet, please add a target account before placing withdrawals.</span>
              <button style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);height:40px !important;" onclick="Redirect('{{ url('users/bank?next=withdrawal') }}')" class="btn-primary h-50px br-10px clip-5 w-full">Click to bind bank</button>
         
             @endisset
            </div>

           
          </section>

            
        </section>
    </section>
@endsection
