<?php

namespace App\Http\Controllers;

use App\MobileCategory;
use App\Category;
use App\Brand;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;


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

        
    $session_id = Session::getId();

  

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
    'session_id' => $session_id,
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
    'session_id' => $session_id,
    'otp' => $code,
    'temporary_order_id' => $temporary_order_id,

 ]);





    // return view('front.pages.mobile.otp',compact('data')); 

    return redirect()->route('display_otp_form');


}


public function display_otp_form(){

$session_id = Session::getId();

     
$data = DB::table('session_otp')->orderBy('id', 'desc')->where('session_id',$session_id)->first();

    return view('front.pages.mobile.otp',compact("data"));

}


public function otp_verifier_check(Request $request){

    $session_id = Session::getId();

    $user_otp = $request->otp_code;
     
    $otp_data = DB::table('session_otp')->orderBy('id', 'desc')->where('session_id',$session_id)->first();

    
    if($user_otp == $otp_data->otp){

         return redirect()->route('mobile_order_multi_form');
    }else{
        return redirect()->route('otp_error_message');
    }

    


}


public function otp_error_message(){

    $session_id = Session::getId();

     
$data = DB::table('session_otp')->orderBy('id', 'desc')->where('session_id',$session_id)->first();



    return view("front.pages.mobile.otp_error_message",compact("data"));

}



public function mobile_order_multi_form(){

 $session_id = Session::getId();


 // From Order Table - Mobile 
 $order_mobile_category =  DB::table('order_mobile_categories')->orderBy('id', 'desc')->where('session_id',$session_id)->first();

 // From Product Table - Base on Product ID
 $mobiler_category_product = MobileCategory::where('id',$order_mobile_category->product_id)->first();



 

// $inserted_id = DB::getPdo()->lastInsertId();

 $data = [
     'mobiler_category_product' => $mobiler_category_product,
     'phone_number' => $order_mobile_category->phone_number,
 ];

    return view("front.pages.mobile.mobile_order_multi_form",compact('data'));

}





public function mobile_order_success(Request $request) {

//  return $request->all();

$customer_division = $request->customer_division;

$customer_address = $request->customer_address;

$network_issue_short_notes = $request->network_issue_short_notes;

$termandcondition = $request->termandcondition;



if($termandcondition == NULL) {
    Session::flash('message', 'You Must Select Term and Condition'); 
    Session::flash('class_type', 'danger'); 
    return redirect()->back();

}



 if($customer_division == NULL){
    Session::flash('message', 'Division Must Be Required'); 
    Session::flash('class_type', 'danger'); 


     return redirect()->back();

 }

 
 if($customer_address == NULL){
    Session::flash('message', 'Address Must Be Required'); 
    Session::flash('class_type', 'danger'); 


     return redirect()->back();

 }
  
  
    $category_type = $request->category_type;
  
    $ex_emi_box_charger = $request->one;
  
    $ex_phone_problem = $request->two;
  
    $ex_parts_change = $request->three;
  
    $ex_issue_network = $request->four;

    $network_issue_short_notes = $request->network_issue_short_notes;


        //   Get Data From Session Otp Table and Mobile Order Table
        $session_id = Session::getId();

        // From Order Table - Mobile 
        $order_mobile_category =  DB::table('order_mobile_categories')->orderBy('id', 'desc')->where('session_id',$session_id)->first();

        $session_otp = DB::table('session_otp')->orderBy('id', 'desc')->where('session_id',$session_id)->first();
        

        $product_id  =  $order_mobile_category->product_id;

        $temporary_order_id  = $session_otp->temporary_order_id;

        $phone_number  =  $session_otp->phone;
        
            /** 
         * Check File is uploaded or not  time()."_".
         * front_phone_image
         */

    $front_phone_image = $request->file('front_phone_image');

        
        if ($front_phone_image) {

            $img_name_front = time()."_".$front_phone_image->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $front_phone_image->move($destinationPathOne, $img_name_front);  
        }





                /** 
         * Check File is uploaded or not  time()."_".
         * back_phone_image
         */

        $back_phone_image = $request->file('back_phone_image');

        
        if ($back_phone_image) {
            
            $img_name_back = time()."_".$back_phone_image->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $back_phone_image->move($destinationPathOne, $img_name_back);  
        }


        
              
        
                /** 
         * Check File is uploaded or not  time()."_".
         * top
         */

        $top = $request->file('top');

        
        if ($top) {
            
            $img_name_top = time()."_".$top->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $top->move($destinationPathOne, $img_name_top);  
        }else{

            $img_name_top = null;

        }


        
                /** 
         * Check File is uploaded or not  time()."_".
         * bottom
         */

        $bottom = $request->file('bottom');

        
        if ($bottom) {
            
            $img_name_bottom = time()."_".$bottom->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $bottom->move($destinationPathOne, $img_name_bottom);  
        }else{
            $img_name_bottom = null;
        }


        
                /** 
         * Check File is uploaded or not  time()."_".
         * left
         */

        $left = $request->file('left');

        
        if ($left) {
            
            $img_name_left = time()."_".$left->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $left->move($destinationPathOne, $img_name_left);  
        }else{
            $img_name_left = null;
        }


  /** 
         * Check File is uploaded or not  time()."_".
         * right
         */

        $right = $request->file('right');

        
        if ($right) {
            
            $img_name_right = time()."_".$right->getClientOriginalName();

            $destinationPathOne = public_path('images');

            $right->move($destinationPathOne, $img_name_right);  
        }else{
            $img_name_right = null;
        }






    
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
        'ex_emi_box_charger' => $ex_emi_box_charger,
        'ex_phone_problem' => $ex_phone_problem,
        'ex_parts_change' => $ex_parts_change,
        'ex_issue_network' => $ex_issue_network,
        'network_issue_short_notes' => $network_issue_short_notes,
        'front_phone_image' => $img_name_front,
        'back_phone_image' => $img_name_back,
        'top_img' => $img_name_top,
        'bottom_img' => $img_name_bottom,
        'left_img' => $img_name_left,
        'right_img' => $img_name_right,
        'customer_division' => $customer_division,
        'customer_address' => $customer_address,
        'category_type' => $category_type,
    
    ]);
    $message = "Successfull !! You have placed an Sell Request to LiveLink . We will contact within 24 hours.  Thank you for being with us.";
    $this->smsOrderStatusUpdate($phone_number,$message);


    return redirect()->route('successfully_place_order');







  
}




public function mobile_order_details($id){

    $mobile_category_order = DB::table('orders')->where('id',$id)->first();

    $mobile_category_order_detail = DB::table('order_mobile_categories')->where('id',$mobile_category_order->temporary_order_id)->first();

    $product = DB::table('mobile_categories')->where('id',$mobile_category_order_detail->product_id)->first();
    $brand = DB::table('brands')->where('id',$product->brand_id)->first();


    $data = [
        'mobile_category_order_detail' => $mobile_category_order_detail,
        'product' => $product,
        'brand' => $brand,

    ];
    Session::flash('message', 'Update Successfully'); 

   return view('dashboard.order.mobile.details',compact('data'));
}




public function successfully_place_order(){
    
    return view("front.pages.mobile.orderSuccess");
}







//    Mobile Category Latest Orders - Admin Panel 

public function mobile_category_latest_order(){


    $mobile_category_latest_orders = DB::table('orders')->where('category_type','mobile_category')->orderBy('created_at', 'DESC')->get();

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

    
    $text="<#> ".$code." is your OTP from LiveLink. DO NOT share your OTP or password with anyone. Thank You";
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
