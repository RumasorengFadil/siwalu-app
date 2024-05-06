<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;

class FavoriteController extends Controller
{
    public function storeFavorite(Request $request) {
        $request["id_user"] = auth()->user()->only("id")["id"];
        //dd($request->all());
        Favorite::storeFavorite($request);
        return redirect()->back();
    }
    public function updateFavorite() {
        
    }
    
}
