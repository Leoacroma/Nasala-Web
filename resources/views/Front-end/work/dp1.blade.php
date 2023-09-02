@extends('Front-end.Layout')
@section('content')
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="dangrek color-blue-355fb6">ផែនការបណ្តុះបណ្តាល</h2>
                </div>
                <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកផែនការ" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div>
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container">
        <div class="row">
            <ul>
                @foreach ($data['data'] as $item)
                    <li>
                        <div class="row p-0">
                            <div class="col-lay-8">
                                <p class="Siemreap font-size-23 ">{{ $item['title'] }}</p>
                            </div>
                            <div class="col-lay-2 ">
                                <a href="{{ $item['url'] }}" class="btn btn-success Siemreap font-size-17 " download>
                                    <i class="fa-solid fa-download mr-2"></i>ទាញយក</a>
                                {{-- <button type="submit" class="btn btn-info Siemreap font-size-17">
                                    <i class="fa-solid fa-eye mr-2"></i>មើល</button> --}}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection