<?php

namespace App\Http\Controllers;
use App\models\User;
use App\models\NewCrops;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CropController extends Controller
{
    
    function crops(Request $request)
    {     
        $my_crops = NewCrops::where('user_id', $request->session()->get('user_id'))->get();
        return view('view_crops',[
            'my_crops' => $my_crops,
        ]);
    }

    function view_add_crops(Request $request)
    {     
        return view('view_add_crops');
    }

    function add_new_crops(Request $request)
    {     
        $new_crops = new NewCrops;

        $new_crops->crop_name = $request->crop_name;
        $new_crops->growing_type = $request->growing_type;
        $new_crops->harvesting_type = $request->harvesting_type;
        $new_crops->sourcing_type = $request->sourcing_type;
        $new_crops->gmo_type = $request->gmo_type;
        $new_crops->description = $request->description;
        $new_crops->quantity_type = $request->quantity_type;
        $new_crops->quantity = $request->quantity;
        $new_crops->price = $request->price;
        $new_crops->status = $request->status;
        $new_crops->user_id = $request->session()->get('user_id');
                        
        $new_crops->save();

        return redirect()->back()->with('success', 'New Crop Added Successfully!');
    }

    function crop_timeline(Request $request)
    {     
        $my_crops = NewCrops::where('user_id', $request->session()->get('user_id'))->get();
        return view('view_crop_timeline',[
            'my_crops' => $my_crops,
        ]);
    }

    function view_investigation(Request $request)
    {     
        $investigation_info = DB::table("tbl_users")
            ->join('tbl_crops', 'tbl_crops.user_id', '=', 'tbl_users.id')
            ->select('tbl_users.*', 'tbl_crops.*')
            ->get();
        //echo "<pre>";print_r($investigation_info);exit;
        return view('view_investigation', ['investigation_info' => $investigation_info]);
    }

    

}
