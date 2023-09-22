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
                    @if (app()->getLocale() === 'kh')
                        <h2 class="nav-font color-blue-355fb6" data-locale="{{ $locale }}">{{ $trian['data']['titleKh'] }}</h2>
                    @else
                        @if ($trian['data']['title'] !== null)
                            <h2 class="nav-font color-blue-355fb6 font-size-30" data-locale="{{ $locale }}">{{ $trian['data']['title'] }}</h2>
                        @else
                            <h2 class="nav-font color-blue-355fb6" data-locale="{{ $locale }}">{{ $trian['data']['titleKh'] }}</h2>
                        @endif
                    @endif
                   
                </div>
                {{-- <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកឯកសារ" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div> --}}
                <div class="col-lay-10 divider-line"></div>
            </div>
            <div class="row Siemreap">
                @if (app()->getLocale() === 'kh')
                    {!! $trian['data']['contentKh'] !!}
                @else
                    @if ($trian['data']['content'] !== null)
                        {!! $trian['data']['content'] !!}
                    @else
                        {!! $trian['data']['contentKh'] !!}
                    @endif
                @endif
              
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container">
        <div class="row">
        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection