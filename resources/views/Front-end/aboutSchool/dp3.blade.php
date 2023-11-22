@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
     <!-- Content title -->
     <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-12 d-flex">
                <i class="icon-size-rps fa-solid fa-handshake-angle mg-r-10px color-blue-355fb6"></i>
                <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Partner') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>
     <div class="container mt-4 rps-sort-blib">
        <div class="row">
            <div class="col-md-6 Kantumruy" style="border-right: 1px solid black">
                <div class="row">
                    <div class="col-md-12 text-algin-center">
                        <h2>ដៃគូដែលបានចុះអនុស្សនៈគ្នា</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5 text-algin-center">
                        <img src="{{ asset('images/វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ.jpg') }}" alt="" width="150px">
                        <br/>
                        {{-- <span>វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ</span> --}}
                    </div>
                    <div class="col-md-5 text-algin-center">
                        <img src="{{ asset('images/សាលាភូមិន្ទរដ្ឋបាល.gif') }}" alt="" width="150px">
                        <br/>
                        {{-- <span>សាលាភូមិន្ទរដ្ឋបាល</span> --}}
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-5 text-algin-center">
                        <img src="{{ asset('images/272622791_239378445054070_6777321677976002089_n.jpg') }}" alt="" width="150px">
                        <br/>
                        
                        {{-- <span>សាលាភូមិន្ទរដ្ឋបាល</span> --}}
                    </div>
                    <div class="col-md-5 text-algin-center">
                      
                    </div>
                </div>
            </div>
            <div class="col-md-6 Kantumruy">
                <div class="row">
                    <div class="col-md-12 text-algin-center">
                        <h2>ដៃគូអភិវឌ្ឍន៍នានា</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/Civil Service College.jpg') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>Civil Service College</span> --}}
                    </div>
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/JICA.png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការចៃការ (JICA)</span> --}}
                    </div>
                   
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/KOIKA.png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការកយការ (KOIKA)</span> --}}
                    </div>
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/អង្គការតម្លាភាពកម្ពុជា_TI_Cambodia.png') }}" alt="" width="200px">
                        <br/>
                        {{-- <span>អង្កការតម្លាភាពកម្ពុជា (TI Cambodia)</span> --}}
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/UNPOG.png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>UNPOG</span> --}}
                    </div>
                    <div class="col-md-6 text-algin-center">
                        <img src="{{ asset('images/UNDP.jpg') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការសហប្រជាជាតិ (UNDP)</span> --}}
                    </div>
                   
                </div>
                <div class="row mt-5">
                    <div class="col-md-12 text-algin-center">
                        <img src="{{ asset('images/អង្គការវត្សធើសេដ (WaterShed).png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការវត្សធើសេដ (WaterShed)</span> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 rps-sort-lib">
        <div class="row">
            <div class="col-md-6 Kantumruy text-algin-center" style="border-right: 1px solid black">
                <div class="row">
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ.jpg') }}" alt="" width="150px">
                        <br/>
                        {{-- <span>វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/សាលាភូមិន្ទរដ្ឋបាល.gif') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>សាលាភូមិន្ទរដ្ឋបាល</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/UNPOG.png') }}" alt="" width="120px">
                        <br/>
                        <span>UNPOG</span>
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/UNDP.jpg') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការសហប្រជាជាតិ (UNDP)</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/JICA.png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការចៃការ (JICA)</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/KOIKA.png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការកយការ (KOIKA)</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/Civil Service College.jpg') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>Civil Service College</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/អង្គការវត្សធើសេដ (WaterShed).png') }}" alt="" width="120px">
                        <br/>
                        {{-- <span>អង្កការវត្សធើសេដ (WaterShed)</span> --}}
                    </div>
                    <div class="col-md-12 mt-5 ">
                        <img src="{{ asset('images/អង្គការតម្លាភាពកម្ពុជា_TI_Cambodia.png') }}" alt="" width="200px">
                        <br/>
                        {{-- <span>អង្កការតម្លាភាពកម្ពុជា (TI Cambodia)</span> --}}
                    </div>
                </div>
               
            </div>
        </div>
    </div>
@endsection