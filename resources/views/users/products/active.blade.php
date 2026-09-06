@extends('layout.users.app')
@section('title')
    Active Products
@endsection
@section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">My Assets</span>
        <span></span>

    </div>
@endsection
@section('main')
    <section class="w-full column g-10">
      <div class="column bg-black-transparent br-15px p-15px border-width-1px border-style-solid border-color-primary-09">
        {{-- new row --}}
        <div class="row  space-between align-center pointer g-10px w-full">
            <div class="column g-10px">
                <span class="opacity-07">Total Shares purchased</span>
                <strong class="desc font-weight-900 c-primary-lighter">{{ number_format($total) }}</strong>
            </div>
            <img src="{{ asset('photos/IMG_1079.png') }}" alt="" class="no-shrink w-70px">
        </div>
        {{-- new  --}}
        <div class="w-full row g-10px align-center space-between m-top-20px p-15px br-10px bg-black-transparent border-width-1px border-style-solid border-color-primary-09">
           {{-- new element --}}
            <div style="max-width:calc(100% / 2)" class="w-full p-right-10px overflow-hidden row justify-center g-5px align-center border-right-width-1px border-right-style-solid border-right-color-primary-09">
                <div class="h-30px w-30px no-shrink br-5px c-primary-lighter column align-center justify-center border-width-1px border-style-solid border-color-primary-09 bg-primary-01">
<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 18 18">
  <g fill="currentColor">
    <rect x="12.5" y="2" width="4" height="14" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="7" y="7" width="4" height="9" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <rect x="1.5" y="11" width="4" height="5" rx="1.75" ry="1.75" fill="currentColor"></rect>
    <path d="M2.75,9.5c.192,0,.384-.073,.53-.22l4.72-4.72v.689c0,.414,.336,.75,.75,.75s.75-.336,.75-.75V2.75c0-.414-.336-.75-.75-.75h-2.5c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75h.689L2.22,8.22c-.293,.293-.293,.768,0,1.061,.146,.146,.338,.22,.53,.22Z" fill="currentColor"></path>
  </g>
</svg>

                </div>
                {{-- new column --}}
                <div class="column overflow-hidden">
                    <small class="opacity-08 ws-nowrap text-overflow-ellipsis">Active Shares</small>
                    <strong class="font-weight-800 ws-nowrap text-overflow-ellipsis font-size-1rem">{{ number_format($active_assets) }}</strong>
                </div>
            </div>
             {{-- new element --}}
            <div style="max-width:calc(100% / 2)" class="w-full overflow-hidden p-right-10px row justify-center g-5px align-center">
                <div class="h-30px w-30px no-shrink br-5px c-primary-lighter column align-center justify-center border-width-1px border-style-solid border-color-primary-09 bg-primary-01">
<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <g fill="currentColor">
    <rect x="1" y="20" width="22" height="2" fill="currentColor" stroke-width="0"></rect>
    <rect x="1" y="7" width="6" height="11" stroke-width="0" fill="currentColor"></rect>
    <rect x="9" y="2" width="6" height="16" stroke-width="0" fill="currentColor"></rect>
    <rect x="17" y="11" width="6" height="7" stroke-width="0" fill="currentColor"></rect>
  </g>
