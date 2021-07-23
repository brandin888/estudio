<?php

namespace App\Http\Controllers;
use App\Product;
use App\Category;
use App\Categories;
use App\Specialty;
use App\Service;
use App\Home;
use App\Us;
use App\Question;
use App\Testimonial;
use Illuminate\Http\Request;

class UsController extends Controller
{
    public function index()
    {
        $pagination = 9;
        
        $specialties = Specialty::all();
        $categories = Categories::all();
        $services = Service::all();
                $home =Home::all();
        $us =Us::all();
        $questions =Question::all();
        $testimonials =Testimonial::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Conoce lo más buscado';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }

        return view('us')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'specialties' => $specialties,
            'services' => $services,
             'home' => $home,
            'us' => $us,
            'questions' => $questions,
            'testimonials' => $testimonials,
        ]);
    }
}
