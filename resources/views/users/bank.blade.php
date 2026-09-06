@extends('layout.users.app')
@section('title')
    Bank Details
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
        <span class="font-weight-700 font-size-1rem">Add Bank</span>
        <span></span>

    </div>
@endsection
@section('main')
     <section x-data="{ 
        Bankselected : false,
        BankOverlay : false,
        Bank : {
            Code : '',
            Name : ''
        },
        AccountVerified : false,
        AccountNumber : '',
        AccountName : '',
        IsChanged : 0,
        Verifying : false,
        VerifyError : false
      }" x-init="
     
      $watch('AccountNumber', (value) => {
        if(value.length == 10){
            IsChanged++;
        }
      });
      $watch('Bank.Code', (value) => {
        if(value != ''){
            IsChanged++;
        }
      });
      $watch('IsChanged', (value) => {
        if(Bank.Code != '' && AccountNumber.length == 10){
            Verifying = true;
            VerifyError = false;
            AccountVerified = false;
            AccountName = '';
            SendGetRequest('{{ url('users/get/korapay/bank/verify') }}',{
                'account_number' : AccountNumber,
                'bank_code' : Bank.Code
            },function(response,error){
                Verifying = false; 
              let data=JSON.parse(response);
              if(data.status == 'success'){
                AccountVerified = true;
                AccountName = data.message;
              }else{
                VerifyError= true;
              }

              if(error){
                CreateNotify('error','Internal server error, please try again')
              }
            });
        }
      })
      " class="w-full g-10px column">
      <section class="w-full main-body group transition-all column g-10px">
         <section class="column w-full g-10px">
          
          @isset(Auth::guard('users')->user()->bank)

            <div class="w-full pos-relative bg-primary-02 overflow-hidden column g-5px box-shadow border-width-1px border-style-solid border-color-primary max-w-500 m-x-auto br-15px p-15px column g-10">
              
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
               </div>
            </div>
            @endisset
        </section>
        {{-- new section /body --}}
        <section class="section column w-full g-10px body">
            <form method="POST" action="{{ url('users/post/add/bank/process') }}" x-on:submit="PostRequest(event,$el,function(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                    Vitecss.navigate('{{ $next ? url('users/withdraw') : url()->current() }}');
                
                }
            },null,'Saving....')" class="p-20px w-full br-20px max-w-500 m-x-auto bg-black-transparent border-width-1px border-style-solid border-color-primary-05 column g-10">
               {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
               {{-- new input --}}
                <div x-bind:class="Verifying ? 'no-pointer' : ''" class="column g-5 w-full">
                 <label>Card Number</label>
                <div class="cont">
                    <input x-model="AccountNumber" name="account_number" placeholder="Enter 10-digits account number" inputmode="numeric" type="number" class="inp input required">
                </div>
               </div>
                {{-- new input --}}
                <div x-bind:class="Verifying ? 'no-pointer' : ''" class="column g-5 w-full">
                 <label>Bank Name</label>
               <div class="w-full pos-relative column">
                 <div x-on:click="
                BankOverlay = true;
                " class="no-select pos-relative bank-cont pc-pointer cont">
                <input type="hidden" x-bind:value="Bank.Name" name="bank_name" class="inp input required">
                <input type="hidden" x-bind:value="Bank.Code" name="bank_code" class="inp input required">
                 {{-- new --}}
                 <template x-if="!Bankselected">
                    <div class="row align-center no-select opacity-07 p-10px w-full g-10px space-between">
                        <span>Select bank</span>
                        <i>
                            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path></svg>

                        </i>
                    </div>
                 </template>
                  <template x-if="Bankselected">
                    <div class="row align-center no-select p-10px w-full g-10px space-between">
                        <span x-text="Bank.Name"></span>
                      
                    </div>
                 </template>
                
                </div>
                 {{-- bank overlay --}}
                 <div x-on:click.outside="BankOverlay=false;" x-show="BankOverlay" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" x-data="{ 
                    Search : ''
                  }" style="max-height:50vh;max-width:75%;top:100%;" class="pos-absolute z-index-4000 transition-all border-width-1px border-style-solid border-color-primary-05 overflow-auto bg max-w-half br-15px left-0">
                    <div class="pos-sticky top-0 left-0 right-0 w-full bg-inherit p-10px">
                        <input x-model="Search" placeholder="Search by bank name..." type="search" class="border-width-1px h-40px border-style-solid border-color-primary-05 br-10px bg-black-transparent">
                    </div>
                    {{-- body --}}
                    <div class="column w-full">
                         @foreach (collect(json_decode(file_get_contents(database_path('data/banks.json'))))->sortBy('name') as $data)
                <div x-bind:style="'{{ $data->name }}'.includes(Search) ? {} : {
                    'display' : 'none'
                }" x-on:touchstart="$el.classList.add('bg-rgt-01')" x-on:touchend="$el.classList.remove('bg-rgt-01')" x-on:click="
                Bank.Code = '{{ $data->code }}';
                Bank.Name = '{{ $data->name }}';
                Bankselected = true;
                BankOverlay=false;
                Search = '';
                " class="p-15px p-y-10px row align-center">
                    
                    <span class="font-size-07">{{ $data->name }}</span>
                </div>
            @endforeach
                        
                    </div>
                 </div>
               </div>
                 {{-- new --}}
               <div style="color:#4caf50;" x-show="Verifying" class="p-5px row align-center g-5px w-fit font-size-07 m-left-auto p-x-10px br-5px bg-green-transparent no-select no-pointer c-green font-weight-700">
               <?xml version="1.0" encoding="utf-8"?><svg height="15" width="15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

                Verifying...
               </div>
               </div>
               <div x-show="VerifyError" class="p-10px br-10px bg-red-transparent c-red no-select no-pointer">We could not verify this account, please check the details and try again</div>
              
               {{-- new input --}}
                <div x-show="AccountVerified" class="column g-5 w-full">
                 <label>Account Name</label>
                <div class="cont">
                  <input readonly x-bind:value="AccountName" name="account_name" type="text" placeholder="Enter account name" class="inp input required">
                </div>
               </div>
              
             <button style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));height:40px;" x-bind:class="!AccountVerified ? 'disabled' : ''" class="post">Save</button>
            </form>
         
            
        </section>
    </section>
  
</section>
@endsection