</svg>

                </div>
                {{-- new column --}}
                <div class="column overflow-hidden">
                    <small class="opacity-08 ws-nowrap text-overflow-ellipsis">Completed Shares</small>
                    <strong class="font-weight-800 ws-nowrap text-overflow-ellipsis font-size-1rem">{{ number_format($completed_assets) }}</strong>
                </div>
            </div>
           
        </div>
      </div>
       <div class="w-full column g-10">
        <span class="cd"></span>
       
        <section x-data="{ 
            Shares : 'active'
         }" style="grid-template-columns:repeat(auto-fit,minmax(min(400px,100%),1fr))" class="w-full g-10 place-center grid">
               <div style="width:80%;" class="w-semi-full row no-select max-w-500px br-1000px m-x-auto p-5px border-width-1px border-style-solid border-color-primary-05">
      <div x-bind:style="Shares == 'active' ? {
        'background' : 'var(--primary)',
        'color' : 'var(--primary-text)'
      } : {}" x-on:click="Shares = 'active'" class="w-full pointer br-inherit row align-center justify-center p-5px">
        Active Shares
      </div>
       <div x-bind:style="Shares == 'completed' ? {
        'background' : 'var(--primary)',
        'color' : 'var(--primary-text)'
      } : {}" x-on:click="Shares = 'completed'" class="w-full pointer br-inherit row align-center justify-center p-5px">
       Completed Shares
      </div>
     </div>
     {{-- active packages --}}
      @if ($active_packages->isEmpty())
            <div x-show="Shares == 'active'" class="w-full grid-full column align-center justify-center">
             @include('components.utilities',[
              'empty' => 'true',
              'text' => 'No active shares'
            ])
           </div>
        @else
            @foreach ($active_packages as $data)
            <div x-data="{ 
                ShareType : '{{ $data->package->vip_level }}',
                Height : 0
             }" x-bind:style="ShareType != 'regular' ? {
                'margin-top' : (Height / 2) + 'px'
             } : {}" x-show="Shares == 'active'" class="w-full column pos-relative p-20px br-15px g-10px bg-black-transparent border-width-1px border-style-solid border-color-primary-05 pos-relative box-shadow">
              @if ($data->package->vip_level != 'regular')
               <div x-init="$nextTick(() => {
                Height = $el.offsetHeight;
               })" style="top:0;position:absolute;transform:translateY(-50%);background:linear-gradient(to right,rgb(0,255,0),rgb(217, 255, 0));color:black;" class="w-fit no-select p-5px p-x-20px br-10px">
                VIP Share
               </div>
              @endif
                {{-- new row --}}
                <div class="row align-center g-10px space-between">
                     <strong class="font-size-1 font-weight-900">{{ $data->package->name }}</strong>
                    <div style="color:rgb(0,255,0);border-color:rgb(0,155,0)" class="row bg-green-transparent border-width-1px border-style-solid border-color-green align-center g-5px br-10px p-x-10px p-5px">
                        Active
                    </div>
                </div>
               {{-- new column --}}
               <div class="w-full column g-5px">
                  {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">WTT Stake</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->cost) }}</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Maturity</span>
                    <strong class="font-weight-900 c-primary-lighter">{{ number_format($data->package->validity) }} Days</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Gross Return</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->earning * $data->package->validity) }}</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Gross Interest</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->earning*$data->package->validity - $data->package->cost) }}</strong>
                </div>
                
                {{-- new element --}}
                <div class="row m-top-10px align-center space-between g-10px w-full">
                    <span>Progress</span>
                    <strong class="c-primary-lighter font-weight-900">
                        {{ $data->package->validity - $data->cycle }} / {{ $data->package->validity }} Day{{ $data->package->validity > 1 ? 's' : '' }}
                    </strong>
                </div>
                <div class="w-full row align-center br-1000px overflow-hidden bg-rgt-02 h-5px">
                    <div style="width:{{ (($data->package->validity - $data->cycle) / $data->package->validity)*100 }}%;background:linear-gradient(to right,var(--primary-light),var(--secondary))" class="h-full br-inherit">

                    </div>
                </div>
               </div>
               
              
             
            </div>
               
            @endforeach
            @endif
            
            {{-- completed packages --}}
             @if ($completed_packages->isEmpty())
           <div x-show="Shares == 'completed'" class="w-full grid-full column align-center justify-center">
             @include('components.utilities',[
              'empty' => 'true',
              'text' => 'No completed shares'
            ])
           </div>
        @else
             @foreach ($completed_packages as $data)
              <div x-data="{ 
                ShareType : '{{ $data->package->vip_level }}',
                Height : 0
             }" x-bind:style="ShareType != 'regular' ? {
                'margin-top' : (Height / 2) + 'px'
             } : {}" x-show="Shares == 'completed'" class="w-full column pos-relative p-20px br-15px g-10px bg-black-transparent border-width-1px border-style-solid border-color-primary-05 pos-relative box-shadow">
              @if ($data->package->vip_level != 'regular')
               <div x-init="$nextTick(() => {
                Height = $el.offsetHeight;
               })" style="top:0;position:absolute;transform:translateY(-50%);background:linear-gradient(to right,rgb(0,255,0),rgb(217, 255, 0));color:black;" class="w-fit no-select p-5px p-x-20px br-10px">
                VIP Share
               </div>
              @endif   {{-- new row --}}
                <div class="row align-center g-10px space-between">
                     <strong class="font-size-1 font-weight-900">{{ $data->package->name }}</strong>
                    <div style="color:rgb(0, 247, 255);border-color:rgb(0, 247, 255);background:rgb(0, 247, 255,0.1)" class="row border-width-1px border-style-solid border-color-green align-center g-5px br-10px p-x-10px p-5px">
                        Completed
                    </div>
                </div>
               {{-- new column --}}
               <div class="w-full column g-5px">
                  {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">WTT Stake</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->cost) }}</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Maturity</span>
                    <strong class="font-weight-900 c-primary-lighter">{{ number_format($data->package->validity) }} Days</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Gross Return</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->earning * $data->package->validity) }}</strong>
                </div>
                 {{-- new row --}}
                <div class="row w-full align-center space-between g-10px">
                    <span class="opacity-07">Gross Interest</span>
                    <strong class="font-weight-900 c-primary-lighter">&#8361;{{ number_format($data->package->earning*$data->package->validity - $data->package->cost) }}</strong>
                </div>
                
                {{-- new element --}}
                <div class="row m-top-10px align-center space-between g-10px w-full">
                    <span>Progress</span>
                    <strong class="c-primary-lighter font-weight-900">
                        {{ $data->package->validity - $data->cycle }} / {{ $data->package->validity }} Day{{ $data->package->validity > 1 ? 's' : '' }}
                    </strong>
                </div>
                <div class="w-full row align-center br-1000px overflow-hidden bg-rgt-02 h-5px">
                    <div style="width:{{ (($data->package->validity - $data->cycle) / $data->package->validity)*100 }}%;background:linear-gradient(to right,var(--primary-light),var(--secondary))" class="h-full br-inherit">

                    </div>
                </div>
               </div>
               
              
             
            </div>
               
            @endforeach
        @endif

        </section>
        
       </div>
    </section>

    
@endsection
@section('js')
   
@endsection