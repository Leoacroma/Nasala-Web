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
                    <h4 class="card-title">Edit Post</h4>
                  </div>
                </div>
                <p class="card-description">
                  Edit elements
                </p>
                <div class="divider-line"> </div>
                <form class="forms-sample" method="POST" action="{{ route('admin.update', $data['data']['id']) }}" enctype="multipart/form-data" >
                  @csrf
                  @method('PATCH')
                  <div class="form-group">
                    <label for="exampleInputEmail3">Title<span class="required"></span></label>
                    <input type="text" class="form-control" name="titleKh" value="{{ $data['data']['titleKh'] }}" placeholder="Title Khmer" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Title English</label>
                    <input type="text" class="form-control" name="title" value="{{ $data['data']['title'] }}" placeholder="Title English">
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleSelectGender">Caetgories<span class="required"></span></label>
                      <select class="form-select Siemreap" id="exampleSelectGender" name="categoryId" required>
                        @foreach ($All_cate['data'] as $item)
                          <option value="{{ $item['id'] }}" {{ $item['id'] == $data['data']['category']['id'] ? 'selected' : '' }}>{{ $item['nameKh'] }}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword4">Thumbnail</label>
                      <input type="file" name="thumbnailImageId" class="form-control file-upload-info" id="image-upload-input2" accept="image/*">
                      <div  id="uploaded-image-container2" class="m-3"></div>
                      <img id="previous-img" src="{{ $image }}" alt="" width="250px" height="200px">
                    </div>
                    <div class="alert alert-danger Siemreap" style="display: none;" role="alert">
                      សូម upload រូបភាព
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Content <span class="required"></span></label>
                    <textarea class="form-control" name="contentKh" id="summernoteKh" required> {!! $data['data']['contentKh'] !!}</textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Content English</label>
                    <textarea class="form-control" name="content"  id="summernoteEng" required>{!! $data['data']['content'] !!}</textarea>
                  </div>   
                  <button type="submit" class="btn btn-primary me-2">Save</button>
                  <a type="submit" class="btn btn-secondary" href="{{ route('admin.post') }}">Cancel</a>
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
<script src="{{ asset('js/editImage.js') }}"></script>
@endsection