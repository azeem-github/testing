<!-- HTML FORM -->

<div class='row'>
  <div class='col-md-3 col-md-offset-2'>Name</div>
  <div class='col-md-3'><input type='text' class='form-control' id='userid' name=p_name placeholder='Product Name'></div>
</div>
<br>
<div class='row'>
  <div class='col-md-3 col-md-offset-2'>Price</div>
  <div class='col-md-3'><input type='text' class='form-control' id='userid' name=price placeholder='Price'></div>
</div>
<br>
<div class='row'>
  <div class='col-md-3 col-md-offset-2'>Upload file</div>
  <div class='col-md-4'><input type=file name='file_up'></div>
</div>

<br>
<div class='row'>
  <div class='col-md-3 col-md-offset-2'></div>
  <div class='col-md-4'><button>Submit</button></FORM></div>
</div>


<!-- The submit button will trigger the JQuery code to post the data
 to backend PHP script to check , upload image and insert record into our database -->
<script>
 $("form#data").submit(function(e) {
 e.preventDefault();    
 var formData = new FormData(this);
 $.ajax({
  url: 'add-recordck.php',
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

<!-- You can see on successful upload and insertion of record into table,
 we will display message to user. On failure also we will display reason for the user to correct it.  -->
<script>
 success: function (return_data) {
 if(return_data.validation_status=='T'){
 $('form#data').trigger("reset");
 }
 $("#msg_display").html(return_data.msg);     
 $("#msg_display").show();
 setTimeout(function() { $("#msg_display").fadeOut('slow'); }, 4000);
 }
 </script>
 <!-- Check file type ( only Gif and Jpg are allowed )  -->

 <script>
 if (!($_FILES[file_up][type] =="image/jpeg" OR $_FILES[file_up][type] =="image/gif"))
{$elements['msg'].="Your uploaded file must be of JPG or GIF. ";
$elements['msg'].="Other file types are not allowed<BR>";
$elements['validation_status']="F";	// Set the flag to F
}
 </script>

 <!-- Check file size ( upto 250 KB )  -->

 <script>
 if ($_FILES[file_up][size]>250000){
$elements['msg'].="Your uploaded file size is more than 250KB ";
$elements['msg'].=" so reduce the file size and then upload.<BR>";
$elements['validation_status']="F";	 // Set the flag to F
}
 </script>


 <!-- If all above validations are cleared then we will go for uploading the file. -->

 <script>
 $file_name=$_FILES[file_up][name];// Name of the file upload
if($elements['validation_status']=="T"){
// the path with the file name where the file will be stored
$add="images/$file_name"; 
if(move_uploaded_file ($_FILES[file_up][tmp_name], $add)){
/// Other code to store record in database 	
}
}
 </script>

 <!-- After uploading we will insert one record to 
 MySQL database table with Product name, price and file name. -->isset

<?php
 $query="INSERT INTO plus2_db_images (p_name,price,img) values(?,'$price',?)";
$stmt=$connection->prepare($query);
if($stmt){ 
$stmt->bind_param("ss", $p_name,$file_name);
if($stmt->execute()){
$elements['msg'].= "Records added : ".$connection->affected_rows;
$elements['msg'].= "<br>Product ID : ".$connection->insert_id;
}else{
$elements['validation_status']="F";		
$elements['msg'].="Database error : ". $connection->error;
}
}else{
$elements['validation_status']="F";		
$elements['msg'].="Database error : ". $connection->error;
}
?>