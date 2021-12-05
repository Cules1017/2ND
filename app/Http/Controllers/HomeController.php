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
    {   $count= Post::count();
            
        $pages=ceil($count/10); 
        $active=1;
        $posts = Post::orderBy('id', 'DESC')->paginate(10);
        return view('welcome', compact('posts','pages','active'));
    }
    public function pages($i)
    {   $count= Post::count();
       //dd($i);
       $pages=ceil($count/10);
        $active=$i;
        $posts = Post::orderBy('id', 'DESC')->skip(($i-1)*10)->take(10)->get();
        return view('welcome', compact('posts','pages','active'));
    }
    

    public function search(){
         // $q = Request();
        
          $q = Request::get('q');
          if($q){
                $posts = Post::where('category','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->orderBy('id', 'desc')->paginate(20);
                return view('posts.search' , compact('posts',  'q'));}
         else   {
             $q=" ";
                    $posts = Post::orderBy('id', 'desc')->take(20)->get();
                    return view('posts.search', compact('posts', 'q'));}
    }
        public function searchbyprice(Request $request){
            // $q = Request();
            // dd('fa');
            $q = request()->get('q');
            $max_price=(int)request()->get('price');
            $min_price=$max_price-1000000;
            if($max_price == 4000000000)$min_price = 3000000;
            if($max_price == 0){$min_price = 0;$max_price = 1000000000000;}
            // dd($max_price);
            if($q){
            $posts = Post::where('category','like','%'.$q.'%')->orWhere('title','like','%'.$q.'%')->orderBy('id', 'desc')->paginate(20);
            $posts= $posts->whereBetween('price', [$min_price, $max_price]);
            return view('posts.search' , compact('posts' ,  'q'));}
            else{
                $q=" ";
                $posts = Post::whereBetween('price', [$min_price, $max_price])->orderBy('id', 'desc')->paginate(20);
                return view('posts.search' , compact('posts', 'q'));}
            }
    
//    $inventory = Inventory::where('category', $cat)
//    ->where('title', 'like', '%' . $search_query . '%')
//    ->whereBetween('price', [$min_price, $max_price])
//    ->get();
}
    