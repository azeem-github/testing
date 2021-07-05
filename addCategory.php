<?php
session_start();
if($_SESSION['admin_id'] == ''){
    header('Location: login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'admin');

if(isset($_POST['add'])){
    $category = $_POST['category'];
    $description = $_POST['description'];

    
    $sql3 = "INSERT INTO categories (category, description) VALUES('$category', '$description')";
    $add = mysqli_query($conn, $sql3);
    echo "Category Added";
    header('location: category.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <title> Add Categories</title>
</head>
<body>
<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="category.php">Categories</a> 
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories  |
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="category.php">Categories List</a>
          <a class="dropdown-item" href="addCategory.php">Add Categories</a>
        </div> |
      </li> 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products   |
        </a> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="product.php">Product List</a>
          <a class="dropdown-item" href="addProduct.php">Add Product</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile |</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">

<form action="" method="POST">

<h2>Add Category Name</h2><input type="text" name="category"?> <br><br>

<h2>Add Description of Category</h2><textarea name="description" rows="5" cols="50">
</textarea><br>

<button type="submit" name="add" class="btn btn-primary a-btn-slide-text">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
<span>ADD</button></span>

<button><a href="category.php">Back</button></a>
</form>
</div>
</body>
</html>