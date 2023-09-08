<div class="modal fade" id="Editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.trian.file.update', $item['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">Title <span class="required"></span></label>
                  <input type="text" name="title" class="form-control" value="{{ $item['title'] }}"  id="exampleFormControlInput1" placeholder="title file" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Genre <span class="required"></span></label>
                  <select class="form-select Siemreap" name="subMenu" id="" required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($sub['data'] as $dd)
                      	<option value="{{ $dd['id'] }}" {{ $dd['id'] == $item['subMenu'] ? 'selected' : '' }}>{{ $dd['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Choose files to upload <span class="required"></span></label>
                    <input class="form-control" type="file" name="file"/>
                    <input class="form-control Siemreap" type="text" value="{{ $item['name'] }}" readonly>
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