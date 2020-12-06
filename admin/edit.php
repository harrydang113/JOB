<?php
include ("../database/database.php");

?>
<?php
$id_congviec=isset($_GET['id']) ? $_GET['id'] : null;
if (!$id_congviec){
    die("Không thể cập nhật vị trí việc làm");
} 
$thongbao="";
if (isset($_POST['submit'])){
    $chucdanh=$_POST['chuc_danh'];
    $congty=$_POST['cong_ty'];
    $linhvucid=$_POST['linh_vuc'];
    $mota=$_POST['mo_ta'];
    $luong=$_POST['luong'];
    $vitri=$_POST['vi_tri'];
    $lienhe=$_POST['lien_he'];
    $email=$_POST['email'];

    $sqlString="UPDATE congviec SET chuc_danh='$chucdanh',cong_ty='$congty',linh_vuc_id='$linhvucid',mo_ta='" .addslashes($mota) ."',luong='$luong',vi_tri='$vitri',lien_he='$lienhe',email='$email' WHERE id=$id_congviec";
    
    if (mysqli_query($conn,$sqlString)) {
       $thongbao = '<p class="alert alert-success"><strong>Đã lưu thành công</strong></p>';
    }else {
        $thongbao = '<p class="alert alert-success">Lỗi: '.mysqli_error($conn) .'</p>';
    }
}
$sqlString="SELECT * FROM congviec WHERE id= $id_congviec";
$result=mysqli_query($conn,$sqlString);
$congviec=mysqli_fetch_assoc($result);

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
                <?php if ($thongbao != ""){ echo $thongbao;}?>
                <div class="panel panel-info">
                    <div class="panel-heading">Thêm vị trí việc làm</div>
                    <div class="panel-body">
                        <form action="edit.php?id=<?php echo $id_congviec;?>" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label>Chức danh</label>
                                <input type="text" name="chuc_danh" class="form-control"
                                    value="<?php echo $congviec['chuc_danh'];?>">
                            </div>
                            <div class="form-group">
                                <label>Công ty</label>
                                <input type="text" name="cong_ty" class="form-control"
                                    value="<?php echo $congviec['cong_ty'];?>">
                            </div>
                            <div class="form-group">
                                <label>Lĩnh vực</label>
                                <select class="form-control" name="linh_vuc">
                                    <?php
                                    $sqlString="SELECT * FROM linhvuc";
                                    $result=mysqli_query($conn,$sqlString);

                                    if(mysqli_num_rows($result) >0){
                                     $row_count=mysqli_num_rows($result);
                                     for ($i=0; $i < $row_count ; $i++) { 
                                        $row=mysqli_fetch_assoc($result);
                                        if ($row['id'] == $congviec['linh_vuc_id']) {
                                            echo '<option value="' .$row["id"].'"selected>'.$row["ten_linh_vuc"].'</option>';
                                    }else{
                                        echo '<option value="' .$row["id"].'">'.$row["ten_linh_vuc"].'</option>';
                                    }
                                }
                            }
                                 ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="mo_ta" id="" cols="20" rows="3" class="form-control"><?php echo $congviec['mo_ta'];?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mức lương</label>
                                <input type="text" name="luong" class="form-control" value="<?php echo $congviec['luong'];?>">
                            </div>
                            <div class="form-group">
                                <label>Nơi làm việc</label>
                                <input type="text" name="vi_tri" class="form-control" value="<?php echo $congviec['vi_tri'];?>">
                            </div>
                            <div class="form-group">
                                <label>Tên liên hệ</label>
                                <input type="text" name="lien_he" class="form-control" value="<?php echo $congviec['lien_he'];?>">
                            </div>
                            <div class="form-group">
                                <label>Email liên hệ</label>
                                <input type="text" name="email" class="form-control" value="<?php echo $congviec['email'];?>">
                            </div>
                            <div class="panel-footer">
                                <input type="submit" value="Lưu" name="submit" class="btn btn-info">
                                <a href="../index2.php" class="btn btn-default">Quay lại</a>
                            </div>
                        </form>
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