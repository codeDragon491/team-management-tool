<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('shared._header')

        <title>Project Team | Signifly</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Ionicons -->
        <link href="https://unpkg.com/ionicons@4.2.2/dist/css/ionicons.min.css" rel="stylesheet">

        <link rel="stylesheet" href="{{ mix('css/app.css')}}"/>

    </head>
    <body>
        <div id="teamDisplay">
        </div>
    </body>
    <script type="text/javascript" src="{{ mix('js/app.js')}}"></script>
</html>
