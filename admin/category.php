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
<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg'); background-repeat: no-repeat;  background-size: cover;">
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">WELL COME</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">
              <a href="addcategory.php">Add Category</a>
            </button>
           
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>

        </div>
      </div>



<link rel="stylesheet" type="text/css" href="assets/css/viewtable.css">
<!------ Include the above in your HEAD tag ---------->
<center>
<div class="container">
    <div class="row col-md-6 col-md-offset-2 custyle">
    <table class="table table-striped custab" style="background-color: white;">
    <thead>
    
        <tr style="width: 80%;">
            
            <th style="text-align: center;">Category</th>
            <th style="text-align: center;">Description</th>
            <th class="text-center" style="text-align: center;">Action</th>
        </tr>
    </thead>

           <?php 
            include('../dbcon/connection.php');

            $query=mysqli_query($con,"select* from admin_table where user_type='U'");
             while ($row=mysqli_fetch_assoc($query)) {

      ?>
            <tr style="width: 100%">
                
                <td style="text-align: center;"><?php echo $row['category'];  ?></td>
                <td style="text-align: center;"><?php echo substr($row['description'], 0,200);  ?></td>
                <td class="text-center"><a class='btn btn-info btn-xs' href="updatedata.php?id=<?php echo $row['id'];?>"><span class="glyphicon glyphicon-edit"></span> Edit</a> <a href="delete.php?id=<?php echo $row['id'];?>" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-remove"></span> Del</a></td>

            </tr>
            
          
           
          <?php  


      }
 
?>
    </table>
    </div>
</div>
</center>



      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

     
    </main>
  </div>
</div>





</body>


       
</html>







    
      
       
   
  
