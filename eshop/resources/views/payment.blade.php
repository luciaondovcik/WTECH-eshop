@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <a href="/cart">Košík</a> <span class="mx-2 mb-0">/</span> <a href="/checkout">Dodacie údaje</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Doprava a platba</strong></div>
            </div>
        </div>
    </div>
    <section class="site-section">
        <div class="container">
            <div class="row mb-3">
                <div class="col-md-8 mb-5 mb-md-0">
                    <div class="row mb-4 bg-light border text-secondary">
                        <div class="col-4 border-right">
                            <p class="my-2 text-center">Košík</p>
                        </div>
                        <div class="col-4 border-right">
                            <p class="my-2 text-center">Dodacie údaje</p>
                        </div>
                        <div class="col-4">
                            <p class="my-2 text-center text-black"><strong>Doprava a platba </strong></p>
                        </div>
                    </div>
                    <form action="{{ route('payment.store') }}" method="POST">
                        {{csrf_field()}}
                    <div class="p-3 p-lg-4 border">
                        <h2 class="h3 mb-3 text-black">SPÔSOB DORUČENIA NA ADRESU</h2>
{{--                        <form class="mb-5 text-black">--}}
                            <div class="radio">
                                <label><input type="radio" name="optradio1" class="radio1" value="1"> Kuriér DPD <span class="ml-4 text-muted">+3.50€</span></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio1" class="radio1" value="2">  Kuriér Packeta <span class="ml-4 text-muted">+4.50€</span></label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio1" class="radio1" value="3"> Kuriér GLS <span class="ml-4 text-muted">+5.50€</span></label>
                            </div>
{{--                        </form>--}}

                        <h2 class="h3 mb-3 text-black">SPÔSOB PLATBY</h2>
{{--                        <form class="mb-5 text-black">--}}
                            <div class="radio">
                                <label><input type="radio" name="optradio2" class="radio2" value="1" checked> Karta</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio2" class="radio2" value="2"> Bankový prevod</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio2" class="radio2" value="3"> Paypal</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="optradio2" class="radio2" value="4"> Viamo</label>
                            </div>
{{--                        </form>--}}
                    </div>
                    <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Dokonči objednávku a zaplať</button>
                    </form>
                </div>
                <div class="col-md-4">
                    <!-- Card -->
                    <div class="card mb-3">
                        <div class="card-body">
                            <h3 class="mb-3 text-center text-black">Zhrnutie objednávky</h3>
                            <h6 class="mb-3 text-center">Počet produktov v košíku: <strong class="text-black">{{Cart::count()}}</strong></h6>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Produkty:
                                    <span>{{ number_format((float)Cart::total(), 2, '.', ' ') }} €</span>
                                </li>

                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Doprava:
                                    <span id="selected"></span>
                                </li>

{{--                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">--}}
{{--                                    Zľavový kupón:--}}
{{--                                    <span>0 €</span>--}}
{{--                                </li>--}}
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top px-0 mb-3">
                                    <div>
                                        <strong>Spolu:</strong>
                                    </div>
                                    <span id="selected2"></span>
                                </li>
                            </ul>
{{--                            <a href="{{route('thankyou.index')}}"  class="btn btn-primary btn-block waves-effect waves-light"><strong>Dokonči</strong></a>                            --}}
                            <button type="button" class="btn btn-block" onclick="window.location.href='checkout';">Krok späť</button>
                        </div>
                    </div>
                    <!-- Card -->
                </div>


            </div>
            <div class="row">
                <div class="col">
{{--                    <button type="button" class="btn back-shop" onclick="window.location.href='shop';">Späť k nákupu</button>--}}
                    <a href="javascript:history.back(); history.back(); history.back(); history.back()" class="btn back-shop">Späť k nákupu</a>

                </div>
            </div>
        </div>
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $('input[type=radio][name=optradio1]').change(function() {

                var selectedValue = this.value;

                if (selectedValue == 1) {
                    $("#selected").text("3.50 €");
                    $("#selected2").text("{{number_format((float)Cart::total() + floatval("3.5"), 2, '.', ' ')}} €");

                } else if (selectedValue == 2) {
                    $("#selected").text("4.50 €");
                    $("#selected2").text("{{number_format((float)Cart::total() + floatval("4.5"), 2, '.', ' ')}} €");

                } else if (selectedValue == 3) {
                    $("#selected").text("5.50 €");
                    $("#selected2").text("{{number_format((float)Cart::total() + floatval("5.5"), 2, '.', ' ')}} €");

                }
            });

        });

    </script>
@endsection
