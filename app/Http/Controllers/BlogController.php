<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Categories;
use App\Post;
use App\Specialty;
use Illuminate\Http\Request;



class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = 9;
        $categories = Categories::all();
        $specialties = Specialty::all();

     
        

        if (request()->category) {
            $posts = Post::where('category_id', request()->category)->orderBy('updated_at', 'desc')->paginate(6); 
            

            $categoryName = optional($categories->where('id', request()->category)->first())->name;
        } else {
            
            $posts = Post::orderBy('updated_at', 'desc')->paginate(6);  
            $categoryName  = "Todos Los Artículos";
        }

         
        return view('blog')->with([

            'categories' => $categories,
            'categoryName' => $categoryName,
            'posts' => $posts,
            'specialties' => $specialties,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $post = Post::where('slug', $slug)->firstOrFail();

    //    dd($product);
        $categories = Category::all();
        $posts= Post::all();
        $specialties = Specialty::all();

        return view('post')->with([

            'categories' => $categories,
            'posts' => $posts,
            'post' => $post,
            'specialties' => $specialties,
        ]);
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');

        // $products = Product::where('name', 'like', "%$query%")
        //                    ->orWhere('details', 'like', "%$query%")
        //                    ->orWhere('description', 'like', "%$query%")
        //                    ->paginate(10);

        $products = Product::search($query)->paginate(10);

        return view('search-results')->with('products', $products);
    }

    public function searchAlgolia(Request $request)
    {
         $categories = Category::all();

        if (request()->category) {
            $products = Product::with('categories')->whereHas('categories', function ($query) {
                $query->where('slug', request()->category);
            });
            $categoryName = optional($categories->where('slug', request()->category)->first())->name;
        } else {
            $products = Product::where('featured', true);
            $categoryName = 'Productos más buscados';
        }
        return view('search-results-algolia')->with([
            'products' => $products,
            'categories' => $categories,
            'categoryName' => $categoryName,
        ]);
    }
}
