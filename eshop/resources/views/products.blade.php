@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">
                        @if($selected_category == "-1")
                            Zľavy
                        @else
                            {{ $selected_category->name }}
                        @endif
                    </strong></div>
            </div>
        </div>
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row border-bottom border-top mb-4">
                <div class="col-md-12 d-flex justify-content-between my-2">
                    <p class="my-auto">
                        @if($products->count() > 0)
                            {{ $products->firstItem() }}-{{ $products->lastItem() }} z {{ $products->total() }}
                        @else
                            0 produktov
                        @endif
                    </p>

                    <div class="dropdown mr-1 ml-md-auto d-flex justify-content-end">
                        <p class=" my-auto mr-2">Zoradiť podľa:</p>
                        <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ $btnName }}
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            @if($selected_category == "-1")
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>'zlavy','orderBy'=>'name', 'type'=>'asc'])}}">Názov - A až Z</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>'zlavy','orderBy'=>'name', 'type'=>'desc'])}}">Názov - Z až A</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>'zlavy','orderBy'=>'price', 'type'=>'asc'])}}">Cena - vzostupne</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>'zlavy','orderBy'=>'price', 'type'=>'desc'])}}">Cena - zostupne</a>
                            @else
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>$selected_category->slug,'orderBy'=>'name', 'type'=>'asc'])}}">Názov - A až Z</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>$selected_category->slug,'orderBy'=>'name', 'type'=>'desc'])}}">Názov - Z až A</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>$selected_category->slug,'orderBy'=>'price', 'type'=>'asc'])}}">Cena - vzostupne</a>
                                <a class="dropdown-item" href="{{ route('products.index', ['category'=>$selected_category->slug,'orderBy'=>'price', 'type'=>'desc'])}}">Cena - zostupne</a>
                            @endif
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
                                        @if($product->discount > 0)
                                        <span class="text-danger mb-0 font-weight-bold" >{{ number_format((float)$product->price * (100-($product->discount))/100, 2, '.', ' ') }} €</span>
                                        <span class="text-primary mb-0 font-weight-bold" ><s>{{ number_format((float)$product->price, 2, '.', ' ') }} €</s></span>

                                        @else
                                            <p class="text-primary mb-0 font-weight-bold" >{{ number_format((float)$product->price, 2, '.', ' ') }} €</p>
@endif
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
                            @if($selected_category == "-1")
                                <form action="Zľavy" method="GET" id="filter-form">
                            @else
                                <form action="{{ $selected_category->slug }}" method="GET" id="filter-form">
                            @endif
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Značka</h3>
                                @foreach($brands as $brand)
                                    <label for="{{ $brand->name }}" class="d-flex">
                                        <input type="checkbox" name="filterBrand[]" value="{{ $brand->id }}"
                                               @if($request->filterBrand){{(in_array($brand->id,$request->filterBrand)?"checked":"")}}@endif
                                               class="mr-2 mt-1"> <span class="text-black">{{ $brand->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mb-4" >
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Farba</h3>
                                @foreach($colors as $color)
                                    <label for="{{ $color }}" class="d-flex">
                                        <input type="checkbox" name="filterColor[]" value="{{ $color }}"
                                               @if($request->filterColor){{(in_array($color,$request->filterColor)?"checked":"")}}@endif
                                               class="mr-2 mt-1"><span class="text-black">{{ $color }}</span>
                                    </label>
                                @endforeach
                            </div>
                            <div class="mb-4">
                                <h3 class="mb-3 h6 text-uppercase text-black d-block">Dostupnosť</h3>
                                <label for="Dostupne" class="d-flex">
                                    <input type="checkbox" name="filterAvailability[]" value="dostupné"
                                           @if($request->filterAvailability){{(in_array("dostupné",$request->filterAvailability)?"checked":"")}}@endif
                                           class="mr-2 mt-1"> <span class="text-black">Dostupné</span>
                                </label>
                                <label for="Nedostupne" class="d-flex">
                                    <input type="checkbox" name="filterAvailability[]" value="nedostupné"
                                           @if($request->filterAvailability){{(in_array("nedostupné",$request->filterAvailability)?"checked":"")}}@endif
                                           class="mr-2 mt-1"> <span class="text-black">Nedostupné</span>
                                </label>
                            </div>
                            <div class="mb-5">
                                <h3 class="mb-2 h6 text-uppercase text-black d-block">Cena <small class="text-secondary">(V €)</small></h3>
                                <div class="d-flex justify-content-center align-items-center">
                                    <input type="text" name="minval" id="minval" value="{{ $priceMin }}" class="form-control border-0 px-0 bg-white text-left" />
                                    <input type="text" name="maxval" id="maxval" value="{{ $priceMax }}" class="form-control border-0 px-0 bg-white text-right" />
                                </div>
                                <div id="slider-range" class="border-primary"></div>
                            </div>
                            <div class="mt-5 mb-4">
                                <button type="submit" class="btn btn-primary btn-block"><strong>Filtruj</strong></button>
                                <button type="submit" onclick="clearForm();" class="btn btn-secondary btn-block">Zrušiť filter</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function clearForm() {
            var brand = document.getElementsByName("filterBrand[]");
            for(var i in brand){
                brand[i].checked = '';
            }
            var color = document.getElementsByName("filterColor[]");
            for(var i in color){
                color[i].checked = '';
            }
            var availability = document.getElementsByName("filterAvailability[]");
            for(var i in availability){
                availability[i].checked = '';
            }

            $( "#minval" ).val(0);
            $("#maxval").val(1000);
        }
    </script>
@endsection


