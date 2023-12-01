<div class="modal fade" id="Editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title Siemreap" id="exampleModalLabel">កែប្រែ</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('admin.trian.file.update', $item['id']) }}" id="formEdit" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PATCH')
          <div class="modal-body Siemreap">
              <div class="form-group">
                <label for="exampleFormControlInput1 ">ចំណង់ជើង <span class="required"></span></label>
                <input type="text" name="title" class="form-control" value="{{ $item['title'] }}"  id="exampleFormControlInput1" placeholder="title file" required>
              </div>
              <div class="form-group">
                <label for="exampleFormControlInput1">ប្រភេទ <span class="required"></span></label>
                <select class="form-select Siemreap" name="subMenu" id="" required>
                  <option value="" selected>-- សូមជ្រើសរើស --</option>
                  @foreach ($sub['data'] as $dd)
                      <option value="{{ $dd['id'] }}" {{ $dd['id'] == $item['subMenu']['id'] ? 'selected' : '' }}>{{ $dd['nameKh']}}</option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                  <label class="form-label">ឯកសារ <span class="required"></span></label>
                  <input class="form-control" id="checkFileEdit" accept=".pdf" type="file" name="file"/>
                  <input class="form-control Siemreap" type="text" value="{{ $item['name'] }}" readonly>
              </div>
              <div class="alert alert-danger Siemreap" id="alertEdit" style="display: none" role="alert">
                សូម upload PDF file
            </div>
          </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ត្រលប់ក្រោយ</button>
          <button type="submit" id="submitEdit" class="btn btn-primary">រក្សាទុក </button>
          </div>
      </form>
      <div class="progress"  id="loadingE" style="display: none;">
        <div class="progress-bar"   role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div> 
      </div> 
       
  </div>
</div>
  