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
                    <h4 class="card-title">Training Genre Management</h4>
                  </div>
                </div>
                <div class="row">
                  <p class="card-description">
                    All Training Genre elements
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
                        <th scope="col">Sub Menu</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($data['data'] as $item)
                      <tr>
                          <th scope="row">{{ $item['id'] }}</th>
                          <td>{{ $item['name'] }}</td>
                          <td class="Siemreap">{{ $item['nameKh'] }}</td>
                          <td class="Siemreap">{{ $item['subMenu'] ? $item['subMenu']['nameKh'] : null }}</td>
                          <td class="d-flex">
                            <form action="{{ route('admin.trian.cate.edit', $item['id']) }}">
                              <button  type="submit" class="btn btn-warning text-white mr-2" >Edit</button>
                            </form>
                            <form method="POST" id="delete-form{{  $item['id'] }}" action="{{ route('admin.trian.cate.delete', $item['id']) }}">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-danger text-white" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{  $item['id'] }}')))">Delete</button>
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
              @include('Back-end.Pages.Training.addcate')
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
