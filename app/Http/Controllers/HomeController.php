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
        $posts = Post::orderBy('id', 'DESC')->take(10)->get();
        return view('welcome', compact('posts'));
    }
    public function search(){
         // $q = Request();
        
          $q = Request::get('q');
          if($q){
                $posts = Post::where('category','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->orderBy('id', 'desc')->paginate(10);
                return view('posts.search' , compact('posts',  'q'));}
         else   {
             $q=" ";
                    $posts = Post::orderBy('id', 'desc')->take(20)->get();
                    return view('posts.search', compact('posts', 'q'));}
    }
        public function searchbyprice(){
            // $q = Request();
            // dd('fa');
            $q = Request::get('q');
            $max_price=Request::get('price');
            $min_price=$max_price-1000000;
            if($q){
            $posts = Post::where('title','like','%'.$q.'%')->orWhere('category','like','%'.$q.'%')->whereBetween('price', [$min_price, $max_price])->orderBy('id', 'desc')->paginate(10);
            return view('posts.search' , compact('posts' ,  'q'));}
            else{
                $q=" ";
                $posts = Post::whereBetween('price', [$min_price, $max_price])->orderBy('id', 'desc')->paginate(10);
                return view('posts.search' , compact('posts', 'q'));}
            }
    
//    $inventory = Inventory::where('category', $cat)
//    ->where('title', 'like', '%' . $search_query . '%')
//    ->whereBetween('price', [$min_price, $max_price])
//    ->get();
}
    