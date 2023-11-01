@extends('Front-end.Layout')
@section('content')
<style>
  .activated{
      border-bottom: 1px solid #355fb6; 
  }
  .activated a{
      color: #355fb6;
  }
</style>
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
    <!-- Content title -->
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
                        <input type="search" name="searchNews" id="searchInput" class="form-control" />
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
            <ul class="list-group  ">
                <li class="list-group-item dp-font bg-color-355fb6 color-white font-size-25" data-locale="{{ $locale }}">{{ __('messages.File type') }}</li>
                <li class="list-group-item "><a class="items-LG  dp-font" href="{{ route('page.lib.all',['page' => 0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a></li>
                @foreach ($result2 as $item)                    
                <li class="list-group-item {{ request()->is('lib/page/cate/' . $item['id']) ? ' active' : '' }}">
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
        <div class="col-md-1"></div>
        <div class="col-md-6" style="margin: 0 auto; text-align: center">
           <img src="http://nasla.k5moi.com/v1/api/files/107" alt="" class="img-fluid">
        </div>
    </div>
</div>
<div class="container rps-sort-lib">
    <div class="col-12">
      <div class="form-group">
          <select class="form-select Kantumruy" id="fileType" name="fileType">
            <option value="{{ route('page.lib.all',['page' => 0]) }}" {{ request()->is('lib/page/0/sort/cate/*') ? 'selected' : '' }}>{{ __('messages.Show all') }}</option>
              @foreach ($result2 as $item)
                <option value="{{ route('page.lib',['page' => 0, 'id' => $item['id']]) }}" {{ request()->is('lib/page/cate/' . $item['id']) ? 'selected' : '' }}>
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
        <img src="http://nasla.k5moi.com/v1/api/files/107" alt="" class="img-fluid">

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