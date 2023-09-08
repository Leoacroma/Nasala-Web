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
                  <div class="col-10">
                    <h4 class="card-title">User Management</h4>
                  </div>
                  <div class="col-2">
                    <a  data-toggle="modal"  data-target="#addmethod" class="btn btn-primary float-end">Add User</a>
                    @include('Back-end.user-managment.Crud.adduser')
                </div>
                </div>
                <p class="card-description">
                  All user
                </p>
                <div class="divider-line"> </div>
                <table class="table ">
                  <thead >
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">first Name</th>
                      <th scope="col">last Name</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="Siemreap">{{ $item['firstNameKh'] }}</td>
                        <td class="Siemreap">{{ $item['lastNameKh'] }}</td>
                        <td class="Siemreap">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">                    
                          <a  data-toggle="modal"  data-target="#editmethod{{ $item['id'] }}" class="btn btn-warning text-white mr-2">Edit</a>
                          @include('Back-end.user-managment.Crud.edituser')
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.user.destroy', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white mr-2" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))">Delete</button>
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