@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- Content title -->
    <div class="container mt-4">
      <div class="row">
          <div class="col-md-9 col-12 d-flex">
              <i class="icon-size-rps fa-solid fa-clipboard-list  mg-r-10px color-blue-355fb6"></i>
              <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Scholarship') }}</h2>
          </div>
          <div class="col-md-3 search-brps">
            <form class="float-end" method="GET" action="{{ route('search.scholar', ['page' => 0]) }}">
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
      </div>
      <div class="col-md-12 divider-line "></div>
    </div>
  </div>
     <!-- content -->
     <div class="container">
        <div class="row " >
          <div class="col-12 search-Arps">
            <form  method="GET" action="{{ route('search.scholar', ['page' => 0]) }}">
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
            @foreach ($result as $item)
            <div class="col-md-6 mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" class="img-fluid">
                    </div>
                    <div class="col-md-8">
                        <a href="{{ route('front.subScholar', $item['id']) }}" class="text-decoration-none color-black text-title-rps Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}</a>
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
          <ul class="pagination">
          @if ($currentPage > 0)
            <li class="page-item ">
              <a class="page-link  font-size-18 Kantumruy" href="{{ route('front.page.scholar', ['page' => $currentPage - 1]) }}" tabindex="-1"><i class="fa-solid fa-backward"></i></a>
            </li>
          @endif
            @for ($i = 0; $i <= $totalpage-1; $i++)
              <li class="page-item {{  request()->is('scholar/page/' . $i) ? ' active' : ''  }}">
                <a class="page-link  font-size-18 Kantumruy" href="{{ route('front.page.scholar', ['page' => $i]) }}">{{ $i +1 }}</a>
              </li>
            @endfor
          @if ($currentPage+1 < $totalpage )
            <li class="page-item">
              <a class="page-link next-link  font-size-18 Kantumruy" href="{{ route('front.page.scholar', ['page' => $currentPage + 1]) }}" > <i class="fa-solid fa-forward"></i></a>
            </li>
          @endif
          </ul>
      </nav>
      </div>
    </div>
        </div>
    </div>
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection