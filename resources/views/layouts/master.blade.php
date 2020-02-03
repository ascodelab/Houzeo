<html>
    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Karla&display=swap" rel="stylesheet">
        <style>
            *{
                font-family: 'Karla', sans-serif;
            }
            body{
                background:#fff;
            }
            .wrap-cont{
                padding:50px 20px;
            }
            .text-white{
                color:#fff !important;
            }
            .result-table-wrap{
                padding:20px;
            }
            .clearfix{
                height:50px;
            }
        </style>
    </head>
    <body>
        <!-- navbar section -->
        @include("layouts.navbar")
        <div class="container">
            @yield('content')
        </div>
    </body>
    <script src="/js/app.js"></script>
  @yield('scripts')
</html>