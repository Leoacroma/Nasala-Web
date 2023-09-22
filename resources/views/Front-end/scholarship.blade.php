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
                  <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
                </div>
                <div class="col-lay-5 ">
                    <form class="float-end " action="{{ route('search.scholar') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <div class="form-outline">
                              <input type="search" name="searchSch" id="searchInput" class="form-control" />
                              <label class="form-label" for="form1">Search</label>
                            </div>
                            <button type="submit" class="btn btn-primary">
                              <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
    </div>
     <!-- content -->
     <div class="container p-0">
        <div class="row " >
            @foreach ($result as $item)
            <div class="col-lay-5">
                <div class="row">
                    <div class="col-lay-3M">
                        <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="220px" height="300px" style="margin-bottom: 10px;" type="image/jpeg">
                    </div>
                    <div class="col-lay-4">
                        <a href="{{ route('front.subScholar', $item['id']) }}" class="text-decoration-none color-black font-size-22 Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}</a>
                        <br>
                        <small class="Siemreap">{{ $item['createdAt'] }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
     </div>
     <div class="container ">
        <div class="row ">
            <nav class="mt-5" aria-label="...">
            @php
                $totalpage= $pagination['totalPage'];
                $currentPage = $pagination['page'] // Replace with the actual total number of pages
            @endphp
            <ul class="pagination font-size-25 ">
            @if ($currentPage > 1)
              <li class="page-item">
                <a class="page-link" href="{{ route('page.scholar', ['page' => $currentPage - 1]) }}">Previous</a>
              </li>
            @endif
              <li class="page-item active"><a class="page-link" href="{{ route('front.news') }}">1</a></li>
              @for ($i = 1; $i <= $totalpage-1; $i++)
                <li class="page-item {{  request()->is('scholar/page/' . $i) ? ' active' : ''  }}"><a class="page-link" href="{{ route('page.scholar', ['page' => $i]) }}">{{ $i +1 }}</a></li>
              @endfor
            @if ($currentPage < $totalpage)
              <li class="page-item">
                <a class="page-link" href="{{ route('page.scholar', ['page' => $currentPage + 1]) }}">Next</a>
              </li>
            @endif
                </ul>
              </nav>
        </div>
    </div>
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection