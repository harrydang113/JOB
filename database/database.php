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