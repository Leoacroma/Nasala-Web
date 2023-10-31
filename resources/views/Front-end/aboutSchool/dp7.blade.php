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
            <i class="icon-size-rps fa-solid fa-graduation-cap mg-r-10px color-blue-355fb6"></i>
            <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Curriculum') }}</h2>
        </div>
    </div>
    <div class="col-md-12 divider-line "></div>
  </div>
</div>
     <!-- content -->
     <div class="container p-0 ">
        <div class="row">
            <div class="col-12 text-algin-center ">
               <img src="{{ asset('images/image_2023-09-21_14-35-41.png') }}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
@endsection