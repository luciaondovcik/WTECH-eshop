@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <a href="/cart">Košík</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Dodacie údaje</strong></div>
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
                            <p class="my-2 text-center text-black"><strong>Dodacie údaje</strong></p>
                        </div>
                        <div class="col-4">
                            <p class="my-2 text-center">Doprava a platba</p>
                        </div>
                    </div>
                    <form action="{{ route('checkout.store') }}" method="POST">
                        {{csrf_field()}}
                    <div class="p-3 p-lg-4 border">
                        <h2 class="h3 mb-3 text-black">KONTAKTNÉ ÚDAJE</h2>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">Meno <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Priezvisko <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-6">
                                <label for="c_email_address" class="text-black">E-mail <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_email_address" name="c_email_address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_phone" class="text-black">Tel. číslo <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_phone" name="c_phone" required>
                            </div>
                        </div>
                        <h2 class="h3 mb-3 text-black">ADRESA DORUČENIA</h2>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_address" class="text-black">Ulica a číslo domu <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_address" name="c_address" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_postal_zip" class="text-black">PSČ <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_postal_zip" name="c_postal_zip" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="c_state_city" class="text-black">Mesto <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_state_city" name="c_state_city" required>
                            </div>
                            <div class="col-md-6">
                                <label for="c_state_country" class="text-black">Krajina <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_state_country" name="c_state_country" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="c_create_account" class="text-black" data-toggle="collapse" href="#create_an_account" role="button" aria-expanded="false" aria-controls="create_an_account"><input type="checkbox" value="1" id="c_create_account" name="c_create_account"> Vytvoriť účet?</label>
                            <div class="collapse" id="create_an_account">
                                <div class="py-2">
                                    <p class="mb-3">Vytvorte si účet vypísaním informácií nižšie. E-mail zoberieme automaticky z objednávky. Ak už účet máte, prosím prihláste sa pomocou tlačítka na hornej časti stránky.</p>
                                    <div class="form-group">
                                        <label for="c_account_password" class="text-black">Heslo</label>
                                        <input type="password" class="form-control" id="c_account_password" name="c_account_password" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="c_ship_different_address" class="text-black" data-toggle="collapse" href="#ship_different_address" role="button" aria-expanded="false" aria-controls="ship_different_address"><input type="checkbox" value="1" id="c_ship_different_address"> Nákup na firmu</label>
                            <div class="collapse" id="ship_different_address">
                                <div class="py-2">
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_diff_fname" class="text-black">Meno <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_fname" name="c_diff_fname">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_lname" class="text-black">Priezvisko <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_lname" name="c_diff_lname">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_diff_email_address" class="text-black">E-mail <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_email_address" name="c_diff_email_address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_phone" class="text-black">Tel. číslo <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_phone" name="c_diff_phone" placeholder="Phone Number">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-12">
                                            <label for="c_diff_companyname" class="text-black">Názov firmy </label>
                                            <input type="text" class="form-control" id="c_diff_companyname" name="c_diff_companyname">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="c_diff_address" class="text-black">Ulica a číslo domu <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_address" name="c_diff_address">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_postal_zip" class="text-black">PSČ <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_postal_zip" name="c_diff_postal_zip">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-5">
                                        <div class="col-md-6">
                                            <label for="c_diff_state_city" class="text-black">Mesto <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_state_city" name="c_diff_state_city">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="c_diff_state_country" class="text-black">Krajina <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="c_diff_state_country" name="c_diff_state_country">
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="form-group row bg-light p-3 mx-auto">
                            <label class="text-black"><input type="checkbox" required><strong> Oboznámil som sa s obchodnými podmienkami e-shopu HrajMi.sk a súhlasím s nimi. <span class="text-danger">*</span></strong></label>
                            <p class="small">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque ut dapibus risus. Aenean in scelerisque purus. Nullam tincidunt enim quis enim pharetra, molestie aliquam turpis luctus. Aliquam quis tempor leo. Etiam congue porttitor sagittis. Suspendisse eget tempor arcu. Aenean lacinia lobortis quam vitae scelerisque. Suspendisse ac massa blandit, tincidunt orci ac, laoreet est. Nam metus elit, mollis non velit fringilla, pharetra venenatis felis.</p>
                        </div>

                    </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Pokračuj</button>
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
                                    <span>{{Cart::total()}} €</span>
                                </li>
{{--                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">--}}
{{--                                    Doprava:--}}
{{--                                    <span>Vyberte</span>--}}
{{--                                </li>--}}
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    Zľavový kupón:
                                    <span>0 €</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top px-0 mb-3">
                                    <div>
                                        <strong>Spolu:</strong>
                                    </div>
                                    <span><strong>{{Cart::total()}} €</strong></span>
                                </li>
                            </ul>
{{--                            <a href="{{route('payment.index')}}"  class="btn btn-primary btn-block waves-effect waves-light"><strong>Pokračuj</strong></a>--}}
                            <button type="button" class="btn btn-block" onclick="window.location.href='cart';">Krok späť</button>
                        </div>
                    </div>
                    <!-- Card -->
                </div>
                <!-- </form> -->
            </div>
            <div class="row">
                <div class="col">
{{--                    <button type="button" class="btn back-shop" onclick="window.location.href='shop';">Späť k nákupu</button>--}}
                    <a href="javascript:history.back(); history.back(); history.back()" class="btn back-shop">Späť k nákupu</a>
                </div>
            </div>
        </div>
    </section>
@endsection
