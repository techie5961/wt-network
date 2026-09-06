@extends('layout.users.app')
@section('title')
    Dashboard
@endsection
@section('css')
    <style class="css">
      
          
main{
  padding-top:0;
}

    </style>
@endsection
@section('header')
  <div class="w-full row p-15px align-center g-10px space-between">
{{-- new row --}}
<div class="row align-center g-5px">
  <img src="{{ asset('photos/users/2F159F55-31FA-42FD-BE93-E25D93B0BACA-compressed.jpeg') }}" alt="" class="h-40px w-40px circle no-select no-pointer">
<div x-data="{ 
  Copied : false
 }" class="row g-5px">
  <div class="column">
    <strong class="font-size-1rem font-weight-900 c-primary-lighter">{{ Auth::guard('users')->user()->phone }}</strong>
    <div class="row g-5px">
      <strong>{{ Auth::guard('users')->user()->uniqid }}</strong>
      <svg x-on:click="
  Copied = true;
  copy('{{ Auth::guard('users')->user()->uniqid }}');
  setTimeout(() => {
    Copied = false
  }, 2000);
  " x-show="!Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
<svg x-show="Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

    </div>
  </div>
  
</div>
</div>
{{-- new row --}}
<div x-data="{ 
  Height : 0
 }" class="row align-center g-10px">
  {{-- new --}}
  <div x-init="
 Height = $el.offsetHeight + 'px';
  " style="box-shadow:inset 0 0 10px var(--primary);color:var(--primary-lighter)" class="row align-center g-5px br-5px font-size-07 p-5px p-x-10px border-width-1px border-style-solid border-color-primary-light">
   <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M20.2578 15.2578L23 14.0114V12.9886L20.2578 11.7422L19.0114 9H17.9886L16.7422 11.7422L14 12.9886L14 14.0114L16.7422 15.2578L17.9886 18H18.5H19.0114L20.2578 15.2578Z" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M20.2578 15.2578L23 14.0114V12.9886L20.2578 11.7422L19.0114 9H17.9886L16.7422 11.7422L14 12.9886L14 14.0114L16.7422 15.2578L17.9886 18H18.5H19.0114L20.2578 15.2578Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M20.2578 15.2578L23 14.0114V12.9886L20.2578 11.7422L19.0114 9H17.9886L16.7422 11.7422L14 12.9886L14 14.0114L16.7422 15.2578L17.9886 18H18.5H19.0114L20.2578 15.2578Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M20.2578 15.2578L23 14.0114V12.9886L20.2578 11.7422L19.0114 9H17.9886L16.7422 11.7422L14 12.9886L14 14.0114L16.7422 15.2578L17.9886 18H18.5H19.0114L20.2578 15.2578Z" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M18.832 2.44531L21.2021 6H18.7988L17.4648 4H6.53516L3.24609 8.93262L12 19.4365L14.167 16.8369L15.0859 18.8584L12.7686 21.6406L12 22.5625L11.2314 21.6406L1.23145 9.64062L0.753906 9.06641L5.46484 2H18.5352L18.832 2.44531Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M2.52344 20.4766L1 19.7841V19.2159L2.52344 18.5234L3.21591 17H3.78409L4.47656 18.5234L6 19.2159L6 19.7841L4.47656 20.4766L3.78409 22H3.5H3.21591L2.52344 20.4766Z" fill="currentColor" data-stroke="none" stroke="none"></path> <path d="M2.52344 20.4766L1 19.7841V19.2159L2.52344 18.5234L3.21591 17H3.78409L4.47656 18.5234L6 19.2159L6 19.7841L4.47656 20.4766L3.78409 22H3.5H3.21591L2.52344 20.4766Z" fill="currentColor" fill-opacity="0.2" data-stroke="none" stroke="none"></path> <path d="M2.52344 20.4766L1 19.7841V19.2159L2.52344 18.5234L3.21591 17H3.78409L4.47656 18.5234L6 19.2159L6 19.7841L4.47656 20.4766L3.78409 22H3.5H3.21591L2.52344 20.4766Z" fill="currentColor" fill-opacity="0.2" data-stroke="none" stroke="none"></path> <path d="M2.52344 20.4766L1 19.7841V19.2159L2.52344 18.5234L3.21591 17H3.78409L4.47656 18.5234L6 19.2159L6 19.7841L4.47656 20.4766L3.78409 22H3.5H3.21591L2.52344 20.4766Z" fill="currentColor" fill-opacity="0.2" data-stroke="none" stroke="none"></path> <path d="M9 8L9.00707 8.00707" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 8L9.00707 8.00707" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 8L9.00707 8.00707" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M9 8L9.00707 8.00707" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
   Regular
  </div>
  {{-- new --}}
 <div id="Support">

 </div>
</div>
  </div>
@endsection
@section('main')

    <section x-data="{ 
        Overlay : false,
        Package : {
            ID : '',
            Name : '',
            Cost : '',
            DailyIncome : '',
            Cycle : '',
            TotalIncome : '',
           
        },
         Populate : false,
         Support : false,
         AllMenu : false
     }" x-init="
    //  document.body.classList.add('overflow-hidden');
    $watch('Support', (value) => {
      if(value){
        document.body.classList.add('overflow-hidden');
      }else{
        document.body.classList.remove('overflow-hidden');
      }
    })
     $watch('Overlay', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden');
        }else{
            document.body.classList.remove('overflow-hidden');


        }
     });
     $watch('Populate', (value) => {
        if(value){
            document.body.classList.add('overflow-hidden')
        }else{
            document.body.classList.remove('overflow-hidden')

        }
     });
     $watch('AllMenu', (value) => {
      if(value){
        document.body.classList.add('overflow-hidden');
      }else{
         document.body.classList.remove('overflow-hidden');
      }
     })
     " class="w-full column">
     <template x-teleport="#Support">
 <div x-on:click="Support = true;" x-bind:style="{
    'height' : Height,
    'width' : Height
  }" class="p-5px h-full column align-center justify-center border-width-1px border-style-solid no-shrink c-primary-lighter border-color-primary-light br-7px">
<svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 18 18">
  <title>headset</title>
  <g fill="currentColor">
    <path d="M10.709,17h-1.959c-.414,0-.75-.336-.75-.75s.336-.75,.75-.75h1.959c.586,0,1.087-.399,1.219-.971l.343-1.451c.095-.403,.498-.65,.902-.558,.402,.095,.652,.5,.557,.902l-.342,1.447c-.287,1.253-1.39,2.131-2.679,2.131Z" fill="currentColor"></path>
    <path d="M14.137,14h-1.137c-.227,0-.441-.103-.584-.279-.143-.176-.197-.408-.149-.629l1.084-5c.104-.422,.149-.762,.149-1.091,0-2.481-2.019-4.5-4.5-4.5s-4.5,2.019-4.5,4.5c0,.329,.046,.669,.145,1.071l1.089,5.02c.048,.222-.007,.453-.149,.629-.143,.177-.357,.279-.584,.279h-1.137c-1.285,0-2.416-.912-2.688-2.167l-.335-1.545c-.265-1.224,.332-2.473,1.449-3.037l.712-.359c.059-3.258,2.727-5.891,5.999-5.891s5.94,2.633,5.999,5.891l.712,.359c1.117,.564,1.714,1.813,1.449,3.037l-.335,1.545c-.272,1.256-1.403,2.167-2.688,2.167Z" fill="currentColor"></path>
  </g>
</svg>

  </div>
     </template>

{{-- populate --}}
        <section x-show="Populate" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all column align-center justify-center p-20px inset-0 z-index-4000 bg-black-transparent">
          <div x-on:click.outside="Populate= false" style="width:90%;" class="w-full max-w-500px border-width-1px border-style-solid border-color-primary-05 br-15px p-15px bg-black column c-white align-center g-10px">
            <img style="width:30%;" src="{{ asset(config('settings.logo')) }}" alt="" class="max-w-500px no-select no-pointer">
            <p>
              <strong class="desc font-weight-900">🎉 Welcome to VEXA_el!</strong>
<br> <br>
Congratulations! Your account has been created successfully. 🥳
<br> <br>
You’ve officially joined VEXA_el. As a new member, you would receive a ₦1,100 Welcome Bonus after buying your first plan 🎁
<br> <br>
💰 Minimum Withdrawal: ₦1,000 <br>
🤝 Referral Commission: Up to 20% <br>
📈 VIP Plans: From ₦3,500
<br>  <br>
Explore your dashboard, check out our VIP plans, and start your VEXA_el journey today.
<br>
🚀 Welcome aboard — let’s grow together!
            </p>
            {{-- new row --}}
            <div class="row w-full g-10px align-center space-between">
              <button x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" style="background:linear-gradient(to bottom,#25d366,#188d43);border:1px solid #25d366;" class="btn-whatsapp ws-nowrap row align-center justify-center p-10px br-10px w-full">
                
                Join Whatsapp
              </button>
               <button x-on:click="window.open('{{ $social_settings->telegram_community }}')" style="background:linear-gradient(to bottom,#2563dd,#102a5f);border:1px solid #2563dd;" class="btn-telegram p-10px br-10px w-full">
                Join Telegram
              </button>
            </div>
          </div>
        </section>

       {{-- support --}}
        <section x-show="Support" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all column align-center justify-center p-20px inset-0 z-index-4000 bg-black-transparent">
          <div x-on:click.outside="Support= false" style="width:90%;" class="w-full max-w-500px border-width-1px border-style-solid border-color-primary-05 br-15px p-15px bg-black column c-white align-center g-10px">
            <strong class="font-size-1rem font-weight-900">Support Channels</strong>
          @if ($social_settings->whatsapp_number != '')
               {{-- new column --}}
            <div class="w-full column">
              <small class="opacity-07">Whatsapp Number</small>
             <div class="w-full row align-center g-10px space-between">
               <strong class="font-weight-800 text-overflow-ellipsis ws-nowrap">{{ $social_settings->whatsapp_number }}</strong>
            <button x-on:click="window.open('https://wa.me/{{ '+234'.ltrim($social_settings->whatsapp_number,'0') }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="p-5px p-x-10px font-size-07 ws-nowrap br-1000px">
Chat
            </button>
             </div>
            </div>
          @endif
          @if ($social_settings->telegram_username != '')
               {{-- new column --}}
            <div class="w-full column">
              <small class="opacity-07">Telegram Username</small>
             <div class="w-full row align-center g-10px space-between">
               <strong class="font-weight-800 text-overflow-ellipsis ws-nowrap">{{ $social_settings->telegram_username }}</strong>
            <button x-on:click="window.open('https://t.me/{{ $social_settings->telegram_username }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="p-5px p-x-10px font-size-07 ws-nowrap br-1000px">
Chat
            </button>
             </div>
            </div>
          @endif
          @if ($social_settings->whatsapp_community != '')
               {{-- new column --}}
            <div class="w-full column">
              <small class="opacity-07">Whatsapp Group Link</small>
             <div class="w-full row align-center g-10px space-between">
               <strong class="font-weight-800 text-overflow-ellipsis ws-nowrap">{{ $social_settings->whatsapp_community }}</strong>
            <button x-on:click="window.open('{{ $social_settings->whatsapp_community }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="p-5px p-x-10px font-size-07 ws-nowrap br-1000px">
Join
            </button>
             </div>
            </div>
          @endif
          @if ($social_settings->telegram_community != '')
               {{-- new column --}}
            <div class="w-full column">
              <small class="opacity-07">Telegram Community</small>
             <div class="w-full row align-center g-10px space-between">
               <strong class="font-weight-800 text-overflow-ellipsis ws-nowrap">{{ $social_settings->telegram_community }}</strong>
            <button x-on:click="window.open('{{ $social_settings->telegram_community }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="p-5px p-x-10px font-size-07 ws-nowrap br-1000px">
Join
            </button>
             </div>
            </div>
          @endif
          </div>
        </section>
     {{-- chest box --}}
     <img x-bind:style="{
      'bottom' : document.querySelector('footer').offsetHeight + 10 + 'px'
     }" src="{{ asset('photos/IMG_1104.png') }}" alt="" x-on:click="Vitecss.navigate('{{ url('users/gift/code') }}')" class="pos-fixed h-50px z-index-3000 no-select right-10px">
   
     {{-- main section --}}
       <section x-ref="Group" class="w-full g-10px column transition-all group">
   <div x-data="{ 
    ShowBalance : $persist(true),
    Balance : $persist('Total')
    }" style="background-image:url('{{ asset('banners/5B6D4ACA-8986-4B0E-A0BD-670B32CCDFE4-compressed.jpeg') }}');background-size:cover;background-position:center;" class="w-full pos-relative br-15px p-20px no-select border-width-1px border-style-solid border-color-primary-05">
<div class="pos-absolute z-index-500 inset-0 bg-black-transparent br-inherit">

</div>

{{-- main --}}
<div class="pos-relative z-index-1000 br-inherit column g-10px">
<div class="w-full backdrop-blur-100px row  bg-black-transparent border-width-1px border-style-solid border-color-primary-05 br-1000px p-5px">
<div x-on:click="Balance = 'Total'" x-bind:class="Balance == 'Total' ? 'bg-primary primary-text' : ''" class="w-full p-5px p-x-10px br-inherit row align-center justify-center">Total Balance</div>
<div x-on:click="Balance = 'WTT'"  x-bind:class="Balance == 'WTT' ? 'bg-primary primary-text' : ''" class="w-full p-5px p-x-10px br-inherit row align-center justify-center">WTT Balance</div>
</div>
{{-- new row --}}
<div class="row m-top-10px w-full align-center g-10px space-between">
  <div class="column g-5px">
   <div class="row align-center g-5px">
     <span class="opacity-07">Total Balance</span>
     <i x-on:click="ShowBalance = !ShowBalance">
      <svg x-show="ShowBalance" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
  <title>eye-2</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <circle cx="12" cy="12" r="3" fill="currentColor" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <path d="m1.125,12S4.989,4,12,4s10.875,8,10.875,8c0,0-3.865,8-10.875,8S1.125,12,1.125,12Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
  </g>
</svg>
<svg x-show="!ShowBalance" xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24">
  <title>eye-2-slash</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m6.07,17.93c-3.226-2.37-4.945-5.93-4.945-5.93,0,0,3.864-8,10.875-8,2.334,0,4.32.887,5.93,2.07" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m20.804,8.853c1.362,1.678,2.071,3.147,2.071,3.147,0,0-3.865,8-10.875,8-.734,0-1.434-.088-2.098-.245" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <circle cx="12" cy="12" r="3" fill="currentColor" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <line x1="22" y1="2" x2="2" y2="22" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
  </g>
</svg>
     </i>
   </div>
  <strong x-show="ShowBalance && Balance == 'Total'" class="font-size-1-5 font-weight-900">
    {{ $CurrencyHelper::format(Auth::guard('users')->user()->deposit_balance,'NGN',$display_currency) }}
  </strong>
  <strong x-show="ShowBalance && Balance == 'WTT'" class="font-size-1-5 font-weight-900">
      &#8361;{{ number_format(Auth::guard('users')->user()->main_balance) }}
  </strong>
  <strong x-show="!ShowBalance" class="font-size-1-5 font-weight-900">
******
  </strong>
  </div>
  
</div>
 
  {{-- details --}}
  <div class="w-full g-10px column">
   
     <div class="row w-full align-center space-between">
   <button  x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="w-fit br-1000px row align-center justify-center m-bottom-10px p-3px p-x-10px font-size-07 no-select pointer">
    Recharge
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

  </button>
   <button x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text)" class="w-fit br-1000px row align-center justify-center m-bottom-10px p-3px p-x-10px font-size-07 no-select pointer">
   Withdraw
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="14" width="14"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

  </button>
 </div>
  </div>
