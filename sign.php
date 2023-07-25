<?php
   $succes=0;
   $user=0;
   $invalid=0;
  if($_SERVER['REQUEST_METHOD']=='POST'){
     include 'connection.php';
     $Name =$_POST['Name'];
   $Email =$_POST['Email'];
   $Username =$_POST['Username'];
   $Password =$_POST['Password'];
   $Cpassword =$_POST['Cpassword'];
   $sql="SELECT * FROM signupdata WHERE Username='$Username'";
   $result=mysqli_query($conn,$sql);
   if(mysqli_num_rows($result)>0){
    // echo "user already exist";
     $user=1;
   }
   else{
    
    if($Password===$Cpassword){
    $sql="INSERT INTO signupdata VALUES('$Name','$Email','$Username','$Password')";
    $result=mysqli_query($conn,$sql);
    if($result){
        $succes=1;
        
    }
   }
    else{
        //echo "Account created succesfully";
        $invalid=1; 
    }
 
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp | Instagram</title>
    <link href="sign.css" rel="stylesheet">
</head>
<body>
    <script src="sign.js"></script>
    <?php
    if($invalid){
        echo '<script>swal("Password and Confirm Password doesnot match!");</script>';
    }
    if($succes){
        echo '<script >
        swal("Hurray!", "You have created your account succesfully !", "success");
    </script>';
    }
    if($user){
        echo '<script>swal("This username isnt available. Please try another.");</script>';
    }
    ?>

    <div class="container">
    <picture >
            <source media="(min-width:500px)" srcset="dp.png">
    </picture>
        <div class="signup">
            <h1>Instagram</h1>
            <p>Sign up to see photos and videos from your friends.</p>
            <!-- <P class="fb"><a  href="https://www.facebook.com/"  style="text-decoration: none;">Continue with facebook</a></P>
            <p>__________ OR __________</p> -->
            <form method="post" action="sign.php">
                <div class="input">                
                    <input type="text" id="name" name="Name" placeholder="Name" required><br>
                </div>
                <div class="input">                
                    <input type="text" id="email" name="Email" placeholder="Email" required><br>
                </div>
                <div class="input">                
                    <input type="text" id="username" name="Username" placeholder="Username" required><br>
                </div>
                <div class="input">               
                    <input type="password" id="pwd" name="Password" placeholder="Password" required><br>
                </div>
                <div class="input">               
                    <input type="password" id="pwd" name="Cpassword" placeholder="confirm-Password" required><br>
                </div>
                <p class="text"> People who use our service may have uploaded your contact information to Instagram. <strong>Learn more</strong></p>
                <p class="text"> By signing up, you agree to our Terms,<strong> Privacy Policy and Cookies Policy.</strong></p>
                <button type="submit" class="submitbutton">SignUp</button>
            </form>
        </div>
        <div class="login">
            <p >Have an account? <a class="submitbtn" href="login.php" style="text-decoration: none;">Login </a></p>
        </div>
        <p> Get the app.</p>
        <img class="images" alt="Download from the App Store" class="Rt8TI " src="icons1.jpg">
        
        <img  class="image" alt="Get it on Google Play" class="Rt8TI " src="icons2.jpg">


    </div>
    
</body>
</html>