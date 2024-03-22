<?php

namespace App\Http\Controllers;
use App\models\User;
use App\models\Crops;
use App\models\CertifiedCrop;
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
        $my_crops = Crops::where('farmer_id', $request->session()->get('user_id'))->get();
        $initially_uploaded = Crops::where('farmer_id', $request->session()->get('user_id'))->where('status','initially_uploaded')->get();
        $certified = CertifiedCrop::where('farmer_id', $request->session()->get('user_id'))->get();
        $finally_uploaded = Crops::where('farmer_id', $request->session()->get('user_id'))->where('status','finally_uploaded')->get();
        $crop_on_marketplace = Crops::where('farmer_id', $request->session()->get('user_id'))->where('status','on_marketplace')->get();

        $sold = Crops::where('farmer_id', $request->session()->get('user_id'))->where('status','sold')->get();

        $initially_uploaded_LC = Crops::where('status','initially_uploaded')->get();
        $certified_LC = CertifiedCrop::all();

        return view('dashboard',[
            'my_crops' => $my_crops,
            'initially_uploaded' => $initially_uploaded,
            'certified' => $certified,
            'finally_uploaded' => $finally_uploaded,
            'sold' => $sold,
            'initially_uploaded_LC' => $initially_uploaded_LC,
            'certified_LC' => $certified_LC,
            'crop_on_marketplace' => $crop_on_marketplace,
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

    function recharge_balance_view(Request $request)
    {     
        return view('view_recharge_balance');
    }

    function recharge_amount(Request $request, $amount)
    {     
       
        $user = User::where('id', session('user_id'))->first();
        //echo $user;exit;
        //print_r(session()->all());exit;
        $currentBalance = $user->balance; 
        $newBalance = $currentBalance + $amount;
        $user->balance = $newBalance;
        $user->save();
        session(['balance' => $newBalance]); // Update the balance in the session

        return redirect()->back()->with('success', 'Balance recharged successfully!');
    }
    

}
