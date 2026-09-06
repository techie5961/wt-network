@extends('layout.users.auth')
@section('title')
   Login
@endsection

@section('main')
    <section class="w-full align-center justify-center column g-10">
       
        <form x-data="{ 
            
         }" action="{{ url('users/post/login/process') }}" method="POST" x-on:submit="
         PostRequest($event,$el,function(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                window.location.href='{{ url('users/dashboard') }}'
            }
         })
         " class="w-full max-w-500 column g-10">
           <div class="column w-full align-center">
             {{-- logo --}}
            <img src="{{ asset(config('settings.logo')) }}" style="width:clamp(100px,40%,300px)" class="m-x-auto no-select no-pointer">
            <strong class="desc m-x-auto font-weight-900">Login</strong>
            <span class="opacity-07">Sign in to continue</span>
           </div>
            <div class="column g-10 w-full">
            {{-- csrf token --}}
            <input type="hidden" value="{{ @csrf_token() }}" name="_token" class="inp input">
          {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Phone Number or Email</label>
            <div class="cont">
                
                <input name="id" type="text" placeholder="Enter registered phone number or email" class="inp input required">
            </div>
           </div>
           {{-- new input --}}
            <div class="column g-5 w-full">
            <label>Password</label>
            <div x-data="{ 
                InputType : 'password'
             }" class="cont">
                 
                <input x-bind:type="InputType" name="password" placeholder="Enter your password" class="inp input required">
            <i x-on:click="InputType = (InputType == 'password' ? 'text' : 'password')" class="row h-full perfect-square c-primary-lighter align-center justify-center">
                <svg x-show="InputType == 'password'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M4.52047 5.93457L1.39366 2.80777L2.80788 1.39355L22.6069 21.1925L21.1927 22.6068L17.8827 19.2968C16.1814 20.3755 14.1638 21.0002 12.0003 21.0002C6.60812 21.0002 2.12215 17.1204 1.18164 12.0002C1.61832 9.62282 2.81932 7.5129 4.52047 5.93457ZM14.7577 16.1718L13.2937 14.7078C12.902 14.8952 12.4634 15.0002 12.0003 15.0002C10.3434 15.0002 9.00026 13.657 9.00026 12.0002C9.00026 11.537 9.10522 11.0984 9.29263 10.7067L7.82866 9.24277C7.30514 10.0332 7.00026 10.9811 7.00026 12.0002C7.00026 14.7616 9.23884 17.0002 12.0003 17.0002C13.0193 17.0002 13.9672 16.6953 14.7577 16.1718ZM7.97446 3.76015C9.22127 3.26959 10.5793 3.00016 12.0003 3.00016C17.3924 3.00016 21.8784 6.87992 22.8189 12.0002C22.5067 13.6998 21.8038 15.2628 20.8068 16.5925L16.947 12.7327C16.9821 12.4936 17.0003 12.249 17.0003 12.0002C17.0003 9.23873 14.7617 7.00016 12.0003 7.00016C11.7514 7.00016 11.5068 7.01833 11.2677 7.05343L7.97446 3.76015Z"></path></svg>
                <svg x-show="InputType == 'text'" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="16" width="16"><path d="M1.18164 12C2.12215 6.87976 6.60812 3 12.0003 3C17.3924 3 21.8784 6.87976 22.8189 12C21.8784 17.1202 17.3924 21 12.0003 21C6.60812 21 2.12215 17.1202 1.18164 12ZM12.0003 17C14.7617 17 17.0003 14.7614 17.0003 12C17.0003 9.23858 14.7617 7 12.0003 7C9.23884 7 7.00026 9.23858 7.00026 12C7.00026 14.7614 9.23884 17 12.0003 17ZM12.0003 15C10.3434 15 9.00026 13.6569 9.00026 12C9.00026 10.3431 10.3434 9 12.0003 9C13.6571 9 15.0003 10.3431 15.0003 12C15.0003 13.6569 13.6571 15 12.0003 15Z"></path></svg>

            </i>
            </div>
           </div>
          <div x-on:click="Checked = !Checked" x-data="{ 
                Checked : false
             }" class="row m-bottom-10px g-5px">
            <div x-bind:class="Checked ? 'bg-primary-lighter primary-text' : ''" class="h-15px column align-center justify-center w-15px no-shrink br-3px border-width-1px border-style-solid border-color-rgt-02">
<svg x-show="Checked" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="10" width="10"><path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z"></path></svg>

            </div>
            <span>Remember me</span>
          </div>
            
         
           <span class="block m-x-auto">No account? <span x-on:click="Vitecss.navigate('{{ url('register') }}')" class="c-primary-lighter no-select pointer">Register</span></span>
           <button class="post">Login</button>
      
    </div>
  </form>
    </section>
@endsection
