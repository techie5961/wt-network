@extends('layout.users.app')
@section('title')
    Gift Code
@endsection
@section('css')
        <style class="css">
        .white-light{
            animation:rotate 5s linear infinite;
        }
        @keyframes rotate{
            0%{
                transform: rotate(0deg);
            }
            100%{
                transform: rotate(360deg);
            }
        }
         .chest-box{
            animation:breathe 2.5s linear infinite;
        }
        
        @keyframes breathe{
            0%,100%{
                transform: scale(0.9) translate(-50%,-50%);
            }
            50%{
                transform: scale(1) translate(-50%,-50%);
            }
        }
        body{
            overflow:hidden;
        }
    </style>
@endsection

@section('main')

     <section x-data="{ 
        Overlay : true,
        Opened : false
      }" class="w-full align-center justify-center flex-auto column">
     
         
        
            <div style="width:100%;" class="pos-relative perfect-square">
                <img src="{{ asset('photos/0B69B284-D48A-48AF-AA2C-E1DC183CF3DB.png') }}" alt="" class="h-full white-light w-full no-select no-pointer">
                <img src="{{ asset('photos/IMG_1104.png') }}" alt="" class="chest-box pos-absolute" style="width:30%;top:50%;left:50%;">
            </div>
           
      <section x-show="Overlay" style="background:rgba(0,0,0,0.4)" class="pos-fixed column p-20px align-center justify-center inset-0 bg-black-light z-index-4000">
  <form x-transition:leave.duration.500ms method="POST" action="{{ url('users/post/redeem/gift/code/process') }}" x-on:submit="PostRequest($event,$el,function(response){
  let data=JSON.parse(response);
            if(data.status == 'success'){
                Overlay = false;
                Opened = data.value; 
                
            }
  },null,'Confirming...')" style="width:80%;" class="bg-black border-width-1px border-style-solid border-color-primary p-15px br-15px box-shadow max-w-500 m-x-auto column align-center g-10">
                <img src="{{ asset('photos/IMG_1104.png') }}" class="no-select no-pointer" style="width:30%;">
              
                {{-- csrf token --}}
               <input type="hidden" class="input inp required" name="_token" value="{{ @csrf_token() }}">
                {{-- new input --}}
                <div class="column align-center g-5 w-full">
                 <label>Chest Code</label>
                <div class="cont">
                    <input name="code" placeholder="Enter chest code" type="text" class="inp input required">
                </div>
               </div>
                
              <div class="row justify-end w-full align-center h-fit g-10px">
             <button style="border:1px solid var(--primary-light);height:40px;background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));order:2;" class="post">Confirm</button>
           
                <button x-on:click.prevent="Vitecss.navigate('{{ url()->previous() }}')" style="border:1px solid var(--primary-light);height:40px;background:transparent;order:1;" class="post">Go Back</button>

              </div>
            </form>
      </section>


       <section x-show="Opened" style="background:rgba(0,0,0,0.4)" class="pos-fixed column p-20px align-center justify-center inset-0 bg-black-light z-index-4000">
  <div x-transition:leave.duration.500ms style="width:80%;" class="bg-black text-align-center border-width-1px border-style-solid border-color-primary p-15px br-15px box-shadow max-w-500 m-x-auto column align-center g-10">
                <img src="{{ asset('photos/IMG_1079.png') }}" class="no-select no-pointer" style="width:50%;">
              
              <span>Congratulations you successfully opened the chest box</span>
              <strong x-text="Opened" class="desc font-weight-900 c-primary-lighter">
              </strong>
                
              <div class="row justify-end w-full align-center h-fit g-10px">
             <button x-on:click="Opened = false" style="border:1px solid var(--primary-light);height:40px;background:linear-gradient(to bottom,var(--primary-light),var(--primary-dark));order:2;" class="post">Confirm</button>
           
                <button x-on:click.prevent="Vitecss.navigate('{{ url()->previous() }}')" style="border:1px solid var(--primary-light);height:40px;background:transparent;order:1;" class="post">Go Back</button>

              </div>
            </div>
      </section>
    </section>

    
@endsection
