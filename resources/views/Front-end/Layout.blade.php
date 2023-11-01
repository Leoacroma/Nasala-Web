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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" integrity="sha512-AZtJoEn5SfSZimv10x5NMO2gaZCdoU8nxtHJK8O4SbKNlQeb1ggkvf0b0QixuuXIjX3Tp5jzBbTWajki81Vl2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />   

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link href="https://fonts.googleapis.com/css2?family=Dangrek&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css-front/frontStyle.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('/css-front/font.css') }}">

    <link rel="stylesheet" href="{{ asset('https://cdn.jsdelivr.net/gh/lipis/flag-icons@6.6.6/css/flag-icons.min.css') }}" />
    {{-- <link rel="stylesheet" href="/node_modules/flag-icons/css/flag-icons.css">
    <link rel="stylesheet" href="/node_modules/flag-icons/css/flag-icons.min.css"> --}}
    <title>សាលាជាតិរដ្ឋបាលមូលដ្ឋាន</title>
    
    <x-embed-styles />
</head>
<style>

@font-face {
    font-family: 'Arial';
    /* Specify the font family name */
    
    src: url({{ asset('/fonts/ARIAL.TTF') }}) format('TTF');
    /* Path to the font file */
}

@font-face {
    font-family: 'Dangrek', sans-serif;
    src: url({{ asset('/fonts/DANGREK.TTF') }}) format('TTF');
}

@font-face {
    font-family: 'Kantumruy Pro';
    /* Specify the font family name */
    src: url({{ asset('/fonts/KANTUMRUY.TTF') }}) format('TTF');
}
   
.pagination {
    display: flex;
    justify-content: center;
}

</style>

