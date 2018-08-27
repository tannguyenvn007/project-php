<?php 
include 'header.php'; 
if (isset($_GET['noimage'])) {
    $noimage = 'Vui lòng chọn hình ảnh hợp lệ';
} else {
    $noimage = '';
}
?>


<div class="row">
 	<div class="col-md-8 offset-3">
 		<h1>THÊM SẢN PHẨM</h1>
 		<hr class="my-4">
        <div class="col-lg-7" style="padding-bottom:120px">
             
                <form action="productadd-back.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Tên sản phẩm</label>
                        <input type="text" class="form-control" name="txtName" placeholder="Nhập tên sản phẩm"  required/>
                    </div>
                    <div class="form-group">
                        <label>Danh mục sản phẩm</label>
                      
                        <select class="form-control" name = "category">
                              <?php $sql = "select * from category";
                        $res = mysqli_query($con,$sql);
                        if($res) {
                            while($row=  mysqli_fetch_assoc($res)) {
                                ?>
                              <option value = "<?php echo $row['id']?>"><?php echo $row['name_category']?></option>
                            
                     <?php       }
                        }
                       ?>
                          
                            
                            
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label>Giá sản phẩm</label>
                                <input type ="number"  class="form-control" name="txtPrice" placeholder="Nhập giá sản phẩm" min="20000" required/>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <label>Nhập phần trăm giảm(nếu có)</label>
                                <input type = "number" class="form-control" name="txtSalePrice" placeholder="Nhập phần trăm giá giảm" value="0" min = "0" max = "90"/>
                            </div>
                        </div>
                    </div>
					<div class="form-group">
                        <label>Ngày nhập</label>
                        <input class="form-control" name="txtDay" placeholder="Nhập ngày" required/ value="<?php echo date('Y-m-d') ?>">
                    </div>
                    <div class="form-group">
                        <label>Dung tích</label>
                        <input type="text" class="form-control" name="txtCapacity" placeholder="Nhập dung tích sản phẩm" required/>
                    </div>
                    
                    <div class="form-group">
                        <label>Số lượng sản phẩm</label>
                        <input type="number" class="form-control" name="txtNumber" placeholder="Nhập số lượng sản phẩm" min="1" required/>
                    </div>
                    <div class="form-group">
                        <label>Chọn hình ảnh sản phẩm</label>
                        <input type="file" name="fImages" required>
                        <span style="color: red">  <?php echo $noimage ?></span>

                    </div>
                    <div class="form-group">
                        <label>Nhập từ cho khách hàng tìm kiếm</label>
                        <input class="form-control" name="txtKeyword" placeholder="Nhập từ khóa tìm kiếm" />
                    </div>

                    <div class="form-group">
                        <label>Mô tả sản phẩm</label>
                        <textarea class="form-control" rows="3" name="txtDescript"></textarea>
                    </div>
                    <div class ="form-group">
                        <label class="radio-inline">Tình trạng sản  phẩm</label>
                         <label class="radio-inline">
                            <input name="status" value="1"  type="radio">Có sẵn
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" id ="hide" type="radio">Không có sẵn
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="submit" name ="addProduct" id="insert" class="btn btn-warning btn-block btn-lg">Thêm</button>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <button type="reset" class="btn btn-default btn-block btn-lg" style="background: gray; color:white;">Thiết lập lại</button>
                        </div>
                    </div>
                </form>
            </div>
 	</div>
 </div>