<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/scss/index.scss', 'resources/js/app.js'])
    @stack('scripts')
    <title>Document</title>
</head>

<body>
    @include('layouts.header')
    @include('components.snackbar')
    <div class=" app__wrapper">
        <div class="app__content">
            @yield('content')
        </div>
        @include('layouts.footer')
    </div>
</body>

</html>