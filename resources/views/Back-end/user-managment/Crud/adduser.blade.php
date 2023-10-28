<div class="modal fade" id="addmethod" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title kantumruy" id="exampleModalLabel">បន្ថែមគណនី</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="kantumruy" action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">ឈ្មោះ <span class="required"></span></label>
                  <div class="row">
                    <div class="col">
                        <input type="text" name="firstNameKh" class="form-control" placeholder="គោត្តនាម" required>
                      </div>
                      <div class="col">
                        <input type="text" name="lastNameKh" class="form-control" placeholder="នាម" required>
                      </div>
                  </div>
              </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">ឈ្មោះជាភាសាអង់គ្លេស </label>
                  <div class="row">
                    <div class="col">
                        <input type="text" name="firstName" class="form-control" placeholder="គោត្តនាម">
                      </div>
                      <div class="col">
                        <input type="text" name="lastName" class="form-control" placeholder="នាម">
                      </div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">អ៊ីម៉ែល <span class="required"></span></label>
                    <input type="email" name="userName" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">តួរនាទី <span class="required"></span></label>
                  <select class="form-select kantumruy" name="role" id="" required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($role['data'] as $item)
                      	<option value="{{ $item['id'] }}">{{ $item['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">លេខសម្ងាត់ <span class="required"></span></label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="លេខសម្ងាត់" required>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="font-weight: 400">ត្រលប់ក្រោយ</button>
            <button type="submit" class="btn btn-primary" style="font-weight: 400">រក្សាទុក</button>
            </div>
        </form>
        </div>  
    </div>
  </div>