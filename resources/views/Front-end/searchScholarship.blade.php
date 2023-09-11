@extends('Front-end.Layout')
@section('content')
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="dangrek color-blue-355fb6">ការផ្សព្វផ្សាយ</h2>
                </div>
                <div class="col-lay-5 ">
                  <form class="float-end " method="GET" action="{{ route('search.scholar') }}">
                    @csrf
                        <div class="input-group">
                            <div class="form-outline">
                              <input type="search" name="searchSch" value="{{ $request_Keyword }}" id="searchInput" class="form-control" />
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
            <div class="col-lay-5">
                <div class="row">
                    <div class="col-lay-4">
                        <img src="http://188.166.211.230:8080/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="220px" height="300px" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-lay-4">
                        <a href="{{ route('front.subScholar', $item['id']) }}" class="text-decoration-none color-black font-size-22 Siemreap">{{ \Illuminate\Support\Str::limit($item['title'], $limit = 100, $end = '...')}}</a>
                        <br>
                        <small class="Siemreap">{{ $item['createdAt'] }}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
     </div>
   
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection