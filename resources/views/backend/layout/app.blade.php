<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('public/backend/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('public/backend/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('public/backend/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('public/backend/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('public/backend/assets/css/style.css')}}" rel="stylesheet">

  {{-- for toggle button from bootstrap --}}
  <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css"
    rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


  @include('backend/layout/header');

  @include('backend/layout/c_messages')

  @include('backend/layout/sidebar');

  @yield('content');

  @include('backend/layout/footer');

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('public/backend/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('public/backend/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('public/backend/assets/js/main.js')}}"></script>

  <script>
    function addvaluelist2() {
            var listlength = document.getElementsByClassName('productlist');
            var valuelistvalue = document.getElementsByClassName('productlist')[listlength.length - 1];
            var count = document.getElementsByName('images[]').length;
            var input = document.createElement('input');
            input.name = 'image[]';
            input.className = 'form-control mt-2';
            input.type = 'file';
            input.setAttribute("max-size", "2000");

            valuelistvalue.appendChild(input);

    }

    function removevaluelist2() {
            var valuelistinput = document.getElementsByName('images[]');
            if (valuelistinput.length > 1) {
                valuelistinput[valuelistinput.length - 1].remove();

            }
    }
  </script>
</body>

</html>