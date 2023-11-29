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
            <i class="icon-size-rps fa-solid fa-phone-volume mg-r-10px color-blue-355fb6"></i>
            <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Contact') }}</h2>
        </div>
    </div>
    <div class="col-md-12 divider-line "></div>
  </div>
</div>
     <!-- content -->
     <div class="container">
        <div class="row">
            <div class="col-md-10" >
                <ul class="dp-font list-unstyled test-rps-cc " data-locale="{{ $locale }}">
                    <li>
                        <div class="row dp-font" data-locale="{{ $locale }}">
                            <div class="col-md-3 col-4" >
                                {{ __('messages.Basic National School') }}
                            </div>
                            <div class="col-md-6 col-6">
                                :  {{ __('messages.Trapeang Veng Village, Sangkat Kork Roka, Khan Prek Pnov, Phnom Penh.') }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row" >
                            <div class="col-md-3 col-4 dp-font" data-locale="{{ $locale }}">
                                {{ __('messages.Email') }}
                            </div>
                            <div class="col-md-5 col-6">
                                @php
                                
                                $email =  'nasalacambodia@gmail.com';
                                if (!str_starts_with( $email, 'http://') && !str_starts_with($email, 'https://')) {
                                    $email = 'https://' . $email;
                                }
                            @endphp
                                : <a class="link text-decoration-underline" href="{{ $email }}" target="_blank">nasalacambodia@gmail.com</a>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row dp-font" data-locale="{{ $locale }}">
                            <div class="col-md-3 col-4" >
                                {{ __('messages.Phone Number') }}
                            </div>
                            <div class="col-md-5 col-6">
                                :  {{ __('messages.089 876 542') }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row dp-font" data-locale="{{ $locale }}">
                            <div class="col-md-3" >
                                {{ __('messages.Working hours') }}
                            </div>
                            <div class="col-md-5">
                                : {{ __('messages.Morning: 7:30 a.m. to 11:30 a.m') }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row dp-font" data-locale="{{ $locale }}">
                            <div class="col-md-3"></div>
                            <div class="col-md-5">
                                : {{ __('messages.Afternoon: 14:00 p.m. to 17:30 p.m') }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="row dp-font" data-locale="{{ $locale }}">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                <i class="fa-solid fa-right-long"></i> {{ __('messages.Trapeang Veng Village, Sangkat Kork Roka, Khan Prek Pnov, Phnom Penh.') }}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-8">
                                <iframe  width="100%"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9584.344342497143!2d104.80215907409342!3d11.615693136526563!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31094d0787243909%3A0x9c825ffa6551df59!2z4Z6f4Z624Z6b4Z624Z6H4Z624Z6P4Z634Z6a4Z6K4Z-S4Z6L4Z6U4Z624Z6b4Z6Y4Z684Z6b4Z6K4Z-S4Z6L4Z624Z6TIOGegOGfkuGemuGen-GeveGehOGemOGeoOGetuGeleGfkuGekeGfgw!5e0!3m2!1sen!2skh!4v1700710510603!5m2!1sen!2skh" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection