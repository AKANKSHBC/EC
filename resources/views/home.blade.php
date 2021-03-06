<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    {{-- CSS Style --}}
    

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
    
    @include('layouts.navbar')
    @yield('content')

</body>
</html>