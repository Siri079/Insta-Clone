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
   
   $succes=0;
   $user=0;
   $Name =$_POST['Name'];
   $Email =$_POST['Email'];
   $Username =$_POST['Username'];
   $Password =$_POST['Password'];
   $sql="SELECT * FROM signupdata WHERE Username='$Username'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
     // echo "user already exist";
     $user=1;
   }
   else{
    $sql="INSERT INTO signupdata VALUES('$Name','$Email','$Username','$Password')";
    $result=mysqli_query($conn,$sql);
    if(!$result){
        echo "Error!!: " .mysqli_error($conn);
        exit;
    }
    else{
        //echo "Account created succesfully";
        $succes=1; 
    }
   }
   mysqli_close($conn);
?>