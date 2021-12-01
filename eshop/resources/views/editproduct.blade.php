@extends('adminlayout')

@section('admin-main')
    <section class="container-fluid">
        <div class="container">
            <div class="bg-light p-5 my-sm-5">
                <h2 class="mb-5">Uprav produkt</h2>
                <form action="{{ route('product.update', ['id'=>$product->id])}}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="text-black">Názov produktu</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}">
                            @error('name')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="slug" class="text-black">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}">
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
                                    <option value="{{ $brand->id }}" {{ $product->brands->name === $brand->name ? 'selected' : '' }}>
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
                            <select class="form-control" id="category" name="category">
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
                            <select class="form-control" id="color" name="color">
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
                            <input type="text" class="form-control" id="price" name="price" value="{{ $product->price }}">
                            @error('price')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="discount" class="text-black">Zľava</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="{{ $product->discount }}">
                            @error('discount')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="availability" class="text-black">Dostupnosť</label>
                            <select class="form-control" id="availability" name="availability">
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
                            <textarea class="form-control" id="description" name="description" rows="5">{{ $product->description }}</textarea>
                            @error('description')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <div class="col-12">
                            <label for="productPictures[]" class="text-black">Vyber obrázky</label>
                            <input type="file" class="form-control-file" id="productPictures[]" name="productPictures[]">
                            @error('checkbox')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-5 waves-effect waves-light">Uložiť zmeny</button>
                </form>
            </div>
        </div>
    </section>
@endsection
