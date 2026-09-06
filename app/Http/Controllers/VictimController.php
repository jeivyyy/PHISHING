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
            'password' => ['required', 'string'],
        ]);

        Victim::create([
            'email' => $dados['email'],
            'password_submitted' => true,
            'password_length' => strlen($dados['password']),
        ]);

        return redirect('/discover');
    }
}