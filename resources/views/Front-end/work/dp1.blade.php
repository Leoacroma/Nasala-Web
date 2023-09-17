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
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Annual training plan') }}</h2>
                </div>
                {{-- <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកផែនការ" aria-label="Search" aria-describedby="search-addon" />
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
            <ul>
                @foreach ($data['data'] as $item)
                    <li>
                        <div class="row p-0">
                            <div class="col-lay-8">
                                <p class="Siemreap font-size-23 ">{{ $item['title'] }}</p>

                            </div>
                            <div class="col-lay-2 ">
                                <a href="https://nasla.k5moi.com/v1/api/training/{{ $item['id'] }}" class="btn btn-success Siemreap font-size-17 " download>
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

    <!-- -------------------------------------------- -->
@endsection