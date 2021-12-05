
<head>  
<title>Trang Sản Phẩm</title>

<link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
<link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
<link rel="stylesheet" href="{{ URL::asset('css/Product_page.css');}}">
<script src="{{ asset('js/product_page_slider.js') }}" defer></script>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
</style>
</head>

@extends('layouts.app')

@section('content')

        <div class="contain">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-1">

                    </div>
                    <div class="grid__column-6">
                        <div class="contain__produce">
                            <!-- Thẻ Chứa Slideshow -->
                            <div class="slideshow-container">
                            <!-- Kết hợp hình ảnh và nội dung cho mội phần tử trong slideshow-->

                            @php
                                $images = explode('|', $post->image);
                                $count=1;
                            @endphp
                            @foreach($images as $image)
                                <div class="mySlides fade" >
                                    <img src="{{URL::to($image)}}" width="600" height="350">
                                </div>
                            @endforeach
                        
                            <!-- Nút điều khiển mũi tên-->
                                <a class="prev" onclick="plusSlides(-1)">❮</a>
                                <a class="next" onclick="plusSlides(1)">❯</a>
                            </div>
                            <br>
                            <!-- Nút tròn điều khiển slideshow-->
                            
                            <div style="text-align:center">
                                @foreach($images as $image)
                                <span class="dot" onclick="currentSlide($count)"></span>
                                    @php
                                    $count=$count+1;
                                    @endphp
                                @endforeach
                            </div>
                        </div>
        <!-- <div class="contain">
            <div class="grid">
                <div class="grid__row">
                    <div class="grid__column-1">
                    </div>
                    <div class="grid__column-6">
                        <div class="contain__produce">
                            <span class="produce__img"> Hình ảnh </span>
                        </div> -->
                        <div class="contain__title">
                            <h2 class="contain__title-h2">{!!$post->title!!}</h2>      
                            <div>   
                                <span class="contain__title-price">{!!$post->price!!} đ</span>
                                <a class="contain__title-follow" href="">Lưu tin <i class="title__header-icon ti-heart">
                                </i></a>
                            </div>
                                <div>
                                <span class="contain__notify-decrip">{!! nl2br(e($post->description))!!} </span>
                            </div>
                        </div>    
                        <div class="contain__title-body">
                            <div class="contain__title">
                                <i class="contain__title-fix-icon ti-menu-alt"></i>
                                <span class="contain__title-fix">Tình trạng: Không  </span>
                                <i class="contain__title-device-icon ti-shopping-cart-full"></i>
                                <span class="contain__title-device">Thiết bị: Không</span>  
                            </div>
                            <div class="contain__title">
                                <i class=" contain__title-firm-icon ti-package"></i>
                                <span class="contain__title-firm">Hãng: Không</span>
                                <i class="contain__title-from-icon ti-world"></i>
                                <span class="contain__title-from">Xuất xứ: Không </span>
                            </div>                  
                        </div>  
                        <div class="contain__footer">
                            <div>
                                <h2 class="contain__footer-h2">Khu Vực</h2>
                                <i class="contain__title-area-icon   ti-location-pin"></i>
                                <span class="contain__title-area">{{$post->user->profile->address }}</span>
                            </div>                
                        </div>
                    </div>
                    <div class="grid__column-4">
                        <div class="contain__user">
                            <div class="contain__user-img" ><img class="user__img" src="{{URL::to(auth()->user()->profile->profileImage())}}" alt=""></div>
                            <div class="contain__header">

                                <div class="contain__title">
                                    <h2 class="contain__title-h2">{{$post->user->name }}</h2>
                                </div>
                                <div>
                                    <!-- <i class=" contain__user-online ti-eye">  Đang hoạt động</i> -->
                                    <a class="contain__user-page" href="/profile/{{$post->user->profile->user_id}}">Xem trang </a>
                                </div>
                               
                                <span class="contain__number">
                                    SDT:{{$post->user->phone}}
                                </span>
                                <!-- <div class="contain__user-chat">
                                    <i class="contain__user-chaticon ti-comments"></i>
                                    <span class="contain__user-comment">CHAT VỚI NGƯỜI BÁN</span>
                                </div> -->
                                <div class="contain__user-calendar">
                                    <i class="contain__calendar-icon ti-calendar"></i>
                                    <span class="contain__user-dayjoin">Ngày tham gia :</span>
                                    <span class="contain__user-dayjoins">{{$post->user->created_at->toDateString()}}</span>
                                </div>
                                <div class="contain__user-add">
                                    <i class="contain__location-icon ti-location-pin"></i>
                                    <span class="contain__user-add">Địa chỉ:</span>
                                    <span class="contain__user-adds">{{$post->user->profile->address }}</span>
                                </div> 
                            </div>
                        </div>
                    </div>

                    <div class="grid__column-1">

                    </div>
                </div>
            </div>
        </div>
@endsection
