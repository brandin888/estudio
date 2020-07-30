<?php

namespace App\Http\Controllers;
use App\Product;
use App\Banner;
use App\Category;
use Illuminate\Http\Request;

class SeguimientoController extends Controller
{
    public function index(){
    	 $categories = Category::all();

        // dd($products);
        return view('seguimiento')->with([
            
            'categories' => $categories,
            
            
        ]);
    	
    }
       

}
