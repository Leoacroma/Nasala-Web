@extends('Front-end.Layout')
@section('content')
    <!-- Content title -->
    <div class="container mt-4">
        <div class="row">
            <div class="row">
                <div class="col-lay-5 d-flex mg-l-m10">
                    <h2 class="dangrek color-blue-355fb6">ចុះឈ្មោះចូលរៀន</h2>
                </div>
                {{-- <div class="col-lay-5 ">
                    <form class="float-end " action="">
                        <div class="input-group width-400 mg-r-20m">
                            <input type="search" class="form-control rounded search" placeholder="ស្វែងរកផែនការ" aria-label="Search" aria-describedby="search-addon" />
                            <button type="button" class="btn btn-primary search-icon"><i class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                </div> --}}
                <div class="col-lay-10 divider-line"></div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container">
        <div class="row">
            <ul>
                <li>
                    <div class="row p-0">
                        <div class="col-lay-10">
                            <p class="Siemreap font-size-23 ">ចុះឈ្មោះចូលរៀន</p>
                          
                            @foreach ($reg['data'] as $item)
                            @php
                                $hyperlink = $item['hyperlink'];
                                if (!str_starts_with($hyperlink, 'http://') && !str_starts_with($hyperlink, 'https://')) {
                                    $hyperlink = 'https://' . $hyperlink;
                                }
                            @endphp    
                            <ul>
                                    <li class="Siemreap"><p>{{ $item['hypertext'] }}</p></li>
                                    <ul>
                                        <li class="Siemreap"><a href="{{ $hyperlink }}">{{ $item['hyperlink'] }}</a></li>
                                    </ul>
                                </ul>
                            @endforeach
                            
                        </div>
                    </div>
                </li>
            </ul>

        </div>
    </div>

    <!-- -------------------------------------------- -->
@endsection