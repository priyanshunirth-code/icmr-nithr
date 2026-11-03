<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.jpg') }}">
    <title>
        ICMR
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="./assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="./assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/datatable/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="assets/css/multistep.css">
    <link rel="stylesheet" href="assets/css/w3.css">

    <style type="text/css">
        #loader {
            border: 12px solid #f3f3f3;
            border-radius: 50%;
            border-top: 12px solid #444444;
            width: 70px;
            height: 70px;
            animation: spin 1s linear infinite;
        }
 
        .center {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            margin: auto;
        }
 
        @keyframes spin {
            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>
<body class="{{ $class ?? '' }}">

    @guest
        @yield('content')
    @endguest

    @auth
        @if (in_array(request()->route()->getName(),
                ['sign-in-static', 'sign-up-static', 'login', 'register', 'recover-password', 'rtl', 'virtual-reality']))
            @yield('content')
        @else
            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'group')
                @if (
                    !in_array(request()->route()->getName(),
                        ['profile', 'profile-static']))
                    <div class="min-height-62 bg-primary position-absolute w-100"></div>
                @elseif (in_array(request()->route()->getName(),
                        ['profile-static', 'profile']))
                    <div class="position-absolute w-100 min-height-300 top-0"
                        style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/profile-layout-header.jpg'); background-position-y: 50%;">
                        <span class="mask bg-primary opacity-6"></span>
                    </div>
                @endif

                @include('layouts.navbars.auth.sidenav')
            @endif

            <main class="main-content border-radius-lg">
                @yield('content')
            </main>
            {{-- @include('components.fixed-plugin') --}}
        @endif
    @endauth
    <div id="loader" class="center" style="display: none;"></div>
    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="assets/js/argon-dashboard.js"></script>
    <!-- @stack('js'); -->
    
    <script src="assets/js/datatable/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/dataTables.bootstrap4.min.js"></script>
    <script src="assets/js/datatable/dataTables.responsive.min.js"></script>
    <script src="assets/js/datatable/responsive.bootstrap4.min.js"></script>
    <script src="assets/js/datatable/dataTables.buttons.min.js"></script>
    <script src="assets/js/datatable/buttons.bootstrap4.min.js"></script>
    <script src="assets/js/datatable/jszip.min.js"></script>
    <script src="assets/js/datatable/pdfmake.min.js"></script>
    <script src="assets/js/datatable/vfs_fonts.js"></script>
    <script src="assets/js/datatable/buttons.html5.min.js"></script>
    <script src="assets/js/datatable/buttons.print.min.js"></script>
    <script src="assets/js/datatable/buttons.colVis.min.js"></script>
    <script src="assets/js/multistep.js"></script>

    <script type="text/javascript">
        function showloader() {
          document.getElementById("loader").style.display = "block";
          $("body").css("opacity","0.5");
          $("body").css("pointer-events","none");
        }

        $(function () {
            $("#example1").DataTable({
              "responsive": true, "lengthChange": false, "autoWidth": false,"paging": true,"pageLength": 50,
              "buttons": ["csv", "excel", "colvis"]
              // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
              "paging": false,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
              // "pageLength": 50,
              // "buttons": ["excel"]
              "buttons": [
                    {
                        extend: 'excelHtml5',
                        title: $("#datatable-title").html()
                    }
                ]
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            $('#example3').DataTable({
              "paging": false,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": true,
            }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

            $('#example4').DataTable({
              "paging": false,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "responsive": false,
              "buttons": [
                    {
                        extend: 'excelHtml5',
                        title: $("#datatable-title").html()
                    }
                ]
            }).buttons().container().appendTo('#example4_wrapper .col-md-6:eq(0)');
        });
    </script>
</body>

</html>
