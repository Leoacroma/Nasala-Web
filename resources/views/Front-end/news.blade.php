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
                    <img class="mb-3" src="http://188.166.211.230:9091/v1/api/files/{{$item['thumbnailImageId'] }}" alt="" width="400px" height="300px">
                    <p>{{ $item['titleKh'] }}</p>
                    <small class="font-size-15">{{ $item['createdAt'] }}</small> |
                    <span class="badge bg-warning text-dark Siemreap font-size-12">{{ $item['categoryId'] }}</span>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    {{-- <div class="container ">
        <div class="row page-main ">
            <div class="col-lay-4 pagination">
                <button class="btn btn-outline-primary mg-r-20px font-size-20 Siemreap  ">ថយក្រោយ</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">1</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">2</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">3</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">4</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">5</button>
                <button class="btn btn-outline-primary mg-l-20 font-size-20 Siemreap ">ទៅមុខ</button>
            </div>
        </div>
    </div> --}}
    <!-- -------------------------------------------- -->
@endsection