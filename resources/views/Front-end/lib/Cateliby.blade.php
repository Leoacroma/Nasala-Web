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
                    <form class="float-end" action="{{ route('searchLib.lib',  ['page' => 0]) }}" method="GET">
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
    <div class="container rps-sort-blib">
    <div class="row mt-2 ">
        <div class="col-lay-3">
            <ul class="list-group  ">
                <li class="list-group-item dp-font bg-color-355fb6 color-white font-size-25" data-locale="{{ $locale }}">{{ __('messages.File type') }}</li>
                <li class="list-group-item "><a class="items-LG  dp-font" href="{{ route('page.lib.all',['page' => 0]) }}" data-locale="{{ $locale }}">{{ __('messages.Show all') }}</a></li>
                @foreach ($cate['data'] as $item)                    
                <li class="list-group-item {{ request()->is('lib/page/0/sort/cate/' . $item['id']) ? ' active' : '' }}">
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
        <div class="col-lay-6">
            @foreach ($result as $item)
                <div class="row p-0 mb-3">
                    <div class="col-lay-1">
                        <img src="https://nasla.k5moi.com/v1/api/library/{{ $item['id'] }}?isPdf=false" alt="" width="90px">
                    </div>
                    <div class="col-lay-6">
                        <h1 class="Siemreap font-size-25">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 30, $end = '...') }}</h1>
                        <small class="Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</small>
                    </div>
                    <div class="col-3"> 
                        <small class="dp-font" data-locale="{{ $locale }}" >{{ __('messages.Filesize') }} ៖ {{ number_format($item['fileSize'] / 1024) }} Kbytes</small>
                        <a  href="{{ $item['url'] }}" class="btn btn-info Siemreap" download><i class="fa-solid fa-download mr-2"></i>ទាញយកឯកសារ</a>
                        
                    </div>
                </div>
            @endforeach

            <?php
                foreach($result as $dd){
                    $cate = $dd['category_id'];
                }
                

            ?>
            
            <div class="container ">
                <div class="row ">
                  <nav class="mt-5" aria-label="...">
                    <ul class="pagination">
                    @if ($currentPage > 0)
                      <li class="page-item ">
                        <a class="page-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $currentPage - 1]) }}" tabindex="-1"><i class="fa-solid fa-backward"></i></a>
                      </li>
                    @endif
                      @for ($i = 0; $i <= $totalpage-1; $i++)
                        <li class="page-item {{  request()->is('lib/page/'.$i.'/sort/cate/' . $cate) ? ' active' : ''  }}">
                          <a class="page-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $i, 'id' => $cate]) }}">{{ $i +1 }}</a>
                        </li>
                      @endfor
                    @if ($currentPage+1 < $totalpage )
                      <li class="page-item">
                        <a class="page-link next-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $currentPage + 1, 'id' => $cate]) }}" > <i class="fa-solid fa-forward"></i></a>
                      </li>
                    @endif
                    </ul>
                </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container rps-sort-lib">
    <div class="col-12">
      <div class="form-group">
          <select class="form-select Kantumruy" id="fileType" name="fileType">
            <option value="{{ route('page.lib.all',['page' => 0]) }}" selected>{{ __('messages.Show all') }}</option>
              @foreach ($result2 as $item)
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
          <img src="https://nasla.k5moi.com/v1/api/library/{{ $item['id'] }}?isPdf=false" class="card-img-top img-fluid" alt="Fissure in Sandstone"/>
          <div class="card-body">
            <h5 class="card-title Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 50, $end = '...') }}</h5>
            <p class="card-text Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</p>
            <a href="https://nasla.k5moi.com/v1/api/library/{{ $item['id'] }}" class="btn btn-success Siemreap" download><i class="fa-solid fa-download mr-2"></i>{{ __('messages.Download') }}</a>
          </div>
        </div>
      @endforeach
    </div>
    <div class="col-12">
      <nav class="mt-2" aria-label="...">
        <ul class="pagination">
        @if ($currentPage > 0)
          <li class="page-item ">
            <a class="page-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $currentPage - 1]) }}" tabindex="-1"><i class="fa-solid fa-backward"></i></a>
          </li>
        @endif
          @for ($i = 0; $i <= $totalpage-1; $i++)
            <li class="page-item {{  request()->is('lib/page/all/' . $i) ? ' active' : ''  }}">
              <a class="page-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $i, 'id' => $cate]) }}">{{ $i +1 }}</a>
            </li>
          @endfor
        @if ($currentPage+1 < $totalpage )
          <li class="page-item">
            <a class="page-link next-link  font-size-18 Kantumruy" href="{{ route('page.lib', ['page' => $currentPage + 1, 'id' => $cate]) }}" > <i class="fa-solid fa-forward"></i></a>
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