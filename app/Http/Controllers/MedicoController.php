<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Consulta;

class MedicoController extends Controller
{
    public function dashboard()
    {
        return view('medico.dashboard');
    }

    public function consultas()
    {
        $consultas = Consulta::with('paciente')
            ->where('medico_id', Auth::id())
            ->orderBy('fecha', 'desc')
            ->get();

        return view('medico.consultas', compact('consultas'));
    }
}
