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
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Strategic Plan on Capacity Development') }}</h2>

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
                            <div class="row">
                                <div class="col-4">
                                    <div class="card text-white bg-primary mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card text-white bg-secondary mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card text-white  bg-success  mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card text-white  bg-danger  mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card text-white  bg-danger  mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="card text-white  bg-danger  mb-3" >
                                        <div class="card-header">Web Develop</div>
                                        <div class="card-body">
                                          <h5 class="card-title">Primary card title</h5>
                                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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