<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Pet;
use Illuminate\Support\Facades\DB;

class ClientPetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$client = Client::all(); //consulta de todos los clientes
        //$client = Client::with('pets')->get(); //consulta de clientes y mascotas

        // Consulta tabla (sql) clientes y mascotas
        // $client = DB::table("clients")->Join("pets","clients.id","=","pets.client_id","inner")
        // ->select("clients.*","pets.*")
        // ->get();
        //return response()->json($client); // retorna datos clientes y mascotas

        //$pet = Pet::with('client')->get(); // retorna mascotas y clientes
        // Consulta tabla (sql) mascotas y clientes
        $pet = DB::table("pets")->Join("clients","clients.id","=","pets.client_id","inner")
        ->select("pets.*","clients.*")
        ->get();

        return response()->json($pet); // retorna datos clientes y mascotas
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = Client::where("id","=",$id)->with('pets')->get();
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
