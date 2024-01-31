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
        $clients = Client::all();
        return response()->json($clients);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $client->first_name= $request->first_name;
        $client->last_name= $request->last_name;
        $client->cell_phone= $request->cell_phone;
        $client->zone= $request->zone;
        $client->address=$request->address;
        $client->save();
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
        $client=Client::find($id);
        $client->first_name= $request->first_name;
        $client->last_name= $request->last_name;
        $client->cell_phone= $request->cell_phone;
        $client->zone= $request->zone;
        $client->address= $request->address;
        $client->save();
        return response()->json(['Message'=>'Cliente Actualizado']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
                $client=Client::find($id);
                $client->delete();
                return response()->json(['Message'=>'Cliente Eliminado']);
        }
        catch (\Exception $e) 
        {
            // Manejo de excepción general
            return response()->json(['detalle' => $e->getMessage()], 500);
        }
    }
}
