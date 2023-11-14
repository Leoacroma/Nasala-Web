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
                    <h4 class="card-title kantumruy">គណនីប្រើប្រាស</h4>
                  </div>
                  <div class="col-2">
                    <a  data-toggle="modal"  data-target="#addmethod" class="btn btn-primary float-end kantumruy" style="font-weight: 400">បន្ថែមគណនី</a>
                    @include('Back-end.user-managment.Crud.adduser')
                </div>
                </div>
                <p class="card-description kantumruy">
                 តារាងគណនី
                </p>
                <div class="divider-line"> </div>
                <table class="table kantumruy "  id="newsTable">
                  <thead class="text-center">
                    <tr>
                      <th scope="col-1">#</th>
                      <th scope="col-1">គណនីប្រើប្រាស</th>
                      <th scope="col">គោត្តនាម/នាម</th>
                      <th scope="col">កាលបរិច្ឆេទ</th>
                      <th scope="col">សកម្មភាព</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach ($result as $item)
                    <tr >
                        <td class="Siemreap text-center">{{ $item['id'] }}</td>
                        <th class="text-center" scope="row" style="font-size: 25px"><i class="fa-solid fa-id-card-clip"></i></th>
                        <td class="Siemreap text-center">{{ $item['firstNameKh'] }} {{ $item['lastNameKh'] }}</td>
                        <td class="Siemreap text-center">{{ $item['createdAt'] }}</td>
                        <td class="d-flex">                    
                          <a  data-toggle="modal" href=""  data-target="#editmethod{{ $item['id'] }}" ><i class="fa-solid fa-pen-to-square"></i></a>
                          @include('Back-end.user-managment.Crud.edituser')
                          <form method="POST" id="delete-form{{ $item['id'] }}" action="{{ route('admin.user.destroy', $item['id']) }}">
                            @csrf
                            @method('DELETE')
                            <a href=""  class=" ml-2" style="color: red"><i class="fa-solid fa-trash" onclick="confirmDelete(confirmDelete(event, document.getElementById('delete-form{{ $item['id'] }}')))"></i></a>
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