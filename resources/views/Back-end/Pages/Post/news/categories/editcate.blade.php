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
                    <h4 class="card-title kantumruy">ប្រភេទព័ត៌មាន</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description kantumruy">
                    តារាងប្រភេទនៃព័ត៌មានទាំងអស់
                  </p>
                  <div class="col-12">
                    <div class="divider-line"> </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                  <table class="table " id="newsTable">
                    <thead >
                      <tr class="kantumruy">
                        <th scope="col">ល.រ</th>
                        <th scope="col">ឈ្មោះជាភាសាអង់គ្លេស</th>
                        <th scope="col">ឈ្មោះជាភាសាខ្មែរ</th>
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
          <div class="col-6 grid-margin stretch-card">
            <div  class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-11">
                    <h4 class="card-title kantumruy">កែប្រែ ប្រភេទព័ត៌មាន</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description kantumruy">
                    កែប្រែប្រភេទ
                  </p>
                  <div class="col-12">
                    <div class="divider-line"> </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                  <form method="POST" action="{{ route('admin.updatecate', $datae['data']['id']) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group kantumruy">
                      <label for="exampleFormControlInput1 ">ឈ្មោះ  <span class="required"></span></label>
                      <input type="text" value="{{ $datae['data']['nameKh'] }}" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="title categories in khmer" required>
                    </div>
                    <div class="form-group kantumruy">
                      <label for="exampleFormControlInput1 ">ឈ្មោះជាភាសាអង់គ្លេស </label>
                      <input type="text" value="{{ $datae['data']['name'] }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="title categories in english">
                    </div>
                    
                    <button type="submit" class="btn btn-primary text-white mr-2 kantumruy" style="font-weight: 400">រក្សាទុក</button>
                    <a type="submit" class="btn btn-secondary kantumruy" href="{{ route('admin.postcate') }}" style="font-weight: 400">ត្រលប់ក្រោយ</a>
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
   
   
   
   
   
   
   