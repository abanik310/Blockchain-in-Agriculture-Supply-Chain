<?php

namespace App\Http\Controllers;
use App\models\User;
use App\models\Crops;
use App\models\InspectionByLC;
use App\models\CertifiedCrop;
use App\models\PrivateKeyGenerate;
use App\models\Storage;
use App\models\Marketplace;
use App\models\Tokenization;
use App\models\Cart;
use App\models\Order;
use App\models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class CropController extends Controller
{
    
    function crops(Request $request)
    {     
        $my_crops = Crops::where('farmer_id', $request->session()->get('user_id'))->get();
        return view('view_crops',[
            'my_crops' => $my_crops,
        ]);
    }

    function initially_uploaded_crops(Request $request)
    {     
        $initially_uploaded_crops = Crops::where('farmer_id', $request->session()->get('user_id'))->where('status', 'initially_uploaded')->get();
        return view('initially_uploaded_crops',[
            'initially_uploaded_crops' => $initially_uploaded_crops,
        ]);
    }

    function certified_crops(Request $request)
    {     
        //$certified_crops = CertifiedCrop::where('farmer_id', $request->session()->get('user_id'))->where('status', 'certified')->get();
        
        $certified_crops = DB::table("tbl_certified")
            ->join('tbl_crops', 'tbl_crops.farmer_id', '=', 'tbl_certified.farmer_id')
            ->select('tbl_certified.*', 'tbl_crops.*')
            ->get();

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
        $new_crops = new Crops;

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
        $new_crops->farmer_id = $request->session()->get('user_id');
                        
        $new_crops->save();

        return redirect()->back()->with('success', 'New Crop Added Successfully!');
    }

    function crop_timeline(Request $request)
    {     
        $my_crops = Crops::where('farmer_id', $request->session()->get('user_id'))->get();
        return view('view_crop_timeline',[
            'my_crops' => $my_crops,
        ]);
    }

    function generate_key(Request $request)
    {     
        
        $crop_for_private_key = new PrivateKeyGenerate();
        $crop_for_private_key->crop_id = $request->crop_id;
        $crop_for_private_key->save();

        $crop = Crops::where('id', $request->crop_id)->first();
        $crop->status = 'private_key_generated';
        $crop->private_key = $crop_for_private_key->id;
        $crop->save();

        return redirect()->back()->with('success', 'Private Key Generate Successfully!');
    }

    function private_key_generate(Request $request)
    {     
        $certified_crops = Crops::where('status', 'certified')->where('farmer_id', $request->session()->get('user_id'))->get();

        $crop_id = $certified_crops->pluck('id'); // Extract the 'id' values into an array

        $crop_for_private_key = PrivateKeyGenerate::whereIn('crop_id', $crop_id)->get();
        
        return view('view_private_key_generator',[
            'certified_crops' => $certified_crops,
            'crop_for_private_key' => $crop_for_private_key,
        ]);
    }

    function tokenization(Request $request)
    {     
        $certified_crops = Crops::where('status', 'private_key_generated')->where('farmer_id', $request->session()->get('user_id'))->get();

        $crop_id = $certified_crops->pluck('id'); // Extract the 'id' values into an array

        $crop_for_private_key = PrivateKeyGenerate::whereIn('crop_id', $crop_id)->get();
        
        return view('view_tokenization',[
            'certified_crops' => $certified_crops,
            'crop_for_private_key' => $crop_for_private_key,
        ]);
    }


    function view_investigation(Request $request)
    {     
        $investigation_info = DB::table("tbl_users")
            ->join('tbl_crops', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            ->select('tbl_users.*', 'tbl_crops.*')
            ->get();
        //echo "<pre>";print_r($investigation_info);exit;
        return view('view_investigation', ['investigation_info' => $investigation_info]);
    }

    function initially_uploaded_LC(Request $request)
    {     
        $initially_uploaded_LC = DB::table("tbl_users")
            ->join('tbl_crops', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            ->where('tbl_crops.status', '=', 'initially_uploaded')
            ->select('tbl_users.*', 'tbl_crops.*')
            ->get();
        return view('view_initially_uploaded_LC',[
            'initially_uploaded_LC' => $initially_uploaded_LC,
        ]);
    }

    function inspect_by_LC($id)
    {     
        
        $inspect_by_LC = DB::table("tbl_crops")
            ->join('tbl_users', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            ->where('tbl_crops.id', $id)
            ->select('tbl_crops.*', 'tbl_users.*')
            ->get();
            session(['crop_id' => $id]);
            session(['inspect_by_LC' => $inspect_by_LC]);

        return view('view_inspect_by_LC', [
            'inspect_by_LC' => $inspect_by_LC,
        ]);
    }

    function add_inspection_certificate(Request $request)
    {     
        $inspection_by_LC = new InspectionByLC;
        $crop_id = session('crop_id');
        // $tbl_crop = DB::table("tbl_crops")
        //     ->where('tbl_crops.id', $crop_id)
        //     ->first();
        $tbl_crop = Crops::where('id', $crop_id)->first();
        
        $inspect_by_LC = session('inspect_by_LC');
        $farmer_id = $inspect_by_LC->pluck('user_id')->first();

        $inspection_by_LC->farmer_id = $farmer_id;
        $inspection_by_LC->crop_id = $crop_id;
        $inspection_by_LC->growing_type = $request->growing_type;
        $inspection_by_LC->harvesting_type = $request->harvesting_type;
        $inspection_by_LC->sourcing_type = $request->sourcing_type;
        $inspection_by_LC->gmo_type = $request->gmo_type;
        $inspection_by_LC->quantity_info = $request->quantity_info;
        $inspection_by_LC->comment = $request->comment;
        $inspection_by_LC->about_price = $request->about_price;
        $inspection_by_LC->save();

        $tbl_crop->status = 'certified';
        $tbl_crop->save();  

        $certified_crop = New CertifiedCrop();
        $certified_crop->crop_id = $crop_id;
        $certified_crop->save();                

        return redirect()->back()->with('success', 'Certificate Added Successfully!');
    }

    
    function certified_crops_LC(Request $request)
    {     
        //$certified_crops = CertifiedCrop::all();
        $certified_crops = DB::table("tbl_certified")
            ->join('tbl_crops', 'tbl_crops.farmer_id', '=', 'tbl_certified.farmer_id')
            ->select('tbl_certified.*', 'tbl_crops.*')
            ->get();
            //print_r($certified_crops);exit;
        // $inspect_by_LC = collect(); // Initialize an empty collection

        // foreach ($certified_crops as $crop) {
        //     $inspection = InspectionByLC::where('crop_id', $crop->id)->first();
        //     $inspect_by_LC->push($inspection);
        // }
        //print_r($inspect_by_LC);exit;
        return view('certified_crops', [
            'certified_crops' => $certified_crops,
            // 'inspect_by_LC' => $inspect_by_LC,
        ]);
    }

    function view_store_crop(Request $request)
    {     
        $key_crops = Crops::where('status', 'private_key_generated')->where('farmer_id', $request->session()->get('user_id'))->get();


        $store_crops = DB::table("tbl_storage")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_storage.crop_id')
            ->join('tbl_users', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            ->join('tbl_tokenization', 'tbl_crops.id', '=', 'tbl_tokenization.crop_id')
            ->where('tbl_crops.farmer_id', $request->session()->get('user_id'))
            ->select('tbl_crops.id as crop_id','tbl_crops.crop_name','tbl_crops.status','tbl_crops.quantity_type','tbl_crops.quantity','tbl_crops.farmer_id','tbl_crops.price','tbl_crops.private_key','tbl_tokenization.token', 'tbl_storage.storage_area','tbl_storage.created_at')
            ->get();
        $crop_id = $key_crops->pluck('id'); // Extract the 'id' values into an array
        //$crop_for_private_key = PrivateKeyGenerate::whereIn('crop_id', $crop_id)->get();
        
        return view('view_store_crop',[
            'key_crops' => $key_crops,
            'crop_id' => $crop_id,
            'store_crops' => $store_crops,
        ]);
    }

        function crop_store(Request $request)
    {  
        $crop_id = $request->input('crop_id');
        $storage_area = $request->input('storage_area');
        
        $crop = Crops::where('status', 'private_key_generated')
                            ->where('id', $crop_id)
                            ->first();
        
        $tokens = new Tokenization();
        $tokens->owner_id = $request->session()->get('user_id');
        $tokens->crop_id = $request->input('crop_id'); // Use $crop->id
        $tokens->private_key = $crop->private_key; // Use $key_crop->private_key
        $tokens->token = $tokens->owner_id . $tokens->crop_id . strtoupper(substr($storage_area, -2)) . $crop->private_key . strtoupper(substr($storage_area, 0, 3));
        $tokens->save();

        $store_crop = new Storage();
        $store_crop->crop_id = $crop_id;
        $store_crop->storage_area = $storage_area;
        $store_crop->private_key = $crop->private_key;
        $store_crop->token = $tokens->token;
        $store_crop->save();

        $crop->status = 'stored_in_storage';
        $crop->status = $tokens->token;
        $crop->save();
        //echo '<pre>';print_r($store_crop);exit;
        
        
        return redirect()->back()->with('success', 'Store Crop Successfully!');
    }

    function add_to_marketplace(Request $request)
    {     
        $crop = Crops::where('id', $request->crop_id)->first();

        $crop_for_marketplace = new Marketplace();
        $crop_for_marketplace->crop_id = $request->crop_id;
        $crop_for_marketplace->farmer_id = $request->session()->get('user_id');
        $crop_for_marketplace->token = $crop->token;
        $crop_for_marketplace->save();

        
        $crop->status = 'on_marketplace';
        $crop->marketplace_id = $crop_for_marketplace->id;
        $crop->save();

        return redirect()->back()->with('success', 'Crop Added in Marketplace Successfully!');
    }

    function crops_on_marketplace(Request $request)
    {     
        $crops_on_marketplace = DB::table("tbl_marketplace")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_marketplace.crop_id')
            ->where('tbl_crops.status', '=', 'on_marketplace')
            ->select('tbl_crops.*','tbl_marketplace.*')
            ->get();
        return view('crops_on_marketplace',[
            'crops_on_marketplace' => $crops_on_marketplace,
        ]);
    }

    function marketplace(Request $request)
    {     
        $marketplace_items = DB::table("tbl_marketplace")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_marketplace.crop_id')
            ->where('tbl_crops.status', '=', 'on_marketplace')
            ->select('tbl_crops.*','tbl_marketplace.*')
            ->get();
        return view('marketplace',[
            'marketplace_items' => $marketplace_items,
        ]);
    }

    function marketplace_details(Request $request, $id)
    {     
        $marketplace_details = DB::table("tbl_marketplace")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_marketplace.crop_id')
            ->where('tbl_marketplace.id', '=', $id)
            ->select('tbl_crops.*','tbl_marketplace.*')
            ->get();
        //print_r($marketplace_details);exit;
        return view('marketplace_details',[
            'marketplace_details' => $marketplace_details,
        ]);
    }

    function add_cart(Request $request)
    {     
        //echo $request->id;exit;

        $cart_items = DB::table("tbl_marketplace")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_marketplace.crop_id')
            ->where('tbl_marketplace.id', '=', $request->id)
            ->select('tbl_crops.quantity','tbl_crops.quantity_type','tbl_crops.price','tbl_marketplace.crop_id','tbl_marketplace.farmer_id',)
            ->get();
        
        foreach ($cart_items as $cart_item) {
            $add_to_cart = new Cart();
            $add_to_cart->crop_id = $cart_item->crop_id;
            $add_to_cart->farmer_id = $cart_item->farmer_id;
            $add_to_cart->quantity = $cart_item->quantity;
            $add_to_cart->quantity_type = $cart_item->quantity_type;
            $add_to_cart->price = $cart_item->price;
            $add_to_cart->total_price = $add_to_cart->quantity * $cart_item->price;
            $add_to_cart->save(); 
        }

        return redirect()->back()->with('success', 'Crop Added to Cart Successfully!');
    }
    function cart_list(Request $request)
    {     
        $cart_list = DB::table("tbl_cart")
            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_cart.crop_id')
            ->join('tbl_users', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            //->where('tbl_marketplace.id', '=', $id)
            ->select('tbl_crops.crop_name','tbl_users.fullname as farmer_name','tbl_cart.quantity','tbl_cart.id','tbl_cart.quantity_type','tbl_cart.price')
            ->get();
        //print_r($cart_list);exit;
        return view('view_cart_list',[
            'cart_list' => $cart_list,
        ]);
    }

    function view_make_payment(Request $request)
    {     
        //echo $request->id;exit;
        $cart_list = DB::table("tbl_cart")

            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_cart.crop_id')
            ->join('tbl_users', 'tbl_cart.farmer_id', '=', 'tbl_users.id')
            ->where('tbl_cart.id', '=', $request->id)
            ->select('tbl_cart.id','tbl_cart.total_price','tbl_cart.crop_id','tbl_cart.farmer_id','tbl_crops.crop_name','tbl_crops.token','tbl_users.fullname as farmer_name','tbl_cart.quantity','tbl_cart.id','tbl_cart.quantity_type','tbl_cart.price')
            ->first();

        
            $order = new Order();
            $order->invoice_id = '200' . $cart_list->id;
            $order->crop_id = $cart_list->crop_id;
            $order->farmer_id = $cart_list->farmer_id;
            $order->consumer_id = $request->session()->get('user_id');
            $order->quantity = $cart_list->quantity;
            $order->quantity_type = $cart_list->quantity_type;
            $order->price = $cart_list->price;
            $order->total_price = $cart_list->total_price;
            $order->status = 'initial';
            $order->token = $cart_list->token;
            $order->cart_id = $cart_list->id;
            $order->save();
            // $invoice->order_id = $order->id;
            // $invoice->save();
            $consumer_name = DB::table("tbl_order")
            ->join('tbl_users', 'tbl_order.consumer_id', '=', 'tbl_users.id')
            ->where('tbl_order.consumer_id', '=', $order->consumer_id)
            ->select('tbl_users.fullname')
            ->first();

        //echo "<pre>";print_r($order);exit;
        return view('view_make_payment',[
            'cart_list' => $cart_list,
            'order' => $order,
            'consumer_name' => $consumer_name,
        ]);
    }

    function submit_payment(Request $request)
    {     
        //echo $request->order_id;exit;
        
        $order_item = DB::table("tbl_order")

            ->join('tbl_crops', 'tbl_crops.id', '=', 'tbl_order.crop_id')
            ->join('tbl_users', 'tbl_crops.farmer_id', '=', 'tbl_users.id')
            ->where('tbl_order.id', '=', $request->order_id)
            ->select('tbl_users.balance as consumer_balance','tbl_users.balance','tbl_order.total_price','tbl_order.crop_id','tbl_crops.crop_name','tbl_crops.token','tbl_users.fullname as farmer_name')
            ->first();
            
             if($order_item->consumer_balance >= $order_item->total_price)
             {
                echo "if";exit;
             }
             else
             {
                echo "else";exit;
             }
        
            $order = new Order();
            //$invoice = new Invoice();
            $order->invoice_id = '200' . $cart_list->id;
            $order->crop_id = $cart_list->crop_id;
            $order->farmer_id = $cart_list->farmer_id;
            $order->consumer_id = $request->session()->get('user_id');
            $order->quantity = $cart_list->quantity;
            $order->quantity_type = $cart_list->quantity_type;
            $totalPrice = $cart_list->quantity * $cart_list->price;
            $order->total_price = $totalPrice;
            $order->status = 'initial';
            $order->token = $cart_list->token;
            $order->cart_id = $cart_list->id;
            $order->save();
            // $invoice->order_id = $order->id;
            // $invoice->save();
            $consumer_name = DB::table("tbl_order")
            ->join('tbl_users', 'tbl_order.consumer_id', '=', 'tbl_users.id')
            ->where('tbl_order.consumer_id', '=', $order->consumer_id)
            ->select('tbl_users.fullname')
            ->first();

        //print_r($cart_list);exit;
        return view('view_make_payment',[
            'cart_list' => $cart_list,
            'order' => $order,
            'consumer_name' => $consumer_name,
        ]);
    }
    
    

}
