@extends('layout')

@section('main-content')
    <section class="container-fluid p-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ul>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/slideshow/slideshow1.jpg" class="d-block w-100" alt="škriatkovia">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slideshow2.jpg" class="d-block w-100" alt="vinohrad">
                </div>
                <div class="carousel-item">
                    <img src="images/slideshow/slideshow3.jpg" class="d-block w-100" alt="Šikulov dom">
                </div>
            </div>
            <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="site-section site-blocks-2 py-5">
        <div class="container splitscreen">
            <div class="row">
                <div class="col-md-6 col-lg-6 my-section">
                    <div class="col-md-12 site-section-heading text-center pb-3">
                        <h2>Novinky</h2>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="row">
                            @for ($i = 0; $i < 2; $i++)
                                <div class ="col-md-6 ">
                                    <div class="item">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}"><img src="{{ asset('images/'.$products[$i]->categories->slug.'/'.$products[$i]->id.'-1.jpg') }}" alt="{{$products[$i]->slug}}" class="img-fluid"></a>
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3><a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}">{{ $products[$i]->name }}</a></h3>
                                                @if($products[$i]->discount > 0)
                                                    <span class="text-danger mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price * (100-($products[$i]->discount))/100, 2, '.', ' ') }} €</span>
                                                    <span class="text-primary mb-0 font-weight-bold" ><s>{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</s></span>

                                                @else
                                                    <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</p>
                                                @endif                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="row">
                            @for ($i = 2; $i < 4; $i++)
                                <div class ="col-md-6 ">
                                    <div class="item">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}"><img src="{{ asset('images/'.$products[$i]->categories->slug.'/'.$products[$i]->id.'-1.jpg') }}" alt="{{$products[$i]->slug}}" class="img-fluid"></a>
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3><a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}">{{ $products[$i]->name }}</a></h3>
                                                @if($products[$i]->discount > 0)
                                                    <span class="text-danger mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price * (100-($products[$i]->discount))/100, 2, '.', ' ') }} €</span>
                                                    <span class="text-primary mb-0 font-weight-bold" ><s>{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</s></span>

                                                @else
                                                    <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</p>
                                                @endif                                             </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="col-md-12 site-section-heading text-center pb-3">
                        <h2>Najkupovanejšie</h2>
                    </div>
                    <div class="col-md-6 col-lg-12">
                        <div class="row">
                            @for ($i = 4; $i < 6; $i++)
                                <div class ="col-md-6 ">
                                    <div class="item">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}"><img src="{{ asset('images/'.$products[$i]->categories->slug.'/'.$products[$i]->id.'-1.jpg') }}" alt="{{$products[$i]->slug}}" class="img-fluid"></a>
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3><a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}">{{ $products[$i]->name }}</a></h3>
                                                @if($products[$i]->discount > 0)
                                                    <span class="text-danger mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price * (100-($products[$i]->discount))/100, 2, '.', ' ') }} €</span>
                                                    <span class="text-primary mb-0 font-weight-bold" ><s>{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</s></span>

                                                @else
                                                    <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</p>
                                                @endif                                             </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                        <div class="row">
                            @for ($i = 6; $i < 8; $i++)
                                <div class ="col-md-6 ">
                                    <div class="item">
                                        <div class="block-4 text-center">
                                            <figure class="block-4-image">
                                                <a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}"><img src="{{ asset('images/'.$products[$i]->categories->slug.'/'.$products[$i]->id.'-1.jpg') }}" alt="{{$products[$i]->slug}}" class="img-fluid"></a>
                                            </figure>
                                            <div class="block-4-text p-4">
                                                <h3><a href="/{{ $products[$i]->categories->slug }}/{{$products[$i]->slug}}">{{ $products[$i]->name }}</a></h3>
                                                @if($products[$i]->discount > 0)
                                                    <span class="text-danger mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price * (100-($products[$i]->discount))/100, 2, '.', ' ') }} €</span>
                                                    <span class="text-primary mb-0 font-weight-bold" ><s>{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</s></span>

                                                @else
                                                    <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$products[$i]->price, 2, '.', ' ') }} €</p>
                                                @endif                                             </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section block-3 site-blocks-2 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 site-section-heading text-center pb-3">
                    <h2>Obľúbené kategórie</h2>
                </div>
            </div>
            <div class="row">
                @foreach($favouriteCategories as $favCat)
                    <div class="col-md-6 col-lg-3">
                        <div class="block-4 text-center">
                            <figure class="block-4-image mb-0">
                                <a href="/{{ "$favCat->slug" }}"><img src={{ asset('images/kategorie/kat'.$favCat->id.'.jpg') }} alt="{{ $favCat->slug }}" class="img-fluid"></a>
                            </figure>
                            <div class="block-4-text p-4">
                                <h3><a href="/{{ "$favCat->slug" }}">{{ $favCat->name }}</a></h3>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection

