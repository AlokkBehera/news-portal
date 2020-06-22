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
            <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: purple
            ;">
              <a href="addnews.php">Add news</a>
            </button>
           
          </div>
            <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: purple;">
              <a href="home.php">Home</a>
            </button>

             <button type="button" class="btn btn-sm btn-outline-secondary" style="background-color: purple;">
              <a href="news_details.php">Cancel</a>
            </button>
        </div>
      </div>
  <?php 
  if(isset($_GET['id'])){
            include('../dbcon/connection.php');
            
            $id=$_GET['id'];
          $query=mysqli_query($con,"select user_post_news.user_id,user_post_news.news_title,user_post_news.news_description,user_post_news.image,user_post_news.news_date,user_post_news.user_email, admin_table.category,admin_table.id from user_post_news INNER JOIN admin_table ON user_post_news.category=admin_table.id && user_post_news.user_status= 1 && user_post_news.user_type= 'A' && user_post_news.user_id=' $id' ");
             $row=mysqli_fetch_assoc($query)

      ?>


<div class="container">
              <div class="row">
                <div class="col-xs-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home ?id=<?php echo $row['user_id'];?>" role="tab" aria-controls="nav-home" aria-selected="true">News Details</a>
                     
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="well">
<form action="news_edit.php" method="post" enctype="multipart/form-data">
 <table  id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th>Image</th>
          <th>News_title</th>
          <th>Description</th>
          <th>news_date</th>
          <th>Category</th>
          <th>Action</th>
        </tr>
      </thead>

     
      <tbody>
        <tr>
          <input type="hidden" name="id" value="<?php echo $row['user_id'];  ?>">

          <td><img src="../user/userimg/<?php echo $row['image'];?>"
          width="200px" alt="candidates'photo">
          <input type="file" name="image"   ></td>

          <td><input type="text" name="news_title" value="<?php echo $row['news_title'];  ?>"></td>
          <td>
          <textarea name="news_description" style="height: 90px; width: 300px;"><?php echo $row['news_description'];  ?></textarea></td>

          <?php
        $date=new DateTime($row['news_date']);
        $dt=$date->format('Y-m-d');
        ?>
           <td><input type="date" name="date" value="<?php echo $dt;  ?>"></td>

           <td> <select name="category" style="text-align: center;">
            <option value="<?php echo $row['id'];?>"><?php echo $row['category'];?></option>
                         <?php
                    include('../dbcon/connection.php');
                 $query2=mysqli_query($con,"select * from admin_table");

                 while($row2=mysqli_fetch_assoc($query2)){
                      ?>
                        <option value="<?php echo $row2['id'];  ?>"><?php echo $row2['category'];  ?></option>
                        <?php
                      }
                      ?>
                         
                      </select></td>

           <td>
           <button type="submit" class="btn btn-default submit" name="submit" style="background-color: blue;"><i class="fa fa-paper-plane" aria-hidden="true"></i> Save</button></td>
        </tr>
       
      </tbody>
      <?php  
    }
    ?>
    
    </table>
    </form>
</div>



</div>
                 
<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

     
    </main>
  </div>
</div>




<?php

include('../dbcon/connection.php');

 if(isset($_POST['submit']))
 {
  $id= sprintf($_POST['id']);
$news_title=$_POST['news_title'];
$news_description=$_POST['news_description'];

$news_date=$_POST['date'];
$category=$_POST['category'];
 
   if($_FILES["image"]["name"]!==""){

     $image=$_FILES["image"]["name"];
  $tempimgname=$_FILES["image"]["tmp_name"];
  move_uploaded_file($tempimgname, "../user/userimg/$photo");



   $sql = "UPDATE user_post_news SET news_title='$news_title',news_description='$news_description',image='$image',news_date='$news_date',category='$category' WHERE user_id='$id'";
   $data=mysqli_query($con,$sql);



  }
  else{

  $sql = "UPDATE user_post_news SET news_title='$news_title',news_description='$news_description',news_date='$news_date',category='$category' WHERE user_id='$id'";
   $data=mysqli_query($con,$sql);

  }
   if($data==true){
     ?>
    <script>

      alert( 'DATA UPDATED ');
      window.location.href="news_details.php";


    </script>
    <?php  
    
   }
   else{
    echo "data not save sucessfully";
   }

 }

 

  ?>






    
      
       
   
  
