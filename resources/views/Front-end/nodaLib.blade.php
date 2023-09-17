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
                <li class="list-group-item "><a class="items-LG " href="{{ route('front.liby') }}">បង្ហាញទាំងអស់</a></li>
                @foreach ($cate['data'] as $item)                    
                    <li class="list-group-item {{ request()->is('lib/cate/' . $item['id']) ? ' activated' : '' }}"><a class="items-LG " href="{{ route('sort.cate.lib', $item['id']) }}">{{ $item['nameKh'] }}</a></li>
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