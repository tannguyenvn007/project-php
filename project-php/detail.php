<?php
session_start();
require_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Perfume Store</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- <link rel="stylesheet" type="text/css" href="./CSS/index.css"> -->
	<!-- <link rel="stylesheet" type="text/css" href="style.css"> -->
	<link rel="stylesheet" href="CSS/style-w.css">
	<link rel="stylesheet" type="text/css" href="./CSS/index.css">
	<link rel="stylesheet" type="text/css" href="./CSS/detail.css">
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
					<?php 
					if (isset($_SESSION["uid"])) {
						?>
						<div class="call_us_text">
							<div class="nav-item dropdown">
								<a class="nav-link dropdown-toggle color-text1 " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Xin chào <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['name']; ?></a>
								<div class="dropdown-menu dropdown-primary color-text2 index" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="#">Thông tin khách hàng</a>
									<a class="dropdown-item" href="#">Đơn hàng</a>
									<a class="dropdown-item" href="#">Đổi mật khẩu</a>
									<a class="dropdown-item" href="logout.php">Đăng xuất</a>
								</div>
							</div>
						</div>
						<?php
					}else {
						?>
						<div class="call_us_text">
							<a href="login_form.php"><i class="fa fa-user"></i> Tài Khoản</a>
						</div>
						<?php 
					}
					?>
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
						<?php
							require_once("db.php");
							$sql = "SELECT * FROM category";
					        $query=mysqli_query($con,$sql);
					        if(!$query){
					            die('Query error: [' . $db->error . ']');
					        }
					        while($arry = mysqli_fetch_assoc($query)){
					            $name = $arry["name_category"];
					            $ca_id = $arry['id'];
						?>
						<a class="dropdown-item" href="category.php?id=<?php echo $ca_id; ?>"><?php echo $name; ?></a>
						<?php
							};
						?>
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
					<li class="breadcrumb-item"><a href="products_all.php">Sản phẩm</a></li>
					<li class="breadcrumb-item active" aria-current="page">Chi tiết</a></li>
				</ol>
			</nav> 
		</div>
	</div>
	<div class="block-cart">
		<div class="container">
			<div class="cart-content">
			<div class="row product-detail-info">
				<div class="col-sm-12">
					<?php 
					$id = $_GET['id'];
					$sql = "SELECT * FROM products, category, image WHERE products.id ='$id' AND category.id = products.category_id AND products.id = image.pro_id" ;
					$query=mysqli_query($con,$sql);
					$rows = mysqli_num_rows($query);
					while($kq = mysqli_fetch_assoc($query)){
						$label = $kq["label"];
						$name_pro = $kq["name_pro"];
						$origin = $kq["origin"];
						$style = $kq["style"];
						$incense = $kq["incense"];
						$capacity = $kq["capacity"];
						$description = $kq["description"];
						$name_cate = $kq["name_category"];
						$image = $kq["image_link"];
						$price = $kq["price"];

						?>
						<span class="product-label"><?php echo $label ?></span>
						<h3 class="product-title"><?php echo $name_pro ?></h3>
						<div class="product row">
							<div class="col-sm-3 text-center">
								<div class="product-thumbnail-slider-wrapper fullwidth magnific-gallery no-zoom-effect">
									<div class="product-thumbnail-slider">
										<div class="product-syn-slider-1-wrapper">
											<div class="item">
												<img class="" src="<?php echo $image; ?>" width="200" height="200">
											</div>
										</div>
									</div>
								</div>
								<div class="clearfix view">
									<div class="pull-left">
										Lượt xem sản phẩm:
										<strong></strong>
									</div>
									<div class="pull-right">

									</div>	
								</div>
							</div>
							<div class="product-body-text col-sm-5">
								<ul class="border-bottom">
									<li>
										<span>Nhãn hiệu:</span>
										<?php echo $label; ?>
									</li><br>
									<li>
										<span>Giới tính:</span>
										<?php echo $name_cate; ?>
									</li><br>
									<li>
										<span>Dung lượng:</span>
										<?php echo $capacity; ?>
									</li><br>
									<li>
										<span>Xuất xứ:</span>
										<?php echo $origin; ?>
									</li><br>
									<li>
										<span>Loại hương:</span>
										<?php echo $incense; ?>
									</li><br>
									<li>
										<span>Phong cách:</span>
										<?php echo $style; ?>
									</li><br>
								</ul>
							</div>
							<?php

						?>
						<div class="col-sm-4 ">
							<div class="buy-product">
								<div class="buy-product-inner list-address">
									<h3></h3>
									<?php
										?>
										<div class="product-top">
											<div class="product-name">
												<span><b><?php echo $name_pro; ?></b></span>
											</div>
											<div class="price">
												<span><b><?php echo $price; ?></b></span>
											</div>
											<div class="button-buy">
												<button type="button" class="btn"><a>Mua ngay</a></button> 
											</div>
										</div>
										<?php
									};
									?>
									<div class="product-bottom">
										<div class="item">
											<div class="title-small"> Chấp nhận thanh toán
											</div>
											<img src="" alt="">
										</div>
										<div class="item">
											<div class="title-small">Hỗ trợ mua hàng</div>
											<div class="phone">
												<span>01687539178</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				
				</div>
			</div>
		</div>
		</div>	
	</div>		
		<div class="container">
			<div class="block-perfume-info">
				<div class="row">
					<div class="col-sm-6 info-left">
						<h3 class="title-info">Thông tin sản phẩm</h3>
						<div class="desc" id="text-more">
							<p><?php echo $description; ?></p>
						</div>
					</div>
					<div class="col-sm-6 info-right">
						<h3 class="title-info">Ý kiến khách hàng</h3>
						<div class="review">
							<div class="list-item">
								<div class="clearfix" id="more-item">
									<?php 
										$id = $_GET['id'];
										$sql = "SELECT * FROM contact, products WHERE products.id ='$id'AND products.id=contact.pro_id" ;
										$query=mysqli_query($con,$sql);
										if (!$query) {
										printf("Error: %s\n", mysqli_error($con));
										exit();
										}
										$rows = mysqli_num_rows($query);
										while($kq = mysqli_fetch_assoc($query)){
											$name_cus = $kq["name_cus"];
											$content = $kq["content"];
									?>
									<ul class="border-bottom">
										<li><b>
											Khách hàng: 
											</b><?php echo $name_cus; ?>
										</li>
										<li><b>
											Đánh giá sản phẩm: 
											</b><?php echo $content; ?>
										</li><br>
									</ul>
									<?php
										};
									?>
									<div class="clearfix text-center margin-top-50" id="showmore"></div>
								</div>
							</div>
						</div>
						<?php
							error_reporting(2);
							if(count($_POST)>0){
								$id = $_GET['id']; 
								require_once("db.php");
								$name_cus = $_POST["name_cus"];
								$mail = $_POST["mail"];
								$content = $_POST["content"];
								$sql = "INSERT INTO contact(name_cus, mail, content, pro_id)VALUES ('$name_cus', '$mail','$content', '$id')";
								mysqli_query($con,$sql);
								$current_id = mysqli_insert_id($con);
								if(!empty($current_id)) {
									$message = "New User Added Successfully";
								}
							}
						?>
						<form action="" id="comment-form" class="form-review" method="post">
							<input type="hidden">
							<input type="hidden" id="comment-pid" value="4585">
							<h3 class="title">Gửi đánh giá của bạn</h3>
							<div class="inner">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group field-comment required">
											<textarea name="content" class="input-box" id="comment-content" cols="30" rows="10" placeholder="Nội dung(*)" required aria-required="true" value="<?php echo $content?>"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-7">
										<div class="form-group field-comment-name required">
											<input type="text" id="comment-name" class="input-box" placeholder="Họ và tên(*)" name="name_cus" value="<?php $name_cus?>" required aria-required="true">
										</div>
									</div>
									<div class="col-sm-7">
										<div class="form-group field-comment-email">
											<input type="email" id="comment-email" class="input-box" placeholder="Email" name="mail" required aria-required="true" value="<?php $mail?>">
										</div>
										<button type="submit" class="readall">Gửi bình luận</button>
									</div>
								</div>
							</div>
						</form>
					</div>
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
		<script src="./JAVASCRIPT/slide.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="js/js_slide.js" type="text/javascript" charset="utf-8" async defer></script>
		<script src="js/jquery2.js"></script>
		<script src="main.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
	</body>
	</html>
