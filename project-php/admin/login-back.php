<?php 

    session_start(); 
	error_reporting(E_ALL ^ E_DEPRECATED);
	require_once("../db.php");
	if (isset($_POST['submit'])) {
		$username = $_POST['user-name'];
		$password = $_POST['password'];

		$sql = "SELECT * FROM admin WHERE user_name = '$username' AND passwords = '$password'";
		$result = mysqli_query($con,$sql);

		$row = mysqli_num_rows($result);
		if ($row > 0) {
			 $_SESSION['admin'] = $username;
			 while ($row = mysqli_fetch_assoc($result)) {
            	$_SESSION['id'] = $row['id'];
        }
        include('order-list.php');	
		}else{
			$error = "Vui lòng kiểm tra lại tên đăng nhập và mật khẩu !";
			 include('index.php');

			 die("");
        	exit();
		}
	}
	

 ?>