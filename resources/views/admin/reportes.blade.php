@extends('layouts.app')

@section('content')
<div class="p-6 bg-white shadow rounded">
    <h1 class="text-2xl font-bold mb-4">📈 Reportes</h1>

    <p>Total de consultas: <strong>{{ $totalConsultas }}</strong></p>
    <p>Total de usuarios: <strong>{{ $totalUsuarios }}</strong></p>

    <div class="mt-6">
        <a href="{{ route('admin.dashboard') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
            ⬅️ Volver al panel de administrador
        </a>
    </div>
</div>
@endsection
