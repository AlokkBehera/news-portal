
<?php 
session_start();

if(isset($_SESSION["email"]))
{
 
}else{
   header('location:adminLogIn.php');
}


 ?>


 
 






<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/adminotpcss.css">
<!------ Include the above in your HEAD tag ---------->
  </head>
<body>




<div class="container">
<h1 class="form-heading"><a href="adminLogIn.php">BACK</a></h1>
<div class="login-form">

<p id="time"></p>

<script>
var setlimit = new Date().getTime() + 60000;//FOR 60 SECONDS

var x = setInterval(function() {    

    var currenttime = new Date().getTime();
    var distance = setlimit - currenttime;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    
    $('#time').html(days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ");
  
    if (distance < 0) {
        clearInterval(x);
       
         $('#time').html("EXPIRED");
       
        $('#form').submit();
        window.alert('Your session has been expired');

        window.location="adminLogIn.php"; 


    }

},1000);



</script>
<div class="main-div">
    
    <form action="" method="post">

        <div class="form-group">


            <input type="text" class="form-control" name="otp" >

        </div>

        
        <button type="submit" class="btn btn-primary" name="submit">Verify OTP</button>

    </form>
    <form action="" method="post">
<input type="submit" name="resendotp" value="RESENDOTP" class="btn btn-primary">

</form>
   


</body>
</html>



<?php
if(isset($_POST['submit'])){

  include('../dbcon/connection.php');
  $otp=$_POST['otp'];

  $query=mysqli_query($con,"SELECT * FROM user_data WHERE user_otp='$otp'");
$result=mysqli_num_rows($query);




if ($result) {

  $query2=mysqli_query($con,"update user_data set user_status=1 where user_otp='$otp'");
 ?>
 <script type="text/javascript">
   alert ('registration sucessfully!! please login')
   window.location.href="../admin/adminLogIn.php";
 </script>
 <?php
  
}
else {
  echo "invalid otp";
}
session_destroy();
}




  ?>


  <?php
if(isset($_POST['resendotp'])){
  

include('../dbcon/connection.php');

$code=rand();
$email=$_SESSION['email'];
$query=mysqli_query($con,"update user_data set user_otp='$code' where user_email_id='$email'");

if($query==true)
{
  include('EMAIL/action.php');
}
}



    ?>