@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lay-5 d-flex mg-l-m10">
                <i class="fa-solid fa-clipboard-list font-size-30 mg-r-10px color-blue-355fb6"></i>
                <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.News') }}</h2>
            </div>
            <div class="col-lay-5 ">
                <form class="float-end " method="GET" action="{{ route( 'searchNews.news') }}">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                          <input type="search" name="searchNews" id="searchInput" class="form-control" />
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
    <!-- content -->
    <div class="container">
        <div class="row new-card" >
            @foreach ($result as $item)
                <div class="col-lay-3 mt-3">
                        <div class="card" style="height: 450px">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                              <img class="img-news" src="https://nasla.k5moi.com/v1/api/files/{{$item['thumbnailImageId'] }}" class="img-fluid"/>
                              <a href="{{ route('front.subnews', $item['id']) }}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                              </a>
                            </div>
                            <div class="card-body">
                            @if (app()->getLocale() === 'kh')
                              <h5 class="card-title Siemreap" style="line-height: 30px" >{{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 85, $end = '...')}}</h5>
                            @else
                                @if ($item['title'] !== null)
                                    <h5 class="card-title Siemreap">{{\Illuminate\Support\Str::limit($item['title'], $limit = 85, $end = '...')}}</h5>
                                @else
                                    <h5 class="card-title Siemreap"> {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 85, $end = '...')}}</h5>
                                @endif
                            @endif
                            <small class="font-size-15 Siemreap">{{ $item['createdAt'] }}</small> 
                            </div>
                        </div>
                        {{-- <span class="badge bg-warning text-dark Siemreap font-size-12">{{ $item['category']['nameKh'] }}</span> --}}
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
                <a class="page-link" href="{{ route('page.news', ['page' => $currentPage - 1]) }}">Previous</a>
              </li>
            @endif
              <li class="page-item active"><a class="page-link" href="{{ route('front.news') }}">1</a></li>
              @for ($i = 0; $i <= $totalpage-1; $i++)
                <li class="page-item {{  request()->is('news/page/' . $i) ? ' active' : ''  }}"><a class="page-link" href="{{ route('page.news', ['page' => $i]) }}">{{ $i +1 }}</a></li>
              @endfor
            @if ($currentPage < $totalpage )
              <li class="page-item">
                <a class="page-link" href="{{ route('page.news', ['page' => $currentPage + 1]) }}">Next</a>
              </li>
            @endif
                </ul>
              </nav>
        </div>
    </div>
    <!-- -------------------------------------------- -->
@endsection