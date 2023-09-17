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
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Enroll') }}</h2>
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
                <li>
                    <div class="row p-0">
                        <div class="col-lay-10">
                            <p class=" font-size-23 dp-font" data-locale="{{ $locale }}">{{ __('messages.Enrollment') }}</p>
                          
                            @foreach ($reg['data'] as $item)
                            @php
                                $hyperlink = $item['hyperlink'];
                                if (!str_starts_with($hyperlink, 'http://') && !str_starts_with($hyperlink, 'https://')) {
                                    $hyperlink = 'https://' . $hyperlink;
                                }
                            @endphp    
                            <ul>
                                    <li class="Siemreap"><p>{{ $item['courseName'] }}</p></li>
                                    <ul>
                                        <li class="Siemreap"><a href="{{ $hyperlink }}">{{ $item['hypertext'] }}</a></li>
                                    </ul>
                                </ul>
                            @endforeach
                            
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection