@extends('layouts.app')
@section('content')
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/pagination.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Post_page.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/home_page.css');}}">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
</head>



<div class="grid">
    <div class="grid__row">
        <div class="grid__column-1">

        </div>

        <div class="grid__column-10">
            <div class="category">
                <h3 class="category-header"><i class="ti-menu"></i> Danh Mục Sản Phẩm</h3>
                <ul class="category-list">

                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Thời trang" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\thoitrang.png');}}">
                             Thời trang
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Điện thoại" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\mobile.png');}}">
                                    Điện thoại
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Xe" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\xe.png');}}">
                                    Xe
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Đồ gia dụng" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\do-gia-dung.png');}}">
                                    Đồ gia dụng
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Nội thất" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\noithat.png');}}">
                                    Nội thất
                        </form>
                    </li>
                 
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Nhà đất" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\nha-dat.png');}}">
                                    Nhà đất
                        </form>
                    </li>

                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Nông nghiệp" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\nong-nghiep.png');}}">
                                    Nông nghiệp
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Đồ công nghệ" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\do-cn.png');}}">
                                    Đồ công nghệ
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Sở thích" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\so-thich.png');}}">
                                    Sở thích
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Thú cưng" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\thu-cung.png');}}">
                                    Thú cưng
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Thể thao" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\thethao.png');}}">
                                    Thể thao
                        </form>
                    </li>
                    <li class="category-item">
                        <form action="/search" class="category-item-link"  method="GET" role="search">
                             @csrf
                             <input  id="q" value="Hàng 0 đồng" type="hidden" name="q">
                             <input type="image" id="image"  
                                    class="category-item-link-icon" 
                                    src="{{ URL::asset('img\category\free_0d.png');}}">
                                    Hàng 0 đồng
                        </form>
                    </li>
                </ul>
            </div>
            
            <div class="productshow">
                <h3 class="productshow__header"><i class="ti-announcement"></i> Sản Phẩm Mới Đăng </h3>
                <div class="grid__row">
                    
                     @foreach(($posts) as $p)
                    <div class="grid__column-2-4">
                        <div class="productshow__item">
                            <a href="p/{{$p->id}}">
                            @php
                                $images = explode('|', $p->image);
                            @endphp
                                <div class="productshow__item-img" style="background-image: url({{URL::to($images[0])}});"></div>
                                <h4 class="productshow__item-name">{{  \Illuminate\Support\Str::limit(($p->title), 25, $end = '...') }}</h4>
                                <div class="productshow__item-price">{{$p->price}}đ</div>
                                <div class="productshow__item-action">
                                    <a class="action__LIKE" href=""><i class="ti-heart"></i></a>
                                    <a href="/p/{{$p->id}}" class="action__BUY">Mua</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach 
                    
                </div>
            
                <!--------------------------MORE------------------------------>
                <div class="productshow_more">
                    <!-- <a class="productshow_more-link" href="">
                                 <i class="productshow_more-icon ti-arrow-circle-down"></i></a> -->
                            <div class="pagination">
                                @if($active !=1)
                                <a href="/home/{{$active-1}}">&laquo;</a>
                                @endif
                                @for ($i = 1;  $i <= $pages; $i++)
                                    @if($i==$active)
                                        <a href="/home/{{$i}}" class="active">{{$i}}</a>
                                    @else
                                        <a href="/home/{{$i}}" class="">{{$i}}</a></form>
                                    @endif
                                @endfor
                                @if($active!=$pages)
                            <a href="/home/{{$active+1}}">&raquo;</a>
                            @endif
                            </div>
                </div>
            </div>
        </div>


        <div class="grid__column-1">

        </div>
    </div>
</div>

@endsection
