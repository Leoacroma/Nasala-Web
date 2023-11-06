@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
     <!-- -------------------------------------------- -->
    <!-- Content title -->
    {{-- <div class="container mt-4 ">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xl-12 col-xxl-12 d-flex mg-l-m10" >
                <i class="fa-solid fa-clipboard-list font-size-30 mg-r-10px color-blue-355fb6"></i>
                <h2 class="nav-font color-blue-355fb6 font-size-30" data-locale="{{ $locale }}">{{ __('messages.Home') }}</h2>
            </div>
            <div class="col-md-12 col-sm-12 col-xl-12 col-xxl-12 divider-line"></div>
        </div>
    </div> --}}
    <!-- -------------------------------------------- -->
    <!-- content -->
    <div class="container">
        <div class="col-12 d-flex mt-3">
            <i class="icon-size-rps fa-solid fa-clipboard-list mg-r-10px color-blue-355fb6"></i>
            <h2 class="text-size-rps nav-font color-blue-355fb6 " data-locale="{{ $locale }}">{{ __('messages.Home') }}</h2>
        </div>
        <div class="col-md-12 divider-line "></div>
        <div class="row bg-color-rgb-201-199-199">
            <div class="col-md-6 col-xl-6 col-sm-6 main-con">
                @foreach ($result as $item)
                <a class="text-decoration-none color-black  hover-text hover-underline-animation" href="{{ route('front.subnews', $item['id']) }}">
                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-fluid mt-2">
                    @if (app()->getLocale() === 'kh')
                        <span class="font-size-25  hover-title-animate Siemreap">
                            {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 100, $end = '...')}}
                        </span>
                    @else
                        @if ($item['title'] !== null)
                            <span class="font-size-25  hover-title-animate Siemreap">
                                {{\Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}
                            </span>
                        @else
                            <span class="font-size-25  hover-title-animate Siemreap">
                                {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 100, $end = '...')}}
                            </span>
                        @endif
                    @endif
                   
                    <br/>

                    <small class="Siemreap">{{ $item['createdAt'] }}</small>
                    {{-- <span class="badge bg-success Siemreap font-size-12">{{ $item['category']['nameKh'] }}</span> --}}
                    <br/>
                    <span class="Siemreap rps-sort-blib" style="font-weight: 500">{{ Str::limit($item['contentKh'], $limit = 160, $end = '...') }}</span>       
                    
                </a>
                @endforeach
            </div>
            <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-12">
                @foreach ($result1 as $item)
                <a class="text-decoration-none color-black Siemreap  hover-underline-animation " href="{{ route('front.subnews', $item['id']) }}">
                    <div class="row pt-2">
                        <div class="col-md-5 col-xl-5 col-xxl-5 col-sm-1">
                            <div style=" width: 100%; height: 10em;">
                                <div class="img-bg" style="background-image: url(https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }})"></div>
                            </div>
                            {{-- <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-fluid img-thumbnail" type="image/jpeg"> --}}
                        </div>
                        <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-1">
                         @if (app()->getLocale() === 'kh')
                            <span class="font-size-20  hover-title-animate Siemreap">
                                {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 100, $end = '...')}}
                            </span>
                        @else
                            @if ($item['title'] !== null)
                                <span class="font-size-20  hover-title-animate Siemreap">
                                    {{\Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}
                                </span>
                            @else
                                <span class="font-size-20  hover-title-animate Siemreap">
                                    {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 100, $end = '...')}}
                                </span>
                            @endif
                        @endif
                        <br/>
                            <small>{{ $item['createdAt'] }}</small>  
                            {{-- <span class="badge bg-success Siemreap font-size-12">{{$item['category']['nameKh'] }}</span> --}}
                            <br/>
                            <span class="Siemreap rps-sort-blib" style="font-weight: 500; margin-bottom: 10px">{{ Str::limit($item['contentKh'], $limit = 120, $end = '...') }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
                <div class="row">
                    <div class="col-6"></div>
                    <div class="col-md-6 col-l-6 col-xl-6 col-xxl-6 col-sm-6 mt-2 mb-2 ">
                        <a class="btn btn-primary btn-show-all dp-font font-size-15 float-end" href="{{ route('page.news', ['page' => 0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all News') }}</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- content2 -->
    <div class="container mt-4 ">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <div class="col-12 d-flex">
                    <i class="icon-size-rps fa-regular fa-pen-to-square mg-r-10px color-blue-355fb6"></i>
                    <h2 class="text-size-rps nav-font color-blue-355fb6 " data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
                </div>
                <div class="col-lay-10 divider-line "></div>
                <!-- content​អាហារូបករណ៏ -->
                <div class="row ">
                    <div class="col-xl-12 col-l-12 col-xxl-12 col-md-12 col-sm-12">
                        @foreach ($result2 as $item)
                        <a class="text-decoration-none Siemreap color-black mt-3  hover-underline-animation" href="{{ route('front.subScholar', $item['id']) }}">
                            <div class="row mt-2">
                                <div class="col-xl-4 col-l-4 col-xxl-4 col-md-4 col-sm-1 bg-color-rgb-201-199-199 text-algin-center p-2">
                                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-thumbnail" type="image/jpeg">
                                </div>
                                <div class="col-md-6 col-xl-6 col-xxl-6 col-sm-6">
                                    <span class="font-size-20 hover-title-animate">
                                       {{ \Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}
                                    </span>
                                    <br/>
                                    <br/>
                                    <small>{{ $item['createdAt'] }}</small>
                                    
                                </div>

                            </div>
                        </a>
                        @endforeach 
                        <div class="row float-end">
                            <div class="col-12">
                                <a class="btn btn-primary btn-show-all-2 dp-font font-size-15" href="{{ route('front.page.scholar', ['page' =>0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- --------------------------------------------- -->
            </div>
            <div class=" col-md-6 col-sm-12">
                <div class="col-12 d-flex ">
                    <i class="icon-size-rps fa-brands fa-youtube font-size-30 color-red mg-r-10px"></i>
                    <h2 class="text-size-rps nav-font color-red" data-locale="{{ $locale }}" >{{ __('messages.Video') }}</h2>
                </div>
                <div id="carouselExampleControls" class="carousel slide" data-mdb-ride="carousel">
                    <div class="carousel-inner">
                        @foreach ($video['data'] as $item)
                        <?php
                            $lastedVideo = $item['videoLink'];
                        ?>
                      <div class="carousel-item active">
                        <x-embed url="{{ $lastedVideo }}"/>
                      </div>
                      @endforeach
                      @foreach ($Lastedvideo['data'] as $item)
                     <?php
                         $lastedVideo = $item['videoLink'];
                     ?>
                      <div class="carousel-item">
                        <x-embed url="{{ $lastedVideo }}"/>
                      </div>
                     @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </div>
@endsection