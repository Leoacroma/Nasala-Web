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
            <div class="col-5">
              <a href="{{ route('front.subScholar', $item['id']) }}">
                <div class="row">
                    <div class="col-2">
                      <img src="https://api-nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="220px" height="300px" style="margin-bottom: 10px;" type="image/jpeg">
                    </div>
                    <div class="col-6">
                        <span  class="text-decoration-none color-black font-size-22 Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 90, $end = '...')}}</span>
                        <br>
                        <small class="Siemreap">{{ $item['createdAt'] }}</small>
                    </div>
                </div>
              </a>
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
              <li class="page-item {{  request()->is('scholar/page/'.$i) ? ' active' : ''  }}">
                <a class="page-link  font-size-18 Kantumruy" href="{{ route('front.page.scholar', ['page' => $i, 'id' => $cate]) }}">{{ $i +1 }}</a>
              </li>
            @endfor
          @if ($currentPage+1 < $totalpage )
            <li class="page-item">
              <a class="page-link next-link  font-size-18 Kantumruy" href="{{ route('front.page.scholar', ['page' => $currentPage + 1, 'id' => $cate]) }}" > <i class="fa-solid fa-forward"></i></a>
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