</div>
   </div>

   {{-- quick links --}}
   <div class="w-full row align-center g-10px">
    {{-- new --}}
    <div x-data="{ 
      Link : '{{ url('users/exchange') }}'
     }" x-on:click="Vitecss.navigate(Link)" class="w-full br-10px p-10px pc-pointer align-center column g-10px">
      <div class="c-secondary">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M8.5 12.75L10.75 15L8.5 17.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M4.655 4.505C3.4774 5.6413 2.75 7.2359 2.75 9C2.75 12.452 5.55 15.25 9 15.25C9.6 15.25 10.17 15.166 10.72 15.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.5 5.25L7.25 3L9.5 0.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M13.3444 13.4937C14.5146 12.3575 15.25 10.7634 15.25 9C15.25 5.548 12.45 2.75 9.00002 2.75C8.42002 2.75 7.86002 2.82895 7.33002 2.97595" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
      </div>
      <small>Exchange</small>
    </div>
      {{-- new --}}
    <div x-data="{ 
      Link : '{{ url('users/referrals') }}'
     }" x-on:click="Vitecss.navigate(Link)" class="w-full br-10px p-10px pc-pointer align-center column g-10px">
      <div class="c-secondary">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M5.75 8.25049C6.8546 8.25049 7.75 7.35549 7.75 6.25049C7.75 5.14549 6.8546 4.25049 5.75 4.25049C4.6454 4.25049 3.75 5.14549 3.75 6.25049C3.75 7.35549 4.6454 8.25049 5.75 8.25049Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.60903 15.1225C10.132 14.9475 10.439 14.3785 10.245 13.8635C9.56003 12.0455 7.80903 10.7515 5.75103 10.7515C3.69303 10.7515 1.94203 12.0455 1.25703 13.8635C1.06303 14.3795 1.37003 14.9485 1.89303 15.1225C2.85503 15.4435 4.17403 15.7505 5.75203 15.7505C7.33003 15.7505 8.64803 15.4435 9.60903 15.1225Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M12 5.75049C13.1046 5.75049 14 4.85549 14 3.75049C14 2.64549 13.1046 1.75049 12 1.75049C10.8954 1.75049 10 2.64549 10 3.75049C10 4.85549 10.8954 5.75049 12 5.75049Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M13.154 13.1873C14.2224 13.0845 15.1437 12.8614 15.858 12.6226C16.381 12.4476 16.688 11.8785 16.494 11.3636C15.809 9.54549 14.058 8.2515 12 8.2515C11.1608 8.2515 10.379 8.4771 9.69287 8.8555" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
      </div>
      <small>Team</small>
    </div>
     {{-- new --}}
    <div x-data="{ 
      Link : '{{ url('users/transactions') }}'
     }" x-on:click="Vitecss.navigate(Link)" class="w-full br-10px p-10px pc-pointer align-center column g-10px">
      <div class="c-secondary">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M2.50002 11.661C2.75902 10.74 3.65202 10.236 4.61602 10.25C5.58102 10.264 6.48802 10.696 6.54502 11.661C6.60202 12.626 5.58002 13.273 4.52202 13.705C3.46402 14.137 2.58602 14.54 2.49902 15.749H6.54802" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.5 5.25H16.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.5 12.75H16.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M4.75002 7.5V2C4.75002 2 4.12002 3.108 2.78302 3.364" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
  </div>
      <small class="ws-nowrap">Transactions</small>
    </div>
    {{-- new --}}
    <div x-on:click="AllMenu = true;" class="w-full br-10px p-10px pc-pointer align-center column g-10px">
      <div class="c-secondary">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <rect x="3" y="3" width="10" height="10" rx="1.5" ry="1.5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <rect x="3" y="19" width="10" height="10" rx="1.5" ry="1.5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <rect x="19" y="3" width="10" height="10" rx="1.5" ry="1.5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <rect x="19" y="19" width="10" height="10" rx="1.5" ry="1.5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
  </g>
</svg>
      </div>
      <small>ALL</small>
    </div>
   </div>
   {{-- new row --}}
   <div class="row items-stretch w-full g-10px">
    {{-- new element --}}
    <div style="width:40%;max-width:40%;background-image:url('{{ asset('banners/C1A3F163-0894-465F-A21B-56F586D7EF86-compressed.jpeg') }}');background-size:cover;background-position:center;" class="p-10px pc-pointer no-shrink column pos-relative br-10px border-width-1px border-style-solid border-color-primary-05">
<div style="background:rgba(0,0,0,0.7)" class="pos-absolute inset-0 bg-black-transparent br-inherit z-index-200">
</div>
<div class="pos-relative column z-index-300 g-5px">
<div class="p-2px font-size-05 c-primary-lighter bg-primary-03 ws-nowrap br-1000px p-x-10px border-width-1px border-style-solid border-color-primary">
  Your growth, Our priority
</div>
  <span class="font-weight-800">Earn More <br> <span class="c-primary-lighter">With WT Network</span></span>
<span class="font-size-05">Buy shares, Invite friends, and claim daily rewards &mdash; fast, secure and easy</span>

{{-- new row --}}
<div class="row w-full align-center g-5px space-between">
  {{-- new --}}
  <div class="column w-full align-center justify-center text-center">
    <div class="h-20px w-20px backdrop-blur-10px circle no-shrink column align-center c-primary-lighter justify-center bg-primary-03 border-width-1px border-style-solid border-color-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M15.6449 7.0522C15.474 6.7114 15.1317 6.5 14.7504 6.5H10.2948L10.559 2.0312C10.5844 1.6025 10.3305 1.2148 9.9272 1.0668C9.5244 0.920302 9.0791 1.0507 8.8222 1.3949L2.4492 9.9008C2.2207 10.206 2.185 10.6069 2.3554 10.9477C2.5258 11.2885 2.8686 11.4999 3.2494 11.4999H7.705L7.4408 15.9687C7.4154 16.3974 7.6693 16.7851 8.0726 16.9331C8.1825 16.9731 8.2957 16.9927 8.4076 16.9927C8.705 16.9927 8.9906 16.855 9.1776 16.605L15.5511 8.0991C15.7791 7.7944 15.8153 7.393 15.6449 7.0522Z" fill="currentColor"></path>
  </g>
</svg>
    </div>
    <small>Fast</small>
  </div>
  {{-- new --}}
  <div class="column w-full align-center justify-center text-center">
    <div class="h-20px backdrop-blur-10px w-20px circle no-shrink column align-center c-primary-lighter justify-center bg-primary-03 border-width-1px border-style-solid border-color-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M14.783,2.813l-5.25-1.68c-.349-.112-.718-.111-1.066,0L3.216,2.813c-.728,.233-1.216,.903-1.216,1.667v6.52c0,3.508,4.946,5.379,6.46,5.869,.177,.057,.358,.086,.54,.086s.362-.028,.538-.085c1.516-.49,6.462-2.361,6.462-5.869V4.48c0-.764-.489-1.434-1.217-1.667Zm-2.681,4.389l-3.397,4.5c-.128,.169-.322,.276-.534,.295-.021,.002-.043,.003-.065,.003-.189,0-.372-.071-.511-.201l-1.609-1.5c-.303-.283-.32-.757-.038-1.06,.284-.303,.758-.319,1.06-.038l1.001,.933,2.896-3.836c.25-.33,.72-.396,1.051-.146,.331,.25,.396,.72,.146,1.051Z" fill="currentColor"></path>
  </g>
