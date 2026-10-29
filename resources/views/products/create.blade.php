
@extends('layouts.app')

@section('content')
    <h1>Jauns produkts</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @include('products.form')
    </form>
@endsection
