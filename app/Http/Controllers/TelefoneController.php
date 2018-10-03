<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    public function showByContato($contatoId)
    {
        $telefones = Telefone::where('contato_id',$contatoId)->get();
        return view('telefone.index', compact('telefones','contatoId'));
    }

    public function store(Request $request)
    {
        $telefone = new Telefone();
        $telefone->numero = $request->numero;
        $telefone->contato_id = $request->contato_id;
        $telefone->save();

        return redirect()->route('telefone.showByContato',$request->contato_id)->with('sucesso', 'Telefone Cadastrado com sucesso');
    }

    public function destroy(Request $request, $id)
    {
        Telefone::destroy($id);
        return redirect()->route('telefone.showByContato',$request->contato_id)->with('sucesso', 'Telefone removido com sucesso');
    }
}
