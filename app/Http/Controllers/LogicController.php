<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers;
use Illuminate\Support\Facades\Redirect;

class LogicController extends Controller
{
    public function addBook(Request $request):RedirectResponse
    {
        // Store the author
        $author = AuteurController::store($request);
        $authorId = $author['auteur_id'];

        // Store the publisher
        $publisher = EditeurController::store($request);
        $publisherId = $publisher['editeur_id'];

        // Handle the cover image upload
        $imageName = time() . $request->image->getClientOriginalName();
        $request->image->move(public_path('img'), $imageName);

        // Prepare data for the BookController
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
}
