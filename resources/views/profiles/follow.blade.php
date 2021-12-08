@extends('layouts.app')
@section('content')
<head>

    <link rel="stylesheet" href="{{ URL::asset('css/FL.css');}}">
    <title>Trang theo doi</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
</head>

<center>
            <div class="contain">
                <div class="contain-gird">
                    <div class="contain-header">Bạn bè</div>
                    <div class="FLed">
                        <div href="#" class="FLed-link">ĐƯỢC THEO DÕI </div>
                        
                        <div class="FLed-list">
                        
                            
                                @foreach($user->profile->followers as $follower) 
                                <div class="FLed-box">
                         
                                <div class="FL-avatar">

                                    <!-- <a href="/profile/{{$follower->profile->user_id}}"><img height=50 width=50 src="{{URL::to($follower->profile->profileImage())}}" alt=""></a> -->

                                    <a href="#"><img height=50 width=50 src="{{URL::to($follower->profile->profileImage())}}" class="IMGaVT" alt=""></a>

                                </div>
                                <div class="FL-name">
                                    <a href="/profile/{{$follower->profile->user_id}}" class="text-dark_tile" style="text-decoration: none" class="name">{!!$follower->name!!}</a>
                                </div>
                            </div>
                            
                            @endforeach 
                        </div>
                    </div>
                    

                    <div class="FLing">
                        <div  class="FLing-link">ĐANG THEO DÕI </div>
                        <div class="FLing-list">
                        @foreach($user->following as $profile) 
                                <div class="FLed-box">
                         
                                <div class="FL-avatar">

                                    <!-- <a href="/profile/{{$profile->user_id}}"><img  height=50 width=50 src="{{URL::to($profile->profileImage())}}" alt=""></a> -->

                                    <a href="#"><img height=50 width=50 src="{{URL::to($profile->profileImage())}}" class="IMGaVT" alt=""></a>

                                </div>
                                <div class="FL-name">
                                    <a href="/profile/{{$profile->user_id}}" class="text-dark_tile " style="text-decoration: none" class="name">{!!$profile->user->name!!}</a>
                                </div>
                            </div>
                            
                            @endforeach 
                            

                        </div>
                    </div>

                    <div class="notthing"></div>

                </div>
            </div>
</center>

@endsection
