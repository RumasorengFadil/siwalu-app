<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request):RedirectResponse
    {
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
        
        // User::registerAdmin();
        $user = User::register($request);
        
        $request->session()->put('user', $user);
        event(new Registered($user));

        Auth::login($user);
        
        return redirect(route('verification.notice', absolute: false));
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = Validator::make($request->all(), [
            'input-email' => "required|email:rfc,dns",
            'input-password' => "required",
        ], $messages = [
            'required' => 'The :attribute field is required.',
        ],[
            'input-password' => "email",
            'input-email' => "email",
        ])->validate();
        
        if (Auth::attempt(["email" => $credentials["input-email"], "password" => $credentials["input-password"]])) {
            $request->session()->regenerate();
            $user = User::getUser($credentials["input-email"]);

            $request->session()->put('user', $user);

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'error' => 'The provided credentials do not match our records.',
        ])->onlyInput('input-email');
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }
    //todo render
    public function renderRegisterView(){
        return view('register/register');
    }
    public function renderLoginView(){
        return view('login/login');
    }
}
