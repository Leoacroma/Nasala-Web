@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
<!-- Content title -->
<div class="container mt-4">
    <div class="row">
        <div class="row">
            <div class="col-lay-5 d-flex mg-l-m10">
                <h2 class="nav-font color-blue-355fb6 font-size-30"  data-locale="{{ $locale }}">{{ __('messages.Leadership composition') }}</h2>
            </div>
            <div class="col-lay-10 divider-line"></div>
        </div>
    </div>
</div>
    <!-- content -->
@php
    $email1 =  'somounyraksa@gmail.com';
    $email2 =  'chychanraksmey@gmail.com';
    $email3 =  'naslacambodia@gmail.com';
    $email4 =  'naslacambodia@gmail.com';
    $email5 =  'malismoa@gmail.com';
    $email6 =  'potheary@iuj.ac.jp';
    $email7 =  'emtannsophanith.nasla@gmail.com';
    $email8 =  'poeumoniroath@gmail.com';

    if (!str_starts_with($email1 && $email2 && $email3  && $email4 && $email5 && $email6  && $email7 && $email8   , 'http://') && !str_starts_with($email1 && $email2 && $email3  && $email4 && $email5 && $email6  && $email7 && $email8, 'https://')) {
        $email1 = 'https://' . $email1;
        $email2 = 'https://' . $email2;
        $email3 = 'https://' . $email3;
        $email4 = 'https://' . $email4;
        $email5 = 'https://' . $email5;
        $email6 = 'https://' . $email6;
        $email7 = 'https://' . $email7;
        $email8 = 'https://' . $email8;
    }
@endphp  
    <div class="container">
        <div class="row">
            <div class="col-lay-12 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/ឯកឧត្តម សូ មុនីរក្សា.jpg') }}" alt="">
                <br/>
                <span>ឯកឧត្តម សូ​ មុនីរក្សា នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email1 }}">somounyraksa@gmail.com</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-4 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/លោកជំទាវ_ជី_ច័ន្ទរស្មី.jpg') }}" alt="">
                <br/>
                <span >លោកជំទាវ ជី ច័ន្ទរស្មី <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{  $email2 }}">chychanraksmey@gmail.com</a></span>
            </div>
            <div class="col-4 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >ឯកឧត្តម មុំ រីរៈ <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email3 }}">chychanraksmey@gmail.com</a></span>
            </div>
            <div class="col-4 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="http://nasla.k5moi.com/v1/api/files/95" alt="">
                <br/>
                <span >ឯកឧត្តម គង់ ចាន់ថន <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email4 }}">potheary@iuj.ac.jp</a></span>
            </div>
           
        </div>
        <div class="row">
            <div class="col-3 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/លោកស្រី ម៉ៅ ម៉ាលីស.JPG') }}" alt="">
                <br/>
                <span >លោកស្រី ម៉ៅ មាលីស <br/> ប្រធាននាយកដ្ឋានកិច្ចការទូទៅ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email5 }}">malismoa@gmail.com</a></span>
            </div>
            <div class="col-3 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/លោក លឹម ពុទ្ធារី.JPG') }}" alt="">
                <br/>
                <span >លោក លឹម ពុទ្ធារី <br/> ប្រធាននាយកបណ្តុះបណ្តាល</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email6 }}">potheary@iuj.ac.jp</a></span>
            </div>
            <div class="col-3 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/លោក ឯមតាន់ សុផានិត.JPG') }}" alt="">
                <br/>
                <span >លោក ឯមតាន់ សុផានិត <br/> ប្រធាននាយកដ្ឋានផែនការ និង​កិច្ចសហប្រតិបត្តិការ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email7 }}">emtannsophanith.nasla<br/> @gmail.com</a></span>
            </div>
            <div class="col-3 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/លោក លី ពៅមណីរត្ន.jpg') }}" alt="">
                <br/>
                <span >លោក លី ពៅមណីរត្ន <br/> ប្រធាននាយកដ្ឋានស្រាវជ្រាវ និងផ្សព្វផ្សាយ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email8 }}">poeumoniroath@gmail.com</a></span>
            </div>
            
        </div>
    </div>
    <!-- -------------------------------------------- -->
@endsection