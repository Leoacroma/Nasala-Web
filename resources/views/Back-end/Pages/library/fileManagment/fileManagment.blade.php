<div class="card-body">
  <div class="row">
    <div class="col-10">
      <h4 class="card-title">File Management</h4>
    </div>
    <div class="col-2" >
      <a  data-toggle="modal" data-target="#Addmethod" class="btn btn-primary float-end text-white ">Upload more file</a>
    </div>
    @include('Back-end.Pages.library.fileManagment.uploadfile')
  </div>
  <div  class="row">
    <p class="card-description">
      All file elements
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
          <th scope="col">Title </th>
          <th scope="col">fileSize </th>
          <th scope="col">Date </th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $item)
        <tr>
            <th scope="row">{{ $item['id'] }}</th>
            <td class="Siemreap">{{ $item['title'] }}</td>
            <td class="Siemreap">{{ number_format($item['fileSize'] / 1024) }} Kbytes</td>
            <td class="Siemreap">{{ $item['createdAt'] }}</td>
            <td class="d-flex">
              {{-- Edit Method --}}
              <a class="btn btn-warning text-white mr-2"  data-toggle="modal"  data-target="#Editmethod{{ $item['id'] }}" type="button" >Edit</a>
              @include('Back-end.Pages.library.fileManagment.editfile')

              <form method="POST" id="delete-file-form{{ $item['id'] }}" action="{{ route('admin.lib.file.delete', $item['id']) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger text-white mr-2" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-file-form{{ $item['id'] }}')))">Delete</button>
              </form>
               {{-- View Method --}}
              {{-- <a  class="btn btn-primary text-white" data-toggle="modal"  data-target="#Previewmethod{{ $item['id'] }}">Download</a>                       
              @include('Back-end.Pages.library.fileManagment.preview') --}}
              <a href="{{ $item['url'] }}" class="btn btn-primary" download>Download file</a>                     

            </td>
        </tr>
    @endforeach
      </tbody>
    </table>
   </div>
  </div>
</div>
