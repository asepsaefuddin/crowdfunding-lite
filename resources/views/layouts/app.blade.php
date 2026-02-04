<!DOCTYPE html>
<html>
<head>
    <title>Crowdfunding Lite</title>
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-form.css') }}">
</head>
<body>

<nav>
    <a href="/">Home</a>
    <a href="/campaigns">Campaign</a>
    <a href="/admin/campaigns">Admin</a>
</nav>

<div class="container">
    @yield('content')
</div>

</body>
</html>
