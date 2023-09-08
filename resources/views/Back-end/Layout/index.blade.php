<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Nasala Admin</title>
    <!-- base:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/base/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.26/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/css/bootstrap-grid.min.css" integrity="sha512-cKoGpmS4czjv58PNt1YTHxg0wUDlctZyp9KUxQpdbAft+XqnyKvDvcGX0QYCgCohQenOuyGSl8l1f7/+axAqyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css" integrity="sha512-AZtJoEn5SfSZimv10x5NMO2gaZCdoU8nxtHJK8O4SbKNlQeb1ggkvf0b0QixuuXIjX3Tp5jzBbTWajki81Vl2g==" crossorigin="anonymous" referrerpolicy="no-referrer" />   
    {{-- <link rel="stylesheet" href="{{ asset('vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css') }}" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
    

    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('images/front/photo_2022-10-19_09-17-50-removebg-preview.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/font.css') }}">
    {{-- @notifyCss --}}
    @include('Back-end.Layout.font')
    @yield('CSS')
    <style>
       .required::after {
        content: ' *';
        color: red;
      }
      .delete-icon {
        position: absolute;
        top: 454px;
        right: 49px;
        font-size: 18px;
        color: red;
        cursor: pointer;
    }
    </style>
    </head>

  <body>
    <div class="container-scroller">	
	<!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
		@include('Back-end.Layout.navigation-bar')
    </div>
    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


   
    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			@yield('template')
		</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				<footer class="footer">
          <div class="footer-wrap">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright ©Nasala</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">©Ministery of Interior V.1</span>
            </div>
          </div>
        </footer>
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
    <!-- base:js -->
    <script src="{{ asset('vendors/base/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    
  
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{ asset('js/template.js') }}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js" integrity="sha512-rXm6RiYDlz+aZC/ht75tGzeAmCg4gVfBA6Be5s5uENSahiXkgwEy10J2Cc+dxUAW4lRRQYbS5pugMOqBrs8ksw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.26/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('vendors/select2/select2.min.js') }}"></script>

    <!-- End plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/progressbar.js/progressbar.min.js') }}"></script>
		<script src="{{ asset('vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js') }}"></script>
		<script src="{{ asset('vendors/justgage/raphael-2.1.4.min.js') }}"></script>
		<script src="{{ asset('vendors/justgage/justgage.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/file-upload.js') }}"></script>
    <script src="{{ asset('js/typeahead.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>


    <!-- End custom js for this page-->
  </body>
</html>