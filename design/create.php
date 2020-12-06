<?php
include ('../database/database.php');
?>
<?php
if(isset($_POST['submit'])){
    $chucdanh=$_POST['chuc_danh'];
    $congty=$_POST['cong_ty'];
    $linhvucid=$_POST['linh_vuc'];
    $mota=$_POST['mo_ta'];
    $luong=$_POST['luong'];
    $vitri=$_POST['vi_tri'];
    $lienhe=$_POST['lien_he'];
    $email=$_POST['email'];

    $sqlString="INSERT INTO congviec(chuc_danh,cong_ty,linh_vuc_id,mo_ta,luong,vi_tri,lien_he,email) VALUES
    ('$chucdanh','$congty','$linhvucid','$mota','$luong','$vitri','$lienhe','$email')";
    
    if (mysqli_query($conn,$sqlString)) {
        echo "<p><strong>Đã lưu thành công</strong></p>";
    }else {
        echo"<p>Lỗi:".mysqli_error($conn) ."</p>";
    }
}
?>
<form action="add.php" method="post">
    <label>Chức danh</label>
    <input type="text" name="chuc_danh">
    <br><br>
    <label>Công ty</label>
    <input type="text" name="cong_ty">
    <br><br>
    <label>Lĩnh vực</label>
    <select name="linh_vuc">
        <option value="0">Chọn lĩnh vực</option>
    <?php
        $sqlString="SELECT * FROM linhvuc";
        $result=mysqli_query($conn,$sqlString);

        if(mysqli_num_rows($result)>0){
            $row_count=mysqli_num_rows($result);
            for ($i=0; $i <$row_count ; $i++) { 
                $row=mysqli_fetch_assoc($result);
                echo '<option value="' .$row["id"].'">'.$row["ten_linh_vuc"].'</option>';
            }
        }
    ?>
    </select>
    <br>
    <br>
    <label>Mô tả</label>
    <textarea name="mo_ta" id="" cols="20" rows="4"></textarea>
    <br><br>
    <label>Mức lương</label>
    <input type="text" name="luong">
    <br><br>
    <label>Nơi làm việc</label>
    <input type="text" name="vi_tri">
    <br><br>
    <label>Tên liên hệ</label>
    <input type="text" name="lien_he">
    <br><br>
    <label>Email liên hệ</label>
    <input type="text" name="email">
    <br><br>
    <input type="submit" value="lưu" name="submit">
</form>
<br><br>
<a href="index2.php">Quay lại</a>
<?php
mysqli_close($conn);
?>
