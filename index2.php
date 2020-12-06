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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/jumbotron-narrow.css">

    <title>Document</title>
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
            <h3 class="text-muted text-primary">JFinder</h3>
        </div>

        <div class="jumbotron">
            <h2>Chọn lĩnh vực</h2>
            <form action="index2.php" method="get">
                <select class="form-control" name="linhvuc">
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
                <br>
                <input class=" btn btn-primary" type="submit" value="Hiển thị">
            </form>
        </div>

        <h3>
            <?php
                    
                    if (isset($_GET['linhvuc'])) {
                        $sqlstring="SELECT * FROM linhvuc WHERE id=".$_GET['linhvuc'];
                        $result=mysqli_query($conn,$sqlstring);
                        $row =mysqli_fetch_assoc($result);
                        echo "<h3>Công việc trong linh vực ".$row['ten_linh_vuc']."</h3>";
                    }else {
                       echo '<h2> Công việc mới nhất </h2>';
                    }

                ?>
             
        </h3>
             <?php 
                    if (isset($_GET['linhvuc'])) {
                            $sqlstring="SELECT id,chuc_danh,mo_ta FROM congviec WHERE linh_vuc_id=".$_GET['linhvuc'].' ORDER BY ngay_dang DESC ';
                    }else {
                        $sqlstring="SELECT id,chuc_danh,mo_ta FROM congviec ORDER BY ngay_dang DESC";
                    }
                        $result=mysqli_query($conn,$sqlstring);
                        if (mysqli_num_rows($result)>0){
                            $row_count=mysqli_num_rows($result);
                            for($i=0;$i<$row_count;$i++){
                                $row=mysqli_fetch_assoc($result);
                                //echo '<div><p>'.$row['chuc_danh'].'</p><p>' .$row['mo_ta'] .'</p></div>';
                                //echo '<a class="btn btn-info " href="chitiet.php?id='.$row['id'].'">chi tiết..</a>';
                                //echo '<hr>';
                             ?>
        <div class="row marketing"> 
                    <hr>           
            <div class="col-lg-10">
                <h4><?php echo $row['chuc_danh']; ?></h4>
                <p><?php echo $row['mo_ta']; ?></p>
            </div>
              
            <div class="col-lg-2">
                <?php
                echo '<a class="btn btn-info " href="view.php?id='.$row['id'].'">chi tiết..</a>';
                ?>
 
            </div>
               
            </div> 
                <?php
               
                            }
                        }
                ?>
           

      
      
        <footer class="footer">
            <p>&copy; 2016 Company, Inc.</p>
        </footer>
    </div>
</body>

</html>
<?php
mysqli_close($conn);
?>