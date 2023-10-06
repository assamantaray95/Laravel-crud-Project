@extends('layout.app')
@section('main')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <h3 class="text-center">PRODUCTS LIST</h3>
            </div>
            <div class="col-md-4">
                <div class="text-end">
                    <a href="/products/create" class="btn btn-outline-primary">ADD PRODUCTS</a>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Seriel No.</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>
                        <img src="products/{{ $product->image }}" class="rounded-circle" width="50" height="50">
                    </td>
                    <td>
                        <a href="products/edit/{{ $product->id }}" class="btn btn-sm btn-primary">Edit</a>
                        <!-- <a href="products/delete/{{ $product->id }}" class="btn btn-sm btn-danger">Delete</a> -->
                        <form method="POST" class="d-inline" action="products/delete/{{ $product->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection