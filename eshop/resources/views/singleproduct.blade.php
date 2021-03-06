@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span><a href="/{{ $product->categories->slug }}">{{ $product->categories->name }}</a><span class="mx-2 mb-0">/</span><strong class="text-black">{{ $product->name }}</strong></div>
            </div>
        </div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div id="carouselIndicators" class="carousel slide" data-ride="carousel" data-interval="false">
                        <div class="carousel-inner">
                            @foreach($product->images as $key=>$image)
                            <div class="carousel-item @php if($key == 0){echo "active";} @endphp ">
                                <img src="{{ asset('images/products/'.$image) }}" class="d-block w-100">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <ol class="carousel-indicators single-product-carousel mt-3">
                        @foreach($product->images as $image)
                        <li data-target="#carouselIndicators" data-slide-to="0" class="active">
                            <img src="{{ asset('images/products/'.$image) }}" class="d-block w-100">
                        </li>
                        @endforeach
                    </ol>
                </div>

                <div class="col-md-6">
                    <h2 class="text-black mt-5 mt-md-0">{{ $product->name }}</h2>
                    <p>{{ $product->description }}</p>
                    <div style="display: flex; justify-content: space-between;">
                        <p><strong class="text-primary h4">Cena s DPH</strong></p>
                        <p><strong class="text-primary h4">{{ number_format((float)$product->price, 2, '.', ' ') }} ???</strong></p>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <p><strong class="text-primary h6">Cena bez DPH</strong></p>
                        <p><strong class="text-primary h6">{{ number_format((float)$product->price/1.2, 2, '.', ' ') }} ???</strong></p>
                    </div>

                    @if($product->discount > 0)
                        <div style="display: flex; justify-content: space-between;">
                            <p><strong class="text-danger h4">Po z??ave ({{ ($product->discount) }} %)</strong></p>
                            <p><strong class="text-danger h4">{{ number_format((float)$product->price * (100-($product->discount))/100, 2, '.', ' ') }} ???
                                </strong></p>
                        </div>
                    @endif

                    <div>
                        <p class="text-success small">{{ $product->availability }}</p>
                    </div>



                        <form action="{{route('cart.store')}}" method="POST">
                            {{csrf_field()}}
                            <div style="display: flex; justify-content: space-between; max-height: 40px">
                                <p><strong class="text-primary h6" style="vertical-align: bottom">Po??et kusov:</strong></p>
                                <div class="mb-5">
                                    <div class="input-group mb-3" style="max-width: 300px;">
                                        <div class="input-group-prepend">
                                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                        </div>
                                        <div style="max-width: 75px;">
                                            <input type="text" name="qty" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                        </div>

                                        <div class="input-group-append">
                                            <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                        </div>
                                    </div>
                                </div>


                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <input type="hidden" name="name" value="{{ $product->name }}">
                            <input type="hidden" name="pslug" value="{{ $product->slug }}">
                            <input type="hidden" name="cslug" value="{{ $product->categories->slug }}">
                            <input type="hidden" name="price" value="{{ $product->price * (100-($product->discount))/100}}">
                            <input type="hidden" name="image" value="{{ $product->images[0] }}">
                            <button type="submit" class="buy-now btn btn-sm btn-primary">K??pi??</button>

                            </div>

                        </form>


                </div>
            </div>

            <div class="row mt-5">
                <div class="col-md-12 nav-link-wrap">
                    <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link ftco-animate mr-lg-1 fadeInUp ftco-animated active" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="false">Popis</a>

                        <a class="nav-link ftco-animate mr-lg-1 fadeInUp ftco-animated" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="false">V??robca</a>

                        <a class="nav-link ftco-animate fadeInUp ftco-animated" id="v-pills-3-tab" data-toggle="pill" href="#v-pills-3" role="tab" aria-controls="v-pills-3" aria-selected="true">Recenzie</a>

                    </div>
                </div>
                <div class="col-md-12 tab-wrap">
                    <div class="tab-content bg-light" id="v-pills-tabContent">

                        <div class="tab-pane fade active show" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                            <div class="p-4">
                                <h3 class="mb-4">Popis produktu</h3>
                                <p>{{ $product->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-day-2-tab">
                            <div class="p-4">
                                <h3 class="mb-4">Inform??cie o v??robcovi</h3>
                                <h5 class="mb-4">{{ $product->brands->name }}</h5>
                                <p>{{ $product->brands->description }}</p>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="v-pills-3" role="tabpanel" aria-labelledby="v-pills-day-3-tab">
                            <div class="row p-4">
                                <div class="col-md-7">
                                    @for ($i = 0; $i < 6; $i++)
                                        <div class="review mb-4 pt-3 border-top">
                                            <div class="desc">
                                                <div style="display: flex; justify-content: space-between;">
                                                    <p><strong class="text-primary h4">Adam Troj</strong></p>
                                                    <p><strong class="text-primary h6">28. august 2018</strong></p>
                                                </div>
                                                <p class="star">
                                                    <span>
                                                        <span class="icon icon-star"></span>
                                                        <span class="icon icon-star"></span>
                                                        <span class="icon icon-star"></span>
                                                        <span class="icon icon-star"></span>
                                                        <span class="icon icon-star"></span>
                                                    </span>
                                                </p>
                                                <p>Vynikaj??ci s??zvuk zo str??n, ktor?? ma prekvapili t??m, ??e s?? z recyklovan??ho plastu. Basov?? struny s?? len klasicky obmotan?? jemn??m dr??tom.</p>
                                            </div>
                                        </div>
                                    @endfor
                                </div>
                                <div class="col-md-1"></div>
                                <div class="col-md-4">
                                    <div class="rating-wrap">
                                        <h3 class="mb-4">Hodnotenia</h3>
                                        <p class="star">
                                            <span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                (100%)
                                            </span>
                                            <span>6 Recenzi??</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star_border"></span>
                                                (0%)
                                            </span>
                                            <span>0 Recenzi??</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                (0%)
                                            </span>
                                            <span>0 Recenzi??</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                (0%)
                                            </span>
                                            <span>0 Recenzi??</span>
                                        </p>
                                        <p class="star">
                                            <span>
                                                <span class="icon icon-star"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                <span class="icon icon-star_border"></span>
                                                (0%)
                                            </span>
                                        <span>0 Recenzi??</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
