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
                    <h4 class="card-title kantumruy">ប្រភេទការងារបណ្តុះបណ្តាល</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description kantumruy">
                    តារាងប្រភេទការងារបណ្តុះបណ្តាល
                  </p>
                  <div class="col-12">
                    <div class="divider-line"> </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                  <table class="table kantumruy" id="newsTable">
                    <thead >
                      <tr>
                        <th scope="col">ល.រ</th>
                        <th scope="col">ឈ្មោះជាភាសាអង់គ្លេស</th>
                        <th scope="col">ឈ្មោះជាភាសាខ្មែរ</th>
                        <th scope="col">នៅក្រោម</th>
                        <th scope="col">សកម្មភាព</th>
                      </tr>
                    </thead>
                    <tbody class="kantumruy">
                      
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
                        <h4 class="card-title kantumruy">កែប្រែប្រភេទការងារបណ្តុះបណ្តាល</h4>
                      </div>
                    </div>
                    <div  class="row">
                      <p class="card-description kantumruy">
                        កែប្រែប្រភេទ
                      </p>
                      <div class="col-12">
                        <div class="divider-line"> </div>
                      </div>
                    </div>
                    <div class="row">
                     <div class="col-12">
                      <form method="POST" class="kantumruy" action="{{ route('admin.trian.cate.update', $datae['data']['id']) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                          <label for="exampleFormControlInput1">ឈ្មោះ</label>
                          <input type="text" name="nameKh" value="{{ $datae['data']['nameKh'] }}" class="form-control" id="exampleFormControlInput1" placeholder="title in khmer" required>
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">ឈ្មោះជាភាសាអង់គ្លេស</label>
                          <input type="text" name="name" value="{{ $datae['data']['name'] }}" class="form-control" id="exampleFormControlInput1" placeholder="title in english" required>
                        </div>
                        
                        <div class="form-group">
                          <label for="exampleFormControlSelect1">នៅក្រោម</label>
                          <select class="form-select kantumruy" name="subMenu" id="exampleFormControlSelect1" required>
                              <option value="" selected>-- សូមជ្រើសរើស --</option>
                              @foreach($data1['data'] as $submenu)
                                <option value="{{ $submenu['id'] }}" {{ $submenu['id'] == $getSubMenu ? 'selected' : ''  }}>{{ $submenu['nameKh'] }}</option>
                              @endforeach
                          </select>
                        </div>
                        <button type="submit" class="btn btn-primary text-white mr-2" style="font-weight: 400">រក្សាទុក</button>
                        <a href="{{ route('admin.train.cate') }}" class="btn btn-secondary" style="font-weight: 400">ត្រលប់ក្រោយ</a>
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
<script src="{{ asset('js/alert.js') }}"></script>
<script>
  $(document).ready(function() {
      var data = {!! $dataJson !!};      
      $('#newsTable').DataTable({
          data: data,
          columns: [
              { data: 'id' },
              { data: 'name' },
              { data: 'nameKh' },
              { data: 'subMenu' },
              { 
                data: null,
                render: function(data, type, row) {
                    return '<a href="' + data.editUrl + '"><i class="fa-solid fa-pen-to-square"></i></a>' +
                        '<a href="#" class="ml-2 mr-2" style="color: red;"><i class="fa-solid fa-trash" onclick="confirmDelete(event, document.getElementById(\'delete-form' + data.id + '\'))"></i></a>' +
                        '<form method="POST" id="delete-form' + data.id + '" action="' + data.deleteUrl + '">' +
                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                        '<input type="hidden" name="_method" value="DELETE">' +
                        '</form>';
              }
            }

          ]
      });
  });
</script>
@endsection
