    <div class="card-body">
      <div class="row">
        <div class="col-11">
          <h4 class="card-title">Add Category</h4>
        </div>
      </div>
      <div  class="row">
        <p class="card-description">
          Add elements
        </p>
        <div class="col-12">
          <div class="divider-line"> </div>
        </div>
      </div>
      <div class="row">
       <div class="col-12">
        <form method="POST" action="{{ route('admin.storecate') }}">
          @csrf
          <div class="form-group">
            <label for="exampleFormControlInput1">Name <span class="required"></span></label>
            <input type="text" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="title categories in khmer" required>
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Name English <span class="required"></span></label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="title categories in english">
          </div>
          <button type="submit" class="btn btn-primary text-white">Add</button>
        </form>
       </div>
      </div>
    </div>
