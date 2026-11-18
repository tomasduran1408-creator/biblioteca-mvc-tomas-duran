
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('titulo', 'Biblioteca de Tomas Duran')</title>

    
<style>
    * {
        box-sizing: border-box;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: #f5f2e9;
        color: #34443b;
    }

    header {
        background: #355e4b;
        color: white;
        padding: 30px;
        text-align: center;
    }

    header h1 {
        color: white;
        margin-bottom: 10px;
    }

    nav {
        background: #263f34;
        padding: 16px;
        text-align: center;
    }

    nav a {
        color: #f5f2e9;
        text-decoration: none;
        margin: 0 15px;
        font-weight: bold;
    }

    nav a:hover {
        color: #c5d8b8;
    }

    main {
        max-width: 1100px;
        margin: 30px auto;
        padding: 30px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }

    main h1, main h2 {
        color: #355e4b;
    }

    button, .boton {
        display: inline-block;
        background: #668b70;
        color: white;
        padding: 11px 17px;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        text-decoration: none;
    }

    button:hover, .boton:hover {
        background: #355e4b;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 22px;
    }

    th, td {
        border: 1px solid #e1e5dc;
        padding: 13px;
        text-align: left;
    }

    th {
        background: #355e4b;
        color: white;
    }

    tr:nth-child(even) {
        background: #f5f8f2;
    }

    input, textarea, select {
        width: 100%;
        padding: 11px;
        margin: 8px 0;
        border: 1px solid #cbd5c8;
        border-radius: 6px;
    }

    footer {
        text-align: center;
        padding: 22px;
        color: #66766a;
    }

    .mensaje {
        background: #e2efdf;
        color: #355e4b;
        padding: 13px;
        border-radius: 6px;
        margin-bottom: 18px;
    }
</style>

</head>

<body>

    <header>
        <h1>Biblioteca de Tomas Duran</h1>
        <p>Tu espacio para descubrir y administrar libros</p>
    </header>

    <nav>
        <a href="{{ url('/') }}">Inicio</a>
        <a href="{{ route('libros.index') }}">Libros</a>
        <a href="{{ route('categorias.index') }}">Categorías</a>
    </nav>

    <main>
        @if(session('success'))
            <div class="mensaje">
                {{ session('success') }}
            </div>
        @endif

        @yield('contenido')
    </main>

    <footer>
        Biblioteca de Tomas Duran - Proyecto SENA
    </footer>

</body>
</html>
