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
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Message from the Principal') }}</h2>
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
            <div class="row">
                <div class="container p-0">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3" >
                                <div class="row no-gutters">
                                  <div class="col-md-2 d-flex align-items-center">
                                    <img src="{{ asset('images/MOI-leader.jpg') }}" class="card-img" alt="...">
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
    </div>
@endsection