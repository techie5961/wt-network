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
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            display:flex;
            flex-direction: column;
            align-items: center;
            background:var(--bg);
            padding:20px;
            justify-content:center;
          
        }
        form{
           position:relative;
            padding: 15px;
            border-radius:20px;
            background:var(--primary-005);
            border:1px solid var(--primary);
            overflow:hidden;
            clip-path: inset(0 round 20px);

        }
        form::before{
            content:'';
            position:absolute;
            top:0;
            left:0;
            background:var(--primary);
            aspect-ratio:1;
            width:50%;
            z-index:50;
            filter:blur(100px);
            -webkit-filter: blur(100px);

        }

        form > div{
          position:relative;
          z-index:100;
        }
        .cont{
            border:1px solid var(--primary);
            padding:5px;
            background:rgba(0,0,0,0.2);
            height:40px;
        }
        button.post{
           background:linear-gradient(to bottom, var(--primary-light),var(--primary-dark));
           border:1px solid var(--primary-lighter);
           color:white;
        }
       
      
    </style>
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
    <header>

    </header>
    <main>
        {{-- yield main --}}
       
          @yield('main')
    </main>
    <footer>

    </footer>
  @include('components.utilities',[
    'vite_js' => true
  ])
  {{-- yield js --}}
    @yield('js')
</body>
</html>