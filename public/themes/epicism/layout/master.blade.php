<!doctype html>
<html lang="en-US">
<head>
    @include('layout._header')
</head>
<body{{ HTML::attributes(Site::get('html::body', [])) }}>
    <div id="wrapper">
        @include('layout._navigation')
        @yield('header')
        @yield('content')

        @include('layout._footer')
    </div>
</body>
</html>
