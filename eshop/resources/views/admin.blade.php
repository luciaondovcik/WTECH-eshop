@extends('adminlayout')

@section('admin-main')
    <div class="container-fluid">
        <div class="container my-3 p-5 bg-light d-flex justify-content-between">
            <h4>Chceš pridať nový produkt?</h4>
            <button type="button" class="btn btn-primary"><a class="text-white" href="admin/product/create">Pridaj produkt</a></button>
        </div>
        <div class="container mt-5">
            <h2>Produkty</h2>
        </div>
        <div class="container mt-3 mb-5">
            <table class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th scope="col">Názov</th>
                    <th scope="col">Kategória</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <th>{{ $product->name }}</th>
                        <td>{{ $product->categories->name }}</td>
                        <td class="text-right">
                            <button type="button" class="btn btn-success"><a class="text-white" href="{{ route('product.edit', ['id'=>$product->id])}}"><span class="icon icon-edit"></span></a></button>
                            <button type="button" class="btn btn-danger"><a class="text-white" href="{{ route('product.delete', ['id'=>$product->id])}}"><span class="icon icon-delete"></span></a></button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
