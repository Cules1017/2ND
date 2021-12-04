<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="stylesheet" href="{{ URL::asset('css\reset.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css\base.css');}}">
    <link rel="stylesheet" href="{{ URL::asset('css\login.css');}}"> 

    <script src="./js/login.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
</head>
<body>
    <header class="header">
        <div class="grid">
            <img class="header-image" src="{{ URL::asset('img\245499403_1043512679749438_9209665840480689390_n.png');}}"
            alt="">
            <h1 class="header-title">Đăng nhập</h1>
        </div>
    </header>
    <div class="contain">
        <div class="logo-box">
            <img class="contain-image" src="{{ URL::asset('img\245499403_1043512679749438_9209665840480689390_n.png');}}"
            alt="">
            <center>
            <h2 class="contain-title"> Web mua bán đồ cũ <br><br>tạm được tại Việt Nam</h2>
            </center>       
        </div>

        <div class="form-box">
            <div class="form-box-box">
                <form action="{{ route('login') }}" method="POST"  onsubmit="return validate()" id="form-login-register" name="contactForm" >
                        @csrf

                    <div class="login-box">
                    
                        <h2 class="login-register-title">ĐĂNG NHẬP</h2><br>
                
                            <center style="font-size: 14px;">
                            
                                <div>
                                    <div class="form-group">
                                        <input class="login-register-info" type="email" placeholder="Email" name="email"
                                        id="email" value="{{ old('email') }}"  autocomplete="email" autofocus>
                                       

                                        @error('email')
                                            <span class="form-message" id="login-form-message-pass" role="alert">
                                                <strong>Email hoặc mật khẩu không chính xác</strong>
                                            </span>
                                        @enderror
                                        @error('password')
                                            <span class="form-message" id="login-form-message-pass" role="alert">
                                                <strong>Email hoặc mật khẩu không chính xác</strong>
                                            </span>
                                        @enderror

                                    </div>

                                    <div class="form-group">
                                        <input class="login-register-info" type="password" placeholder="Mật khẩu" name="password"
                                        id="password"  autocomplete="current-password">
                                        <!-- <span class="form-message" id="login-form-message-pass"></span> -->
<!--                                       
                                        @error('password')
                                            <span class="form-message" id="login-form-message-pass" role="alert">
                                                <strong>mật khẩu không chính xác</strong>
                                            </span>
                                        @enderror -->



                                    </div>
                                
                                <i  class="eye-icon ti-eye " type="button" onclick="showHidden()" id="eye-icon"></i>

                               
                                </div>  
                            </center>
                            <input type="submit" class="login-button" value="ĐĂNG NHẬP"  ><br><br><br>
                        </form>
                        <script src="./assets/java/login-register.js"></script>
                        <script>
                            //mong muon
                            Validator({
                                form: '#form-login-register',
                                formGroupSelector: '.form-group',
                                errorSelector: '.form-message',
                                rules: [
                                Validator.isEmail('#email'),
                                Validator.minLength('#pass',5),                
                                ],
                                onSubmit: function (data){
                                    console.log(data);
                                } 
                        
                            });
                        </script>
                            <a class="fogot-pas" href="#" style="margin-left: 24px;">Quên mật khẩu</a>
                    </div>
                    <div class="register-login">
                        
                        <h5 style="font-size: 12px;"><center><span>HOẶC</span></center></h5><br>
                        <div class="login-button-facebook">
                            <a href="#" class="button-link"><i class="button-link-icon-face ti-facebook "></i>facebook</a>
                            
                        </div>
                        <div class="login-button-google">
                            <a href="#" class="button-link"><i class="button-link-icon-gg ti-google "></i>google</a> 
                        </div>
                        
                    </div>
                    <div class="register">
                    <center>
                        <p>Chưa có tài khoản? <a class="register-button" href="./register">Đăng kí</a></p>
                    </center>
                    </div>
                
                
            </div>
            
        </div>
        
    </div>
    <footer class="footer">
        
        <div class="">
            <div class="footer-icon">
                <center>
                    <div class="footer-icon-box">
                        <a href="#" class="footer-link" ><i class="footer-button ti-facebook "></i></a>
                    </div>
                    <div class="footer-icon-box">
                        <a href="#" class="footer-link" ><i class="footer-button ti-instagram "></i></a>
                    </div>
                    <div class="footer-icon-box">
                        <a href="#" class="footer-link" ><i class="footer-button ti-linkedin"></i></a>
                    </div>
                    <div class="footer-icon-box">
                        <a href="#" class="footer-link" ><i class="footer-button ti-twitter-alt"></i></a>
                    </div>
                    <div class="footer-icon-box">
                        <a href="#" class="footer-link" ><i class="footer-button ti-pinterest"></i></a>
                    </div>
                </center>
            </div>
                <div class="footer-bottom">
                <center>
                    <p>Địa chỉ: Khu phố 6, P.Linh Trung, Tp.Thủ Đức, Tp.Hồ Chí Minh. 
                        Tổng đài hỗ trợ: (028) 372 52002 - Email: <a href="mailto:19521852@gm.uit.edu.vn">19521852@gm.uit.edu.vn</a></p>
                    <p>© 2021 - Bản quyền thuộc về BaiRac Team</p>
                <center>
                </div>
            
        </div>

    </footer>
</body>
</html>