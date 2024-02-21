<?php

namespace App\Http\Controllers;
use App\models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CropController extends Controller
{
    
    function products(Request $request)
    {     
        return view('view_product');
    }

    function add_product(Request $request)
    {     
        return view('add_product');
    }

}
