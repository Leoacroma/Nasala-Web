@extends('Back-end.Layout.index')
@section('template')

      <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h4 class="card-title kantumruy">បន្ថែមវគ្គបណ្តុះបណ្តាល</h4>
                  </div>
                </div>
                <p class="card-description kantumruy">
                  បន្ថែមវគ្គ
                </p>
                <div class="divider-line"> </div>
                <form class="forms-sample kantumruy" method="POST" action="{{ route('admin.train.store') }}" enctype="multipart/form-data" >
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputEmail3">ឈ្មោះ <span class="required"></span></label>
                    <input type="text" class="form-control" name="titleKh" placeholder="Title Khmer" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">ឈ្មោះជាភាសាអង់គ្លេស </label>
                    <input type="text" class="form-control" name="title" placeholder="Title English">
                  </div>
                  <div class="form-group">
                    <label for="exampleSelectGender">ប្រភេទវគ្គបណ្តុះបណ្តាល<span class="required"></span></label>
                      <select class="form-select kantumruy " id="exampleSelectGender" name="categoryId" required>
                        <option value="">-- សូមជ្រើសរើស --</option>
                        @foreach ($cate['data'] as $item)
                          <option  value="{{ $item['id'] }}">{{ $item['nameKh'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">ខ្លឹមសារ <span class="required"></span></label>
                    <textarea class="form-control" name="contentKh" id="summernoteKh" required></textarea>
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputPassword4">ខ្លឹមសារជាភាសាអង់គ្លេស</label>
                    <textarea class="form-control" name="content" id="summernoteEng" ></textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary text-white me-2" style="font-weight: 400">រក្សាទុក</button>
                  <a type="submit" class="btn btn-secondary" href="{{ route('admin.train.post') }}" style="font-weight: 400">ត្រលប់ក្រោយ</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- main-panel ends -->
  <!-- page-body-wrapper ends -->
</div>
<script>
</script>

@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{ asset('js/Ckeditor.js') }}"></script>
<script src="{{ asset('js/addImage.js') }}"></script>
@endsection