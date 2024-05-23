<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Riza's Coffee</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>

    <div id="main">
        <div id="sidebar">
            <div id="branding">
                <img src="https://images.rawpixel.com/image_social_square/czNmcy1wcml2YXRlL3Jhd3BpeGVsX2ltYWdlcy93ZWJzaXRlX2NvbnRlbnQvbHIvdjI5MS1iYXRjaDItbnVub29uLTIzLWNvZmZlZS1uZXcta3NrMnE0NWEuanBn.jpg" alt="Coffee Shop Logo">
                <h1>Iza Coffee Shop</h1>
            </div>

            <nav id="main-nav">
                <a href="{{ url('/') }}">Home</a>
                <a href="{{ url('/products') }}">Products</a>
                <a href="{{ url('/about') }}">QR Scanner</a>
            </nav>
        </div>
        <div id="content">
            @yield('content')
        </div>
        
    </div>

</body>
</html>
