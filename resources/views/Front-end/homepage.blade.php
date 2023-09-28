@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
     <!-- -------------------------------------------- -->
    <!-- Content title -->
    <div class="container mt-4 ">
        <div class="row">
            <div class="col-lay-10 d-flex mg-l-m10" >
                <i class="fa-solid fa-clipboard-list font-size-30 mg-r-10px color-blue-355fb6"></i>
                <h2 class="nav-font color-blue-355fb6 font-size-30" data-locale="{{ $locale }}">{{ __('messages.Home') }}</h2>
            </div>
            <div class="col-lay-10 divider-line"></div>
        </div>
    </div>
    <!-- -------------------------------------------- -->
    <!-- content -->
    <div class="container position-relative">
        <div class="row bg-color-rgb-201-199-199 p-0">
            <div class="col-lay-5 mb-3">
                @foreach ($result as $item)
                <a class="text-decoration-none color-black  hover-text hover-underline-animation" href="{{ route('front.subnews', $item['id']) }}">
                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-class img-vh">
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
                </a>
                @endforeach
                
            </div>
            <div class="col-lay-5 mb-2">
                @foreach ($result1 as $item)
                <a class="text-decoration-none color-black Siemreap  hover-underline-animation " href="{{ route('front.subnews', $item['id']) }}">
                    <div class="row pt-2">
                        <div class="col-lay-4 p-0">
                            <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-wv" type="image/jpeg">
                        </div>
                        <div class="col-lay-6 p-0">
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
                        </div>
                    </div>
                </a>
                @endforeach
                
                <a class="btn btn-primary btn-show-all dp-font font-size-15" href="{{ route('front.news') }}" data-locale="{{ $locale }}">{{ __('messages.Show all News') }}</a>
            </div>

        </div>
    </div>
    <!-- content2 -->
    <div class="container mt-4 p-0">
        <div class="row">
            <div class="col-6">
                <div class="col-12 d-flex">
                    <i class="fa-regular fa-pen-to-square font-size-30 mg-r-10px color-blue-355fb6"></i>
                    <h2 class="nav-font color-blue-355fb6 font-size-30" data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
                </div>
                <div class="col-lay-10 divider-line "></div>
                <!-- content​អាហារូបករណ៏ -->
                <div class="row ">
                    <div class="col-lay-10">
                        @foreach ($result2 as $item)
                        <a class="text-decoration-none Siemreap color-black mt-3  hover-underline-animation" href="{{ route('front.subScholar', $item['id']) }}">
                            <div class="row mt-2">
                                <div class="col-lay-3 bg-color-rgb-201-199-199 text-algin-center p-2">
                                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="150px" height="200px" type="image/jpeg">
                                </div>
                                <div class="col-lay-6 ">
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
                                <a class="btn btn-primary btn-show-all-2 dp-font font-size-15" href="{{ route('front.scholar') }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- --------------------------------------------- -->
            </div>
            <div class=" col-6 ">
                <div class="col-12 d-flex ">
                    <i class="fa-brands fa-youtube font-size-30 color-red mg-r-10px"></i>
                    <h2 class="nav-font color-red" data-locale="{{ $locale }}">{{ __('messages.Video') }}</h2>
                </div>
                @foreach ($video['data'] as $item)
                <?php
                    $lastedVideo = $item['videoLink'];
                ?>
                    <iframe width="650" height="350" src="{{ $lastedVideo }}"></iframe>

                @endforeach
            </div>
        </div>
    </div>
@endsection