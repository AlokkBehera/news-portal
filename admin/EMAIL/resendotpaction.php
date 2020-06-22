<?php
//$con=mysqli_connect('localhost','root','','students');
if(isset($_POST['resendotp'])){
  session_start();

include('config.php');

$otp=rand();
echo $email=$_SESSION['email'];
$query=mysqli_query($con,"update user_data set otp='$otp' where email='$email'");

if($query==true)
{
  include('EMAIL/resendotpaction.php');
}
}
?>


<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style>
p {
  text-align: center;
  font-size: 60px;
  margin-top: 0px;
}
</style>
</head>
<body>

<p id="time"></p>

<script>
var setlimit = new Date().getTime() + 600000;//FOR 60 SECONDS

var x = setInterval(function() {    

    var currenttime = new Date().getTime();
    var distance = setlimit - currenttime;
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
    // document.getElementById("ok").innerHTML = days + "d " + hours + "h "
    // + minutes + "m " + seconds + "s ";
    $('#time').html(days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ");
  
    if (distance < 0) {
        clearInterval(x);
        //document.getElementById("#ok").innerHTML = "EXPIRED";
         $('#time').html("EXPIRED");
       //document.getElementById("ok").submit();
        $('#form').submit();
        window.alert('Your session has been expired');
        window.location="otp2.php"; 
    }
},1000);



// function SubmitForm(){
//     $("#form").submit();
// };
// setTimeout(SubmitForm,5000);

</script>

	<center>
<h1>PLEASE VERIFY YOUR OTP HERE</h1>

<form action="otpcheck.php" method="post">

<input type="text" name="otp">

<input type="submit" name="submit">
</form>
<form action="" method="post">
<input type="submit" name="resendotp" value="RESENDOTP">

</form>

</center>
</body>
</html>