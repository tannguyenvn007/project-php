<?php 
	include 'header.php';
	if (isset($_POST['insertCategory'])) {
	    if ($_POST['txtCateName']) {
	        $categoryName = $_POST['txtCateName'];
	        $sqlInsertCate = "insert into category(name_category) values('$categoryName')";
	        $resCate = mysqli_query($con,$sqlInsertCate);
    	}
	}
	if (isset($_POST['updateCategory'])) {
	    if($_POST['idCate']) {
	        $idCate = $_POST['idCate'];
	    if ($_POST['txtCateName']) {
	        $categoryName = $_POST['txtCateName'];
	        $sqlUpdateCate = "update category set name_category = '$categoryName' where id =$idCate";

	        $resCate = mysqli_query($con,$sqlUpdateCate);
	    }
	    }
	}
	$sql = "select * from category";
	$res = mysqli_query($con,$sql);
	$fail = $success = '';
	if (isset($_GET['cs'])) {
	    $success = "Bạn đã xóa thành công";
	}
	if (isset($_GET['cf'])) {
	    $fail = "Không thể xóa sản phẩm";
	}

 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.css"/>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/datatables.min.js"></script>
 <div class="row">
 	<div class="col-md-8 offset-3">
 		<h1>Danh mục sản phẩm</h1>
 		<hr class="my-4">
        <p><?php echo $success . $fail; ?>
		<div class="row">
			<div class="col-md-6">
				<h5><a href="category-list.php?addCategory=hh" ><u>Thêm danh mục</u></a></h5>
				<?php 	
					if (isset($_GET['addCategory'])) {
						?>
						<form action ="category-list.php?addCategory=hh" method="POST">
							<fieldset class="form-group">
								<label for="Category">Tên danh mục</label>
								<input type="text" class="form-control" placeholder="Vui lòng nhập tên danh mục sản phẩm" name="txtCateName">
							</fieldset>
							<button type="submit" name ="insertCategory" class="btn btn-primary">Thêm</button>
							<button type="reset" class="btn btn-default">Thiết lập lại</button>
						</form>

						<?php 
					}
				 ?>
			</div>
			<?php
                if (isset($_GET['idCate'])) {
                    $idCate = $_GET['idCate'];
                    $sqlSelectEachCategory = "select * from category where id = $idCate";
                    $resEachCategory = mysqli_query($con,$sqlSelectEachCategory);
                    while($rowEach = mysqli_fetch_assoc($resEachCategory)) {
                ?>

            <div class="col-md-6">
            	<h5>Chình sửa sản phẩm</h5>
				<form action ="category-list.php" method="POST">
							<fieldset class="form-group">
								<label for="Category">Tên danh mục</label>
								<input class="form-control" name="txtCateName"  value="<?php echo $rowEach['name_category'];?>">         
                          		<input type="hidden" name="idCate" value="<?php echo $rowEach['id']?>">
							</fieldset>
							<button type="submit" class="btn btn-primary" name ="updateCategory">Chỉnh sữa</button>
						</form>
            </div>
            <?php 
			        }
			    }
                ?>
		</div>
		<table class="table table-striped table-bordered table-hover" id="table_id">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Danh mục sản phẩm</th>
                        <th>Chính sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            ?>

                            <tr class="odd gradeX" align="center">
                                <td><?php echo $row['id']; ?></td>

                                <td>
                                    <div class="form-group">
                                        <input class="form-control" name ='nameCate'type="text" value="     <?php echo $row['name_category']; ?>" style="background: transparent; border: none;"/>
                                    </div>
                                </td>

                                <td class="center">
                                    <i class="fa fa-pencil fa-fw">
                                    </i> 
                                    <a href="category-list.php?idCate=<?php echo $row['id']; ?>">Chỉnh sửa</a>
                                </td>



                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="deleterow.php?idCate=<?php echo $row['id']; ?>">Xóa</a></td>

                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>

            </table>
 	</div>
 </div>
	<script type="text/javascript">
			$(document).ready(function() {
			    $('#table_id').DataTable();
			} );
			</script>
		
