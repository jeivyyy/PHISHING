<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;

class VictimController extends Controller
{
    public function store(Request $request)
    {
        $dados = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['nullable', 'string'],
        ]);

        Victim::create([
            'email' => $dados['email'],
            'password_submitted' => !empty($dados['password']),
            'password_length' => isset($dados['password'])
                ? strlen($dados['password'])
                : null,
        ]);

        return redirect('/success');
    }
}