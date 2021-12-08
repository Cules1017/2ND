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
                        <a href="#" class="FLed-link">ĐƯỢC THEO DÕI </a>
                        
                        <div class="FLed-list">
                        
                            
                                @foreach($user->profile->followers as $follower) 
                                <div class="FLed-box">
                         
                                <div class="FL-avatar">
                                    <a href="#"><img height=50 width=50 src="{{URL::to($follower->profile->profileImage())}}" class="IMGaVT" alt=""></a>
                                </div>
                                <div class="FL-name">
                                    <a href="#" style="text-decoration: none" class="name">{{$follower->name}}</a>
                                </div>
                            </div>
                            
                            @endforeach 
                        </div>
                    </div>
                    

                    <div class="FLing">
                        <a href="#" class="FLing-link">ĐANG THEO DÕI </a>
                        <div class="FLing-list">
                        @foreach($user->following as $profile) 
                                <div class="FLed-box">
                         
                                <div class="FL-avatar">
                                    <a href="#"><img height=50 width=50 src="{{URL::to($profile->profileImage())}}" class="IMGaVT" alt=""></a>
                                </div>
                                <div class="FL-name">
                                    <a href="#" style="text-decoration: none" class="name">{{$profile->user->name}}</a>
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
