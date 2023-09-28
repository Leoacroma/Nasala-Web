<div class="modal fade" id="addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title kantumruy" id="exampleModalLabel ">បន្ថែមការចុះឈ្មោះ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="alert alert-warning" role="alert">
        <h4 class="alert-heading kantumruy"><i class="fa-regular fa-lightbulb fa-bounce"></i> ចំណាំ!</h4>
        <p class="kantumruy" style="font-weight: 100">សូមភ្ចាប់ រូបភាពដែលមានលក្ខណៈ ផ្តេក់ ដើម្បីកម្រិតច្បាស់នៃព័ត៌មាន <i class="fa-solid fa-images"></i></p>
      </div>
      <form class="kantumruy" action="{{ route('admin.reg.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1 ">ចំណងជើងវគ្គសិក្សា<span class="required"></span></label>
                <input type="text" name="courseName" class="form-control"  id="exampleFormControlInput1" placeholder="ចំណងជើងវគ្គសិក្សា" >
              </div>
              <div class="form-group">
                  <label for="exampleFormControlInput1 ">Hypertext <span class="required"></span></label>
                  <input type="text" name="hypertext" class="form-control"  id="exampleFormControlInput1" placeholder="Hypertext" >
              </div>
              <div class="form-group">
              <label for="exampleFormControlInput1 ">Hyperlink <span class="required"></span></label>
              <input type="link" name="hyperlink" class="form-control"  id="exampleFormControlInput1" placeholder="Hyperlink" >
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1 ">ការពិពណ៌នាអំពីវគ្គសិក្សា <span class="required"></span></label>
                <textarea class="form-control"  name="description" id="textAreaExample" rows="4"  placeholder="ការពិពណ៌នាអំពីវគ្គសិក្សា"></textarea>
              </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">រយះពេលសិក្សា <span class="required"></span></label>
                  <div class="row">
                    <div class="col">
                        <input type="date" name="courseStartDate" class="form-control" placeholder="ចាប់ពីថ្ងៃ" required>
                      </div>
                      <div class="col">
                        <input type="date" name="courseEndDate" class="form-control" placeholder="ដល់" required>
                      </div>
                  </div>
              </div>
              
              <div class="form-group">
                  <label for="exampleInputPassword4">ជ្រើសរើសរូបភាពវគ្គសិក្សាដើម្បីបញ្ចូល <span class="required"></span></label>
                  <input type="file" name="image" class="form-control file-upload-info" id="image-upload-input" accept="image/*">
                  <div  id="uploaded-image-container" class="m-3"></div>
                </div>
              <div class="alert alert-danger Siemreap" style="display: none" role="alert">
                បញ្ចូលបានតែរូបភាពប៉ុណ្ណោះ
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary kantumruy" data-dismiss="modal" style="font-weight: 400">ត្រលប់ក្រោយ</button>
          <button type="submit" class="btn btn-primary kantumruy" style="font-weight: 400">រក្សាទុក</button>
          </div>
      </form>
      </div>  
  </div>
</div>
<script src="{{ asset('js/addImage.js') }}"></script>