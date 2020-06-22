<?php 
session_start();

if(isset($_SESSION["uid"]))
{
 
}else{
   header('location:adminLogIn.php');
}

$page='news';
include('include/header.php');
 ?>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="assets/css/newstable.css">

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">


      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">WELCOME</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
         
           
          </div>
            <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: purple;">
              <a href="home.php">Home</a>
            </button>

           
        </div>
      </div>
      <?php

 if(isset($_GET['id'])){
            include('../dbcon/connection.php');
          
             $id=$_GET['id'];
              $query=mysqli_query($con, "select*from user_post_news where user_id='$id'");
          

                $row=mysqli_fetch_assoc($query);
               $useremail= $row['user_email'];
              $status= $row['user_status'];
              

if ($query && $status==0) {

   $code="APPROVED";
   $email=$row['user_email'];

               $query2=mysqli_query($con,"update user_post_news set user_status=1 where user_id='$id'");
include('EMAIL/action.php');
   $_SESSION['email']=$useremail;
       ?>
       <script type="text/javascript">
        alert("userpost approved");
         window.location.href="userpost.php";
       </script>
       <?php 

  
}else{
   ?>
       <script type="text/javascript">
        alert("this post already approved");
         window.location.href="userpost.php";
       </script>
       <?php 
}


          }




        ?>
 










    
      
       
   
  
