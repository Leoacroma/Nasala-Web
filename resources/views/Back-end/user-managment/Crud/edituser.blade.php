<div class="modal fade" id="editmethod{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title kantumruy" id="exampleModalLabel">កែប្រែគណនី</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('admin.user.update', $item['id']) }}" method="POST" >
            @csrf
            @method('PATCH')
            <div class="modal-body">
              <div class="form-group">
                <label for="exampleFormControlInput1 ">ឈ្មោះ </label>
                <div class="row">
                  <div class="col">
                      <input type="text" name="firstNameKh" value="{{ $item['firstNameKh'] }}" class="form-control" placeholder="គោត្តនាម">
                    </div>
                    <div class="col">
                      <input type="text" name="lastNameKh" value="{{ $item['lastNameKh'] }}" class="form-control" placeholder="នាម">
                    </div>
                </div>
            </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1 ">ឈ្មោះជាភាសាអង់គ្លេស </label>
                  <div class="row">
                    <div class="col">
                        <input type="text" name="firstName" value="{{ $item['firstName'] }}" class="form-control" placeholder="គោត្តនាម">
                      </div>
                      <div class="col">
                        <input type="text" name="lastName" value="{{ $item['lastName'] }}" class="form-control" placeholder="នាម">
                      </div>
                  </div>
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">អ៊ីម៉ែល </label>
                    <input type="email" name="userName" value="{{ $item['userName'] }}" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
                </div>
                <div class="form-group">
                  <label for="exampleFormControlInput1">តួរនាទី </label>
                  <select class="form-select Siemreap" name="role" id="" required>
                    <option value="" selected>-- សូមជ្រើសរើស --</option>
                    @foreach ($role['data'] as $dd)
                      	<option value="{{ $dd['id'] }}" {{ $dd['id'] == $item['roles'][0]['id'] ? 'selected' : '' }}>{{ $dd['nameKh']}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1 ">លេខសម្ងាត់ </label>
                    <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="លេខសម្ងាត់" >
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