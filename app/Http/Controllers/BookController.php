<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categorie;

class BookController extends Controller
{
    public function showLastFiveBooks()
    {

        //Récupère les 5 derniers ouvrage depuis la table t_ouvrage
        $lastFiveBooks = Ouvrage::getLastFiveBooks()->load('fkAuteur', 'fkUtilisateur');

        return view('index', compact('lastFiveBooks'));
    }


    /**
     * Display a listing of the resource.
     */
    /**public function index()
    {
        // Récupérer tous les livres
        $books = Ouvrage::all();

        // Passer les livres à la vue 'index'
        return view('index', ['books' => $books]);
    }*/

    /**
     * Store a newly created resource in storage.
     */
    public static function store($bookData)
    {
        Ouvrage::create([
            'titre' => $bookData['title'],
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
        Ouvrage::where('ouvrage_id', $id)->update([
            'titre' => $bookData['title'],
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
    public function destroy($idOuvrage): RedirectResponse
    {
        //Récupère le livre selon son id
        $book = Ouvrage::find($idOuvrage);

        // Supprime l'image associée au livre si elle existe
        if (file_exists(public_path('img/' . $book->image))) {

            unlink(public_path('img/' . $book->image));
        }

        // Supprime le livre de la base de données
        $book->delete();

        //Redirige sur la page d'accueil
        return redirect()->route('all-books');
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
        return view('allBooks', compact('ouvrages', 'categories', 'selectedCategory', 'request'));
    }

    public function indexDetails(Request $request)
    {
        $id = $request->query("idOuvrage");
        $ouvrage = Ouvrage::with('fkAuteur')->find($id);
        return view('details', compact('ouvrage'));
    }

    public static function indexEdit($id)
    {
        $ouvrage = Ouvrage::with('fkAuteur')->with('fkCategorie')->find($id);
        return $ouvrage;
    }

    public function index(Request $request)
    {
        $query = Ouvrage::query();
    
        // Filtrer par catégorie
        if ($request->filled('category_id')) {
            $query->where('categorie_fk', $request->category_id);
        }
    
        // Recherche par le terme saisi dans la barre de recherche
        if ($request->filled('searchbox')) {
            $searchTerm = $request->searchbox;
            $filter = $request->input('filter', 'titre'); // 'titre' par défaut
    
            switch ($filter) {
                case 'titre':
                    $query->where('titre', 'like', "%$searchTerm%");
                    break;
    
                case 'annee':
                    $query->where('annee', $searchTerm);
                    break;
    
                case 'pages':
                    $query->where('nbPages', $searchTerm);
                    break;
    
                case 'auteur':
                    $query->whereHas('auteur', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%");
                    });
                    break;
    
                case 'editeur':
                    $query->whereHas('editeur', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%");
                    });
                    break;
    
                case 'utilisateur':
                    $query->whereHas('utilisateur', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%");
                    });
                    break;
    
                default:
                    $query->where('titre', 'like', "%$searchTerm%");
                    break;
            }
        }
    
        // Paginer les résultats
        $ouvrages = $query->paginate(10);
    
        // Récupérer les catégories pour le filtre
        $categories = Categorie::all();
    
        return view('all-books', compact('ouvrages', 'categories'));
    }
    
}
