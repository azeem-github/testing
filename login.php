<?php
session_start();
$conn = mysqli_connect('localhost', 'root', '', 'admin');
$errid = $errpassword ='';

if(isset($_POST['login'])){
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users WHERE admin_id ='$admin_id' AND password ='$password'");
    
    if(mysqli_num_rows($query)>0){
        $_SESSION['admin_id'] = $admin_id;
        header("Location: profile.php");
        echo "login sucessful";
    } else {
        echo "admin Id or Password is invalid";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <title>Login</title>
</head>
<body>
<div class=container>

    <h2>Admin Login</h2>
    <form action="" method="POST">
    Admin ID : <input type="text" name="admin_id"><br><br>
    Password : <input type="password" name="password"><br>
    <button type="submit" name="login" class="btn btn-primary">Login</button>
    <p>Not Registered Yet..?<a href="register.php">  Registration</a></p>

    </form>
</body>
</html>