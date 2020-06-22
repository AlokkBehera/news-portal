<?php
session_start();
if(isset($_SESSION["uid"])){
	echo "";
}else
{
	session_destroy();
	header('location:adminLogIn.php');
}




  ?>


  <?php
    
     include('../dbcon/connection.php');
    
   
	?>

	<?php



$id= $_GET['id'];

$query= mysqli_query($con,"DELETE FROM admin_table WHERE id= '$id'");
if($query==true)
{
	?>
	
	
	<script type="text/javascript">
		alert('data deleted')
		window.location.href='category.php';

	</script>
	<?php


}
else{
	?>
	<script type="text/javascript">
		alert('error!!')
		window.location.href='category.php';
	</script>
	<?php
}
	?>




