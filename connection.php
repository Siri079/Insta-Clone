<?php
  $db_hostname="127.0.0.1";
  $db_username="root";
  $db_password="";
  $db_name="insta";
  $conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);

  if(!$conn){
    echo "Connection falied : " .mysqli_connect_error();
    exit;
  }
  
?>
