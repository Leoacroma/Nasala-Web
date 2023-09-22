@extends('Back-end.Layout.index')
@section('template')
      <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-11">
                    <h4 class="card-title kantumruy">តារាងគ្រប់គ្រងព័ត៌មាន</h4>
                  </div>
                  <div class="col-1">
                    <a href="{{ route('admin.create') }}" class="btn btn-primary kantumruy" style="font-weight: 400">បន្ថែមព័ត៌មាន </a>
                  </div>
                </div>
                <p class="card-description">
                  All post elements
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
      $('#newsTable').DataTable({
          data: data,
          columns: [
              { data: 'id' },
              { data: 'titleKh' },
              { data: 'createdAt' },
              { 
                data: null,
                render: function(data, type, row) {
                    return '<a href="' + data.editUrl + '"><i class="fa-solid fa-pen-to-square"></i></a>' +
                        '<a href="#" class="ml-2 mr-2" style="color: red;"><i class="fa-solid fa-trash" onclick="confirmDelete(event, document.getElementById(\'delete-form' + data.id + '\'))"></i></a>' +
                        '<a href="' + data.viewUrl + '"><i class="fa-solid fa-eye"></i></a>' +
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