<?php

namespace App\Http\Controllers;

use App\Models\Laundry;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LaundryController extends Controller
{
    public function renderHomeView()
    {
        // Laundry::postLaundry();
        // User::registerAdmin();

        return view("/home/home", [
            "laundries" => Laundry::getLaundries()
        ]);
    }

    public function renderDetailLaundryView($idLaundry)
    {
        return view("/detailLaundry/detailLaundry", [
            "laundry" => Laundry::getLaundry($idLaundry),
            "ratings" => Laundry::getLaundry($idLaundry)->ratings,
            "favorite" => Favorite::getFavorite(
                $idLaundry,
                auth()->user() ?
                auth()->user()->id :
                null
            ),
        ]);
    }

    public function sendMessage(Request $request)
    {
        // dd($request);
    $validator = $request->validate([
        "inputName" => "required|string|max:255",
        "inputLaundry" => "required",
        "inputLaundryWaNumber" => "required"
    ]);
    $whatsappNumber = substr($validator["inputLaundryWaNumber"],1);
    $message = "Hallo {$validator["inputLaundry"]} perkenalkan saya {$validator["inputName"]} Saya ingin memesan layanan laundry yang tersedia di toko kalian";
    $url_whatsapp = 'https://api.whatsapp.com/send?phone=' . "62$whatsappNumber" . '&text=' . urlencode($message);
    // Redirect pengguna ke WhatsApp
    return redirect($url_whatsapp);
    }
}
