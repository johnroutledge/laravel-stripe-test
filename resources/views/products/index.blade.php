@extends('layouts.app')

@section('content')
    <div id="title">
        <h2>PRODUCTS</h2>
    </div>
    <br>

    <div>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>£{{ $product->price }}</td>
                        <td><button class="btn btn-success"><a id="edit-cancel" href="{{ route('getCheckoutSession', ['name' => $product->name, 'price' => $product->price]) }}">Checkout</a></button></td>
                        <td><button class="btn btn-secondary"><a id="edit-cancel" href="{{ route('orders.show', $product->id) }}">Orders</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

    <br>
    <button class="btn btn-primary">
        <a href="{{ route('products.create') }}" id="create" title="add product">Add Product</a>
    </button>

@endsection
