<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apprecier;

class ApprecierController extends Controller
{
    public static function store($idOuvrage, $idUser, $vote){
        if(Apprecier::where('ouvrage_fk', $idOuvrage)->where('utilisateur_fk', $idUser)->exists())
        {
            return self::update($idOuvrage, $idUser, $vote);
        }
        else
        {
            return Apprecier::create(['utilisateur_fk' => $idUser, 'note' => $vote, 'ouvrage_fk' => $idOuvrage]);
        }
    }

    public static function update($idOuvrage, $idUser, $vote){
        return Apprecier::where('ouvrage_fk', $idOuvrage)->where('utilisateur_fk', $idUser)->update(['note' => $vote]);
    }

    public static function count($id)
    {
        return Apprecier::where('ouvrage_fk', $id)->count();
    }

    public static function avg($id)
    {
        $average = Apprecier::where('ouvrage_fk', $id)->avg('note');
        return round($average ?? 0, 2);
    }

    public static function getUserVote($idOuvrage, $idUser)
    {
        $appreciation = Apprecier::where('ouvrage_fk', $idOuvrage)
                                ->where('utilisateur_fk', $idUser)
                                ->first();

        return $appreciation ? $appreciation->note : null;
    }

}
