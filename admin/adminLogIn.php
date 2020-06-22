
<?php 
session_start();

if(isset($_SESSION["uid"]))
{
	header('location:userpost.php');

}else if(isset($_SESSION["user_id"])){
	
	header('location:../user/userhomepage.php');
}

 ?>



<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
   
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="assets/css/adminLoginStyle.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span ><i class="fab fa-facebook-square" ></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form action="adminLogin.php" method="post">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" placeholder="input email" name="email">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" placeholder="password" name="password">
					</div>
					
					<div class="form-group">
						<input type="submit" value="Login" class="btn float-right login_btn" name="submit">
					</div>
					
					<div class="form-group">
						<button style="background-color: yellow;"><a href="../user/user_registration.php" class="btn">Register</a></button>
					</div>
					
				</form>
			</div>
			
		</div>
	</div>
</div>
</body>
</html>


<?php

include('../dbcon/connection.php');

if(isset($_POST['submit'])){

	 $email=$_POST['email'];
     $password=$_POST['password'];


	 $user_query=mysqli_query($con, "select * from user_data where user_email_id='$email' && user_password='$password' && user_type='U' && user_status=1");
	  $user_otpstatus_query=mysqli_query($con, "select * from user_data where user_email_id='$email' && user_password='$password' && user_type='U' && user_status=0");

     $admin_query=mysqli_query($con, "select * from admin_login where email='$email' && password='$password'");
      $admin_rowcount=mysqli_num_rows($admin_query);

       $user_rowcount=mysqli_num_rows($user_query);
	
	 $user_otpstatus_rowcount=mysqli_num_rows($user_otpstatus_query);
	
	 
	    if($admin_rowcount==true){
	 	$data=mysqli_fetch_assoc( $admin_query);

	 	$id=$data["id"];
	    $_SESSION["uid"]=$id;
	    
	 	?>
	 	<script>
            alert('welcome to admin dash board');
	 		window.location.href="userpost.php";
	 		$_SESSION['email']=$email;
	 	</script>
	 	<?php 
    }
	 else if($user_rowcount==true){
	 	
	 	$da=mysqli_fetch_assoc($user_query);

	 	 $i=$da["user_id"];
	 	
	    $_SESSION["user_id"]=$i;
	    
	    $i=$da["user_email_id"]; 

	      $_SESSION["user_email_id"]=$i;
	 	
	 	?>
	 	<script type="text/javascript">
	 		alert('Welcome :<?php echo $i=$da["user_email_id"]; ?>');
	 		window.location.href="../user/userhomepage.php";
	 			 $_SESSION["user_email_id"]=$i;
	 	</script>
	 	<?php  

	 	

	 }else if($user_otpstatus_rowcount==true){

	 	$user_otpstatus_query1=mysqli_query($con, "select * from user_data where user_email_id='$email' && user_type='U' && user_status=0");
      $data= mysqli_fetch_assoc($user_otpstatus_query1);
      $uemail= $data['user_email_id'];


      $code=rand();

$query2=mysqli_query($con,"update user_data set user_otp='$code' where user_email_id='$uemail'");


if($query2==true)
{
  
  include('../user/EMAIL/action.php');
   $_SESSION['email']=$email;
}
	 
	 	
	 	
	 	

	 }else{
	 	?>
	 	<script type="text/javascript">
	 		alert('invalid credentials,Please try again');
	 		
	 	</script>
	 	<?php  
	 }
}

?>