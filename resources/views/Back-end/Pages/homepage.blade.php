@extends('Back-end.Layout.index')
@section('template')
<style>
    .card-img-top {
        width: 100%;
        height: 15vw;
        object-fit: cover;
    }
</style>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-sm-6 mb-4 mb-xl-0">
                <div class="d-lg-flex align-items-center kantumruy">
                    <div>
                        <h3 class="text-dark font-weight-bold mb-2 kantumruy">សួរស្តី, សូមស្វាគមន៍!  <span class="badge badge-primary">{{ $lastName }}</span></h3>
                        <h6 class="font-weight-normal mb-2 kantumruy">ការត្រលប់មកកានប្រព័ន្ធវិញ.</h6>
                    </div>

                </div>
            </div>
        </div>  
        <div class="row">
            <div class="col-sm-8 flex-column d-flex stretch-card">
                <div class="row">
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                            <div class="card bg-primary">
                                <a class="text-decoration-none hover-animation" href="{{ route('admin.post') }}">
                                    <div class="card-body text-white">
                                        <h3 class="font-weight-bold mb-3 kantumruy">ចំនួន : {{ $count }} ព័ត៌មាន</h3>
                                        <div class="progress mb-2">
                                            <div class="progress-bar bg-warning" role="progressbar" id="progress-bar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <p class="pb-0 mb-2 kantumruy" style="font-size: 20px">ការគ្រប់គ្រងព័ត៌មាន</p>
                                        <small class="kantumruy hover-animation-sub" style="opacity: 20%">មើលបន្ថែម <i class="fa-solid fa-angles-right"></i></small>
                                    </div>
                                </a>
                            </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-diffrence-border">
                            <a class="text-decoration-none hover-animation" href="{{ route('admin.pub.index') }}">
                                <div class="card-body">
                                    <h2 class="text-dark mb-2 font-size-20 kantumruy">ចំនួន : {{ $countFilePub }} ឯកសារ</h2>
                                    <h5 class="card-title mb-2 kantumruy" style="font-size: 20px">ការគ្រប់គ្រងឯកសារអាហាររូបករណ៍</h5>
                                    <small class="text-muted kantumruy hover-animation-sub">មើលបន្ថែម <i class="fa-solid fa-angles-right"></i></small>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-4 d-flex grid-margin stretch-card">
                        <div class="card sale-visit-statistics-border">
                            <a class="text-decoration-none hover-animation" href="{{ route('admin.pub.index') }}">
                                <div class="card-body">
                                    <h2 class="text-dark mb-2  font-size-20 kantumruy">ចំនួន : {{ $countLib }} ឯកសារ</h2>
                                    <h4 class="card-title mb-2 kantumruy" style="font-size: 20px">ការគ្រប់គ្រងឯកសារបណ្ណាល័យ</h4>
                                    <small class="text-muted kantumruy hover-animation-sub">មើលបន្ថែម <i class="fa-solid fa-angles-right"></i></small>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 grid-margin d-flex stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center justify-content-between">
                                    <h4 class="card-title mb-2 kantumruy">ព័ត៌មានថ្មីៗ</h4>
                                    <a href="{{ route('admin.post') }}" class="btn btn-outline-primary kantumruy" style="font-weight: 400;">មើលបន្ថែម</a>

                                </div>
                                <div class="mt-3">
                                     <!-- Tabs navs -->
                                <!-- Tabs navs -->
                                    <ul class="nav nav-tabs tab-no-active-fill" id="ex-with-icons" role="tablist">
                                        <li class="nav-item" role="presentation">
                                        <a class="nav-link active kantumruy" style="font-weight: 400; font-size: 15px" id="ex-with-icons-tab-1" data-mdb-toggle="tab" href="#All-tab" role="tab"
                                            aria-controls="ex-with-icons-tabs-1" aria-selected="true">ទាំងអស់</a>
                                        </li>
                                        @foreach ($cate['data'] as $item)
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link kantumruy {{ request()->is('admin/sort/'. $item['id']) ? 'active' : '' }}" id="ex-with-icons-tab-2" href="{{ route('admin.newsSortCate', $item['id']) }}" role="tab"
                                                    aria-controls="ex-with-icons-tabs-2" aria-selected="false" style="font-weight: 400; font-size: 15px">{{ $item['nameKh'] }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <!-- Tabs navs -->
                                    
                                    <!-- Tabs content -->
                                    <div class="tab-content" id="ex-with-icons-content">
                                        <div class="tab-pane fade show active" id="All-tab" role="tabpanel" aria-labelledby="All-tab">
                                           <div class="row">
                                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                                @foreach ($result as $dd)
                                                    <div class="col">
                                                        <div class="card" >
                                                            <img src="https://nasla.k5moi.com/v1/api/files/{{ $dd['thumbnailImageId'] }}"  class="card-img-top" alt="Hollywood Sign on The Hill"/>
                                                            <div class="card-body">
                                                                <span class="card-title kantumruy" style="font-size: 16px; line-height: 25.5px;">{{ \Illuminate\Support\Str::limit($dd['titleKh'], $limit = 90, $end = '...')}}</span>
                                                                <br/>
                                                                <br/>
                                                                <small class="text-muted kantumruy">{{ $dd['createdAt'] }}</small>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

                                              </div>
                                           </div>
                                        </div>
                                        @foreach ($cate['data'] as $item)
                                            <div class="tab-pane fade" id="cate-tab-{{ $item['id'] }}" role="tabpanel" aria-labelledby="cate-tab-{{ $item['id'] }}">
                                                <div class="row row-cols-1 row-cols-md-3 g-4">
                                                    @foreach ($result1 as $dd) 
                                                    <div class="col">
                                                        <div class="card" >
                                                            <img src="https://nasla.k5moi.com/v1/api/files/{{ $dd['thumbnailImageId'] }}" style="height: 200px;" class="card-img-top" alt="Hollywood Sign on The Hill"/>
                                                        <div class="card-body">
                                                            <span class="card-title kantumruy" style="font-size: 16px; line-height: 25.5px;">{{ \Illuminate\Support\Str::limit($dd['titleKh'], $limit = 90, $end = '...')}}</span>
                                                            <br/>
                                                            <small class="text-muted kantumruy">{{ $dd['createdAt'] }}</small>

                                                        </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Tabs content -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 flex-column d-flex stretch-card">
                <div class="row flex-grow">
                    <div class="col-sm-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title mb-0 kantumruy">អាហាររូបករណ៍</h4>
                                            <a href="{{ route('admin.pub.index') }}" class="btn btn-outline-primary kantumruy" style="font-weight: 400;">មើលបន្ថែម</a>
                                        </div>
                                        <p class="mt-1 kantumruy"  style="font-weight: 400;">ឯកសារបញ្ចូលចុងក្រោយ</p>
                                        @foreach ($result2 as $tt)
                                            
                                        <div class="card-group">
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                  <img
                                                    src="https://nasla.k5moi.com/v1/api/files/{{ $tt['thumbnailImageId'] }}"
                                                    alt="Trendy Pants and Shoes"
                                                    class="img-fluid rounded-start"
                                                  />
                                                </div>
                                                <div class="col-md-8">
                                                  <div class="card-body">
                                                    <a style="font-size: 18px; line-height: 25.5px; color: black; text-decoration: none" class="card-title kantumruy"
                                                   >{{ \Illuminate\Support\Str::limit($tt['title'], $limit = 100, $end = '...') }}</a>
                                                    <p class="card-text">
                                                      <small class="text-muted kantumruy">{{ $tt['createdAt'] }}</small>
                                                    </p>
                                                  </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title kantumruy">វគ្គបណ្តុះបណ្តាល</h4>
                            <h4 class="text-success font-weight-bold kantumruy">ចំនួន : <span class="text-dark ms-3">{{ $countTrian }} វគ្គ</span></h4>
                        </div>
                        <p class="kantumruy"  style="font-weight: 400;">តារាងវគ្គបណ្តុះបណ្តាលបញ្ចូលចុងក្រោយ</p>
                        <table class="table table-hover" id="newsTable1" style="font-size: 25px;">
                            <thead>
                                <tr class="table kantumruy">
                                  <th scope="col">ល.រ</th>
                                  <th scope="col">ឈ្មោះ</th>
                                  <th scope="col">កាលបរិច្ឆេទ</th>
                                </tr>
                              </thead>
                        </table>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.train.post') }}" class="btn btn-outline-primary float-end kantumruy" style="font-weight: 400;">មើលបន្ថែម</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 grid-margin grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center justify-content-between">
                            <h4 class="card-title kantumruy">ឯកសារបណ្តុះបណ្តាល</h4>
                            <h4 class="text-success font-weight-bold kantumruy">ចំនួន : <span class="text-dark ms-3">{{ $countTrianfile }} ឯកសារ</span></h4>
                        </div>
                        <p class="kantumruy"  style="font-weight: 400;">តារាងឯកសារចុងក្រោយ</p>
                        <table id="newsTable2" class="table table-hover kantumruy" style="font-size: 25px;">
                            <thead>
                                <tr class="table kantumruy">
                                  <th scope="col">ល.រ</th>
                                  <th scope="col">ឈ្មោះ</th>
                                  <th scope="col">កាលបរិច្ឆេទ</th>
                                </tr>
                            </thead>
                            <tbody class="kantumruy p-5">
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('admin.train.post') }}" class="btn btn-outline-primary float-end kantumruy" style="font-weight: 400;">មើលបន្ថែម</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 grid-margin mt-4 grid-margin-md-0 stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-lg-flex align-items-center justify-content-between ">
                            <h4 class="card-title kantumruy">វគ្គចុះឈ្មោះចូលរៀន</h4>
                            <a href="{{ route('admin.reg.index') }}" class="btn btn-outline-primary kantumruy" style="font-weight: 400;">មើលបន្ថែម</a>
                        </div>
                        <p class="kantumruy mb-3"  style="font-weight: 400;">វគ្គចូលរៀនថ្មីដែលចាប់បើក</p>
                        <div class="product-order-wrap padding-reduced">
                            <div class="row">
                            @foreach ($result3 as $index => $item)
                                @php
                                $hyperlink = $item['hyperlink'];
                                if (!str_starts_with($hyperlink, 'http://') && !str_starts_with($hyperlink, 'https://')) {
                                    $hyperlink = 'https://' . $hyperlink;
                                }

                            @endphp
                                <div class="col-3">
        
                                      <div class="card" >
                                        <img src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}" class="card-img-top img-cdd" alt="Fissure in Sandstone"/>
                                        <span class="badge badge-danger kantumruy" style="font-size: 15px"><i class="fa-solid fa-calendar-days fa-beat-fade"></i> ផុតកំណត់ ៖ {{ $item['registerEndDate'] }} </span> 
                                        <div class="card-body">
                                          <h5 class="card-title kantumruy" style=" font-weight: bold; font-size: 20px">{{\Illuminate\Support\Str::limit($item['courseName'], $limit = 36, $end = '...')}} </h5>
                                          <span class="kantumruy" style="font-size: 15px; font-weight: 100">ចាប់ពីថ្ងៃ : <span class="badge badge-primary Kantumruy" style="font-size: 15px; font-weight: 100">{{ $item['courseStartDate'] }} <i class="fa-solid fa-arrow-right fa-bounce"></i> {{ $item['courseEndDate'] }}</span></span>
                                          <p class="card-text kantumruy" style="font-size: 15px">{{\Illuminate\Support\Str::limit($item['description'], $limit = 90, $end = '...')}}</p>
                                          
                                          <a href="{{ $hyperlink }}" class="btn btn-primary kantumruy" style="font-size: 15px; font-weight: 400">ចុះឈ្មោះ</a>
                                          {{-- <a href="{{ $hyperlink }}" class="btn btn-info Kantumruy" ></a> --}}
                                       
                                         <button type="button" class="btn btn-secondary kantumruy" data-mdb-toggle="modal" data-mdb-target="#exampleModal{{ $item['id'] }}" style="font-size: 15px; font-weight: 400">
                                            មើលលំអិត
                                          </button>
                        
                                          @include('Back-end.plugin.central-drop')
                                        </div>
                                      </div>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
    $(document).ready(function() {
        var data = {!! $dataJson1 !!};      
        $('#newsTable1').DataTable({
            data: data,
            columns: [
                { data: 'id' },
                { data: 'titleKh' },
                { data: 'createdAt' },
            ],
            searching: false,
            ordering: false,
            paging: false
        });
    });
    $(document).ready(function() {
        var data = {!! $dataJson2 !!};      
        $('#newsTable2').DataTable({
            data: data,
            columns: [
                { data: 'id' },
                { data: 'title' },
                { data: 'createdAt'},
            ],
            searching: false,
            ordering: false,
            paging: false
        });
    });
            // Assuming you have the count stored in a variable called 'count'
var count = {{ $count }}; // Replace with your actual count

// Calculate the percentage
var percentage = (count / 100) * 100;

// Update the width of the progress bar
var progressBar = document.getElementById('progress-bar');
progressBar.style.width = percentage + '%';
progressBar.setAttribute('aria-valuenow', percentage);



        </script>
@endsection