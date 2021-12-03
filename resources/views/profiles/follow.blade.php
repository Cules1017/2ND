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
                        
                            <ul class="FLed-box">
                                @foreach($user->profile->followers as $follower)
                                
                                <li><a href="#" class="FLed-box-info">
                                        <!-- <div class="Fled-info"> -->
                                            <div class="Fled-avatar">
                                                <i class="user-icon ti-user"></i>
                                            </div>
                                            <div class="Fled-user">
                                                {{$follower->name}}
                                            </div>
                                        <!-- </div> -->

                                    </a>
                                </li>
                                @endforeach
            
                            </ul>
                        </div>
                    </div>
                    

                    <!-- <div class="FLing">
                        <a href="#" class="FLing-link">ĐƯỢC THEO DÕI </a>
                        <div class="FLing-list">
                            <ul class="FLing-box">
                                
                            </ul>
                        </div>
                    </div> -->

                    <div class="notthing"></div>

                </div>
            </div>
        </center>

@endsection
