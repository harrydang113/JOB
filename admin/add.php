<?php
include ("../database/database.php");
?>
<?php
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

    $sqlString="INSERT INTO congviec (chuc_danh,cong_ty,linh_vuc_id,mo_ta,luong,vi_tri,lien_he,email) VALUES ('$chucdanh','$congty','$linhvucid','$mota','$luong','$vitri','$lienhe','$email')";
    
    if (mysqli_query($conn,$sqlString)) {
       $thongbao = '<p class="alert alert-success"><strong>Đã lưu thành công</strong></p>';
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
                <?php if ($thongbao != ""){ echo $thongbao;}?>
                <div class="panel panel-info">
                    <div class="panel-heading">Thêm vị trí việc làm</div>
                    <div class="panel-body">
                        <form action="add.php" method="post" onsubmit="return validateForm()">
                            <div class="form-group">
                                <label>Chức danh</label>
                                <input type="text" name="chuc_danh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Công ty</label>
                                <input type="text" name="cong_ty" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Lĩnh vực</label>
                                <select class="form-control" name="linh_vuc">
                                    <option value="0">Chọn lĩnh vực</option>
                                    <?php
                                    $sqlString="SELECT * FROM linhvuc";
                                    $result=mysqli_query($conn,$sqlString);

                                    if(mysqli_num_rows($result) >0){
                                     $row_count=mysqli_num_rows($result);
                                     for ($i=0; $i < $row_count ; $i++) { 
                                        $row=mysqli_fetch_assoc($result);
                                        echo '<option value="' .$row["id"].'">'.$row["ten_linh_vuc"].'</option>';
                                    }
                                }
                                 ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea name="mo_ta" id="" cols="20" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Mức lương</label>
                                <input type="text" name="luong" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nơi làm việc</label>
                                <input type="text" name="vi_tri" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tên liên hệ</label>
                                <input type="text" name="lien_he" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email liên hệ</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="panel-footer">
                                <input type="submit" value="Lưu" name="submit" class="btn btn-info" >
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