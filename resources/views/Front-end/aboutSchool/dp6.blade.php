@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = session('locale');
?>
<!-- Content title -->
<div class="container mt-4">
    <div class="row">
        <div class="row">
            <div class="col-lay-5 d-flex mg-l-m10">
                <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Leadership composition') }}</h2>
            </div>
            {{-- <div class="col-lay-5 ">
                <form class="float-end " action="">
                    <div class="input-group width-400 mg-r-20m">
                        <input type="search" class="form-control rounded search" placeholder="ស្វែងរក" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div> --}}
            <div class="col-lay-10 divider-line"></div>
        </div>
    </div>
</div>
    <!-- content -->
    <div class="container">
        <div class="row">
            <div class="col-lay-10 text-algin-center Siemreap font-size-20 mt-5">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span>ឯកឧត្តម សូ​ មុនីរក្សា នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">somounyraksa@gmail.com</a></span>
            </div>
            <div class="col-lay-10 text-algin-center Siemreap font-size-20 mt-5">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >លោកស្រី ជី ច័ន្ទរស្មី <br/> នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">chychanraksmey@gmail.com</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-lay-2S text-algin-center Siemreap font-size-20 m-2">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >លោកស្រី ជី ច័ន្ទរស្មី <br/> នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">chychanraksmey@gmail.com</a></span>
            </div>
            <div class="col-lay-2S text-algin-center Siemreap font-size-20 m-2">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >លោកស្រី ជី ច័ន្ទរស្មី <br/> នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">chychanraksmey@gmail.com</a></span>
            </div>
            <div class="col-lay-2S text-algin-center Siemreap font-size-20 m-2">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >លោកស្រី ជី ច័ន្ទរស្មី <br/> នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">chychanraksmey@gmail.com</a></span>
            </div>
            <div class="col-lay-2S text-algin-center Siemreap font-size-20 m-2">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >លោកស្រី ជី ច័ន្ទរស្មី <br/> នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="">chychanraksmey@gmail.com</a></span>
            </div>
        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection