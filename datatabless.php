<?php

$connect = mysqli_connect('localhost', 'root', '', 'sikes');
if(isset($_POST['insert'])){
$file = addslashes(file_get_contents($_FILES["image"]["images"]));
$query = "INSERT INTO products(image) VALUES('$file')";
if(mysqli_query($connect,$query)){
	echo '<script>alert("Image Inserted Into Database")</script>';
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Image Uplaod</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container" style="width:500px;">
		<h3 aling="ceneter"> INSERT and Display Image</h3>
		<form method="post" emctype="multipart/form-data">
			<input type="file" name="image" 
			id="image">
			<br>
			<input type="submit" name="insert"
			id="insert" value="insert">
		</form>
		<br>
		<table class="table table-bordered">
			<tr>
				<th>Images</th>
			</tr>
			<?php
			$query = "SELECT * FROM products ORDER BY id DESC";
			$result =mysqli_query($connect, $query);
			while($row = mysqli_fetch_array($result))
			{
				echo '
<tr>
<td>
<img src="data:image/jpeg;base64,'.base64_encode($row['image'] ).'" />
<td> Product</td>
        <td> Description </td>
        <td> Quantity </td>
        <td> MRP </td>
</td
</tr>
				';
			}
			?>
		</table>
	</div>
</body>
</html>

<script>
	$(document).ready(function(){
		$('#insert').click(function(){
			var image_name= $('#image'). val();
			if(image_name == '')
			{
				alert("Please Select Image");
				return false;
			}
			else{
				var extension = $('#image').val().split('.').pop().toLowerCase();
				if(jQuery,inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1){
					alert('Invalid Image File');
					$('#image').val('');
					return false;
				}
			}
		});
	});

</script>
		