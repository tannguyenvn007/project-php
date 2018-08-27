<?php
session_start();
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("../db.php");
mysqli_set_charset($con, 'UTF8');

if (isset($_SESSION['admin'])) {
} else {
	?>
	<script type="text/javascript">
		window.location = '../admin/index.php';
	</script>
	<?php
}
$sql = 'SELECT COUNT(*) as newContacts FROM contact where status = 0';
$result = mysqli_query($con,$sql);
if ($result) {
	$rows = mysqli_num_rows($result);
	if ($rows == 0) {
		$newContacts = 0;
	} else {
		while ($row = mysqli_fetch_assoc($result)) {
			$newContacts = $row['newContacts'];
		}
	}
}
?> <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	

	<link rel="stylesheet" href="../CSS/style-admin.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#"><img class="logo" src="../images/logo9.png" alt="" /></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

	
			<li class="dropdown float-right" style="list-style:none;">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i style="color: white;">  <?php
                                if (isset($_SESSION['admin'])) {
                                    echo $_SESSION['admin'];
                                }
?> </i>
                            <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i>Thông tin người dùng</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i>Cài đặt</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i>Đăng xuất</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
		

		<div class="collapse navbar-collapse sidebar bg-light1" id="navbarSupportedContent">
			<ul class="navbar-nav">
				<li class="sidebar-search">
					<div class="input-group custom-search-form">
						<input type="text" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button">
								<i class="fa fa-search"></i>
							</button>
						</span>
					</div>

				</li>
				<li  class="nav-item">
					<a class="nav-link" href="#"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
				</li >
				<li class="nav-item">
					<a class="nav-link" href="category-list.php"><i class="fa fa-bar-chart-o fa-fw"></i>Danh mục sản phẩm</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" ><i class="fa fa-cube fa-fw"></i>Sản phẩm<span class="fa fa-angle-down"></span></a>
					<ul class="collapse navbar-nav1" id="collapseExample">
						<li>
							<a class="nav-link" href="product-list.php">Danh sách sản phẩm</a>
						</li>
						<li>
							<a class="nav-link" href="product-add.php">Thêm sản phẩm</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#collapseExample1" aria-expanded="false" aria-controls="collapseExample" ><i class="fa fa-cube fa-fw"></i>Đơn hàng<span class="fa fa-angle-down"></span></a>
					<ul class="collapse navbar-nav1" id="collapseExample1">
						<li>
							<a class="nav-link" href="order-list.php">Danh sách đơn hàng</a>
						</li>
						<li>
							<a class="nav-link" href="neworder.php">Đơn hàng mới</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="user-list.php"><i class="fa fa-bar-chart-o fa-fw"></i>Tài khoản khách hàng</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact-list.php"><i class="fa fa-bar-chart-o fa-fw"></i>Ý kiến khách hàng</a>
				</li>
			</ul>
		</div>
	</nav>
			
	
			
			
	





	           <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
				<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

		
