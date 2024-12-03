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

    public function indexAllBooks(){
        $ouvrages = Ouvrage::with('auteur')->get();
        return view('allBooks', compact('ouvrages'));
    }

    public function indexDetails(Request $request){
        $id = $request->query("idOuvrage");
        $ouvrage = Ouvrage::with('auteur')->find($id);
        return view('details', compact('ouvrage'));
    }
}
