<?php

// app/Http/Controllers/AdminReporteController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Consulta;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminReporteController extends Controller
{
    public function index()
    {
        // Usuarios por rol
        $usuariosPorRol = User::select('rol', DB::raw('count(*) as total'))
            ->groupBy('rol')
            ->get();

        // Consultas por día (últimos 7 días)
        $consultasPorDia = Consulta::select(
                DB::raw('DATE(fecha) as dia'),
                DB::raw('count(*) as total')
            )
            ->where('fecha', '>=', Carbon::now()->subDays(7))
            ->groupBy('dia')
            ->orderBy('dia')
            ->get();

        // Consultas por médico (con nombre del médico)
        $consultasPorMedico = Consulta::select('medico_id', DB::raw('count(*) as total'))
            ->groupBy('medico_id')
            ->with('medico')
            ->get();

        return view('admin.reportes.index', compact(
            'usuariosPorRol', 'consultasPorDia', 'consultasPorMedico'
        ));
    }
}

