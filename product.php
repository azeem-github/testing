<?php
session_start();
if($_SESSION['admin_id'] == ''){
    header ('Location : login.php');
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />

    <title>Products</title>
    
</head>
<body>
<?php

$conn = mysqli_connect('localhost', 'root', '', 'admin');

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sql = "DELETE FROM products WHERE id=$id";
    $del = mysqli_query($conn, $sql);
    echo "Record Deleted";
}
?>
 <nav class="navbar navbar-expand-md bg-dark navbar-dark">
 <div class="container-fluid">
    <div class="navbar-header">
  <a style="color:white" class="navbar-brand" href="product.php"> <h2></h2>Products</a>
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

<div class="container">
<div class="row justify-content-container">
<?php 
$products = mysqli_query($conn, "SELECT * FROM products"); 
?>
<table id="table1" class="table table-striped" >
<tr >
        <th> Product</th>
        <th> Description </th>
        <th> Quantity </th>
        <th> MRP </th>
        <th>Image</th>
        <th colspan="2"> Action </th>
      
    </tr>
<?php while($rows = mysqli_fetch_assoc($products)) {?>
    <tr>
        <td>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <b><?php echo $rows['product'];?></b>
        </td>
        <td>
            <b><?php echo $rows['description'];?></b>
        </td>
        <td>
            <b><?php echo $rows['quantity'];?></b>
        </td>
        <td>
            <b><?php echo $rows['mrp'];?></b>
        </td>
        <td>
        <b><img src="images/<?php echo $rows['image'];?>" width='100' height='50'></b>
        </td>
        <br><br>
        <td>
            <a href="editProduct.php?edit=<?php echo $rows['id']; ?>" class="btn btn-primary btn-sm a-btn-slide-text">
            <span class="glyphicon" aria-hidden="true"></span>  Edit</a>
        </td>
        <br>
        <br>
        <td>
            <a href="product.php?delete=<?php echo $rows['id']; ?>"class="btn btn-danger btn-sm a-btn-slide-text">
            <span class="glyphicon"aria-hidden="true"></span>  Delete</a>
        </td>
    </tr>  
  <?php } ?>
</table>
</div>
</div>
<button><a href="profile.php">Back</a></button>
</body>
</html>
<script>
    $(document).ready(function () {
        $('#table_id').DataTable();
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#table1').DataTable();
    });
</script>
<script>
 $("form#data").submit(function(e) {
 e.preventDefault();    
 var formData = new FormData(this);
 $.ajax({
  url: 'add.php',
  type: 'POST',
  data: formData,
  dataType: 'json',
  success: function (return_data) {
   if(return_data.validation_status=='T'){
	$('form#data').trigger("reset");
   }
  $("#msg_display").html(return_data.msg);     
  $("#msg_display").show();
 setTimeout(function() { $("#msg_display").fadeOut('slow'); }, 4000);
     },
   cache: false,
   contentType: false,
   processData: false
  });
});
</script>