<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;

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

require __DIR__ . '/auth.php';

use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/login', [AuthenticatedSessionController::class, 'store']);


Route::get('/admin', function () {
    return view('admin');
})->middleware(['auth']);

Route::get('/medico', function () {
    return view('medico');
})->middleware(['auth']);

Route::get('/enfermera', function () {
    return view('enfermera');
})->middleware(['auth']);

Route::get('/paciente', function () {
    return view('paciente');
})->middleware(['auth']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

use App\Http\Controllers\Auth\RegisteredUserController;

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);

use App\Http\Controllers\AdminUsuarioController;

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/usuarios', [AdminUsuarioController::class, 'index'])->name('admin.usuarios');
    Route::post('/admin/usuarios', [AdminUsuarioController::class, 'store'])->name('admin.usuarios.store');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('admin.dashboard');

