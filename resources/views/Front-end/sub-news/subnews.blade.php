@extends('Front-end.Layout')
@section('content')
@section('facebook-share')
<meta property="og:url"           content="https://nasla.interior.gov.kh/beta/news/subnews/{{ $request_Id }}" />
<meta property="og:type"          content="News" />
<meta property="og:title"         content="{{ $data['data']['titleKh'] }}" />
<meta property="og:description"   content="{{ $contentShare }}" />
<meta property="og:image"         content="{{ asset('https://nasla.k5moi.com/v1/api/files/'.$data['data']['thumbnailImageId']) }}" />
@endsection

<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- content -->
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-8 col-12">
                <div class="row">
                    <div class="col-md-12 col-12 ">
                        @if (app()->getLocale() === 'kh')
                            <h2 class="Siemreap title-rps title">{{ $data['data']['titleKh'] }}</h2>
                        @else
                            @if ($data['data']['title'] !== null)
                                <h2 class="dp-font title-rps title">{{ $data['data']['title'] }}</h2>
                            @else
                                <h2 class="Siemreap title-rps title">{{ $data['data']['titleKh'] }}</h2>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa-solid fa-calendar-days icon-ccc"></i>
                                <small class="Siemreap mg-r-10px text-ccc">{{ $DateCreatedAt }}</small>
                                <i class="fa-solid fa-eye icon-ccc"></i>
                                <small class="Siemreap text-ccc">{{ $data['data']['totalViewers'] }}</small> |
                                @php
                                    $hyperlink = 'www.facebook.com';
                                    if (!str_starts_with($hyperlink , 'http://') && !str_starts_with($hyperlink , 'https://')) {
                                        $hyperlink = 'https://' . $hyperlink;
                                    }
                                @endphp  
                                {{-- <span class="badge bg-warning text-dark font-size-14 Siemreap">{{ $data['data']['category']['nameKh'] }}</span> --}}
                                
                                {{-- <a class="color-black"  data-href="">share</a> --}}
                                <div class="fb-share-button" 
                                data-href="https://nasla.interior.gov.kh/beta/news/subnews/{{ $request_Id }}" 
                                data-layout="button_count">Share
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container">
                        <div class="col-md-12 divider-line"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 Siemreap conetent-rps">
                        {!! $data['data']['contentKh'] !!}
                    </div>
                </div>
            </div>
            <div class="col-md-3 rps-sort-blib">
                <div class="row ">
                    <div class="more-news-box col-md-12">
                        <h2 class="nav-font color-black font-size-35" data-locale="{{ $locale }}">{{ __('messages.Related News') }}</h2>
                        <div class="divider-line-small"></div>
                    </div>
                </div>
                @foreach ($result2 as $item)
                    <a class="text-decoration-none color-black hover-underline-animation " href="{{ route('front.subnews', $item['id']) }}">
                        <div class="row mt-2">
                            <div class="col-md-5">
                                <img src="https://api-nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="img-fluid" alt="" >
                            </div>
                            <div class="col-md-7 mg-l-m10 hover-title-animate">
                                <p class="Siemreap font-size-15">{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 50, $end = '...') }}</p>
                                <small class="Siemreap mg-r-10px font-size-13">{{ $item['createdAt'] }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12 rps-sort-lib">
                <div class="row">
                    <div class="more-news-box col-md-12">
                        <h2 class="nav-font color-black font-size-25" data-locale="{{ $locale }}">{{ __('messages.Latest News') }}</h2>
                        <div class="col-3">
                            <div class="divider-line-small"></div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 p-0">
                    @foreach ($result as $item)
                       <div class="col-md-12">
                        <a href="{{ route('front.subnews', $item['id']) }}" class="col" style="width: 400px;  color: black">
                            <div class="card">
                                <img src="https://api-nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-fluid" alt="Hollywood Sign on The Hill" /> 
                                <div class="card-body">
                                <h5 class="card-title Siemreap">{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 50, $end = '...')}}</h5>
                                <small class="Siemreap mg-r-10px ">{{ $item['createdAt'] }}</small>
                              </div>
                            </div>
                        </a>
                       </div>
                    @endforeach              
                  </div>
               </div>
            </div>
            <div class="col-md-12 rps-sort-blib">
                <div class="row">
                    <div class="more-news-box col-md-12">
                        <h2 class="nav-font color-black font-size-35" data-locale="{{ $locale }}">{{ __('messages.Latest News') }}</h2>
                        <div class="col-3">
                            <div class="divider-line-small"></div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 p-0">
                    @foreach ($result as $item)
                        <a href="{{ route('front.subnews', $item['id']) }}" class="col" style="width: 400px;  color: black">
                            <div class="card">
                                <img src="https://api-nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-size" alt="Hollywood Sign on The Hill" /> 
                                <div class="card-body">
                                <h5 class="card-title Siemreap">{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 50, $end = '...')}}</h5>
                                <small class="Siemreap mg-r-10px ">{{ $item['createdAt'] }}</small>
                              </div>
                            </div>
                        </a>
                    @endforeach              
                  </div>
               </div>
            </div>
        </div>
    </div>
@endsection