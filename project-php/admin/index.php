
<?php
 
require_once("../db.php");
if(isset($_GET['error'])) {
     $error = 'Vui lòng kiểm tra lại tên đăng nhập và mật khẩu';
}
else 

$prd = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Perfume Store</title>
        <meta name="viewport" content = "width=device-width, initial-scale =1">
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <div class="panel panel-danger text-center">
                <div class="panel-heading">
                     <strong> ĐĂNG NHẬP VÀO TÀI KHOẢN</strong>
                    <p style="color: red"><?php echo isset($error) ? $error : ''?></p>
                </div>
                <div class="panel-body ">
                    <form  action="login-back.php" method="POST">
                                   <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-user"></i>
                                            </span> 
                                            <input class="form-control" placeholder="Username" name="user-name" type="text" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="glyphicon glyphicon-lock"></i>
                                            </span>
                                            <input class="form-control" placeholder="Password" name="password" type="password" value="" required="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-lg btn-danger btn-block" name = "submit" value="Đăng nhập" >
                                    </div>
                    </form>
                </div>
                <div class="panel-footer ">
                    <center> Perfume Store
                    </center>
                </div>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>