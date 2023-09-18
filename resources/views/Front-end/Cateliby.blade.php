@extends('Front-end.Layout')
@section('content')
<style>
    .activated{
        border-bottom: 1px solid #355fb6; 
    }
    .activated a{
        color: #355fb6;
    }
</style>
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Library') }}</h2>
                </div>
                <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកឯកសារ" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container p-0">
    <div class="row mt-2 ">
        <div class="col-lay-3">
            <ul class="list-group  ">
                <li class="list-group-item dp-font bg-color-355fb6 color-white font-size-25" data-locale="{{ $locale }}">{{ __('messages.File type') }}</li>
                <li class="list-group-item activated"><a class="items-LG  dp-font" href="{{ route('front.liby') }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a></li>
                @foreach ($cate['data'] as $item)
                    <li class="list-group-item {{ request()->is('lib/sort/cate/' . $item['id']) ? ' activated' : '' }}"><a class="items-LG" href="{{ route('sort.cate.lib', $item['id']) }}">{{ $item['nameKh'] }}</a></li>
                @endforeach
              </ul>
        </div>
        <div class="col-lay-1"></div>
        <div class="col-lay-6">
            @foreach ($result as $item)
                <div class="row p-0 mb-3">
                    <div class="col-lay-1">
                        <img src="{{ asset('images/front/pdf.png') }}" alt="" width="75px">
                    </div>
                    <div class="col-lay-6">
                        <h1 class="Siemreap font-size-25">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 30, $end = '...') }}</h1>
                        <small class="Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</small>
                    </div>
                    <div class="col-3"> 
                        <small class="dp-font" data-locale="{{ $locale }}" >{{ __('messages.Filesize') }} ៖ {{ number_format($item['fileSize'] / 1024) }} Kbytes</small>
                        <a  href="{{ $item['url'] }}" class="btn btn-info Siemreap" download><i class="fa-solid fa-download mr-2"></i>ទាញយកឯកសារ</a>
                        
                    </div>
                </div>
            @endforeach
            
            {{-- <div class="container ">
                <div class="row page-main ">
                    <div class="col-lay-6 pagination">
                        <button class="btn btn-outline-primary mg-r-20px font-size-20 Siemreap  ">ថយក្រោយ</button>
                        <button class="btn btn-outline-primary font-size-20 Siemreap ">1</button>
                        <button class="btn btn-outline-primary font-size-20 Siemreap ">2</button>
                        <button class="btn btn-outline-primary font-size-20 Siemreap ">3</button>
                        <button class="btn btn-outline-primary font-size-20 Siemreap ">4</button>
                        <button class="btn btn-outline-primary font-size-20 Siemreap ">5</button>
                        <button class="btn btn-outline-primary mg-l-20 font-size-20 Siemreap ">ទៅមុខ</button>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
<!-- -------------------------------------------- -->
@endsection