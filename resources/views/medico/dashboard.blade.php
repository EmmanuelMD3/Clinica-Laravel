@extends('layouts.app')

@section('content')
<div class="flex">
    <!-- Menú lateral -->
    <aside class="w-64 bg-blue-800 text-white min-h-screen p-4">
        <h2 class="text-xl font-bold mb-6">Panel Médico</h2>
        <ul class="space-y-4">
            <li><a href="{{ route('medico.consultas') }}" class="hover:underline">🩺 Mis Consultas</a></li>
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
        <h1 class="text-2xl font-semibold mb-4">Bienvenido Dr. {{ Auth::user()->name }}</h1>
        <p class="text-gray-700">Aquí puedes ver tus consultas y gestionar tu información médica.</p>
    </main>
</div>
@endsection
