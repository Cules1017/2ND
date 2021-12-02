@extends('layouts.app')

@section('content')

<div class="container">
   <div class="row">
  
       <div class="col-3 p-5" >
           <img src="{{$user->profile->profileImage()}}"
           width="200" height="200"
           class="rounded-circle" alt="">
       </div>
  
        <div class = "col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username }}</h1>
                
                @can('update', $user->profile)  
                <a href="/post/create">add new post</a>
                @endcan
            </div>
            @can('update', $user->profile)
            <a href="/profile/{{$user->id}}/edit" class="p-1">Edit profile</a>
            @endcan
            <div class ="p-1">
                <strong>{{$user->posts->count()}}</strong> posts
            </div>
           
            <div class ="p-1">
            
             {{$user->profile->description ?? 'Nothing'}}
            </div>
        </div>
    </div>
    <div class="p-3"><h3>posts</h3></div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <div class="row">
                    <a class="col-9" href="/p/{{ $post->id }}">
                        <div class="text-dark"><h3>{{ $post->title }}</h3></div>
                        <div class="text-dark">{{  \Illuminate\Support\Str::limit(($post->description), 100, $end = '....') }}</div>
                        
                    </a>

                </div>    
            </div>
        
        @endforeach
    </div>
         @can('update', $user->profile)
         <div class="fixed-bottom p-5"><a href="/feedback/create" class="pt-10">Feedback</a></div>
         @endcan
    
</div>
@endsection
