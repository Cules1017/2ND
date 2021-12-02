<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(20)->get();
        return view('welcome', compact('posts'));
    }
    public function search(){
         // $q = Request();
        
          $q = Request::get('q');
          if($q){
                $posts = Post::where('description','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->paginate(10);
                return view('posts.search' , compact('posts',  'q'));}
         else   {
                    $posts = Post::orderBy('created_at', 'desc')->take(20)->get();
                    return view('welcome', compact('posts'));}
    }
//     public function searchbyprice(){
//         // $q = Request();
//          $q = Request::get('q');
//          $max_price=Request::get('price');
//          $min_price=$max_price-1000000;
//         $posts = Post::where('description','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->whereBetween('price', [$min_price, $max_price])->paginate(10);
        
//        return view('posts.search' , compact('posts'));
//    }
//    $inventory = Inventory::where('category', $cat)
//    ->where('title', 'like', '%' . $search_query . '%')
//    ->whereBetween('price', [$min_price, $max_price])
//    ->get();
}
    