<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión - Consultas Médicas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-white to-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white shadow-xl rounded-lg w-full max-w-md p-8">
        <div class="flex flex-col items-center mb-6">
            <i class="fas fa-stethoscope text-green-600 text-4xl mb-2"></i>
            <h1 class="text-xl font-semibold text-gray-700">Sistema de Gestión de Consultas Médicas</h1>
        </div>

        @if(session('error'))
            <div class="bg-red-100 text-red-600 p-2 rounded mb-4 text-sm">
                {{ session('error') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="text-sm text-gray-600">Correo electrónico</label>
                <input type="email" name="email" id="email" required
                       class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <div class="mb-6">
                <label for="password" class="text-sm text-gray-600">Contraseña</label>
                <input type="password" name="password" id="password" required
                       class="w-full mt-1 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500">
            </div>

            <button type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg transition duration-200">
                Iniciar sesión
            </button>
        </form>

        <p class="mt-6 text-center text-sm text-gray-500">
            ¿No tienes una cuenta? <a href="{{ route('register') }}" class="text-green-600 hover:underline">Regístrate</a>
        </p>
    </div>

</body>
</html>
