<!DOCTYPE html>
<html >
<head>
    
    <title>Home Page</title>
    
</head>
<body>
    @include('layouts.menu')

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
                            <img   src=" {{URL::to(auth()->user()->profile->profileImage())}}"   height=40 width=40 alt="" class="header__user-img">
                            <a href="/profile/{{ auth()->user()->id }}" class="header__user-name">{!!auth()->user()->name!!} </a>
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

