<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprecier;

class ApprecierController extends Controller
{
    //Ajouter une note
    public static function store($idOuvrage, $idUser, $vote){
        //Si existe déjà, changer
        if(Apprecier::where('ouvrage_fk', $idOuvrage)->where('utilisateur_fk', $idUser)->exists())
        {
            return self::update($idOuvrage, $idUser, $vote);
        }
        //ajouter
        else
        {
            return Apprecier::create(['utilisateur_fk' => $idUser, 'note' => $vote, 'ouvrage_fk' => $idOuvrage]);
        }
    }

    //Modifier une note
    public static function update($idOuvrage, $idUser, $vote){
        return Apprecier::where('ouvrage_fk', $idOuvrage)->where('utilisateur_fk', $idUser)->update(['note' => $vote]);
    }

    //Nombre de notes par ouvrage
    public static function countBook($id)
    {
        return Apprecier::where('ouvrage_fk', $id)->count();
    }

    //Nombre de notes par utilisateur
    public static function countUser($id)
    {
        return Apprecier::where('utilisateur_fk', $id)->count();
    }

    //Moyenne des notes
    public static function avg($id)
    {
        $average = Apprecier::where('ouvrage_fk', $id)->avg('note');
        return round($average ?? 0, 2);
    }

    //Note d'utilisateur
    public static function getUserVote($idOuvrage, $idUser)
    {
        $appreciation = Apprecier::where('ouvrage_fk', $idOuvrage)
                                ->where('utilisateur_fk', $idUser)
                                ->first();

        return $appreciation ? $appreciation->note : null;
    }

}
