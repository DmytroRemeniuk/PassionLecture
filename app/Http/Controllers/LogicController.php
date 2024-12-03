<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

class LogicController extends Controller
{
    public function addBook(Request $request)
    {
        $author = AuteurController::store($request);
        $publisher = EditeurController::store($request);
        if($author->wasRecentlyCreated){
            $request['auteur_id'] = $author->id;
        }
        else{
            $request['auteur_id'] = $author['auteur_id'];
        }
        if($publisher->wasRecentlyCreated){
            $request['editeur_id'] = $publisher->id;
        }
        else{
            $request['editeur_id'] = $publisher['editeur_id'];
        }
        BookController::store($request);
        return Redirect::to('/');
    }
}
