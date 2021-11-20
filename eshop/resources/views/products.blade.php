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
                    <p class="my-auto">1-12 z 68</p>
                    <div class="dropdown mr-1 ml-md-auto d-flex justify-content-end">
                        <p class=" my-auto mr-2">Zoradiť podľa:</p>
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Obľúbené
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="#">Názov - A až Z</a>
                            <a class="dropdown-item" href="#">Názov - Z až A</a>
                            <a class="dropdown-item" href="#">Cena - vzostupne</a>
                            <a class="dropdown-item" href="#">Cena - zostupne</a>
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
                                        <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$product->price, 2, '.', ' ') }} €</p>
                                        <p class="mb-0">{{ $product->availability }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row" data-aos="fade-up">
                        <div class="col-md-12 text-center">
                            <div class="site-block-27">
                                <ul>
                                    <li><a href="#">&lt;</a></li>
                                    <li class="active"><span>1</span></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">&gt;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 order-1 mb-5 mb-md-0">
                    <div class="border p-4 rounded mb-4">
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Značka</h3>
                            <label for="m_yamaha" class="d-flex">
                                <input type="checkbox" id="m_yamaha" class="mr-2 mt-1"> <span class="text-black">Yamaha</span>
                            </label>
                            <label for="m_sencor" class="d-flex">
                                <input type="checkbox" id="m_sencor" class="mr-2 mt-1"> <span class="text-black">Sencor</span>
                            </label>
                            <label for="m_gibson" class="d-flex">
                                <input type="checkbox" id="m_gibson" class="mr-2 mt-1"> <span class="text-black">Gibson</span>
                            </label>
                        </div>
                        <div class="mb-4" >
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Farba</h3>
                            <a href="#" class="d-flex color-item align-items-center" >
                                <input type="checkbox" id="c_r" class="mr-2 mt-1"> <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Červená (35)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center" >
                                <input type="checkbox" id="c_g" class="mr-2 mt-1"> <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Zelená (22)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center" >
                                <input type="checkbox" id="c_b" class="mr-2 mt-1"> <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Modrá (8)</span>
                            </a>
                            <a href="#" class="d-flex color-item align-items-center" >
                                <input type="checkbox" id="c_p" class="mr-2 mt-1"> <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Fialová (3)</span>
                            </a>
                        </div>
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Dostupnosť</h3>
                            <label for="a_a" class="d-flex">
                                <input type="checkbox" id="a_a" class="mr-2 mt-1"> <span class="text-black">Na sklade</span>
                            </label>
                            <label for="a_o" class="d-flex">
                                <input type="checkbox" id="a_o" class="mr-2 mt-1"> <span class="text-black">Na objednávku</span>
                            </label>
                            <label for="a_na" class="d-flex">
                                <input type="checkbox" id="a_na" class="mr-2 mt-1"> <span class="text-black">Nedostupné</span>
                            </label>
                        </div>
                        <div class="mb-4">
                            <h3 class="mb-3 h6 text-uppercase text-black d-block">Cena</h3>
                            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white center" disabled="" />
                            <div id="slider-range" class="border-primary"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
