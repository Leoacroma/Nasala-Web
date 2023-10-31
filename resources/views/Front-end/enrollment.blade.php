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
                <i class="icon-size-rps fa-solid fa-clipboard-list  mg-r-10px color-blue-355fb6"></i>
                <h2 class="text-size-rps nav-font color-blue-355fb6"  data-locale="{{ $locale }}">{{ __('messages.Enroll') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>
    <!-- content -->
    <div class="container">
        <div class="row">         
            @foreach ($result as $item)
            @php
                $hyperlink = $item['hyperlink'];
                if (!str_starts_with($hyperlink, 'http://') && !str_starts_with($hyperlink, 'https://')) {
                    $hyperlink = 'https://' . $hyperlink;
                }
            @endphp
                <div class="col-md-5">
                    <div class="card" >
                    <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-fluid" alt="Fissure in Sandstone"/>
                    <span class="badge badge-danger Kantumruy" style="font-size: 15px"><i class="fa-solid fa-calendar-days fa-beat-fade"></i> ផុតកំណត់ ៖ {{ $item['registerEndDate'] }} </span> 
                    <div class="card-body">
                        <h5 class="card-title Kantumruy" style=" font-weight: bold">{{\Illuminate\Support\Str::limit($item['courseName'], $limit = 36, $end = '...')}} </h5>
                        <h1 class="Kantumruy" style="font-size: 15px; font-weight: bold">ចាប់ពីថ្ងៃ : <span class="badge badge-warning Kantumruy" style="font-size: 15px; font-weight: bold">{{ $item['courseStartDate'] }} <i class="fa-solid fa-arrow-right fa-bounce"></i> {{ $item['courseEndDate'] }}</span></h1>
                        <p class="card-text Kantumruy" style="font-size: 15px">{{\Illuminate\Support\Str::limit($item['description'], $limit = 90, $end = '...')}}</p>
                        
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

    <!-- -------------------------------------------- -->
@endsection