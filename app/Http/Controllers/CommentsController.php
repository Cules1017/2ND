<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Post $post)
    {
        $data= request()->validate([
            'description'=>'required',
        ]);


        auth()->user()->comments()->create([
            'description'=> $data['description'],
            'post_id'=>$post->id,
        ]);
   
        return redirect('/p/' . $post->id);
    }


    // public function store(Request $request)
    // {
    // 	$request->validate([
    //         'decription'=>'required',
    //     ]);
   
    //     $input = $request->all();
    //     $input['user_id'] = auth()->user()->id;
    //     $input['post_id'] = auth()->post()->id;
    //     Comment::create($input);
   
    //     return redirect('/p/' . auth()->post()->user_id);
    // }
}
