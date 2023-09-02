<div class="modal fade" id="Editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit File</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.pub.update', $item['id']) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">Title <span class="required"></span></label>
                  <input type="text" name="title" class="form-control" value="{{ $item['title'] }}" id="exampleFormControlInput1" placeholder="title file" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword4">Thumbnail <span class="required"></span></label>
                    <input type="file" name="image"  class="form-control file-upload-info" id="image-upload-input" accept="image/*">
                    <input type="hidden" name="thumbnailImageId" value="{{ $item['thumbnailImageId'] }}">
                    <div  id="uploaded-image-container" class="m-3"></div>
                  </div>
                <div class="form-group">
                    <label class="form-label">Choose files to upload <span class="required"></span></label>
                    <input class="form-control" type="file" name="file"/>
                    <input class="form-control" type="text" value="{{ $item['name'] }}" readonly>
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
  