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
                <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>
     <!-- content -->
        <div class="container ">
            <div class="col-12">
                {{-- <iframe src="data:application/pdf;base64,{{ base64_encode($pdf) }}" width="100%" height="850px" type= "application/pdf"></iframe> --}}
                <object data="https://nasla.k5moi.com/v1/api/publicize/{{ $requestId }}" width="100%" height="850px"   type="application/pdf"></object>

            </div>
        </div>
     </div>
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection