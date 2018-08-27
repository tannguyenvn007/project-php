<?php
include 'header.php';
$sql = "SELECT * FROM  contact, products WHERE contact.pro_id = products.id";
 $res = mysqli_query($con,$sql);
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
        <h1>Nhận xét của khách hàng về sản phẩm</h1>
        <hr class="my-4">
        <p><?php echo $success . $fail; ?>
        <table class="table table-striped table-bordered table-hover" id="table_id">
                <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Họ và tên</th>
                        <th>Email</th>
                        <th>Nội dung</th>
                        <th>ID của sản phẩm</th>
                        <th>Xóa</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        if ($res) {
                            while ($row = mysqli_fetch_assoc($res)){   
                    ?>
                    <tr class="odd gradeX" align="center">
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['name_cus']?></td>
                        <td><?php echo $row['mail']?></td>
                        <td><?php echo $row['content']?></td>
                        <td><a href="detail_pro.php?id=<?php echo $row['pro_id'];?>"> <i class=""></i><?php echo $row['pro_id']?></a></td>
                        <td class="center"><a href="deleterow.php?id=<?php echo $row['id'];?>"> <i class="fa fa-trash-o  fa-fw"></i>Delete</a></td>
                       
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