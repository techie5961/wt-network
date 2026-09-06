@extends('layout.users.app')
@section('title')
    Profile
@endsection
@section('css')
    <style class="css">
        main{
            padding:0;
        }
       
    </style>
@endsection
@section('main')
    <section class="w-full g-10px column">
     
        {{-- new div --}}
        <section class="section pc-x-padding p-15px column g-10px body">
         <div class="w-full overflow-hidden row p-20px g-10px br-20px bg-black-transparent border-width-1px border-style-solid border-color-primary-05">
          <img src="{{ asset('photos/users/2F159F55-31FA-42FD-BE93-E25D93B0BACA-compressed.jpeg') }}" alt="" class="h-50px border-width-1px border-style-solid border-color-primary-04 w-50px br-10px no-shrink no-select">
        <div class="column">
            <strong class="font-size-1rem font-weight-900">{{ Auth::guard('users')->user()->phone }}</strong>
            <div x-data="{ 
                Copied : false
             }" class="row align-center g-5px">
                <span>ID: {{ Auth::guard('users')->user()->uniqid }}</span>
                <div x-on:click="
                copy('{{ Auth::guard('users')->user()->uniqid }}');
                Copied = true;
                setTimeout(() => {
                    Copied = false;
                }, 2000);
                " style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-light)" class="p-2px row align-center g-5px p-x-10px br-1000px no-select">
                    <svg x-show="!Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
  <title>clone</title>
  <g fill="currentColor">
    <path d="m13,7h2c1.105,0,2,.895,2,2v6c0,1.105-.895,2-2,2h-6c-1.105,0-2-.895-2-2v-2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
    <rect x="3" y="3" width="10" height="10" rx="2" ry="2" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></rect>
  </g>
</svg>
<svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <title>circle-check</title>
  <g fill="currentColor" stroke-linejoin="miter" stroke-linecap="butt">
    <circle cx="12" cy="12" r="10" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></circle>
    <polyline points="7 13 10 16 17 8" fill="none" stroke="currentColor" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2"></polyline>
  </g>
</svg>

                    Copy
                </div>
            </div>

        </div>
        </div>
      
           {{-- new --}}
            <div class="w-full overflow-hidden column p-20px g-10px br-20px bg-black-transparent border-width-1px border-style-solid border-color-primary-05">
            {{-- new row --}}
            <span class="opacity-07 font-weight-700">Total Balance</span>
            <strong class="font-size-1-5 c-primary-lighter font-weight-900">&#8358;{{ number_format(Auth::guard('users')->user()->deposit_balance) }}</strong>
          {{-- new row --}}
          <div x-data="{ 
            
           }" class="row w-full align-center g-10px space-between">
            <button x-on:click="Vitecss.navigate('{{ url('users/recharge') }}')" class="border-width-1px border-style-solid border-color-primary-light w-full p-10px c-primary-lighter bg-transparent no-select br-10px row align-center justify-center g-5px">
             <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 18 18">
  <title>wallet-2</title>
  <g fill="currentColor"><path d="M2.25 6.49998C2.25 4.76698 3.499 3.28698 5.207 2.99498L11.769 1.87498C12.203 1.80098 12.635 2.01998 12.832 2.41398" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M15.75 11.75V13.25C15.75 14.355 14.855 15.25 13.75 15.25H4.25C3.145 15.25 2.25 14.355 2.25 13.25V6.75C2.25 5.645 3.145 4.75 4.25 4.75H13.75C14.855 4.75 15.75 5.645 15.75 6.75V8.25" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path> <path d="M15.75 11.75H13C12.034 11.75 11.25 10.966 11.25 10C11.25 9.033 12.034 8.25 13 8.25H15.75C16.302 8.25 16.75 8.698 16.75 9.25V10.75C16.75 11.302 16.302 11.75 15.75 11.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" fill="none"></path></g>
</svg>
                Deposit
            </button>
            <button style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));color:var(--primary-text);border:1px solid var(--primary-light)" x-on:click="Vitecss.navigate('{{ url('users/withdraw') }}')" class="border-none row align-center justify-center g-5px w-full p-10px no-select br-10px">
             <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 24 24">
  <title>money-bill-coin</title>
  <g fill="currentColor"><path d="M9 18L2 18L2 4L22 4L22 10" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M14.5 11C14.5 9.61929 13.3807 8.5 12 8.5C10.6193 8.5 9.5 9.61929 9.5 11C9.5 12.3807 10.6193 13.5 12 13.5" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M13 18H21V22H13V18Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M15 14H23V18H15V14Z" stroke="currentColor" stroke-width="2" fill="none"></path> <path d="M6 8.01V8" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>
                Withdraw
            </button>
          </div>
        </div>

           {{-- content --}}
           <div class="box-shadow bg-black-transparent border-style-solid border-width-1px border-color-primary-05 column br-15px w-full">
                {{-- new link --}}
                <div onclick="Redirect('{{ url('users/bank') }}')" class="link pc-pointer no-select p-15px border-bottom-width-1px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M4.75,17.5c-.414,0-.75-.336-.75-.75v-1.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v1.5c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M13.25,17.5c-.414,0-.75-.336-.75-.75v-1.5c0-.414,.336-.75,.75-.75s.75,.336,.75,.75v1.5c0,.414-.336,.75-.75,.75Z" fill="currentColor"></path>
    <path d="M13.25,2H4.75c-1.517,0-2.75,1.233-2.75,2.75v.25h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v1.75h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v1.75h-.25c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.25v.25c0,1.517,1.233,2.75,2.75,2.75H13.25c1.517,0,2.75-1.233,2.75-2.75V4.75c0-1.517-1.233-2.75-2.75-2.75Zm-3.5,7.851v1.649c0,.414-.336,.75-.75,.75s-.75-.336-.75-.75v-1.649c-.732-.297-1.25-1.014-1.25-1.851,0-1.103,.897-2,2-2s2,.897,2,2c0,.837-.518,1.554-1.25,1.851Z" fill="currentColor"></path>
  </g>
