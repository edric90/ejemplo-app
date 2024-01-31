<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pet;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
        $pets = Pet::all();
        return response()->json($pets);
        }
        catch (\Exception $e)
        {
            return response()->json(["error"=> $e->getMessage()],400);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try 
        {
        $pet = new Pet();
        $pet->name = $request->name;
        $pet->color = $request->color;
        $pet->gender = $request->gender;
        $pet->age = $request->age;
        $pet->type = $request->type;
        $pet->client_id = $request->client_id;
        $pet->save();
        return response()->json(["Mensage" => "Mascota Registrada"]);
        }
        catch(\Exception $e)
        {
            return response()->json(["error"=> $e->getMessage()],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
            $pet = Pet::find($id);
            return response()->json($pet);
        }
        catch(\Exception $e)
        {
            return response()->json(["error"=> $e->getMessage()],500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try
        {
            $pet = Pet::find($id);
            $pet->name = $request->name;
            $pet->color = $request->color;
            $pet->age = $request->age;
            $pet->type = $request->type;
            $pet->client_id = $request->client_id;
            $pet->save();
            return response()->json(["Mensage" => "Datos de Mascota Actualizados"]);
        }
        catch(\Exception $e)
        {
            return response()->json(["error"=> $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
            $pet = Pet::find($id);
            $pet->delete();
            return response()->json(["Mensaje"=> "Datos de Mascota eliminados"]);
        }
        catch(\Exception $e)
        {
            return response()->json(["error"=> $e->getMessage()],500);
        }
    }
}