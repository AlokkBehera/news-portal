<?php 
session_start();

if(isset($_SESSION["uid"]))
{
 
}else{
   header('location:adminLogIn.php');
}

$page='category';

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
              <h2 style=" color: black;">Add Category</h2>
              
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <form class="" action="addcategory.php" method="post">
                    
                    <div class="form-group">
                      <label for="exampleInputEmail2" style=" color: black;">Category</label>
                      <input type="text" class="form-control" name="category">
                    </div>
                    <div class="form-group ">
                      <label for="exampleInputText" style=" color: black;">Your Message</label>
                     <textarea  class="form-control" placeholder="Description" name="Description"></textarea> 
                    </div>
                    <button type="submit" class="btn btn-default" name="submit">Submit</button>
                  </form>

                  <hr>
                    <h4 style=" color: red;"><?php
        include('../dbcon/connection.php');
        $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           $email= $row['email']; 
            echo $email;
         }

         ?></h4>
                  <ul class="list-inline banner-social-buttons">
                   
                    <li><a href="category.php" class="btn btn-default btn-lg" style="background-color: black;"> <span class="network-name" >VIEW DATA</span></i></a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
        </div>
      </section>



       
</html>

<?php 
if(isset($_POST['submit'])){
 

    include('../dbcon/connection.php');


  
      
        $id=$_SESSION["uid"];


        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           $email= $row['email']; 
           
            
         }

        

   






       $category=$_POST["category"];

    $description=$_POST["Description"];
  
    $check=mysqli_query($con,"select* from admin_table where category='$category' ");
if(mysqli_num_rows($check)>0){
   
         
     echo "<script>alert( 'category already taken')</script>";
      exit();
}else{


    

    function insert($category,$description,$email,$user_type,$con){

    $insertstudent="INSERT INTO admin_table(category,description,inserted_by,user_type)

      VALUES('$category','$description','$email','$user_type')";
      $query=mysqli_query($con,"$insertstudent");

    if($query==true){
      ?>
         
      
      <script type="text/javascript">
        alert( 'Inserted by:<?php echo $email ?>');
        
      window.location.href="addcategory.php";
      </script>
      <?php  
    }
    else{
      echo "error";
    }

    }


    if($category!="" && $description!="" && $email!="")
    {
      insert($category,$description,$email,"U",$con);
    }
    else{
      ?>
      <script>
        alert('Please fill in text');
        
        window.location.href="addcategory.php";
      </script>
      <?php
      }}
       }
      ?>
 

  
   

   
