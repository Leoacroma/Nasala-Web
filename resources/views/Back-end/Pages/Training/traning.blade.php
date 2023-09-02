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
                    <h4 class="card-title">Training Management</h4>
                  </div>
                  <div class="col-2">
                    <a href="{{ route('admin.train.create') }}" class="btn btn-primary float-end">Add Training</a>
                  </div>
                </div>
                <p class="card-description">
                  All post elements
                </p>
                <div class="divider-line"> </div>
                <table class="table ">
                  <thead >
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="Siemreap">{{ $item['titleKh'] }}</td>
                        <td class="Siemreap">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">
                          <a class="btn btn-warning text-white mr-2" type="button" href="{{ route('admin.train.edit', $item['id']) }}" >Edit</a>
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.train.delete', $item['id']) }}">
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
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-10">
                    <h4 class="card-title">File Training Management</h4>
                  </div>
                  <div class="col-2">
                    <a  data-toggle="modal"  data-target="#uploadmethod" class="btn btn-primary float-end">Upload File</a>
                    @include('Back-end.Pages.Training.files.upload-file')
                  </div>
                </div>
                <p class="card-description">
                  All post elements
                </p>
                <div class="divider-line"> </div>
                <table class="table ">
                  <thead >
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Title</th>
                      <th scope="col">File Size</th>
                      <th scope="col">Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($fileData as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="Siemreap">{{ $item['title'] }}</td>
                        <td class="Siemreap">{{ number_format($item['fileSize'] / 1024) }} Kbytes</td>
                        <td class="Siemreap">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">
                          <a class="btn btn-warning text-white mr-2" data-toggle="modal"  data-target="#Editmethod{{ $item['id'] }}" type="button"  >Edit</a>
                          @include('Back-end.Pages.Training.files.Editfile')
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.trian.file.destroy', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white mr-2" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))">Delete</button>
                          </form>      
                          <a href="{{ $item['url'] }}" class="btn btn-primary" download>Download File</a>                     
                          {{-- <a href="" data-toggle="modal"  data-target="#Viewmethod{{ $item['id'] }}"  class="btn btn-primary" >View PDF</a>     
                          @include('Back-end.Pages.Training.files.viewfile') --}}
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