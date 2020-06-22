<?php    

session_start();




$con=mysqli_connect('localhost','root','','news_application');

if ($con==true) {
  if(isset($_POST['submitt'])){
    $user_full_name=trim($_POST['user_full_name']);
    $contact_num=trim($_POST['contact_num']);
    $email=trim($_POST['email']);
    $pwd=trim($_POST['pwd']); 
    $cpwd=trim($_POST['cpwd']); 
    $moblength=strlen($contact_num);
    $ok=strlen($pwd); 
    $code= rand();
    $status=0;
  
       
  

    $user_photo = $_FILES['user_photo']['name'];
    $imageextention = strtolower(pathinfo($user_photo,PATHINFO_EXTENSION));
    $imagesize=$_FILES["user_photo"]["size"];


   $SESSION['email']=$email;



   $user_query=mysqli_query($con, "select * from user_data where user_email_id='$email'  && user_type='U' && user_status=1");

    $user_otpstatus_query=mysqli_query($con, "select * from user_data where user_email_id='$email' && user_type='U' && user_status=$status");


   

   $user_rowcount=mysqli_fetch_assoc($user_query);
  
   $user_otpstatus_rowcount=mysqli_fetch_assoc($user_otpstatus_query);


    if (!empty($user_full_name)) {
      if (preg_match("/^[a-zA-Z ]+$/", $user_full_name)) {
        if (!empty($contact_num)) {
          if ($moblength==10){
            if (preg_match("/^[0-9]+$/", $contact_num)){
              if($ok>4){
                if(preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z!@#$%]{8,12}+$/', $pwd)){
                  if ($pwd===$cpwd) {
                  if ($imagesize< 1000000){//100KB
                    if($imageextention == "jpg" or $imageextention == "jpeg"
                      or $imageextention == "gif"or $imageextention == "png" or $imageextention == "pdf") {
                       if($user_rowcount==false){
                        if( $user_otpstatus_rowcount==false){
 

   
                    
                      


                        
              function insert($user_full_name,$contact_num,$email,$pwd,$user_photo,$user_type,$code,$con){

  $insertstudent="INSERT INTO user_data(user_full_name,user_contact_num,user_email_id,user_password,user_photo,user_type,user_otp)

    VALUES('$user_full_name','$contact_num','$email','$pwd','$user_photo','$user_type','$code')";
    $query=mysqli_query($con,"$insertstudent");

  if($query==true){

    include('EMAIL/action.php');

     $_SESSION['email']=$email;

  }
  else{
    echo "error";
  }

  }




    insert($user_full_name,$contact_num,$email,$pwd,$user_photo,"U",$code,$con);

 } else{
  
   $con=mysqli_connect('localhost','root','','news_application');

   if(isset($email)) { $user_otpstatus_query=mysqli_query($con, "select * from user_data where user_email_id='$email' && user_type='U' && user_status=$status");
      $data= mysqli_fetch_assoc($user_otpstatus_query);
      $uemail= $data['user_email_id'];
 }

       $code=rand();

$query2=mysqli_query($con,"update user_data set user_otp='$code' where user_email_id='$uemail'");

if($query2==true)
{
  
  include('EMAIL/action.php');
   $_SESSION['email']=$email;
}



   


   
             }         
                }else{ ?>
    <script type="text/javascript">
      alert('your email id already exit !! please log in');
    </script>
    <?php  

   
      }

                    }
                    else {
                      $errorimage="only JPG, JPEG, PNG & GIF files are allowed."; 
                    }
                  }
                  else {  
                    $errorimage="file is too large."; 
                  }
                }
                else{ $errorcpwd="password mismatched";   }
            }else {$errorpwd="password wrongformat";}
        }
        else{ $errorpwd="please enter password more than 4 ";   }
    }
    else{$errormob="please enter mobile num only digit"; }
}
else { $errormob="please enter mobile num only 10 digit";}
}
else
  { $errormob="please enter mobile num";}
}
else
  { $errorname="wrong format";}
}
else { $errorname="please enter name";}
}
}





?>




<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/user_regd_css.css">
<script type="text/javascript" src="js/user_regd.js"></script>
<!------ Include the above in your HEAD tag ---------->


    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <hr class="colorgraph colorgraph-header">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Elementary</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="main-navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-arrow-left"></i> Back to Home</a>
                    </li>
                </ul>
            </div>
            
        </div>
        
    </nav>

    <div class="container">

<div class="row"> 
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">

      <form  enctype="multipart/form-data" method="post" action="user_registration.php">
      <h2>Please Sign Up <small>It's free and always will be.</small></h2>
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
                        <input type="text" name="user_full_name" id="name" class="form-control input-lg" placeholder="Full Name" tabindex="1" value="<?php if(isset($user_full_name)) 
            {echo $user_full_name;}?>">
          </div>
          <span style="color: red;"><?php if(isset($errorname))
          {echo $errorname; } 
          ?>
        </span>
        </div>
        
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="contact_num"  class="form-control input-lg" placeholder="contact_num" tabindex="2" value="<?php if(isset($contact_num)) {echo $contact_num;}?>">
          </div>
          <span style="color: red;"><?php if(isset($errormob))
        {echo $errormob; } 
        ?></span>
        </div>
      </div>
      <div class="form-group">
        <input  required="" type="email" name="email" id="email" class="form-control input-lg" placeholder="Email Address" tabindex="3" value="<?php if(isset($email)) {echo $email;}?>">
      </div>
      <span style="color: red;"><?php if(isset($erroremail))
        {echo $erroremail; } 
        ?></span>
      <div class="form-group">
        <label for="name">PHOTO :</label>
        <input type="file" name="user_photo"  class="form-control input-lg" tabindex="4">
        <p>1.Only JPG, JPEG, PNG & GIF files are allowed.<br>2. File Maximum size is 100kb</p>
        <span style="color: red;"><?php if(isset($errorimage))
        {echo $errorimage; } 
        ?></span>
      </div>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
            <input type="text" name="pwd" id="password" class="form-control input-lg" placeholder="Password" tabindex="5">
          </div>
          <span style="color: red;"><?php if(isset($errorpwd))
        {echo $errorpwd; } 
        ?></span>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6">
          <div class="form-group">
           
            <input type="text" name="cpwd"  class="form-control input-lg" tabindex="6">
          </div>
          <span style="color: red;"><?php if(isset($errorcpwd))
        {echo $errorcpwd; } 
        ?></span>
        </div>
      </div>
    
      
      <hr class="colorgraph">
      <div class="row">
        <div class="col-xs-12 col-md-6"><input type="submit" value="Register" class="btn btn-primary btn-block btn-lg" tabindex="7" name="submitt"></div>
        <div class="col-xs-12 col-md-6"><a href="../admin/adminLogIn.php" class="btn btn-success btn-block btn-lg">Sign In</a></div>
      </div>
    </form>



  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
      </div>
     
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div><!-- container ends-->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3 text-center">
                    <ul class="list-inline">
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-home"></i> Home</a>
                        </li>
                        <li class="footer-menu-divider">⋅</li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-bullhorn"></i> Notice Board</a>
                        </li>
                        <li class="footer-menu-divider">⋅</li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-info-sign"></i> About</a>
                        </li>
                        <li class="footer-menu-divider">⋅</li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-envelope"></i> Contact Us</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Designed by XeQt for IEM. Copyright © 2014. All Rights Reserved.</p>
                </div>
            </div>
        </div><!--container ends-->
    </footer>
    <hr class="colorgraph colorgraph-footer">