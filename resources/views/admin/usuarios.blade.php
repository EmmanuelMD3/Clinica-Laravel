@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Registrar nuevo usuario</h2>
        <a href="{{ route('admin.dashboard') }}" class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">
            ← Volver al Panel
        </a>
    </div>

    <form action="{{ route('admin.usuarios.store') }}" method="POST" class="space-y-4">
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

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Registrar</button>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h3 class="text-xl font-semibold mt-8 mb-2">Usuarios registrados</h3>

        <table class="w-full border-collapse bg-white shadow">
            <thead class="bg-green-600 text-white">
                <tr>
                    <th class="p-2">ID</th>
                    <th class="p-2">Nombre</th>
                    <th class="p-2">Correo</th>
                    <th class="p-2">Rol</th>
                    <th class="p-2">Registrado el</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                    <tr class="border-b">
                        <td class="p-2 text-center">{{ $usuario->id }}</td>
                        <td class="p-2">{{ $usuario->name }}</td>
                        <td class="p-2">{{ $usuario->email }}</td>
                        <td class="p-2">{{ $usuario->rol }}</td>
                        <td class="p-2">{{ $usuario->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-4 text-center text-gray-500">No hay médicos ni enfermeros registrados.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </form>
@endsection
