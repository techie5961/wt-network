@extends('layout.users.auth')
@section('title')
    Register
@endsection

@section('main')
    <section class="w-full align-center justify-center column g-10">
       
        <form x-data="{ 
            Phone : '',
            VerificationCode : ''
         }" action="{{ url('users/post/register/process') }}" method="POST" x-on:submit="
         PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Vitecss.navigate('{{ url('login') }}')
            }
         })
         " class="w-full max-w-500 column g-10">
           <div class="column w-full align-center">
             {{-- logo --}}
            <img src="{{ asset(config('settings.logo')) }}" style="width:clamp(100px,40%,300px)" class="m-x-auto no-select no-pointer">
            <strong class="desc m-x-auto font-weight-900">User Registration</strong>
            <span class="opacity-07">Create your account to continue</span>
           </div>
            <div class="column g-10 w-full">
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
          {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Email Address</label>
            <div class="cont">
                
                <input name="email" type="email" placeholder="Enter your email address" class="inp input required">
            </div>
           </div>
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Phone</label>
            <div class="cont">
                
                <input x-model="Phone" inputmode="numeric" name="phone" type="number" placeholder="Enter your phone number" class="inp input required">
            </div>
           </div>
           {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Password</label>
            <div x-data="{ 
                InputType : 'password'
             }" class="cont">
                 
                <input name="password" x-bind:type="InputType" placeholder="Please create your password" class="inp input required">
            <i x-on:click="InputType = (InputType == 'password' ? 'text' : 'password')" class="row h-full perfect-square c-primary-lighter align-center justify-center">
                <svg x-show="InputType == 'password'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                <svg x-show="InputType == 'text'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>

            </i>
            </div>
           </div>
             {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Confirm Password</label>
            <div x-data="{ 
                InputType : 'password'
             }" class="cont">
                
                <input name="confirm_password" x-bind:type="InputType" placeholder="Re-Enter your password" class="inp input required">
           <i x-on:click="InputType = (InputType == 'password' ? 'text' : 'password')" class="row h-full perfect-square c-primary-lighter align-center justify-center">
                <svg x-show="InputType == 'password'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                <svg x-show="InputType == 'text'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>

            </i>
            </div>
           </div>
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Verification code</label>
            <div class="cont">
                
                <input x-bind:value="VerificationCode" name="verification_code" type="number" readonly placeholder="Click the button to send code" class="inp input required">
           <div x-data="{ 
            Sending : false
            }" x-on:click="
            if(Phone.length != 11){
                CreateNotify('error','Please enter a valid 11 digits phone number');
                return;
            }
            Sending = true;
           SendPostRequest('{{ url('users/post/send/verification/code/process') }}',{
            '_token' : '{{ @csrf_token() }}',
            'phone' : Phone
           },function(response,error){
            if(response){
                let data=JSON.parse(response);
                if(data.status == 'success'){
                VerificationCode = data.message;
                }
               
            }
            if(error){
                CreateNotify('error',error);
            }
            Sending = false;
           })
           " x-bind:style="Sending ? {
            'filter' : 'grayscale(50%)',
            'pointer-events' : 'none'
           } : {}" style="background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));border:1px solid var(--primary-lighter)" class="h-full ws-nowrap p-5px p-x-10px no-select pointer row align-center justify-center g-10px br-inherit">
            <span x-show="!Sending">Send Code</span>
            <span class="row align-center g-4px" x-show="Sending">
                <?xml version="1.0" encoding="utf-8"?><svg height="15" width="15" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

                Sending...</span>
           </div>
            </div>
           </div>
           
           {{-- invite code --}}
           <input type="hidden" class="inp input" name="captcha" value="{{ $captcha }}">
            {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Invite Code</label>
            <div class="cont">
                
                <input {{ $ref != '' ? 'readonly' : '' }} value="{{ $ref }}" name="ref" type="text" placeholder="Invite code" class="inp required input">
            </div>
           </div>
           <span class="block m-x-auto">Already have an account? <span x-on:click="Vitecss.navigate('{{ url('login') }}')" class="c-primary-lighter no-select pointer">Sign In</span></span>
           <button class="post">Sign Up</button>
      
    </div>
  </form>
    </section>
@endsection
