
<?php
include ("../database/database.php");

?>
<?php
$id_congviec=isset($_GET['id']) ? $_GET['id'] : null;
if (!$id_congviec){
    die("Không thể xóa vị trí việc làm");
} 
$thongbao="";
if (isset($_GET['id'])){
  $id_congviec=$_GET['id'];
  $sqlString = "DELETE FROM congviec WHERE id=$id_congviec";
    if (mysqli_query($conn,$sqlString)) {
       $thongbao = '<p class="alert alert-success"><strong>Đã xóa thành công</strong></p>';
    }else {
        $thongbao = '<p class="alert alert-success">Lỗi: '.mysqli_error($conn) .'</p>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jumbotron-narrow.css">

</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="../index2.php">Trang chủ</a></li>
                    <li role="presentation"><a href="add.php">Đăng việc</a></li>
                </ul>
            </nav>
            <h3 class="text-muted text-primary">JFinder</h3>
        </div>
        <div class="row marketing">
            <div class="col-lg-12">
                
                <div class="panel panel-info">
                    <div class="panel-heading">Xóa vị trí việc làm</div>
                    <div class="panel-body">
                    <?php if ($thongbao != ""){ echo $thongbao;}?>
                    </div>
                          
                            <div class="panel-footer">
                                <a href="../index2.php" class="btn btn-default">Quay lại</a>
                            </div>
                    </div>
                </div>
            </div>
      
        <footer class="footer">
            <p>&copy; 2016 Company,Inc.</p>
        </footer>
        </div>  
    <?php
        include ('../database/function.php');
    ?>
   
</body>

</html>
<?php
mysqli_close($conn);
?>    