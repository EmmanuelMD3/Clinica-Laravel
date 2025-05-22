<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\RedirectResponse;

class AuthenticatedSessionController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $request->session()->regenerate();

        switch (Auth::user()->rol) {
            case 'Administrador':
                return redirect()->intended('/admin');
            case 'Médico':
                return redirect()->intended('/medico');
            case 'Enfermera':
                return redirect()->intended('/enfermera');
            case 'Paciente':
                return redirect()->intended('/paciente');
            default:
                return redirect()->intended('/');
        }
    }
}
