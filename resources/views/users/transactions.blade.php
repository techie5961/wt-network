@extends('layout.users.app')
@section('title')
    Transactions
@endsection
@section('header')
    <div class="w-full p-15px space-between row align-center g-10px">
        <i x-on:click="Vitecss.navigate('{{ url()->previous() }}')" class="c-primary-lighter">
            <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z"></path></svg>

        </i>
        <span class="font-weight-700 font-size-1rem">Transaction History</span>
        <span></span>

    </div>
@endsection
@section('main')
    <section class="w-full g-10px column">
     
        {{-- new section /body --}}
        <section class="section column g-10px w-full body">
         
            @if ($trx->isEmpty())
                @include('components.utilities',[
                    'empty' => true,
                    'text' => 'No Transaction Found'
                ])
            @else
                <div style="grid-template-columns: repeat(auto-fit,minmax(min(100%,400px),1fr))" class="w-full g-10 place-center grid">
                    @foreach ($trx as $data)
                        <div style="box-shadow: 0 0 10px rgba(0,0,0,0.1)" class="w-full g-10px border-width-1px border-style-solid border-color-primary-05 column br-15px p-15px bg-black-transparent">
                            {{-- new row --}}
                            <div style="border-bottom:1px solid var(--primary-05);padding-bottom:10px;" class="row w-full g-10 align-center space-between">
                               {{-- new column --}}
                                <div class="column g-5">
                                    <small class="opacity-07">Transaction ID</small>
                                    <div class="row g-5px">
                                        <span class=" font-size-09">{{ $data->uniqid }}</span>
                                        <i x-data="{ 
                                            Copied : false
                                         }" x-on:click="
                                        copy('{{ $data->uniqid }}');
                                        Copied = true;
                                        setTimeout(()=>{
                                            Copied = false;
                                        },2000)
                                        " class="h-fit row m-top-auto">
                                            <svg x-show="!Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="15" width="15"><path d="M180,64H40A12,12,0,0,0,28,76V216a12,12,0,0,0,12,12H180a12,12,0,0,0,12-12V76A12,12,0,0,0,180,64ZM168,204H52V88H168ZM228,40V180a12,12,0,0,1-24,0V52H76a12,12,0,0,1,0-24H216A12,12,0,0,1,228,40Z"></path></svg>
                                         <svg x-show="Copied" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" class="c-green" fill="CurrentColor" height="15" width="15"><path d="M176.49,95.51a12,12,0,0,1,0,17l-56,56a12,12,0,0,1-17,0l-24-24a12,12,0,1,1,17-17L112,143l47.51-47.52A12,12,0,0,1,176.49,95.51ZM236,128A108,108,0,1,1,128,20,108.12,108.12,0,0,1,236,128Zm-24,0a84,84,0,1,0-84,84A84.09,84.09,0,0,0,212,128Z"></path></svg>

                                        </i>
                                    </div>
                                </div>
                                 {{-- new column --}}
                                <div class="column text-end g-5">
                                    <small class="opacity-07">Transaction Amount</small>
                                    <span style="{{ $data->class == 'credit' ? 'color:rgb(0,255,0)': 'color:rgb(255,0,0)' }}" class="font-weight-900 font-size-1">{{ $data->class == 'credit' ? '+' : '-' }}{{ $CurrencyHelper::format($data->amount,'NGN',$display_currency) }}</span>
                                </div>
                            </div>
                             {{-- new row --}}
                            <div style="border-bottom:1px solid var(--primary-05);padding-bottom:10px;" class="row w-full g-10 align-center space-between">
                               {{-- new column --}}
                                <div class="row opacity-07 align-center g-5">
<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
  <g fill="currentColor"><path d="M12 22V22.01" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M2.01001 12L2.00001 12" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M7.00317 20.6584L6.99817 20.6671" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M20.6721 17.0032L20.6635 16.9982" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M3.35156 7.00317L3.3429 6.99817" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M3.3457 16.9966L3.33704 17.0016" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M17.0109 20.6655L17.0059 20.6569" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M7.01099 3.34497L7.00599 3.33631" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M22 12C22 6.47715 17.5228 2 12 2" stroke="currentColor" stroke-width="2" stroke-miterlimit="10" stroke-linecap="square" fill="none"></path> <path d="M12 12H17" stroke="currentColor" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 12H17" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 12H17" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path> <path d="M12 12H17" stroke="currentColor" stroke-opacity="0.2" stroke-width="2" stroke-linecap="square" fill="none"></path></g>
</svg>

                                    <span>{{ $data->frame }}</span>
                                </div>
                                 {{-- new column --}}
                                <div class="column g-5">
                                    <div class="p-5px p-x-10px br-5px" style="{{ $data->status == 'success' ? 'background:rgba(0,255,0,0.1);color:rgba(0,255,0)' : ($data->status == 'pending' ? 'background:rgba(255,215,0,0.1);color:rgba(255,215,0)' : ($data->status == 'rejected' || $data->status == 'failed' ? 'background:rgba(255,0,0,0.1);color:rgba(255,0,0)' : 'background:var(--primary-01);color:var(--primary-lighter)')) }}">{{ $data->status }}</div>
                                </div>
                            </div>
                             {{-- new row --}}
                            <div class="row font-weight-700 w-full g-10 align-center space-between">
                               {{ $data->title }}
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($trx->lastPage() > 1)
                    @include('components.utilities',[
                        'data' => $trx,
                        'paginate' => true
                    ])
                @endif
            @endif
        </section>
    </section>
@endsection