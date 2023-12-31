<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('/images/front/photo_2022-10-19_09-17-50-removebg-preview.png')}}">
    <link href="{{ asset('https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <link rel="stylesheet" href="{{ asset('/css-front/layout.css') }}">
    <script src="{{ asset('https://unpkg.com/vue@3/dist/vue.global.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css	">

    <link rel="stylesheet" href="{{ asset('/css-front/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css-front/font.css') }}">
    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css') }}" />
    <link rel="stylesheet" href="/node_modules/flag-icons/css/flag-icons.css">
    <link rel="stylesheet" href="/node_modules/flag-icons/css/flag-icons.min.css">
    <title>NASALA</title>
</head>
<style>
    .col-lay-1 {
        flex: 0 0 10%;
        max-width: 10%;
    }

    .col-lay-1S {
        flex: 0 0 15%;
        max-width: 15%;
    }

    .col-lay-2 {
        flex: 0 0 20%;
        max-width: 20%;
    }

    .col-lay-2S {
        flex: 0 0 23%;
        max-width: 23%;
    }

    .col-lay-3 {
        flex: 0 0 30%;
        max-width: 30%;
    }

    .col-lay-3S {
        flex: 0 0 31%;
        max-width: 31%;
    }

    .col-lay-3M {
        flex: 0 0 35%;
        max-width: 35%;
    }

    .col-lay-4 {
        flex: 0 0 40%;
        max-width: 40%;
    }

    .col-lay-5 {
        flex: 0 0 50%;
        max-width: 50%;
    }

    .col-lay-6 {
        flex: 0 0 60%;
        max-width: 60%;
    }

    .col-lay-7 {
        flex: 0 0 70%;
        max-width: 70%;
    }

    .col-lay-8 {
        flex: 0 0 80%;
        max-width: 80%;
    }

    .col-lay-9 {
        flex: 0 0 90%;
        max-width: 90%;
    }

    .col-lay-10 {
        flex: 0 0 100%;
        max-width: 100%;
    }
    .pagination {
    display: flex;
    justify-content: center;
}
</style>
<?php
        // Retrieve the locale value from the session
        $locale = session('locale');
