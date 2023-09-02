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
                    <h4 class="card-title">Category Management</h4>
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
                          <form action="{{ route('admin.editcate', $item['id']) }}">
                            <button  type="submit" class="btn btn-warning text-white mr-2"  >Edit</button>
                          </form>
                          <form method="POST" id="delete-form" action="{{ route('admin.destroycate', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form')))">Delete</button>
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
          <div class="col-6 grid-margin stretch-card">
            <div  class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-11">
                    <h4 class="card-title">Edit Category</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description">
                    Edit elements
                  </p>
                  <div class="col-12">
                    <div class="divider-line"> </div>
                  </div>
                </div>
                <div class="row">
                 <div class="col-12">
                  <form method="POST" action="{{ route('admin.updatecate', $item['id']) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name  <span class="required"></span></label>
                      <input type="text" value="{{ $datae['data']['nameKh'] }}" name="nameKh" class="form-control" id="exampleFormControlInput1" placeholder="title categories in khmer" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleFormControlInput1">Name English <span class="required"></span></label>
                      <input type="text" value="{{ $datae['data']['name'] }}" name="name" class="form-control" id="exampleFormControlInput1" placeholder="title categories in english">
                    </div>
                    
                    <button type="submit" class="btn btn-primary text-white mr-2">Save</button>
                    <a type="submit" class="btn btn-secondary" href="{{ route('admin.postcate') }}">Cancel</a>
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
 </script>
@endsection
   
   
   
   
   
   
   