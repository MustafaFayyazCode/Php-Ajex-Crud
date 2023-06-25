<?php
include "./conn.php";
$ssr=$_GET['myid'];
$sql="DELETE FROM `crud`WHERE `ssr`=$ssr";
$run=mysqli_query($conn,$sql);
if($run){
    echo "<script>alert('data has been deleted')</script>";
    header('Refresh:0,url=./view.php');
   //  header('Location:./view.php');   
}
?>