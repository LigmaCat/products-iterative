
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

    <hr>

    <h2>Noliktavas daudzuma pārvaldība</h2>

    {{-- Increase quantity --}}
    <form action="{{ route('products.increase', $product) }}" method="POST">
        @csrf

        <label for="increase-amount">Pievedums (palielināt daudzumu):</label>

        <input
            type="number"
            name="amount"
            id="increase-amount"
            min="1"
            value="1"
            required
        >

        <button type="submit">+ Palielināt</button>
    </form>

    {{-- Decrease quantity --}}
    <form action="{{ route('products.decrease', $product) }}" method="POST">
        @csrf

        <label for="decrease-amount">Izpirkšana (samazināt daudzumu):</label>

        <input
            type="number"
            name="amount"
            id="decrease-amount"
            min="1"
            value="1"
            required
        >

        <button type="submit">- Samazināt</button>
    </form>

    <hr>

    <a href="{{ route('products.edit', $product) }}">Labot</a>

    <a href="{{ route('products.index') }}">Atpakaļ uz sarakstu</a>
</x-layout>
