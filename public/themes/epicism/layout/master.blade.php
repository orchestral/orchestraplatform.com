<!doctype html>
<html lang="en-US">
<head>
    @include('layout._header')
</head>
<body{{ HTML::attributes(Site::get('html::body', [])) }}>
    <div id="wrapper">
        @include('layout._navigation')

        <header{{ HTML::attributes(HTML::decorate(Site::get('html::header', []), ['id' => 'header', 'role' => 'header'])) }}>
            @yield('header')
        </header>
        <div id="content">
            @yield('content')
        <div>
        @include('layout._footer')
    </div>
</body>
</html>
