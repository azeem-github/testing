<?php
session_start();
$adminSession = $_SESSION['admin_id'];
//$admin_id = $_GET['admin_id'];
//echo'<pre>'; print_r($adminSession); exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="product.php">
<ul>
<li><a href=category.php>Category Page</a></li>
<li><a href=product.php>Product Page</a></li>
<li><a href=logout.php>Log Out</a></li>
</nav>
</ul>
<table class="table table-black">
  <thead class="table-blue
">
    <tr>
      <th> Name</th>
      <th>User ID</th>
    </tr>
  </thead>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'admin');
$query = mysqli_query($conn, "SELECT * FROM users WHERE admin_id='$adminSession'");

$row = mysqli_fetch_array($query);
?>
    <tr>   
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['admin_id']; ?></td>
    </tr>
</table>
<button><a href=logout.php>logout</a></button>
</body>
</html>