<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function landing_page()
{
    $farmer = User::where('usertype', 'farmer')->get();
    $logistic_company = User::where('usertype', 'logistic_company')->get();
    $consumer = User::where('usertype', 'consumer')->get();

    return view('landing_page', [
        'farmer' => $farmer,
        'logistic_company' => $logistic_company,
        'consumer' => $consumer,
    ]);
}

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
        $credentials = $request->only('usertype','username', 'password');
        //echo "<pre>"; print_r($credentials);exit;
        $user = User::where('username', $credentials['username'])->where('usertype',$credentials['usertype'])->first();
        //echo $user;exit;
        if ($user && Auth::guard('web')->attempt($credentials)) {
            session(['fullname' => $user->fullname, 'usertype' => $user->usertype]);

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
        $user->usertype = $request->usertype;
        $user->email = $request->email;
        $user->password = bcrypt($request->password); // Hash the password
        $user->save();
        
        return redirect()->back()->with('success', 'User Creation Successfully Done!');
                
    }
    
    function dashboard(Request $request)
    {     
        return view('dashboard');
    }

    function user_profile(Request $request)
    {     
        return view('view_profile');
    }

    function orders(Request $request)
    {     
        return view('view_order');
    }

    function products(Request $request)
    {     
        return view('view_product');
    }

    function add_product(Request $request)
    {     
        return view('add_product');
    }

}
