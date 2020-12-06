<?php
$servername="localhost";
$username="root";
$password="";
$dbname="vieclam";
$conn= mysqli_connect($servername,$username,$password,$dbname);
mysqli_set_charset($conn,"utf8");
if (!$conn){
    die("không thể kết nối đến DB server: " . mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jumbotron-narrow.css">

</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills pull-right">
                    <li role="presentation"><a href="index2.php">Trang chủ</a></li>
                    <li role="presentation"><a href="admin/login.php">Đăng việc</a></li>
                </ul>
            </nav>
            <h3 class="text-nuted text-primary">JFinder</h3>
        </div>
        <div class="row marketing">
            <div class="col-lg-12">
                <?php
            if (isset($_GET['id'])){
                $sqlString="SELECT * FROM congviec WHERE id=" .$_GET['id'];
                $result=mysqli_query($conn,$sqlString);

                if (mysqli_num_rows($result)>0){

                     $row=mysqli_fetch_assoc($result);

        ?>

                <div class="panel panel-info">
                    <div class="panel-heading">Chi tiết vị trí việc làm</div>
                    <div class="panel-body">
                        <p>Chức danh: <?php echo $row['chuc_danh'];?></p>
                        <ul class="list-group">
                            <li class="list-group-item"><p>Mô tả: </p><?php echo $row['mo_ta']; ?></li>
                            <li class="list-group-item">Vị trí: <?php echo $row['vi_tri'];?></li>
                            <li class="list-group-item">Lương: <?php echo $row['luong'];?></li>
                            <li class="list-group-item">Liên hệ:<?php echo $row['lien_he'];?></li>
                            <li class="list-group-item">Email:<?php echo $row['email'];?></li>
                        </ul>

                    </div>

                    <div class="panel-footer">
                    <?php
                        echo '<a class="btn btn-info " href="admin/edit.php?id='.$row['id'].'">Sửa</a>';
                        ?>
                        <?php
                        echo '<a href="admin/delete.php?id='.$row['id'].'" class="btn btn-danger" Onclick="return xn_xoa_congviec()">Xoá</a>';
                        ?>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            </div>
        </div>
        <footer class="footer">
            <p>&copy; 2016 Company,Inc.</p>
        </footer>
    </div>
<?php
    include ('database/function.php');

?>

</body>

</html> 