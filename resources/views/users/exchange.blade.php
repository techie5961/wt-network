@extends('layout.users.app')
@section('title')
    Convert 
@endsection
@section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">Exchange to WTT</span>
        <span></span>

    </div>
@endsection
@section('main')
    <section x-data="{ 
        Overlay : false
     }" x-init="$watch('Overlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
        }else{
            document.body.classList.remove('overflow-hidden');

        }
     })" class="w-full column g-10px">
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
        <div class="w-full br-10px column bg-rgt-01 p-15px">
            <strong class="font-size-1rem font-weight-900">What is WTT?</strong>
        <span class="column w-full">
<br>
WTT (WT Token) is the currency used within WT Network to purchase assets and manage investment returns.

<span class="m-y-5px c-primary-lighter font-weight-800">
    1 WTT = ₦1.
</span>
Simply convert your Naira balance to WTT, use your WTT to purchase assets, and when your investment matures, your returns are credited back to your WTT balance for withdrawal or reinvestment.

        </span>
        </div>
        <button x-on:click="Overlay = true" style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text);" class="w-full m-top-20px p-10px br-10px">
            Convert
        </button>

        {{-- overlay --}}
        <section x-data="{ 
            Amount : ''
         }" x-show="Overlay" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed backdrop-blur-2px transition-all inset-0 bg-black-transparent z-index-4000 column p-5px align-center justify-end">
            <form x-on:click.outside="Overlay = false" x-show="Overlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" x-on:submit="PostRequest($event,$el,function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Vitecss.navigate('{{ url()->current() }}')
                }
            })" action="{{ url('users/post/exchange/to/wtt/process') }}" method="POST" class="w-full transition-all p-top-10px br-15px border-width-1px border-style-solid g-10px bg border-color-primary column p-15px max-w-500px">
            <div class="h-5px w-50px br-1000px bg-rgt-01 m-x-auto"></div>
            <strong class="font-size-1rem font-weight-900">Convert to WTT</strong>
            <div class="w-full column p-15px br-10px bg-primary-01 border-width-1px border-style-solid border-color-primary-05">
                <span>Total Balance</span>
                <strong class="desc font-weight-900">&#8358;{{ number_format(Auth::guard('users')->user()->deposit_balance,2) }}</strong>
            </div>
            {{-- csrf token --}}
            <input value="{{ @csrf_token() }}" type="hidden" class="inp input required" name="_token">
            {{-- new input --}}
           <div class="w-full column g-5px">
            <label>Enter the amount to convert</label>
             <div class="cont">
                <input x-model="Amount" placeholder="0" name="amount" type="number" inputmode="numeric" class="inp input required">
                <div x-on:click.prevent="Amount = '{{ Auth::guard('users')->user()->deposit_balance }}'" style="height:calc(100% - 10px);margin:5px;border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text);" class="h-full font-size-07rem font-weight-900 no-select w-fit ws-nowrap p-5px row align-center justify-center br-5px">MAX</div>

            </div>
            <div style="background:rgba(0,255,0,0.1);color:rgb(0,255,0)" class="p-5px no-select font-weight-900 p-x-20px w-fit font-size-07rem br-1000px">
                &#8358;1 give you 1 WTT
            </div>
           </div>
           <button style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text);" class="post">Convert to WTT</button>
        </form>
        </section>
    </section>
@endsection