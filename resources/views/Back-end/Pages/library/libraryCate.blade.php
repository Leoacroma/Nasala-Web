@extends('Back-end.Layout.index')
@section('template')
<?php
    $_COOKIE = Cookie::get('user_Role');
?>
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
          <div id="output" class="col-6 grid-margin stretch-card">
            <div id="addcate" class="card">
              @if( $_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                 @include('Back-end.Pages.library.addlibCate')
              @endif
              @if( $_COOKIE == 'User' )
                <div class="row">
                  <div class="col-3"></div>
                  <div class="col-5">
                    <img src="{{ asset('images/403 Error Forbidden-bro.svg') }}" alt="" width="100%">
                  </div>
                  <div class="col-3"></div>
                </div>
                <div class="row">
                  <div class="col-12 kantumruy text-center">
                      {{-- <h2 style="line-height: 20px">សូមអធ្យាស្រ័យ <i class="fa-solid fa-triangle-exclamation"></i></h2> --}}
                      <span style="font-size: 25px; line-height: 35px">អ្នកមិនមានសិទ្ធិក្នុងការប្រើប្រាស់នោះទេ</span><br>
                      <small style="opacity: 50%">
                        អ្នកមិនមានសិទ្ធិក្នុងការប្រើប្រាស់នៅមុខងារនេះបានទេ ឬក៍ពិនិត្យមើលទិន្នន័យមួយចំនួនបាននោះទេ
                      </small>
                  </div>
                </div>
              @endif
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
    var userRole = "{!! Cookie::get('user_Role') !!}";   
  
      $('#newsTable').DataTable({
          data: data,
          columns: [
              { data: 'id' },
              { data: 'name' },
              { data: 'nameKh' },
              { 
                data: null,
                render: function(data, type, row) { 
                  if(userRole == 'Super-admin' || userRole == 'Admin' || userRole == 'Moderator'){
                          return '<a href="' + data.editUrl + '"><i class="fa-solid fa-pen-to-square"></i></a>' +
                        '<a href="#" class="ml-2 mr-2" style="color: red;"><i class="fa-solid fa-trash" onclick="confirmDelete(event, document.getElementById(\'delete-form' + data.id + '\'))"></i></a>' +
                        '<form method="POST" id="delete-form' + data.id + '" action="' + data.deleteUrl + '">' +
                        '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
                        '<input type="hidden" name="_method" value="DELETE">' +
                        '</form>';
                  }
                  else{
                    return '<a href="' + data.viewUrl + '"><i class="fa-solid fa-eye"></i></a>';
                  }
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
