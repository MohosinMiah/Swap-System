<?php

namespace App\Http\Controllers;

use App\MobileCategory;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use Session;


class MobileCategoryMaster extends Controller
{

    // Display Swap Product Based On Category, Model , Brand and Etc    **********************

    public function index(){

        $data = [
            'categories' => Category::all(),
        ];

        return view('front.include.index',compact('data'));

    }


    // Display All brand based on single category

    public function single_category($category){
        
           // Remove - character from url
           $category_name = str_replace('-',' ',$category);
          
            // Find out category details based on category name
           $get_category = Category::where('name',$category_name)->first();

        
           $cat_id = $get_category->id;

            // Find out brnad details based on category id
           $brands = Brand::where('category_id',$cat_id)->get();


        $data = [

            'brands' => $brands,
            'category_name' => $category_name,

        ];

       return view('front.pages.mobile.category',compact('data'));

    }

    // Display All Product based on Single Brand

    public function single_brand( $category , $brand ){


        // Remove - character from url
        $category_name = str_replace('-',' ',$category);
                
        // Find out category details based on category name
        $get_category = Category::where('name',$category_name)->first();


        $cat_id = $get_category->id;

        // Find out brnad details based on category id
        $brands = Brand::where('category_id',$cat_id)->get();

        // Remove - character from url ****************************     ******************************************************************************
        $brand_name = str_replace('-',' ',$brand);
            
        // Find out category details based on category name
        $get_brand = Brand::where('name',$brand_name)->first();


        $brand_id = $get_brand->id;

        // Find out all product based on category id and brand id from "mobile_categories" table  
        $products = MobileCategory::where('category_id', $cat_id)
                                    ->where('brand_id' , $brand_id)
                                    ->get();
        
           
                

        $data = [
        'products' => $products,
        'category_name' => $category_name,
        'brand_name' => $brand_name,
        ];



        return view('front.pages.mobile.brand',compact('data'));


    }




    // Single Product Details based on category ,  brand and product model

    public function single_product($category, $brand, $product){

        
        // Remove - character from url
        $category_name = str_replace('-',' ',$category);
                
        // Find out category details based on category name
        $get_category = Category::where('name',$category_name)->first();


        $cat_id = $get_category->id;

        // Find out brnad details based on category id
        $brands = Brand::where('category_id',$cat_id)->get();

        // Remove - character from url ****************************     ******************************************************************************
        $brand_name = str_replace('-',' ',$brand);
            
        // Find out Brand details based on brand name
        $get_brand = Brand::where('name',$brand_name)->first();


        $brand_id = $get_brand->id;

        // Remove - character from url ****************************     ******************************************************************************
        $product_name = str_replace('-',' ',$product);
        
        // Find out product details based on product name
        $mobiler_category_product = MobileCategory::where('mobile_model',$product_name)->first();
  
  

        $data = [
        'mobiler_category_product' => $mobiler_category_product,
        'category_name' => $category_name,
        'brand_name' => $brand_name,
        ];





        return view('front.pages.mobile.product',compact('data')); 

    }



    function single_product_get_value($category, $brand, $product){
        echo "Single Product Get Value";
        die;

    }


    function get_val(Request $request){



        $get_ram_rom_id = $request->get_ram_rom_id;
        $get_sim_id = $request->get_sim_id;


        $category_id = $request->category_id;
        $brand_id = $request->brand_id;
        $product_id = $request->product_id;



        $price_id = 0;

            
        // Find out product details based on product ID
        $mobiler_category_product = MobileCategory::where('id',$product_id)->first();


        // Array 
//   $ram_rom_array = explode(',', $mobiler_category_product->ram_rom;
//   $sim_array = explode(',', $mobiler_category_product->sim;
  $prices_array = explode(',', $mobiler_category_product->prices);



       if($get_ram_rom_id == 0 && $get_sim_id == 0) {
        $price_id = 0;
       }else if($get_ram_rom_id == 1 && $get_sim_id == 0){
        $price_id = 1;

       }else if($get_ram_rom_id == 3  && $get_sim_id == 0){
        $price_id = 2;

       }else if($get_ram_rom_id == 0 && $get_sim_id == 1){
        $price_id = 3;

       }else if($get_ram_rom_id == 1 && $get_sim_id == 1){
        $price_id = 4;

       }else if($get_ram_rom_id == 2 && $get_sim_id == 1){
        $price_id = 5;
       }


 
  // Array 
//   $ram_rom_array = explode(',', $dmobiler_category_product->ram_rom;
//   $sim_array = explode(',', $dmobiler_category_product->sim;
//   $prices_array = explode(',', $dmobiler_category_product->prices);
  

 $estimated_value = $prices_array[$price_id];


       return response()->json([
        'get_ram_rom_id' => $get_ram_rom_id,
        'get_sim_id' => $get_sim_id,
        'category_id' => $category_id,
        'brand_id' => $brand_id,
        'product_id' => $product_id,
        'estimated_value' => $estimated_value,
    ]);

    }



   
  // Single Product Details based on category ,  brand and product model

