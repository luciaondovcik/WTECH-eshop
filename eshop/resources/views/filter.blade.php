@extends('layout')

@section('main-content')
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0"><a href="/">Domov</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Filter</strong></div>
            </div>
        </div>
    </div>
    <div class="container pt-3">
        <h4>Výsledok vyhľadávania</h4>
        <p>Našli sme {{ $products->count() }} produkt(y/ov). <small>(Prepáč, nemám náladu to ošetrovať.)</small></p>
    </div>
    <div class="container mb-5">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th scope="col">Názov</th>
                    <th scope="col">Kategória</th>
                    <th scope="col">Cena</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th><a href="/{{ $product->categories->slug }}/{{$product->slug}}">{{ $product->name }}</a></th>
                        <td>{{ $product->categories->name }}</td>
                        <td>{{ $product->price }}€</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
