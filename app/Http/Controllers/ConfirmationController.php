<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Featured';
        }     



        if (! session()->has('success_message')) {
            return redirect('/')->with([
            
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
        }

        return view('thankyou')->with([
            
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }
}
