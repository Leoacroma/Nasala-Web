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
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="dangrek color-blue-355fb6">បណ្ណាល័យ</h2>
                </div>
                <div class="col-lay-5 ">
                    <form class="float-end " action="{{ route('searchLib.lib') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <div class="form-outline">
                              <input type="search" name="searchLibs" id="searchInput" class="form-control" />
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
                <li class="list-group-item dangrek bg-color-355fb6 color-white font-size-25">ប្រភេទឯកសារ</li>
                <li class="list-group-item activated"><a class="items-LG " href="{{ route('front.liby') }}">បង្ហាញទាំងអស់</a></li>
                @foreach ($cate['data'] as $item)                    
                    <li class="list-group-item {{ request()->is('lib/sort/cate/' . $item['id']) ? ' liActive' : '' }}"><a class="items-LG " href="{{ route('sort.cate.lib', $item['id']) }}">{{ $item['nameKh'] }}</a></li>
                @endforeach
              </ul>
        </div>
        <div class="col-lay-1"></div>
        <div class="col-lay-6">
            @foreach ($result as $item)
                <div class="row p-0 mb-3">
                    <div class="col-lay-1">
                        <img src="{{ asset('images/front/pdf.png') }}" alt="" width="60px">
                    </div>
                    <div class="col-lay-6">
                        <h1 class="Siemreap font-size-20">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 50, $end = '...') }}</h1>
                        <small class="Siemreap">កាលបរិច្ឆេទ ៖ {{ $item['createdAt'] }}</small>
                    </div>
                    <div class="col-3"> 
                        <small class="Siemreap" >ទំហំ ៖ {{ number_format($item['fileSize'] / 1024) }} Kbytes</small>
                        <a  href="https://nasla.k5moi.com/v1/api/library/{{ $item['id'] }}" class="btn btn-info Siemreap" download><i class="fa-solid fa-download mr-2"></i>ទាញយកឯកសារ</a>
                        
                    </div>
                </div>
            @endforeach
            
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
                        <a class="page-link" href="{{ route('page.lib', ['page' => $currentPage - 1]) }}">Previous</a>
                      </li>
                    @endif
                      <li class="page-item active"><a class="page-link" href="{{ route('front.liby') }}">1</a></li>
                      @for ($i = 1; $i <= $totalpage-1; $i++)
                        <li class="page-item {{  request()->is('lib/page/' . $i) ? ' active' : ''  }}"><a class="page-link" href="{{ route('page.lib', ['page' => $i]) }}">{{ $i +1 }}</a></li>
                      @endfor
                    @if ($currentPage < $totalpage )
                      <li class="page-item">
                        <a class="page-link" href="{{ route('page.lib', ['page' => $currentPage + 1]) }}">Next</a>
                      </li>
                    @endif
                        </ul>
                      </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------------------------------------------- -->
@endsection