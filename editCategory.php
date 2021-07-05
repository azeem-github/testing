<?php

//echo '<pre>';
//print_r($_GET);
$conn = mysqli_connect('localhost', 'root', '', 'admin');

if(isset($_GET['edit'])){
    $id = $_GET['edit'];
    $sql1 = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($conn, $sql1);

    if(! empty($result)== 1 ){

        $rows = mysqli_fetch_array($result);
        $category = $rows['category'];
        $description = $rows['description'];
    }
}

if(isset($_POST['update'])){

    $id = $_POST['id'];
    $category = $_POST['category'];
    $description = $_POST['description'];


    $sql2 = "UPDATE categories SET category='$category', description='$description' WHERE id=$id";
    $result = mysqli_query($conn, $sql2);
    echo "Record updated successfully";
    header('location: category.php');
}
?>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="category.php"> <h2></h2>Category</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false">
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Edit Category</title>
</head>
<body>
<div class="container">
<div class="row justify-content-container">

<form action="" method="POST">
<h2>Edit Category Name</h2>
 <input type="hidden" name="id" value="<?php echo $rows['id']; ?>">
Category : <input type="text" name="category" value="<?php echo $rows['category']; ?>"><br><br>
Description : <input type="text" name="description" value="<?php echo $rows['description']; ?>"><br><br>
<button type="submit" name="update" class="btn btn-primary" >Update</button>

<button><a href="product.php">Back</a></button>
</form>
</div></div>
</body>
</html>