?>
<body>
    <!-- header -->
    <!-- <include id="header" class="header"></include> -->
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div class="container">
        <div class="row">
            <div class="col-lay-6">
                <div class="row">
                    <div class="col-lay-2 mg-l-3">
                        <a href="{{ route('front.home') }}"><img src="{{ asset('/images/front/photo_2022-10-19_09-17-50.jpg') }}" alt="" width="180px"></a>
                    </div>
                    <div class="col-lay-6 d-flex align-items-center text-algin-center">
                        <div class="row">
                            <div class="col-lay-10">
                                <h2 class="moul color-blue-355fb6 text-align-center text-shadow font-size-30">សាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h2>
                            </div>
                            <div class="col-lay-10">
                                <h2 class="PT-Sans-Narrow font-bold color-blue-355fb6 text-shadow font-size-30">National School For Local Administration</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lay-4">
                <div class="row ">
                    <div class="col-lay-10">
                        <div class="row">
                            <div class="col-lay-3"></div>
                            <div class="col-lay-3 mt-2">
                                <a href=""><i class="fa-brands fa-telegram font-size-40 color-rgb-10-137-240"></i></a>
                                <a href=""><i class="fa-brands fa-youtube  font-size-40 color-red"></i></a>
                                <a href=""><i class="fa-brands fa-square-facebook  font-size-40 color-blue"></i></a>
                            </div>
                            <div class="col-lay-3">
                                <!-- language -->
                                @include('Front-end.language-selector.language-selector')
                                <!-- -------------------- -->
                            </div>
                        </div>
                    </div>
                    <div class="col-lay-10 mt-4">
                        <div class="row">
                            <div class="col-lay-2"></div>
                            <div class="col-lay-7">
                                <form class="float-end " action="">
                                    <div class="input-group width-200">
                                        <input type="search" class="form-control rounded search" placeholder="ស្វែងរក" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
   <!-- navigation -->
   <nav class="navbar navbar-expand-lg bg-color-355fb6 p-0">
    <div class="container ">
        <div class="collapse navbar-collapse  " id="navbarSupportedContent">
            <ul class="navbar-nav m-auto ">
                <li  class="nav-item {{ Route::currentRouteNamed('front.home') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"   href="{{ route('front.home') }}">{{ __('messages.Home') }}</a></li>
                <li class="nav-item {{ Route::currentRouteNamed('front.news', 'front.subnews') ? 'actived' : '' }}"><a class="nav-link nav-font"   data-locale="{{ $locale }}"  href="{{ route('front.news') }}">{{ __('messages.News') }}</a></li>
                <li class="nav-item dropdown {{ Route::currentRouteNamed('front.work.dp1' , 'front.work.dp2Content' , 'front.work.dp3')  ? 'actived' : '' }}">
                    <a class="nav-link dropdown-toggle nav-font "  data-locale="{{ $locale }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.Training') }}</a>
                    <ul class="dropdown-menu">
                        <li class="dropend mg-l-m10 pd-r-8"><a class="dropdown-item dp-font ml-2 {{  Route::currentRouteNamed('front.work.dp1') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.work.dp1') }}">{{ __('messages.Annual training plan') }}</a></li>
                        <li class="dropend mg-l-m10 pd-r-8">
                            <a class="dropdown-item ml-2 dp-font {{  Route::currentRouteNamed('front.work.dp2Content') ? 'drop-actived' : '' }}" href="{{ route('front.work.dp1') }}" href="">{{ __('messages.Training documents') }}</a>
                            <ul class="dropdown-menu">
                                @foreach ($cateSub['data'] as $dd)
                                <li>
                                    <a class="dropdown-item dp-font {{ request()->is('work/dp2/'. $dd['id']) ? 'drop-actived' : '' }}"
                                        href="{{ route('front.work.dp2Content', $dd['id']) }}">
                                        @if (app()->getLocale() === 'kh')
                                            {{ $dd['titleKh'] }}
                                        @else
                                            @if ($dd['title'] !== null)
                                                {{ $dd['title'] }}
                                            @else
                                                {{ $dd['titleKh'] }}
                                            @endif
                                        @endif
                                    </a>
                                </li>
                                 @endforeach
                            </ul> 
                        </li>
                        <li class="dropend mg-l-m10 pd-r-8"><a class="dropdown-item dp-font ml-2 {{ Route::currentRouteNamed('front.enrollMent') ? 'drop-actived' : '' }}" href="{{ route('front.enrollMent') }}">{{ __('messages.Enroll') }}</a></li>
                    </ul>
                </li>
                <li class="nav-item {{ Route::currentRouteNamed('front.liby') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"  aria-current="page" href="{{ route('front.liby') }}">{{ __('messages.Library') }}</a></li>
                <li class="nav-item {{ Route::currentRouteNamed('front.scholar') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"  aria-current="page" href="{{ route('front.scholar') }}">{{ __('messages.Advertising') }}</a></li>
                <li class="nav-item dropdown 
                {{ Route::currentRouteNamed([
                    'front.aboutschool.dp1',
                    'front.aboutschool.dp2',
                    'front.aboutschool.dp3',
                    'front.aboutschool.dp4',
                    'front.aboutschool.dp5',
                    'front.aboutschool.dp6',
                    'front.aboutschool.dp7',
                    'front.aboutschool.dp8',
                ] ) ? 'actived' : '' }}">
                    <a class="nav-link dropdown-toggle nav-font"  data-locale="{{ $locale }}"  href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.About the school') }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp1') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp1') }}">{{ __('messages.Message from the Principal') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp2') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp2') }}">{{ __('messages.Strategic Plan on Capacity Development') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp3') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp3') }}">{{ __('messages.Partner') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp4') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp4') }}">{{ __('messages.Department of National School of Local Administration') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp5') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp5') }}">{{ __('messages.Structure of the National School of Local Administration') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp6') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp6') }}">{{ __('messages.Leadership composition') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp7') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp7') }}">{{ __('messages.Curriculum') }}</a></li>
                        <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp8') ? 'drop-actived' : '' }}" href="{{ route('front.aboutschool.dp8') }}">{{ __('messages.Contact') }}</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <!-----Content-------->
    @yield('content')
    <!-- -------------------------------------- -->
    <!-- footer -->
    <footer>
        <div class="container-field bg-color-355fb6">
            <div class="container">
                <div class="row mt-3 p-2">
                    <div class="col-lay-1S color-white Siemreap font-size-17">
                        <span>អំពីសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                        <span>
                            <ul>
                                <li>អំពីសាលា</li>
                                <li>ទំនាក់ទំនង</li>
                                <li>រចនាសម្ព័ន្ធ</li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-lay-3S color-white Siemreap font-size-17">
                        <span>ទំនាក់ទំនង</span>
                        <span>
                            <ul class="list-unstyled">
                                <li><i class="fa-solid fa-square-phone mg-r-10px" ></i>023 456 789</li>
                                <li><i class="fa-solid fa-square-envelope mg-r-10px" ></i>nasala@gmail.com</li>
                                <li><i class="fa-brands fa-square-facebook mg-r-10px" ></i>https://www.facebook.com/training.interior</li>
                                <li><i class="fa-solid fa-location-dot mg-r-10px" ></i>ភូមិត្រពាំងវែង សង្កាត់គោករកា ខណ្ឌព្រែកព្នៅ រាជធានីភ្នំពេញ</li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-lay-1S color-white Siemreap font-size-17">
                        <span>ដៃគូរសហការ</span>
                        <span>
                            <ul>
                                <li>ស្ថាប័នរាជរដ្ឋាភិបាល</li>
                                <li>ដៃគូរអភិវឌ្ឍន៏នានា</li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-lay-3 ">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.20137809131!2d104.92491967558159!3d11.537407244695485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310950da00231129%3A0x3277d5d862ed2f5d!2sMinistry%20of%20Interior!5e0!3m2!1sen!2skh!4v1689567441364!5m2!1sen!2skh" width="100% " height="150px" style=" border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </div>
            <div class="col-lay-10 bg-colo-white text-algin-center Siemreap font-size-20 p-1 color-blue-355fb6">
                <span>រក្សាសិទ្ធ <i class="fa-regular fa-copyright"></i> ២០២២ សាលារដ្ឋបាលមូលដ្ឋាន ក្រសួងមហាផ្ទៃ</span>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/Front/Click.js') }}"></script>


<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js	"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</html>