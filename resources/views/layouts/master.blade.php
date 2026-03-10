<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fusion College of Technology')</title>
    <script src="/_sdk/element_sdk.js"></script>
    <script src="https://cdn.tailwindcss.com/3.4.17"></script>
    @include('partials.styles')
</head>

<body>
    @include('partials.mobile-menu')
    @include('partials.toast')
    @include('partials.header')

    @yield('content')

    @include('partials.footer')
    @include('partials.scripts')
</body>

</html>