</svg>
    </div>
    <small>Secure</small>
  </div>
  {{-- new --}}
  <div class="column w-full align-center justify-center text-center">
    <div class="h-20px backdrop-blur-10px w-20px circle no-shrink column align-center c-primary-lighter justify-center bg-primary-03 border-width-1px border-style-solid border-color-primary">
     <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.554137 13.5756C1.34525 11.476 3.36866 9.97803 5.74997 9.97803C8.13128 9.97803 10.1547 11.476 10.9458 13.5756C11.3059 14.5316 10.7272 15.5154 9.84596 15.8103C8.82613 16.1509 7.42657 16.477 5.75097 16.477C4.0754 16.477 2.67527 16.1511 1.65458 15.8105C0.771586 15.5163 0.194851 14.5312 0.554137 13.5756Z" fill="currentColor"></path> <path d="M12.5523 13.9774C13.9847 13.9162 15.1901 13.6251 16.096 13.3225C16.9772 13.0276 17.5559 12.0438 17.1958 11.0878C16.4047 8.98817 14.3813 7.49023 12 7.49023C10.5581 7.49023 9.24737 8.03945 8.26202 8.9389C10.147 9.65833 11.6398 11.1634 12.3495 13.0469C12.4675 13.3603 12.5329 13.6726 12.5523 13.9774Z" fill="currentColor"></path> <path d="M5.75 8.50049C6.99267 8.50049 8 7.49361 8 6.25049C8 5.00736 6.99267 4.00049 5.75 4.00049C4.50733 4.00049 3.5 5.00736 3.5 6.25049C3.5 7.49361 4.50733 8.50049 5.75 8.50049Z" fill="currentColor"></path> <path d="M12 6.00049C13.2427 6.00049 14.25 4.99361 14.25 3.75049C14.25 2.50736 13.2427 1.50049 12 1.50049C10.7573 1.50049 9.75 2.50736 9.75 3.75049C9.75 4.99361 10.7573 6.00049 12 6.00049Z" fill="currentColor"></path></g>
</svg>
    </div>
    <small>Easy</small>
  </div>
</div>

</div>
    </div>
    {{-- new element --}}
    <div style="max-width:60%;" class="p-7px br-10px w-full column g-5px border-width-1px border-style-solid border-color-primary-05 bg-black-transparent">
     @if ($checked_in)
              {{-- new row --}}
      <div  style="background:var(--primary-01);border:1px solid var(--primary-light);color:var(--primary-lighter)" class="row g-5px font-size-07 first primary-text br-5px border-width-1px bg-primary align-center justify-center border-style-solid border-color-primary p-5px w-full">
       Checked In Today
      </div>
     @else
          {{-- new row --}}
      <div x-data="{ 
        CheckIn : false
       }" x-on:click="
       CheckIn = true;
      SendPostRequest('{{ url('users/post/daily/check/in/process') }}',{
        '_token' : '{{ @csrf_token() }}'
      },function(response){
        CheckIn = false;
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        if(data.status == 'success'){
          Vitecss.navigate('{{ url()->current() }}')
        }
      })" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light)" class="row g-5px font-size-07 first primary-text br-5px border-width-1px bg-primary align-center justify-center border-style-solid border-color-primary p-5px w-full">
       <span x-show="!CheckIn" class="row align-center justify-center g-5px">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>
Check-In
       </span>
       <span x-show="CheckIn" class="row align-center justify-center g-5px">
        <?xml version="1.0" encoding="utf-8"?><svg height="14" width="14" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

