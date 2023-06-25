<?php
include "./conn.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multi-image</title>
</head>

<body>
    <div class="box">

        <form id="formdata">
            <label for="sname"></label>
            <input type="text" name="sname" id="sname" placeholder="First Name" required>

            <label for="sfname"></label>
            <input type="text" name="sfname" id="sfname" placeholder="Last Name" required>

            <label for="sroll"></label>
            <input type="text" name="sroll" id="sroll" placeholder="Your Roll No" required>

            <label for="sclass"></label>
            <input type="text" name="sclass" id="sclass" placeholder="Your Class" required>

            <label for="smobile"></label>
            <input type="tel" name="smobile" id="smobile" placeholder="Phone Number" required>

            <label for="semail"></label>
            <input type="email" name="semail" placeholder="Email Address" required>

            <label for="saddress"></label>
            <input type="text" name="saddress" placeholder="Address" required>

            <label for="scnic"></label>
            <input type="text" name="scnic" id="scnic" placeholder="CNIC number" required>



            <input type="radio" id="gen1" name="sgender" value="Male" required>
            <label for="gen1" class="gen">Male</label>

            <input type="radio" id="gen2" name="sgender" value="Female" required>
            <label for="gen2" class="gen">Female</label>

            <input type="radio" id="gen3" name="sgender" value="Other" required>
            <label for="gen3" class="gen">Other</label>
            <br>
            <label for="spic"></label>
            <input type="file" name="spic[]" Multiple required>
            <input type="submit" name="submit" id="btn" value="Submit">
            <input type="reset" name="reset" id="btn" value="Reset">
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
    $(document).ready(function(){
            $("#btn").on("click",function(e){
                e.preventDefault();
                var mydata=new FormData(formdata);
                  $.ajax({
                     url:"./file/insert.php",
                     method:"POST",
                     data:mydata,
                     contentType:false,
                     processData:false,
                     success:function(res){
                        alert(res)
                        if(res==0){
                        alert("Email or CNIC or Roll number or Mobile already existed");
                        }
                        else if(res==1){
                            alert("DATA has been inserted");
                        }
                        else if(res==2){
                             alert("Data has not been inserted");
                        }else{
                            alert("Img is not right");
                        }
                     }
                  });
            });
       });


    </script>
</body>

</html>