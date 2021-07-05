<?php

//echo '<pre>';
//print_r($_GET);
$conn = mysqli_connect('localhost', 'root', '', 'admin');

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql1 = "SELECT * FROM products WHERE id=$id";
    $result = mysqli_query($conn, $sql1);
    
    if(! empty($result)== 1 ){
     
        $rows = mysqli_fetch_assoc($result); 
       
        $product = $rows['product'];
        $description = $rows['description'];
        $quantity = $rows['quantity'];
        $mrp = $rows['mrp'];
        $image = $rows['image'];
    }
}

if(isset($_POST['update'])){
  
    $id = $_POST['id'];
    $product = $_POST['product'];
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $mrp = $_POST['mrp'];
    $image = $_POST['image'];
  
    $sql2 = "UPDATE products SET product='$product', description='$description', quantity='$quantity', mrp='$mrp', image='$image', WHERE id=$id";
    $result = mysqli_query($conn, $sql2);
    echo "Record updated successfully";    
}
?>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="product.php">Products</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categories
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="category.php">Categories List</a>
          <a class="dropdown-item" href="addCategory.php">Add Categories</a>
          
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Products
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="product.php">Product List</a>
          <a class="dropdown-item" href="addProduct.php">Add product</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  
    <title>Edit Product</title>
</head>
<body>
<div class="container">
<div class="row justify-content-container">

<form action="" method="POST">
<h2>Edit Products and its Details</h2>
 <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
Product: <input type="text" name="product" value="<?php echo $rows['product']; ?>"><br><br>
Description : <input type="text" name="description" value="<?php echo $rows['description']; ?>"><br><br>
Quantity  : <input type="text" name="quantity" value="<?php echo $rows['quantity']; ?>"><br><br>
MRP : <input type="text" name="mrp" value="<?php echo $rows['mrp'];?>"><br><br>
Image : <input type="file" name="image" value="<?php echo $rows['image'];?>"><br><br>
<br><br>

<button type="submit" name="update" class="btn btn-primary" >Update</button>

<button><a href="product.php">Back</a></button>
</form>
</div></div>
</body>
</html>