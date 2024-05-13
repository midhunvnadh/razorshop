<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href="{{ asset('/app.css') }}" />
    <script src="/jquery-min.js"></script>
    <script src="/app.js"></script>
    <title>{{ $title }}</title>
    @component('components.scripts.include')
    @endcomponent
</head>

<body>
    @if (!$hideNav)
        @component('components.nav')
        @endcomponent
    @endif
    {{ $slot }}
</body>

</html>
