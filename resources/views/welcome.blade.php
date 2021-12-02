
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/Post_page.css');}}">
</head>
@extends('layouts.app')
@section('content')


<div class="grid">
    <div class="grid__row">
        <div class="grid__column-1">

        </div>

        <div class="grid__column-10">
            <div class="category">
                <h3 class="category-header"><i class="ti-menu"></i> Danh Mục Sản Phẩm</h3>
                <ul class="category-list">

                    <li class="category-item">
                        <a href="" class="category-item-link">
                        
                            <img src="{{ URL::asset('imgages/category/thoitrang.png');}}" class="category-item-link-icon" alt=""> Thời trang
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/mobile.png" alt="" class="category-item-link-icon"> Điện thoại
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/xe.png" alt="" class="category-item-link-icon"> Xe
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/do-gia-dung.png" class="category-item-link-icon" alt=""> Đồ gia dụng
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/noithat.png" alt="" class="category-item-link-icon"> Nội thất
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/nha-dat.png" alt="" class="category-item-link-icon"> Nhà đất
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/nong-nghiep.png" class="category-item-link-icon" alt=""> Nông nghiệp
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/do-cn.png" alt="" class="category-item-link-icon"> Đồ công nghệ
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/so-thich.png" alt="" class="category-item-link-icon"> Sở thích
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/thu-cung.png" class="category-item-link-icon" alt=""> Thú cưng
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/thethao.png" alt="" class="category-item-link-icon"> Thể thao
                        </a>
                    </li>
                    <li class="category-item">
                        <a href="" class="category-item-link">
                            <img src="./assets/img/category/free_0d.png" alt="" class="category-item-link-icon"> Hàng 0 đồng
                        </a>
                    </li>
                </ul>
            </div>
            
            <div class="productshow">
                <h3 class="productshow__header"><i class="ti-announcement"></i> Sản Phẩm Mới Đăng </h3>
                <div class="grid__row">
                     @foreach($posts as $p)
                    <div class="grid__column-2-4">
                        <div class="productshow__item">
                            <a href="p/{{$p->id}}">
                            @php
                                $images = explode('|', $p->image);
                            @endphp
                                <div class="productshow__item-img" style="background-image: url({{URL::to($images[0])}});"></div>
                                <h4 class="productshow__item-name">{{$p->title}}</h4>
                                <div class="productshow__item-price">{{$p->price}}đ</div>
                                <div class="productshow__item-action">
                                    <a class="action__LIKE" href=""><i class="ti-heart"></i></a>
                                    <a href="p/{$p->id}" class="action__BUY">Mua</a>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach 
                    
                </div>
                <!--------------------------MORE------------------------------>
                <div class="productshow_more">
                    <a class="productshow_more-link" href="">Xem thêm
                                <i class="productshow_more-icon ti-arrow-circle-down"></i></a>
                </div>
            </div>
        </div>


        <div class="grid__column-1">

        </div>
    </div>
</div>

@endsection
