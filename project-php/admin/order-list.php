<?php

include('../db.php');
include 'header.php';
$fail = $success = '';
$notDelete = '';
if (isset($_GET['notDelete'])) {
    $notDelete = "Không thể xóa đơn hàng đã được giao cho khách hàng";
}
$deleteSuccess = '';
if (isset($_GET['deleteSuccess'])) {
    $deleteSuccess = "Đơn hàng đã được xóa!";
}

$status = 0;
if (isset($_GET['idStatus'])) {
    $idStatus = $_GET['idStatus'];
    if (isset($_POST['updateStatus'])) { {
            if (isset($_POST['status'])) {
                $status = 1;
            }
        }
        $sql = "update orders set status = $status where id = $idStatus";

        $res = mysqli_query($con,$sql);
    }
}
$num_rec_per_page = 10;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $num_rec_per_page;

$num_rec_per_page = 10;
if (isset($_GET["page"])) {
    $page = $_GET["page"];
} else {
    $page = 1;
};
$start_from = ($page - 1) * $num_rec_per_page;

$sql = "SELECT id FROM orders group by id LIMIT $start_from, $num_rec_per_page";
$rs_result = mysqli_query($con,$sql); //run the query
$sql = "SELECT * FROM orders,users,products WHERE orders.user_id = users.id AND orders.product_id = products.id";
$rs_result_full = mysqli_query($con,$sql); //run the query

if (!$rs_result_full) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
$total_records = mysqli_num_rows($rs_result_full);  //count number of records

$total_pages = ceil($total_records / $num_rec_per_page);

?>

        <div class="row">
    <div class="col-md-8 offset-3">
        <h1>Danh sách đơn đặt hàng</h1>
        <hr class="my-4">
        <p><?php echo $success . $fail; ?>
		<table class="table table-responsive table-inverse">
		<thead>
		    <tr align="center">
		        <th>Mã hàng</th>

		        <th>Tổng tiền</th>
		        <th>Thông tin khách hàng</th>

		        <th>Chuyển hàng</th>
		        <th>Chi tiết
		        </th>
		        <th>Xóa </th>
		    </tr>
		</thead>
	<tbody>
                        <?php
                        if ($rs_result_full) {
                            while ($row = mysqli_fetch_assoc($rs_result_full)) {
                                    $total = $row['price'] * $row['qty'];
                                ?>

                                <tr class="odd gradeX" align="center">
                                    <td><?php echo $row['id_Order']; ?></td>
                                    <td><?php echo number_format($total) ?></td>
                                    <td ><?php
                                        echo '<span style="float:left;">Mã khách hàng: ' . $row['user_id'] . '</span></br>';
                                        echo '<span style="float:left">Họ và tên: ' . $row['first_name'] , $row['last_name'] . '</span></br>';
                                        echo '<span style="float:left">Địa chỉ:' . $row['address'] . ' </span></br>';
                                        ?></td>
                                    <td>
                                        <form action="order-list.php?idStatus=<?php echo $row['id_Order']; ?>" method="POST" >
                                            <div class="row">
                                                <div class ="col-lg-2 col-md-2 hidden-sm">
                                                </div>
                                                <div class ="col-lg-3 col-md-3 col-sm-3">


                                                    <label class="checkbox">

                                                        <?php if ($row['p_status'] == "Completed") {
                                                            ?>    
                                                            <input  value="<?php echo $row['p_status'] ?>" type="checkbox" checked="" name="status"  >
                                                            <?php
                                                        } else {
                                                            ?>
                                                            <input  value="<?php echo $row['p_status'] ?>" type="checkbox" name="status">
        <?php
         }
        ?>

                                                    </label>
                                                </div>
                                                <div class ="col-lg-5 col-md-5 col-sm-6">
                                                    <button style="background: transparent;" type="submit" name ="updateStatus" class="btn  btn-sm">Cập nhật</button>
                                                </div>
                                                <div class ="col-lg-1 col-md-1 ">
                                                </div>
                                            </div>
                                        </form>

                                    </td>


                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="order-detail.php?idOrderDetail=<?php echo $row['id_Order']; ?>">Chi tiết</a></td>
                                    <td><i class ="fa fa-trash-o  fa-fw"></i><a href="deleterow.php?deleteAllIdOrderSame=<?php echo $row['id_Order']; ?>&statusOrder=<?php echo $row['status'] ?>">Xóa</a></td>

                                    <?php
                                }
                            }
                            ?>
                    </tbody>
                </table>
	</div>

</div>





</body>

</html>