  public function get_more_info_send_sms($category, $brand, $product,Request $request){

        
    $category_id = $request->get_category_id;
    $brand_id = $request->get_brand_id;
    $product_id = $request->get_product_id;
    $phone_number = $request->phone_number;

   
   

    // Remove - character from url ****************************     ******************************************************************************
    
    // Find out product details based on product name
    $mobiler_category_product = MobileCategory::where('id',$product_id)->first();

// echo "Product ID ". $product_id;
// die;

    $ram_rom = null;
    $sim = null;

    $get_ram_rom_id = 0; 
    $get_sim_id = 0;

    

    if($request->set_ram_rom_id != 'null'){

        $set_ram_rom_id = $request->set_ram_rom_id;

        $get_ram_rom_id = $set_ram_rom_id;

        $ram_rom_array = explode(',', $mobiler_category_product->ram_rom);

        $ram_rom = $ram_rom_array[$set_ram_rom_id];
    }


    if($request->set_sim_id != 'null'){

        $set_sim_id = $request->set_sim_id;

        $get_sim_id = $set_sim_id;

        $sim_array = explode(',', $mobiler_category_product->sim);

        $sim = $sim_array[$set_sim_id];
    }


    $prices_array = explode(',', $mobiler_category_product->prices);

   
    
    

    if($get_ram_rom_id == 0 && $get_sim_id == 0) {
     $price_id = 0;
    }else if($get_ram_rom_id == 1 && $get_sim_id == 0){
     $price_id = 1;

    }else if($get_ram_rom_id == 3  && $get_sim_id == 0){
     $price_id = 2;

    }else if($get_ram_rom_id == 0 && $get_sim_id == 1){
     $price_id = 3;

    }else if($get_ram_rom_id == 1 && $get_sim_id == 1){
     $price_id = 4;

    }else if($get_ram_rom_id == 2 && $get_sim_id == 1){
     $price_id = 5;
    }



// Array 
//   $ram_rom_array = explode(',', $dmobiler_category_product->ram_rom;
//   $sim_array = explode(',', $dmobiler_category_product->sim;
//   $prices_array = explode(',', $dmobiler_category_product->prices);


$estimated_price = $prices_array[$price_id];



    // send OTP code 
    $code = rand(1000,9999);

    $this->sendSms($phone_number,$code);


  


  $temporary_order_id = DB::table('order_mobile_categories')->insertGetId([

    'product_id' => $product_id,
    'category_id' => $category_id,
    'brand_id' => $brand_id,
    'phone_number' => $phone_number,
    'ram_rom' => $ram_rom,
    'sim' => $sim,
    'estimated_price' => $estimated_price,
    'order_id' =>1, 
    'category_type' => 'mobile'

]);




 DB::table('session_otp')->insert([

    'phone' => $phone_number,
    'otp' => $code,
    'temporary_order_id' => $temporary_order_id,

 ]);



 $mobiler_category_product = MobileCategory::where('id',$product_id)->first();


// $inserted_id = DB::getPdo()->lastInsertId();

 $data = [
     'temporary_order_id' => $temporary_order_id,
     'mobiler_category_product' => $mobiler_category_product,
     'phone_number' => $phone_number,
     'sended_otp_code' => $code,
 ];


    return view('front.pages.mobile.sendOTP',compact('data')); 

}







public function mobile_order_success(Request $request) {


    $temporary_order_id = $request->temporary_order_id;
  
    $phone_number = $request->phone_number;
  
    $category_type = $request->category_type;

    $product_id = $request->product_id;
  
    $otp_code = $request->otp_code;
  
    $one = $request->one;
  
    $two_short_note = $request->two_short_note;
  
    $three_short_note = $request->three_short_note;
  
    $four_short_note = $request->four_short_note;
  
//   Check OTP based on Mobile Number (Latest Sended OTP) 
   
   $otp_code_is_valid =  false;

   $session_order = DB::table('session_otp')->where('phone',$phone_number)->orderBy('id', 'DESC')->first(); 

 if($session_order->otp == $otp_code){
    $otp_code_is_valid = true;
 }

    if($otp_code_is_valid){ 
    // Save Data in Orders Table and get the inserted ID 

   $order_id = DB::table('orders')->insertGetId([
    'product_id' => $product_id,
    'temporary_order_id' => $temporary_order_id,
    'phone_number' => $phone_number,
    'category_type' => $category_type,
 ]);



// Update Mobile Category Temporary Order Data Basedon ID 
    DB::table('order_mobile_categories')
    ->where('id', $temporary_order_id)
    ->update([
        'order_id' => $order_id,
        'ex_emi_box_charger' => $one,
        'ex_phone_problem' => $two_short_note,
        'ex_parts_change' => $three_short_note,
        'ex_issue_network' => $four_short_note,
        'category_type' => $category_type,
    
    ]);

    return redirect()->route('successfully_place_order');

    } else{

        die;
        return redirect()->route('successfully_place_order');


    }




  
}







public function successfully_place_order(){
    
    return view("front.pages.mobile.orderSuccess");
}







//    Mobile Category Latest Orders - Admin Panel 

public function mobile_category_latest_order(){


    $mobile_category_latest_orders = DB::table('orders')->where('category_type','mobile_category')->orderBy('id', 'DESC')->get();

    $data = [
        'mobile_category_latest_orders' => $mobile_category_latest_orders,
    ];


    return view("dashboard.order.mobile.all",compact('data'));

}



// Generic Update Order Status 

public function generic_update_order_status(Request $request){

    $status = $request->order_status_value;

             if($status == 0){
                return redirect()->back();

             }
         $order_id = $request->order_id;
         $phone_number = $request->phone_number;
         $status_meaning = $this->order_status_meaning($status);

         $message = "Update From Live Link BD, Order ID = ".$order_id.". Order Status Updated.Your Order is ".$status_meaning." Contact 24/7 for Help : +8801857126452";

     $this->smsOrderStatusUpdate($phone_number,$message);
    //    echo $sms_status;
    //    echo "</br> Order ID  ".$order_id;
    //    echo "</br> Phone Number ".$phone_number;
    //    echo "</br> Status ".$status;
    //    echo "</br> Status  ".$status;
    //    var_dump($status);
    //    die;
         
        // Update Orders Info based on Order ID 
        DB::table('orders')
        ->where('id', $order_id)
        ->update([
            'status' => $status,
        ]);
        
        Session::flash('message', 'Update Successfully'); 

        return redirect()->back();

}









public function order_status_meaning($status){
    $status_meaning = "";

         switch ($status) {
            case 1:
                $status_meaning = "Processing";
                break;
            
            case 2:
                $status_meaning = "Success";
                break;
                
            case 3:
                $status_meaning = "Cancel";
                break;
            
                default:
                $status_meaning = "";
                 break;
         }

         return $status_meaning;
}











public function smsOrderStatusUpdate($phone_number,$message){

// Twilio::message('8801816073636', $code);
    // to  8801857126452
    //  ar  8801767086814


    $url = "http://66.45.237.70/api.php";

    // $number="8801857126452";
    // $text="Hello Dear, Customer . Your OPT  Code ".$code;

    
    $data= array(
    'username'=>"01857126452",
    'password'=>"2RVXW48F",
    // 
    'number'=>"$phone_number",
    'message'=>"$message"
    );


    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    $p = explode("|",$smsresult);
    $sendstatus = $p[0];
    return $sendstatus;

}






public function sendSms($number,$code){
  

    // Twilio::message('8801816073636', $code);
    // to  8801857126452
    //  ar  8801767086814


    $url = "http://66.45.237.70/api.php";

    // $number="8801857126452";
    // $text="Hello Dear, Customer . Your OPT  Code ".$code;

    
    $text="From Live Link BD Dashboard OPT code =  ".$code;
    $data= array(
    'username'=>"01857126452",
    'password'=>"2RVXW48F",
    // 
    'number'=>"$number",
    'message'=>"$text"
    );


    $ch = curl_init(); // Initialize cURL
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $smsresult = curl_exec($ch);
    $p = explode("|",$smsresult);
    $sendstatus = $p[0];
    return $sendstatus;

}



}
