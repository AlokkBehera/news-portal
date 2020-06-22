
<?php 
session_start();

if(isset($_SESSION["user_id"]))
{
 
}else{
   header('location:../admin/adminLogIn.php');
}


 ?>



 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="userhomepagecss.css">







<div class="menu"> <span></span> </div>
<center>
<p><h1 style="color: white;"><u>
wellcome.</u></h1></p>
</center>
<nav id="nav">
        <ul class="main">
          <?php 
              $email= $_SESSION["user_email_id"];
             ?>
                <li>hi user:<h6><?php echo $email;  ?></h6></li>
               <li><a target="_blank" href="viewpendingpost.php">Your post</a></li>
               <li><a href="useraddpost.php">News Post here</a></li>
               
                <li><a target="_blank" href="logout.php">Logout</a></li>
        </ul>
</nav>
<div class="overlay"></div>

<script>
$('.menu, .overlay').click(function () {
    $('.menu').toggleClass('clicked');
    
    $('#nav').toggleClass('show');
    
});
</script>