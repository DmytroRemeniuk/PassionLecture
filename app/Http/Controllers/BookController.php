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
    public static function store($bookData)
    {
        Ouvrage::create(['titre' => $bookData['title'],
            'extrait' => $bookData['excerpt_link'],
            'resume' => $bookData['summary'],
            'annee' => $bookData['year'],
            'image' => $bookData['image'],
            'nbPages' => $bookData['pages'],
            'utilisateur_fk' => 1,
            'categorie_fk' => $bookData['categorie_fk'],
            'editeur_fk' => $bookData['editeur_id'],
            'auteur_fk' => $bookData['auteur_id']
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
