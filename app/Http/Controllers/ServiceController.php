<?php

namespace App\Http\Controllers;

use App\Product;
use App\Banner;
use App\Category;
use App\Post;
use App\Service;
use App\Specialty;
use App\Categories;
use App\Home;
use App\Us;
use App\Question;
use App\Testimonial;
use Illuminate\Http\Request;

class ServiceController extends Controller
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
        return view('servicios')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
            'banners' => $banners,
            'posts' => $posts,
            'specialties' => $specialties,
            'services' => $services,
            'home' => $home,
            'us' => $us,
            'questions' => $questions,
            'testimonials' => $testimonials,
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
    public function show($slug)
    {

        $service = Service::where('slug', $slug)->firstOrFail();

    //    dd($product);
        $categories = Categories::all();
        $posts= Post::all();
        $specialties = Specialty::all();
        $services = Service::all();
        $home =Home::all();
        $us =Us::all();
        $questions =Question::all();
        $testimonials =Testimonial::all();

        return view('servicios')->with([

            'categories' => $categories,
            'posts' => $posts,
            
            'specialties' => $specialties,
            'services' => $services,
            'service' => $service,
            'home' => $home,
            'us' => $us,
            'questions' => $questions,
            'testimonials' => $testimonials,
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
