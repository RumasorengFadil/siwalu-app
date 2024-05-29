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
    public function renderProfileMenuView() {       
        return view('profile.profileListView',[
            "user" => auth()->user()
        ]);
    }
    public function renderView() {       
        return view('profile.profileView',[
            "user" => auth()->user()
        ]);
    }
    public static function updatePhoto(Request $request){
        $request["id_user"] = auth()->user()->only("id")["id"];
        $validate = $request->validate([
            "gambar" => 'image|mimes:jpeg,png,jpg|max:2048',
        ]);

        User::updatePhoto($request);

        return redirect()->route('profileUpdate.show');
    }
    public static function updateUsername(Request $request)
{
    $id_user = auth()->user()->id;

    $validate = $request->validate([
        "username" => "required|string|max:255"
    ]);

    User::updateUsername($id_user, $request->input('username'));

    // Redirect ke halaman profil setelah update
    return redirect()->route('profileUpdate.show')->with('success', 'Username updated successfully.');
}

    
    public static function updatePassword(Request $request)
    {
        $id_user = auth()->user()->id;
        $request["id_user"] = $id_user;
        
        $credentials = Validator::make($request->all(), [
            'oldPassword' => 'required',
            'newPassword' => 'required|min:8|confirmed',
        ], [
            'required' => 'The :attribute field is required.',
            'min' => 'The :attribute must be at least :min characters.',
            'confirmed' => 'The new password confirmation does not match.',
        ], [
            'oldPassword' => 'old password',
            'newPassword' => 'new password',
        ])->validate();

        $user = User::find($id_user);

        if (!Hash::check($request->input('oldPassword'), $user->password)) {
            return redirect()->route('profileUpdate.show')->withErrors(['oldPassword' => 'Old password is incorrect.']);
        }

        // Memperbarui password
        User::updatePassword($request);

        // Redirect ke halaman profil setelah update
        return redirect()->route('profile.show')->with('success', 'Password updated successfully.');
    }

    //todo render
    public function renderRegisterView(){
        return view('register/register');
    }
    public function renderLoginView(){
        return view('login/login');
    }
}
