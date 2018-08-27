
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once '../db.php';
$target_dir = "../";
$target_file = $target_dir . basename($_FILES["fImages"]["name"]);
$uploadOk = 1;
if (isset($_GET['idProduct'])) {
    $idProduct = $_GET['idProduct'];
}


if (isset($_POST['addProduct'])) {
    $keywordPr = '';
    $descriptPr = '';
    $status = 0;
    $image = basename($_FILES["fImages"]["name"]);
    if ($image == null || $image = '') {
        $image = $_POST['image'];
        $uploadOk = 0;
    } else {
        $check = getimagesize($_FILES["fImages"]["tmp_name"]);
        if ($check !== false) {
            $image = basename($_FILES["fImages"]["name"]);

            $uploadOk = 1;
        } else {
            $image = $_POST['image'];
            ?>

            <script type="text/javascript">
                window.location = 'product-edit.php?noimage=notimage';
            </script>
            <?php
            $uploadOk = 0;
        }
    }


    //Upload image
    if (file_exists($target_file)) {
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {

    } else {
        if (move_uploaded_file($_FILES["fImages"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fImages"]["name"]) . " has been uploaded.";
        } else {
//            echo "Sorry, there was an error uploading your file.";
        }
    }
    if (isset($_POST['txtName'])) {
        $namePr = $_POST['txtName'];
    }
    if (isset($_POST['category'])) {
        $categoryPr = $_POST['category'];
    }
    if (isset($_POST['txtPrice'])) {
        $pricePr = $_POST['txtPrice'];
    }

    if (isset($_POST['txtDay'])) {
        $dayPr = $_POST['txtDay'];
    }
    if (isset($_POST['txtCapacity'])) {
        $capacityPr = $_POST['txtCapacity'];
    }
    
    if (isset($_POST['txtNumber'])) {
        $quantityPr = $_POST['txtNumber'];
    }
    if (isset($_POST['txtKeyword'])) {
        $keywordPr = $_POST['txtKeyword'];
    } 
    if (isset($_POST['txtDescript'])) {
        $descriptPr = $_POST['txtDescript'];
    }
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }
    $sql = "UPDATE products,image SET name_pro = '$namePr',price = '$pricePr',created = '$dayPr',status_pro = '$status',category_id = '$categoryPr',quantity = '$quantityPr',capacity = '$capacityPr',keyword = '$keywordPr',description = '$descriptPr',image_link ='$image' WHERE products.id = '$idProduct' AND products.id = image.pro_id";

    $res = mysqli_query($con,$sql);

if (!$res) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
    if ($res) {
        ?>

             <script type="text/javascript">
                alert('Cap nhat thanh cong');
                window.location = 'product-edit.php?idProduct= <?php echo $idProduct?>';
            </script>
            
        <?php
    }
} else {
//    echo 'error';
}
?>