<!DOCTYPE html>
<html>
<head>
<title>Data Table</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" />
   
    
</head>
<body>
 <nav class="navbar navbar-expand-md bg-pink navbar-dark">
<div class="navbar-header">
<ul class="navbar-nav">
<li><a href=category.php>-Category Page </a></li>
<li><a href=product.php>- Product Page </a></li>
<li><a href=logout.php>- LogOut</a></li>
</ul>
</nav> 
<?php
 $conn = mysqli_connect('localhost', 'root', '', 'admin');

 $getusers = mysqli_query($conn, "SELECT * FROM products ORDER by id ASC");

?>
<div class="container">
<table id="table1" class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Description</th>
            <th>Quantity</th>
            <th>MRP</th>

        </tr>
    </thead>
    <tbody>
       <?php 
       while($data = mysqli_fetch_array($getusers)){
           ?>
           <tr>
        <td><?php echo $data['id'];?></td>
    <td><?php echo $data['product'];?></td>
    <td><?php echo $data['description'];?></td>
    <td><?php echo $data['quantity'];?></td>
    <td><?php echo $data['mrp'];?></td>
    
    </tr>
           
           <?php
       }
?>    
        </tbody>
</table>
</div>
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
</body>
</html>