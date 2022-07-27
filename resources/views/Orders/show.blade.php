@extends('layouts.app')

@section('content')
    <div id="title">
        <h2>{{ $name }} Orders</h2>
    </div>
    <br>

    <div>
        @if (count($orders))
            <table>
                <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Stripe ID</th>
                    <th>Total</th>
                    <th>Order Date</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->product_id }}</td>
                        <td>{{ $order->stripe_id }}</td>
                        <td>£{{ $order->total }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <p>No orders yet</p>
        @endif
    </div>

@endsection
