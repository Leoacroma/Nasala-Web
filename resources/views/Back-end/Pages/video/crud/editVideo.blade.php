<div class="modal fade" id="editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title kantumruy" id="exampleModalLabel ">កែប្រែ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="kantumruy" action="{{ route('admin.ab.update',  $item['id'] ) }}" method="POST" >
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                <label for="exampleFormControlInput1 ">videoLink <span class="required"></span></label>
                <input type="link" name="videoLink" class="form-control" value="{{ $item['videoLink'] }}" id="exampleFormControlInput1" placeholder="Hyperlink" required >
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
