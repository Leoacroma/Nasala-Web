@extends('Back-end.log.layout')
@section('layout')
<link rel="stylesheet" href="{{ asset('css/otp.css') }}">
<div class="col-md-6 col-12">
    <img src="{{ asset('images/Enter OTP-amico.svg') }}" alt="" class="img-fluid">
</div>
<div class="col-6 second-layer-box1">
    <div class="col-md-12 ">
        <div class="row ">
            <div class="col-md-3">
                <img src="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}" alt="" class="img-fluid">
            </div>
            <div class="col-md-7 moul" style="display: flex; align-items: center; font-size: 25px; color: #355fb6">
                សាលាជាតិរដ្ឋបាលមូលដ្ឋាន
            </div>
        </div>
        <div class="row">
            <form action="{{ route('admin.2FA.store') }}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-12 col-md-6 col-lg-4" style="min-width: 500px;">
                      <div class="card bg-white mb-5 mt-3 border-0" style="box-shadow: 0 12px 15px rgba(0, 0, 0, 0.02);">
                        <div class="card-body p-5 text-center Kantumruy" >
                          <h4 style="font-weight: bold">សូមបញ្ចូលលេខកូដ 6ខ្ទង់</h4>
                          <p>លេខកូដរបស់អ្នកត្រូវបានផ្ញើទៅអ្នកតាមរយៈកម្មវិធី Google Authicator  </p>
                          
                          <div class="otp-field mb-4">
                            <input name="otp1" type="number" />
                            <input name="otp2" type="number" disabled />
                            <input name="otp3" type="number" disabled />
                            <input name="otp4" type="number" disabled />
                            <input name="otp5" type="number" disabled />
                            <input name="otp6" type="number" disabled />
                          </div>
              
                          <button class="btn btn-primary mb-3 Kantumruy" style="font-size: 15px">
                            បញ្ចាក់
                          </button>
              
                          <p class="resend text-muted mb-0">
                            <a href="{{ route('admin.login') }}" style="font-size: 15px; text-decoration: underline">ត្រលប់ក្រោយ</a> |
                            Copyrigh@Nasla
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
            </form>
        </div>
    </div>
</div>
<script src="{{ asset('js/otp.js') }}"></script>
@endsection