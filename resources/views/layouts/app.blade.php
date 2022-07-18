<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">



    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('jambasangsang/assets/img/favicon.jpg') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/css/bootstrap.min.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/css/font-awesome.min.css') }}">

    <!-- Lineawesome CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/css/line-awesome.min.css') }}">

    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/plugins/morris/morris.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.9.6/tailwind.min.css">
    <x-flatpickr::style />
    @livewireStyles
    @flashStyle
    @stack('page-css')
    <style>
        .card {
            border-top-left-radius: 40px !important;
            border-top-right-radius: 40px !important;
            border-bottom-left-radius: 40px !important;
            border-bottom-right-radius: 40px !important;
        }

        .card-header {

            border-top-left-radius: 40px !important;
            border-top-right-radius: 40px !important;
        }

        .card-footer {
            border-bottom-left-radius: 40px !important;
            border-bottom-right-radius: 40px !important;
        }

        td {
            vertical-align: middle !important;
        }

        .acttive {
            background-color: black;
            color: white;
        }
    </style>

</head>

<body class="antialiased">
    <!-- Main Wrapper -->
    <div class="main-wrapper">
        <!-- Header -->
        @include('layouts.navigation')
        <!-- /Header -->

        <!-- Sidebar -->
        @include('layouts.sidebar')
        <!-- /Sidebar -->

        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Page Content -->
            <div class="content container-fluid">
                @yield('content')
            </div>
            <!-- /Page Content -->
        </div>
        <!-- /Page Wrapper -->
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('jambasangsang/assets/js/jquery-3.5.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('jambasangsang/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/assets/js/bootstrap.min.js') }}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ asset('jambasangsang/assets/js/jquery.slimscroll.min.js') }}"></script>

    <!-- Chart JS -->
    <script src="{{ asset('jambasangsang/assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/assets/js/chart.js') }}"></script>


    <script src="https://cdn.jsdelivr.net/gh/livewire/turbolinks@v0.1.x/dist/livewire-turbolinks.js" data-turbolinks-eval="false"></script>
    <!-- Custom JS -->
    <script src="{{ asset('jambasangsang/assets/js/app.js') }}"></script>

    <!-- Scripts -->

    @livewireScripts

    @flashScript
    @flashRender

    <x-flatpickr::script />

    @stack('page-script')

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            window.livewire.on('urlChange', (url) => {
                history.pushState(null, null, url);
                $('.page-title').text(url.toUpperCase().replace('-', ' '));

                $('.breadcrumb-item.active').text(url.substring(0, 1).toUpperCase().replace('-', ' ') + url.substring(1).replace('-', ' '))
            });
        });
        window.addEventListener('openModal', event => {
            $('#deleteModal').modal('show')
        });
        window.addEventListener('hideModal', event => {
            $('#deleteModal').modal('hide')
        });
    </script>

</body>

</html>