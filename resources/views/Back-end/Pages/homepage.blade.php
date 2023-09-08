@extends('Back-end.Layout.index')
@section('template')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 mb-4 mb-xl-0">
                <div class="d-lg-flex align-items-center">
                    <div>
                        <h3 class="text-dark font-weight-bold mb-2">Hi, welcome back!</h3>
                        <h6 class="font-weight-normal mb-2">Last login was 23 hours ago. View details</h6>
                    </div>

                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-8 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card bg-primary">
                            <div class="card-body text-white">
                                <h3 class="font-weight-bold mb-3">Total : {{ $count }} </h3>
                                <div class="progress mb-3">
                                    <div class="progress-bar  bg-warning" role="progressbar" style="width: 40%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <p class="pb-0 mb-0">News Managment</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Total : {{ $countFilePub }}</h2>
                                <h4 class="card-title mb-2">Publication Management</h4>
                                <small class="text-muted">APRIL 2019</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <div class="card-body">
                                <h2 class="text-dark mb-2 font-weight-bold">Total : {{ $countLib }}</h2>
                                <h4 class="card-title mb-2">Library Management</h4>
                                <small class="text-muted">APRIL 2019</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 grid-margin d-flex stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-2">Lastest News</h4>
                                </div>
                                <div class="mt-3">
                                    {{-- <ul class="nav nav-tabs tab-no-active-fill" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active ps-2 pe-2 " id="All-tab" data-bs-toggle="tab" href="#All-tab" role="tab" aria-controls="All-tab" aria-selected="true">
                                              All
                                            </a>
                                        </li>
                                       
                                        @foreach ($cate['data'] as $item)
                                            <li class="nav-item">
                                                <a class="nav-link ps-2 pe-2 " id="Cate-tab-{{ $item['id'] }}" data-bs-toggle="tab" href="#Cate-tab-{{ $item['id'] }}" role="tab" aria-controls="revenue-for-last-month" aria-selected="true">
                                                    {{ $item['name'] }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul> --}}
                                    {{-- tab-content --}}
                                    {{-- <div class="tab-content" id="All-tab">
                                        <div class="tab-pane fade show active"  id="All-tab" role="tabpanel" aria-labelledby="All-tab">
                                            Tab 1 content
                                        </div>
                                       
                                    </div>
                                    <div class="tab-content" id="Cate-tab-{{ $item['id'] }}">
    
                                        <div class="tab-pane fade show active"  id="Cate-tab-{{ $item['id'] }}" role="tabpanel" aria-labelledby="Cate-tab-{{ $item['id'] }}">
                                            Tab 2 content
                                        </div>
                                    </div>
                                     --}}
                                     <!-- Tabs navs -->
                                <!-- Tabs navs -->
                                    <ul class="nav nav-tabs tab-no-active-fill" id="ex-with-icons" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#All-tab" role="tab"
                                            aria-controls="ex-with-icons-tabs-1" aria-selected="true">All</a>
                                        </li>
                                        @foreach ($cate['data'] as $item)
                                            
                                  
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ex-with-icons-tab-2" data-mdb-toggle="tab" href="#cate-tab-{{ $item['id'] }}" role="tab"
                                                aria-controls="ex-with-icons-tabs-2" aria-selected="false">{{ $item['name'] }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <!-- Tabs navs -->
                                    
                                    <!-- Tabs content -->
                                    <div class="tab-content" id="ex-with-icons-content">
                                        <div class="tab-pane fade show active" id="All-tab" role="tabpanel" aria-labelledby="All-tab">
                                           <div class="row">
                                            <div class="card-group">
                                                @foreach ($result as $item)
                                                <div class="card">
                                                <a href="{{ route('admin.show', $item['id']) }}">
                                                  <img src="http://188.166.211.230:9091/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                                                  <div class="card-body">
                                                    <a style="font-size: 20px; color: black; text-decoration: none" class="card-title Siemreap">{{ $item['titleKh'] }}</a>
                                                    |<span class="badge badge-primary Siemreap">{{ $item['category']['nameKh'] }}</span>
                                                    <p class="card-text">
                                                      <small class="text-muted Siemreap">{{ $item['createdAt'] }}</small>
                                                    </p>
                                                  </div>
                                                </a>
                                                </div>
                                                @endforeach
                                              </div>
                                           </div>
                                        </div>
                                        @foreach ($cate['data'] as $item)
                                            <div class="tab-pane fade" id="cate-tab-{{ $item['id'] }}" role="tabpanel" aria-labelledby="cate-tab-{{ $item['id'] }}">
                                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                                    @foreach ($result1 as $dd) 
                                                    <div class="col">
                                                      <div class="card">
                                                        <img src="http://188.166.211.230:9091/v1/api/files/{{ $dd['thumbnailImageId'] }}" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                                                        <div class="card-body">
                                                            <a style="font-size: 20px; color: black; text-decoration: none" class="card-title Siemreap">{{ $dd['titleKh'] }}</a>
                                                            |<span class="badge badge-primary Siemreap">{{ $dd['category']['nameKh'] }}</span>
                                                            <p class="card-text">
                                                              <small class="text-muted Siemreap">{{ $dd['createdAt'] }}</small>
                                                            </p>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Tabs content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 flex-column d-flex stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-0">Publication</h4>
                                            <a href="{{ route('admin.pub.index') }}" class="btn btn-outline-primary">View Table</a>
                                        </div>
                                        <p class="mt-1">Lastest Publication news</p>
                                        @foreach ($result2 as $tt)
                                            
                                        <div class="card-group">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                  <img
                                                    src="http://188.166.211.230:9091/v1/api/files/{{ $tt['thumbnailImageId'] }}"
                                                    alt="Trendy Pants and Shoes"
                                                    class="img-fluid rounded-start"
                                                  />
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="card-body">
                                                    <a style="font-size: 20px; color: black; text-decoration: none" class="card-title Siemreap">{{ $tt['title'] }}</a>
                                                    <p class="card-text">
                                                      <small class="text-muted Siemreap">{{ $tt['createdAt'] }}</small>
                                                    </p>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title">Trianing</h4>
                            <h4 class="text-success font-weight-bold">Total<span class="text-dark ms-3">163</span></h4>
                        </div>
                        <div id="support-tracker-legend" class="support-tracker-legend"></div>
                        <canvas id="supportTracker"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-between mb-4">
                            <h4 class="card-title">Register</h4>
                            <p class="text-dark">+5.2% vs last 7 days</p>
                        </div>
                        <div class="product-order-wrap padding-reduced">
                            <div id="productorder-gage" class="gauge productorder-gage"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection