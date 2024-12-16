<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\Console\Input\Input;

class LogicController extends Controller
{
    public function addBook(Request $request):RedirectResponse
    {
        // Stocker l'auteur
        $author = AuteurController::store($request);
        $authorId = $author['auteur_id'];

        // Stocker l'éditeur
        $publisher = EditeurController::store($request);
        $publisherId = $publisher['editeur_id'];

        // Gérer l'image
        $imageName = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);

        // Préparer les données pour le BookController
        $bookData = [
            'title' => $request->input('title'),
            'excerpt_link' => $request->input('excerpt_link'),
            'summary' => $request->input('summary'),
            'year' => $request->input('year'),
            'pages' => $request->input('pages'),
            'auteur_id' => $authorId,
            'editeur_id' => $publisherId,
            'image' => $imageName,
            'categorie_fk' => $request->input('category'),
        ];
        BookController::store($bookData);
        return Redirect::to('/');
    }

    public function editBook(Request $request):RedirectResponse
    {
        // Récupérer l'ouvrage
        $ouvrage = BookController::show($request->__get('idOuvrage'));
        // Stocker l'auteur
        $author = AuteurController::store($request);
        $authorId = $author['auteur_id'];

        // Stocker l'éditeur
        $publisher = EditeurController::store($request);
        $publisherId = $publisher['editeur_id'];

        // Gérer l'image
        if($request->hasFile('image') && $request->file('image')->isValid())
        {
            // Changer d'image
            $imageName = time() . $request->image->getClientOriginalName();
            $request->image->move(public_path('img'), $imageName);
            // Supprimer l'ancien
            if(File::exists('img/' . $ouvrage->image)) {
                File::delete('img/' . $ouvrage->image);
            }
        }
        else
        {
            // Garder le même chemin d'image
            $imageName = $ouvrage->image;
        }

        // Préparer les données pour le BookController
        $bookData = [
            'title' => $request->input('title'),
            'excerpt_link' => $request->input('excerpt_link'),
            'summary' => $request->input('summary'),
            'year' => $request->input('year'),
            'pages' => $request->input('pages'),
            'utilisateur_fk' => $ouvrage->fkUtilisateur->utilisateur_id,
            'auteur_fk' => $authorId,
            'editeur_fk' => $publisherId,
            'image' => $imageName,
            'categorie_fk' => $request->input('category'),
        ];
        BookController::update($bookData, $request->__get('idOuvrage'));
        return Redirect::to('/books/view');
    }

    public function editBookShow(Request $request)
    {
        // Rechercher les détails du livre dans la base de données
        $ouvrage = BookController::indexEdit($request->__get('idOuvrage'));
        // Rechercher les détails des catégories dans la base de données
        $categories = CategorieController::index();
        // Passer l'ouvrage et les catégories aux vues
        return view('editBook', ['ouvrage' => $ouvrage, 'categories' => $categories]);
    }
}
