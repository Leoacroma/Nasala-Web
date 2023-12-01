@extends('Back-end.Layout.index')
@section('CSS')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('/css-front/styles.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('/css-front/font.css') }}">
    <link rel="stylesheet" href="{{ asset('/css-front/layout.css') }}">
@endsection
@section('template')
    <!-- content -->
    <div class="container mt-5">
        <div class="row ">
            <div class="col-md-8 col-12 m-auto">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <h2 class="Siemreap title-rps title">{{ $data['data']['titleKh'] }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <i class="fa-solid fa-calendar-days icon-ccc"></i>
                                <small class="Siemreap mg-r-10px text-ccc">{{$formattedCreatedAt }}</small>
                                <i class="fa-solid fa-eye icon-ccc"></i>
                                <small class="Siemreap text-ccc">10k</small> |
                                @php
                                    $hyperlink = 'www.facebook.com';
                                    if (!str_starts_with($hyperlink , 'http://') && !str_starts_with($hyperlink , 'https://')) {
                                        $hyperlink = 'https://' . $hyperlink;
                                    }
                                @endphp  
                                {{-- <span class="badge bg-warning text-dark font-size-14 Siemreap">{{ $data['data']['category']['nameKh'] }}</span> --}}
                                <a class="color-black" href="{{ $hyperlink }}"><i class="fa-solid fa-share-from-square icon-ccc"></i></a>
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
        </div>
    </div>
@endsection