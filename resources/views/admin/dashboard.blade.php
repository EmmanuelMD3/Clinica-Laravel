@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Menú lateral -->
    <aside class="w-64 bg-gray-800 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Administrador</h2>
        <ul class="space-y-4">
            <li><a href="{{ route('admin.usuarios.index') }}" class="hover:underline">👨‍⚕️ Usuarios</a></li>
            <li><a href="{{ route('admin.citas.index') }}" class="hover:underline">📋 Citas</a></li>
            <li><a href="{{ route('admin.reportes') }}" class="hover:underline">📈 Reportes</a></li>


            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:underline text-left w-full text-white">🚪 Cerrar sesión</button>
                </form>
            </li>
        </ul>
    </aside>

    <!-- Contenido principal -->
    <main class="flex-1 p-6 bg-white shadow">
        <h1 class="text-2xl font-semibold mb-4">Panel de administración</h1>
        <p class="text-gray-700">Bienvenido, {{ Auth::user()->name }}.</p>

        <div class="mt-4">
            <p class="text-sm text-gray-500">
                Desde este panel puedes gestionar usuarios, visualizar reportes y controlar la información del sistema.
            </p>
        </div>
    </main>
</div>
@endsection
