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

 <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://fonts.googleapis.com/css?family=Oswald:700|Patua+One|Roboto+Condensed:700" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="assets/css/categorycss.css">


     
    


<section id="contact" class="content-section text-center" style="background-color: white;">
        <div class="contact-section">
            <div class="container">
              <h2 style=" color: black;">Add News</h2>
              <div>
                <ul class="breadcrumb" style="width: 60px;">
                
                   <li class="breadcrumb-item active"><a href="news_details.php">News</a> </li>
                   

                </ul>
              </div>
              
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <form class="form-horizontal" action="addnews.php" method="post" enctype="multipart/form-data">
                    
                    <div>
                      <label for="exampleInputEmail2" style=" color: black;">Title</label>
                      <input type="text" class="form-control" name="news_title">
                    </div>
                    <div>
                      <label for="exampleInputText" style=" color: black;">Your Message</label>
                     <textarea  class="form-control" placeholder="Description" name="news_description"></textarea> 
                    </div>
                     <div>
                      <label for="exampleInputEmail2" style=" color: black;">Image</label>
                      <input type="file" class="form-control" name="image">
                    </div>
                     <div>
                      <label for="exampleInputEmail2" style=" color: black;">Date</label>
                      <input type="date" class="form-control" name="date">
                    </div>

                     <div>
                      <label  style=" color: black;">category</label>
                      <select name="category" style="text-align: center;" class="form-control">
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
                      <br><br>

                    </div>
                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                  </form>

               

                  <hr>
                    <h4><?php
        include('../dbcon/connection.php');
        $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           $email= $row['email']; 
            echo $email;
         }

         ?></h4>
                  
                </div>
              </div>
            </div>
        </div>
      </section>



       
</html>

<?php 
if(isset($_POST['submit'])){


  $news_title=$_POST['news_title'];
$news_description=$_POST['news_description'];
        
$image=$_FILES["image"]["name"];
$tempimgname=$_FILES["image"]["tmp_name"];
move_uploaded_file($tempimgname, "dataimg/$image");

$date=$_POST['date'];
$category=$_POST['category'];

$status=1;


  $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           $email= $row['email']; 
            
         }  
         




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
  }else if($date==""){
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

           
          

   

  



    

    function insert($news_title,$news_description,$image,$date,$category,$user_type,$user_status,$email,$con){

    $insertstudent="INSERT INTO user_post_news(news_title,news_description,image,news_date,category,user_type,user_status,user_email)

      VALUES('$news_title','$news_description','$image','$date','$category','$user_type','$user_status','$email')";
      $query=mysqli_query($con,"$insertstudent");

    if($query==true){
      ?>
         
      
      <script type="text/javascript">
        alert( 'inserted by:<?php  $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           echo $email= $row['email']; 
            
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
      insert($news_title,$news_description,$image,$date,$category,"A",$status,$email,$con);
    }
    else{
      ?>
      <script>
        alert('Please fill in text');
        
        window.location.href="addnews.php";
      </script>
      <?php
      }}
       }
      ?>
 

  
   

   
