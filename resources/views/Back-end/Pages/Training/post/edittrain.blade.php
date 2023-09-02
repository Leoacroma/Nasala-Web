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
                    <h4 class="card-title">Edit Training</h4>
                  </div>
                </div>
                <p class="card-description">
                  Add elements
                </p>
                <div class="divider-line"> </div>
                <form class="forms-sample" method="POST" action="{{ route('admin.train.update', $data['data']['id']) }}" enctype="multipart/form-data" >
                  @csrf
                  @method('PATCH')
                  <div class="form-group">
                    <label for="exampleInputEmail3">Title <span class="required"></span></label>
                    <input type="text" class="form-control" value="{{ $data['data']['titleKh'] }}" name="titleKh" placeholder="Title Khmer" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputName1">Title English</label>
                    <input type="text" class="form-control" value="{{ $data['data']['title'] }}" name="title" placeholder="Title English" required>
                  </div>
                
                  <div class="form-group">
                    <label for="exampleSelectGender">Categories <span class="required"></span></label>
                    <select class="form-select Siemreap " id="exampleSelectGender" name="categoryId" required>
                      <option value="" selected>-- សូមជ្រើសរើស --</option>
                        @foreach ($cate['data'] as $item)
                          <option  value="{{ $item['id'] }}" {{ $item['id'] == $data['data']['categoryId'] ? 'selected' : '' }}>{{ $item['nameKh'] }}</option>
                        @endforeach
                      </select>
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword4">Content <span class="required"></span></label>
                    <textarea class="form-control" name="contentKh" id="summernoteKh" required>{{ $data['data']['contentKh'] }}</textarea>
                  </div>   
                  <div class="form-group">
                    <label for="exampleInputPassword4">Content English</label>
                    <textarea class="form-control" name="content" id="summernoteEng" required>{{ $data['data']['content'] }}</textarea>
                  </div>
                 
                  <button type="submit" class="btn btn-primary text-white me-2">Save</button>
                  <a type="submit" class="btn btn-secondary" href="{{ route('admin.train.post') }}">Cancel</a>
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