<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use App\Models\Categorie;

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

    public function allBooks(Request $request)
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();
    
        // Récupérer l'ID de la catégorie sélectionnée (si spécifié dans la requête)
        $category_id = $request->query('category_id');
    
        // Si une catégorie est sélectionnée, récupérer les ouvrages associés à cette catégorie
        if ($category_id) {
            $ouvrages = Ouvrage::where('categorie_fk', $category_id)->with('fkAuteur')->paginate(10);
            // Récupérer la catégorie pour afficher son nom
            $selectedCategory = Categorie::find($category_id);
        } else {
            // Si aucune catégorie n'est sélectionnée, afficher tous les ouvrages
            $ouvrages = Ouvrage::with('fkAuteur')->paginate(10);
            $selectedCategory = null;  // Pas de catégorie sélectionnée
        }
    
        // Retourner la vue avec les ouvrages, les catégories et la catégorie sélectionnée
        return view('allBooks', compact('ouvrages', 'categories', 'selectedCategory'));
    }

    public function indexDetails(Request $request){
        $id = $request->query("idOuvrage");
        $ouvrage = Ouvrage::with('fkAuteur')->find($id);
        return view('details', compact('ouvrage'));
    }

    /*public function index()
    {
        $categories = Categorie::with('livres')->get(); // Récupère toutes les catégories avec les livres associés
        return view('livres.index', compact('categories'));
    }*/
}
