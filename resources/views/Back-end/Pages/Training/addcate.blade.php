<div class="card-body">
    <div class="row">
      <div class="col-11">
        <h4 class="card-title">Add Genre</h4>
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
      <form method="POST" action="{{ route('admin.trian.cate.store') }}">
        @csrf
        <div class="form-group">
          <label for="exampleFormControlInput1">Name English</label>
          <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="title in english" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Name Khmer</label>
          <input type="text" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="title in khmer" required>
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">Sub Menu</label>
          <select class="form-select Siemreap" name="subMenuId" id="exampleFormControlSelect1" required>
            <option value="" selected>-- សូមជ្រើសរើស --</option>

            @foreach($data1['data'] as $submenu)
              <option value="{{ $submenu['id'] }}">{{ $submenu['nameKh'] }}</option>
            @endforeach
          </select>
        </div>
        <button type="submit" class="btn btn-primary text-white">Add</button>
      </form>
     </div>
    </div>
  </div>
