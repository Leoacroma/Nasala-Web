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
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
                </div>
                {{-- <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកអាហារូបករណ៍" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div> --}}
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
    </div>
     <!-- content -->
        <div class="container p-0">
          <iframe src="data:application/pdf;base64,{{ base64_encode($pdf) }}" width="100%" height="850px" type="application/pdf"> </iframe>
        </div>
     </div>
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection