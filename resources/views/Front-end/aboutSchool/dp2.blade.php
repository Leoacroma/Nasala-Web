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
                <i class="icon-size-rps fa-solid fa-flag-checkered mg-r-10px color-blue-355fb6"></i>
                <h2 class="text-size-rps nav-font color-blue-355fb6 "  data-locale="{{ $locale }}">{{ __('messages.Strategic Plan on Capacity Development') }}</h2>
            </div>
        </div>
        <div class="col-md-12 divider-line "></div>
      </div>
    </div>

    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-12 Kantumruy">
                        <div class="card bg-secondary mb-3 " >
                            <div class="card-header " >ចក្ខុវិស័យ <i class="fa-solid fa-fire-flame-curved"></i></div>
                            <div class="card-body">
                                <!-- <h5 class="card-title">Primary card title</h5> -->
                                <p class="card-text ">ប្រជាពលរដ្ឋទទួលបានសេវាកាន់តែប្រសើរនិងប្រកបដោយវិជ្ជាជីវៈពីមន្ត្រីរាជាការស៊ីវិលដែលកំពុងបម្រើការងារនៅទីស្តីការក្រសួងមហាផ្ទៃ និងធនធានមនុស្សនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ។</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 Kantumruy">
                        <div class="card text-body bg-light mb-3 " >
                            <div class="card-header ">គោលបំណង <i class="fa-solid fa-bullseye"></i></div>
                            <div class="card-body">
                                <!-- <h5 class="card-title">Primary card title</h5> -->
                                <p class="card-text ">លើកម្ពស់សមត្ថភាពវិជ្ជាជីវៈរបស់មន្ត្រីរាជការស៊ីវិលដែលកំពុងបម្រើការងារនៅទីស្តីការក្រសួងមហាផ្ទៃ និងធនធានមនុស្សនៅរដ្ឋបាលថ្នាក់ក្រោមជាតិ។</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 Kantumruy">
                        <div class="card bg-secondary  mb-3" >
                            <div class="card-header ">គោលដៅ <i class="fa-solid fa-location-dot"></i></div>
                            <div class="card-body">
                                <!-- <h5 class="card-title">Primary card title</h5> -->
                                <p class="card-text ">ដើម្បីសម្រេចគោលបំណងដូចបានកំណត់ខាងលើ ផែនការយុទ្ធសាស្ត្រនេះបានកំណាត់នូវគោលដៅចំនួន០៣ ដូចខាងក្រោម៖<br>១.លើកកម្ពស់គុណភាពកម្មវិធីអភិវឌ្ឍន៍សមត្ថភាព<br>២.ពង្រឹងគុណភាពនៃការសិក្សាស្រាវជ្រាវ<br>៣.ពង្រឹងប្រសិទ្ធភាពនៃយន្តការអភិវឌ្ឍនៃសមត្ថភាព។</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 Kantumruy">
                        <div class="card bg-light  mb-3" >
                            <div class="card-header "> យុទ្ធសាស្រ្ត <i class="fa-solid fa-list-check"></i></div>
                            <div class="card-body">
                                <!-- <h5 class="card-title">Primary card title</h5> -->
                                <p class="card-text ">ដើម្បីសម្រេចបាននូវគោលដៅបានកំណត់ផែនការយុទ្ធសាស្រ្តនេះបានដាក់ចេញនូវយុទ្ធសាស្រ្តចំនួន០៦ ដូចខាងក្រោម៖
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី១</span> លើកម្ពស់ប្រសិទ្ធភាពកម្មវិធីអភិវឌ្ឍន៍សមត្ថភាព
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី២</span> ពង្រឹងការតាមដាន និងវាយតម្លៃកម្មវិធីអភិវឌ្ឍន៍សមត្ថភាព
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី៣</span> លើកកម្ពសើមុខងារនៃការសិក្សាស្រាវជ្រាវ
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី៤</span> ពង្រឹងមុខងារនៃការអភិវឌ្ឍធនធានមនុស្ស
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី៥</span> កៀគរធនធានពីភាគីពាក់ព័ន្ធ
                                <br><span class="badge badge-primary">យុទ្ធសាស្រ្តទី៦</span> រៀបចំដាក់ឱ្យដំណើរការសាលាជាតិរដ្ឋបាលមូលដ្ឋាន</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
                
                
            </div>
            
        </div>
    </div>
@endsection