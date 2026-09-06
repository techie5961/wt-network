@extends('layout.users.app')
@section('title')
    Update Password
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
        <span class="font-weight-700 font-size-1rem">Reset Password</span>
        <span></span>

    </div>
@endsection
@section('main')
     <section class="w-full column">
       
        {{-- new section /body --}}
        <section class="section g-10px column p-20px body">
           
            <form action="{{ url('users/post/update/password/process') }}" onsubmit="PostRequest(event,this,Updated)" class="max-w-500 m-x-auto border-width-1px border-style-solid border-color-primary-05 bg-black-transparent column w-full p-20px br-20px box-shadow g-10">
               {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Current Password</label>
                <div class="cont">
                    <input name="current" placeholder="Current password"  autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" type="password" class="inp input required">
                </div>
               </div>
                {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>New Password</label>
               <div class="cont">
                    <input name="new" placeholder="Enter new password" type="password" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="inp input required">
                </div>
               </div>
               {{-- new input --}}
                <div class="column g-5 w-full">
                 <label>Confirm New Password</label>
               <div class="cont">
                    <input name="confirm" placeholder="Enter password again" type="password" autocomplete="new-password" readonly onfocus="this.removeAttribute('readonly')" class="inp input required">
                </div>
               </div>
              
             <button style="border:1px solid var(--primary-light);background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));height:40px;" x-bind:class="!AccountVerified ? 'disabled' : ''" class="post">Confirm</button>
            </form>
        

            
        </section>
    </section>

    
@endsection
@section('js')
    <script class="js">
        function Updated(response){
            let data=JSON.parse(response);
            if(data.status == 'success'){
                Redirect('{{ url()->current() }}');
            }
        }
    </script>
@endsection