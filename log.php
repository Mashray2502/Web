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
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>login form</title>
  <link href="img/css/stylesheet.css" type="text/css" rel="stylesheet" />
</head>

<body>
  <section class="design">
    <div class="imgbx">
      <img src="./img/pr.jpeg" width="700px" height="655vh">
    </div>
    <div class="contentbx">
      <div class="formbx">
        <h2>Login</h2>
        <form method="POST" id="frmLogin">
          <div class="inputbx">
            <span>Username</span>
            <input type="text" name="Username" required>
          </div>
          <div class="inputbx">
            <span>Password</span>
            <input type="Password" name="Password" required>
          </div>
          <div class="inputbx">
            <input type="submit" name="" value="sign in">
          </div>
          <div class="inputbx">
            <p>Don't have an account? <a href="sign.php">sign up</a></p>
          </div>
        </form>
      </div>
    </div>
  </section>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script>
    $(document).ready(function () {
      $("#frmLogin").validate({
        errorClass: 'errors',
        rules: {
          Password: {
            required: true,
            minlength: 6,
            maxlength: 15,
            passwordFormatCheck: true

          }
        },
      });

      //Custom validation rule to check password check
      $.validator.addMethod("passwordFormatCheck", function (value, element) {
        return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
      }, 'Password must contain one capital letter,one numerical and one special character');
    });
  </script>
</body>

</html>