</svg>


                    </i>
                    <span class="block m-right-auto">Add Bank</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                   {{-- new link --}}
                <div onclick="Redirect('{{ url('users/transactions') }}')" class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
  <g fill="currentColor">
    <polygon points="4.367 3.044 3.771 6.798 7.516 6.145 4.367 3.044" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" fill="currentColor"></polygon>
    <polyline points="10 7 10 10 12 12" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
    <path d="m5,5.101c1.271-1.297,3.041-2.101,5-2.101,3.866,0,7,3.134,7,7s-3.134,7-7,7c-3.526,0-6.444-2.608-6.929-6" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
  </g>
</svg>
                    </i>
                    <span class="block m-right-auto">Transaction History</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link --}}
                {{-- <div onclick="Redirect('{{ url('users/salary') }}')" class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
  <g fill="currentColor">
    <path fill-rule="evenodd" clip-rule="evenodd" d="M24 2C11.8497 2 2 11.8497 2 24C2 36.1503 11.8497 46 24 46C36.1503 46 46 36.1503 46 24C46 11.8497 36.1503 2 24 2ZM20.1078 34.2289L36.1117 14.7957L33.7959 12.8885L19.8926 29.7711L14.0002 23.8787L11.8789 26L20.1078 34.2289Z" fill="currentColor"></path>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Tasks</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div> --}}
              

                  {{-- new link --}}
                <div onclick="Redirect('{{ url('users/products/active') }}')" class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <rect x="12.5" y="2" width="4" height="14" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="7" y="7" width="4" height="9" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="1.5" y="11" width="4" height="5" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <path d="M2.75,9.5c.192,0,.384-.073,.53-.22l4.72-4.72v.689c0,.414,.336,.75,.75,.75s.75-.336,.75-.75V2.75c0-.414-.336-.75-.75-.75h-2.5c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.689L2.22,8.22c-.293,.293-.293,.768,0,1.061,.146,.146,.338,.22,.53,.22Z" fill="currentColor"></path>
  </g>
</svg>
                    </i>
                    <span class="block m-right-auto">My Shares</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link --}}
                <div onclick="Redirect('{{ url('users/gift/code') }}')" class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="m22,1c-3.13,0-4.996,2.386-6,4.323-1.004-1.937-2.87-4.323-6-4.323-2.206,0-4,1.794-4,4s1.794,4,4,4h12c2.206,0,4-1.794,4-4s-1.794-4-4-4Zm-12,6c-1.103,0-2-.897-2-2s.897-2,2-2c2.473,0,3.914,2.446,4.58,4h-4.58Zm12,0h-4.58c.666-1.554,2.107-4,4.58-4,1.103,0,2,.897,2,2s-.897,2-2,2Z" fill="currentColor" stroke-width="0"></path>
    <path d="m14,15H3v11c0,2.206,1.794,4,4,4h7v-15Z" stroke-width="0" fill="currentColor"></path>
    <path d="m18,15v15h7c2.206,0,4-1.794,4-4v-11h-11Z" stroke-width="0" fill="currentColor"></path>
    <rect x="1" y="7" width="30" height="6" fill="currentColor" stroke-width="0"></rect>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Chest Code</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link --}}
                <div onclick="Redirect('{{ url('users/referrals') }}')" class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M0.554137 13.5756C1.34525 11.476 3.36866 9.97803 5.74997 9.97803C8.13128 9.97803 10.1547 11.476 10.9458 13.5756C11.3059 14.5316 10.7272 15.5154 9.84596 15.8103C8.82613 16.1509 7.42657 16.477 5.75097 16.477C4.0754 16.477 2.67527 16.1511 1.65458 15.8105C0.771586 15.5163 0.194851 14.5312 0.554137 13.5756Z" fill="currentColor"></path> <path d="M12.5523 13.9774C13.9847 13.9162 15.1901 13.6251 16.096 13.3225C16.9772 13.0276 17.5559 12.0438 17.1958 11.0878C16.4047 8.98817 14.3813 7.49023 12 7.49023C10.5581 7.49023 9.24737 8.03945 8.26202 8.9389C10.147 9.65833 11.6398 11.1634 12.3495 13.0469C12.4675 13.3603 12.5329 13.6726 12.5523 13.9774Z" fill="currentColor"></path> <path d="M5.75 8.50049C6.99267 8.50049 8 7.49361 8 6.25049C8 5.00736 6.99267 4.00049 5.75 4.00049C4.50733 4.00049 3.5 5.00736 3.5 6.25049C3.5 7.49361 4.50733 8.50049 5.75 8.50049Z" fill="currentColor"></path> <path d="M12 6.00049C13.2427 6.00049 14.25 4.99361 14.25 3.75049C14.25 2.50736 13.2427 1.50049 12 1.50049C10.7573 1.50049 9.75 2.50736 9.75 3.75049C9.75 4.99361 10.7573 6.00049 12 6.00049Z" fill="currentColor"></path></g>
