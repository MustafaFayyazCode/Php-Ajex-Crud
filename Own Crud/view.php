<?php
    include "./conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SingleImage - Records</title>
</head>
<style>
th {
    background-color: brown;
    padding: 15px;
}

a {
    color: white;
}
</style>

<body>
    <h1 align="center"
        style="font:50px arial; letter-spacing:15px; text-transform:uppercase; background-color:aqua; margin:8px 0px;">
        Database Records</h1>

    <table align="center" border="1" cellspacing="0" cellpadding="10" width="1450"
        style="background-color:#333; border:grey; text-align:center; font-size:20px; color:lightgrey; margin-top:40px;">
        <tr>
            <th>First Name</th>
            <th>Father Name</th>
            <th>Roll no</th>
            <th>Class</th>
            <th>Mobile #</th>
            <th>Address</th>
            <th>Email ID</th>
            <th>CNIC #</th>
            <th>Gender</th>
            <th>Picture</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php 
        

$sql = "SELECT * FROM `crud`";
            $run = mysqli_query($conn, $sql);
            while($fet=mysqli_fetch_assoc($run)){
                ?>
        <tr>
            <td><?php echo $fet['sname'];?></td>
            <td><?php echo $fet['sfname'];?></td>
            <td><?php echo $fet['sroll'];?></td>
            <td><?php echo $fet['sclass'];?></td>
            <td><?php echo $fet['smobile'];?></td>
            <td><?php echo $fet['saddress'];?></td>
            <td><?php echo $fet['semail'];?></td>
            <td><?php echo $fet['scnic'];?></td>
            <td><?php echo $fet['sgender'];?></td>
            <td>
                <?php 
               $pic=explode(",",$fet['spic']);
               foreach($pic as $p){
?>
                <img src="<?php echo "./imgs/".$p ?>" width="60" height="40" alt="">
                <?php
               }
            ?>
            </td>
            <td><a href="./update.php?uid=<?php echo $fet['ssr'] ?>">Update</a></td>
            <td><a href="./delete.php?myid=<?php echo $fet['ssr']; ?>">Delete</a></td>

        </tr>



        <?php    
            }
        ?>
    </table>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $(document).on("click",".delete",function(){
                var del=$(this).data("del");
                var msg=this;
                $.ajax({
                    url:"./files/del.php",
                    method:"GET",
                    data:{mydel:del},
                    success:function(res){
                        alert(res);
                        if(res==1){
                            $(msg).closest("tr").fadeOut();
                             alert("DATA HAS BEEN DELETED");
                           
                        }else{
                            alert("DATA HAS NOT BEEN DELETED");
                        }
                    }
                })
            })
        })
    

    </script>
</body>

</html>