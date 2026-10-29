
<x-layout>
    <x-slot:title>Labot produktu</x-slot:title>

    <h1>Labot produktu</h1>

    <form action="{{ route('products.update', $product) }}" method="POST">
        @method('PUT')
        @include('products.form')
    </form>
</x-layout>
