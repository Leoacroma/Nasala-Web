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
            <div class="col-lay-6 m-auto p-0">
                <div class="row">
                    <div class="col-lay-10 p-0 ">
                        <h2 class="kantumruy font-size-40 title">{{ $data['data']['titleKh'] }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-10 p-0">
                        <div class="row">
                            <div class="col-lay-10">
                                <i class="fa-solid fa-calendar-days font-size-20"></i>
                                <small class="kantumruy mg-r-10px font-size-17">{{ $formattedCreatedAt }}</small> |
                                    <span class="badge bg-warning text-dark font-size-14 kantumruy">{{ $data['data']['category']['nameKh'] }}</span>
                                <div class="col-lay-1 "></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-lay-10 divider-line"></div>
                </div>
                <div class="row">
                    <div class="col-lay-10 p-0 mt-3 text-algin-center">
                        <img src="{{ $image }}" alt="" width="100%">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lay-10 mt-3 p-0 kantumruy" style="font-size: 15px; font-weight: bold">
                        {!! $data['data']['contentKh'] !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection