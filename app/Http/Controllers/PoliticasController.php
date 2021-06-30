<?php

namespace App\Http\Controllers;

use App\Product;
use App\Banner;
use App\Category;
use App\Post;
use App\Specialty;
use App\Categories;
use Illuminate\Http\Request;

class PoliticasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $posts= Post::latest()->take(3)->get();
        $categories = Category::all();
        $pagination = 9;
        $categories = Categories::all();
        $banners = Banner::all();
        $specialties = Specialty::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Productos más buscados';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        // dd($products);
        return view('politicas')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'banners' => $banners,
            'posts' => $posts,
            'specialties' => $specialties,
        ]);

    }

        public function politicas()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $posts= Post::latest()->take(3)->get();
        $categories = Category::all();
        $pagination = 9;
        $categories = Category::all();
        $banners = Banner::all();
        $specialties = Specialty::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Productos más buscados';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        // dd($products);
        return view('politicas')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'banners' => $banners,
            'posts' => $posts,
            'specialties' => $specialties,
        ]);

    }

        public function cookies()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $posts= Post::latest()->take(3)->get();
        $categories = Category::all();
        $pagination = 9;
        $categories = Category::all();
        $banners = Banner::all();
        $specialties = Specialty::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Productos más buscados';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        // dd($products);
        return view('cookies')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'banners' => $banners,
            'posts' => $posts,
            'specialties' => $specialties,
        ]);

    }

        public function faqs()
    {
        $products = Product::where('featured', true)->take(8)->inRandomOrder()->get();
        $posts= Post::latest()->take(3)->get();
        $categories = Category::all();
        $pagination = 9;
        $categories = Category::all();
        $banners = Banner::all();
        $specialties = Specialty::all();
        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Productos más buscados';
        }

        if (request()->sort == 'low_high') {
            $products = $products->orderBy('price')->paginate($pagination);
        } elseif (request()->sort == 'high_low') {
            $products = $products->orderBy('price', 'desc')->paginate($pagination);
        } else {
            $products = $products->paginate($pagination);
        }
        // dd($products);
        return view('faqs')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'banners' => $banners,
            'posts' => $posts,
            'specialties' => $specialties,
        ]);

    }
}
