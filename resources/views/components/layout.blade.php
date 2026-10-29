
<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Produkti' }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="holy-grail">

        <header class="header">
            <h1>Produktu katalogs</h1>

            <nav aria-label="Galvenā navigācija">
                <a href="{{ route('products.index') }}">Produkti</a>
                <a href="{{ route('products.create') }}">Pievienot produktu</a>
            </nav>
        </header>

        <aside class="sidebar sidebar-left">
            <h2>Kategorijas</h2>
            <ul>
                <li><a href="{{ route('products.index') }}">Visi produkti</a></li>
                <li>Elektronika</li>
                <li>Apģērbi</li>
                <li>Aksesuāri</li>
            </ul>
        </aside>

        <main class="main-content">
            @if (session('success'))
                <p class="success">{{ session('success') }}</p>
            @endif

            {{ $slot }}
        </main>

        <aside class="sidebar sidebar-right">
            <h2>Informācija</h2>
            <p>Laipni lūdzam produktu katalogā!</p>
            <p>Šeit vari apskatīt, pievienot, labot un dzēst produktus.</p>
        </aside>

        <footer class="footer">
            <p>&copy; {{ date('Y') }} Produktu katalogs</p>
        </footer>

    </div>
</body>
</html>
