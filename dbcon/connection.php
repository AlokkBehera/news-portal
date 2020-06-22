<?php

$servername="localhost";
$username="root";
$password="";
$databasename="news_application";

$con=mysqli_connect($servername,$username,$password,$databasename);

if($con==false){
	die("could not connect");
}
/*else{
	echo "connection done";
}*/





  ?>