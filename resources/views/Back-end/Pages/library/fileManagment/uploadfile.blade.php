<div class="modal fade" id="Addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.lib.file') }}" id="formUpload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">Title <span class="required"></span></label>
                  <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="title file" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Genre <span class="required"></span></label>
                  <select class="form-select Siemreap" name="categoryId" id="" required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($data['data'] as $item)
                      	<option value="{{ $item['id'] }}">{{ $item['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Choose files to upload <span class="required"></span></label>
                    <input class="form-control" id="checkFile" accept=".pdf" type="file" name="file"/>
                </div>
                <div class="alert alert-danger Siemreap" style="display: none" role="alert">
                  សូម upload PDF file
              </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div> 
        <div class="progress"  id="loading" style="display: none;">
          <div class="progress-bar"   role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div>  
    </div>
  </div>