<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?> 
<body style="overflow: hidden">
    <!-- header -->
    <!-- <include id="header" class="header"></include> -->
    @include('Front-end.navigation-bar')
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
    <div class="container container-sm all-fix-position">
        <div class="row">
            <div class="col-xxl-8 col-xl-8 col-md-8 col-sm-12 mt-2">
                <div class="row">
                    <div class="col-md-2 col-3 text-algin-center p-0">
                        <a href="{{ route('front.home') }}"><img class="img-fluid nasla-lg-rps" src="{{ asset('/images/front/photo_2022-10-19_09-17-50.jpg') }}" alt=""></a>
                    </div>
                    <div class="col-md-7 col-9 d-flex align-items-center p-0">
                        <div class="row ">
                            <div class="col-md-12 col-sm-12">
                                <h2 class="moul color-blue-355fb6 text-shadow rps-text-titleKh ">សាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h2>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <h2 class="PT-Sans-Narrow font-bold color-blue-355fb6 text-shadow rps-text-titleEn ">National School For Local Administration</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="row ">
                    <div class="col-md-12 mt-2">
                        <div class="row">
                            <div class="col-md-5 col-4">
                                @php
                                $facebook = 'www.facebook.com/training.interior';
                                $tele =  't.me/tddocuments';
                                $youtube = 'www.youtube.com/channel/UC2qWTubQ1K48RFjIreGCPkA';
                                if (!str_starts_with($facebook && $tele && $youtube, 'http://') && !str_starts_with($facebook && $tele && $youtube, 'https://')) {
                                    $facebook = 'https://' . $facebook;
                                    $tele = 'https://' . $tele;
                                    $youtube = 'https://' . $youtube;
                                }
                                @endphp
                                <a class="icon-link" href="{{ $tele }}"><i class="fa-brands fa-telegram  color-rgb-10-137-240"></i></a>
                                <a class="icon-link" href="{{ $youtube }}"><i class="fa-brands fa-youtube   color-red"></i></a>
                                <a class="icon-link" href="{{ $facebook }}"><i class="fa-brands fa-square-facebook   color-blue"></i></a>
                            </div>
                            <div class="col-md-6 col-6 mt-2">
                                <!-- language -->
                                    @include('Front-end.language-selector.language-selector')
                                <!-- -------------------- -->
                            </div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- navigation -->
    <nav class="navbar navbar-expand-lg bg-color-355fb6 p-0">
        <div class="container">
            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav m-auto font-size-28">
                    <li  class="nav-item {{ Route::currentRouteNamed('front.home') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"   href="{{ route('front.home') }}">{{ __('messages.Home') }}</a></li>
                    <li class="nav-item {{ Route::currentRouteNamed('page.news', 'front.subnews') ? 'actived' : '' }}"><a class="nav-link nav-font"   data-locale="{{ $locale }}"  href="{{ route('page.news', ['page' => 0]) }}">{{ __('messages.News') }}</a></li>
                    <li class="nav-item dropdown {{ Route::currentRouteNamed('front.work.dp1' , 'front.work.dp2Content' , 'front.work.dp3')  ? 'actived' : '' }}">
                        <a class="nav-link dropdown-toggle nav-font "  data-locale="{{ $locale }}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('messages.Training') }}</a>
                        <ul class="dropdown-menu">
                            <li class="dropend mg-l-m10 pd-r-8"><a class="dropdown-item dp-font ml-2 {{  Route::currentRouteNamed('front.work.dp1') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.work.dp1') }}">{{ __('messages.Annual training plan') }}</a></li>
                            <li class="dropend mg-l-m10 pd-r-8">
                                <a class="dropdown-item ml-2 dp-font {{  Route::currentRouteNamed('front.work.dp2Content') ? 'drop-actived' : '' }}" href="{{ route('front.work.dp1') }}" data-locale="{{ $locale }}">{{ __('messages.Training documents') }}</a>
                                <ul class="dropdown-menu">
                                    @foreach ($cateSub['data'] as $dd)
                                    <li>
                                        <a class="dropdown-item dp-font {{ request()->is('work/dp2/'. $dd['id']) ? 'drop-actived' : '' }}"
                                            href="{{ route('front.work.dp2Content', $dd['id']) }}"  data-locale="{{ $locale }}">
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
                            <li class="dropend mg-l-m10 pd-r-8"><a class="dropdown-item dp-font ml-2 {{ Route::currentRouteNamed('front.enrollMent') ? 'drop-actived' : '' }}" href="{{ route('front.enrollMent') }}" data-locale="{{ $locale }}">{{ __('messages.Enroll') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Route::currentRouteNamed('page.lib.all') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"  aria-current="page" href="{{ route('page.lib.all',['page' => 0]) }}">{{ __('messages.Library') }}</a></li>
                    <li class="nav-item {{ Route::currentRouteNamed('front.page.scholar') ? 'actived' : '' }}"><a class="nav-link nav-font"  data-locale="{{ $locale }}"  aria-current="page" href="{{ route('front.page.scholar', ['page' =>0]) }}">{{ __('messages.Scholarship') }}</a></li>
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
                        <ul class="dropdown-menu" >
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp1') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp1') }}">{{ __('messages.Message from the Principal') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp2') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp2') }}">{{ __('messages.Strategic Plan on Capacity Development') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp3') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp3') }}">{{ __('messages.Partner') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp4') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp4') }}">{{ __('messages.Department of National School of Local Administration') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp5') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp5') }}">{{ __('messages.Structure of the National School of Local Administration') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp6') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp6') }}">{{ __('messages.Leadership composition') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp7') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp7') }}">{{ __('messages.Curriculum') }}</a></li>
                            <li><a class="dropdown-item dp-font {{ Route::currentRouteNamed('front.aboutschool.dp8') ? 'drop-actived' : '' }}" data-locale="{{ $locale }}" href="{{ route('front.aboutschool.dp8') }}">{{ __('messages.Contact') }}</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-----Content-------->
    @yield('content')
    <!-- -------------------------------------- -->
    <div class="container-sm fixed-bottom alert-download">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <h4 class="alert-heading Kantumruy font-size-15"><i class="fa-regular fa-lightbulb fa-bounce"></i> សូមធ្វើការទាញយក APP ដើម្បីមើលព័ត៌មានបន្ថែម!</h4>
                    <button class="btn btn-success Kantumruy font-size-15 text-white">ចុចទីនេះដើម្បីទាញយក APP <i class="fa-solid fa-circle-down text-white"></i></button>
                  </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer>
       
        <div class="container-field bg-color-355fb6">
            <div class="container">
                <div class="row mt-3 p-2">
                    <div class="col-md-2 col-12 color-white dp-font text-rps" data-locale="{{ $locale }}">
                        <span>{{ __('messages.About National School of Local Administration') }}</span>
                        <span>
                            <ul >
                                <li><a class=" color-white footer-hover-underline-animation" href="{{ route('front.aboutschool.dp3') }}">{{ __('messages.About the school') }}</a></li>
                                <li><a class=" color-white footer-hover-underline-animation" href="{{ route('front.aboutschool.dp7') }}">{{ __('messages.Contact') }}</a></li>
                                <li><a class=" color-white footer-hover-underline-animation" href="{{ route('front.aboutschool.dp8') }}">{{ __('messages.Structure') }}</a></li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-md-3 col-12 color-white dp-font text-rps" data-locale="{{ $locale }}">
                        <span>{{ __('messages.Contact') }}</span>
                        <span>
                            <ul class="list-unstyled">
                                @php
                                    $hyperlink = 'www.facebook.com/training.interior';
                                    $email =  'naslacambodia@gmail.com';
                                    if (!str_starts_with($hyperlink && $email, 'http://') && !str_starts_with($hyperlink && $email, 'https://')) {
                                        $hyperlink = 'https://' . $hyperlink;
                                        $email = 'https://' . $email;
                                    }
                                @endphp  
                                <li><i class="fa-solid fa-square-phone mg-r-10px" ></i>023 456 789</li>
                                <li><i class="fa-solid fa-square-envelope mg-r-10px" ></i><a class="color-white footer-hover-underline-animation" href="{{ $email }}">naslacambodia@gmail.com</a></li>
                               
                                <li><i class="fa-brands fa-square-facebook mg-r-10px" ></i><a class="color-white footer-hover-underline-animation" href="{{ $hyperlink }}">naslacambodia</a></li>
                                <li><i class="fa-solid fa-location-dot mg-r-10px" ></i>{{ __('messages.Trapeang Veng Village, Sangkat Kork Roka, Khan Prek Pnov, Phnom Penh.') }}</li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-md-2 col-12 color-white dp-font text-rps" data-locale="{{ $locale }}">
                        <span>{{ __('messages.Partner') }}</span>
                        <span>
                            <ul >
                                <li>{{ __('messages.Government Institutions') }}</li>
                                <li>{{ __('messages.Development Partners') }}</li>
                            </ul>
                        </span>
                    </div>
                    <div class="col-md-4">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3909.20137809131!2d104.92491967558159!3d11.537407244695485!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x310950da00231129%3A0x3277d5d862ed2f5d!2sMinistry%20of%20Interior!5e0!3m2!1sen!2skh!4v1689567441364!5m2!1sen!2skh" width="100% " height="150px" style=" border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    </div>
                </div>
            </div>
            <div  class="col-lay-10 bg-colo-white dp-font text-algin-center Siemreap text-rps p-1 color-blue-355fb6" data-locale="{{ $locale }}">
                <span>{{ __('messages.Copyright') }} <i class="fa-regular fa-copyright"></i>{{ __('messages.2022 Local Administration School, Ministry of Interior') }}</span>
            </div>
        </div>
    </footer>
</body>
<script src="{{ asset('https://code.jquery.com/jquery-3.2.1.slim.min.js') }}" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js" integrity="sha512-rXm6RiYDlz+aZC/ht75tGzeAmCg4gVfBA6Be5s5uENSahiXkgwEy10J2Cc+dxUAW4lRRQYbS5pugMOqBrs8ksw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js') }}" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="{{ asset('js/Front/Click.js') }}"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js" integrity="sha512-WW8/jxkELe2CAiE4LvQfwm1rajOS8PHasCCx+knHG0gBHt8EXxS6T6tJRTGuDQVnluuAvMxWF4j8SNFDKceLFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js	"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Get the carousel element
    var carousel = document.querySelector('#carouselExampleControls');

    // Initialize the carousel
    var carouselInstance = new mdb.Carousel(carousel);

    // Stop the interval
    carouselInstance.pause();
</script>
</html>