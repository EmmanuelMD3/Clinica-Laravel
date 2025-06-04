<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Consulta;
use App\Models\User;

class ReporteController extends Controller
{
    public function index()
    {
        $totalConsultas = \App\Models\Consulta::count();
        $totalUsuarios = \App\Models\User::count(); // Solo cuenta todos los usuarios

        return view('admin.reportes', [
            'totalConsultas' => $totalConsultas,
            'totalUsuarios' => $totalUsuarios
        ]);
    }

}
