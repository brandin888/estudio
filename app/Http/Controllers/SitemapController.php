<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Specialty;
use App\Post;
use Illuminate\Http\Request;


class SitemapController extends Controller
{
    
    public function index(Request $r)
    {
       
        $posts = Post::orderBy('id','desc')->where('status', 'PUBLISHED')->get();
        $posts = Post::orderBy('id','desc')->where('status', 'PUBLISHED')->get();
        $specialties = Specialty::orderBy('id','desc')->get();
        return response()->view('sitemap', compact('posts','specialties'))
          ->header('Content-Type', 'text/xml');

    }
}