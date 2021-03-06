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
                        <div class="site-search-icon text-left">
                            <form action="/search" method="GET" class="site-block-top-search d-flex align-items-center">
                                <button type="submit" class="btn btn-link pt-2 btn-search"><span class="icon icon-search2"></span></button>
                                <input type="text" name="query" id="query" value="{{ request()->input('query') }}" class="form-control border-0" placeholder="Chcem si k??pi??..." autocomplete="off">
                            </form>
                        </div>
                        <div class="site-top-icons mt-4 mt-xl-0 my-icons">
                            <ul>
                                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                            </ul>
                            <ul class="user-btn p-1 ml-xl-2 d-flex">
                                @auth
                                    <div class="dropdown">
                                        <span>Vitaj</span>
                                        <button class="btn btn-light p-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="icon icon-person"></span>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <form method="POST" action="/logout">
                                                @csrf
                                                <button class="dropdown-item p-1" type="submit">Odhl??si?? sa</button>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <li data-toggle="modal" data-target="#exampleModal">Neprihl??sen??<span class="icon icon-person"></span></li>
                                @endauth

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content modal-fullscreen">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Prihl??senie</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body m-3">
                                                <form method="POST" action="/login">
                                                    @csrf
                                                    <div class="form-group border-bottom">
                                                        <input type="email" name="email" class="form-control border-0" id="email-usr" aria-describedby="emailHelp" placeholder="Enter email">
                                                    </div>
                                                    @error('email')
                                                    <small class="text-danger text-xs mt-1">{{ $message }}</small>
                                                    @enderror
                                                    <div class="form-group border-bottom">
                                                        <input type="password" name="password" class="form-control border-0" id="password-usr" placeholder="Password">
                                                    </div>
                                                    @error('password')
                                                    <small class="text-danger text-xs mt-1">{{ $message }}</small>
                                                    @enderror

                                                    <div class="d-flex justify-content-center m-3 mt-5">
                                                        <button type="submit" class="btn btn-primary">Prihl??si??</button>
                                                    </div>
                                                    @guest
                                                    <div class="d-flex justify-content-center m-3 mt-4">
                                                        <button type="button" class="btn btn-primary registration border-0"><a href="/registration">Registr??cia</a></button>
                                                    </div>
                                                    @endguest
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <li>
                                    <a href="{{route('cart.index')}}" class="site-cart ml-2">
                                        <span class="icon icon-shopping_cart"></span>

                                        @if (Cart::instance('default')->count() < 10)
                                        <span class="count">{{Cart::instance('default')->count()}}</span>
                                        @else
                                        <span class="count">9+</span>
                                        @endif
                                    </a>
                                </li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-12 text-left">
            <nav class="site-navigation text-right text-md-center" role="navigation">
                <div class="container">
                    <ul class="site-menu js-clone-nav d-none d-md-block p-0">
                        @foreach($categories as $category)
                        <li><a href="{{ route('products.index', ['category'=>$category->slug])}}">{{$category->name}}</a></li>
                        @endforeach
                        <li><a href="zlavy">Z??avy</a></li>
                    </ul>
                </div>
            </nav>
        </div>

        <x-flash />
    </header>

    <main class="main-content">
        @yield('main-content')
    </main>

    <footer class="site-footer border-top">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="accordion w-100 d-lg-flex" id="accordion">
                                <div class="col-lg-3 col-md-12 my-footer">
                                    <a href="#one" data-toggle="collapse" class="h5 text-uppercase nav-link d-block d-lg-none d-xl-none" >HrajMi</a>
                                    <div class="h5 footer-heading mb-4 text-uppercase d-none d-lg-block d-xl-block">HrajMi</div>
                                    <div class="collapse text-white d-lg-flex" id="one" data-parent="#accordion" >
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link">Kontaktujte n??s</a></li>
                                            <li><a href="#" class="nav-link">Predajne</a></li>
                                            <li><a href="#" class="nav-link">9:00 - 20:00</a></li>
                                            <li class="d-flex"><a href="#" class="nav-link"><span class="icon icon-facebook mr-lg-3"></span></a>
                                                <a href="#" class="nav-link"><span class="icon icon-instagram mr-lg-3"></span></a>
                                                <a href="#" class="nav-link"><span class="icon icon-twitter mr-lg-3"></span></a>
                                                <a href="#" class="nav-link"><span class="icon icon-youtube mr-lg-3"></span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 my-footer">
                                    <a href="#two" data-toggle="collapse" class="h5 text-uppercase nav-link d-block d-lg-none d-xl-none" >O spolo??nosti</a>
                                    <div class="h5 footer-heading mb-4 text-uppercase d-none d-lg-block d-xl-block">O spolo??nosti</div>
                                    <div class="collapse text-white d-lg-flex" id="two" data-parent="#accordion" >
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link">O n??s</a></li>
                                            <li><a href="#" class="nav-link">Kari??ra</a></li>
                                            <li><a href="#" class="nav-link">Pre m??di??</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 my-footer">
                                    <a href="#three" data-toggle="collapse" class="h5 text-uppercase nav-link d-block d-lg-none d-xl-none" >FAQ</a>
                                    <div class="h5 footer-heading mb-4 text-uppercase d-none d-lg-block d-xl-block">FAQ</div>
                                    <div class="collapse text-white d-lg-flex" id="three" data-parent="#accordion" >
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link">Ot??zka 1</a></li>
                                            <li><a href="#" class="nav-link">Ot??zka 2</a></li>
                                            <li><a href="#" class="nav-link">Ot??zka 3</a></li>
                                            <li><a href="#" class="nav-link">Na????taj ??al??ie</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-12 my-footer">
                                    <a href="#four" data-toggle="collapse" class="h5 text-uppercase nav-link d-block d-lg-none d-xl-none" >O n??kupe</a>
                                    <div class="h5 footer-heading mb-4 text-uppercase d-none d-lg-block d-xl-block">O n??kupe</div>
                                    <div class="collapse text-white d-lg-flex" id="four" data-parent="#accordion" >
                                        <ul class="list-unstyled">
                                            <li><a href="#" class="nav-link">Doprava</a></li>
                                            <li><a href="#" class="nav-link">Reklam??cia</a></li>
                                            <li><a href="#" class="nav-link">Tabu??ka ve??kost??</a></li>
                                            <li><a href="#" class="nav-link">Obchodn?? podmienky</a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center border-top pt-2">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Colorlib</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </footer>
</div>

<script src="/js/jquery-ui.js"></script>
<script src="/js/owl.carousel.min.js"></script>
<script src="/js/jquery.magnific-popup.min.js"></script>
<script src="/js/aos.js"></script>
<script src="/js/main.js"></script>

</body>

<body class="@yield('body-class','')">
@yield('extra-js')

</body>
</html>
