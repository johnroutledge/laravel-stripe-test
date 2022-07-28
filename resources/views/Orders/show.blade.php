@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <div id="title">
            <h2>{{ $name }} Orders</h2>
        </div>
        <br>

        <div>
            @if (count($orders))
                <table>
                    <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>Stripe ID</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->stripe_id }}</td>
                            <td>£{{ $order->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <p>No orders yet</p>
            @endif
        </div>
        <br>
        <button type="submit" class="btn btn-secondary" title="back">
            <a id="edit-cancel" href="{{ route('products.index') }}">Back</a>
        </button>
    </div>

@endsection
