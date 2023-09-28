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
                    <h4 class="card-title kantumruy">វីឌីអូ</h4>
                  </div>
                  <div class="col-2">
                    <a data-toggle="modal"  data-target="#addmethod"  class="btn btn-primary float-end kantumruy" style="font-weight: 400">បន្ថែមការចុះឈ្មោះ</a>
                    @include('Back-end.Pages.video.crud.addvideo')
                </div>
                </div>
                <p class="card-description kantumruy">
                  តារាងការបង្លោះវីឌីអូ
                </p>
                <div class="divider-line"> </div>
                <table class="table kantumruy" id="newsTable">
                  <thead >
                    <tr>
                      <th scope="col">ល.រ</th>
                      <th scope="col">វីឌីអូ</th>
                      <th scope="col">ថ្ងៃ</th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody class="kantumruy">
                    @foreach ($result as $item)
                    <tr>
                        <th scope="row">{{ $item['id'] }}</th>
                        <td class="kantumruy">វីឌីអូ <i class="fa-solid fa-video fa-bounce"></i></td>
                        <td class="kantumruy">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">
                          <a href="" data-toggle="modal"  data-target="#editmethod{{ $item['id'] }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                          @include('Back-end.Pages.video.crud.editVideo')
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.ab.delete', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <a  class="ml-2 mr-2" href="" style="color: red"><i class="fa-solid fa-trash" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
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


@endsection