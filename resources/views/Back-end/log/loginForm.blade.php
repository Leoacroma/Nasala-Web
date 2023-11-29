@extends('Back-end.log.layout')
@section('layout')
<div class="col-md-6 col-12">
    <img src="{{ asset('images/Microsites-amico.png') }}" alt="" class="img-fluid">
</div>
<div class="col-6 second-layer-box1">
    <div class="col-md-12 ">
        <div class="row ss-layer">
            <div class="col-md-5">
                <img src="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}" alt="" class="img-fluid">

            </div>
        </div>
        <div class="row dd-layer">
            <h3 class="moul color-blue-355fb6">សាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h3>
        </div>
        <div class="row mt-2">
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf

                 <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="username" id="form1Example1" class="form-control" />
                    <label class="form-label" for="form1Example1">Email address</label>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-2">
                    <input type="password" name="password" id="myInput" class="form-control" />
                    <label class="form-label" for="form1Example2">Password</label>
                </div>
                {{-- <input type="checkbox" >Show Password --}}
                <div class="form-check mb-4 float-end   ">
                    <input class="form-check-input" type="checkbox" id="flexCheckDefault" onclick="myFunction()">
                    <label class="form-check-label Kantumruy" style="font-size: 15px" for="flexCheckDefault">
                      បង្ហាញលេខសម្ងាត់
                    </label>
                  </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block Kantumruy" style="font-size: 15px">ចូលទៅក្នុងប្រព័ន្ធ</button>
              </form>
        </div>
        <div class="row mt-2 dd-layer">
            <small >Copyrigh@Nasla</small> 
        </div>
    </div>
</div>
<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
@endsection