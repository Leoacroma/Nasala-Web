<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" integrity="sha512-AZtJoEn5SfSZimv10x5NMO2gaZCdoU8nxtHJK8O4SbKNlQeb1ggkvf0b0QixuuXIjX3Tp5jzBbTWajki81Vl2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
   
    <title>Page-not found</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@100;300;600&family=PT+Sans&display=swap'); 
        .kantumruy{
            font-family: 'Kantumruy Pro', sans-serif;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12" style="display: flex; justify-content: center">
                <img src="{{ asset('images/Oops! 404 .png') }}" alt="" width="40%">
            </div>
        </div>
        <div class="row">
            <div class="col-12 kantumruy" style="font-size: 20px; display: flex; justify-content: center">
                <p> 
                    ទំព័រដែលអ្នកកំពុងស្វែងរកមិនត្រូវបានរកឃើញទេ។</p>
            </div>
        </div>
       <div class="row">
        <div class="col-12" style="display: flex; justify-content: center">
            <a href="javascript:history.back()" class="btn btn-primary kantumruy" style="font-weight: 900; font-size: 15px;">ត្រលប់ទៅក្រោយវិញ</a>
        </div>
       </div>
    </div>
</body>
</html>