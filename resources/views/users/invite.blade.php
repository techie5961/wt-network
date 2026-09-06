@extends('layout.users.app')
@section('title')
   Invite & Earn
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
    </style>
@endsection
@section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">Invite Friends</span>
        <span></span>

    </div>
@endsection
@section('main')
     <section x-data="{  }" class="w-full column">
      
        {{-- new section /body --}}
        <section class="section pc-x-padding p-20px w-full column g-10px body">
            <div class="w-full align-center text-center column">
             <strong class="desc font-weight-900">Invite Friends, Grow Together</strong>
            <span class="c-primary-lighter">Enjoy awesome rewards <br> + commissions on each referral</span>
           </div>
           <img style="margin:0 auto;width:90%;max-width:500px;" src="{{ asset('banners/C445C920-990C-44A9-BF05-546FF2EE9F41-compressed.jpeg') }}" alt="" class="no-select no-pointer">
          <div x-data="{ 
                    Link : '{{ url('register?ref='.Auth::guard('users')->user()->uniqid.'') }}',
                    Code : '{{ Auth::guard('users')->user()->uniqid }}'
                 }"  class="w-full max-w-500 m-x-auto border-width-1px border-style-solid border-color-primary-05 bg-black-transparent column p-20px br-15px g-10px box-shadow">
            <strong class="font-size-1 font-weight-800">My Invite Link</strong>
            {{-- new row --}}
            <div x-data="{ 
                Copied : false
             }" class="row g-10px align-center space-between">
                <div class="h-40px br-10px row align-center p-15px text-overflow-ellipsis border-width-1px border-style-solid border-color-primary ws-nowrap overflow-hidden">
                    <div class="w-full font-weight-700 max-w-full ws-nowrap text-overflow-ellipsis" x-text="Link"></div>
                <svg x-on:click="
                copy(Link);
                Copied = true;
                setTimeout(() => {
                    Copied = false;
                }, 2000);
                " class="c-primary-lighter pc-pointer" x-show="!Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M6.9998 6V3C6.9998 2.44772 7.44752 2 7.9998 2H19.9998C20.5521 2 20.9998 2.44772 20.9998 3V17C20.9998 17.5523 20.5521 18 19.9998 18H16.9998V20.9991C16.9998 21.5519 16.5499 22 15.993 22H4.00666C3.45059 22 3 21.5554 3 20.9991L3.0026 7.00087C3.0027 6.44811 3.45264 6 4.00942 6H6.9998ZM5.00242 8L5.00019 20H14.9998V8H5.00242ZM8.9998 6H16.9998V16H18.9998V4H8.9998V6Z"></path></svg>
                <svg class="c-primary-lighter" x-show="Copied" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

                </div>
              
               
            </div>
              <button x-data="{ 
                Copied : false
               }" x-on:click="
               copy(Code);
               Copied = true;
               setTimeout(() => {
                Copied = false;
               }, 2000);
               " style="color:var(--primary-text);border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark))" class="w-full pc-pointer p-10px p-x-20px br-1000px">
                <span x-show="!Copied" class="row g-5px align-center justify-center">
<svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20">
  <title>clone</title>
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
  </g>
</svg>

                    Copy Invite Code
                </span>
                 <span x-show="Copied" class="row g-5px align-center justify-center">
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="17" width="17"><path d="M4 12C4 7.58172 7.58172 4 12 4C16.4183 4 20 7.58172 20 12C20 16.4183 16.4183 20 12 20C7.58172 20 4 16.4183 4 12ZM12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2ZM17.4571 9.45711L16.0429 8.04289L11 13.0858L8.20711 10.2929L6.79289 11.7071L11 15.9142L17.4571 9.45711Z"></path></svg>

                    Copied
                </span>
                </button>
          
          </div>
          {{-- new --}}
           <div class="w-full max-w-500 m-x-auto border-width-1px border-style-solid border-color-primary-05 bg-black-transparent column p-20px br-15px g-10px box-shadow">
           <div class="row align-center g-5px">
            <svg class="c-primary-lighter" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>gift</title>
  <g fill="currentColor">
    <path d="m4.098,7h15.789c.657-.635,1.08-1.523,1.112-2.531-.064-1.974-1.73-3.506-3.666-3.467-2.737,0-4.405,1.902-5.332,3.516-.924-1.615-2.584-3.516-5.303-3.516-1.978-.066-3.633,1.493-3.697,3.467l-.002.033.002.033c.032.971.45,1.84,1.097,2.466Zm13.266-3.999c.907-.04,1.607.66,1.637,1.468-.029.873-.73,1.552-1.637,1.533h-3.887c.626-1.259,1.859-3,3.887-3.001Zm-10.697,0c2.008,0,3.233,1.742,3.857,3h-3.889c-.899.031-1.589-.643-1.635-1.5.046-.858.82-1.524,1.666-1.5Z" fill="currentColor" stroke-width="0"></path>
    <rect x="1" y="6.001" width="22" height="2" stroke-width="0" fill="currentColor"></rect>
    <path d="m13,10v12h5c1.654,0,3-1.346,3-3v-9h-8Z" stroke-width="0" fill="currentColor"></path>
    <path d="m11,10H3v9c0,1.654,1.346,3,3,3h5v-12Z" stroke-width="0" fill="currentColor"></path>
  </g>
