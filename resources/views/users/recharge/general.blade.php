@extends('layout.users.app')
@section('title')
    Recharge
@endsection
 @section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">Recharge</span>
        <span></span>

    </div>
@endsection
@section('main')

    <section class="w-full column g-10px">
           
           
            <div class="w-full border-width-1px border-style-solid border-color-primary-05 bg-black-transparent max-w-500 m-x-auto br-15px p-20 column g-10">
                <span class="opacity-07">Deposit balance:</span>
                <strong class="desc c-primary-lighter font-weight-900">{{ $CurrencyHelper::format(Auth::guard('users')->user()->deposit_balance,'NGN',$display_currency) }}</strong>
            </div>
            {{-- new --}}
            <form x-data="{ 
                Amount : '',
                Channel : '{{ $gateways->keys()->first() }}'
             }" x-on:submit.prevent="
             PostRequest(event,$el,function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    window.location.href=data.url;
                }
             })" action="{{ url('users/post/deposit/initiate/process') }}" method="POST" class="box-shadow bg-black-transparent border-width-1px border-style-solid border-color-primary-05 w-full column br-15px g-5px p-15px max-w-500 m-x-auto column g-10px">
                {{-- csrf token --}}
                <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
                <input type="hidden" class="inp input" name="channel" x-bind:value="Channel">
                {{-- new --}}
            <span>Select Channel</span>
          {{-- new --}}
           @if ($gateways->isEmpty())
               <div class="w-full border-color-gold bg-gold-transparent no-select transition-all pc-pointer g-10px row align-center p-20px max-w-500px br-10px m-x-auto border-width-1px border-style-solid">
             <span>No Channel Available, kindly contact customer support</span>
            </div>
           @else
               @foreach ($gateways as $key => $data)
                    <div x-on:click="Channel = '{{ $key }}'" x-bind:style="Channel == '{{ $key }}' ? {
                        'border' : '1px solid rgb(0,255,0)',
                        'color' : 'rgb(0,255,0)',
                        'background' : 'rgb(0,255,0,0.1)'
                    } : {
                        'border' : '1px solid var(--primary-05)',
                        'color' : 'var(--primary-lighter)',
                        'background' : 'var(--primary-01)'
                    }" class="w-full no-select transition-all pc-pointer g-10px row align-center p-15px max-w-500px br-10px m-x-auto border-width-1px border-style-solid">
              
                <div class="row align-center m-right-auto g-10px">
                    <span>Channel {{ $loop->iteration }}</span>
                </div>
                <i x-show="Channel == '{{ $key }}'" style="color:rgb(0,255,0)">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
  <g fill="currentColor">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 2C11.8497 2 2 11.8497 2 24C2 36.1503 11.8497 46 24 46C36.1503 46 46 36.1503 46 24C46 11.8497 36.1503 2 24 2ZM20.1078 34.2289L36.1117 14.7957L33.7959 12.8885L19.8926 29.7711L14.0002 23.8787L11.8789 26L20.1078 34.2289Z" fill="currentColor"></path>
  </g>
</svg>

                </i>
            </div>
            
               @endforeach
           @endif
         
                {{-- new input --}}
                <div class="w-full m-top-20px column g-5px">
                    <label>Pay Amount</label>
                    <div class="cont">
                        <span class="h-full perfect-square row align-center justify-center font-size-1rem font-weight-900 no-select c-primary no-shrink">{{ $CurrencyHelper::symbol($display_currency) }}</span>
                        <input name="amount" x-bind:value="Amount" type="number" placeholder="Enter Amount" inputmode="numeric" class="inp input required">
                    </div>
                </div>
                {{-- new --}}
                <div class="row opacity-08 align-center w-full g-10px">
                    <span class="opacity-07">Minimum:</span>
                    <span class="font-weight-700">
                       {{ $CurrencyHelper::format($packages[0]->cost,'NGN',$display_currency) }}
                    </span>
                </div>
              
              
              
                {{-- post btn --}}
               <button style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);height:40px;" class="post">Pay</button>
            </form>
           

            
    </section>
@endsection