<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ouvrage;
use App\Models\Categorie;

class BookController extends Controller
{
    public function allBooks(){
        $ouvrages = Ouvrage::paginate(10); // 10 ouvrages par page
        return view('allBooks', ['ouvrages' => $ouvrages]);
    }

    public function index()
    {
        $categories = Categorie::with('livres')->get(); // Récupère toutes les catégories avec les livres associés
        return view('livres.index', compact('categories'));
    }
}
