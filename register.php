<?php
$errname = $errlastname = $errid = $errpass = '';
if(isset($_POST['submit'])) {

    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $admin_id = $_POST['admin_id'];
    $password = $_POST['password'];

    if(empty($name)){
        $errname .= "Name is required";
    }
    if(empty($lastname)){
        $errlastname .= "Name is required";
    }
    if(empty($admin_id)){
        $errid .= "ID is required";
    }
    if(empty($password)){
        $errpass .= "Password is required";
    }

    $conn = mysqli_connect('localhost', 'root', '', 'admin');

    if ($admin_id != '') {
        $sql= "SELECT * FROM users WHERE admin_id='$admin_id'";
        $search = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($search);

        if($rows > 0) {
           $errid .= "Admin id already exists";
        } else {
            $sql = "INSERT INTO users (name, lastname, admin_id , password) VALUES ('$name', '$lastname', '$admin_id', '$password')";
            $result = mysqli_query($conn, $sql);
            if($result === TRUE){
                header("Location: login.php");
                echo "Registered Sucessfully";
            } 
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <title>Registration</title>
</head>
<body>
<div class=container>
    <h2>Admin Registration</h2>
    <form action="" method="POST">
      First Name :  <input type="text" name="name"><span style ="color:red"><?php echo $errname ?></span><br><br>
    Last Name :  <input type="text" name="lastname"><span style ="color:red"><?php echo $errlastname ?></span><br><br>
    User ID :<input type="text" name=admin_id><span style ="color:red"><?php echo $errid ?></span><br><br>
    Password : <input type="password" name="password"><span style ="color:red"><?php echo $errpass ?></span><br><br>
    <button type="submit" name="submit" class="btn btn-primary">Register</button>
    <p>Already have an Account?<a href="login.php"> login</a></p>
    </form>
</div>
</body>
</html>