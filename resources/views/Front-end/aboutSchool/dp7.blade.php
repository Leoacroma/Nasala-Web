@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
<!-- Content title -->
<div class="container mt-4">
    <div class="row">
        <div class="row">
            <div class="col-lay-12 mg-l-m10">
                <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Curriculum') }}</h2>
            </div>
            <div class="col-lay-10 divider-line"></div>
        </div>
    </div>
</div>
     <!-- content -->
     <div class="container p-0 ">
        <div class="row">
            <div class="col-12 text-algin-center ">
               <img src="{{ asset('images/image_2023-09-21_14-35-41.png') }}" alt="">
            </div>
        </div>
    </div>
@endsection