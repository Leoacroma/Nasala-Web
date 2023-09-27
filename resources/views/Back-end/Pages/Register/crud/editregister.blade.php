<div class="modal fade" id="editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title kantumruy" id="exampleModalLabel">កែប្រែ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="kantumruy" action="{{ route('admin.reg.update', $item['id'])}}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1 ">ចំណងជើងវគ្គសិក្សា </label>
                <input type="text" name="courseName" class="form-control" value="{{ $item['courseName'] }}"  id="exampleFormControlInput1" placeholder="ចំណងជើងវគ្គសិក្សា" required>
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1 ">Hypertext </label>
                  <input type="text" name="hypertext" class="form-control" value="{{ $item['hypertext'] }}"  id="exampleFormControlInput1" placeholder="Hypertext" required>
              </div>
              <div class="form-group">
              <label for="exampleFormControlInput1 ">Hyperlink </label>
              <input type="link" name="hyperlink" class="form-control" value="{{ $item['hyperlink'] }}"  id="exampleFormControlInput1" placeholder="Hyperlink" required>
              </div>
              <div class="form-group">
              <label for="exampleFormControlInput1 ">ការពិពណ៌នាអំពីវគ្គសិក្សា </label>
              <input type="text" name="description" class="form-control"  value="{{ $item['description'] }}"  id="exampleFormControlInput1" placeholder="ការពិពណ៌នាអំពីវគ្គសិក្សា" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 ">រយះពេលសិក្សា <span class="required"></span></label>
                <div class="row">
                  <div class="col">
                      <input type="date" name="courseStartDate" value="{{ $item['courseStartDate'] }}" class="form-control" placeholder="ចាប់ពីថ្ងៃ" required>
                    </div>
                    <div class="col">
                      <input type="date" name="courseEndDate" value="{{ $item['courseEndDate'] }}" class="form-control" placeholder="ដល់" required>
                    </div>
                </div>
            </div>
              <div class="form-group">
                    <label class="form-label">ជ្រើសរើសរូបភាពវគ្គសិក្សាដើម្បីបញ្ចូល </label>
                    <input type="file" name="image" class="form-control file-upload-info" id="image-upload-input2" accept="image/*">
                    <div  id="uploaded-image-container2" class="m-3"></div>
                   <img id="previous-img2" src="https://nasla.k5moi.com/v1/api/files/{{ $item['thumbnailImageId'] }}?isPdf=false" alt="" style="display: block; width:150px; height:150px; raduis:0px">
                  </div>
              <div  id="uploaded-image-container2" class="m-3"></div>
              <div class="alert alert-danger Siemreap" style="display: none" role="alert">
                បញ្ចូលបានតែរូបភាពប៉ុណ្ណោះ
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
          </div>
      </form>
      </div>  
  </div>
</div>
<script src="{{ asset('js/imgjs.js') }}"></script>