<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login()
    {
        return view('login');
        
    }

    function logout(Request $request)
    {
        $request->session()->forget(['username', 'password']);
        $request->session()->flush();
        Auth::logout();
        return redirect()->intended('/login');

    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        $user = User::where('username', $credentials['username'])->first();

        if ($user && Auth::guard('web')->attempt($credentials)) {
            session(['fullname' => $user->fullname]);
            return redirect()->intended('/dashboard');
        }
        return redirect()->back()->with('error', 'Invalid username or password');
    }

    function register_page(Request $request)
    {     
        return view('register');
    }

    function register_user(Request $request)
    {
        $user = new User;
        $user->fullname = $request->fullname;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save();
        
        return redirect()->back()->with('success', 'User Creation Successfully Done!');
                
    }

    function dashboard(Request $request)
    {     
        return view('dashboard');
    }

}
