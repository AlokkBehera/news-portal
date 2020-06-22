<?php 
session_start();

if(isset($_SESSION["uid"]))
{
 
}else{
  session_destroy();
   header('location:adminLogIn.php');
}

$page='category';
include('include/header.php');
 ?>
 <link rel="stylesheet" type="text/css" href="assets/css/updatetable.css">

  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">WELL COME</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <a href="addcategory.php">Add Category</a>
            </button>
           
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary">
            <a href="category.php">Cancel</a>
            
          </button>

        </div>
      </div>

     <?php 
     if(isset($_GET['id'])){
$id=$_GET['id'];
 $query=mysqli_query($con, "select*from admin_table where id='$id'");
while ($row=mysqli_fetch_assoc($query)) {
      ?>

<section id="contact">
      
      <div class="contact-section">
      <div class="container">
          <form action="updatedata.php" method="post">
          <div class="col-md-6">

            <div class="form-group">
               
                <input type="hidden" class="form-control" id="" name="id" value="<?php echo $row['id'];  ?>">
              </div>
           
              <div class="form-group">
                <label for="exampleInputUsername">Category</label>
                <input type="text" class="form-control" id="" name="category" value="<?php echo $row['category'];  ?>">
              </div>
             
              
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for ="description"> Description</label>
                <textarea  class="form-control" id="description" name="description"><?php echo $row['description'];  ?></textarea>

              </div>

              <div>
        
       <button type="submit" class="btn btn-default submit" name="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Save</button>
              </div>



              <?php 
}
}
               ?>
              
          </div>
        </form>

      </div>
    </section>







      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

      
    </main>
  </div>
</div>


<?php
 include('../dbcon/connection.php');
 if(isset($_POST['submit'])){
  $id= sprintf($_POST['id']);
$category=$_POST['category'];
$description=$_POST['description'];
 
    $sql = "UPDATE admin_table SET category='$category',description='$description' WHERE id='$id'";
   $data=mysqli_query($con,$sql);

if($data==true){
     ?>
    <script>

      alert( 'DATA UPDATED BY sucessfully');
      window.location.href="category.php";


    </script>
    <?php  
    
   }
   else{
    echo "data not save sucessfully";
   }

 }




  ?>