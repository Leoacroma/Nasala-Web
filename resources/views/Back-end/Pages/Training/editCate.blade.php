@extends('Back-end.Layout.index')
@section('template')
      <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-11">
                    <h4 class="card-title">Training Genre Management</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description">
                    All Training Genre elements
                  </p>
                  <div class="col-12">
                    <div class="divider-line"> </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                  <table class="table ">
                    <thead >
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name English</th>
                        <th scope="col">Name Khmer</th>
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data['data'] as $item)
                      <tr>
                          <th scope="row">{{ $item['id'] }}</th>
                          <td>{{ $item['name'] }}</td>
                          <td class="Siemreap">{{ $item['nameKh'] }}</td>
                          <td class="Siemreap">{{ $item['subMenu'] ? $item['subMenu']['nameKh'] : null }}</td>
                          <td class="d-flex">
                            <form action="{{ route('admin.trian.cate.edit', $item['id']) }}">
                              <button  type="submit" class="btn btn-warning text-white mr-2" >Edit</button>
                            </form>
                            <form method="POST" action="{{ route('admin.destroycate', $item['id']) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger text-white">Delete</button>
                            </form>                        
                          </td>
                      </tr>
                  @endforeach
                    </tbody>
                  </table>
                 </div>
                </div>
              </div>
            </div>
          </div>
          <div id="output" class="col-6 grid-margin stretch-card">
            <div id="addcate" class="card">
                <div class="card-body">
                    <div class="row">
                      <div class="col-11">
                        <h4 class="card-title">Edit Genre</h4>
                      </div>
                    </div>
                    <div  class="row">
                      <p class="card-description">
                        Edit elements
                      </p>
                      <div class="col-12">
                        <div class="divider-line"> </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-12">
                      <form method="POST" action="{{ route('admin.trian.cate.update', $item['id']) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Name English</label>
                          <input type="text" name="name" value="{{ $datae['data']['name'] }}" class="form-control" id="exampleFormControlInput1" placeholder="title in english" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Name Khmer</label>
                          <input type="text" name="nameKh" value="{{ $datae['data']['nameKh'] }}" class="form-control" id="exampleFormControlInput1" placeholder="title in khmer" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub Menu</label>
                          <select class="form-select Siemreap" name="subMenu" id="exampleFormControlSelect1" required>
                              <option value="" selected>-- សូមជ្រើសរើស --</option>
                              @foreach($data1['data'] as $submenu)
                                <option value="{{ $submenu['id'] }}" {{ $submenu['id'] == $getSubMenu ? 'selected' : ''  }}>{{ $submenu['nameKh'] }}</option>
                              @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary text-white mr-2">save</button>
                        <a href="{{ route('admin.train.cate') }}" class="btn btn-secondary">cancel</a>
                      </form>
                     </div>
                    </div>
                  </div>
                
            </div>
          </div>
        </div>
      </div>
      
    </div>
    <!-- main-panel ends -->
  <!-- page-body-wrapper ends -->
</div>
@endsection