</svg>
            <strong class="font-size-1 font-weight-800">Referral Rewards</strong>
           </div>
           {{-- new row --}}
           <div class="row w-full align-center g-10px space-between">
            <div class="column overflow-hidden w-full p-10px w-full border-right-width-1px border-right-style-solid border-right-color-primary-05 g-10px align-center text-center">
                <strong class="desc font-weight-900 c-primary-lighter">{{($referral_settings->level_1) }}%</strong>
                <span class="opacity-07 font-size-06">Level 1 Reward</span>
            </div>
            <div class="column overflow-hidden w-full p-10px w-full border-right-width-1px border-right-style-solid border-right-color-primary-05 g-10px align-center text-center">
                <strong class="desc font-weight-900 c-primary-lighter">{{($referral_settings->level_2) }}%</strong>
                <span class="opacity-07 font-size-06">Level 2 Reward</span>
            </div>
            <div class="column w-full overflow-hidden p-10px w-full g-10px align-center text-center">
                <strong class="desc font-weight-900 c-primary-lighter">{{($referral_settings->level_3) }}%</strong>
                <span class="opacity-07 font-size-06">Level 3 Reward</span>
            </div>
           </div>
        </div>
        {{-- new --}}
        <div class="w-full max-w-500 m-x-auto border-width-1px border-style-solid border-color-primary-05 bg-black-transparent column p-20px br-15px g-10px box-shadow">
           <div class="row w-full align-center g-5px">
            
            <strong class="font-size-1 font-weight-800">Referral Overview</strong>
            <div  x-on:click="Vitecss.navigate('{{ url('users/referrals') }}')" class="p-2px pc-pointer no-select p-x-10px border-width-1px border-style-solid br-5px m-left-auto font-size-06 c-primary-lighter border-color-primary bg-primary-02">
                My Team
            </div>
           </div>
           {{-- new row --}}
           <div class="row w-full align-center g-10px space-between">
            <div class="column overflow-hidden w-full p-10px w-full border-right-width-1px border-right-style-solid border-right-color-primary-05 g-10px align-center text-center">
                <strong class="desc ws-nowrap text-overflow-ellipsis font-weight-900 c-primary-lighter">{{ number_format($total_referrals) }}</strong>
                <span class="opacity-07 font-size-06">Total Referrals</span>
            </div>
           
            <div class="column w-full overflow-hidden p-10px w-full g-10px align-center text-center">
                <strong class="desc font-weight-900 c-primary-lighter max-w-full ws-nowrap text-overflow-ellipsis">&#8361;{{ number_format($total_reward) }}</strong>
                <span class="opacity-07 font-size-06">Total Reward</span>
            </div>
           </div>
        </div>
        {{-- new --}}
         <div class="w-full border-width-1px border-style-solid border-color-primary-05 bg-black-transparent column p-20px br-15px g-10px box-shadow">
           <div class="row align-center g-5px">
           
            <strong class="font-size-1 font-weight-800">How it Works</strong>
           </div>
           {{-- new row --}}
          <div class="row align-center g-10px">
            <div class="h-25px w-25px circle column align-center justify-center bg-primary">
                1
            </div>
            <span class="opacity-08">Invite friends using your invite code or link.</span>
          </div>
           {{-- new row --}}
          <div class="row align-center g-10px">
            <div class="h-25px w-25px circle column align-center justify-center bg-primary">
                2
            </div>
            <span class="opacity-08">Earn up to {{($referral_settings->level_2) }}% reward from direct referrals.</span>
          </div>
           {{-- new row --}}
          <div class="row align-center g-10px">
            <div class="h-25px w-25px circle column align-center justify-center bg-primary">
                3
            </div>
            <span class="opacity-08">The higher your team, the higher the reward.</span>
          </div>
        </div>
         
            
        </section>
    </section>

    
@endsection
@section('js')
    <script class="js">
     
    </script>
@endsection