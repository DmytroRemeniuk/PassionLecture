<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\Categorie;

class BookController extends Controller
{
    //Retourner les 5 derniers ouvrages
    public function showLastFiveBooks()
    {
        //Récupère les 5 derniers ouvrage depuis la table t_ouvrage
        $lastFiveBooks = Ouvrage::getLastFiveBooks()->load('fkAuteur', 'fkUtilisateur');

        return view('index', compact('lastFiveBooks'));
    }

    //Retourner les ouvrages ajoutés par l'utilisateur
    public static function getBooksByUser($idUser)
    {
        // Récupérer les livres de l'utilisateur via la méthode `getBooksByUser`
        return Ouvrage::getBooksByUser($idUser);
    }

    //Nombre d'ouvrages proposés par l'utilisateur
    public static function booksNumber($idUser)
    {
        return Ouvrage::where('utilisateur_fk', $idUser)->count();
    }

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
            'utilisateur_fk' => $bookData['utilisateur_fk'],
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

    //Retourner le livre si existe
    public static function findOrFail($id)
    {
        return Ouvrage::findOrFail($id);
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
            'utilisateur_fk' => $bookData['utilisateur_fk'],
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

    //Retourner un ouvrage avec son auteur
    public function indexDetails(Request $request)
    {
        $id = $request->query("idOuvrage");
        $ouvrage = Ouvrage::with('fkAuteur')->find($id);
        return view('details', compact('ouvrage'));
    }

    //Retourner un livre avec son auteur et catégorie
    public static function indexEdit($id)
    {
        $ouvrage = Ouvrage::with('fkAuteur')->with('fkCategorie')->with('fkEditeur')->find($id);
        return $ouvrage;
    }

    //Afficher les livres
    public function allBooks(Request $request)
    {
        // Récupérer toutes les catégories
        $categories = Categorie::all();

        // Récupérer l'ID de la catégorie sélectionnée (si spécifié dans la requête)
        $category_id = $request->query('category_id');

        // Récupérer la valeur de la recherche (s'il y en a)
        $search = $request->query('searchbox');

        // Initialiser la requête sur la table Ouvrage
        $query = Ouvrage::with('fkAuteur'); // Charger également les auteurs (assurez-vous que la relation est correcte)

        // Appliquer le filtre par catégorie si une catégorie est sélectionnée
        if ($category_id) {
            $query->where('categorie_fk', $category_id);
        }

        // Appliquer le filtre de recherche si un terme de recherche est fourni
        if ($search) {
            $filter = $request->query('filter'); // Récupérer le critère de filtre (title, author, etc.)

            switch ($filter) {
                case 'title':
                    $query->where('titre', 'like', '%' . $search . '%'); // Rechercher dans le titre
                    break;

                case 'author':
                    $query->whereHas('fkAuteur', function ($q) use ($search) {
                        $q->where('nom', 'like', '%' . $search . '%')
                          ->orWhere('prenom', 'like', '%' . $search . '%'); // Rechercher par auteur (nom ou prénom)
                    });
                    break;

                case 'editor':
                    $query->whereHas('fkEditeur', function ($q) use ($search) {
                        $q->where('nom', 'like', '%' . $search . '%'); // Assurez-vous que la relation fkEditeur existe
                    });
                    break;

                case 'year':
                    if (!is_numeric($search)) {
                        // Si l'année n'est pas un nombre valide, rediriger avec un message d'erreur
                        return redirect()->back()->withErrors(['searchbox' => 'Veuillez entrer une année valide.']);
                    }
                    $query->whereBetween('annee', [$search - 10, $search + 10]); // Rechercher par intervalle d'années
                    break;

                case 'pages':
                    if (!is_numeric($search)) {
                        // Si le nombre de pages n'est pas un nombre valide, rediriger avec un message d'erreur
                        return redirect()->back()->withErrors(['searchbox' => 'Veuillez entrer un nombre de pages valide.']);
                    }
                    $query->whereBetween('nbPages', [$search - 20, $search + 20]); // Rechercher par intervalle de pages
                    break;

                default:
                    // Si aucun critère n'est spécifié, effectuer une recherche par titre par défaut
                    $query->where('titre', 'like', '%' . $search . '%');
                    break;
            }
        }

        // Récupérer les résultats avec pagination
        $ouvrages = $query->paginate(10);

        // Ajouter la moyenne des notes pour chaque livre
        foreach($ouvrages as $ouvrage)
        {
            $ouvrage['avg'] = ApprecierController::avg($ouvrage['ouvrage_id']);
        }

        // Récupérer la catégorie sélectionnée pour l'affichage dans la vue
        $selectedCategory = $category_id ? Categorie::find($category_id) : null;

        // Retourner la vue avec les ouvrages, les catégories, la catégorie sélectionnée, et la requête
        return view('allBooks', [
            'ouvrages' => $ouvrages,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'request' => $request
        ]);
    }
}
