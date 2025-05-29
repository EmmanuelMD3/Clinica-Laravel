@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar usuario</h2>

    <form action="{{ route('admin.usuarios.update', $usuario->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block">Nombre completo</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $usuario->name }}" required>
        </div>

        <div>
            <label class="block">Correo electrónico</label>
            <input type="email" name="email" class="w-full border p-2 rounded" value="{{ $usuario->email }}" required>
        </div>

        <div>
            <label class="block">Rol</label>
            <select name="rol" class="w-full border p-2 rounded" required>
                <option value="Médico" {{ $usuario->rol === 'Médico' ? 'selected' : '' }}>Médico</option>
                <option value="Enfermera" {{ $usuario->rol === 'Enfermera' ? 'selected' : '' }}>Enfermera</option>
            </select>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar cambios</button>
        <a href="{{ route('admin.usuarios.index') }}" class="ml-4 text-gray-600 underline">Cancelar</a>
    </form>
@endsection
