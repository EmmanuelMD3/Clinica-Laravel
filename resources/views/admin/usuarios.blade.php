@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Registrar nuevo usuario</h2>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Volver al Panel
        </a>
    </div>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-4 bg-white p-6 rounded shadow mb-6">
        @csrf

        <div>
            <label class="block">Nombre completo</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Correo electrónico</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Contraseña</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block">Rol</label>
            <select name="rol" class="w-full border p-2 rounded" required>
                <option value="Médico">Médico</option>
                <option value="Enfermera">Enfermera</option>
            </select>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Registrar
        </button>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mt-4">
                {{ session('success') }}
            </div>
        @endif
    </form>

    <h3 class="text-xl font-semibold mt-8 mb-2">Usuarios registrados</h3>

    <table class="w-full border-collapse bg-white shadow text-sm">
        <thead class="bg-green-600 text-white">
            <tr>
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Nombre</th>
                <th class="p-2 text-left">Correo</th>
                <th class="p-2 text-left">Rol</th>
                <th class="p-2 text-left">Registrado el</th>
                <th class="p-2 text-left">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($usuarios as $usuario)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2">{{ $usuario->id }}</td>
                    <td class="p-2">{{ $usuario->name }}</td>
                    <td class="p-2">{{ $usuario->email }}</td>
                    <td class="p-2">{{ $usuario->rol }}</td>
                    <td class="p-2">{{ $usuario->created_at->format('Y-m-d H:i') }}</td>
                    <td class="p-2 flex gap-3">
                        <a href="{{ route('admin.usuarios.edit', $usuario->id) }}" 
                           class="inline-flex items-center text-blue-600 hover:underline hover:text-blue-800">
                            ✏️ Editar
                        </a>

                        <form action="{{ route('admin.usuarios.destroy', $usuario->id) }}" 
                              method="POST" 
                              onsubmit="return confirm('¿Estás seguro de eliminar este usuario?')" 
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center text-red-600 hover:underline hover:text-red-800">
                                🗑️ Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">No hay médicos ni enfermeros registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
