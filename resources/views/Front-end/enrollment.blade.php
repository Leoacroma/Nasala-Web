@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
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
                    <div class="row p-0">            
                            @foreach ($result as $item)
                            @php
                                $hyperlink = $item['hyperlink'];
                                if (!str_starts_with($hyperlink, 'http://') && !str_starts_with($hyperlink, 'https://')) {
                                    $hyperlink = 'https://' . $hyperlink;
                                }
                            @endphp
                             <div class="col-lay-3">
                                
                                  <div class="card">
                                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-fix" alt="Fissure in Sandstone"/>
                                    <div class="card-body">
                                      <h5 class="card-title Kantumruy" style=" font-weight: bold">{{ $item['courseName'] }}   </h5>
                                      <h1 class="Kantumruy" style="font-size: 15px; font-weight: bold">ចាប់ពីថ្ងៃ : <span class="badge badge-warning Kantumruy" style="font-size: 15px; font-weight: bold">{{ $item['courseStartDate'] }} <i class="fa-solid fa-arrow-right fa-bounce"></i> {{ $item['courseEndDate'] }}</span></h1>
                                      <p class="card-text Kantumruy" style="font-size: 15px">{{\Illuminate\Support\Str::limit($item['description'], $limit = 100, $end = '...')}}</p>
                                      
                                      <a href="{{ $hyperlink }}" class="btn btn-primary Kantumruy" style="font-size: 15px; font-weight: 400">ចុះឈ្មោះ</a>
                                      {{-- <a href="{{ $hyperlink }}" class="btn btn-info Kantumruy" ></a> --}}
                                   
                                     <button type="button" class="btn btn-info  Kantumruy" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $item['id'] }}" style="font-size: 15px; font-weight: 400">
                                        មើលលំអិត
                                      </button>
                    
                                     @include('Front-end.vendor.central-drop')
                                    </div>
                                  </div>
                             </div>
                            {{-- <ul>
                                    <li class="Siemreap"><p></p></li>
                                    <ul>
                                        <li class="Siemreap"><a href="">{{ $item['hypertext'] }}</a></li>
                                    </ul>
                                </ul> --}}
                            @endforeach
                            
                      
                       
                    </div>


        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection