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

    function initially_uploaded_crops(Request $request)
    {     
        $initially_uploaded_crops = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status', 'initially_uploaded_crops')->get();
        return view('initially_uploaded_crops',[
            'initially_uploaded_crops' => $initially_uploaded_crops,
        ]);
    }

    function certified_crops(Request $request)
    {     
        $certified_crops = NewCrops::where('user_id', $request->session()->get('user_id'))->where('status', 'certified_crops')->get();
        return view('certified_crops',[
            'certified_crops' => $certified_crops,
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
        $new_crops->status = 'initially_uploaded';
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

    function initially_uploaded_LC(Request $request)
    {     
        $initially_uploaded_LC = DB::table("tbl_users")
            ->join('tbl_crops', 'tbl_crops.user_id', '=', 'tbl_users.id')
            ->select('tbl_users.*', 'tbl_crops.*')
            ->get();
        return view('view_initially_uploaded_LC',[
            'initially_uploaded_LC' => $initially_uploaded_LC,
        ]);
    }

    function inspect_by_LC($id = 5)
    {     
        $inspect_by_LC = DB::table("tbl_crops")
            ->join('tbl_users', 'tbl_crops.user_id', '=', 'tbl_users.id')
            ->where('tbl_crops.id', $id)
            ->get();

        return view('view_inspect_by_LC',[
            'inspect_by_LC' => $inspect_by_LC,
        ]);
    }
    

}
