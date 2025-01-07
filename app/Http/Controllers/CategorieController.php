<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdd()
    {
        // Récupérer toutes les catégories    
        $categories = Categorie::all();
        // Passer les catégories à la vue 'addBook'    
        return view('addBook', compact('categories'));
    }

    // Retourner toutes les catégories
    public static function index()
    {    
        return Categorie::all();
    }

    //Retourner les catégories dans la vue d'ajout
    public function allBooksIndex()
    {
        // Récupérer toutes les catégories    
        $categories = Categorie::all();
        // Passer les catégories à la vue 'addBook'    
        return view('allBooks', compact('categories'));
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
