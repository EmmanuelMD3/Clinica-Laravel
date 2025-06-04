@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">🩺 Mis Consultas</h2>
        <a href="{{ route('medico.dashboard') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            ← Volver al Panel
        </a>
    </div>

    @if ($consultas->isEmpty())
        <p class="text-gray-500">No tienes consultas asignadas.</p>
    @else
        <table class="w-full border-collapse bg-white shadow">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="p-2">Fecha</th>
                    <th class="p-2">Hora</th>
                    <th class="p-2">Paciente</th>
                    <th class="p-2">Motivo</th>
                    <th class="p-2">Síntomas</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr class="border-b">
                        <td class="p-2">{{ $consulta->fecha }}</td>
                        <td class="p-2">{{ $consulta->hora }}</td>
                        <td class="p-2">{{ $consulta->paciente->name ?? 'Desconocido' }}</td>
                        <td class="p-2">{{ $consulta->motivo }}</td>
                        <td class="p-2">{{ $consulta->sintomas }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
