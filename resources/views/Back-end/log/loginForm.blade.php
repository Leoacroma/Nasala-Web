@extends('Back-end.log.layout')
@section('layout')
<div class="col-md-6 col-12">
    <img src="{{ asset('images/Microsites-amico.png') }}" alt="" class="img-fluid">
</div>
<div class="col-6 second-layer-box1">
    <div class="col-md-12 dd-layer">
        <div class="row ss-layer">
            <div class="col-md-5">
                <img src="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}" alt="" class="img-fluid">

            </div>
        </div>
        <div class="row">
            <h3 class="moul color-blue-355fb6">សាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h3>
        </div>
        <div class="row mt-2">
            <form action="{{ route('admin.login.post') }}" method="POST">
                @csrf
                @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

                 <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="email" name="username" id="form1Example1" class="form-control" />
                    <label class="form-label" for="form1Example1">Email address</label>
                </div>
                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="password" id="form1Example2" class="form-control" />
                    <label class="form-label" for="form1Example2">Password</label>
                </div>
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </form>
        </div>
        <div class="row mt-2">
            <small >Copyrigh@Nasla</small> 
        </div>
    </div>
</div>
@endsection