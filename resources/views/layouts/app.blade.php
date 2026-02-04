<!DOCTYPE html>
<html>
<head>
    <title>Crowdfunding Lite</title>
    <style>
        nav {
            background: #222;
            padding: 10px;
        }
        nav a {
            color: white;
            margin-right: 15px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .container {
            padding: 20px;
        }
    </style>
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
