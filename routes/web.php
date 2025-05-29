<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUsuarioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');
    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

Route::get('/medico', fn() => view('medico'))->middleware(['auth']);
Route::get('/enfermera', fn() => view('enfermera'))->middleware(['auth']);
Route::get('/paciente', fn() => view('paciente'))->middleware(['auth']);

Route::prefix('admin')->middleware('auth')->name('admin.usuarios.')->group(function () {
    Route::get('/usuarios', [AdminUsuarioController::class, 'index'])->name('index');
    Route::post('/usuarios', [AdminUsuarioController::class, 'store'])->name('store');
    Route::get('/usuarios/{id}/edit', [AdminUsuarioController::class, 'edit'])->name('edit');
    Route::put('/usuarios/{id}', [AdminUsuarioController::class, 'update'])->name('update');
    Route::delete('/usuarios/{id}', [AdminUsuarioController::class, 'destroy'])->name('destroy');
});


Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');

use App\Http\Controllers\ConsultaController;

Route::middleware(['auth'])->prefix('paciente')->group(function () {
    Route::get('/consulta', [ConsultaController::class, 'create'])->name('paciente.consulta.create');
    Route::post('/consulta', [ConsultaController::class, 'store'])->name('paciente.consulta.store');
});



Route::middleware(['auth'])->prefix('paciente')->group(function () {
    Route::post('/consultas', [ConsultaController::class, 'store'])->name('paciente.consultas.store');
});


Route::middleware(['auth'])->prefix('paciente')->group(function () {
    Route::get('/', [ConsultaController::class, 'index'])->name('paciente.dashboard');
    Route::post('/consultas', [ConsultaController::class, 'store'])->name('paciente.consultas.store');
});
