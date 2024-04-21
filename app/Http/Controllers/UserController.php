<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request){
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'input-username' => 'required|max:30',
            'input-email' => "required|email:rfc,dns",
            'input-password' => ['required',Password::min(8)->mixedCase()->symbols()->uncompromised()],
        ], $messages = [
            'required' => 'The :attribute field is required.',
        ],[
            'input-username' => "username",
            'input-password' => "email",
            'input-email' => "email",
        ])->validate();
        
        User::register($validator);

        return redirect("register");
    }
}
