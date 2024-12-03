<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;

class BookController extends Controller
{
    public function allBooks(){
        $ouvrages = Ouvrage::paginate(10); // 10 ouvrages par page
        return view('allBooks', ['ouvrages' => $ouvrages]);
    }

    public function showLastFiveBooks(){

        $lastFiveBooks = Ouvrage::getLastFiveBooks();

        return view('index', ['lastFiveBooks' => $lastFiveBooks]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les livres
        $books = Ouvrage::all();

        // Passer les livres à la vue 'books.index'
        return view('index', ['books' => $books]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public static function store(Request $request)
    {
        Ouvrage::create(['titre' => $request->input('title'),
            'extrait' => $request->input('excerpt_link'),
            'resume' => $request->input('summary'),
            'annee' => $request->input('year'),
            'image' => $request->input('image'),
            'nbPages' => $request->input('pages'),
            'utilisateur_fk' => 1,
            'categorie_fk' => 1,
            'editeur_fk' => $request->input('editeur_id'),
            'auteur_fk' => $request->input('auteur_id')
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ouvrage $ouvrage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ouvrage $ouvrage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ouvrage $ouvrage)
    {
        //
    }
}
