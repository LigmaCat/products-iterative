
<x-layout>
    <x-slot:title>{{ $product->name }}</x-slot:title>

    <h1>{{ $product->name }}</h1>

    <p>Nosaukums: {{ $product->name }}</p>

    <p>Daudzums: {{ $product->quantity }}</p>

    <p>Apraksts: {{ $product->description }}</p>

    <p>Derīguma termiņš: {{ $product->expiration_date ?? 'Nav norādīts' }}</p>

    <p>Statuss:
        {{ $product->status === 'active' ? 'Aktīvs' : 'Neaktīvs' }}
    </p>

    <a href="{{ route('products.edit', $product) }}">Labot</a>

    <a href="{{ route('products.index') }}">Atpakaļ uz sarakstu</a>
</x-layout>
