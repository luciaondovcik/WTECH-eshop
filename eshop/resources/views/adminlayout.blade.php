<!DOCTYPE html>
<html lang="en">
<head>
    <title>HrajMi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.8.2/dist/alpine.min.js"></script>

    <link rel="stylesheet" href="{{ asset('css/style-nas.css') }}">

</head>
<body>

<div class="site-wrap">
    <header class="site-navbar" role="banner">
        <div class="site-navbar-top py-3">
            <div class="container-fluid">
                <div class="row align-items-center">

                    <div class="col-12 col-xl-5">
                    </div>

                    <div class="col-12 mb-3 mb-xl-0 col-xl-2 order-1 order-xl-2 text-center">
                        <div class="site-logo">
                            <a href="/" class="js-logo-clone">HrajMi.sk</a>
                        </div>
                    </div>

                    <div class="col-12 col-xl-5 order-3 order-xl-3 text-right my-header">
                        <div class="site-top-icons mt-4 mt-xl-0 my-icons">
                            <ul>
                                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            </ul>
                            <ul class="user-btn p-1 ml-xl-2 d-flex">
                                <div class="dropdown">
                                    <span>Admin</span>
                                    <button class="btn btn-light p-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="icon icon-person"></span>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <form method="POST" action="/logout">
                                            @csrf
                                            <button class="dropdown-item p-1" type="submit">Odhlásiť sa</button>
                                        </form>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <x-flash />
    </header>

    <main class="main-content">
        @yield('admin-main')
    </main>
</div>

<script src="/js/jquery-ui.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

</body>

<body class="@yield('body-class','')">
@yield('extra-js')

</body>
</html>
