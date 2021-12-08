<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Illuminate\Validation\Rule; 
class ProfilesController extends Controller
{
    public function index(User $user)
    {   $follows = (auth()->user()) ? auth()->user()->following->contains($user->id) : false;

        // $postCount = Cache::remember(
        //     'count.posts.' . $user->id,
        //     now()->addSeconds(30),
        //     function () use ($user) {
        //         return $user->posts->count();
        //     });

        // $followersCount = Cache::remember(
        //     'count.followers.' . $user->id,
        //     now()->addSeconds(30),
        //     function () use ($user) {
        //         return $user->profile->followers->count();
        //     });

        // $followingCount = Cache::remember(
        //     'count.following.' . $user->id,
        //     now()->addSeconds(30),
        //     function () use ($user) {
        //         return $user->following->count();
        //     });

        return view('profiles.index', compact('user', 'follows'));
    } 

    public function edit(User $user)
    {   
        $this->authorize('update', $user->profile);

        return view('profiles.edit', compact('user'));
    }

    public function update(User $user , Request $request){

        
            $this->authorize('update', $user->profile);
        $data = request()->validate([
            'name'=> 'required',
            'phone' => ['required', 'string', 'max:12',  Rule::unique('users')->ignore($user->id),]
        ]);
        $data1 = request()->validate([
            'image'=>'required|image',
            'address'=>'required',
        ]);

        if (request('image')) {
            $file = $request->file('image');
            $image_name = $file->store('');
            // dd($image_name);
            // $upload_path = request('image')->store('profiles', 'public');

            $upload_path = 'profiles/';
            $image_url = $upload_path.$image_name;
            $file->move($upload_path, $image_name);

            // $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000, 1000);
            // $image->save();

            $imageArray = ['image' => $image_url];
        }

       auth()->user()->profile->update(array_merge(
          $data1,
         $imageArray ?? []
       ));
       auth()->user()->update(array_merge(
        $data,));
        return redirect("/profile/{$user->id}");
            
        
    }
}
