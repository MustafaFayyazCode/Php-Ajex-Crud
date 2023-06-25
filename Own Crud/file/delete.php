<?php
include("../conn.php");
$del=$_GET['mydel'];
$sql2="SELECT * FROM `crud` WHERE `ssr`='$del'";
$run2=mysqli_query($conn,$sql2);
$fet=mysqli_fetch_assoc($run2);
if(!empty($fet['spic'])){
       $pic=$fet['spic'];
       $mypic=explode(",",$pic);
       foreach($mypic as $p){
        unlink("../imgs/".$p);
    
       }
}

    $SQL="DELETE FROM `crud` WHERE `ssr`='$del'";
    $run=mysqli_query($conn,$SQL);
    if($run){
           echo 1;
    }else{
        echo 2;
    }

?>