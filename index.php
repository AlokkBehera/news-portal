




 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="userhomepagecss.css">

<body   style="background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');  background-repeat: no-repeat; background-size: cover; background-image: fixed;">
>
<center >
<p><h1 style="color: gray;"><u>
Firstpost.</u></h1></p>
</center>








<table width="100%" style="position: fixed;">

<tr>
	<td colspan="4" bgcolor="#1BE5AA">

    <table width="100%">
    <tr>
    	<td height="100px" width="5%" ></td>
        <td><img src="user/userimg/download.png" width="100%" height="90px" alt="logo"></td>
        <td width="25%">
        <font color="#FFF">
        <h1>My News chanel</h1>
        </font>
        </td>
        <td width="57%">
       
        <table width="100%">
        <tr>
        	<td height="40px" align="right" >
            mob: +919583969406
            </td>
        </tr>
     
        </table>
        
        </td>
        <td width="5%"></td>
    </tr>
    </table>
   
    </td>




</tr>

</table>


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
<link rel="stylesheet" type="text/css" href="admin/assets/css/newstable.css">







  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4" style="top: 140px; margin-right: 100px; ">






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
         
         
        </tr>
      </thead>

       <?php 
            include('dbcon/connection.php');

         
            $query=mysqli_query($con,"select user_post_news.user_id,user_post_news.news_title,user_post_news.news_description,user_post_news.image,user_post_news.news_date,user_post_news.user_email, admin_table.category from user_post_news INNER JOIN admin_table ON user_post_news.category=admin_table.id && user_post_news.user_status= 1  order by user_post_news.user_id  DESC");

           

             
                    
      ?>
      <tbody>
        <?php
               while ($row=mysqli_fetch_assoc($query)) {
          ?>
        <tr>
          <td style="text-align: center;"><img src="user/userimg/<?php echo $row['image'];?>"
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







		   