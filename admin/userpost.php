<?php 
session_start();

if(isset($_SESSION["uid"]))
{
 
}else{
   header('location:adminLogIn.php');
}

$page='userpost';
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
         

        </div>
      </div>

<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg'); background-repeat: no-repeat; background-size: cover;">

<div class="container">
              <div class="row">
                <div>
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="" role="tab" aria-controls="nav-home" aria-selected="true">User Details</a>
                     
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                        <div class="well">

 <table id="example" class="table table-striped table-bordered" style="width:100%">
      <thead>
        <tr>
          <th style="text-align: center;">Image</th>
          <th style="text-align: center;">News_title</th>
          <th style="text-align: center;">Description</th>
          <th style="text-align: center;">news_date</th>
          <th style="text-align: center;">Category</th>
          <th style="text-align: center;">Posted By</th>
          <th style="text-align: center;">Action</th>
        </tr>
      </thead>

       <?php 
            include('../dbcon/connection.php');

         
            $query=mysqli_query($con,"select user_post_news.user_id,user_post_news.news_title,user_post_news.news_description,user_post_news.image,user_post_news.news_date,user_post_news.user_email,admin_table.category from user_post_news INNER JOIN admin_table ON user_post_news.category=admin_table.id && user_post_news.user_status= 0  order by user_post_news.user_id  DESC");

             
                    
      ?>
      <tbody>
        <?php
               while ($row=mysqli_fetch_assoc($query)) {
          ?>
        <tr>
          <td style="text-align: center;"><img src="../user/userimg/<?php echo $row['image'];?>"
          width="200px" alt="candidates'photo"></td>

          <td style="text-align: center;"><div class="text-center"></div></i><?php echo $row['news_title'];  ?></td>
          <td style="text-align: center;"><?php echo $row['news_description'];  ?></td>
          <?php
        $date=new DateTime($row['news_date']);
        $dt=$date->format('d-m-yy');
        ?>
          <td style="text-align: center;"><?php echo $dt;  ?></td>
         
             
          <td style="text-align: center;">
              <?php echo   $row['category'];  ?>
          </td>
              <td style="text-align: center;">
              <?php echo   $row['user_email'];  ?>
          </td>
  
           <td class="text-center" style="text-align: center;"><a class='btn btn-info btn-xs' href="adminapproved.php?id=<?php echo $row['user_id'];?>"><span class="glyphicon glyphicon-edit"></span> Approved</a> <a href="?id=<?php echo $row['user_id'];?>" class="btn btn-danger btn-xs remove" id="delete ?id=<?php echo $row['user_id'];?>"><span class="glyphicon glyphicon-remove"></span> Del</a></td>
        </tr>

        <?php  
      }
      ?>
      </tbody>
       <tfoot>
            <tr>
               <th style="text-align: center;">Image</th>
          <th style="text-align: center;">News_title</th>
          <th style="text-align: center;">Description</th>
          <th style="text-align: center;">news_date</th>
          <th style="text-align: center;">Category</th>
          <th style="text-align: center;">Action</th>
            </tr>
        </tfoot>
    </table>
<script type="text/javascript">
  $('#example').DataTable();
</script>
</div>



</div>
                 



      <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

     
    </main>
  </div>
</div>

</body>
</html>


<?php

if(isset($_GET['id'])){
            include('../dbcon/connection.php');
          
             $id=$_GET['id'];
           
        
           $query= mysqli_query($con,"DELETE FROM user_post_news WHERE user_id= '$id'");
if($query==true)
{
  ?>
  
  
  <script type="text/javascript">
    alert('data deleted')
    window.location.href='userpost.php';

  </script>
  <?php


}
else{
  ?>
  <script type="text/javascript">
    alert('error!!')
    window.location.href='userpost.php';
  </script>
  <?php
}
  

}

  ?>
