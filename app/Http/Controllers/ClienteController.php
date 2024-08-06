<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteRequest;
use App\Models\Client;
use DragonCode\Contracts\Cashier\Resources\Model;
use Illuminate\Http\Request;

class ClienteController extends Controller
{


    // public function __construct()
    // {
    //    $this->middleware('can:crear')->only('create');
    // //    $this->middleware(['role:Administrador','can:crear|editar|eliminar|administracion avanzada'])->only('create');

    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $clientes = Client::all();
        return view('clientes.index', compact('clientes'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('clientes.registercliente');
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(ClienteRequest $request)
    {
        //insert en table clients
        Client::create([
            'dni' => $request->dni_cliente,
            'apellido' => $request->apellido_cliente,
            'nombre' => $request->nombre_cliente,
            'email' => $request->email_cliente,
            'telefono' => $request->tlf_cliente,
            'direccion' => $request->direccion_cliente,
            'estado' => $request->estado_cliente
        ]);
        return back()->with('success', 'Cliente '. $request->nombre_cliente.' registrado exitosamente'); 
        // return redirect()->route('cliente.index')->with('success', 'Cliente registrado exitosamente'); 

        // return redirect()->route('notas.index')->with('success','Nota Registrada Exitosamente'); //width:metodo para mostrar mensaje 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $clients = Client::find($id);
        if (!$clients) {
            return redirect()->route('clientes.index')->with('error', 'El cliente no existe');
        }
        return view('clientes.updatecliente',compact('clients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Buscar al cliente por su ID
        $cliente = Client::find($id);

        if ($cliente) {
            // Obtener el nombre del cliente antes de la actualización
            $clienteName = $cliente->nombre;
            $cliente->update([
                'dni' => $request->dni_cliente,
                'apellido' => $request->apellido_cliente,
                'nombre' => $request->nombre_cliente,
                'email' => $request->email_cliente,
                'telefono' => $request->tlf_cliente,
                'direccion' => $request->direccion_cliente,
                'estado' => $request->estado_cliente
                
            ]);
            return back()->with('success', 'Cliente ' . $clienteName . ' modificado exitosamente');
        }else {
            // Redirigir de vuelta con un mensaje de error si el cliente no se encuentra
            return back()->with('error', 'Cliente no encontrado');
        }

        // $cliente->save();
        // $cliente->dni = $request->input('dni_cliente');
        // $cliente->apellido = $request->input('apellido_cliente');
        // $cliente->nombre = $request->input('nombre_cliente');
        // $cliente->email = $request->input('email_cliente');
        // $cliente->telefono = $request->input('tlf_cliente');
        // $cliente->direccion = $request->input('direccion_cliente');
        // $cliente->estado = $request->input('estado_cliente');

        // $cliente->save();
        // return back()->with('success', 'Cliente modificado exitosamente');
        
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Client::destroy($id);
        $cliente = Client::find($id);
        if ($cliente) {
            # code...
            $clienteName = $cliente->nombre;
            $cliente->delete();
            return back()->with('success', 'Cliente '. $clienteName. ' '. $cliente->apellido.  ' eliminado exitosamente');
        }else {
            # code...
            return back()->with('error', 'El cliente no existe');

        }
    }
}
