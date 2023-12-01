<div class="modal fade" id="uploadmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
       
        <div class="modal-header">
          <h5 class="modal-title Siemreap" id="exampleModalLabel">បញ្ចូលឯកសារ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.trian.file.store') }}" id="formUpload" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body Siemreap">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">ចំណង់ជើង <span class="required"></span></label>
                  <input type="text" name="title" class="form-control"  placeholder="title file" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">ប្រភេទ <span class="required"></span></label>
                  <select class="form-select Siemreap" name="subMenuId"  required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($sub['data'] as $item)
                      	<option value="{{ $item['id'] }}">{{ $item['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label class="form-label">ឯកសារ <span class="required"></span></label>
                    <input class="form-control" type="file" id="checkFile" name="file" accept=".pdf" required/>
                </div>
                <div class="alert alert-danger Siemreap" style="display: none" role="alert">
                    សូម upload PDF file
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary Siemreap" data-dismiss="modal">ត្រលប់ក្រោយ</button>
            <button type="submit" id="submitUpload" class="btn btn-primary Siemreap">រក្សាទុក</button> 
          </div>
        </form>
        <div class="progress"  id="loading" style="display: none;">
          <div class="progress-bar"   role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
        </div> 
        </div>  
    </div>
  </div>