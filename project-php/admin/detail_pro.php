<?php
include 'header.php';
if (isset($_GET['id'])) {
    $id_cm = $_GET['id'];
$sql = "SELECT * FROM  products, image WHERE products.id = image.pro_id AND products.id = '$id_cm' ORDER BY products.id  DESC ";
 $res = mysqli_query($con,$sql);
}
 if (!$res) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
$fail = $success = '';
if(isset($_GET['ps'])) {
    $success = "Bạn đã xóa thành công";
}
if(isset($_GET['pf'])) {
    $fail = "Không thể xóa sản phẩm";
}
?>

<div class="row">
 	<div class="col-md-8 offset-3">
 		<h1>Danh sách sản phẩm</h1>
 		<hr class="my-4">
        <p><?php echo $success . $fail; ?>
		<table class="table table-striped table-bordered table-hover" id="table_id">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Giá</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    if ($res) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            if ($row['image_link'] == null || $row['image_link'] == '') {
                                $thumbImage = "";
                            } else {
                                $thumbImage = "." . $row['image_link'];
                            }
                        
                    
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $row['pro_id']?></td>
                        <td><?php echo $row['name_pro']?></td>
                        <td><img src = "<?php echo $thumbImage?>" width =80px; height = 80px;> </td>
                        <td><?php echo number_format($row['price'])?></td>
                        
                        <td class="center"><a href="product-edit.php?idProduct=<?php echo $row['id'];?>"><i class="fa fa-pencil fa-fw"></i> Chi tiết</a></td>
                        <td class="center"><a href="deleterow.php?idProducts=<?php echo $row['id'];?>"> <i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                       
                    </tr>
                    <?php 
                    }
                    }else {
                        echo 'error';
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