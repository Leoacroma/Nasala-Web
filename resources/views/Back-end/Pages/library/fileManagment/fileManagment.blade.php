<div class="card-body">
  <div class="row">
    <div class="col-10">
      <h4 class="card-title kantumruy">ឯកសារបណ្ណាល័យ</h4>
    </div>
    @if($_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')
      <div class="col-2" >
        <a  data-toggle="modal" data-target="#Addmethod" class="btn btn-primary float-end text-white kantumruy" style="font-weight: 400">បន្ថែមឯកសារ</a>
      </div>
      @include('Back-end.Pages.library.fileManagment.uploadfile')      
    @endif
    @if($_COOKIE == 'User' )
    <div class="col-2 ">
      <button type="button"class="btn btn-ligh kantumruy float-end" style="font-weight: 400;" disabled>អ្នកប្រើប្រាសគ្មានសិទ្ធិ</button>
    </div>
    @endif
    
  </div>
  <div  class="row">
    <p class="card-description kantumruy">
      ឯកសារក្នុងតារាង
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
          <th scope="col">ចំណង់ជើង </th>
          <th scope="col">ទំហំ </th>
          <th scope="col">ថ្ងៃ </th>
          <th scope="col">សកម្មភាព</th>
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
              @if($_COOKIE == 'Super-admin' || $_COOKIE == 'Admin' || $_COOKIE == 'Moderator')

              {{-- Edit Method --}}
              <a href=""  data-toggle="modal"  data-target="#Editmethod{{ $item['id'] }}" ><i class="fa-solid fa-pen-to-square"></i></a>
              @include('Back-end.Pages.library.fileManagment.editfile')

              <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.lib.file.delete', $item['id']) }}">
                @csrf
                @method('DELETE')
                <a href="" class="ml-2 mr-2" style="color: red"><i class="fa-solid fa-trash" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
              </form>
               {{-- View Method --}}
              {{-- <a  class="btn btn-primary text-white" data-toggle="modal"  data-target="#Previewmethod{{ $item['id'] }}">Download</a>                       
              @include('Back-end.Pages.library.fileManagment.preview') --}}
              <a href="https://api-nasla.k5moi.com/v1/api/library/{{ $item['id'] }}" style="color: green"  download><i class="fa-solid fa-download"></i></a>                     
              @endif
              @if($_COOKIE == 'User')
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

