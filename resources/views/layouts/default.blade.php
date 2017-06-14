<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('includes.head')
</head>
<body>
<div class="container">
    @include('includes.header')

    <div class="row">
        @yield('content')
    </div>
    <div class="row">
        @include('includes.footer')
    </div>
</div>
</body>
</html>
