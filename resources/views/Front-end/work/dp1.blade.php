@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 col-12 d-flex">
                <i class="icon-size-rps fa-solid fa-clipboard-list  mg-r-10px color-blue-355fb6"></i>
                <h2 class="text-size-rps nav-font color-blue-355fb6"  data-locale="{{ $locale }}">{{ __('messages.Annual training plan') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>
    <!-- content -->
    <div class="container ">
        <div class="row">
            <div class="col-md-12 col-12">
                <ul>
                    @foreach ($data['data'] as $item)
                        <li>
                            <div class="row">
                                <div class="col-md-10 col-7">
                                    <p class="text-title-rps Siemreap ">{{ $item['title'] }}</p>
                                </div>
                                <div class="col-md-2 col-5 btn-font-rps">
                                    <a href="https://api-nasla.k5moi.com/v1/api/training/{{ $item['id'] }}" class="btn btn-success Siemreap  float-right" download>
                                        <i class="fa-solid fa-download mr-2"></i>{{ __('messages.Download') }}</a>
                                    {{-- <button type="submit" class="btn btn-info Siemreap font-size-17">
                                        <i class="fa-solid fa-eye mr-2"></i>មើល</button> --}}
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        

    </div>

    <!-- -------------------------------------------- -->
@endsection