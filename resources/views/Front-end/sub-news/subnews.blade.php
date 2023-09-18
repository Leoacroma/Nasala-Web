@extends('Front-end.Layout')
@section('content')

<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- content -->
    <div class="container mt-5">
        <div class="row ">
            <div class="col-lay-6 p-0">
                <div class="row">
                    <div class="col-lay-10 p-0 ">
                        <h2 class="Siemreap font-size-40 title">{{ $data['data']['titleKh'] }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-12 p-0">
                        <div class="row">
                            <div class="col-lay-12">
                                <i class="fa-solid fa-calendar-days font-size-20"></i>
                                <small class="Siemreap mg-r-10px font-size-17">{{$formattedCreatedAt }}</small>
                                <i class="fa-solid fa-eye"></i>
                                <small class="Siemreap font-size-17">10k</small> |
                                @php
                                    $hyperlink = 'www.facebook.com';
                                    if (!str_starts_with($hyperlink , 'http://') && !str_starts_with($hyperlink , 'https://')) {
                                        $hyperlink = 'https://' . $hyperlink;
                                        
                                    }
                                @endphp  
                                {{-- <span class="badge bg-warning text-dark font-size-14 Siemreap">{{ $data['data']['category']['nameKh'] }}</span> --}}
                                <a class="color-black" href="{{ $hyperlink }}"><i class="fa-solid fa-share-from-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-10 divider-line"></div>
                </div>
                {{-- <div class="row">
                    <div class="col-lay-10 p-0 mt-3 text-algin-center">
                        <img src="{{ $image }}" alt="" width="80%">
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-lay-12  p-0 Siemreap ">
                        {!! $data['data']['contentKh'] !!}
                    </div>
                </div>
            </div>
            <div class="col-lay-3M ml-5" >
                <div class="row mt-5">
                    <div class="more-news-box col-lay-10">
                        <h2 class="nav-font color-black font-size-35" data-locale="{{ $locale }}">{{ __('messages.Related News') }}</h2>
                        <div class="divider-line-small"></div>
                    </div>
                </div>
                @foreach ($result2 as $item)
                    <a class="text-decoration-none color-black hover-underline-animation " href="{{ route('front.subnews', $item['id']) }}">
                        <div class="row mt-2">
                            <div class="col-lay-5">
                                <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="img-wh" alt="" >
                            </div>
                            <div class="col-lay-5 mg-l-m10 hover-title-animate">
                                <p class="Siemreap font-size-15">{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 50, $end = '...') }}</p>
                                <small class="Siemreap mg-r-10px font-size-13">{{ $formattedCreatedAt }}</small>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-lay-12 p-0">
                <div class="row">
                    <div class="more-news-box col-lay-10 p-0">
                        <h2 class="nav-font color-black font-size-35" data-locale="{{ $locale }}">{{ __('messages.Latest News') }}</h2>
                        <div class="col-3 p-0">
                            <div class="divider-line-small"></div>
                        </div>
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-2 g-4 p-0">
                    @foreach ($result as $item)
                        <a href="{{ route('front.subnews', $item['id']) }}" class="col" style="width: 400px;  color: black">
                            <div class="card">
                                <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-size" alt="Hollywood Sign on The Hill" /> 
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