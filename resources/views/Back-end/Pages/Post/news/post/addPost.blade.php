@extends('Back-end.Layout.index')
@section('template')
      <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading kantumruy"><i class="fa-regular fa-lightbulb fa-bounce"></i> ចំណាំ!</h4>
          <p class="kantumruy" style="font-weight: 100">សូមភ្ចាប់ រូបភាពដែលមានលក្ខណៈ ផ្តេក ដើម្បីកម្រិតច្បាស់នៃព័ត៌មាន <i class="fa-solid fa-images"></i></p>
    
        </div>
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-12">
                    <h4 class="card-title kantumruy">បន្ថែមព័ត៌មាន</h4>
                  </div>
                </div>
                <p class="card-description kantumruy">
                  បន្ថែមព័ត៌មានចូលតារាង
                </p>
                <div class="divider-line"> </div>
                <form class="forms-sample kantumruy" method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data" >
                  @csrf
                  <div class="form-group ">
                    <label for="exampleInputEmail3">ចំណង់ជើង <span class="required"></span></label>
                    <input type="text" class="form-control" name="titleKh" placeholder="ចំណង់ជើង" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">ចំណង់ជើងជាភាសាអង់គ្លេស </label>
                    <input type="text" class="form-control" name="title" placeholder="ចំណង់ជើងជាភាសាអង់គ្លេស">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleSelectGender">ប្រភេទព័ត៌មាន <span class="required"></span></label>
                      <select class="form-select kantumruy" id="exampleSelectGender" name="categoryId" required>
                        <option value="">-- សូមជ្រើសរើស --</option>
                        @foreach ($data['data'] as $item)
                          <option value="{{ $item['id'] }}">{{ $item['nameKh'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    
                  <div class="form-group">
                    <label for="exampleInputPassword4">រូបភាព <span class="required"></span></label>
                    <input type="file" name="thumbnailImageId"  class="form-control file-upload-info" id="image-upload-input" accept="image/*" required>
                    <div  id="uploaded-image-container" class="m-3"></div>
                  </div>
                  <div class="alert alert-danger Siemreap" style="display: none;" role="alert">
                    សូម upload រូបភាព
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">ខ្លឹមសារ <span class="required"></span> </label>
                    <textarea class="form-control Siemreap" name="contentKh" id="summernoteKh" required></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">ខ្លឹមសារជាភាសាអង់គ្លេស </label>
                    <textarea class="form-control Siemreap" name="content" id="summernoteEng" ></textarea>
                  </div>    
                  <button type="submit" class="btn btn-primary text-white me-2" style="font-weight: 400">រក្សាទុក</button>
                  <a type="submit" class="btn btn-secondary" href="{{ route('admin.post') }}" style="font-weight: 400">ត្រលប់ក្រោយ</a>
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