Checking In...
       </span>
      </div>
     @endif
      {{-- new --}}
      <div style="max-width:100%;" class="w-full br-5px row border-width-1px border-style-solid border-color-primary-05 p-5px">
        <i class="c-primary-lighter p-x-5px">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 18 18">
  <title>bullhorn</title>
  <g fill="currentColor"><path d="M8.805 10.75L9.787 15.397C9.901 15.937 9.556 16.468 9.015 16.582L8.037 16.789C7.497 16.903 6.966 16.558 6.852 16.017L5.75 10.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M13.75 13.25C13.75 13.25 11.813 10.75 9.5 10.75H5C3.205 10.75 1.75 9.295 1.75 7.5C1.75 5.705 3.205 4.25 5 4.25H9.5C11.812 4.25 13.75 1.75 13.75 1.75V13.25Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M5.75 4.25V10.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M16.3843 6C16.9018 6.2995 17.25 6.8591 17.25 7.5C17.25 8.1409 16.9018 8.7005 16.3843 9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
        </i>
        <div style="max-width:calc(100% - 30px)" vitecss-marquee="true" class="flex-auto overflow-hidden">
          <div class="w-fit font-size-07">
{{ $social_settings->marquee_notification }}

          </div>
        </div>
      </div>
      {{-- new --}}
      <span class="font-weight-900 c-primary-lighter">WTT Price History</span>
      <div style="height:90px;width:100%;" id="chart-container" class="w-full column flex-auto br-10px border-width-1px border-style-solid border-color-primary-05">
      <img src="{{ asset('banners/IMG_1488-compressed.jpeg') }}" alt="" class="w-full h-full br-inherit no-select no-pointer">
      </div>
    </div>
    

   </div>
        
     
      

        {{-- group --}}
        <section x-data="{ 
          Shares : 'regular'
         }" class="w-full column g-10">
     <div style="width:80%;" class="w-semi-full row no-select max-w-500px br-1000px m-x-auto p-5px border-width-1px border-style-solid border-color-primary-05">
      <div x-bind:style="Shares == 'regular' ? {
        'background' : 'var(--primary)',
        'color' : 'var(--primary-text)'
      } : {}" x-on:click="Shares = 'regular'" class="w-full pointer br-inherit row align-center justify-center p-5px">
        Regular Shares
      </div>
       <div x-bind:style="Shares == 'vip' ? {
        'background' : 'var(--primary)',
        'color' : 'var(--primary-text)'
      } : {}" x-on:click="Shares = 'vip'" class="w-full pointer br-inherit row align-center justify-center p-5px">
        VIP Shares
      </div>
     </div>
     
       {{-- regular packages loop --}}
        @if (!$regular_packages->isEmpty())
           
        <div x-show="Shares == 'regular'" class="grid pc-grid-2 g-20 w-full">
         @foreach ($regular_packages as $data)
          <div style="overflow-x: hidden" class="w-full border-width-1px border-style-solid border-color-primary-05 h-fit column bg-black-transparent box-shadow br-10px p-15px g-10">
          
         <div class="column flex-auto">
            {{-- new row --}}
           <div class="row w-full g-10px">
            <img src="{{ asset('packages/'.$data->photo.'') }}" alt="" style="width:80px;" class="br-10px no-shrink perfect-square no-pointer no-select">
            {{-- new column --}}
            <div class="column w-full g-5px">
          {{-- new --}}
          <div class="row align-center w-full space-between g-10px">
            <strong class="font-weight-800">{{ $data->name }}</strong>
           
          </div>
          <div style="background:linear-gradient(to right,transparent,var(--primary),transparent);background:var(--primary)" class="w-full h-1px"></div>
                {{-- new --}}
                <div class="row w-full align-center g-10px space-between">
                    <small class="opacity-07">Gross Return</small>
                    <strong class="font-weight-800">&#8361;{{ number_format($data->earning * $data->validity) }}</strong>
                </div>

                 {{-- new column --}}
                {{-- new --}}
                <div class="row w-full align-center g-10px space-between">
                    <small class="opacity-07">Maturity</small>
                    <strong class="font-weight-800">  {{ number_format($data->validity) }} Day{{ $data->validity > 1 ? 's' : '' }}</strong>
                </div>
           <div class="row w-full align-center space-between">
             <strong style="text-shadow:0 0 10px var(--primary)" class="font-size-1 font-weight-900">&#8361;{{ number_format($data->cost) }}</strong>
               
                <button x-on:click="
                    Overlay = true;
                    Package.ID = '{{ $data->id }}';
                    Package.Name='{{ $data->name }}';
                    Package.Cost='&#8361;{{ number_format($data->cost) }}';
                    Package.DailyIncome='&#8361;{{ number_format($data->earning) }}';
                    Package.Cycle='{{ number_format($data->validity) }} Day{{ $data->validity > 1 ? 's' : '' }}';
                    Package.TotalIncome='&#8361;{{ number_format($data->earning*$data->validity) }}';
                    " style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text)" class="w-fit pc-pointer row align-center justify-center p-5px p-x-10px font-size-07 m-left-auto br-10px">
  Buy Share
</button>
           </div>
            </div>
            
           </div>
          </div>


          </div>
        @endforeach
       </div>


        @endif

        {{-- vip packages loop --}}
        @if (!$vip_packages->isEmpty())
           
        <div x-show="Shares == 'vip'" class="grid pc-grid-2 g-20 w-full">
         @foreach ($vip_packages as $data)
          <div style="overflow-x: hidden" class="w-full border-width-1px border-style-solid border-color-primary-05 h-fit column bg-black-transparent box-shadow br-10px p-15px g-10">
          
         <div class="column flex-auto">
            {{-- new row --}}
           <div class="row w-full g-10px">
            <img src="{{ asset('packages/'.$data->photo.'') }}" alt="" style="width:80px;" class="br-10px no-shrink perfect-square no-pointer no-select">
            {{-- new column --}}
            <div class="column w-full g-5px">
          {{-- new --}}
          <div class="row align-center w-full space-between g-10px">
            <strong class="font-weight-800">{{ $data->name }}</strong>
           
          </div>
          <div style="background:linear-gradient(to right,transparent,var(--primary),transparent);background:var(--primary)" class="w-full h-1px"></div>
                {{-- new --}}
                <div class="row w-full align-center g-10px space-between">
                    <small class="opacity-07">Gross Return</small>
                    <strong class="font-weight-800">&#8361;{{ number_format($data->earning * $data->validity) }}</strong>
                </div>

                 {{-- new column --}}
                {{-- new --}}
                <div class="row w-full align-center g-10px space-between">
                    <small class="opacity-07">Maturity</small>
                    <strong class="font-weight-800">  {{ number_format($data->validity) }} Day{{ $data->validity > 1 ? 's' : '' }}</strong>
                </div>
           <div class="row w-full align-center space-between">
             <strong style="text-shadow:0 0 10px var(--primary)" class="font-size-1 font-weight-900">&#8361;{{ number_format($data->cost) }}</strong>
               
                <button x-on:click="
                    Overlay = true;
                    Package.ID = '{{ $data->id }}';
                    Package.Name='{{ $data->name }}';
                    Package.Cost='&#8361;{{ number_format($data->cost) }}';
                    Package.DailyIncome='&#8361;{{ number_format($data->earning) }}';
                    Package.Cycle='{{ number_format($data->validity) }} Day{{ $data->validity > 1 ? 's' : '' }}';
                    Package.TotalIncome='&#8361;{{ number_format($data->earning*$data->validity) }}';
                    " style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text)" class="w-fit pc-pointer row align-center justify-center p-5px p-x-10px font-size-07 m-left-auto br-10px">
  Buy Share
</button>
           </div>
            </div>
            
           </div>
          </div>


          </div>
        @endforeach
       </div>


        @endif

        </section>
       </section>
     
        
       
       

        {{-- overlay --}}
