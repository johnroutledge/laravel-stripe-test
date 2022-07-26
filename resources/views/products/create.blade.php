@extends('layouts.app')

@section('content')
    <h2>ADD  PRODUCT</h2>
    <form id="edit-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
{{--        @method('POST')--}}
        <input type="text" id="name-input" placeholder="Name" name="name">
        <input type="text" id="price-input" placeholder="Price" name="price">
        <button type="submit" class="btn btn-save" title="save">Save</button>
        <button type="submit" class="btn btn-cancel" title="back">
            <a id="edit-cancel" href="{{ route('products.index') }}"></a>
            Cancel
        </button>
    </form>


@endsection
