<?php
include 'header.php';
if (isset($_GET['idProduct'])) {
    $idProduct = $_GET['idProduct'];
    $sql = "SELECT * FROM products,image WHERE products.id  = $idProduct AND products.id = image.pro_id";
    $result = mysqli_query($con,$sql);
    ?>
    <div class="row">
 	<div class="col-md-8 offset-3">
 		<h1>Chỉnh sửa sản phẩm</h1>
 		<hr class="my-4">
        <div class="col-lg-7" style="padding-bottom:120px">
             <?php 
             	if ($result) {
             		while ($row = mysqli_fetch_assoc($result)){
             			$thumImage = "../" . $row['image_link'];
             			?>
             			<form action="productedit-back.php?idProduct=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="txtName" value="<?php echo $row['name_pro'] ?>" required/>
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
	                        <select class="form-control" name = "category">
	                            <?php
	                            $idCa = $row['category_id'];

	                            $sqlCa = "select * from category where id = $idCa";
	                            $resCa = mysqli_query($con,$sqlCa);
	                            while ($rowCa = mysqli_fetch_assoc($resCa)) {
	                                ?>
	                                <option value = "<?php echo $rowCa['id']; ?>"><?php echo $rowCa['name_category']; ?></option>

	                            <?php
	                            }
	                            $sqlCate = "select * from category";
	                            $resCate = mysqli_query($con,$sqlCate);
	                            while ($rowCate = mysqli_fetch_assoc($resCate)) {
	                                ?>
	                                <option value = "<?php echo $rowCate['id']; ?>"><?php echo $rowCate['name_category']; ?></option>
	                            <?php }
	                            ?>
	                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type ="number"  class="form-control" name="txtPrice" value="<?php echo $row['price'] ?>" required/>
                            </div>
                             </div>

                            <div class="col-md-6 col-sm-6 col-xs-6">
                                <div class="form-group">
                                    <label>Nhập phần trăm giảm(nếu có)</label>
                                    <input type = "number" class="form-control" name="txtSalePrice" value="<?php echo $row['price_old'] ?>" min ="0" max = "90"/>
                                </div>
                            </div>
                                                       </div>
					<div class="form-group">
                        <label>Ngày nhập</label>
                        <input class="form-control" name="txtDay"  required/ value="<?php echo $row['created'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Dung tích</label>
                        <input type="text" class="form-control" name="txtCapacity" required/ value="<?php echo $row['capacity'] ?>">
                    </div>
                    
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input type="number" class="form-control" name="txtNumber" min="1" required/ value="<?php echo $row['quantity'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Chọn hình ảnh sản phẩm</label>
                        <input type="file" name="fImages">
                        <img src ="<?php echo $thumImage ?>" width="80px" height ="80px">
                        <input type="hidden" name="image" value="<?php echo $row['image_link']; ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Nhập từ cho khách hàng tìm kiếm</label>
                        <input class="form-control" name="txtKeyword" value<?php echo $row['keyword']; ?> />

                    </div>

                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="txtDescript"></textarea>
                    </div>
                    <div class ="form-group">
                                    <label class="radio-inline">Tình trạng sản  phẩm</label>

                                    <?php if ($row['status_pro'] == 1) { ?>
                                        <label class="radio-inline">
                                            <input name="status" value="1"  checked="" type="radio">Có sẵn
                                        </label>
                                        <label class="radio-inline">
                                            <input name="status" value="0"   id ="hide"  type="radio">Không có sẵn
                                        </label>

                                    <?php } else {
                                        ?>
                                        <label class="radio-inline">
                                            <input name="status" value="1"   type="radio">Có sẵn
                                        </label>
                                        <label class="radio-inline">
                                            <input name="status" value="0"  checked=""  id ="hide" checked="" type="radio">Không có sẵn
                                        </label>
                                    <?php }
                                    ?>

                                    <?php
                                }
                            }
                        }
                        ?>

                    </div>
                    <button type="submit" name ="addProduct" class="btn btn-warning btn-block btn-lg">Chỉnh sửa sản phẩm</button>
                </form>
        
            </div>
 	</div>
 </div>