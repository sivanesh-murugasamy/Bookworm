<?php
require 'config.php';
if(isset($_POST["submit"]))
{
    $username=$_POST["usernameemail"];
    $password=$_POST["password"];
    $result=mysqli_query($conn, "SELECT * FROM userdet WHERE username='$username' or email='$username'");
    $row=mysqli_fetch_assoc($result);
    if(mysqli_num_rows($result)>0)
    {
        if($password==$row["password"])
        {
            $_SESSION["login"]=true;
            $_SESSION["id"]=$row["id"];
            header("Location: card.html");
        }
        else
        {
          echo
          "<script>alert('Wrong Password');</script>";
        }

    }
    else
    {
        echo
        "<script> alert('User not registered');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
<div style="margin-left:620px;">
    <h3>Login</h3>
</div>
<form class="container" action="" method="post" autocomplete="off">
    <label for="usernameemail" class="form-group">Username or email:</label>
    <input type="text" name="usernameemail" id="usernameemail" required value=""><br>

    <label for="password" class="form-group">Password :</label>
    <input type="password" name="password" id="password" required value=""><br>

  
    <button type="submit" name="submit">Login</button>
    
</form> 
<br>
<center>
<h3>Continue with an account</h3>
</center>
<button class="form-group"><a href="registration.php">Go to Registration</a></button>
</body>
</html>