@extends('Front-end.Layout')
@section('content')
<?php
        // Retrieve the locale value from the session
        $locale = app()->getLocale();
?>
<!-- Content title -->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12 col-12 d-flex">
            <i class="icon-size-rps fa-solid fa-landmark mg-r-10px color-blue-355fb6"></i>
            <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Leadership composition') }}</h2>
        </div>
    </div>
    <div class="col-md-12 divider-line "></div>
  </div>
</div>
    <!-- content -->
@php
    $email1 =  'somounyraksa@gmail.com';
    $email2 =  'chychanraksmey@gmail.com';
    $email3 =  'virakmommoi@gmail.com';
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
    <div class="container rps-sort-blib">
        <div class="row">
            <div class="col-md-12 text-algin-center Siemreap font-size-16">
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
                <img class="image-front-TT" src="{{ asset('images/E 200.jpg') }}" alt="">
                <br/>
                <span >ឯកឧត្តម មុំ រីរៈ <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email3 }}">virakmommoi@gmail.com</a></span>
            </div>
            <div class="col-4 text-algin-center Siemreap font-size-16">
                <img class="image-front-TT" src="{{ asset('images/photo_2023-09-24_10-17-16.jpg') }}" alt="">
                <br/>
                <span >ឯកឧត្តម គង់ ចាន់ថន <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email4 }}">chanthankong@gmail.com</a></span>
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
    <div class="container rps-sort-lib">
        <div class="col-12 Siemreap mt-5">
            <h2>| នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h2>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/ឯកឧត្តម សូ មុនីរក្សា.jpg') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span>ឯកឧត្តម សូ​ មុនីរក្សា នាយកសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email1 }}">somounyraksa@gmail.com</a></span>
            </div>
        </div>
        <div class="col-12 Siemreap mt-5">
            <h2>| នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</h2>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/លោកជំទាវ_ជី_ច័ន្ទរស្មី.jpg') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >លោកជំទាវ ជី ច័ន្ទរស្មី <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{  $email2 }}">chychanraksmey@gmail.com</a></span>
                
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/E 200.jpg') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >ឯកឧត្តម មុំ រីរៈ <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email3 }}">virakmommoi@gmail.com</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/photo_2023-09-24_10-17-16.jpg') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >ឯកឧត្តម គង់ ចាន់ថន <br/> នាយករងសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email4 }}">chanthankong@gmail.com</a></span>
            </div>
        </div>
        <div class="col-12 Siemreap mt-5">
            <h2>| ប្រធាន</h2>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/លោកស្រី ម៉ៅ ម៉ាលីស.JPG') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >លោកស្រី ម៉ៅ មាលីស <br/> ប្រធាននាយកដ្ឋានកិច្ចការទូទៅ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email5 }}">malismoa@gmail.com</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/លោក លឹម ពុទ្ធារី.JPG') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >លោក លឹម ពុទ្ធារី <br/> ប្រធាននាយកបណ្តុះបណ្តាល</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email6 }}">potheary@iuj.ac.jp</a></span>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img class="img-fluid" src="{{ asset('images/លោក ឯមតាន់ សុផានិត.JPG') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >លោក ឯមតាន់ សុផានិត <br/> ប្រធាននាយកដ្ឋានផែនការ និង​កិច្ចសហប្រតិបត្តិការ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email7 }}">emtannsophanith.nasla<br/> @gmail.com</a></span>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-4">
                <img class="img-fluid" src="{{  asset('images/លោក លី ពៅមណីរត្ន.jpg') }}" alt="">
            </div>
            <div class="col-8 Siemreap">
                <span >លោក លី ពៅមណីរត្ន <br/> ប្រធាននាយកដ្ឋានស្រាវជ្រាវ និងផ្សព្វផ្សាយ</span>
                <br/>
                <span >អ៊ីម៉ែល <a href="{{ $email8 }}">poeumoniroath@gmail.com</a></span>
            </div>
        </div>
    </div>
    <!-- -------------------------------------------- -->
@endsection