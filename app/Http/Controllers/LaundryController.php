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
       $validator = $request->validate([
        "message" => "required|string|max:255",
    ]);
    //dd($request);
    $laundry = $request->input('laundry-name'); 
    $layanan = $request->input('service-laundry');
    $name = $request->input('name-sender');
    $message = "Halo {$laundry},\n Saya {$name} ingin memesan layanan.\n Berikut pesan yang ingin saya sampaikan:\n\n" . $request->input('message') . "\n\n Terima kasih atas perhatiannya.";
    $nomor_whatsapp = '6285713525374'; // Ganti dengan nomor WhatsApp yang sesuai
    $url_whatsapp = 'https://api.whatsapp.com/send?phone=' . $nomor_whatsapp . '&text=' . urlencode($message);
    // Redirect pengguna ke WhatsApp
    return redirect($url_whatsapp);
    }
}
