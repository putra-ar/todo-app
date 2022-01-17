<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = { csrfToken: '{{ csrf_token() }}' }
    </script>
    {{--
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <title>Todo App</title>

</head>

<body>
    <div class="container" id="app">
        <task-list :list="{{ json_encode($tasks) }}"></task-list>
    </div>


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>

</html>
