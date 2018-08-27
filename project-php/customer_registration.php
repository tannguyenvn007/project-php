<?php
if (isset($_GET["register"])) {
	?>
	<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Perfume Store</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" type="text/css" href="CSS/home_page.css">
	<link rel="stylesheet" href="CSS/style-w.css">
		<style></style>
	</head>
<body>
<div class="wait overlay">
	<div class="loader"></div>
</div>
<div class="header_top_menu clearfix">  
		<div class="container">
			<div class="row">   
				<div class="col-md-5 col-sm-12 text-right">
					<div class="call_us_text">
						<a href=""><i class="fa fa-clock-o"></i> Đặt hàng 24/7</a>
						<a href=""><i class="fa fa-phone"></i>0969 756 525</a>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<div class="head_top_social text-right">
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-linkedin"></i></a>
						<a href=""><i class="fa fa-pinterest-p"></i></a>
						<a href=""><i class="fa fa-youtube"></i></a>
						<a href=""><i class="fa fa-phone"></i></a>
						<a href=""><i class="fa fa-camera"></i></a>
					</div>  
				</div>
			</div>          
		</div>
	</div>
	<nav class="navbar navbar-expand-sm bg-color navbar-dark sticky-top">
		<a class="navbar-brand padding-image" href="#"><img src="images/logo9.png" alt="" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>


		<div class="collapse navbar-collapse justify-content-between color-text " id="navbarTogglerDemo01">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="index.php">Trang chủ</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sản phẩm</a>
					<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="#">Cho nam</a>
						<a class="dropdown-item" href="#">Cho nữ</a>
						<a class="dropdown-item" href="#">Cho trẻ em</a>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Hướng dẫn</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php">Liên hệ</a>
				</li>
			</ul>
							
			<form class="form-inline">
					<div class="cart">
					<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart size-icon " aria-hidden="true"></i><span class="number badge">0</span></a> 
				</div>
				<input class="form-control mr-sm-2 border-color" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
				<button class="btn btn-color" type="submit">Tìm kiếm</button>
			</form>
		</div>

	</nav>
  <div id="row-breadcrumb">
	    <div class="container">
		   <nav aria-label="breadcrumb" role="navigation" class="color-nav-menu ">
		      <ol class="breadcrumb">
		        <li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
		        <li class="breadcrumb-item"><a href="index.php?page=login">Đăng nhập</a></li>
		        <li class="breadcrumb-item active" aria-current="page">Đăng kí</a></li>
		      </ol>
		    </nav> 
	    </div>
   </div>
	<div class="container position1">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="signup_msg">
				<!--Alert from signup form-->
			</div>
			<div class="col-md-2"></div>
		</div>
		<div class="row">
			<div class="account_page col-md-9">﻿
				<h1>Đăng Ký Tài Khoản</h1>
				<p>Nếu bạn đã đăng ký tài khoản, vui lòng đăng nhập<a href="index.php?page=login">Tại Đây</a></p>
					<form id="signup_form" onsubmit="return false">
						<fieldset id="account">
							<legend>Thông tin cá nhân</legend>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-firstname">Tên:
									<span class="label_warning"></span>
								</label>
								<div class="col-sm-4">
									<input type="text" required id="f_name" name="f_name" placeholder="Tên:" class="form-control" />
								</div>
								<label class="col-sm-2 control-label" for="input-firstname">Họ:
									<span class="label_warning"></span>
								</label>
								<div class="col-sm-4">
									<input type="text" required id="l_name" name="l_name" placeholder="Họ:" class="form-control" />
								</div>
							</div>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-telephone">Điện Thoại:<span class="label_warning"></span></label>
								<div class="col-sm-10">
									<input type="text" required onkeypress="return event.charCode >= 48 && event.charCode <= 57" minlength ="9" maxlength="11" id="mobile" name="mobile" value="" placeholder="Điện Thoại:" class="form-control" />
								</div>
							</div>
						</fieldset>

						<fieldset id="address">
							<legend>Địa chỉ của bạn</legend>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-address-1">Tỉnh / TP:<span class="label_warning"></span></label>
								<div class="col-sm-10">
									<input type="text" id="address1" name="address1" required value="" placeholder="Tỉnh / Thành phố:" class="form-control" />
								</div>
							</div>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-zone">Địa chỉ nhận hàng:</label>
								<div class="col-sm-10">
									<input type="text" required id="address2" name="address2"  value="" placeholder="Số nhà, đường:" class="form-control" />
								</div>
							</div>
						</fieldset>
						<fieldset>
							<legend>Tài khoản</legend>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-email">E-Mail:
									<span class="label_warning"></span>
								</label>
								<div class="col-sm-10">
									<input type="email" required id="email" name="email" placeholder="Địa chỉ E-Mail:" class="form-control" />
								</div>
							</div>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-password">Mật Khẩu:<span class="label_warning"></span></label>
								<div class="col-sm-10">
									<input type="password" required id="password" name="password" value="" placeholder="Mật Khẩu:" class="form-control" />
								</div>
							</div>
							<div class="form-group row required">
								<label class="col-sm-2 control-label" for="input-confirm">Nhập lại Mật Khẩu:<span class="label_warning"></span></label>
								<div class="col-sm-10">
									<input type="password" required id="repassword" name="repassword" value="" placeholder="Nhập lại Mật Khẩu:" class="form-control" />
								</div>
							</div>
						</fieldset>
						<div class="col-md-4"></div>
					      <div class="col-md-4 buttons text-center">
					        <input value="Đăng kí" type="submit" name="signup_button" class="btn btn-primary readall" />
					      </div>
					    <div class="col-md-4"></div>
					</form>
				</div>
			</div>
		</div>
<footer class="page-footer center-on-small-only mdb-color lighten-3 ">

    <!--Footer Links-->
    <div class="container">
        <div class="row my-4">

            <!--First column-->
            <div class="col-md-4 ">
                <h5 class="title mb-4 font-bold">Footer Content</h5>
                <p>Here you can use rows and columns here to organize your footer content.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident
                    voluptate esse quasi, veritatis totam voluptas nostrum. </p>
            </div>
            <!--/.First column-->

            <hr class="clearfix w-100 d-md-none">

            <!--Second column-->
            <div class="col-md-4 ml-auto">
                <h5 class="title mb-4 font-bold">About</h5>
                <ul>
                    <p><a href="#!">PROJECTS</a></p>
                    <p><a href="#!">ABOUT US</a></p>
                    <p><a href="#!">BLOG</a></p>
                    <p><a href="#!">AWARDS</a></p>
                </ul>
            </div>
            <!--/.Second column-->

            <hr class="clearfix w-100 d-md-none">

            <!--Third column-->
            <div class="col-md-4">
                <h5 class="title mb-4 font-bold">Adress</h5>
                <!--Info-->
                <p><i class="fa fa-home mr-3"></i> Da Nang, VN</p>
                <p><i class="fa fa-envelope mr-3"></i> info@example.com</p>
                <p><i class="fa fa-phone mr-3"></i> + 0969 756 525</p>
                <p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!--/.Third column-->

            


        </div>
    </div>
    <!--/.Footer Links-->

    <!--Copyright-->
    <div class="footer-copyright">
        <div class="container-fluid">
            © 2017 Copyright: <a href=""> PerfumeStore.com </a>

        </div>
    </div>
    <!--/.Copyright-->

</footer>
		<script src="js/js_slide.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="js/jquery2.js"></script>
        <script src="main.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
<?php 
}
 ?>






















