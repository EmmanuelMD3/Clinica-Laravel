<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUsuarioController extends Controller
{
    public function index()
    {
        $usuarios = \App\Models\User::whereIn('rol', ['Médico', 'Enfermera'])->get();
        return view('admin.usuarios', compact('usuarios'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'rol' => 'required|in:Médico,Enfermera',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->rol,
        ]);

        return redirect()->back()->with('success', 'Usuario registrado exitosamente.');
    }
}
