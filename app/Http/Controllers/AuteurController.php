<?php

namespace App\Http\Controllers;

use App\Models\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Auteur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(Request $request)
    {
        return Auteur::firstOrCreate(['nom' => $request->input('author_last_name'),
                'prenom' => $request->input('author_first_name')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
