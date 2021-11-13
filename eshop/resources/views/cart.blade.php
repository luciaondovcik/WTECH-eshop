@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="index.html">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Košík</strong></div>
            </div>
        </div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row mb-4 bg-light border text-secondary">
                        <div class="col-4 border-right">
                            <p class="my-2 text-center text-black"><strong>Košík</strong></p>
                        </div>
                        <div class="col-4 border-right">
                            <p class="my-2 text-center">Dodacie údaje</p>
                        </div>
                        <div class="col-4">
                            <p class="my-2 text-center">Doprava a platba</p>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="images/gitara1.jpg" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex flex-column my-3 my-md-0">
                                    <h5 class="mb-auto cart-item"><a href="shop-single.html">Fender Player Plus Stratocaster HSS PF Belair Blue</a></h5>
                                    <div class="def-number-input number-input safari_only mb-0 w-100 row d-flex align-items-baseline">
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <p>Počet:</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-0" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" value="2" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex flex-column p-md-0 justify-content-end">
                                    <p class="small mb-1 ml-auto">128€</p>
                                </div>
                                <div class="col-md-3 d-flex cart-final">
                                    <button type="button" class="close close-x mb-auto ml-auto mr-0 p-2" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <button type="button" class="btn btn-sm close close-word" aria-label="Close">
                                        <span aria-hidden="true">Vymazať položku</span>
                                    </button>
                                    <p class="mb-0 ml-auto mr-0 lead"><strong>256€</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="images/klavir.jpg" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex flex-column my-3 my-md-0">
                                    <h5 class="mb-auto cart-item"><a href="shop-single.html">Yamaha B2E PE Polished Ebony</a></h5>
                                    <div class="def-number-input number-input safari_only mb-0 w-100 row d-flex align-items-baseline">
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <p>Počet:</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-0" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex flex-column p-md-0 justify-content-end">
                                    <p class="small mb-1 ml-auto">5369€</p>
                                </div>
                                <div class="col-md-3 d-flex cart-final">
                                    <button type="button" class="close close-x mb-auto ml-auto mr-0 p-2" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <button type="button" class="btn btn-sm close close-word" aria-label="Close">
                                        <span aria-hidden="true">Vymazať položku</span>
                                    </button>
                                    <p class="mb-0 ml-auto mr-0 lead"><strong>5369€</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="images/trsatko.jpg" alt="Sample">
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex flex-column my-3 my-md-0">
                                    <h5 class="mb-auto cart-item"><a href="shop-single.html">Fender 351 Shape Premium Pick Medium Blue Moto</a></h5>
                                    <div class="def-number-input number-input safari_only mb-0 w-100 row d-flex align-items-baseline">
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <p>Počet:</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-0" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex flex-column p-md-0 justify-content-end">
                                    <p class="small mb-1 ml-auto">0.69€</p>
                                </div>
                                <div class="col-md-3 d-flex cart-final">
                                    <button type="button" class="close close-x mb-auto ml-auto mr-0 p-2" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <button type="button" class="btn btn-sm close close-word" aria-label="Close">
                                        <span aria-hidden="true">Vymazať položku</span>
                                    </button>
                                    <p class="mb-0 ml-auto mr-0 lead"><strong>0.69€</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4">
                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="mb-3 text-center text-black">Zhrnutie objednávky</h3>
                            <h6 class="mb-3 text-center">V košíku máš <strong class="text-black">4</strong> produkty.</h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Produkty:
                                    <span>5625.69€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Doprava:
                                    <span>Vyberte</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    Zľava:
                                    <span>562.57€</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top px-0 mb-3">
                                    <div>
                                        <strong>Spolu:</strong>
                                    </div>
                                    <span><strong>5063.12€</strong></span>
                                </li>
                            </ul>

                            <button type="button" class="btn btn-primary btn-block waves-effect waves-light" onclick="window.location.href='checkout';"><strong>Pokračuj</strong></button>
                        </div>
                    </div>
                    <!-- Card -->
                    <div class="mb-3 mb-md-0 border-bottom d-flex align-items-center">
                        <input type="text" class="form-control py-3 border-0" id="coupon" placeholder="Zľavový kupón">
                        <button type="button" class="btn border-0 pt-2"><span class="icon icon-check"></span></button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="button" class="btn back-shop" onclick="window.location.href='shop.html';">Späť k nákupu</button>
                </div>
            </div>
        </div>
    </section>
@endsection
