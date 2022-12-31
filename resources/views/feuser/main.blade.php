<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/main/app.css">
    <title>Product List - @yield('title')</title>
    @yield('style')
</head>
<body>
    <div class="w-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-primary">
            <div class="container-fluid">
                <a href="#" class="navbar-brand text-light">Online Shop</a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav">
                        <a href="{{ route('indexProductList') }}" class="nav-item nav-link text-light active">Product List</a>
                        <a href="{{ route('indexCart') }}" class="nav-item nav-link text-light">Cart</a>
                        <a href="{{ route('orderHistory') }}" class="nav-item nav-link text-light">Order History</a>
                    </div>
                    <div class="navbar-nav ms-auto">
                        @auth
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-item nav-link btn btn-light">Logout</button>
                        </form>
                        @elseguest
                        <a href="{{ route('login') }}" class="nav-item nav-link text-light">Login</a>
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
    </div>
@yield('content')
</body>

@yield('script')
</html>
