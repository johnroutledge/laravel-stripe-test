@extends('layouts.app')

@section('content')
    <h2>PAYMENT SUCCESS!</h2>
    <div>Dear {{ $customerDetails->name }}</div>
    <div>Many thanks for your purchase. A confirmation email has been sent to {{ $customerDetails->email }}</div>
    <button type="submit" class="btn btn-primary" title="back">
        <a id="edit-cancel" href="{{ route('products.index') }}"></a>
        Back to Products
    </button>
@endsection
