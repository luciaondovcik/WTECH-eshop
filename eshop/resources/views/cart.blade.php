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

                    @if(Cart::count() > 0)

                    @foreach(Cart::content() as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="view zoom overlay z-depth-1 rounded mb-3 mb-md-0">
                                        <img class="img-fluid w-100" src="images/gitara1.jpg" alt="Sample">
                                        {{--                                            <a href="/{{ $item->options->categories->slug }}/{{$item->slug}}"><img src="{{ asset('images/'.$item->categories->slug.'/'.$item->id.'-1.jpg') }}" alt={{$item->slug}} class="img-fluid w-100"></a>--}}
                                    </div>
                                </div>
                                <div class="col-md-5 d-flex flex-column my-3 my-md-0">
                                    <h5 class="mb-auto cart-item">{{ $item->name }}
                                    <div class="def-number-input number-input safari_only mb-0 w-100 row d-flex align-items-baseline">
                                        <div class="col-md-4 mt-2 mt-md-0">
                                            <p>Počet:</p>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-0" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                        <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input type="text" class="form-control text-center" value="{{$item->qty}}" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1 d-flex flex-column p-md-0 justify-content-end">
                                    <p class="small mb-1 ml-auto">{{ number_format((float)$item->price, 2, '.', ' ') }} €</p>
                                </div>
                                <div class="col-md-3 d-flex cart-final">
                                    <form action="{{route('cart.destroy',$item->rowId)}}" method="POST">
                                        {{csrf_field()}}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="close close-x mb-auto ml-auto mr-0 p-2" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <button type="submit" class="btn btn-sm close close-word" aria-label="Close">
                                            <span aria-hidden="true">Vymazať položku</span>
                                        </button>
                                    </form>
                                    <p class="mb-0 ml-auto mr-0 lead"><strong>{{ number_format((float)$item->price * $item->qty, 2, '.', ' ') }} €</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <h3>Košík je prázdny</h3>

                    @endif

                </div>
                <div class="col-lg-4">
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
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                                    Doprava:
                                    <span>Vyberte</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0">
                                    Zľava:
                                    <span>56ssss2.57 €</span>
                                </li>
                                <li class="list-group-item d-flex justify-content-between align-items-center border-0 border-top px-0 mb-3">
                                    <div>
                                        <strong>Spolu:</strong>
                                    </div>
                                    <span><strong>506sss3.12 €</strong></span>
                                </li>
                            </ul>

                            <a href="{{route('checkout.index')}}"  class="btn btn-primary btn-block waves-effect waves-light"><strong>Pokračuj</strong></a>
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

@section('extra-js')
    <script src="{{asset('js/app.js')}}"></script>
<script>
    (function (){
        const classname = document.querySelectorAll('.form-control text-center')

        Array.from(classname).forEach(function(element)) {
            element.addEventListener('change',function (){
                alert('changed');
            })
        }
    })();
</script>
@endsection
