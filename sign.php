<?php
session_start();

 include("connection.php");
 include("functions.php");

 if($_SERVER['REQUEST_METHOD'] =="POST")
 {


    //SOMETING WAS POSTED
    $Username=$_POST['Username'];
    $Email=$_POST['Email'];
    $Mobilenumber=$_POST['Mobilenumber'];
    $Password=$_POST['Password'];
    $confirmPassword=$_POST['confirmPassword'];

    if(!empty($Username) && !empty($Email) && !empty($Mobilenumber) && !empty($Password) && !empty($confirmPassword) && !is_numeric($Username))
    {
         //save to database
      
      $query="insert into final(Username,Email,Mobilenumber,Password,confirm_Password) values('$Username','$Email','$Mobilenumber','$Password','$confirmPassword')";

        mysqli_query($link, $query);
      
          header("Location:log.php");

    die;

    }else
    
    {
       echo "please enter some valid information!"; 
   }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Register form</title>
    <link href="img/css/sign-style.css" type="text/css" rel="stylesheet" />
</head>
<style type="text/css">
    body {
        height: 550px;
        margin: 0;
        padding: 0;
        background: url("./img/bg.jpg");
        background-size: cover;
        background-position: center;
        font-family: sans-serif;
        color: white;
    }
</style>

<body>
    <div>
        <div class="apple">
            <form method="POST" id="frmSignup">
                <h2>REGISTER HERE</h2>
                <p>Username</p>
                <input type="text" name="Username" placeholder="name" required>
                <p>Email</p>
                <input type=Email name="Email" placeholder="mail" required>
                <p>Mobile number</p>
                <input type="text" name="Mobilenumber" placeholder="number" required maxlength="10">
                <p>Password</p>
                <input type="password" name="Password" placeholder="password" id="txtChangePassword" required>
                <p>Confirm Password</p>
                <input type="password" name="confirmPassword" placeholder="password" required>
                <br>
                <center><input type="submit" name="submit" value="Sign Up"></center>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $("#frmSignup").validate({
                errorClass: 'errors',
                rules: {
                    Password: {
                        required: true,
                        minlength: 6,
                        maxlength: 15,
                        passwordFormatCheck: true

                    },
                    confirmPassword: {
                        required: true,
                        equalTo: "#txtChangePassword"
                    },
                    Email: {
                        required: true,
                        email: true
                    },
                    Mobilenumber: {
                        matches: "^(\\d|\\s)+$",
                        minlength: 10,
                        maxlength: 10
                    }
                }
            });

            //Custom validation rule to check password check
            $.validator.addMethod("passwordFormatCheck", function (value, element) {
                return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
            }, 'Password must contain one capital letter,one numerical and one special character');

            $.validator.addMethod("matches", function (value, element, params) {
                var re = new RegExp(params);
                return this.optional(element) || re.test(value);
            }, 'Enter valid mobile number');
        });
    </script>

</body>

</html>