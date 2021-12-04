<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data= request()->validate([
            'title'=> 'required',
            'description'=>'required',
            'image' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required',
            'price'=>'required|integer|between:0,100000000000',
        ]);
        
        if($files = $request->file('image')){
            foreach ($files as $file) {
                $image_name = $file->store('');
                $ext = strtolower($file->getClientOriginalExtension());
                // $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'posts/';
                $image_url = $upload_path.$image_name;
                $file->move($upload_path, $image_name);
                $image[] = $image_url;
            }
        }


        Post::insert([
            'user_id'=> auth()->user()->id,
            'title' => $data['title'],
            'description'=> $data['description'],
            'image' => implode('|', $image),
            'category'=>$data['category'],
            'price'=>$data['price'],
        ]);

        return redirect('/profile/' . auth()->user()->id);
    }

    public function update(Post $post, Request $request){
        $this->authorize('update', $post);
        $data= request()->validate([
            'title'=> 'required',
            'description'=>'required',
            'image' => 'required',
            // 'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category'=>'required',
            'price'=>'required|integer|between:0,100000000000',
        ]);
        if($files = $request->file('image')){
            foreach ($files as $file) {
                $image_name = $file->store('');
                $ext = strtolower($file->getClientOriginalExtension());
                // $image_full_name = $image_name.'.'.$ext;
                $upload_path = 'posts/';
                $image_url = $upload_path.$image_name;
                $file->move($upload_path, $image_name);
                $image[] = $image_url;
            }
        }
        
        $data['image'] = implode('|', $image);

          $post->update(array_merge(  $data, ));
        
        return redirect("/p/{$post->id}");
    }


    public function show(\App\Models\Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function delete(User $user, Post $post)
    {   
        $this->authorize('delete', $post);
        DB::delete('delete from posts where id= ?' , [$post->id]);
        return redirect("/profile/{$post->user_id}");
        
    }
    public function edit(\App\Models\Post $post)
    {   
        $this->authorize('update', $post);

        return view('posts.edit', compact('post'));
    }


    public function sortbycategory()
    {
        $posts = Post::orderBy('created_at', 'desc')->take(20)->get();
        return view('welcome', compact('posts'));
    }
}

