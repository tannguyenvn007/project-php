<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
if (isset($_SESSION["uid"])) {
	header("location:profile.php");
}
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list",$json_e,strtotime("+1 day"),"/","","",TRUE);

}
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
	<script src="js/js_slide.js" type="text/javascript" charset="utf-8" async defer></script>
	<script src="js/jquery2.js"></script>
	<script src="main.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
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
				<div class="col-md-3 col-sm-12 text-right">
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
					<li class="breadcrumb-item active" aria-current="page">Đăng nhập</a></li>
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
			<div class="col-sm-9 account_page">﻿
				<div class="row">
					<div class="col-sm-6">
						<div class="well">
							<h2>Khách hàng mới</h2>
							<p><strong>Đăng ký tài khoản</strong></p>
							<p>Bằng cách tạo tài khoản bạn có thể mua sắm nhanh hơn, cập nhật tình trạng đơn hàng, theo dõi những đơn hàng đã đặt và đặc biệt là sẽ được hưởng nhiều chương trình ưu đãi!</p>
							<a href="customer_registration.php?register=1" class="btn btn-primary readall">Tiếp tục</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="well">
							<h2>Khách hàng cũ</h2>
							<p class="text_strong"><strong>Tôi là khách hàng cũ</strong></p>
							<form onsubmit="return false" enctype="multipart/form-data" id="login">
								<div class="form-group">
									<label class="control-label">Email:</label>
									<input type="email" class="form-control" name="email" id="email" required/>
								</div>
								<div class="form-group">
									<label class="control-label" for="input-password">Mật khẩu:</label>
									<input type="password" class="form-control" name="password" id="password" required/>
									<a href="">Quên mật khẩu</a>
								</div>
								<input type="submit" value="Đăng nhập" class="btn btn-primary readall" />
							</form>
							<div class="panel-footer"><div id="e_msg"></div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="page-footer center-on-small-only mdb-color lighten-3 ">
		<div class="container">
			<div class="row my-4">
				<div class="col-md-4 ">
					<h5 class="title mb-4 font-bold">Footer Content</h5>
					<p>Here you can use rows and columns here to organize your footer content.</p>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, error amet numquam iure provident
					voluptate esse quasi, veritatis totam voluptas nostrum. </p>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-4 ml-auto">
					<h5 class="title mb-4 font-bold">About</h5>
					<ul>
						<p><a href="#!">PROJECTS</a></p>
						<p><a href="#!">ABOUT US</a></p>
						<p><a href="#!">BLOG</a></p>
						<p><a href="#!">AWARDS</a></p>
					</ul>
				</div>
				<hr class="clearfix w-100 d-md-none">
				<div class="col-md-4">
					<h5 class="title mb-4 font-bold">Adress</h5>
					<p><i class="fa fa-home mr-3"></i> Da Nang, VN</p>
					<p><i class="fa fa-envelope mr-3"></i> info@example.com</p>
					<p><i class="fa fa-phone mr-3"></i> + 0969 756 525</p>
					<p><i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
				</div>
			</div>
		</div>
		<div class="footer-copyright">
			<div class="container-fluid">
				© 2017 Copyright: <a href=""> PerfumeStore.com </a>
			</div>
		</div>
	</footer>

	</body>
	</html>






















