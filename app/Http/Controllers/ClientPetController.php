<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Pet;

class ClientPetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = Client::with('pets')->get(); //consulta de clientes y mascotas

/*
        // Consulta tabla (sql) clientes y mascotas
        $client = DB::table("clients")->Join("pets","clients.id","=","pets.client_id","inner")
        ->select("clients.*","pets.*")->get();
*/
        return response()->json($client); // retorna datos clientes y mascotas
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
        $data = Client::with('pets')->where('clients.id','=',$id)->get(); //consulta de clientes y mascotas
        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['message'=> $e->getMessage(),'Error'=>400,'Mensaje'=>'Error']);
    }
}
 
    public function indexinv()
    {
        try 
        {
            $pet = Pet::with('client')->get(); //consulta de Mascotas y Clientes
        }
        catch (\Exception $e) 
        {
            return response()->json(['message'=> $e->getMessage(),'Error'=> 400,'Mensaje'=> 'Error']);
        }
/*
        // Consulta tabla (sql) mascotas y clientes
        $pet = DB::table("pets")->Join("clients","clients.id","=","pets.client_id","inner")
        ->select("pets.*","clients.*")->get();
*/
        return response()->json($pet); // retorna datos clientes y mascotas
    }

    public function showinv(string $id)
    {
        try 
        {
            $pet = Pet::with('client')->where("pets.id","=",$id)->get();
            return response()->json($pet);
        }
        catch (\Exception $e) 
        {
            return response()->json(["message"=> $e->getMessage(),"Error"=> 400,"Mensaje"=> "Error"]);
        }
    }
}