
<x-layout>
    <x-slot:title>Jauns produkts</x-slot:title>

    <h1>Jauns produkts</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @include('products.form')
    </form>
</x-layout>
