@extends('layouts.app')

@section('content')
    <div class="container">
        <br>
        <h2>PAYMENT SUCCESS</h2>
        <br>
        <div>Dear {{ $customerDetails->name }}</div>
        <br>
        <div>Many thanks for your purchase. A confirmation email has been sent to {{ $customerDetails->email }}</div>
        <br>
        <div class="row">
            <div class="col-12 col-lg-7">
                <div class="order-confirmation-wrapper p-2 border">
                    <div class="row">
                        <div class="col">
                            <small class="text-muted">Order Info:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <p class="mb-0 text-black font-weight-bold">Order Number</p>
                        </div>
                        <div class="col-12 col-md-8 text-md-right">
                            <p class="mb-0">{{ $order->stripe_id }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <p class="mb-0 text-black font-weight-bold">Order Date</p>
                        </div>
                        <div class="col-12 col-md-8 text-md-right">
                            <p class="mb-0">{{ $order->created_at  }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <small class="text-muted">Order Details:</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-4">
                            <p class="small mb-0 text-black font-weight-bold">
                                {{ $order->product->name }}
                            </p>
                        </div>
                        <div class="col-12 col-md-8 text-md-right">
                            <p class="small mb-0">£{{ $order->total}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary" title="back">
            <a id="edit-cancel" href="{{ route('products.index') }}">Back to Products</a>
        </button>
    </div>
@endsection
