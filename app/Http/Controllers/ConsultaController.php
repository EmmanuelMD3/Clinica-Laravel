<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConsultaController extends Controller
{
    public function create()
    {
        $medicos = User::where('rol', 'Médico')->get();
        return view('paciente.consulta', compact('medicos'));
    }

    public function index()
    {
        $consultas = Consulta::where('paciente_id', auth()->id())->latest()->get();
        return view('paciente', compact('consultas'));
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

}
