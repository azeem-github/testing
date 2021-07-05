<?php
session_start();
if($_SESSION['admin_id'] == ''){
    header ('Location : login.php');
}
$conn = mysqli_connect('localhost', 'root', '', 'admin');

if(isset($_POST['add'])){

        $product = $_POST['product'];
        $description = $_POST['description'];
        $quantity = $_POST['quantity'];
        $mrp = $_POST['mrp'];
        $image = $_POST['image'];

        $sql3 = "INSERT INTO products (product, description, quantity, mrp, image ) VALUES('$product', '$description', '$quantity', '$mrp', '$image')";
        $add = mysqli_query($conn, $sql3);

        if($add){
            move_uploaded_file($_FILES["image"]['temp_name'], "images/".$_FILES["images"]["name"]);
            $_SESSION['success'] == "Added Successfully";
            header("Location: product.php");
        }
        else{
            $_SESSION['success'] = " not added " ;
            header("Location : product.php");
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
    <title> Add Products</title>
</head>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="product.php"> <h2></h2>Products</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">>
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
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products  |
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="product.php">Product List</a>
          <a class="dropdown-item" href="addProduct.php">Add product</a>
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
<h3>Add Products apni Marxi Se</h3>
<br>
<br>
<body>

<div class="container">
<div class="row justify-content-container">

<form action="" method="POST" enctype="multipart/form-data">
Product: <input type="text" name="product"?> <br><br>
Description : <br></h2><textarea name="description" rows="5" cols="50"> </textarea><br>
Quantity : <input type="text" name="quantity"><br><br>
MRP : <input type="text" name="mrp"><br><br>
Image : <input type="file" name="image" id="image">
<br><br>
<button type="submit" name="add" class="btn btn-primary a-btn-slide-text">
<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
<span>ADD</button></span>


<button><a href="product.php">Back</button></a>
</form>
</div>
</body>
</html>