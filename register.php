<?php

@include 'config.php';

session_start();

if(isset($_POST['register'])){

    if(!isset($_POST['select_type'])){
        $message[] = 'Plaese select user type';
    }elseif(!isset($_POST['username'])){
        $message[] = 'Plaese enter Username';
    }elseif(!isset($_POST['email'])){
        $message[] = 'Plaese enter Email';
    }elseif(!isset($_POST['password'])){
        $message[] = 'Plaese enter Password';
    }else{
        $user_type = $_POST['select_type'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $placed_on = date('d-M-Y');


        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select_users) > 0){
            $message[] = 'user already exist!';
        }else{
                mysqli_query($conn, "INSERT INTO `users`(username,email,password,user_type,placed_on) VALUES('$username', '$email', '$password', '$user_type', '$placed_on')") or die(mysqli_error($conn));
                $message[] = 'Login successfully!';
                header("location:login.php");
                
        }
    }

    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>

<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<section class="images">
    <img src="images/gradient.png" class="img1">
    <img src="images/gradient.png" class="img2">
</section>

<section class="content">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            
            <div class="row">
                <div class="back">
                    <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
                </div>
                <div class="row1">
                    <div class="logo">
                        <img src="images/logo_k.png">
                    </div>
                    <div class="description">
                        <h1>Fast and free registration</h1>

                        <p>Register now for free and start immediately with your music analyses.</p>

                        <h1>Better understand & communicate music</h1>

                        <p>With MOODWAVE you can make important music decisions faster and communicate them more easily.</p>
                    </div>
                </div>
            </div>
            
            <div class="row2">
               <div class="title">
                  <h1>Register</h1>
               </div>
               <div class="radio-btn" style="display:flex;align-items:center" >
                    <input type="radio" id="Listener" name="select_type" value="Listener" style="width:20px">
                    <label for="Listener">Listener</label>
                    <input type="radio" id="Creator" name="select_type" value="Creator" style="width:20px;margin-left:30px">
                    <label for="Creator">Creator</label>
                </div>
               <div class="input-container">
                    <label for="" >Username</label><br>
                    <input type="text" name="username" class="input" />
                </div>
               <div class="input-container">
                    <label for="" >Email</label><br>
                    <input type="text" name="email" class="input" />
                </div>
               <div class="input-container">
                    <label for="" >Password</label><br>
                    <input type="password" name="password" class="input" />
                </div>

    
               <div class="buttons">
                     <input type="submit" name="register" value="REGISTER" class="button">
               </div>

               <div class="last_text">
                    <p>You already have an account? <a href="login.php">Login</a>
                </div>
            </div>
        </div>
        
    </form>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>