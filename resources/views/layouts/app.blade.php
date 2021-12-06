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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>
    <link rel="stylesheet" href="{{ URL::asset('fonts/themify-icons.css');}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
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
                                            <a href=""><i class="header__more-item-icon ti-help-alt"></i>Trợ giúp</a>
                                        </li>
                                        <li class="header__more-item">
                                            <a href=""><i class="header__more-item-icon ti-settings"></i> Giới Thiệu</a>
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
                                            <a href=""><i class="header__more-item-icon ti-help-alt"></i>Trợ giúp</a>
                                        </li>
                                        <li class="header__more-item">
                                            <a href=""><i class="header__more-item-icon ti-layout-cta-btn-right"></i>Giới Thiệu</a>
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

                    <div class="header-with-search">
                    <form action="/search" method="GET" role="search" class="header__seacrh">
                        @csrf
                        <!--<div class="header__seacrh">-->
                            <div class="header__seacrh-input-wrap">
                            
                           
                                <input type="text" class="header__seacrh-input" placeholder="Tìm Kiếm Sản Phẩm" name="q">
                               <!-- <div class="header__search-history">
                                    <h3 class="header__search-history-heading">Lịch sử tìm kiếm</h3>
                                    <ul class="header__search-history-list">
                                        <li class="header__search-history-item">
                                            <a href="">Laptop Gaming thế hệ mới</a>
                                        </li>
                                        <li class="header__search-history-item">
                                            <a href="">Ôtô bán tải vượt thác</a>
                                        </li>
                                        <li class="header__search-history-item">
                                            <a href="">Quần áo cũ rách</a>
                                        </li>
                                    </ul>
                                </div> -->
                                
                            </div>
                            <div class="header__seacrh-btn">
                                
                                <i class="header__seacrh-btn-icon ti-search"></i>
                                <!-- <button type="submit" class="header__seacrh-btn-icon ti-search"> -->
                            </div>
                            <!-- <button type="submit" class="header__seacrh-btn">
                        </div> -->
                    </form>
                        @guest
                        <div class="header__user">
                            <img src="{{ URL::asset('img\9CRnB66v6URQ2wdBBvbinCRAiN1DbTFohYOgaHhG.png');}}" alt="" class="header__user-img">
                            <a href="{{ route('login') }}" class="header__user-name">Khách</a>
                        </div>
                        <div class="header__post">
                            <a class="header__post-btn" href="{{ route('login') }}">
                                <i class="header__post-btn-icon ti-share"></i> Đăng tin
                            </a>
                        </div>
                        @else
                        <div class="header__user">
                            <img src=" {{URL::to(auth()->user()->profile->profileImage())}}" alt="" class="header__user-img">
                            <a href="/profile/{{ auth()->user()->id }}" class="header__user-name">{{auth()->user()->name}} </a>
                        </div>
                        <div class="header__post">
                            <a class="header__post-btn" href="/post/create">
                                <i class="header__post-btn-icon ti-share"></i> Đăng tin
                            </a>
                        </div>
                        @endguest
                    </div>
                </div>
            </div>
        </header>


        <div class="container">
         @yield('content')
        </div>    


        <footer class="footer">

            <div class="">
                <div class="footer-icon">
                    <center>
                        <div class="footer-icon-box">
                            <a href="#" class="footer-link"><i class="footer-button ti-facebook "></i></a>
                        </div>
                        <div class="footer-icon-box">
                            <a href="#" class="footer-link"><i class="footer-button ti-instagram "></i></a>
                        </div>
                        <div class="footer-icon-box">
                            <a href="#" class="footer-link"><i class="footer-button ti-linkedin"></i></a>
                        </div>
                        <div class="footer-icon-box">
                            <a href="#" class="footer-link"><i class="footer-button ti-twitter-alt"></i></a>
                        </div>
                        <div class="footer-icon-box">
                            <a href="#" class="footer-link"><i class="footer-button ti-pinterest"></i></a>
                        </div>
                    </center>
                </div>
                <div class="footer-bottom">
                    <center>
                        <p>Địa chỉ: Khu phố 6, P.Linh Trung, Tp.Thủ Đức, Tp.Hồ Chí Minh. Tổng đài hỗ trợ: (028) 372 52002 - Email: <a href="mailto:19521852@gm.uit.edu.vn">19521852@gm.uit.edu.vn</a></p>
                        <p>© 2021 - Bản quyền thuộc về BaiRac Team</p>
                    </center>
                </div>

            </div>

        </footer>
    </div>

</body>
</html>

