

<?php

include('userheader.php')
 ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="../admin/assets/css/newstable.css">

<body style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');  background-repeat: no-repeat; background-size: cover;">

<div class="container">
              <div class="row">
                <div class="col-xs-12 ">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home ?id=<?php echo $row['id'];?>" role="tab" aria-controls="nav-home" aria-selected="true">Latest news</a>
                     
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
          <th style="text-align: center;">status</th>
         
         
        </tr>
      </thead>

       <?php 
            include('../dbcon/connection.php');

 $email=$_SESSION["user_email_id"];
         


            $query=mysqli_query($con,"select user_post_news.user_id,user_post_news.news_title,user_post_news.news_description,user_post_news.image,user_post_news.news_date,user_post_news.user_email, admin_table.category from user_post_news INNER JOIN admin_table ON user_post_news.category=admin_table.id && user_post_news.user_status=0 && user_post_news.user_type= 'U' && user_post_news.user_email='$email' order by user_post_news.user_id  DESC");



             
                    
      ?>
      <tbody>
        <?php
               while ($row=mysqli_fetch_assoc($query)) {
          ?>
        <tr>
          <td style="text-align: center;"><img src="userimg/<?php echo $row['image'];?>"
          width="" alt="candidates'photo"></td>

          <td style="text-align: center;"><div class="text-center"></div></i><?php echo $row['news_title'];  ?></td>
          <td style="text-align: center;"><?php echo $row['news_description'];  ?></td>
          <?php
        $date=new DateTime($row['news_date']);
        $dt=$date->format('d-m-yy');
        ?>
          <td style="text-align: center;"><?php echo $dt;  ?></td>
         
             
          <td style="text-align: center;">
              <?php echo   $row['category'];  ?>
        
  
           <td style="text-align: center;"><?php echo "PENDING";?></td>
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
           <th style="text-align: center;">status</th>
         
            </tr>
        </tfoot>
    </table>
<script type="text/javascript">
  $('#example').DataTable();
</script>
</div>



</div>
                 



    
  </div>
</div>

</body>
</html>



















  












       