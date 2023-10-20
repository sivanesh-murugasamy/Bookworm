<?php
require 'config.php';
if(isset($_POST["submit"]))
{
    $username=$_POST["username"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $email=$_POST["email"];
    $age=$_POST["age"];
    $genre=$_POST["genre"];
    $duplicate=mysqli_query($conn, "SELECT * FROM userdet WHERE username='$username'OR email='$email'");

    if(mysqli_num_rows($duplicate)>0)
    {
        echo
        "<script> alert('Username or Email Has Alerady taken');</script>";
    }
    else
    {
        if($password==$confirmpassword)
        {
            $query ="INSERT INTO userdet VALUES('','$username','$password','$email','$age','$genre')";
            mysqli_query($conn,$query);
            echo
            "<script>alert('Registration Successfull')</script>";
        }
        else
        {
            echo
            "<script>alert('Password does not match')</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Registration</title>
    <style>
        .cls
        {
            background-image: url("https://th.bing.com/th/id/OIP.tUebUSL3LfkCEMNKOJ-9mAHaHQ?pid=ImgDet&rs=1");
            background-repeat: no-repeat;  
        }
    </style>
</head>
<body>
    <div class="cls">
    <center>
    <h3>Register here</h3>
    </center>
<form class="container" action="" method="post" autocomplete="off">
    <label for="username" class="form-group">Username :</label>
    <input type="text" name="username" id="username" required value=""><br>

    <label for="password" class="form-group">Password :</label>
    <input type="password" name="password" id="password" required value=""><br>

    <label for="confirmpassword" class="form-group">Confirm-Password :</label>
    <input type="password" name="confirmpassword" id="confirmpassword" required value=""><br>

    <label for="email" class="form-group">Email :</label>
    <input type="text" name="email" id="email" required value=""><br>

    <label for="age" class="form-group">Age :</label>
    <input type="text" name="age" id="age" required value=""><br>
    
    <label for="genre" class="form-group">Genre:</label>
    <input type="text" name="genre" id="genre" required value=""><br>
    <button type="submit" name="submit">Submit</button>

   
    
</form>
    </div>
<br>
<a href="login.php"><button type="submit" > Continue with login</button></a>
</body>
</html>