<?php

function check_login($link)
{
	if(isset($_SESSION['Username']))
	{
     $Username=$_SESSION['Username'];
        
      $query ="select * from final where Username= '$Username' limit 1";

      $result =mysqli_query($link,$query);
      if ($result && mysqli_num_rows($result) >0);
         {
                                                                                   
      $user_data =mysqli_fetch_assoc($result);
      return $user_data;
      
         }

	} 
    else{


	//redirect to login
	header("Location:log.php");
	die;
}


    return $text;

  }


  

