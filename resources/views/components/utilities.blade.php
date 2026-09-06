{{-- meta tags --}}
@isset($meta_tags)
     <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="apple-mobile-web-app-title" content="ProfitPort" />
<meta name="format-detection" content="telephone=no">

@endisset
{{-- favicon tags --}}
@isset($favicon)
<link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
<link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
<link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />
<meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}" />
<link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />
@endisset

{{-- vite css --}}
@isset($vite_css)
    <link rel="stylesheet" href="{{ asset('vitecss/fonts/fonts.css?v='.md5_file(public_path('vitecss/fonts/fonts.css')).'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/var.css?v='.md5_file(public_path('vitecss/css/var.css')).'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/app.min.css?v='.md5_file(public_path('vitecss/css/app.min.css')).'') }}">
    <link rel="stylesheet" href="{{ asset('vitecss/css/restyle.css?v='.md5_file(public_path('vitecss/css/restyle.css')).'') }}">
  
@endisset

{{-- vite js --}}
@isset($vite_js)
          <script src="{{ asset('vitecss/js/app.min.js?v='.md5_file(public_path('vitecss/js/app.min.js')).'') }}"></script>
@endisset

{{-- action loader --}}
@isset($action_loader)
    <div style="z-index:20000" class="pos-fixed action-loader display-none column justify-center align-center top-0 bottom-0 left-0 right-0 gbg-black-transparent">
        <div style="background: rgba(0,0,0,0.7)" class="p-20 w-fit align-center justify-center perfect-square c-white column g-10 br-primary">
           <svg height="50" width="50" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M2,12A10.94,10.94,0,0,1,5,4.65c-.21-.19-.42-.36-.62-.55h0A11,11,0,0,0,12,23c.34,0,.67,0,1-.05C6,23,2,17.74,2,12Z"><animateTransform attributeName="transform" type="rotate" dur="0.6s" values="0 12 12;360 12 12" repeatCount="indefinite"/></path></svg>

            <span class="font-1">Loading....</span>
        </div>
    </div>
@endisset

{{-- null/empty --}}
@isset($empty)
 <div style="margin-top:30px;margin-bottom:30px;" class="column no-select g-10 w-full grid-full align-center text-center justify-center">
                <span>
             {{-- @isset($icon)
             {!! $icon !!}
                 @else --}}
                    <img src="{{ asset('assets/IMG_1390.png') }}" alt="" class="no-pointer h-100px">
             {{-- @endisset --}}
                </span>
                <span>{{ $text ?? 'No Record Found' }}</span>
            </div>
@endisset
{{-- paginate --}}
 @isset($paginate)
     <div class="paginate">
           <div class="row align-center g-10 m-left-auto w-fit">
             <div onclick="spa('{{ url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => $data->currentPage() - 1])) }}')" class="action-btn {{ $data->currentPage() <= 1 ? 'disabled' : '' }} previous">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M168.49,199.51a12,12,0,0,1-17,17l-80-80a12,12,0,0,1,0-17l80-80a12,12,0,0,1,17,17L97,128Z"></path></svg>

            </div>
             <div class="action-btn disabled current">
               <span>{{ $data->currentPage() }}</span>  
            </div>
            
             <div onclick="spa('{{ url()->current().'?'.http_build_query(array_merge(request()->query(),['page' => $data->currentPage() + 1])) }}')" class="action-btn {{ $data->currentPage() >= $data->lastPage() ? 'disabled' : '' }} next">
             <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M184.49,136.49l-80,80a12,12,0,0,1-17-17L159,128,87.51,56.49a12,12,0,1,1,17-17l80,80A12,12,0,0,1,184.49,136.49Z"></path></svg>

            </div>
           </div>
        </div>
 @endisset
 {{-- general codes --}}
 @isset($general_codes)
     {{-- loading state --}}
     <div class="loading-state pos-fixed inset-0 z-index-9000 bg c-primary-lighter column align-center justify-center">
<?xml version="1.0" encoding="utf-8"?><svg height="50" width="50" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>

</div>
 @endisset