<meta charset="utf-8">
<?php
error_reporting(E_ALL ^ E_DEPRECATED);
require_once("../db.php");
$target_dir = "../";
$target_file = $target_dir . basename($_FILES["fImages"]["name"]);
$uploadOk = 1;

if (isset($_POST['addProduct'])) {
    //  $salePricePr = 0;
    $keywordPr = '';
    $descriptPr = '';
    $status = 0;
    $image = basename($_FILES["fImages"]["name"]);
    if ($image == null || $image = '') {
//        $image = $_POST['image'];
        $image = '';
        $uploadOk = 0;
    } else {
        $check = getimagesize($_FILES["fImages"]["tmp_name"]);
        if ($check !== false) {
            $image = basename($_FILES["fImages"]["name"]);

            $uploadOk = 1;
        } else {
            $image = '';
            ?>

            <script type="text/javascript">
                window.location = 'product-add.php?noimage=notimage';
            </script>
            <?php
            $uploadOk = 0;
        }
    }


    //Upload image
    if (file_exists($target_file)) {
//        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
//        echo "Sorry, your file was not uploaded.";
//// if everything is ok, try to upload file
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

    $sql = "INSERT INTO products(name_pro,price,created,status_pro,category_id,quantity,capacity,keyword,  description) VALUES('$namePr','$pricePr','$dayPr','$status','$categoryPr','$quantityPr','$capacityPr','$keywordPr', '$descriptPr')";
        mysqli_query($con,$sql);
        $sql="INSERT INTO image (pro_id,image_link) VALUES(LAST_INSERT_ID(),'$image')";
    $res = mysqli_query($con,$sql);
    if (!$res) {
printf("Error: %s\n", mysqli_error($con));
exit();
}
    if($res) {
        header("location: product-list.php");
    }
}
else {
    echo 'error';
}
?>