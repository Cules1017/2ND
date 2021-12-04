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
                        
                            <div class="FLed-box">
                                <!-- @foreach($user->profile->followers as $follower) -->
                                
                                <!-- <li class="FLed-box-info">
                                    <a href="#" >
                                        
                                        <div class="Fled-avatar">
                                                <img src="#" alt="">
                                        </div>
                                        <div class="Fled-user">
                                                {{$follower->name}}
                                        </div>
                                    </a>
                                </li> -->
                                
                                <!-- @endforeach -->
                                <div class="FL-avatar">
                                    <a href="#"><img src="#" alt=""></a>
                                </div>
                                <div class="FL-name">
                                    <a href="#" style="text-decoration: none" class="name">Quang Minh</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="FLing">
                        <a href="#" class="FLing-link">ĐANG THEO DÕI </a>
                        <div class="FLing-list">
                            <ul class="FLing-box">
                                
                            </ul>
                        </div>
                    </div>

                    <div class="notthing"></div>

                </div>
            </div>
</center>

@endsection
