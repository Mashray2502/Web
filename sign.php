<?php
session_start();

 include("connection.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD'] =="POST")
 {


    //SOMETING WAS POSTED
    $Username=$_POST['Username'];
    $Email=$_POST['Email'];
    $mobileNumber=$_POST['mobileNumber'];
    $Password=$_POST['Password'];
    $conformPassword=$_POST['conformPassword'];

    if(!empty($Username) && !empty($Email) && !empty($mobileNumber) && !empty($Password) && !empty($conformPassword) && !is_numeric($Username))
    {
         //save to database
      
      $query="insert into final(Username,Email,mobileNumber,Password,conform_Password) values('$Username','$Email','$mobileNumber','$Password','$conformPassword')";

        mysqli_query($link, $query);
      
          header("Location:log.php");

    die;

    }else
    
    {
       echo "please enter some valid information!"; 
   }

}

?>