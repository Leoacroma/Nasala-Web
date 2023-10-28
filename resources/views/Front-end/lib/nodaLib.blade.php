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
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Library') }}</h2>
                </div>
                <div class="col-lay-5 ">
                    <form class="float-end" action="{{ route('searchLib.lib', ['page' => 0]) }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <div class="form-outline">
                              <input type="search" name="searchLibs"  id="searchInput" class="form-control" />
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
    <div class="row mt-2 ">
        <div class="col-lay-3">
            <ul class="list-group  ">
                <li class="list-group-item dp-font bg-color-355fb6 color-white font-size-25" data-locale="{{ $locale }}">{{ __('messages.File type') }}</li>
                <li class="list-group-item "><a class="items-LG  dp-font" href="{{ route('page.lib.all',['page' => 0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a></li>
                @foreach ($cate['data'] as $item)                    
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
        <div class="col-lay-1"></div>
        <div class="col-lay-6" style="margin: 0 auto; text-align: center">
           <img src="http://nasla.k5moi.com/v1/api/files/107" alt="" width="400px">
        </div>
    </div>
</div>
<!-- -------------------------------------------- -->
@endsection