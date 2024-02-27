<?php

namespace App\Http\Controllers;
use App\models\User;
use App\models\NewCrops;
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
            session(['fullname' => $user->fullname, 'usertype' => $user->usertype, 'user_id' => $user->id, 'balance' => $user->balance]);

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
        $my_crops = NewCrops::where('user_id', $request->session()->get('user_id'))->get();
        $initially_uploaded = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status','initially_uploaded')->get();
        $certified = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status','certified')->get();
        $finally_uploaded = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status','finally_uploaded')->get();
        $sold = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status','sold')->get();

        $initially_uploaded_LC = NewCrops::where('status','initially_uploaded')->get();
        $certified_LC = NewCrops::where('status','certified')->get();

        return view('dashboard',[
            'my_crops' => $my_crops,
            'initially_uploaded' => $initially_uploaded,
            'certified' => $certified,
            'finally_uploaded' => $finally_uploaded,
            'sold' => $sold,
            'initially_uploaded_LC' => $initially_uploaded_LC,
            'certified_LC' => $certified_LC,
        ]);
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
