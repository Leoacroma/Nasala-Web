<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}" />
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap-grid.min.css" integrity="sha512-cKoGpmS4czjv58PNt1YTHxg0wUDlctZyp9KUxQpdbAft+XqnyKvDvcGX0QYCgCohQenOuyGSl8l1f7/+axAqyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" rel="stylesheet"/>
    <title>Nasala Admin</title>
    <link rel="stylesheet" href="{{ asset('/css-front/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/css-front/font.css') }}">
    <style>
        body{
            background-color: rgb(254, 253, 251);
        }
        .first-layer{
            background-color: white;
            margin-top: 100px; 
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
            border-radius: 20px;
            padding: 50px;
        }
        .second-layer-box1{
            border-left: 0.5px solid rgb(234 228 228);
            display: flex;
            justify-content: center;
           
        }
        .ss-layer{
            display: flex;
            justify-content: center;
        }
        .dd-layer{
            text-align: center;
        }
    </style>
</head>
<body >
    <div class="container first-layer ">
        <div class="row">
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
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/js/bootstrap.min.js" integrity="sha512-fHY2UiQlipUq0dEabSM4s+phmn+bcxSYzXP4vAXItBvBHU7zAM/mkhCZjtBEIJexhOMzZbgFlPLuErlJF2b+0g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript"  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
</html>