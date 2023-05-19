<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
   
    <?php include 'connection.php' ?>
    <?php
    
       $showError=false;
       $showAlert=false;
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
           
            $username = $_POST["email"];
            $password = $_POST["password"];
            $cpassword = $_POST["cpassword"];
            $name=$_POST["fname"];
            $phone=$_POST["phone"];
            $exists=false;
            
            if(($password == $cpassword) && $exists==false){
                //echo "enteres";
                $sql = "INSERT INTO `signup` ( `user_email`, `user_pass`,`user_name`,`phone`) VALUES ('$username', '$password','$name','$phone')";
                $result = mysqli_query($conn, $sql);
                if ($result){
                    $showAlert = true;
                }
            }
            else{
                $showError = "Passwords do not match";
            }
        }
    
    ?>
    <div class="main">

        <div class="register" id="signupPage">
            <h2>Register Here</h2>
            <form id="register" method="post" action="index1.php"> 
                <label>Name</label>
                <br />
                <input type="text" name="fname" id="fname" placeholder="Enter your First name" required
                    autocomplete="off">
                <br /><br /> 
                <label>Email <ion-icon name="mail-outline"></ion-icon></label>
                <br />
                <input type="email" name="email" id="mail" placeholder="Enter Your mail" required autocomplete="off" />
                <br /><br />
                <label>Mobile <ion-icon name="call-outline"></ion-icon></label>
                <br />
                <input type="tel" id="phone" name="phone" placeholder="1234567890" required autocomplete="off" />
                <br /><br />
                <label>Password <ion-icon name="lock-closed-outline"></ion-icon></label>
                <br />
                <input type="password" id="password" name="password" placeholder="Password" required
                    autocomplete="off" />
                <br /><br />
                <label>Confirm Password  <ion-icon name="lock-closed-outline"></ion-icon></label>
                <br />
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required
                    autocomplete="off" />
                <br /><br />

                <br />
                <input type="submit" value="Register" id="submit" name="submit" />
                <br /><br />
                <p>Already Registered <a href="login.php" class="log">Login </a>here</p>
            </form>
        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>