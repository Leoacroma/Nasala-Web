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
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-10">
                    <h4 class="card-title kantumruy">តារាងគ្រប់គ្រងព័ត៌មាន</h4>
                  </div>
                  @if($_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
                  <div class="col-2">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary kantumruy float-end" style="font-weight: 400;" >បន្ថែមព័ត៌មាន </a>
                  </div>
                  @endif
                  @if($_COOKIE == 'User' )
                  <div class="col-2 ">
                    <button type="button"class="btn btn-ligh kantumruy float-end" style="font-weight: 400;" disabled>អ្នកប្រើប្រាសគ្មានសិទ្ធិ</button>
                  </div>
                  @endif
                </div>
                <p class="card-description kantumruy">
                 ព័ត៌មាននៅក្នុងតារាង
                </p>
                <div class="divider-line"> </div>
                <table class="table" id="newsTable">
                  <thead >
                    <tr class="kantumruy">
                      <th scope="col">ល.រ</th>
                      <th scope="col">ឈ្មោះ </th>
                      <th scope="col">ថ្ងៃ </th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody class="kantumruy p-5">
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
      var userRole = "{!! Cookie::get('user_Role') !!}";   
   
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
                        '<a href="' + data.viewUrl + '"><i class="fa-solid fa-eye"></i></a>' +
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

          ],
          order: [[0, 'desc']] 
      });
  });
</script>
@endsection