@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = session('locale');
?>
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lay-5 d-flex mg-l-m10">
                <i class="fa-solid fa-clipboard-list font-size-30 mg-r-10px color-blue-355fb6"></i>
                <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.News') }}</h2>
            </div>
            <div class="col-lay-5 ">
                <form class="float-end " action="">
                    <div class="input-group width-200">
                        <input type="search" class="form-control rounded search" placeholder="ស្វែងរកព័ត៌មាន" aria-label="Search" aria-describedby="search-addon" />
                        <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-lay-10 divider-line"></div>
        </div>
    </div>
    <!-- content -->
    <div class="container">
        <div class="row new-card">
            @foreach ($result as $item)
            <div class="col-lay-3 mt-3">
                <a  href="{{ route('front.subnews', $item['id']) }}" class=" text-decoration-none color-black Siemreap  font-size-20">
                    <img class="mb-3" src="https://nasla.k5moi.com/v1/api/files/{{$item['thumbnailImageId'] }}" alt="" width="400px" height="300px">
                    @if (app()->getLocale() === 'kh')
                        <span class="font-size-20  hover-title-animate Siemreap">
                            {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 85, $end = '...')}}
                        </span>
                    @else
                        @if ($item['title'] !== null)
                            <span class="font-size-20  hover-title-animate Siemreap">
                                {{\Illuminate\Support\Str::limit($item['title'], $limit = 85, $end = '...')}}
                            </span>
                        @else
                            <span class="font-size-20  hover-title-animate Siemreap">
                                {{\Illuminate\Support\Str::limit($item['titleKh'], $limit = 85, $end = '...')}}
                            </span>
                        @endif
                    @endif
                    <small class="font-size-15">{{ $item['createdAt'] }}</small> |
                    {{-- <span class="badge bg-warning text-dark Siemreap font-size-12">{{ $item['category']['nameKh'] }}</span> --}}
                </a>
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
                <ul class="pagination font-size-30 ">
                @if ($currentPage > 0)
                  <li class="page-item">
                    <a class="page-link" href="{{ route('page.news', ['page' => $currentPage - 1]) }}" tabindex="-1">Previous</a>
                  </li>
                @endif
                  <li class="page-item "><a class="page-link" href="{{ route('front.news') }}">1</a></li>
                  @for ($i = 1; $i <= $totalpage-1; $i++)
                    <li class="page-item {{  request()->is('news/page/' . $i) ? ' active' : ''  }}"><a class="page-link" href="{{ route('page.news', ['page' => $i]) }}">{{ $i +1 }}</a></li>
                  @endfor
                @if ($currentPage < $totalpage && $currentPage > $totalpage)
                  <li class="page-item">
                    <a class="page-link next-link" href="{{ route('page.news', ['page' => $currentPage + 1]) }}">Next</a>
                  </li>
                @endif
                </ul>
              </nav>
        </div>
    </div>
    <!-- -------------------------------------------- -->
@endsection