<?php
include('../db.php');
include 'header.php';

if (isset($_GET['idOrderDetail'])) {
    $total = 0;
    $totalPay = 0;
    $idOrder = $_GET['idOrderDetail'];
    $notDelete = '';
    if(isset($_GET['notDelete'])) { 
        $notDelete = "Không thể xóa sản phẩm đã được giao cho khách hàng";
        
    }

 $sql = " SELECT * FROM orders,users where id_Order ='$idOrder' AND orders.user_id = users.id ";

?>
     <!-- Page Content -->
           <div class="row">
    <div class="col-md-8 offset-3">
        <h1>Chi tiết đơn hàng</h1>
        <hr class="my-4">
<?php 
    $res = mysqli_query($con,$sql);
    if (!$res) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
    if ($res) {
        while ($row = mysqli_fetch_assoc($res)) {
            ?>

            <!-- Page Content -->
            
                    <div class="row">


                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            

                            <div class ="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <h3>Thông tin người nhận</h3>
                                    <table class="table table-responsive">
                                        <tr>
                                            <th>Tên khách hàng</th>
                                            <td><?php echo $row['first_name'] ,$row['last_name']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Số điện thoại</th>
                                            <td><?php echo $row['phone']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $row['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Địa chỉ</th>
                                            <td><?php echo $row['address']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Ngày đặt hàng</th>
                                            <td><?php echo $row['date_Order'];?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h3>Thông tin chi tiết sản phẩm</h3>
                            <p style="color: #009999"><?php echo $notDelete;?>

                            <table class="table table-striped table-bordered table-hover table-responsive">
                                <thead>
                                    <tr align="center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>

                                        <th>Giảm giá</th>
                                        <th>Số lượng</th>

                                        <th>Tổng cộng</th>
                                        <th>Xóa sản phẩm </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sqlOrderProduct = "SELECT * FROM orders,products,image where id_Order = '$idOrder' AND orders.product_id = products.id AND image.pro_id = products.id";
                                    $resOrderPr = mysqli_query($con,$sqlOrderProduct);
                                        if (!$resOrderPr) {
                                            printf("Error: %s\n", mysqli_error($con));
                                            exit();
                                            }
                                    if ($resOrderPr) {

                                        $totalAllSale = 0;
                                        
                                        while ($rowOP = mysqli_fetch_assoc($resOrderPr)) {
                                            $totalPriceProduct = $rowOP['price']*$rowOP['qty'];
                                            ?>
                                            <tr class="odd gradeX" align="center">
                                                <td><img src=".<?php echo $rowOP['image_link']; ?>"></td>
                                                <td><?php echo $rowOP['name_pro']; ?></td>
                                                <td><?php echo number_format($rowOP['price']); ?></td>

                                                <td>

                                                    <?php echo  number_format($totalAllSale);?>đ
                                                   
                                                </td>
                                                <td>
                                                  <?php echo $rowOP['qty']; ?>
                                                    
                                                   </td>
                                                <td><?php echo number_format($totalPriceProduct); ?></td>




                                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i> <a href="deleterow.php?idOrderDetail=<?php echo $idOrder?>&idProduct=<?php echo $rowOP['idProduct'];?>&idStatus=<?php echo $rowOP['status'];?>">Xóa </a></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>



    <?php
}
?>

</body>

</html>
