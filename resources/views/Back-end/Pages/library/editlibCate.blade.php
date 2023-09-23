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
                    <h4 class="card-title kantumruy">ប្រភេទបណ្ណាល័យ</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description kantumruy">
                    តារាងប្រភេទបណ្ណាល័យ
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
                    <h4 class="card-title kantumruy">កែប្រែប្រភេទបណ្ណាល័យ</h4>
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
                  <form method="POST" class="kantumruy" action="{{ route('admin.lib.cate.update', $datae['data']['id']) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">ឈ្មោះ <span class="required"></span></label>
                      <input type="text" value="{{ $datae['data']['nameKh'] }}" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="title categories in khmer" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">ឈ្មោះជាភាសាអង់គ្លេស <span class="required"></span></label>
                      <input type="text" value="{{ $datae['data']['name'] }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="title categories in english" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary text-white mr-2" style="font-weight: 400">រក្សាទុក</button>
                    <a type="submit" class="btn btn-secondary" href="{{ route('admin.library') }}" style="font-weight: 400">ត្រលប់ក្រោយ</a>
                  </form>
                 </div>
                </div>
              </div>
          
            </div>
          </div>
          <div id="output" class="col-12 grid-margin stretch-card">
            <div id="addcate" class="card">
              @include('Back-end.Pages.library.fileManagment.fileManagment')          
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

document.getElementById('checkFile').addEventListener('change', function() {
  var fileInput = this;
  var file = fileInput.files[0];
  var alert = document.querySelector('.alert');

  if (file) {
    var fileExtension = file.name.split('.').pop().toLowerCase();

    if (fileExtension !== 'pdf') {
      fileInput.value = ''; // Clear the file input field
      alert.style.display = 'block';
      setTimeout(function() {
        alert.style.display = 'none';
      }, 2000);
     
    }
  }
});
document.getElementById('checkFileEdit').addEventListener('change', function() {
  var fileInput = this;
  var file = fileInput.files[0];
  var alert = document.getElementById('alertEdit');

  if (file) {
    var fileExtension = file.name.split('.').pop().toLowerCase();

    if (fileExtension !== 'pdf') {
      fileInput.value = ''; // Clear the file input field
      alert.style.display = 'block';
      setTimeout(function() {
        alert.style.display = 'none';
      }, 2000);
     
    }
  }
});
$('#submitUpload').click(function(event) {
    event.preventDefault();

    var uploadForm = $('#formUpload');
    var loading = $('#loading');
    var progressBar = $('.progress-bar');


    loading.show();
    progressBar.width('0%');

    var progress = 0;
    var interval = setInterval(function() {
      progress += 10;
      progressBar.width(progress + '%');

      if (progress >= 100) {
        clearInterval(interval);
        uploadForm.submit();
      }
    }, 500);
  });
  $('#submitEdit').click(function(event) {
    event.preventDefault();

    var uploadForm = $('#formEdit');
    var loading = $('#loadingE');
    var progressBar = $('.progress-bar');


    loading.show();
    progressBar.width('0%');

    var progress = 0;
    var interval = setInterval(function() {
      progress += 10;
      progressBar.width(progress + '%');

      if (progress >= 100) {
        clearInterval(interval);
        uploadForm.submit();
      }
    }, 500);
  });

{{-- @yield('script-file') --}}
 </script>
@endsection
   
   
   
   
   
   
   