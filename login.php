<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link rel="stylesheet" href="loginstyle.css"/>
</head>

<body>

    <div class="main">

       <?php include 'connection.php' ?>

       <?php 
          
          $showError = "false";
 
          if($_SERVER["REQUEST_METHOD"] == "POST"){
 
              $email = $_POST['email'];
              $password = $_POST['password'];
              
                 $sql = "SELECT * FROM `signup` WHERE user_email = '$email' AND user_pass = '$password' ";
                 $result = mysqli_query($conn,$sql);
                 $num = mysqli_num_rows($result);
 
              if($num==1){
 
                 $row = mysqli_fetch_assoc($result) ;
                 //echo $row;
                 if($num==1) {
                    
                     echo 'LogIn sucessful!!!';
                 } 
                 
             }else{
             echo 'Login failed!!!';
            }
             
          }
         
 
     ?>
    
        <div class="register" id="signupPage">
            <h2>Login Here</h2>
            <form id="register" method="post" action="login.php">
                <label>Email <ion-icon name="mail-outline"></ion-icon></label>
                <br />
                <input type="email" name="email" id="mail" placeholder="Enter Your mail" required autocomplete="off" />
                <br /><br /><br/>
                <label>Password <ion-icon name="lock-closed-outline"></ion-icon></label>
                <br />
                <input type="password" id="password" name="password" placeholder="Confirm Password" required
                    autocomplete="off" />
                <br /><br />
                <a href="Forgotpassword.php" class="forgot">Forgot Password </a><br /><br/>
                <input type="submit" value="Login" id="submit" name="submit" /><br/>        
                <br /><br />
            </form>
        </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>