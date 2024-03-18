<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use Illuminate\Http\Request;

use App\Models\Cliente;

class ClienteController extends Controller
{
    //Constructor
    public function __construct()
    {
        $this->midleware('can:Crear cliente')->only('create');
    }
    
    public function index()
    {
        $clientes = Cliente::all();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(ClienteRequest $request)
    {
        Cliente::create($request->all());
        return redirect()->route('cliente.index');
    }

    public function show(string $id)
    {
        return "Visualización de datos de un único cliente";
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());
        return redirect()->route('cliente.index')->with('mensaje', 'Actualizado correctameente');
    }

    public function destroy(string $id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        return redirect()->route('cliente.index')->with('mensaje', 'Registro eliminado');
    }
}
