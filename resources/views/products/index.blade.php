@extends('layouts.app')

@section('content')
    <h1>Produkti</h1>

    <a href="{{ route('products.create') }}">Pievienot produktu</a>

    @forelse ($products as $product)
        <article>
            <h2>{{ $product->name }}</h2>
            <p>{{ $product->price }} €</p>

            <a href="{{ route('products.show', $product) }}">Apskatīt</a>
            <a href="{{ route('products.edit', $product) }}">Labot</a>

            <form action="{{ route('products.destroy', $product) }}"
                  method="POST"
                  onsubmit="return confirm('Vai tiešām dzēst produktu?')">
                @csrf
                @method('DELETE')
                <button type="submit">Dzēst</button>
            </form>
        </article>
    @empty
        <p>Vēl nav pievienots neviens produkts.</p>
    @endforelse
@endsection
