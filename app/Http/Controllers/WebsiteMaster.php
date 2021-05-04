<?php

namespace App\Http\Controllers;

use App\MobileCategory;
use App\Category;
use App\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class WebsiteMaster extends Controller
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

       return view('front.pages.category',compact('data'));

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



        return view('front.pages.brand',compact('data'));


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
        $mobiler_category_products = MobileCategory::where('mobile_model',$product_name)->first();
  
  

        $data = [
        'mobiler_category_products' => $mobiler_category_products,
        'category_name' => $category_name,
        'brand_name' => $brand_name,
        ];


         var_dump($data['mobiler_category_products']['ram_rom']);
         die;


        return view('front.pages.product',compact('data')); 

    }



}
