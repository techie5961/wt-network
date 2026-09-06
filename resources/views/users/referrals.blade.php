@extends('layout.users.app')
@section('title')
   Team
@endsection
@section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">My Team</span>
        <span></span>

    </div>
@endsection
@section('main')
    <section class="w-full g-10px column">
      
       
        {{-- new section /body --}}
        <section class="section column g-10 body">
          
        @if ($referrals->isEmpty())
            @include('components.utilities',[
                'empty' => true,
                'text' => 'No referral yet',
                'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="50" width="50"><path d="M12 10C14.2091 10 16 8.20914 16 6 16 3.79086 14.2091 2 12 2 9.79086 2 8 3.79086 8 6 8 8.20914 9.79086 10 12 10ZM5.5 13C6.88071 13 8 11.8807 8 10.5 8 9.11929 6.88071 8 5.5 8 4.11929 8 3 9.11929 3 10.5 3 11.8807 4.11929 13 5.5 13ZM21 10.5C21 11.8807 19.8807 13 18.5 13 17.1193 13 16 11.8807 16 10.5 16 9.11929 17.1193 8 18.5 8 19.8807 8 21 9.11929 21 10.5ZM12 11C14.7614 11 17 13.2386 17 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5 15.9999C5 15.307 5.10067 14.6376 5.28818 14.0056L5.11864 14.0204C3.36503 14.2104 2 15.6958 2 17.4999V21.9999H5V15.9999ZM22 21.9999V17.4999C22 15.6378 20.5459 14.1153 18.7118 14.0056 18.8993 14.6376 19 15.307 19 15.9999V21.9999H22Z"></path></svg>'
            ])
        @else
            <div class="w-full grid place-center g-10 pc-grid-2">
                @foreach ($referrals as $data)
                    <div class="w-full border-width-1px border-style-solid border-color-primary-05 box-shadow column g-10 bg-black-transparent br-15px p-15px">
                        {{-- new row --}}
                       <div class="row w-full g-10px align-center space-between">
                        
                        <div class="row align-center g-5px">
                            <span class="opacity-07">ID:</span>
                         <strong>{{ $data->uniqid }}</strong>

                        </div>
        <div class="p-5px p-x-10px br-10px" style="{{ $data->status == 'active' ? 'border:1px solid rgb(0,255,0);color:rgb(0,255,0);' : 'border:1px solid var(--primary-lighter);color:var(--primary-lighter)' }}">{{ $data->status }}</div>
                   
                       </div>
                       <div class="hr" style="border-color:var(--primary-05)" vitecss-type="solid"></div>
                        {{-- new row --}}
                       <div class="row w-full space-between g-10 align-center">
                        <span class="opacity-07">Registered </span>
                        <span class="font-weight-900 c-primary-lighter">{{ $data->date }}</span>
                       </div>
                       {{-- new row --}}
                       <div class="row w-full space-between g-10 align-center">
                        <span class="opacity-07">Total Products </span>
                        <span class="font-weight-900 c-primary-lighter">{{ number_format($data->products) }}</span>
                       </div>
                       
                    </div>
                @endforeach
            </div>
        @endif
          @if ($referrals->lastPage() > 1)
              @include('components.utilities',[
                'data' => $referrals,
                'paginate' => true
              ])
          @endif

            
        </section>
    </section>

@endsection