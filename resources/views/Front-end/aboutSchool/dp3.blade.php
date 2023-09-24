@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
     <!-- Content title -->
     <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Partner') }}</h2>
                </div>
                {{-- <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរក" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div> --}}
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col-lay-5 Kantumruy" style="border-right: 1px solid black">
                <div class="row">
                    <div class="col-lay-12 text-algin-center">
                        <h2>ដៃគូសហការ</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ.jpg') }}" alt="" width="150px">
                        <br/>
                        <span>វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ</span>
                    </div>
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/សាលាភូមិន្ទរដ្ឋបាល.gif') }}" alt="" width="120px">
                        <br/>
                        <span>សាលាភូមិន្ទរដ្ឋបាល</span>
                    </div>
                </div>
            </div>
            <div class="col-lay-5 Kantumruy">
                <div class="row">
                    <div class="col-lay-12 text-algin-center">
                        <h2>ដៃគូអភិវឌ្ឍន៍នានា</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/UNPOG.png') }}" alt="" width="120px">
                        <br/>
                        <span>UNPOG</span>
                    </div>
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/UNDP.jpg') }}" alt="" width="120px">
                        <br/>
                        <span>អង្កការសហប្រជាជាតិ (UNDP)</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/JICA.png') }}" alt="" width="120px">
                        <br/>
                        <span>អង្កការចៃការ (JICA)</span>
                    </div>
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/KOIKA.png') }}" alt="" width="120px">
                        <br/>
                        <span>អង្កការកយការ (KOIKA)</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/Civil Service College.jpg') }}" alt="" width="120px">
                        <br/>
                        <span>Civil Service College</span>
                    </div>
                    <div class="col-lay-5 text-algin-center">
                        <img src="{{ asset('images/អង្គការវត្សធើសេដ (WaterShed).png') }}" alt="" width="120px">
                        <br/>
                        <span>អង្កការវត្សធើសេដ (WaterShed)</span>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lay-12 text-algin-center">
                        <img src="{{ asset('images/អង្គការតម្លាភាពកម្ពុជា_TI_Cambodia.png') }}" alt="" width="200px">
                        <br/>
                        <span>អង្កការតម្លាភាពកម្ពុជា (TI Cambodia)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection