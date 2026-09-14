<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Services\AdminAccessService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check() && (bool) Auth::user()->is_admin) {
            return redirect()->route('admin.index');
        }

        return view('admin.login');
    }

    public function login(
        Request $request,
        AdminAccessService $adminAccess
    ) {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $email = strtolower(trim($dados['email']));

        $user = User::query()
            ->whereRaw('LOWER(email) = ?', [$email])
            ->first();

        $permitido =
            $user !== null
            && (bool) $user->is_admin
            && $adminAccess->emailIsAllowed($email)
            && Hash::check($dados['password'], $user->password);

        if (! $permitido) {
            return back()
                ->withErrors([
                    'email' => 'Credenciais administrativas inválidas.',
                ])
                ->onlyInput('email');
        }

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(
            route('admin.index')
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}