</svg>

                    </i>
                    <span class="block m-right-auto">My Team</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
                 {{-- new link --}}
                <div class="link pc-pointer no-select p-15px border-bottom-color-primary-05 border-bottom-style-solid border-bottom-width-1px w-full row space-between align-center g-10">
                    <i class="c-primary-lighter">
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
  <g fill="currentColor">
    <path d="M23.364,18.448c-.736,0-1.333-.595-1.333-1.33,0-.735,.596-1.33,1.332-1.331s1.333,.595,1.333,1.33c0,.734-.597,1.33-1.332,1.331m-14.728,0c-.736,0-1.333-.595-1.333-1.33s.596-1.33,1.332-1.331c.736,0,1.333,.595,1.333,1.33,0,.734-.597,1.33-1.332,1.331m15.206-8.013l2.663-4.605c.153-.265,.063-.603-.202-.756-.265-.153-.604-.062-.757,.202h0l-2.697,4.663c-2.062-.94-4.378-1.463-6.849-1.463s-4.787,.524-6.849,1.463l-2.696-4.663c-.153-.265-.492-.355-.757-.203-.265,.153-.356,.491-.203,.756h0l2.663,4.605C3.585,12.918,.458,17.54,0,23H32c-.458-5.46-3.585-10.082-8.158-12.565"></path>
  </g>
</svg>

                    </i>
                    <span class="block m-right-auto">Download App</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>

                 {{-- new link --}}
                <div onclick="Redirect('{{ url('users/password/update') }}')" class="link pc-pointer no-select p-15px w-full row space-between align-center g-10">
                   <i class="c-primary-lighter">
                     <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
  <title>lock</title>
  <g fill="currentColor"><path fill-rule="evenodd" clip-rule="evenodd" d="M34 11.2273L34 21.5H31V11.2295C30.987 7.20529 27.8248 4.01444 24 4C20.1752 4.01444 17.0129 7.20533 17 11.2296V21.5H14V11.2273C14.008 5.75672 18.4619 1.01716 23.9953 1C29.4834 1 33.986 5.81383 34 11.2273Z" fill="currentColor"></path> <path fill-rule="evenodd" clip-rule="evenodd" d="M12 18C8.68629 18 6 20.6863 6 24V40C6 43.3137 8.68629 46 12 46H36C39.3137 46 42 43.3137 42 40V24C42 20.6863 39.3137 18 36 18H12ZM19 30C19 27.2386 21.2386 25 24 25C26.7614 25 29 27.2386 29 30C29 32.2388 27.5286 34.134 25.5 34.7711V39H22.5V34.7711C20.4714 34.134 19 32.2388 19 30Z" fill="currentColor"></path></g>
</svg>
                   </i>
                    <span class="block m-right-auto">Reset Password</span>
                    <i>
                        <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                    </i>
                </div>
               
           </div>
           <div class="box-shadow border-style-solid border-color-red border-width-1px bg-black-transparent c-red column br-15px w-full">
              {{-- new link --}}
                <div onclick="window.location.href='{{ url('users/logout') }}'" class="link pointer pc-pointer no-select p-15px p-x-25px w-full row justify-center align-center g-10">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
  <title>circle-logout</title>
  <g fill="currentColor"><path d="M14.5001 12H2.50006H3.00006" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M14.5001 12H2.50006H3.00006" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M14.5001 12H2.50006H3.00006" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M14.5001 12H2.50006H3.00006" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.50009 16L2.50003 12L6.50005 8.00001" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.50009 16L2.50003 12L6.50005 8.00001" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.50009 16L2.50003 12L6.50005 8.00001" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M6.50009 16L2.50003 12L6.50005 8.00001" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 1C18.075 1.00011 23 5.92494 23 12C23 18.0751 18.075 22.9999 12 23C9.66364 22.9999 7.49571 22.2701 5.71387 21.0273L7.15527 19.5859C8.55385 20.4811 10.2155 21 12 21C16.9705 20.9999 21 16.9705 21 12C21 7.02951 16.9705 3.00011 12 3C10.2157 3.00005 8.55376 3.51816 7.15527 4.41309L5.71387 2.97168C7.49563 1.72908 9.66384 1.00005 12 1Z" fill="currentColor" data-stroke="none" stroke="none"></path></g>
</svg>
                    <span class="block">Logout</span>
                     
                </div>
           </div>
        </section>
    </section>
@endsection