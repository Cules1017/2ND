<link rel="stylesheet" href="{{ URL::asset('css/reset.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css/user_set.css');}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Sửa trang cá nhân</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto&display=swap');
    </style>

@extends('layouts.app2')
@section('content')
    <div class="container"> 
        <div class="grid">
            <div class="grid__row">
                <div class="grid__column-1">
                </div>
                <div class="grid__column-10">
                    <div class="user_setting">
                        <div class="user_setting-title">
                            <h3>Chỉnh sửa thông tin cá nhân</h3>
                        </div>
                        <form action="/profile/{{ $user->id }}" enctype="multipart/form-data" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="user_input">
                                <div class="user_input-img">
                                    <div class="user_input-selected" id="selected-img">
                                        <div class="bug"></div>
                                        <span class="Plus-img">+</span>
                                        <input type="file" class="input-img_ac" id="image" name="image" accept="image/png, image/jpeg" onchange="ImagesFileAsURL()">
                                        <div id="displayIMG" class="displayIMG"></div>
                                        <!--<div class="user_upload-img"><i class="ti-camera user_upload-img-icon"></i></div>-->
                                        @if ($errors->has('image'))
                                                <span class="valid_err_text" role="alert">
                                                    <strong>Vui lòng thêm ảnh</strong>
                                                </span>
                                            @endif
                                    </div>
                          
                                </div>
                                <div class="user_input-many">
                                    <div class="user_input-selected user_input-selected-in">
                                        <div class="tile_selected">Tên:</div>
                                        
                                        <input id="name"
                                            type="text"
                                            class="user_name"
                                            name="name"
                                            value="{{ old('name') ?? $user->name }}"
                                            autocomplete="name" autofocus>

                                            @if ($errors->has('name'))
                                                <span class="valid_err_text" role="alert">
                                                    <strong>Chưa nhập tên</strong>
                                                </span>
                                            @endif
                                        
                                    </div>
                                    <div class="user_input-selected user_input-selected-in">
                                        <div class="tile_selected">SDT:</div>
                                        
                                        <input id="phone"
                                            type="text"
                                            class="user_name"
                                            name="phone"
                                            value="{{ old('phone') ?? $user->phone }}"
                                            autocomplete="phone" autofocus>

                                            @if ($errors->has('phone'))
                                                <span class="valid_err_text" role="alert">
                                                    <strong>Số điện thoại không chính xác</strong>
                                                </span>
                                            @endif
                                        
                                    </div>

                                    <div class="user_input-selected user_input-selected-in">
                                        <div class="tile_selected">Địa chỉ:</div>
                                        
                                        <input id="address"
                                            type="text"
                                            class="user_name"
                                            name="address"
                                            value="{{ old('address') ?? $user->profile->address }}"
                                            autocomplete="address" autofocus>

                                            @if ($errors->has('address'))
                                                <span class="valid_err_text" role="alert">
                                                    <strong>Vui lòng nhập địa chỉ</strong>
                                                </span>
                                            @endif  
                                    </div>

                                    <div class="user_input-export">
                                        <input type="submit" class="user_input-export-btn-text" value="Lưu">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="grid__column-1">
            </div>
        </div>
    </div>

</div>

</div>
<script type="text/javascript">
    $('#selected-img').click(function() {
        htmls = `<a class="user_upload-img" onclick="click_input()"><i class="ti-camera user_upload-img-icon"></i></a>`;
        jQuery('#selected-img').append(htmls);
    });

    function click_input() {
        jQuery('#selected-img').find('input[type="file"]').click();
    }


    /*
            });*/
</script>
<script type="text/javascript">
    function ImagesFileAsURL() {
        var fileSelected = document.getElementById('image').files;
        if (fileSelected.length > 0) {
            var fileToLoad = fileSelected[0];
            var fileReader = new FileReader();
            fileReader.onload = function(fileLoaderEvent) {
                var srcData = fileLoaderEvent.target.result;
                var newImage = document.createElement('img');
                newImage.src = srcData;
                document.getElementById('displayIMG').innerHTML = newImage.outerHTML;
            }
            fileReader.readAsDataURL(fileToLoad);
        }
    }
</script>
<script src="./assets/java/img_upload.js"></script>
<script>
    Validator({
        form: '#form_set_user',
        errSelector: '.valid_err_text',
        rules: [
            Validator.isValue('#user_name'),
            Validator.isValue('#phonenum'),
            Validator.isValue('#mail'),
            Validator.isMail('#mail'),
            Validator.isMoney('#phonenum'),
        ],
        Onsubmit: function(data) {
            console.log(data);
        }
    });
</script>
</body>

</html>
@endsection
