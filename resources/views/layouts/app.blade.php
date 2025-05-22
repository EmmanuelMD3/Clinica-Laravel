<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Sistema de Consultas Médicas')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen text-gray-900">

    <header class="bg-green-600 text-white p-4 shadow">
        <h1 class="text-2xl font-semibold">Sistema de Gestión de Consultas Médicas</h1>
    </header>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
