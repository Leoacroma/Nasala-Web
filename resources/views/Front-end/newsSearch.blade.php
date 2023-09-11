@extends('Front-end.Layout')
@section('content')
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-lay-5 d-flex mg-l-m10">
                <i class="fa-solid fa-clipboard-list font-size-30 mg-r-10px color-blue-355fb6"></i>
                <h2 class="dangrek color-blue-355fb6">ព័ត៌មាន</h2>
            </div>
            <div class="col-lay-5 ">
                <form class="float-end " method="GET" action="{{ route( 'searchNews.news') }}">
                    @csrf
                    <div class="input-group">
                        <div class="form-outline">
                          <input type="search" name="searchNews" value="{{ $requeste_Keyword }}" id="searchInput" class="form-control" />
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
        <div class="row new-card">
            @foreach ($result as $item)
            <div class="col-lay-3 mt-3">
                <a  href="{{ route('front.subnews', $item['id']) }}" class=" text-decoration-none color-black Siemreap  font-size-20">
                    <img class="mb-3" src="http://188.166.211.230:8080/v1/api/files/{{$item['thumbnailImageId'] }}" alt="" width="400px" height="300px">
                    <p>{{ \Illuminate\Support\Str::limit($item['titleKh'], $limit = 90, $end = '...')}}</p>
                    <small class="font-size-15">{{ $item['createdAt'] }}</small> |
                    <span class="badge bg-warning text-dark Siemreap font-size-12">{{ $item['category']['nameKh'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div> 
    <!-- -------------------------------------------- -->
@endsection