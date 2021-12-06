<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Models\User;
class SavesController extends Controller
{
    public function store(Post $post)
    {
        return auth()->user()->saved_posts()->toggle($post);
    }
}
