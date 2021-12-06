<?php
// Initialize the session
session_start();

 include("connection.php");
 include("functions.php");

 $user_data =check_login($link);

?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
     Hi, <b style="color:darkblue;"><?php echo $user_data['Username']; ?></b>. Welcome to our site.
    <style>
       body{
        
        background-size:cover;
        background-position: center;
        font-family: sans-serif;   
        color:indianred;
          }

</style>
</head>
<body>
    <img src="./img/ice.PNG" width="1350px" height="500vh">
    <div class="park">
    <p>
        <a href="logout.php" class="btn btn-danger ml-3">LOG OUT</a>
    </p>
</div>
</body>
</html>