<section x-on:click="Overlay=false;" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-show="Overlay" class="pos-fixed transition-all column p-5px align-center inset-0 bg-black-transparent z-index-4000 backdrop-blur-2px">
{{-- child --}}
<div x-show="Overlay" x-transition:enter-start="bottom-enter" x-transition:enter-end="bottom-enter-end" x-transition:leave-start="bottom-leave" x-transition:leave-end="bottom-leave-end" x-on:click.stop="" style="max-height:80%" class="child transition-all m-top-auto border-width-1px border-style-solid border-color-primary-05 br-20px bg w-full max-w-500px br-top-left-30px br-top-right-30px column p-top-10px p-bottom-10px p-20px g-10px">
<div class="h-5px br-1000px m-x-auto bg-rgt-01 w-50px"></div>
 
{{-- main --}}
<div class="w-full column g-10px">
    <div class="w-full column p-15px br-10px bg-primary-01 border-width-1px border-style-solid border-color-primary-05">
                <span class="opacity-07">WTT Balance</span>
                <strong class="desc font-weight-900">&#8361;{{ number_format(Auth::guard('users')->user()->main_balance) }}</strong>
            </div>
   
      {{-- new row --}}
    <div class="row br-5px w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Daily Return</span>
        <span x-html="Package.DailyIncome" class="uppercase"></span>
    </div>
      {{-- new row --}}
    <div class="row br-5px w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Gross Return</span>
        <span x-html="Package.TotalIncome" class="uppercase"></span>
    </div>
      {{-- new row --}}
    <div class="row br-5px w-full font-weight-700 align-center space-between">
        <span class="opacity-07">Maturity</span>
        <span x-html="Package.Cycle" class="uppercase"></span>
    </div>
    <div class="hr" vitecss-type="dashed"></div>
    <div class="row align-center w-full space-between">
      <span>Subtotal</span> <span x-html="Package.Cost" class="uppercase font-weight-900 font-size-1rem"></span>
    </div>
    <div class="hr" vitecss-type="dashed"></div>
    
    <small class="c-primary-light text-align-center">All interests are returned on maturity day.</small>
    
   {{-- confirm btn --}}
<button x-data="{ 
        Submitting : false
     }" x-on:click="
     Submitting = true;
     $el.classList.add('disabled');
     SendPostRequest('{{ url('users/post/purchase/package/process') }}',{
        'id' : Package.ID,
        '_token' : '{{ @csrf_token() }}'
     },function(response,error){
        let data=JSON.parse(response);
        CreateNotify(data.status,data.message);
        Submitting = false;
        $el.classList.remove('disabled');
      if(data.status == 'success'){
        Overlay = false;
        Vitecss.navigate('{{ url('users/products/active') }}')
      }

     })
     " class="p-10px pc-pointer m-top-20px br-10px" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light);color:var(--primary-text);">
        <span x-show="!Submitting" class="row align-center justify-center g-5px">

         Buy Share</span>
        <span x-show="Submitting" class="row align-center justify-center g-5px">
          <?xml version="1.0" encoding="utf-8"?><svg version="1.1" height="18" width="18" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

          Purchasing...</span>
</button>

  
</div>
</div>
</section>

{{-- more --}}
<section x-show="AllMenu" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="transition-all pos-fixed row align-end justify-end z-index-4000 inset-0 bg-black-transparent backdrop-blur-2px">
<div x-on:click.outside="AllMenu = false" x-transition:enter-start="right-enter" x-transition:enter-end="right-enter-end" x-transition:leave-start="right-leave" x-transition:leave-end="right-leave-end" x-show="AllMenu" style="width:80%;max-width:500px;" class="transition-all bg h-full column g-10px">
{{-- new --}}
<div x-on:click="AllMenu = false" class="w-full p-15px row align-end justify-end">
  <div class="h-25px w-25px circle bg-rgt-01 column align-center justify-center">
    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 18">
  <g fill="currentColor">
    <line x1="14" y1="4" x2="4" y2="14" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="4" y1="4" x2="14" y2="14" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
  </g>
</svg>
  </div>
</div>
{{-- new element --}}
<div class="w-full p-15px row align-center bg-rgt-01">
  Finance
</div>
<div class="row flex-wrap g-20px w-full p-15px">
  {{-- new --}}
  @php
      $url=url('users/recharge')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <line x1="19" y1="1" x2="19" y2="9" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <line x1="23" y1="5" x2="15" y2="5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <path d="m21,13v5c0,1.105-.895,2-2,2H6c-1.105,0-2-.895-2-2V5c0-1.105.895-2,2-2h5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <line x1="4" y1="15" x2="21" y2="15" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></line>
  </g>
</svg>
    </i>
    <span class="font-size-07rem">Recharge</span>
  </div>
  {{-- new --}}
  @php
      $url=url('users/withdraw')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M2.25 6.49998C2.25 4.76698 3.499 3.28698 5.207 2.99498L11.769 1.87498C12.203 1.80098 12.635 2.01998 12.832 2.41398" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M15.75 11.75V13.25C15.75 14.355 14.855 15.25 13.75 15.25H4.25C3.145 15.25 2.25 14.355 2.25 13.25V6.75C2.25 5.645 3.145 4.75 4.25 4.75H13.75C14.855 4.75 15.75 5.645 15.75 6.75V8.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M15.75 11.75H13C12.034 11.75 11.25 10.966 11.25 10C11.25 9.033 12.034 8.25 13 8.25H15.75C16.302 8.25 16.75 8.698 16.75 9.25V10.75C16.75 11.302 16.302 11.75 15.75 11.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
    </i>
    <span class="font-size-07rem">Withdraw</span>
  </div>
  {{-- new --}}
  @php
      $url=url('users/bank')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M17 22V18.5V19" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M7 10.01V10" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 8H15" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M9 22V18.7577C7.17531 18.225 5.5 16.5 5 14.4973L2 13V8.09467L6 6.46664V2.5C7.43764 1.78118 9.27279 2.19602 9.9798 4L14.5 4C18.6421 4 22 7.35786 22 11.5C22 15.6421 18.6421 19 14.5 19H13" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
    </i>
    <span class="font-size-07rem">Bind Bank</span>
  </div>
  {{-- new --}}
  @php
      $url=url('users/bank')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M6.00283 5.97646C7.54105 4.44489 9.65927 3.5 12.0001 3.5C16.6945 3.5 20.5001 7.30558 20.5001 12V13H22.5001V12C22.5001 6.20101 17.7991 1.5 12.0001 1.5C9.21634 1.5 6.52096 2.62797 4.55516 4.59569L2.51245 6.84208L3.99216 8.18762L6.00283 5.97646Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M4.5 1.5V6.5H9.5V8.5H2.5V1.5H4.5Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M17.9972 18.0235C16.4589 19.5551 14.3407 20.5 11.9999 20.5C7.30551 20.5 3.49993 16.6944 3.49993 12V11H1.49993V12C1.49993 17.799 6.20094 22.5 11.9999 22.5C14.901 22.5 17.5289 21.3221 19.4282 19.4209L21.4875 17.1579L20.0078 15.8124L17.9972 18.0235Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M19.5 22.5V17.5H14.5V15.5H21.5V22.5H19.5Z" fill="currentColor"></path></g>
