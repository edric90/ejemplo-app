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
            return response()->json(["Mensaje de error"=> $e->getMessage()],400);
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
        return response()->json(["Mensaje" => "Datos de la Mascota Registrada"]);
        }
        catch(\Exception $e)
        {
            return response()->json(["Mensaje"=>"Error al registrar los datos de la mascota","error"=> $e->getMessage()],500);
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
        $validar = $request->validate([
            "name" => "required"
            ]);
        try
        {
            $pet = Pet::find($id);
            $pet->name = $request->name;
            $pet->color = $request->color;
            $pet->age = $request->age;
            $pet->type = $request->type;
            $pet->client_id = $request->client_id;
            $pet->save();
            return response()->json(["Mensaje" => "Datos de Mascota Actualizados"],200);
        }
        catch(\Exception $e)
        {
            return response()->json(["Mensaje"=>"Error al actualizar datos de la Mascota".$validar,"error"=> $e->getMessage()],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            //$pet=Pet::find($id)->delete();
            $pet=Pet::find($id);
            if (is_null($pet)) 
            {
                return response()->json(['Error'=>404,'Mensaje'=>'No existe el registro: '.$id]);
            }
            else
            {
                $pet->delete();
                return response()->json(['Mascota'=>$pet,'Mensaje'=>'los datos del Cliente han sido borrados']);
            }
        }
        catch (\Exception $e) 
        {
            // Manejo de excepción general
            return response()->json(['detalle' => $e->getMessage()], 500);
        }
    }
}