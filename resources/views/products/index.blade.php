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
                        <td><button><a id="edit-cancel" href="{{ route('getCheckoutSession', ['name' => $product->name, 'price' => $product->price]) }}">Checkout</a></button></td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>

    <br>
    <a href="{{ route('products.create') }}" id="create" title="add product">Add Product</a>

{{--    <div id="app">--}}

{{--        <example-component></example-component>--}}

{{--        <checkout-component></checkout-component>--}}

{{--    </div>--}}

{{--    <div id="app">--}}
{{--        <template>--}}
{{--            <checkout-component></checkout-component>--}}

{{--        </template>--}}
{{--    </div>--}}

    <template>
        <stripe-checkout></stripe-checkout>
    </template>

    <script type="module">
        import { StripeCheckout } from '@vue-stripe/vue-stripe';
        export default {
            components: {
                StripeCheckout,
            },
        };
    </script>

{{--    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.4/dist/vue.js"></script>--}}

@endsection
