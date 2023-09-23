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
                    <h4 class="card-title kantumruy">អាហាររូបករណ៍</h4>
                  </div>
                  <div class="col-2">
                    <a  class="btn btn-primary float-end kantumruy" data-toggle="modal"  data-target="#uploadmethod" style="font-weight: 400">បន្ថែមអាហាររូបករណ៍</a>
                    @include('Back-end.Pages.Public.Crud.Uploadfile')
                </div>
                </div>
                <p class="card-description kantumruy">
                 តារាងអាហាររូបករណ៍
                </p>
                <div class="divider-line"> </div>
                <table class="table kantumruy" id="newsTable">
                  <thead >
                    <tr>
                      <th scope="col">ល.រ</th>
                      <th scope="col">ចំណង់ជើង</th>
                      <th scope="col">ថ្ងៃ</th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($result as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="Siemreap">{{ $item['title'] }}</td>
                        <td class="Siemreap">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">
                          <a  data-toggle="modal" href="" data-target="#Editmethod{{ $item['id'] }}"><i class="fa-solid fa-pen-to-square"></i></a>
                          @include('Back-end.Pages.Public.Crud.Editfile')
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.pub.delete', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <a href="" class=" ml-2" style="color: red" ><i class="fa-solid fa-trash" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
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
<script src="{{ asset('js/alert.js') }}"></script>

<script src="{{ asset('js/addImage.js') }}"></script>
@endsection