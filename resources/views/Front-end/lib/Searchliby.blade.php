@extends('Front-end.Layout')
@section('content')
    <!-- Content title -->
<?php
    // Retrieve the locale value from the session
    $locale = app()->getLocale();
?>

@section('pagination-style')
<style>
.page-item{
    border: 1px solid rgb(186, 186, 186); 
    border-radius: 5px;
    display: flex;
    justify-content: center;
    align-items: center;
}
</style>
@endsection
    <div class="container mt-4">
      <div class="row">
          <div class="col-md-9 col-12 d-flex">
            <i class="icon-size-rps fa-solid fa-book mg-r-10px color-blue-355fb6"></i>
              <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Library') }}</h2>
          </div>
          <div class="col-md-3 search-brps">
            <form class="float-end" method="GET" action="{{ route('searchLib.lib', ['page' => 0]) }}">
                @csrf
                <div class="input-group">
                    <div class="form-outline">
                      <input type="search" name="searchLibs" id="searchInput" class="form-control" value="{{ $request_Keyword }}"/>
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
    <div class="container rps-sort-blib">
    <div class="row mt-2 ">
      <div class="col-md-3">
        <ul class="list-group">
          <li class="list-group-item dp-font bg-color-355fb6 color-white font-size-25" data-locale="{{ $locale }}">{{ __('messages.File type') }}</li>
          <li class="list-group-item active"><a class="items-LG  dp-font" href="{{ route('page.lib.all',['page' => 0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a></li>
          @foreach ($cate['data'] as $item)                    
          <li class="list-group-item {{ request()->is('/lib/page/0/sort/cate/' . $item['id']) ? ' active' : '' }}">
            @if (app()->getLocale() === 'kh')
                <a class="items-LG dp-font" href="{{ route('page.lib',['page' => 0, 'id' => $item['id']]) }}" data-locale="{{ $locale }}">{{ $item['nameKh'] }}</a>
            @else
                @if ($item['name'] !== null)
                    <a class="items-LG dp-font" href="{{ route('page.lib',['page' => 0, 'id' => $item['id']]) }}" data-locale="{{ $locale }}">{{ $item['name'] }}</a>
                @else
                    <a class="items-LG dp-font" href="{{ route('page.lib',['page' => 0, 'id' => $item['id']]) }}" data-locale="{{ $locale }}">{{ $item['nameKh'] }}</a>
                @endif
            @endif  
        </li>
          @endforeach
        </ul>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-7">
          @foreach ($result as $item)
          <div class="row p-0 mb-3">
            <div class="col-3">
              <img src="https://api-nasla.k5moi.com/v1/api/library/{{ $item['id'] }}?isPdf=false" alt="" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h1 class="Siemreap font-size-20">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 50, $end = '...') }}</h1>
                <small class="Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</small>
            </div>
            <div class="col-3"> 
                <small class="dp-font" data-locale="{{ $locale }}" >{{ __('messages.Filesize') }} ៖ {{ number_format($item['fileSize'] / 1024) }} Kbytes</small>
                <a  href="https://api-nasla.k5moi.com/v1/api/library/{{ $item['id'] }}" class="btn btn-success Siemreap" download><i class="fa-solid fa-download mr-2"></i>{{ __('messages.Download') }}</a>
                
            </div>
        </div>
      @endforeach  
  <div class="container rps-sort-blib">
      <div class="row ">
        <nav class="mt-5" aria-label="...">
          <ul class="pagination">
          @if ($currentPage > 0)
            <li class="page-item ">
              <a class="page-link  " href="{{ route('searchLib.lib', ['page' => $currentPage - 1]) }}" tabindex="-1"><i class="fa-solid fa-chevron-left"></i></a>
            </li>
          @endif
            @for ($i = 0; $i <= $totalpage-1; $i++)
              <li class="page-item {{   Route::currentRouteNamed('searchLib.lib', ['page'=>$i, 'keyword' => $request_Keyword] ) ? 'active' : ''  }}">
                <a class="page-link  font-size-18 Kantumruy" href="{{ route('searchLib.lib', ['page' => $i]) }}">{{ $i +1 }}</a>
              </li>
            @endfor
          @if ($currentPage+1 < $totalpage )
            <li class="page-item">
              <a class="page-link next-link  " href="{{ route('searchLib.lib', ['page' => $currentPage + 1]) }}" > <i class="fa-solid fa-chevron-right"></i></a>
            </li>
          @endif
          </ul>
      </nav>
      </div>
    </div>
        </div>
    </div>
        </div>
    </div>
</div>
{{-- </---------------------Responsive-------------------------------/> --}}
<div class="container rps-sort-lib">
  <div class="col-12">
    <div class="form-group">
        <select class="form-select Kantumruy" id="fileType" name="fileType">
          <option value="{{ route('page.lib.all',['page' => 0]) }}" selected>{{ __('messages.Show all') }}</option>
            @foreach ($cate['data'] as $item)
              <option value="{{ route('page.lib',['page' => 0, 'id' => $item['id']]) }}"{{ request()->is('/lib/page/0/sort/cate/' . $item['id']) ? ' selected' : '' }}>
                @if (app()->getLocale() === 'kh')
                  {{ $item['nameKh'] }}
                @else
                  {{ $item['name'] ?? $item['nameKh'] }}
                @endif
              </option>
            @endforeach
        </select>
    </div>
  </div>
  <div class="col-12 mt-2">
    @foreach ($result as $item)
      <div class="card">
        <img src="https://api-nasla.k5moi.com/v1/api/library/{{ $item['id'] }}?isPdf=false" class="card-img-top img-fluid" alt="Fissure in Sandstone"/>
        <div class="card-body">
          <h5 class="card-title Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 50, $end = '...') }}</h5>
          <p class="card-text Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</p>
          <a href="https://api-nasla.k5moi.com/v1/api/library/{{ $item['id'] }}" class="btn btn-success Siemreap" download><i class="fa-solid fa-download mr-2"></i>{{ __('messages.Download') }}</a>
        </div>
      </div>
    @endforeach
  </div>
  <div class="col-12">
    <nav class="mt-2" aria-label="...">
      <ul class="pagination">
      @if ($currentPage > 0)
        <li class="page-item ">
          <a class="page-link " href="{{ route('searchLib.lib', ['page' => $currentPage - 1]) }}" tabindex="-1"><i class="fa-solid fa-chevron-letf"></i></a>
        </li>
      @endif
        @for ($i = 0; $i <= $totalpage-1; $i++)
          <li class="page-item {{  request()->is('lib/page/all/' . $i) ? ' active' : ''  }}">
            <a class="page-link  font-size-18 Kantumruy" href="{{ route('searchLib.lib', ['page' => $i, 'keyword' => $request_Keyword]) }}">{{ $i +1 }}</a>
          </li>
        @endfor
      @if ($currentPage+1 < $totalpage )
        <li class="page-item">
          <a class="page-link next-link  " href="{{ route('searchLib.lib', ['page' => $currentPage + 1, 'keyword' => $request_Keyword]) }}" > <i class="fa-solid fa-chevron-right"></i></a>
        </li>
      @endif
      </ul>
  </nav>
  </div>
</div>
<script>
  document.getElementById('fileType').addEventListener('change', function() {
    var selectedValue = this.value;
    window.location.href = selectedValue;
  });
</script>
<!-- -------------------------------------------- -->
@endsection