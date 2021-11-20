@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">{{ $products[0]->categories->name }}</strong></div>
            </div>
        </div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row border-bottom border-top mb-4">
                <div class="col-md-12 d-flex justify-content-between my-2">
                    <p class="my-auto">{{ $products->firstItem() }}-{{ $products->lastItem() }} z {{ $products->total() }}</p>
                    <div class="dropdown mr-1 ml-md-auto d-flex justify-content-end">
                        <p class=" my-auto mr-2">Zoradiť podľa:</p>
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $btnName }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="{{ route('products.index', ['category'=>$products[0]->categories->slug,'orderBy'=>'name', 'type'=>'asc'])}}">Názov - A až Z</a>
                            <a class="dropdown-item" href="{{ route('products.index', ['category'=>$products[0]->categories->slug,'orderBy'=>'name', 'type'=>'desc'])}}">Názov - Z až A</a>
                            <a class="dropdown-item" href="{{ route('products.index', ['category'=>$products[0]->categories->slug,'orderBy'=>'price', 'type'=>'asc'])}}">Cena - vzostupne</a>
                            <a class="dropdown-item" href="{{ route('products.index', ['category'=>$products[0]->categories->slug,'orderBy'=>'price', 'type'=>'desc'])}}">Cena - zostupne</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-md-9 order-2">
                    <div class="row mb-5">
                        @foreach($products as $product)
                            <div class="col-6 col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                                <div class="block-4 text-center border">
                                    <figure class="block-4-image">
                                        <a href="/{{ $product->categories->slug }}/{{$product->slug}}"><img src="{{ asset('images/'.$product->categories->slug.'/'.$product->id.'-1.jpg') }}" alt={{$product->slug}} class="img-fluid"></a>
                                    </figure>
                                    <div class="block-4-text p-4">
                                        <h3><a href="/{{ $product->categories->slug }}/{{$product->slug}}">{{ $product->name }}</a></h3>
                                        <p class="text-primary mb-0 font-weight-bold" >{{ $product->price }} €</p>
                                        <p class="mb-0">{{ $product->availability }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <form action="{{ $products[0]->categories->slug }}" method="GET">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Značka</h3>
                                @foreach($brands as $brand)
                                    <label for="{{ $brand->name }}" class="d-flex">
                                        <input type="checkbox" name="filter_brand[]" value="{{ $brand->id }}" class="mr-2 mt-1"> <span class="text-black">{{ $brand->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mb-4" >
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Farba</h3>
                                @foreach($colors as $color)
                                    <label for="{{ $color }}" class="d-flex">
                                        <input type="checkbox" name="filter_color[]" value="{{ $color }}" class="mr-2 mt-1"><span class="text-black">{{ $color }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Dostupnosť</h3>
                                <label for="Dostupne" class="d-flex">
                                    <input type="checkbox" name="filter_availability[]" value="dostupné" class="mr-2 mt-1"> <span class="text-black">Dostupné</span>
                                </label>
                                <label for="Nedostupne" class="d-flex">
                                    <input type="checkbox" name="filter_availability[]" value="nedostupné" class="mr-2 mt-1"> <span class="text-black">Nedostupné</span>
                                </label>
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Cena</h3>
                                <input type="text" name="amount" id="amount" class="form-control border-0 pl-0 bg-white center" disabled="" />
                                <div id="slider-range" class="border-primary"></div>
                            </div>
                            <div class="mt-5 mb-4">
                                <button type="submit" class="btn btn-primary btn-block"><strong>Filtruj</strong></button>
                                <button type="button" class="btn btn-secondary btn-block">Zrušiť filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
