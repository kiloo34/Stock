<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" id="csrf" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Stock') }}</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        @stack('css')
        @stack('style')
        <script src="{{ asset('plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            @include('components.navbar' )
            @include('components.sidebar')
            <div class="content-wrapper">
                @include('components.header')
                <section class="content">
                    @yield('content')
                </section>
            </div>
            @include('components.footer')
            <aside class="control-sidebar control-sidebar-dark">
            </aside>
        </div>
        <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
        <script src="{{ asset('plugins/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('dist/js/demo.js') }}"></script>
        <script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>

        @stack('js')
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
        </script>

        @stack('script')


    </body>

</html>
