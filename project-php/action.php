<?php
session_start();
$ip_add = getenv("REMOTE_ADDR");
include "db.php";
if(isset($_POST["category"])){
	$category_query = "SELECT * FROM category";
	$run_query = mysqli_query($con,$category_query) or die(mysqli_error($con));
	echo "
	<div class='nav nav-pills nav-stacked flex-column'>
	<li class='active'><a href='#'><h4>Categories</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$cid = $row["id"];
			$cat_name = $row["name_category"];
			echo "
			<li><a href='#' class='category' cid='$cid'>$cat_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["brand"])){
	$brand_query = "SELECT * FROM brands";
	$run_query = mysqli_query($con,$brand_query);
	echo "
	<div class='nav flex-column nav-pills nav-stacked'>
	<li class='active'><a href='#'><h4>Brands</h4></a></li>
	";
	if(mysqli_num_rows($run_query) > 0){
		while($row = mysqli_fetch_array($run_query)){
			$bid = $row["id"];
			$brand_name = $row["brand_title"];
			echo "
			<li><a href='#' class='selectBrand' bid='$bid'>$brand_name</a></li>
			";
		}
		echo "</div>";
	}
}
if(isset($_POST["page"])){
	$sql = "SELECT * FROM products";
	$run_query = mysqli_query($con,$sql);
	$count = mysqli_num_rows($run_query);
	$pageno = ceil($count/9);
	for($i=1;$i<=$pageno;$i++){
		echo "
		<li><a href='#' page='$i' id='page'>$i</a></li>
		";
	}
}

if(isset($_POST["getProduct"])){
	$limit = 8;
	if(isset($_POST["setPage"])){
		$pageno = $_POST["pageNumber"];
		$start = ($pageno * $limit) - $limit;
	}else{
		$start = 0;
	}
	$product_query = "SELECT * FROM products p,image i WHERE p.id = i.pro_id LIMIT $start,$limit";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		?>
		<div class="container">
			<div class="pull-right product-banner col-md-4">
            <div class="product-banner-inner">
                <h4 class="title">Nước hoa</h4>
                <h3 class="name"> Mới về</h3>
                <button type="button" class="btn"><a href="products_all.php">Xem tất cả</a></button>    
            </div>
            <img class="lazy" src="./Hinhanh/nuoc_hoa.png">
        </div>
        <div class="home-product-inner row">
		
		<?php
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['pro_id'];
			$pro_cat   = $row['category_id'];
			$pro_title = $row['name_pro'];
			$pro_price = number_format($row['price']);
			$pro_image = $row['image_link'];

			echo "
			
				<div class='col-md-3 item col-xs-6 post-scroll'>
					<div class='product-item'>
						<a href='detail.php?id=$pro_id' class='product-item-thumb'>
	                        <img src=' $pro_image' class='lazy_img'>
	                    </a>
						<div class='product-item-body'>
							<div class='product-name pro-color'><b>$pro_title</b>
							</div>
							<div class='product-price'>
	                            <span><b>$pro_price</b></span>
	                        </div>
						</div>
					
						<button pid='$pro_id' id='product' class='btn btn-danger btn-xs'>Thêm vào giỏ</button>
	                   
					</div>
				</div>	
			";

		}
		?>
	</div>
	</div>
		<?php

	}
}
if(isset($_POST["getProduct1"])){

	$product_query = "SELECT * FROM products p,image i WHERE p.id = i.pro_id ";
	$run_query = mysqli_query($con,$product_query);
	if(mysqli_num_rows($run_query) > 0){
		?>
        <div class="home-product-inner row">
		
		<?php
		while($row = mysqli_fetch_array($run_query)){
			$pro_id    = $row['pro_id'];
			$pro_cat   = $row['category_id'];
			$pro_title = $row['name_pro'];
			$pro_price = number_format($row['price']);
			$pro_image = $row['image_link'];

			echo "
			
				<div class='col-md-3 item col-xs-6 post-scroll'>
					<div class='product-item'>
						<a href='detail.php?id=$pro_id' class='product-item-thumb'>
	                        <img src='$pro_image' class='lazy_img'>
	                    </a>
						<div class='product-item-body'>
							<div class='product-name pro-color'><b>$pro_title</b>
							</div>
							<div class='product-price'>
	                            <span><b>$pro_price</b></span>
	                        </div>
						</div>
					
						<button pid='$pro_id' id='product' class='btn btn-danger btn-xs'>Thêm vào giỏ</button>
	                   
					</div>
				</div>	
			";

		}
		?>
	</div>
	</div>
		<?php

	}
}


if(isset($_POST["get_seleted_Category"]) || isset($_POST["selectBrand"]) || isset($_POST["search"])){
	if(isset($_POST["get_seleted_Category"])){
		$id = $_POST["cat_id"];
		$sql = "SELECT * FROM products WHERE category_id = '$id'";
	}else if(isset($_POST["selectBrand"])){
		$id = $_POST["brand_id"];
		$sql = "SELECT * FROM products WHERE brand_id = '$id'";
	}else {
		$keyword = $_POST["keyword"];
		$sql = "SELECT * FROM products WHERE keyword LIKE '%$keyword%'";
	}
	?>
		<div class="container">
			<div class="pull-right product-banner col-md-4">
            <div class="product-banner-inner">
                <h4 class="title">Nước hoa</h4>
                <h3 class="name"> Mới về</h3>
                <button type="button" class="btn"><a>Xem tất cả</a></button>    
            </div>
            <img class="lazy" src="./Hinhanh/nuoc_hoa.png">
        </div>
        <div class="home-product-inner row">
		
		<?php
	$run_query = mysqli_query($con,$sql);
	while($row=mysqli_fetch_array($run_query)){
		$pro_id    = $row['id'];
			$pro_cat   = $row['category_id'];
			 $pro_brand = $row['brand_id'];
			$pro_title = $row['name_pro'];
			$pro_price = number_format($row['price']);
			$pro_image = $row['image_link'];
		echo "
			<div class='col-md-3 item col-xs-6 post-scroll'>
				<div class='product-item'>
					<a href='' class='product-item-thumb'>
                        <img src=' $pro_image' class='lazy_img'>
                    </a>
					<div class='product-item-body'>
						<div class='product-name pro-color'><b>$pro_title</b>
						</div>
						<div class='product-price'>
                            <span><b>$pro_price</b></span>
                        </div>
					</div>
				
					<button pid='$pro_id' id='product' class='btn btn-danger btn-xs'>Thêm vào giỏ</button>
                   
				</div>
			</div>	
			";
	}
}



if(isset($_POST["addToCart"])){

	$p_id = $_POST["proId"];



	if(isset($_SESSION["uid"])){
		$user_id = $_SESSION["uid"];
		$sql = "SELECT * FROM cart WHERE p_id = '$p_id' AND user_id = '$user_id'";
		$run_query = mysqli_query($con,$sql);
		$count = mysqli_num_rows($run_query);

		if($count > 0){
			echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Product is already added into the cart Continue Shopping..!</b>
			</div>
			";//not in video
		} else {
			$sql = "INSERT INTO `cart`
			(`p_id`, `ip_add`, `user_id`, `qty`) 
			VALUES ('$p_id','$ip_add','$user_id','1')";
			if(mysqli_query($con,$sql)){
				echo "
				<div class='alert alert-success'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				<b>Product is Added..!</b>
				</div>
				";
			}
		}

	}else{
		
		$sql = "SELECT id_cart FROM cart WHERE ip_add = '$ip_add' AND p_id = '$p_id' AND user_id = -1";
		$query = mysqli_query($con,$sql);
		if (mysqli_num_rows($query) > 0) {
			echo "
			<div class='alert alert-warning'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Product is already added into the cart Continue Shopping..!</b>
			</div>";
			exit();

		}

		$sql = "INSERT INTO `cart`
		(`p_id`, `ip_add`, `user_id`, `qty`) 
		VALUES ('$p_id','$ip_add','-1','1')";
		$query = mysqli_query($con,$sql);
		if (!$query) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
		if ($query) {
			echo "
			<div class='alert alert-success'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<b>Your product is Added Successfully..!</b>
			</div>
			";
			exit();
		}

	}




}

//Count User cart item
if (isset($_POST["count_item"])) {
	//When user is logged in then we will count number of item in cart by using user session id
	if (isset($_SESSION["uid"])) {
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE user_id = $_SESSION[uid]";
	}else{
		//When user is not logged in then we will count number of item in cart by using users unique ip address
		$sql = "SELECT COUNT(*) AS count_item FROM cart WHERE ip_add = '$ip_add' AND user_id < 0";
	}
	
	$query = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($query);
	echo $row["count_item"];
	exit();
}
//Count User cart item

