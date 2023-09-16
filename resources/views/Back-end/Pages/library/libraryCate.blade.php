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
                    <h4 class="card-title">Library Categories Management</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description">
                    All Categories elements
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
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data['data'] as $item)
                      <tr>
                          <th scope="row">{{ $item['id'] }}</th>
                          <td>{{ $item['name'] }}</td>
                          <td class="Siemreap">{{ $item['nameKh'] }}</td>
                          <td class="d-flex">
                            <form action="{{ route('admin.lib.cate.edit', $item['id']) }}">
                              <button  type="submit" class="btn btn-warning text-white mr-2" >Edit</button>
                            </form>
                          
                            <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.cate.lib.del', $item['id']) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger text-white " onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))">Delete</button>
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
              @include('Back-end.Pages.library.addlibCate')
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
<script>
 function confirmDelete(event, form) {
    event.preventDefault();
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this record!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        }
    });
}
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


@endsection
