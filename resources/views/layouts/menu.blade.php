<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('fonts\themify-icons\themify-icons.css'); }}">
    <link rel="stylesheet" href="{{ asset('css\reset.css');}}">
    <link rel="stylesheet" href="{{ asset('css\base.css');}}">
    <link rel="stylesheet" href="{{ asset('css\header-footer.css'); }}">
   <!--  <link rel="stylesheet" href="{{ URL::asset('css\home_page.css');}}">-->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">-->
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="{{ asset('js/xss.js') }}" ></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <link rel="stylesheet" href="{{ URL::asset('fonts/themify-icons.css');}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div id="app" class="main">
        <header class="header">
            <div class="grid">
                <div class="grid__header">

                    <nav class="header__navbar">
                        <ul class="header__navbar-list">
                            <li class="header__navbar-item">
                               <a href="/"> <img  class="logo" src="{{ URL::asset('img\logo_web_offi.png');}}" alt=""></a>
                            </li>
                        </ul>

                        <ul class="header__navbar-list--margin">
                            <li class="header__navbar-item">
                                <a href="/" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-home"></i>Trang
                                    chủ</a>
                            </li>

                            @guest
                            <li class="header__navbar-item">
                                <a href="{{ route('login') }}" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-user"></i>Quản
                                    lý tin</a>
                            </li>
                            <!-- <li class="header__navbar-item">
                                <a href="{{ route('login') }}" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-user"></i>Tin đã lưu
                                    </a>
                            </li> -->
                            <li class="header__navbar-item header__navbar-item--has-notify">
                                <div href="" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-bell"></i>Thông
                                    báo</div>
                            </li>
                            <li class="header__navbar-item header__navbar-item--has-more">
                                <div href="" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-more"></i>Thêm</div>
                                <div class="header__more">
                                    <ul class="header__more-list">
                                        <li class="header__more-item">
                                            <a href="{{ route('login') }}"><i class="header__more-item-icon ti-heart"></i>Tin đã lưu</a>
                                        </li>
                                        <li class="header__more-item">
                                            <a href="/introduction"><i class="header__more-item-icon ti-layout-cta-btn-right"></i> Giới Thiệu</a>
                                        </li>
                                        <li class="header__more-item">
                                            <a class="dropdown-item" href="{{ route('login') }}"
                                            >
                                            
                                                {{ __('Đăng nhập') }}
                                            </a>

                                            <form id="login-form" action="{{ route('login') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            @else
                            <li class="header__navbar-item">
                                <a href="/profile/{{ auth()->user()->id }}" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-user"></i>Quản
                                    lý tin</a>
                            </li>
                            <!-- <li class="header__navbar-item">
                                <a href="/saved/posts" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-user"></i>Tin đã lưu
                                    </a>
                            </li> -->
                            <li class="header__navbar-item header__navbar-item--has-notify">
                                <a href="" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-bell"></i>Thông
                                    báo</a>
                                <div class="header__notify">
                                    <header class="header__notify-header">
                                        <h3>Thông Báo Mới Nhất</h3>
                                    </header>
                                    <ul class="header__notify-list">
                                    @php
                                        $users = auth()->user()->following()->pluck('profiles.user_id');
                                        
                                        $posts = \App\Models\Post::whereIn('user_id', $users)->orderBy('id', 'DESC')->take(3)->get();
                                    @endphp
                                    @foreach($posts as $post)
                                        @php
                                            $images = explode('|', $post->image);
                                        @endphp
                                        <li class="header__notify-item header__notify-item--viewed">
                                            <a href="/p/{{$post->id}}" class="header__notify-link">
                                                       
                                                <img src="{{URL::to ($images[0])}}" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                      
                                                    <span class="header__notify-name">{{$post->title}}</span>
                                                    <span class="header__notify-decrip">{!! nl2br(e($post->description));!!}</span>
                                                </div>
                                            </a>
                                        </li>
                                    @endforeach
                                        <!-- <li class="header__notify-item">
                                            <a href="" class="header__notify-link">
                                                <img src="./assets/img/img-tt/hondacrv.jpg" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Xe Honda CRV</span>
                                                    <span class="header__notify-decrip">Mô tả</span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="header__notify-item ">
                                            <a href="" class="header__notify-link">
                                                <img src="./assets/img/img-tt/hondacrv.jpg" alt="" class="header__notify-img">
                                                <div class="header__notify-info">
                                                    <span class="header__notify-name">Xe Honda CRV</span>
                                                    <span class="header__notify-decrip">Mô tả</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    <footer class="header__notify-footer">
                                        <a href="" class="header__notify-footer-btn">Xem tất cả</a>
                                    </footer> -->
                                </div>
                            </li>
                            <li class="header__navbar-item header__navbar-item--has-more">
                                <div href="" class="header__navbar-item-link"><i
                                        class="header__navbar-icon ti-more"></i>Thêm</div>
                                <div class="header__more">
                                    <ul class="header__more-list">
                                        <li class="header__more-item">
                                            <a href="/saved_posts"><i class="header__more-item-icon ti-heart"></i>Tin đã lưu</a>
                                        </li>
                                        <li class="header__more-item">
                                            <a href="/introduction"><i class="header__more-item-icon ti-layout-cta-btn-right"></i>Giới Thiệu</a>
                                        </li> 
                                        <li class="header__more-item">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            <i class="header__more-item-icon ti-shift-right"></i>
                                                {{ __('Đăng xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>

                                    </ul>
                                </div>
                            </li>
                            @endguest

                            
                        </ul>
                    </nav>
</body>
</html>