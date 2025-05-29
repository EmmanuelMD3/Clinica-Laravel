@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Registrar Consulta Médica</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('paciente.consulta.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Médico</label>
            <select name="medico_id" class="w-full border p-2 rounded" required>
                <option value="">Seleccione un médico</option>
                @foreach ($medicos as $medico)
                    <option value="{{ $medico->id }}">{{ $medico->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Fecha</label>
            <input type="date" name="fecha" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Hora</label>
            <input type="time" name="hora" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Motivo</label>
            <input type="text" name="motivo" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Síntomas</label>
            <textarea name="sintomas" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div>
            <label>Observaciones (opcional)</label>
            <textarea name="observaciones" class="w-full border p-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Registrar Consulta</button>
    </form>
</div>
@endsection
