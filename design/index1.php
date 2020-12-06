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
</head>

<body>
    <form action="index1.php" method="get">
        <label for="linhvuc">Hiển thị theo lĩnh vực</label>
        <select name="linhvuc">
            <option value="0">Chọn lĩnh vực</option>
            <?php 
                $sqlstring="SELECT  * FROM linhvuc";
                $result=mysqli_query($conn,$sqlstring);
                if (mysqli_num_rows($result)>0){
                    $row_count=mysqli_num_rows($result);
                    for($i=0;$i<$row_count;$i++){
                        $row=mysqli_fetch_assoc($result);
                        echo '<option value="'.$row['id'].'">' .$row['ten_linh_vuc'].'</option>';
                    }
                }
            ?>
        </select>
        <input type="submit" value="Hiển thị">
    </form>
    <?php
                    if (isset($_GET['linhvuc'])) {
                        $sqlstring="SELECT * FROM linhvuc WHERE id=".$_GET['linhvuc'];
                        $result=mysqli_query($conn,$sqlstring);
                        $row =mysqli_fetch_assoc($result);
                        echo "<h3>Công việc trong linh vực ".$row['ten_linh_vuc']."</h3>";
                    }else {
                        '<h3> Công việc mới nhất </h3>';
                    }

                ?>
    <?php 
             if (isset($_GET['linhvuc'])) {
                    $sqlstring="SELECT id,chuc_danh,mo_ta FROM congviec WHERE id=".$_GET['linhvuc'].' ORDER BY ngay_dang';
             }else {
                $sqlstring="SELECT id,chuc_danh,mo_ta FROM congviec ORDER BY ngay_dang";
             }
                $result=mysqli_query($conn,$sqlstring);
                if (mysqli_num_rows($result)>0){
                    $row_count=mysqli_num_rows($result);
                    for($i=0;$i<$row_count;$i++){
                        $row=mysqli_fetch_assoc($result);
                        echo '<div><p>'.$row['chuc_danh'].'</p><p>' .$row['mo_ta'] .'</p></div>';
                        echo '<a href="view.php?id='.$row['id'].'">Xem</a>';
                        echo '<hr>';
                    }
                }
    ?>
</body>

</html>
<?php
mysqli_close($conn);
?>