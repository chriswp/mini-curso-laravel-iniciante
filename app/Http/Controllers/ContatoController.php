<?php

namespace App\Http\Controllers;

use App\Contato;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contatos = Contato::all();

        return view('contato.index', compact('contatos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contato.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:45|min:3',
            'email' => 'required|email'
        ]);


        $contato = new Contato();
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->user_id = auth()->user()->id;
        $contato->save();

        return redirect()->route('contato.create')->with('sucesso', 'Contato Cadastrado com sucesso');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contato = Contato::find($id);
        return view('contato.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contato = Contato::find($id);
        $contato->nome = $request->nome;
        $contato->email = $request->email;
        $contato->save();

        return redirect()->route('contato.index')->with('sucesso', 'Contato Atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contato =  Contato::find($id);
      $contato->delete();
        return redirect()->route('contato.index')->with('sucesso', 'Contato removido com sucesso');
    }
}
