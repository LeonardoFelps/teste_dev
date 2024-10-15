<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{

    public function __construct(Produto $produto) {

        $this->produto = $produto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produtos = $this->produto->all();

        if($produtos->isEmpty()) {
            return response()->json(['Erro' => 'Nenhum produto foi encontrado.'], 404);
        }
        return $produtos;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate($this->produto->regras(), $this->produto->feedback());

        $produto = $this->produto->create($request->all());
        return $produto;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produto = $this->produto->find($id);

        if(!$produto){
            return response()->json(['erro' => 'Produto não encontrado!'], 404);
        }
        return $produto;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $produto = $this->produto->find($id);

        if(!$produto){
            return response()->json(['erro' => 'Produto não encontrado!'], 404);
        }


        $produto->update($request->all());
        return $produto;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $produto = $this->produto->find($id);

        if(!$produto){
            return response()->json(['erro' => 'Produto não encontrado!'], 404);
        }

        $produto->delete();

        return response()->json(['msg' => 'Produto deletado com sucesso!'], 200);
    }
}
