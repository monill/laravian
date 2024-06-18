<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravian</title>

    @vite([
        'resources/css/compact.css',
        'resources/css/compact1.css',
        'resources/css/chat.css',
        'resources/css/lang.css',
{{--        'resources/js/crypt.js',--}}
    ])

</head>
<body class="v35 gecko chrome village1 perspectiveResources">

    @yield('content')

</body>
</html>