// Get Cart Item From Database to Dropdown menu
if (isset($_POST["Common"])) {

	if (isset($_SESSION["uid"])) {
		//When user is logged in this query will execute
		$sql = "SELECT a.id,a.name_pro,a.price,a.capacity,i.image_link,b.id_cart,b.qty FROM products a,cart b, image i WHERE a.id = i.pro_id AND a.id=b.p_id AND b.user_id='$_SESSION[uid]'";
	}else{
		//When user is not logged in this query will execute
		$sql = "SELECT a.id,a.name_pro,a.price,a.capacity,i.image_link,b.id_cart,b.qty FROM products a,cart b, image i WHERE a.id = i.pro_id AND a.id=b.p_id AND b.ip_add='$ip_add' AND b.user_id < 0";
	}
	$query = mysqli_query($con,$sql);
	if (!$query) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
}

	// if (isset($_POST["getCartItem"])) {
	// 	//display cart item in dropdown menu
	// 	if (mysqli_num_rows($query) > 0) {
	// 		$n=0;
	// 		while ($row=mysqli_fetch_array($query)) {
	// 			$n++;
	// 			$product_id = $row["id"];
	// 			$product_title = $row["name_pro"];
	// 			$product_price = $row["price"];
	// 			$product_image = $row["image_link"];
	// 			$cart_item_id = $row["id"];
	// 			$qty = $row["qty"];
	// 			echo '
	// 			<div class="row">
	// 			<div class="col-md-3">'.$n.'</div>
	// 			<div class="col-md-3"><img class="img-responsive" src="'.$product_image.'" /></div>
	// 			<div class="col-md-3">'.$product_title.'</div>
	// 			<div class="col-md-3">$'.$product_price.'</div>
	// 			</div>';
				
	// 		}
	// 	 ?> 
	 		<!-- <a style="float:right;" href="cart.php" class="btn btn-warning">Edit&nbsp;&nbsp;<span class="glyphicon glyphicon-edit"></span></a> -->
 		<?php 
	// 		exit();
	// 	}
	// }

	if (isset($_POST["checkOutDetails"])) {
		if (mysqli_num_rows($query) > 0) {
			//display user cart item with "Ready to checkout" button if user is not login
			echo "<form method='post' action='login_form.php'>";
			$n=0;
			while ($row=mysqli_fetch_array($query)) {
				$n++;
				$product_id = $row["id"];
				$product_title = $row["name_pro"];
				$product_price = $row["price"];
				$product_image = $row["image_link"];
				$cart_item_id = $row["id"];
				$qty = $row["qty"];
				$cap = $row["capacity"];

				echo 
				'<div class="row">
					<div class="col-md-2">
						<div class="btn-group">
							<a href="#" remove_id="'.$product_id.'" class="btn btn-danger remove"><span class="fa fa-trash-o  fa-fw"></span></a>
							<a href="#" update_id="'.$product_id.'" class="btn btn-primary update"><span class="fa fa-check-circle"></span></a>
						</div>
					</div>
					<input type="hidden" name="product_id[]" value="'.$product_id.'"/>
					<input type="hidden" name="" value="'.$cart_item_id.'"/>
					<div class="col-md-2"><a href="detail.php?id='.$product_id.'" title=""><img class="img-responsive" src="'.$product_image.'"></a></div>
					<div class="col-md-2">'.$product_title.'</div>
					<div class="col-md-1"><input type="text" class="form-control qty" value="'.$qty.'" ></div>
					<div class="col-md-1">'.$cap.'</div>
					<div class="col-md-2"><input type="text" class="form-control price" value="'.$product_price.'" readonly="readonly">
					</div>
					<div class="col-md-2">
						<input type="text" class="form-control total" value="'.$product_price.'" readonly="readonly">
					</div>
				</div>';
			}

			echo '
			<div class="row">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<b class="net_total" style="font-size:20px; color:red;"> </b>
				</div>
			</div>
			';

		

			if (!isset($_SESSION["uid"])) {
				echo '
				<div class="button-cart-action">
					<button type="submit"  name="login_user_with_product" class="btn btn-primary  readall" >Đặt hàng
					</button>
					<a href="index.php" class="btn btn-primary  readall">Mua thêm</a>
				</div>
				</form>';
	

			}else if(isset($_SESSION["uid"])){
					$id_u = $_SESSION["uid"];
				echo "
				<div class='button-cart-action'>
					<a href='payment_success.php?id=$id_u' class='btn btn-primary  readall'>Đặt hàng</a>
					
					<a href='index.php' class='btn btn-primary  readall'>Mua thêm</a>
				</div>
				";
			}
		}
	}
	
	// }


//Remove Item From cart
if (isset($_POST["removeItemFromCart"])) {
	$remove_id = $_POST["rid"];
	if (isset($_SESSION["uid"])) {
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "DELETE FROM cart WHERE p_id = '$remove_id' AND ip_add = '$ip_add'";
	}
	$res=mysqli_query($con,$sql);
	if($res){
		echo "<div class='alert alert-danger'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is removed from cart</b>
		</div>";
		exit();
	}
}


//Update Item From cart
if (isset($_POST["updateCartItem"])) {
	$update_id = $_POST["update_id"];
	$qty = $_POST["qty"];
	if (isset($_SESSION["uid"])) {
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND user_id = '$_SESSION[uid]'";
	}else{
		$sql = "UPDATE cart SET qty='$qty' WHERE p_id = '$update_id' AND ip_add = '$ip_add'";
	}
	if(mysqli_query($con,$sql)){
		echo "<div class='alert alert-info'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<b>Product is updated</b>
		</div>";
		exit();
	}
}




?>






