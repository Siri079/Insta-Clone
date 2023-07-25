<!-- <?php
   
//    $db_hostname="127.0.0.1";
//    $db_username="root";
//    $db_password="";
//    $db_name="insta";
//    $conn = mysqli_connect($db_hostname,$db_username,$db_password,$db_name);
//    if(!$conn){
//        echo "Connection falied : " .mysqli_connect_error();
//        exit;
//    }
//    $invaid=0;
//    $user=0;
//    $Username=$_POST['Username'];
//    $Password=$_POST['Password'];

//    $sql="SELECT * FROM signupdata WHERE Username='$Username' AND Password='$Password' ";
//    $result=mysqli_query($conn,$sql);
//    if(mysqli_num_rows($result)>0){
//        $login=1;
//        //echo "<a href='https://www.instagram.com/'>click here to go your account</a>";
//    }
//    else{
//      $invalid=1;
//    }
   
//    mysqli_close($conn);
// ?> -->

<?php
   $invalid=0;
   $login=0;
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'connection.php';
   $Username =$_POST['Username'];
   $Password =$_POST['Password'];
   $sql="SELECT * FROM signupdata WHERE Username='$Username' AND Password='$Password'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
       $login=1;
       session_start();
       $_SESSION['Username']=$Username;
       header('location:https://www.instagram.com/');
       
   }
   else{
      $invalid=1;
   }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Instagram</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
<script src="sign.js"></script>
    <?php
    
    if($invalid){
        echo '<script>swal("Invalid username or password!");</script>';
    }
    ?>
    <div class="container">
        
        <div class="info">
            <h1>Instagram</h1>
            <form method="post" action="login.php">
                <div class="input">                
                    <input type="text" id="username" name="Username" placeholder="Username" required><br>
                </div>
                <div class="input">               
                    <input type="password" id="pwd" name="Password" placeholder="Password" required><br>
                </div>
                <button type="submit" class="submitbutton">Login</button>
            </form>
            <P>__________ OR __________</P>
            
            
            <P class="fb"> <a  href="https://www.facebook.com/"  style="text-decoration: none;">  Log in with facebook</a></P>
            <P class="pwd"><a  href="Reset Form.html" style="text-decoration: none;">Forgot password?</a></P>
                   
        </div>
        <div class="info1">
            <p >Don't have an account? <a class="submitbtn" href="sign.php" style="text-decoration: none;">SignUp </a></p>
        </div>
        <p> Get the app.</p>
        <img class="images" alt="Download from the App Store" class="Rt8TI " src="icons1.jpg">
        
        <img  class="image" alt="Get it on Google Play" class="Rt8TI " src="icons2.jpg">
    </div>
    
     

</body>
</html>