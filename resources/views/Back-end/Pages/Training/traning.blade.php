@extends('Back-end.Layout.index')
@section('template')
<style>

.progress-bar {
    width: 0; /* Just for visualization purposes */
    background-color: rgb(126, 93, 237);
    animation: increaseWidth 5s forwards;
}

@keyframes increaseWidth {
    0% {
        width: 0;
    }
    100% {
        width: 100%;
    }
}
</style>
<?php
$_COOKIE = Cookie::get('user_Role');
?>
      <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-10">
                    <h4 class="card-title kantumruy">វគ្គបណ្តុះបណ្តាល</h4>
                  </div>
                  @if($_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                  <div class="col-2">
                    <a href="{{ route('admin.train.create') }}" class="btn btn-primary float-end kantumruy" style="font-weight: 400">បន្ថែមវគ្គ</a>
                  </div>
                @endif
                @if($_COOKIE == 'User' )
                <div class="col-2 ">
                  <button type="button"class="btn btn-ligh kantumruy float-end" style="font-weight: 400;" disabled>អ្នកប្រើប្រាសគ្មានសិទ្ធិ</button>
                </div>
                @endif
                  
                </div>
                <p class="card-description kantumruy">
                  តារាងវគ្គបណ្តុះបណ្តាល
                </p>
                <div class="divider-line"> </div>
                <table class="table kantumruy" id="newsTable">
                  <thead >
                    <tr>
                      <th scope="col">ល.រ</th>
                      <th scope="col">វគ្គ</th>
                      <th scope="col">ថ្ងៃ</th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody class="kantumruy">
                
                  </tbody>
                </table>
               
              </div>
            </div>
          </div>
         
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-10">
                    <h4 class="card-title kantumruy">ឯកសារបណ្តុះបណ្តាល</h4>
                  </div>
                  @if($_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                    <div class="col-2">
                      <a  data-toggle="modal"  data-target="#uploadmethod" class="btn btn-primary float-end kantumruy" style="font-weight: 400">បញ្ចូលឯកសារ</a>
                      @include('Back-end.Pages.Training.files.upload-file')
                    </div>
                  @endif
                  @if($_COOKIE == 'User' )
                  <div class="col-2 ">
                    <button type="button"class="btn btn-ligh kantumruy float-end" style="font-weight: 400;" disabled>អ្នកប្រើប្រាសគ្មានសិទ្ធិ</button>
                  </div>
                  @endif
                </div>
                <p class="card-description kantumruy">
                 តារាងឯកសារបណ្តុះបណ្តាល
                </p>
                <div class="divider-line"> </div>
                <table class="table kantumruy" id="newsTable">
                  <thead class="kantumruy">
                    <tr>
                      <th scope="col">ល.រ</th>
                      <th scope="col">ចំណង់ជើង</th>
                      <th scope="col">ទំហំ</th>
                      <th scope="col">ថ្ងៃ</th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody class="kantumruy">
                    @foreach ($fileData as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="Siemreap">{{ $item['title'] }}</td>
                        <td class="Siemreap">{{ $item['fileSize'] }} Kbyes</td>
                        <td class="Siemreap">{{ $item['createdAt'] }}</td>
                     
                        <td class="d-flex">
                          @if( $_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                            <a  href="" data-toggle="modal"  data-target="#Editmethod{{ $item['id'] }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                            @include('Back-end.Pages.Training.files.Editfile')
                            <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.trian.file.destroy', $item['id']) }}">
                              @csrf
                              @method('DELETE')
                              <a href="" class="mr-2 ml-2 " style="color: red"><i class="fa-solid fa-trash" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
                            </form>   
                            <a href="https://nasla.k5moi.com/v1/api/files/{{ $item['id'] }}" style="color: green" download><i class="fa-solid fa-download"></i></a>                    
                          @endif
                          @if( $_COOKIE == 'User' )
                          <span class="badge badge-danger kantumruy" style = "font-weight: 100;">អ្នកគ្មានការអនុញ្ញាតទេ</span>
                          @endif
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
              { data: 'titleKh' },
              { data: 'createdAt' },
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
                    return '<span class="badge badge-danger kantumruy" style = "font-weight: 100;">អ្នកគ្មានការអនុញ្ញាតទេ</span>';
                  }
                   
              }
            }

          ]
      });
  });

  // $(document).ready(function() {
  //   var data = {!! $dataJsonFile !!};    
  //     $('#fileTable').DataTable({
  //         data: data,
  //         columns: [
  //             { data: 'id' },
  //             { data: 'title' },
  //             { data: 'fileSize'},
  //             { data: 'createdAt' },
  //             { 
  //               data: null,
  //               render: function(data, type, row) {
  //                   return '<a href="' + data.editUrl + '"><i class="fa-solid fa-pen-to-square"></i></a>' +
  //                       '<a href="#" class="ml-2 mr-2" style="color: red;"><i class="fa-solid fa-trash" onclick="confirmDelete(event, document.getElementById(\'delete-form' + data.id + '\'))"></i></a>' +
  //                       '<form method="POST" id="delete-form' + data.id + '" action="' + data.deleteUrl + '">' +
  //                       '<input type="hidden" name="_token" value="{{ csrf_token() }}">' +
  //                       '<input type="hidden" name="_method" value="DELETE">' +
  //                       '</form>';
  //             }
  //           }

  //         ]
  //     });
  // });


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
</script>
@endsection