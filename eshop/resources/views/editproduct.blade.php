@extends('adminlayout')

@section('admin-main')
    <section class="container-fluid">
        <div class="container">
            <div class="bg-light p-5 my-sm-5">
                <h2 class="mb-5">Uprav produkt</h2>
                <form id="Form1" action="{{ route('product.update', ['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="text-black">Názov produktu</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" form="Form1">
                            @error('name')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="slug" class="text-black">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}" form="Form1">
                            @error('slug')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="brand" class="text-black">Výrobca</label>
                            <select class="form-control" id="brand" name="brand">
                                @php
                                    $brands = \App\Models\Brand::all();
                                @endphp
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ $product->brands->name === $brand->name ? 'selected' : '' }} form="Form1">
                                        {{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="category" class="text-black">Kategória</label>
                            <select class="form-control" id="category" name="category" form="Form1">
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->categories->name === $category->name ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="text-black">Farba</label>
                            <select class="form-control" id="color" name="color" form="Form1">
                                @php
                                    $colors = collect(['čierna', 'biela', 'červená', 'oranžová', 'žltá', 'zelená', 'modrá', 'fialová', 'béžová', 'ružová']);
                                @endphp
                                @foreach($colors as $color)
                                    <option value="{{ $color }}" {{ $product->$color === $color ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                            @error('color')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="price" class="text-black">Cena</label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}" form="Form1">
                            @error('price')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="discount" class="text-black">Zľava</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="{{ $product->discount }}" form="Form1">
                            @error('discount')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="availability" class="text-black">Dostupnosť</label>
                            <select class="form-control" id="availability" name="availability" form="Form1">
                                @php
                                    $availability = collect(['dostupné', 'nedostupné']);
                                @endphp
                                @foreach($availability as $avail)
                                    <option value="{{ $avail }}" {{ $product->availability === $avail ? 'selected' : '' }}>{{ $avail }}</option>
                                @endforeach
                            </select>
                            @error('availability')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="description" class="text-black">Popis produktu</label>
                            <textarea class="form-control" id="description" name="description" rows="5" form="Form1">{{ $product->description }}</textarea>
                            @error('description')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <div class="container-fluid mb-5 d-flex">
                            @foreach($product->images as $key=>$img)
                                <div class="mx-2">
                                    <div class="d-flex justify-content-end">
                                        <a href="{{ route('product.deleteImg', ['id'=>$product->id, 'key'=>$key]) }}" class="btn text-danger"><strong><span aria-hidden="true">&times;</span></strong></a>
                                    </div>
                                    <img class="img-fluid" src="{{ asset('/images/products/'.$img) }}">
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12">
                            <label for="images" class="text-black">Vyber obrázky (max <span>@php echo 5-count($product->images); @endphp</span>)<small class="text-muted"> lebo akoze dokopy 5</small></label>
                            <input type="file" class="form-control-file" id="images" name="productPictures[]" multiple form="Form1">
                            @error('productPictures')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-md-5 waves-effect waves-light" form="Form1">Uložiť zmeny</button>
                </form>
            </div>
        </div>
    </section>

    <script>
        $(function() {
            // Multiple images preview with JavaScript
            var multiImgPreview = function(input, imgPreviewPlaceholder) {
                if (input.files) {
                    var filesAmount = input.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $($.parseHTML('<img>')).attr('src', event.target.result).attr('class', 'img-fluid').appendTo(imgPreviewPlaceholder);
                        }
                        reader.readAsDataURL(input.files[i]);
                    }
                }
            };

            $('#images').on('change', function() {
                multiImgPreview(this, 'div.imgPreview');
            });
        });

        $('#recipeCarousel').carousel({
            interval: false
        })

        $('.carousel .carousel-item').each(function(){
            var minPerSlide = 3;
            var next = $(this).next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));

            for (var i=0;i<minPerSlide;i++) {
                next=next.next();
                if (!next.length) {
                    next = $(this).siblings(':first');
                }

                next.children(':first-child').clone().appendTo($(this));
            }
        });
    </script>
@endsection
