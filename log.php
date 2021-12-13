<?php 
session_start();

 include("connection.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD'] =="POST")
 {


    //SOMETING WAS POSTED
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];



    if(!empty($Username) && !empty($Password) && !is_numeric($Username))

    //if(!empty($Username) && !empty($Password) )
    {
         //read to database
          $query="select * from final where Username='$Username' limit 1";
          $result =mysqli_query($link, $query);
         // echo "test1";
         // mysqli_query($link, $query);
         // header("Location:welcome.php");
         // die;
    
        if($result)
        {
               if ($result && mysqli_num_rows($result) >0)
               //if ( mysqli_num_rows($result) >0);
      
               {
                $user_data =mysqli_fetch_assoc($result);
                    if($user_data['Password']===$Password)
                     {
                         $_SESSION['Username'] =$user_data['Username'];
                         header("Location:welcome.php");
                     die;
                }      
           }
       }
       echo "oops!!! please Enter correct datas...";

    }else{
         echo  "please enter some valid information!!!";
    }
}

?>