<div class="modal fade" id="addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title kantumruy" id="exampleModalLabel ">បន្ថែមការចុះឈ្មោះ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="kantumruy" action="{{ route('admin.reg.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">ចំណង់ជើង<span class="required"></span></label>
                  <input type="text" name="courseName" class="form-control"  id="exampleFormControlInput1" placeholder="ចំណង់ជើង" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">ចំណង់ជើងជាភាសាខ្មែរ <span class="required"></span></label>
                    <input type="text" name="hypertext" class="form-control"  id="exampleFormControlInput1" placeholder="ចំណង់ជើងជាភាសាខ្មែរ" required>
                </div>
                <div class="form-group">
                <label for="exampleFormControlInput1 ">Link <span class="required"></span></label>
                <input type="link" name="hyperlink" class="form-control"  id="exampleFormControlInput1" placeholder="Link" required>
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