<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
         <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">


    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
    <script src="{{ mix('js/app.js') }}"></script>
    </body>
    <footer class="page-footer font-small navbar-dark bg-dark mt-5">

        <!-- Copyright -->
        <div class="footer-copyright text-center py-3 text-white">© 2020 Edwin Fenollal</div>
        <!-- Copyright -->

      </footer>
</html>
