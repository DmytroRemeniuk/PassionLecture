<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;

class BookController extends Controller
{
    public function showLastFiveBooks(){

        //Récupère les 5 derniers ouvrage depuis la table t_ouvrage
        $lastFiveBooks = Ouvrage::getLastFiveBooks()->load('fkAuteur', 'fkUtilisateur');

        return view('index', compact('lastFiveBooks'));
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Récupérer tous les livres
        $books = Ouvrage::all();

        // Passer les livres à la vue 'index'
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
    public static function show($id)
    {
        return Ouvrage::with('fkUtilisateur')->find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public static function update($bookData, $id)
    {
        Ouvrage::where('ouvrage_id', $id)->update(['titre' => $bookData['title'],
            'extrait' => $bookData['excerpt_link'],
            'resume' => $bookData['summary'],
            'annee' => $bookData['year'],
            'image' => $bookData['image'],
            'nbPages' => $bookData['pages'],
            'utilisateur_fk' => 1,
            'categorie_fk' => $bookData['categorie_fk'],
            'editeur_fk' => $bookData['editeur_fk'],
            'auteur_fk' => $bookData['auteur_fk']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ouvrage $ouvrage)
    {
        //
    }

    public function indexAllBooks(){
        $ouvrages = Ouvrage::with('fkAuteur')->paginate(10);
        return view('allBooks', compact('ouvrages'));
    }

    public function indexDetails(Request $request){
        $id = $request->query("idOuvrage");
        $ouvrage = Ouvrage::with('fkAuteur')->find($id);
        return view('details', compact('ouvrage'));
    }

    public static function indexEdit($id){
        $ouvrage = Ouvrage::with('fkAuteur')->with('fkCategorie')->find($id);
        return $ouvrage;
    }
}
