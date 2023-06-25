<?php
include "./conn.php";
$uid=$_GET["uid"];
$gsql="SELECT * FROM `crud` WHERE `ssr`='$uid'";
$grun=mysqli_query($conn,$gsql);
$gfet=mysqli_fetch_array($grun);
if(isset($_POST['update'])){
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
      break;
   }
}
if($msg3== "right"){
foreach($spic as $key=>$val){
   move_uploaded_file($_FILES['spic']['tmp_name'][$key],"./imgs/".$val);
}
}
$pic=implode(",",$p);

if($msg3=="right"){
$sql = "UPDATE `crud` SET `sname`='$sname',`sfname`='$sfname',`sroll`='$sroll',`sclass`='$sclass',`smobile`='$smobile',`saddress`='$saddress',`semail`='$semail',`scnic`='$scnic',`sgender`='$sgender',`spic`='$pic' WHERE `ssr`='$uid'";
$run=mysqli_query($conn,$sql);
if($run){
    $msg = "Data has been Changed";
                header("Refresh:2,url=./view.php");
}
else{
   echo "data  is not inserted";
}
}
}

?>


<!DOCTYPE html>
<html>
<head>
    <title>Student Form</title>
    <!-- <link rel="stylesheet" href="./style.css"> -->
</head>
<body>
    <center>

        <h1>
            <?php 
            if (@$msg){
               }
            else{
                echo "student Record";
            }
            ?>
        </h1>
    </center>
        <br>
        <div class="box">

        <form method="post" enctype="multipart/form-data">
            <label for="sname"></label>
                <input type="text" name="sname" id="sname" placeholder="First Name" required>

            <label for="sfname"></label>
                <input type="text" name="sfname" id="sfname" placeholder="Last Name" required>
           
            <label for="sroll"></label>
                <input type="text" name="sroll" id="sroll"placeholder="Your Roll No" required>

            <label for="sclass"></label>
                <input type="text" name="sclass" id="sclass"  placeholder="Your Class" required>

                <label for="smobile"></label>
                <input type="tel" name="smobile" id="smobile"placeholder="Phone Number" required>

                <label for="semail"></label>
                <input type="email" name="semail"  placeholder="Email Address" required>

            <label for="saddress"></label>
                <input type="text" name="saddress" placeholder="Address" required>

            <label for="scnic"></label>
                <input type="text" name="scnic" id="scnic"placeholder="CNIC number" required>

               
            <?php 
                // if ($ufet['sgender']=="Male"){
                //     $m="checked";
                // }
                // elseif ($ufet['sgender']=="Female"){
                //     $n="checked";
                // }
                // else{
                //     $o="checked";
                // }
            ?>

            <input type="radio" id="gen1" name="sgender"  value="Male" required>
                <label for="gen1" class="gen">Male</label>

            <input type="radio" id="gen2" name="sgender" value="Female" required>
                <label for="gen2" class="gen">Female</label>

            <input type="radio" id="gen3" name="sgender"  value="Other" required>
                <label for="gen3" class="gen">Other</label>
            
<br>
                <label for="spic"></label>
            <input type="file" name="spic[]" Multiple required>
            <input type="submit" name="update" id="btn" value="Submit">
            </form>  
        </div>
</body>
</html>     