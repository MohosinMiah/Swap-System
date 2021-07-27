<?php

namespace App\Http\Controllers;

use App\MobileCategory;
use App\Category;
use App\Brand;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class MobileCategoryController extends Controller
{


    public $table = 'mobile_categories';


    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobileCategories = MobileCategory::all();

        return view('dashboard.mobile.all',compact('mobileCategories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $category_id = 9; 

        $categories = Category::all();

        $brands = Brand::where('category_id',$category_id)
        ->get();



        $data = [
            'categories' => $categories,
            'brands' => $brands,
        ];

        return view("dashboard.mobile.create",compact('data'));

    }


    public function brands(Request $request)
    {
         
        $category_id = $request->category_id;
         
        $brands = Brand::where('category_id',$category_id)
        ->get();

        

        return response()->json([
            'brands' => $brands
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         /**
         *  Data  Validation.....
         */

        $v = Validator::make($request->all(), [
            'category_id' => 'required',
            'brand_id' => 'required',
            'mobile_model' => 'required|max:200',
            // 'ram_rom' => 'required',
            'prices'  => 'required',

        ]);


        /**
         * Get Data From User Input
         */
// -------------------------- Main Info ------------------------------------

        $category_id = $request->category_id;

        $brand_id = $request->brand_id;

        $mobile_model = $request->mobile_model;

        $image = $request->file('image');

// -------------------------- Choose a Variant ------------------------------------


        $ram_rom = $request->ram_rom;

        $sim = $request->sim;

        // $camera = $request->camera;

        // $processor = $request->processor;

        // $battery = $request->battery;

        $prices = $request->prices;

// -------------------------- Specifications ------------------------------------


        $specificationram_rom = $request->specificationram_rom;        

        $specificationsim = $request->specificationsim;

        $specificationcamera = $request->specificationcamera;

        $specificationprocessor = $request->specificationprocessor;

        $specificationbattery = $request->specificationbattery;

     
        /** 
         * Check File is uploaded or not  time()."_".
         */


        if ($image) {
            $img_name = time()."_".$image->getClientOriginalName();

            $destinationPathOne = public_path('images');
            $image->move($destinationPathOne, $img_name);  
        }

        
        /**
         * Check Data is Valid or Not
         */


        if ($v->fails()) {

            \Session::flash('message', 'Fail To Save  Data.Please check error messages ....... ');

            return redirect()->back()->withInput()->withErrors($v);

        }else{

            DB::table($this->table)->insert(
                [
                    'category_id' => $category_id,

                    'brand_id' => $brand_id,

                    'mobile_model' => $mobile_model,

                    'image' => $img_name,


                    'ram_rom' => $ram_rom,

                    'sim' => $sim,



                    'prices' => $prices,



                    'specificationram_rom' => $specificationram_rom, 

                    'specificationsim' => $specificationsim,

                    'specificationcamera' => $specificationcamera,

                    'specificationprocessor' => $specificationprocessor,

                    'specificationbattery' => $specificationbattery,


                ]
            );
            \Session::flash('message', ' Data Save Successfully ....... ');

        } 
            

      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MobileCategory  $mobileCategory
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        $mobileCategory = MobileCategory::findOrfail($id);

        return view('dashboard.mobile.show',compact('mobileCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MobileCategory  $mobileCategory
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {

        $categories = Category::all();

        $brands = Brand::all();

        $mobileCategory = MobileCategory::findOrfail($id);


        $data = [
            'categories' => $categories,
            'brands' => $brands,
            'mobileCategory' => $mobileCategory
        ];


        return view('dashboard.mobile.update',compact('data'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MobileCategory  $mobileCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        

  /**
         *  Data  Validation.....
         */

        $v = Validator::make($request->all(), [
            'category_id' => 'required',
            'brand_id' => 'required',
            'mobile_model' => 'required|max:200',
            'ram_rom' => 'required', 
            'prices'  => 'required',
        ]);


        /**
         * Get Data From User Input
         */
// -------------------------- Main Info ------------------------------------

        $category_id = $request->category_id;

        $brand_id = $request->brand_id;

        $mobile_model = $request->mobile_model;

        $image = $request->file('image');

// -------------------------- Choose a Variant ------------------------------------


        $ram_rom = $request->ram_rom;

        $sim = $request->sim;

        // $camera = $request->camera;

        // $processor = $request->processor;

        // $battery = $request->battery;

        $prices = $request->prices;

// -------------------------- Specifications ------------------------------------


        $specificationram_rom = $request->specificationram_rom;        

        $specificationsim = $request->specificationsim;

        $specificationcamera = $request->specificationcamera;

        $specificationprocessor = $request->specificationprocessor;

        $specificationbattery = $request->specificationbattery;

     
       
        
        /**
         * Check Data is Valid or Not
         */


        if ($v->fails()) {

            \Session::flash('message', 'Fail To Save  Data.Please check error messages ....... ');

            return redirect()->back()->withInput()->withErrors($v);

        }else{

            if ($image) {

                 /** 
         * Check File is uploaded or not  time()."_".
         */
        if ($image) {
            $img_name = time()."_".$image->getClientOriginalName();

            $destinationPathOne = public_path('images');
            $image->move($destinationPathOne, $img_name);  
        }


            DB::table($this->table)->where('id',$id)->update(
                [
                    'category_id' => $category_id,

                    'brand_id' => $brand_id,

                    'mobile_model' => $mobile_model,

                    'image' => $img_name,


                    'ram_rom' => $ram_rom,

                    'sim' => $sim,



                    'prices' => $prices,



                    'specificationram_rom' => $specificationram_rom,  
                    
                    'specificationsim' => $specificationsim,

                    'specificationcamera' => $specificationcamera,

                    'specificationprocessor' => $specificationprocessor,

                    'specificationbattery' => $specificationbattery,


                ]
            );


        }else{


            DB::table($this->table)->where('id',$id)->update(
                [
                    'category_id' => $category_id,

                    'brand_id' => $brand_id,

                    'mobile_model' => $mobile_model,


                    'ram_rom' => $ram_rom,

                    'sim' => $sim,



                    'prices' => $prices,



                    'specificationram_rom' => $specificationram_rom,  

                    'specificationsim' => $specificationsim,

                    'specificationcamera' => $specificationcamera,

                    'specificationprocessor' => $specificationprocessor,

                    'specificationbattery' => $specificationbattery,


                ]
            );
        }



            \Session::flash('message', ' Data Save Successfully ....... ');

        } 
            

        return redirect()->back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MobileCategory  $mobileCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id )
    {
        MobileCategory::where('id',$id)->delete();
        return  redirect()->back();
    }
}
