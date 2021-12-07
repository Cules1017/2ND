
<head>
    <link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/header-footer.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/sort.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
    <link rel="stylesheet" href="./assets/fonts/themify-icons/">
</head>

@extends('layouts.app')

@section('content')
        <div class="main-2">
            
                <div class="search-box">
                    <div class="chossen-box">
                        <div class="sort-box">
                            <div class="sort-1">Sắp xếp theo</div>
                            <div class="sort-2">
                                <!-- <div href="#" style="text-decoration: none;color: white;">Tin đăng gần nhất</div> -->
                            </div>
                            <form action="/search/price/" method="GET" role="search">
                             <!-- @csrf -->
                                <div class="chose-form">
                                    <!-- <label for="price" class="label">Giá cả</label> -->
                                    <select name="price" id="price" class="choice">
                                        <option value="0" class="chossen-info">Giá</option>
                                        <option value="1000000" class="chossen-info">0 - 1.000.000"</option>
                                        <option value="2000000" class="chossen-info">1.000.000 - 2.000.000
                                        </option>
                                        <option value="3000000" class="chossen-info">2.000.000 - 3.000.000
                                        </option>
                                        <option value="4000000000" class="chossen-info">>3.000.000
                                        </option>
                                    </select>
                                    <input  id="q" value="{{$q}}" type="hidden" name="q">
                                    <!-- <input  id="posts" value="{{$posts}}" type="hidden" name="q"> -->
                             <button style="sort" class="sort">LỌC</button>
                            </form>
                        </div>
                    </div>

                    <div class="productshow">
                        <h3 class="productshow__header"><i class="ti-announcement"></i> Sản Phẩm liên quan đến {{$q}} </h3>
                        <div class="grid__row">                      
                            @foreach(($posts) as $p)
                            <div class="grid__column-2-4">
                                <div class="productshow__item">
                                    <a href="p/{{$p->id}}">
                                    @php
                                        $images = explode('|', $p->image);
                                    @endphp
                                        <div class="productshow__item-img" style="background-image: url({{URL::to($images[0])}});"></div>
                                        <h4 class="productshow__item-name">{!!  \Illuminate\Support\Str::limit(($p->title), 45, $end = '...') !!}</h4>
                                        <div class="productshow__item-price">{!!$p->price!!}đ</div>
                                        <div class="productshow__item-action">
                                            <!-- <a class="action__LIKE" href=""><i class="ti-heart"></i></a> -->
                                            <a href="/p/{{$p->id}}" class="action__BUY">Mua</a>                   
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
        </div>
        
</div>


@endsection
