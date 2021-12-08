@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Post_Product_Page.css');}}">
    <!-- <script src="{{ asset('js/app.js'); }}" defer></script>  -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <title>Trang người dùng</title>
</head>

<body>
        <div class="contain">
            <div class="grid">
                
                <div class="grid__row">
                    <div class="grid__column-1">
                        
                    </div>
                    <div class="grid__column-10">
                        <div class="contain__user">
                            <div class="contain__user-img"><img src="{{URL::to($user->profile->profileImage())}}" alt=""></div>
                            <div class="contain__title">
                                <h2 class="contain__title-h2">{{$user->name}}</h2>      
                                <div>   
                                    <a href="/follow/{{$user->id}}/show"class="contain__title-follow-number FLNUM"><span id="ngtheo">{{$user->profile->followers->count()}}</span>
                                    <span class="contain__title-follow FLNUMfm">Người theo dõi</span></a>
                                    <a href="/follow/{{$user->id}}/show"class="contain__title-follower-number FLNUM"><span >{{$user->following->count()}}</span>
                                    <span class="contain__title-follower FLNUMfm">Đang theo dõi</span></a>
                                </div>
                                @can('update', $user->profile) 
                                <div>
                                    <a class="contain__title-fixuser" href="/profile/{{$user->id}}/edit">Chỉnh sửa trang cá nhân</a>
                                    <!-- <a class="contain__tilte-fixmore" style="--hover-color: green"href="">
                                        <i class="contain__title-usericons ti-more"></i> 
                                    </a>   -->
                                </div>
                                @endcan
                                 @cannot('update', $user->profile) 
                                    @guest
                                    
                                    @else 
                                        <div id="btn-fl">
                                            <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}" onclick="clickFL();"></follow-button>
                                            <!-- <a id="contain__tilte-fixmore" style="--hover-color: green"href="">
                                                <i class="contain__title-usericons ti-more"></i> 
                                            </a>   -->
                                        </div>
                                     @endguest
                                 @endcannot 
                                <div class="contain__title-calendar">
                                    <i class="contain__title-usericon ti-calendar"></i>
                                    <span class="contain__title-user-dayjoin">Ngày tham gia :</span>
                                    <span class="contain__title-user-dayjoins">{{$user->created_at}}</span>
                                </div>
                                <div class="contain__title-add">
                                    <i class="contain__title-usericon ti-location-pin"></i>
                                    <span class="contain__title-user-add">Địa chỉ:</span>
                                    <span class="contain__title-user-adds">{{$user->profile->address}}</span>
                                </div>                   
                            </div>
                        </div>
                        <div class="productshow">
                            <h3 class="productshow__header"> Sản Phẩm Đang Đăng </h3>
                            <div class="grid__row">
                                
                            @foreach($user->posts as $post)
                      
                                <div class="grid__column-2-4">
                                    <div class="productshow__item">
                                        <a href="/p/{{$post->id}}">
                                            @php
                                                $images = explode('|', $post->image);
                                            @endphp
                                            <div class="productshow__item-img" style="background-image: url({{URL::to($images[0])}});"></div>
                                            <h4 class="productshow__item-name">{{  \Illuminate\Support\Str::limit(($post->title), 35, $end = '...') }}</h4>
                                            <div class="productshow__item-price">{{$post->price}}đ</div>
                                            <div class="productshow__item-action">
                                                
                                                @can('update', $user->profile)
                                                <a href="/p/{{$post->id}}/edit" class="action__BUY">Sửa</a>
                                                <a href="/delete/{{$post->id}}" class="action__BUY">Xóa</a>
                                                @endcan
                                                @cannot('update', $user->profile)
                                                <!-- <a class="action__LIKE" href=""><i class="ti-heart"></i></a> -->
                                                <a href="/p/{{$post->id}}" class="action__BUY">Mua</a>
                                                @endcannot
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
      

                        </div>
                    </div>
                    <div class="grid__column-1">                      
                    </div>
                </div>
            </div>



        </div>
        <script language="javascript">
            
           
            
            
            function clickFL(e)
            { let num=document.getElementById("ngtheo");
            let fl=document.getElementsByClassName("contain__title-fixuser");
            let ab=num.innerText;
            let a=fl[0].outerText;
            if(a=='Theo dõi'){
               ab=Number(ab)+1;
              num.innerHTML=ab; 
            }
            else{
                ab=Number(ab)-1;
              num.innerHTML=ab;
            }
              
            };

        </script>

@endsection
