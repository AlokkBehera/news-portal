


<?php

include('userheader.php')
 ?>


<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body  style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');  background-repeat: no-repeat; background-size: cover;">
<div class="container"  >
	<form  method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="span3">
                <label>News_title</label> <input class="form-control" placeholder="News title" type="text" name="news_title">

                 <label>Image</label><input class="span3"type="file" name="image">

                 
                <label>Date</label> <input class="span3"type="date" name="news_date"> 
                <label for="exampleInputEmail2">category</label>
                      <select name="category" style=" text-align: center;" class="form-control">
                         <?php
                    include('../dbcon/connection.php');
                 $query=mysqli_query($con,"select * from admin_table order by id DESC");
                 while($row=mysqli_fetch_assoc($query)){
                      ?>
                        <option value="<?php echo $row['id'];  ?>"><?php echo $row['category'];  ?></option>
                        <?php
                      }
                      ?>
                         
                      </select>
            </div>
    
            <div class="span5">
                <label>Description</label> 
                <textarea class="input-xlarge span5" id="message" name="news_description"
                rows="10">
    </textarea>
            
            <input type="submit" name="submit" value="submit" style="margin-left: 500px; margin-top: -10px;">
        
    </form>
</div>

</body>


<?php 
if(isset($_POST['submit'])){

 $user_email=$_SESSION['user_email_id'];

  $news_title=$_POST['news_title'];
$news_description=$_POST['news_description'];
        
$image=$_FILES["image"]["name"];
$tempimgname=$_FILES["image"]["tmp_name"];
move_uploaded_file($tempimgname, "userimg/$image");

$news_date=$_POST['news_date'];

$category=$_POST['category'];






  if($news_title ==""){
    ?>
    <script>
      alert('please fill the title');
      exit();
    </script>
    <?php  
  }else if($news_description==""){
     ?>
    <script>
      alert('please fill the description');
      exit();
    </script>
    <?php 
  }else if(strlen($news_description)<10){
 ?>
    <script>
      alert('Description atleast 100 character');
      exit();
    </script>
    <?php
  }else if($image==""){
     ?>
    <script>
      alert('please choose image');
      exit();
    </script>
    <?php 
  }else if($news_date==""){
 ?>
    <script>
      alert('please choose a date');
      exit();
    </script>
    <?php 
  }else if($category==""){
     ?>
    <script>
      alert('please choose any category');
      exit();
    </script>
    <?php 
  }
  else{
 

    include('../dbcon/connection.php');

           
          

   

  



    

    function insert($news_title,$news_description,$image,$news_date,$category,$user_type,$user_email,$con){

    $insertstudent="INSERT INTO user_post_news(news_title,news_description,image,news_date,category,user_type,user_email)

      VALUES('$news_title','$news_description','$image','$news_date','$category','$user_type','$user_email')";
      $query=mysqli_query($con,"$insertstudent");

    if($query==true){
      ?>
         
      
      <script type="text/javascript">
        alert( 'inserted by:<?php  $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from user_data where user_id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           echo $email= $row['user_email_id']; 
            
         }  
          ?>');
        
      
      </script>
      <?php  
    }
    else{
      echo "error";
    }

    }


    if($category!="")
    {
      insert($news_title,$news_description,$image,$news_date,$category,"U",$user_email,$con);
    }
    else{
      ?>
      <script>
        alert('Please fill in text');
        
        window.location.href="useraddpost.php";
      </script>
      <?php
      }}
       }
      ?>