<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Validator;
use DB;

class BrandController extends Controller
{
    public $table = "brands";

   
            


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // Admin Login Check 
       if(!Session::get('admin_is_login')){   
        return redirect()->route('admin.loginadmin_login');
     }

        $brands = Brand::all(); 

        return view('dashboard.brand.all',compact('brands'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
       // Admin Login Check 
       if(!Session::get('admin_is_login')){   
        return redirect()->route('admin.loginadmin_login');
     }

        $categories = Category::all(); 

        return view('dashboard.brand.create',compact('categories'));

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
            'name' => 'required|max:200',
            'category_id' => 'required',
        ]);


        /**
         * Get Data From User Input
         */

        $name = $request->name;

        $category_id = $request->category_id;

        $image = $request->file('image');
     
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
                    'name' => $name,

                    'category_id' => $category_id,

                    'image' => $img_name,


                ]
            );
            \Session::flash('message', ' Data Save Successfully ....... ');

        } 
            

      return redirect()->back();



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {
        
       // Admin Login Check 
       if(!Session::get('admin_is_login')){   
        return redirect()->route('admin.loginadmin_login');
     }

        $brand = Brand::findOrfail($id);
        return view("dashboard.brand.show",compact("brand"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        
       // Admin Login Check 
       if(!Session::get('admin_is_login')){   
        return redirect()->route('admin.loginadmin_login');
     }
     
        $brand = Brand::findOrfail($id);
        $categories = Category::all();


        $data = [
            'brand' =>  $brand,
            'categories' => $categories
        ];

        


        return view("dashboard.brand.update",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
      /**
         *  Data  Validation.....
         */

        $v = Validator::make($request->all(), [
            'name' => 'required|max:200',
            'category_id' => 'required',

        ]);


        /**
         * Get Data From User Input
         */

        $name = $request->name;

        $category_id = $request->category_id;

        $image = $request->file('image');
     
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

            if ($image) {

            DB::table($this->table)->where('id',$id)->update(
                [
                    'name' => $name,

                    'category_id' => $category_id,

                    'image' => $img_name,
                ]
            );
        }else{

            DB::table($this->table)->where('id',$id)->update(
                [
                    'name' => $name,
                    'category_id' => $category_id,
                ]
            );

        }

        \Session::flash('message', 'Succesfully Updated ....... ');

        } 

      



       return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        Brand::where('id',$id)->delete();
        return  redirect()->back();

    }
}
