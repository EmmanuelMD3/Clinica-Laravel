@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Bienvenido, paciente</h2>
    <p class="mb-6">Desde aquí puedes agendar tus citas, revisar tu historial médico y más.</p>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- Formulario para registrar una nueva consulta --}}
    <h3 class="text-xl font-semibold mb-2">Registrar nueva consulta</h3>

    <form action="{{ route('paciente.consultas.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow mb-8">
        @csrf

        <div>
            <label class="block">Fecha</label>
            <input type="date" name="fecha" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Hora</label>
            <input type="time" name="hora" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Motivo de la consulta</label>
            <input type="text" name="motivo" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Síntomas</label>
            <textarea name="sintomas" class="w-full border p-2 rounded" rows="3" required></textarea>
        </div>

        <div>
            <label class="block">Observaciones (opcional)</label>
            <textarea name="observaciones" class="w-full border p-2 rounded" rows="3"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Registrar Consulta</button>
    </form>

    {{-- Listado de consultas registradas --}}
    <h3 class="text-xl font-semibold mb-2">Historial de Consultas</h3>

    @if ($consultas->isEmpty())
        <p class="text-gray-500">Aún no tienes consultas registradas.</p>
    @else
        <table class="w-full border-collapse bg-white shadow">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-2">Fecha</th>
                    <th class="p-2">Hora</th>
                    <th class="p-2">Motivo</th>
                    <th class="p-2">Síntomas</th>
                    <th class="p-2">Observaciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($consultas as $consulta)
                    <tr class="border-b">
                        <td class="p-2">{{ $consulta->fecha }}</td>
                        <td class="p-2">{{ $consulta->hora }}</td>
                        <td class="p-2">{{ $consulta->motivo }}</td>
                        <td class="p-2">{{ $consulta->sintomas }}</td>
                        <td class="p-2">{{ $consulta->observaciones ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
