<?php
session_start();

require 'db_connection.php';

if(isset($_POST['submit'])){   
    $id=$_POST["id"];
    $password=$_POST["psw"];
    $result=mysqli_query($conn,"SELECT *FROM `std_info` WHERE roll_no=$id");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result) > 0){ 
      if($password == $row['roll_no']){
          $_SESSION["login"] = true;
          $_SESSION["stdid"] = $row["roll_no"];
          if($id==$row['roll_no'] || $password==$row['roll_no']){
              header('location:result.php');
  
          }
        }
        else{
          echo
          "<script> alert('Wrong Password'); </script>";  
        }
      }
      else{
        echo
        "<script> alert('Please enter a valid Student ID.'); </script>";
      }
    
}
?>


    <!DOCTYPE html>



    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=>, initial-scale=1.0">
        <title>Document</title>

        <!-- connection to the css style -->
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/test.css">
    </head>

    <body>
        <h1 class="main-heading">Check Your Academic Result Here</h1>
        <div class="login-system ">
            <form  action="" class="login-form" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Fill your credentials below</legend>
                    <div class=" login-fieldset ">
                        <label for="stdid ">Student ID:</label>
                        <input type="text " class="std-id " id="stdid " name="id"><br><br>
                        <label for="stdpsw "> Password:</label>
                        <input type="password " class="std-psw" id="stdpsw " name="psw"><br><br>
                        <label for=" "></label>
                        <input type="submit" value="Submit" class="submit-button" name="submit">
                    </div>

                </fieldset>
            </form>
        </div>
    </body>
    </html>
