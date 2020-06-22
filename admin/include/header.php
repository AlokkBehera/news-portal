
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
    <title>Dashboard Template · Bootstrap</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/dashboard/">

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="assets/css/dashboard.css" rel="stylesheet">

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <h5>
  <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">

  
    <?php
        include('../dbcon/connection.php');
        $id=$_SESSION["uid"];
        $query=mysqli_query($con,"select* from admin_login where id='$id' ");
           while ($row=mysqli_fetch_assoc($query)) {
           $email= $row['user_type']; 
            echo $email;
         }

         ?>
           
         </a> 
</h5>




 <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <a class="nav-link" href="logout.php">Sign out</a>
    </li>
  </ul>
</nav>

<div>
  <div>
    <nav class="col-md-1 d-none d-md-block bg-light sidebar">
      <div>
        <ul class="nav flex-column" style="background-color: white;">
         
           <li class="nav-item">
            <a class="nav-link <?php if($page=='category'){echo 'active';}?>" href="category.php">
              <span data-feather="users"></span>
              Categories
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link <?php if($page=='news'){echo 'active';}?>" href="news_details.php">
              <span data-feather="shopping-cart"></span>
              News
            </a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link <?php if($page=='userpost'){echo 'active';}?>" href="userpost.php">
              <span data-feather="shopping-cart"></span>
              Userpost
            </a>
          </li>
         
        </ul>
      </div>
    </nav>


        
        
        
    