
@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>

    <p>{{ $product->description }}</p>
    <p>Cena: {{ $product->price }} €</p>

    <a href="{{ route('products.edit', $product) }}">Labot</a>
    <a href="{{ route('products.index') }}">Atpakaļ uz sarakstu</a>
@endsection
