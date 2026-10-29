
@extends('layouts.app')

@section('content')
    <h1>Labot produktu</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @method('PUT')
        @include('products.form')
    </form>
@endsection
