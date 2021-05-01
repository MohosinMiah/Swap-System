<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class WebsiteMaster extends Controller
{

    // Display Swap Product Based On Category, Model , Brand and Etc    **********************

    public function index(){

        return view('front.include.index');

    }


}
