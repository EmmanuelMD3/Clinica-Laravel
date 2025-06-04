<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Admin\ReporteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\MedicoController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

// Página de inicio
Route::get('/', fn() => view('welcome'))->name('home');

// Dashboard general (si se desea)
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Configuración del usuario autenticado
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

// Autenticación
Route::get('/login', fn() => view('auth.login'))->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Registro de usuarios
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

// Paneles según tipo de usuario
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/medico', [MedicoController::class, 'dashboard'])->name('medico.dashboard');
    Route::get('/enfermera', fn() => view('enfermera'))->name('enfermera.dashboard');
    Route::get('/paciente', [ConsultaController::class, 'index'])->name('paciente.dashboard');
});

// Rutas del paciente
Route::middleware(['auth'])->prefix('paciente')->name('paciente.')->group(function () {
    Route::get('/consulta', [ConsultaController::class, 'create'])->name('consulta.create');
    Route::post('/consulta', [ConsultaController::class, 'store'])->name('consulta.store');
    Route::post('/consultas', [ConsultaController::class, 'store'])->name('consultas.store');
});

// Rutas del médico
Route::middleware(['auth'])->prefix('medico')->name('medico.')->group(function () {
    Route::get('/consultas', [MedicoController::class, 'consultas'])->name('consultas');
});

// Rutas del administrador (simplificadas, sin middleware personalizado)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn() => view('admin.dashboard'))->name('dashboard');

    // Gestión de usuarios
    Route::get('/usuarios', [AdminUsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuarios', [AdminUsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/usuarios/{id}/edit', [AdminUsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/usuarios/{id}', [AdminUsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/usuarios/{id}', [AdminUsuarioController::class, 'destroy'])->name('usuarios.destroy');

    // Reportes y citas
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes');
    Route::get('/citas', [ConsultaController::class, 'verTodas'])->name('citas.index');
});
