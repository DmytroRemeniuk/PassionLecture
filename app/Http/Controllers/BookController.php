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
}
