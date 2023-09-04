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
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកអាហារូបករណ៍" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                        <img src="http://188.166.211.230:9091/v1/api/files/{{ $item['thumbnailImageId'] }}" alt="" width="320px" height="200px" style="margin-bottom: 10px;">
                    </div>
                    <div class="col-lay-4">
                        <a href="{{ route('front.subScholar', $item['id']) }}" class="text-decoration-none color-black font-size-22 Siemreap">{{ $item['title'] }}</a>
                        <br>
                        <small class="Siemreap">{{ $item['createdAt'] }}</small>
                    </div>
                </div>
            </div>
            @endforeach
            
            
        </div>
     </div>
     {{-- <div class="container">
        <div class="row page-main">
            <div class="col-lay-4 pagination">
                <button class="btn btn-outline-primary mg-r-20px font-size-20 Siemreap  ">ថយក្រោយ</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">1</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">2</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">3</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">4</button>
                <button class="btn btn-outline-primary font-size-20 Siemreap ">5</button>
                <button class="btn btn-outline-primary mg-l-20 font-size-20 Siemreap ">ទៅមុខ</button>
            </div>
        </div> --}}
    </div>
    <!-- -------------------------- -->
    <!-- -------------------------------------------- -->
@endsection