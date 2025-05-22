@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Menú lateral -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Administrador</h2>
        <ul class="space-y-4">
            <li><a href="{{ route('admin.usuarios') }}" class="hover:underline">👨‍⚕️ Usuarios</a></li>
            <li><a href="#" class="hover:underline">📋 Citas</a></li>
            <li><a href="#" class="hover:underline">📈 Reportes</a></li>
            <li><a href="#" class="hover:underline">🚪 Cerrar sesión</a></li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-6 bg-white shadow">
        <h1 class="text-2xl font-semibold mb-4">Panel de administración</h1>
        <p class="text-gray-700">Bienvenido, {{ Auth::user()->name }}.</p>

        <div class="mt-4">
            <!-- Aquí puedes mostrar estadísticas o accesos rápidos -->
            <p class="text-sm text-gray-500">Desde este panel puedes gestionar usuarios, visualizar reportes y controlar la información del sistema.</p>
        </div>
    </main>
</div>
@endsection
