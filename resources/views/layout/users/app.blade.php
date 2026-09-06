<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
      @include('components.utilities',[
    'vite_js' => true
  ])
  <script>
    function Redirect(url,element=false){
        if(element){
            element.classList.add('animate');

            element.addEventListener('animationend',()=>{
                element.classList.remove('animate');
            })
        }
       Vitecss.navigate(url);
    }
    window.addEventListener('load',()=>{
        document.body.style.paddingBottom=document.querySelector('footer').offsetHeight + 'px';
    })
  </script>
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            background:var(--bg);
            color:var(--text);
        }
        body{
            background:var(--primary);
            color:var(--primary-text);
        }
       header{
        background:var(--bg);
       }
        header.overlayed,.group.overlayed{
                transform:translateY(5px) scale(0.95);
        }
        header.overlayed{
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }
        .cont{
            height:40px;
            border:1px solid var(--primary-05);
            background:rgb(0,0,0,0.5)
        }
       button.post{
        color:var(--primary-text);
       }
        @media(min-width:800px){
            footer,main,header{
                padding-left:15vw;
                padding-right:15vw;
            }
        }
       
    </style>

    {{-- yield css --}}
     @yield('css')
     {{-- stack css --}}
     @stack('css')
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])  
{{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
        <header class="transition-all">
   @hasSection ('header')
       @yield('header')
 
   @endif
    </header>

    <main>
        
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer class="pos-fixed bottom-0 left-0 right-0 z-index-3000 row align-center bg space-between br-top-right-15px p-10px br-top-left-15px overflow-hidden border-top-width-1px border-top-style-solid border-top-color-primary-08">
        {{-- new nav link --}}
        @php
            $url= url('users/dashboard')
        @endphp
       <div x-on:click="Vitecss.navigate('{{ $url }}')" class="w-full {{ url()->current() == $url ? 'c-primary-lighter' : '' }} pc-pointer no-select column align-center justify-center g-5px">
        @if ($url == url()->current())
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 20C20 20.5523 19.5523 21 19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20ZM11 13V19H13V13H11Z"></path></svg>
        @else
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M19 21H5C4.44772 21 4 20.5523 4 20V11L1 11L11.3273 1.6115C11.7087 1.26475 12.2913 1.26475 12.6727 1.6115L23 11L20 11V20C20 20.5523 19.5523 21 19 21ZM13 19H18V9.15745L12 3.7029L6 9.15745V19H11V13H13V19Z"></path></svg>
       
        @endif
        <small>Home</small>
        @if ($url == url()->current())
            <div style="width:30%" class="h-2px br-1000px bg-primary-lighter"></div>
        @else
            <div style="width:30%" class="h-2px br-1000px"></div>
            
        @endif
       </div>
         {{-- new nav link --}}
        @php
            $url= url('users/invite')
        @endphp
       <div x-on:click="Vitecss.navigate('{{ $url }}')" class="w-full {{ url()->current() == $url ? 'c-primary-lighter' : '' }} pc-pointer no-select column align-center justify-center g-5px">
        @if ($url == url()->current())
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14 14.252V22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>
        @else
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M14 14.252V16.3414C13.3744 16.1203 12.7013 16 12 16C8.68629 16 6 18.6863 6 22H4C4 17.5817 7.58172 14 12 14C12.6906 14 13.3608 14.0875 14 14.252ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.21 11 16 9.21 16 7C16 4.79 14.21 3 12 3C9.79 3 8 4.79 8 7C8 9.21 9.79 11 12 11ZM18 17V14H20V17H23V19H20V22H18V19H15V17H18Z"></path></svg>

        @endif
        <small>Invite</small>
        @if ($url == url()->current())
            <div style="width:30%" class="h-2px br-1000px bg-primary-lighter"></div>
        @else
            <div style="width:30%" class="h-2px br-1000px"></div>
            
        @endif
       </div>
          {{-- new nav link --}}
        @php
            $url= url('users/products/active')
        @endphp
       <div x-on:click="Vitecss.navigate('{{ $url }}')" class="w-full {{ url()->current() == $url ? 'c-primary-lighter' : '' }} pc-pointer no-select column align-center justify-center g-5px">
        @if ($url == url()->current())
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <rect x="12.5" y="2" width="4" height="14" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="7" y="7" width="4" height="9" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="1.5" y="11" width="4" height="5" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <path d="M2.75,9.5c.192,0,.384-.073,.53-.22l4.72-4.72v.689c0,.414,.336,.75,.75,.75s.75-.336,.75-.75V2.75c0-.414-.336-.75-.75-.75h-2.5c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.689L2.22,8.22c-.293,.293-.293,.768,0,1.061,.146,.146,.338,.22,.53,.22Z" fill="currentColor"></path>
  </g>
</svg>   
     @else
<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 18 18">
  <g fill="currentColor">
    <rect x="13.25" y="2.75" width="2.5" height="12.5" rx="1" ry="1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></rect>
    <rect x="7.75" y="7.75" width="2.5" height="7.5" rx="1" ry="1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></rect>
    <rect x="2.25" y="11.75" width="2.5" height="3.5" rx="1" ry="1" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></rect>
    <polyline points="6.25 2.75 8.75 2.75 8.75 5.25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></polyline>
    <line x1="8.5" y1="3" x2="2.75" y2="8.75" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"></line>
  </g>
</svg>
        @endif
        <small>Shares</small>
        @if ($url == url()->current())
            <div style="width:30%" class="h-2px br-1000px bg-primary-lighter"></div>
        @else
            <div style="width:30%" class="h-2px br-1000px"></div>
            
        @endif
       </div>
        
          {{-- new nav link --}}
        @php
            $url= url('users/profile')
        @endphp
       <div x-on:click="Vitecss.navigate('{{ $url }}')" class="w-full {{ url()->current() == $url ? 'c-primary-lighter' : '' }} pc-pointer no-select column align-center justify-center g-5px">
        @if ($url == url()->current())
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z"></path></svg>
        @else
<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M20 22H18V20C18 18.3431 16.6569 17 15 17H9C7.34315 17 6 18.3431 6 20V22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13ZM12 11C14.2091 11 16 9.20914 16 7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7C8 9.20914 9.79086 11 12 11Z"></path></svg>

        @endif
        <small>Profile</small>
        @if ($url == url()->current())
            <div style="width:30%" class="h-2px br-1000px bg-primary-lighter"></div>
        @else
            <div style="width:30%" class="h-2px br-1000px"></div>
            
        @endif
       </div>
        

    </footer>
  {{-- yield js --}}
    @yield('js')
    {{-- stack js --}}
    @stack('js')
    
</body>
</html>