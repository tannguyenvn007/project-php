<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
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
					<?php 
					if (isset($_SESSION["uid"])) {
						?>
						<div class="call_us_text">
							<div class="nav-item dropdown">
								<a class="nav-link dropdown-toggle color-text1 " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Xin chào <i class="fa fa-user fa-fw"></i><?php echo $_SESSION['name']; ?></a>
								<div class="dropdown-menu dropdown-primary color-text2 index" aria-labelledby="navbarDropdownMenuLink">
									<a class="dropdown-item" href="#">Thông tin khách hàng</a>
									<a class="dropdown-item" href="customer_order.php">Đơn hàng</a>
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
					<!-- <div class="cart">
					<a class="nav-link" href="cart.php"><i class="fa fa-shopping-cart size-icon " aria-hidden="true"></i><span class="number badge">0</span></a> 
				</div>
				<input class="form-control mr-sm-2 border-color" type="search" placeholder="Tìm kiếm sản phẩm" aria-label="Search">
				<button class="btn btn-color" type="submit">Tìm kiếm</button> -->
			</form>
		</div>

	</nav>
<div id="row-breadcrumb">
		<div class="container">
			<nav aria-label="breadcrumb" role="navigation" class="color-nav-menu ">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Trang chủ</a></li>
					<li class="breadcrumb-item active" aria-current="page">Đơn hàng</a></li>
				</ol>
			</nav> 
		</div>
	</div>
	<div class="block-cart">
	<div class="container positionslide">
	<div class="cart-content">
		<div class="row">
			
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="panel-heading"></div>
					<div class="panel-body">
						<h1>Lịch sử giao dịch</h1>
						<hr/>
						<?php
							include_once("db.php");
							$user_id = $_SESSION["uid"];
							$orders_list = "SELECT o.id_Order,o.user_id,o.product_id,o.qty,o.trx_id,o.p_status,o.date_Order,p.name_pro,p.price,i.image_link FROM orders o,products p ,image i WHERE p.id = i.pro_id AND o.user_id='$user_id' AND o.product_id=p.id";
							$query = mysqli_query($con,$orders_list);
							?>
							<div class="row">
							<?php 

							if (mysqli_num_rows($query) > 0) {
								while ($row=mysqli_fetch_array($query)) {
									?>
										
											<div class="col-md-6">
												<div class="row pad-prd">
													<div class="col-md-6">
														<img  src="<?php echo $row['image_link']; ?>" class="img-responsive img-thumbnail"/>
													</div>
												
												
											
										<div class="col-md-6"> 
												<table>
													<tr><td>Tên sản phẩm:</td><td><b><?php echo $row["name_pro"]; ?></b> </td></tr>
													<tr><td>Giá tiền:</td><td><b><?php echo "$ ".$row["price"]; ?></b></td></tr>
													<tr><td>Số lượng:</td><td><b><?php echo $row["qty"]; ?></b></td></tr>
													<tr><td>Mã giao dịch:</td><td><b><?php echo $row["trx_id"]; ?></b></td></tr>
													<tr><td>Thời gian:</td><td><b><?php echo $row["date_Order"]; ?></b></td></tr>
												</table>
												</div>
												</div>
											 </div> 
										
									<?php
								}
							}
						?>
						</div>
					</div>
					<div class="panel-footer"></div>
				</div>
			</div>
			
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

</body>
</html>
















































