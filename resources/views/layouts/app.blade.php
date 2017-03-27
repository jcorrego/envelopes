<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <!-- These meta tags come first. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@section('title') :: {{ config('app.name', 'Envelopes') }} @show</title>
    <link rel="shortcut icon" href="/favicon.ico"/>

    <script src="https://use.fontawesome.com/9e25f93ed2.js"></script>
    <!-- Styles -->
    <link href="{{ asset('css/toolkit-inverse.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/snackbar.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/element-ui.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ mix('css/libraries.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
<div id="app">
    @include('layouts.partials.nav')
    @yield('content')
</div>

<!-- Include jQuery (required) and the JS -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<!-- Scripts -->
<script src="{{ asset('js/currency-validator.js') }}"></script>
<script src="{{ asset('js/toolkit.min.js') }}"></script>
<script src="{{ asset('js/snackbar.min.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>