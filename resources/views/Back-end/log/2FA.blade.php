@extends('Back-end.log.layout')
@section('layout')
<div class="col-md-6 col-12">
    <img src="{{ asset('images/Security-amico.svg') }}" alt="" class="img-fluid">
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
        <div class="row mt-2 text-center Kantumruy">
            <h4>សូមស្គេន QR code ដើម្បីបញ្ចាក់ពីអត្តសញ្ញាណ</h4>
            <p>ដើម្បីសុវត្ថភាពនៃគណនីរបស់អ្នកប្រើប្រាស់ សូមធ្វើការស្គេន </p>

        </div>
        <div class="row ss-layer mt-3 mb-3">
            <div class="col-md-4">
                <?php
                    $qrCode = Cookie::get('qrCode');    
                ?>
                <img src="{{  $qrCode }}" alt="" width="100%">
            </div>
        </div>
        <div class="row">
            <div class="col-12 Kantumruy" >
                <a href="{{ route('admin.2FA.otp') }}" class="btn btn-primary" style="width: 100%; font-size: 15px">បន្ទាប់</a>
            </div>
        </div>
        <div class="row mt-2 text-center text-muted">
            <small >Copyrigh@Nasla</small> 
        </div>
    </div>
</div>
@endsection