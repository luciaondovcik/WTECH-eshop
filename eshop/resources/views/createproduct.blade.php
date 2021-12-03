@extends('adminlayout')

@section('admin-main')
    <section class="container-fluid">
        <div class="container">
            <div class="bg-light p-5 my-sm-5">
                <h2 class="mb-5">Pridaj produkt</h2>
                <form action="/admin/product/store" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="name" class="text-black">Názov produktu <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="slug" class="text-black">Slug <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                            @error('slug')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="brand" class="text-black">Výrobca <span class="text-danger">*</span></label>
                            <select class="form-control" id="brand" name="brand">
                                @php
                                    $brands = \App\Models\Brand::all();
                                @endphp
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}" {{ old('brand') === $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                @endforeach
                            </select>
                            @error('brand')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="category" class="text-black">Kategória <span class="text-danger">*</span></label>
                            <select class="form-control" id="category" name="category" value="{{ old('category') }}">
                                @php
                                    $categories = \App\Models\Category::all();
                                @endphp
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category') === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="color" class="text-black">Farba <span class="text-danger">*</span></label>
                            <select class="form-control" id="color" name="color" value="{{ old('color') }}">
                                @php
                                    $colors = collect(['čierna', 'biela', 'červená', 'oranžová', 'žltá', 'zelená', 'modrá', 'fialová', 'béžová', 'ružová']);
                                @endphp
                                @foreach($colors as $color)
                                    <option value="{{ $color }}" {{ old('color') === $color ? 'selected' : '' }}>{{ $color }}</option>
                                @endforeach
                            </select>
                            @error('color')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label for="price" class="text-black">Cena <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
                            @error('price')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="discount" class="text-black">Zľava <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="discount" name="discount" value="{{ old('discount') }}">
                            @error('discount')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <label for="description" class="text-black">Popis produktu <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                            @error('description')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <div class="col-12">
                            <label for="images" class="text-black">Vyber obrázky (max 5)</label>
                            <input type="file" class="form-control-file" id="images" name="productPictures[]" multiple>
                            @error('productPictures')
                            <small class="text-danger text-xs mt-1">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary px-5 waves-effect waves-light">Pridaj</button>
                </form>
            </div>
        </div>
    </section>

@endsection
