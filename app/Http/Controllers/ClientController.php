<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() // tipo: GET en postman, por que solo debuelve datos
    {
        try 
        {
            $clients = Client::all();
            if (is_null($clients)) 
            {
                return response()->json(['Error'=>404,'Mensaje'=>'Tabla sin registros']);
            }
            else
            {
                return response()->json($clients);
            }
        }
        catch (\Exception $e) 
        {
            return response()->json(['Mensaje'=>'Error al desplegar datos','Error'=> $e->getMessage()],500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=> 'required|max:50|min:2',
            'last_name'=> 'required|max:50|min:2',
            'cell_phone'=> 'required|max:12|min:8',
            'zone'=> 'required|max:100|min:2',
            'address'=> 'required|max:100|min:2',
        ]);

        try 
        {
            $client = new Client();
            $client->first_name= $request->first_name;
            $client->last_name= $request->last_name;
            $client->cell_phone= $request->cell_phone;
            $client->zone= $request->zone;
            $client->address=$request->address;
            $client->save();
            return response()->json(['Mensaje'=>'Cliente Registrado','Cliente'=>$client]);
        }
        catch (\Exception $e) 
        {
            return response()->json(['Mensaje'=> 'Datos del cliente NO registrados','Error'=> $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client=Client::find($id);
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name'=> 'required|max:50|min:2',
            'last_name'=> 'required|max:50|min:2',
            'cell_phone'=> 'required|max:12|min:8',
            'zone'=> 'required|max:100|min:2',
            'address'=> 'required|max:100|min:2',
        ]);
        
        try 
        {
            $client=Client::find($id);
            if (is_null($client)) 
            {
                return response()->json(['Error'=>404,'Mensaje'=>'No existe el registro: '.$id]);
            }
            else
            {
                $client->first_name= $request->first_name;
                $client->last_name= $request->last_name;
                $client->cell_phone= $request->cell_phone;
                $client->zone= $request->zone;
                $client->address= $request->address;
                $client->save();
                return response()->json(['Cliente'=>$client,'Mensaje'=>'Cliente Actualizado']);
            }
        }
        catch (\Exception $e) 
        {
            return response()->json(['Mensaje'=>'Error en actualización.','Error'=> $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
                //$client=Client::find($id)->delete();
                $client=Client::find($id);
                if (is_null($client)) 
                {
                    return response()->json(['Error'=>404,'Mensaje'=>'No existe el registro: '.$id]);
                }
                else
                {
                    $client->delete();
                    return response()->json(['Cliente'=>$client,'Mensaje'=>'los datos del Cliente han sido borrados']);
                }
        }
        catch (\Exception $e) 
        {
            // Manejo de excepción general
            return response()->json(['detalle' => $e->getMessage()], 500);
        }
    }
}
