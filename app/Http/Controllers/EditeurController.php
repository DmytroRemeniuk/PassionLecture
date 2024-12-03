<?php

namespace App\Http\Controllers;

use App\Models\Editeur;
use Illuminate\Http\Request;

class EditeurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Editeur::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(Request $request)
    {
        return Editeur::firstOrCreate(['nom' => $request->input('publisher')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        Editeur::query()->findOrFail($id);
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
