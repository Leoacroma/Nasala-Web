@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
<style>
    .ss-layer{
        display: flex;
        justify-content: center;
    }
    .photo-pp img{
       
        aspect-ratio: 3/2;
        object-fit: contain;
    }
</style>
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
            <div class="col-md-12 Kantumruy">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 style="font-weight: bold">ដៃគូដែលបានចុះអនុស្សនៈគ្នា</h2>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-4">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp ">
                                <img  src="{{ asset('images/វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ.jpg') }}" alt="" width="100%">
                            </div>
                        </div>
                       <div class="row mt-2 text-center">
                            <div class="col-12">
                                <span>វិទ្យាស្ថានសេដ្ឋកិច្ចនិងហិរញ្ញវត្ថុ</span>
                            </div>
                       </div>                       
                    </div>
                    <div class="col-md-4 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/សាលាភូមិន្ទរដ្ឋបាល.gif') }}" alt="" width="100%">
                            </div>
                        </div>
                       <div class="row mt-2 text-center">
                            <div class="col-12">
                                <span>សាលាភូមិន្ទរដ្ឋបាល</span>
                            </div>
                            
                       </div>
                       
                    </div>
                    <div class="col-md-4 mb-5">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/272622791_239378445054070_6777321677976002089_n.jpg') }}" alt="" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 text-center">
                                <span>ក្រសួងសង្គមកិច្ច អតីតយុទ្ធជននិងយុវនីតិសម្បទា</span>
                            </div>
                        </div>
                        
                    </div>
                </div>
               
            </div>
           
        </div>
        <div class="row mt-5"></div>
        <div class="row mt-5">
            <div class="col-md-12 Kantumruy">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 style="font-weight: bold">ដៃគូអភិវឌ្ឍន៍នានា</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-4 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/Civil Service College.jpg') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/JICA.png') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/KOIKA.png') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/អង្គការតម្លាភាពកម្ពុជា_TI_Cambodia.png') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/UNPOG.png') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 ">
                        <div class="row ss-layer">
                            <div class="col-8 photo-pp">
                                <img src="{{ asset('images/UNDP.jpg') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-5 ">
                        <div class="row ss-layer">
                            <div class="col- photo-pp">
                                <img src="{{ asset('images/អង្គការវត្សធើសេដ (WaterShed).png') }}" alt="" width="100%">
                            </div>
                        </div>
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