<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitaController extends Controller
{

    public function create()
    {
        $medicos = User::where('rol', 'Médico')->get();
        return view('paciente.consulta', compact('medicos'));
    }

    public function index()
    {
        $consultas = Consulta::where('paciente_id', auth()->id())->latest()->get();
        $medicos = User::where('rol', 'Médico')->get();

        return view('paciente', compact('consultas', 'medicos'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:users,id',
            'fecha' => 'required|date',
            'hora' => 'required',
            'motivo' => 'required|string|max:255',
            'sintomas' => 'required|string',
            'observaciones' => 'nullable|string',
        ]);

        Consulta::create([
            'paciente_id' => Auth::id(),
            'medico_id' => $request->medico_id,
            'fecha' => $request->fecha,
            'hora' => $request->hora,
            'motivo' => $request->motivo,
            'sintomas' => $request->sintomas,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->back()->with('success', 'Consulta registrada correctamente.');
    }

    public function verTodas()
    {
        $consultas = \App\Models\Consulta::with(['paciente', 'medico'])->latest()->get();
        return view('admin.citas.index', compact('consultas'));
    }
}
