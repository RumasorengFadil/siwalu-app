<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

    public function login(Request $request): RedirectResponse{
        $credentials = Validator::make($request->all(), [
            'input-email' => "required|email:rfc,dns",
            'input-password' => "required",
        ], $messages = [
            'required' => 'The :attribute field is required.',
        ],[
            'input-password' => "email",
            'input-email' => "email",
        ])->validate();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }

        return back()->withErrors([
            'input-email' => 'The provided credentials do not match our records.',
        ])->onlyInput('input-email');
    }
}
