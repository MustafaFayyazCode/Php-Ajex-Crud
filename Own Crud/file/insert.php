<?php
include "../conn.php";


$sname = mysqli_real_escape_string($conn,$_POST['sname']);
$sfname=mysqli_real_escape_string($conn,$_POST['sfname']);
$sroll=mysqli_real_escape_string($conn,$_POST['sroll']);
$sclass=mysqli_real_escape_string($conn,$_POST['sclass']);
$smobile=mysqli_real_escape_string($conn,$_POST['smobile']);
$saddress=mysqli_real_escape_string($conn,$_POST['saddress']);
$semail=mysqli_real_escape_string($conn,$_POST['semail']);
$scnic=mysqli_real_escape_string($conn,$_POST['scnic']);
$sgender=mysqli_real_escape_string($conn,$_POST['sgender']);

$spic = $_FILES['spic']['name'];

$p=array();
foreach($spic as $val){
   $exe=strtolower(pathinfo($val,PATHINFO_EXTENSION));
   $arr=array('jpg','png','jpeg');
   if(in_array($exe,$arr)){
      $p[]=$val;
      $msg3="right";
   }
   else{
      $msg3="not right";

   }
}
if($msg3 =="right"){
foreach($spic as $key=>$val){
   move_uploaded_file($_FILES['spic']['tmp_name'][$key],"../imgs/".$val);
}
}
$pic=implode(",",$p);

if($msg3=="right"){
$sql = "INSERT INTO `crud`(`sname`,`sfname`,`sroll`,`sclass`,`smobile`,`saddress`,`semail`,`scnic`,`sgender`,`spic`) VALUES ('$sname','$sfname','$sroll','$sclass','$smobile','$saddress','$semail','$scnic','$sgender','$pic')";
   $run=mysqli_query($conn,$sql);
   if($run){
      echo 1;
  }
  else{
      echo 2;
  }
}
else{
   echo 3;
}

?>