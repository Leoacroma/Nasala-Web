<div class="modal fade" id="addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.user.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">Name English <span class="required"></span></label>
                  <div class="row">
                    <div class="col">
                        <input type="text" name="firstName" class="form-control" placeholder="First name">
                      </div>
                      <div class="col">
                        <input type="text" name="lastName" class="form-control" placeholder="Last name">
                      </div>
                  </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">Name Khmer <span class="required"></span></label>
                    <div class="row">
                      <div class="col">
                          <input type="text" name="firstNameKh" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                          <input type="text" name="lastNameKh" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">Email <span class="required"></span></label>
                    <input type="email" name="userName" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">Role <span class="required"></span></label>
                  <select class="form-select Siemreap" name="role" id="" required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($role['data'] as $item)
                      	<option value="{{ $item['id'] }}">{{ $item['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">Password <span class="required"></span></label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
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