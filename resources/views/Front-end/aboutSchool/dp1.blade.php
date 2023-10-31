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
                <i class="icon-size-rps fa-solid fa-envelope mg-r-10px color-blue-355fb6"></i>
                <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Message from the Principal') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card mb-3" >
                        <div class="row no-gutters">
                            <div class="col-md-2 d-flex align-items-center">
                            <img src="{{ asset('images/photo_2023-09-24_09-52-54.jpg') }}" class="card-img" alt="...">
                            </div>
                            <div class="col-md-10">
                            <div class="card-body">
                                <h5 class="card-title">MINISTER'S WELCOME NOTE</h5>
                                <p class="card-text">The world of ours presently goes through the era of information technology that becomes the force of the globalization to move the economic development, international relation, information and civilization exchanges, and to combat transnational crime in order to ensure the world security. This political trend, despite of the diversity of policies, is able to unite States after the end of the cold war to closely cooperate in advancing world orders to strengthen regional security, to safeguard world peace and to propel the world development.</p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                            </div>
                            </div>
                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection