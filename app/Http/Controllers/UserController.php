<?php

namespace App\Http\Controllers;
use App\models\Users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    function login()
    {
        //echo "anik";exit;
        $users = Users::all();
        echo $users; exit;
        return view('login');
        
    }

    function register()
    {
        //echo "anik";exit;
        
        return view('register');
        
    }
}
