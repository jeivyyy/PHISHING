<?php

namespace App\Http\Middleware;

use App\Services\AdminAccessService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminAccess
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {
        if (! Auth::check()) {
            return redirect()->route('admin.login');
        }

        $user = Auth::user();

        $adminAccess = app(AdminAccessService::class);

        if (
            ! $user->is_admin
            || ! $adminAccess->emailIsAllowed($user->email)
        ) {
            Auth::logout();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()
                ->route('admin.login')
                ->withErrors([
                    'email' => 'Acesso administrativo não autorizado.',
                ]);
        }

        return $next($request);
    }
}