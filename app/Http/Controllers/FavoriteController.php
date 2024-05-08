<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function storeFavorite(Request $request) {
        $request["id_user"] = auth()->user()->only("id")["id"];
        //dd($request->all());
        Favorite::storeFavorite($request);
        return redirect()->back();
    }

    public function renderFavoriteView(){
        return view("/favorite/favoriteView",[
            "favorites" => Favorite::getFavorites()
        ]);
    }
    
}