</svg>
    </i>
    <span class="font-size-07rem">Exchange</span>
  </div>
  {{-- new --}}
  @php
      $url=url('users/transactions')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 12 12">
  <g fill="currentColor">
    <line x1="8.75" y1="11" x2="8.75" y2="4" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <polyline points="6.25 8.75 8.75 11.25 11.25 8.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></polyline>
    <line x1="1" y1="1.25" x2="11" y2="1.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="1" y1="4.75" x2="3.75" y2="4.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
    <line x1="1" y1="8.25" x2="3.75" y2="8.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
  </g>
</svg>
    </i>
    <span class="font-size-07rem">Transaction History</span>
  </div>
   {{-- new --}}
  @php
      $url=url('users/products/active')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
   <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M10 12H14V20H10V12Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M18 8H22V20H18V8Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M2 16H6V20H2V16Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M2.50003 7.50001L6.50003 3.50001L10.5 7.5L14.5 3.50001" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
    </i>
    <span class="font-size-07rem">My Shares</span>
  </div>
  
</div>
{{-- new element --}}
<div class="w-full p-15px row align-center bg-rgt-01">
  Rewards & Community
</div>
<div class="row flex-wrap g-20px w-full p-15px">
  {{-- new --}}
  @php
      $url=url('users/invite')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
     <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>

    </i>
    <span class="font-size-07rem">Invite & Earn</span>
  </div>
  {{-- new --}}
  @php
      $url=url('users/gift/code')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m13,29h-6c-1.657,0-3-1.343-3-3v-9" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m28,17v9c0,1.657-1.343,3-3,3h-6" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <rect x="2" y="8" width="28" height="5" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <path d="m7,5c0-1.657,1.343-3,3-3,4.438,0,6,6,6,6h-6c-1.657,0-3-1.343-3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <path d="m25,5c0-1.657-1.343-3-3-3-4.438,0-6,6-6,6h6c1.657,0,3-1.343,3-3Z" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></path>
    <polyline points="19 8 19 29 13 29 13 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>
    </i>
    <span class="font-size-07rem">Chest Box</span>
  </div>
   {{-- new --}}
  @php
      $url=url('users/team')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path d="M5.75 8.25049C6.8546 8.25049 7.75 7.35549 7.75 6.25049C7.75 5.14549 6.8546 4.25049 5.75 4.25049C4.6454 4.25049 3.75 5.14549 3.75 6.25049C3.75 7.35549 4.6454 8.25049 5.75 8.25049Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M9.60903 15.1225C10.132 14.9475 10.439 14.3785 10.245 13.8635C9.56003 12.0455 7.80903 10.7515 5.75103 10.7515C3.69303 10.7515 1.94203 12.0455 1.25703 13.8635C1.06303 14.3795 1.37003 14.9485 1.89303 15.1225C2.85503 15.4435 4.17403 15.7505 5.75203 15.7505C7.33003 15.7505 8.64803 15.4435 9.60903 15.1225Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M12 5.75049C13.1046 5.75049 14 4.85549 14 3.75049C14 2.64549 13.1046 1.75049 12 1.75049C10.8954 1.75049 10 2.64549 10 3.75049C10 4.85549 10.8954 5.75049 12 5.75049Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M13.154 13.1873C14.2224 13.0845 15.1437 12.8614 15.858 12.6226C16.381 12.4476 16.688 11.8785 16.494 11.3636C15.809 9.54549 14.058 8.2515 12 8.2515C11.1608 8.2515 10.379 8.4771 9.69287 8.8555" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
    </i>
    <span class="font-size-07rem">My Team</span>
  </div>
  
</div>

{{-- new element --}}
<div class="w-full p-15px row align-center bg-rgt-01">
  Security & Account
</div>
<div class="row flex-wrap g-20px w-full p-15px">
  {{-- new --}}
  @php
      $url=url('users/password/update')
  @endphp
  <div x-on:click="Vitecss.navigate('{{ $url }}')" class="column align-center text-align-center">
    <i class="c-secondary">
     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <path d="m16,10v-4c0-2.209-1.791-4-4-4h0c-2.209,0-4,1.791-4,4v4" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2"></path>
    <rect x="3" y="10" width="18" height="12" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></rect>
    <line x1="12" y1="15" x2="12" y2="18" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></line>
    <circle cx="12" cy="15" r="1" fill="currentColor" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
  </g>
</svg>
    </i>
    <span class="font-size-07rem">Reset Password</span>
  </div>
 
  {{-- new --}}
  @php
      $url=url('users/invite')
  @endphp
  <div x-on:click="window.location.href='{{ $url }}'" class="column align-center text-align-center">
    <i class="c-secondary">
    <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z"></path></svg>
    </i>
    <span class="font-size-07rem">Logout</span>
  </div>
 
</div>


</div>
</section>
    </section>


@endsection
