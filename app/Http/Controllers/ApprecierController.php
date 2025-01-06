<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprecier;

class ApprecierController extends Controller
{
    public static function store($idOuvrage, $idUser, $vote){
        return Apprecier::create(['utilisateur_fk' => $idUser, 'note' => $vote, 'ouvrage_fk' => $idOuvrage]);
    }
}
