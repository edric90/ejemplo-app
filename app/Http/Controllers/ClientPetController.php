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
        //$client = Client::all();
        $client = Client::with('pets')->get();
        return response()->json($client);
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
