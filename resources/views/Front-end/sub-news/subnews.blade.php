@extends('Front-end.Layout')
@section('content')
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
                    <div class="col-lay-5 p-0">
                        <div class="row">
                            <div class="col-lay-10">
                                <i class="fa-solid fa-calendar-days font-size-20"></i>
                                <small class="Siemreap mg-r-10px font-size-17">{{$formattedCreatedAt }}</small>
                                <i class="fa-solid fa-eye"></i>
                                <small class="Siemreap font-size-17">10k</small> |
                                <span class="badge bg-warning text-dark font-size-14 Siemreap">{{ $data['data']['category']['nameKh'] }}</span>
                                <div class="col-lay-1 d-flex justify-content-between font-size-22 mt-2 ">
                                    <a class="color-black" href=""><i class="fa-brands fa-facebook"></i></a>
                                    <a class="color-black" href=""><i class="fa-brands fa-telegram"></i></i></a>
                                    <a class="color-black" href=""><i class="fa-solid fa-share-from-square"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-10 divider-line"></div>
                </div>
                <div class="row">
                    <div class="col-lay-10 p-0 mt-3 text-algin-center">
                        <img src="{{ $image }}" alt="" width="800px">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-12 text-algin-center mt-3 p-0 Siemreap ">
                        {!! $data['data']['contentKh'] !!}
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-5 mt-5 p-0">
                        <h2 class="dangrek color-black font-size-35">ព័ត៌មានទាក់ទង</h2>
                        <div class="divider-line-small"></div>
                    </div>
                    <div class="col-lay-3"></div>
                    <div class="col-lay-2 mt-5 p-0 text-end">
                        <a class="btn btn-outline-secondary " href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-outline-secondary " href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
                <div class="row ">
                    @include('Front-end.sub-news.card_slider')
                </div>
            </div>
            <div class="col-lay-3 ml-5">
                <div class="row">
                    <div class="more-news-box col-lay-10">
                        <h2 class="dangrek color-black font-size-35">ព័ត៌មានថ្មីៗ</h2>
                        <div class="divider-line-small"></div>
                    </div>
                </div>
                @foreach ($sortLastedAtNews['data'] as $item)
                    <a class="text-decoration-none color-black hover-underline-animation " href="{{ route('front.subnews', $item['id']) }}">
                        <div class="row mt-2">
                            <div class="col-lay-5">
                                <img src="http://188.166.211.230:9091/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="100%">
                            </div>
                            <div class="col-lay-5 mg-l-m10 hover-title-animate">
                                <p class="Siemreap font-size-17">{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 50, $end = '...') }}</p>
                            </div>
                        </div>
                    </a>
               
                @endforeach
               
                
            </div>
        </div>
    </div>
@endsection