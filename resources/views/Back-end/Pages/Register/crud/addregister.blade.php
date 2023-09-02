<div class="modal fade" id="addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Register</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.reg.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">Course Name <span class="required"></span></label>
                  <input type="text" name="courseName" class="form-control"  id="exampleFormControlInput1" placeholder="Course Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">Khmer Title <span class="required"></span></label>
                    <input type="text" name="hypertext" class="form-control"  id="exampleFormControlInput1" placeholder="Khmer Title" required>
                </div>
                <div class="form-group">
                <label for="exampleFormControlInput1 ">Link <span class="required"></span></label>
                <input type="link" name="hyperlink" class="form-control"  id="exampleFormControlInput1" placeholder="Link" required>
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