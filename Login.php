<?php

@include 'config.php';

session_start();


if(isset($_POST['login'])){

   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'") or die('query failed');


    if(mysqli_num_rows($select_users) > 0){
       
       $row = mysqli_fetch_assoc($select_users);
 
       if($row['user_type'] == 'Listener'){
 
          $_SESSION['user_name'] = $row['username'];
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_id'] = $row['user_id'];

          header('location:job.php');
 
       }elseif($row['user_type'] == 'Creator'){
 
          $_SESSION['user_name'] = $row['username'];
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_id'] = $row['user_id'];

         $tid= $_SESSION['user_id'];
          header("location:creator_main.php");
 
       }else{
          $message[] = 'no user found!';
       }
 
    }else{
       $message[] = 'incorrect email or password!';
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/Login.css" />
   
    

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body id="swup" class="transition-fade">

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
      <img  src="images/Shadow.png" alt="" id="card_image1" >
    <!-- partial:index.partial.html -->

   
        <img  src="images/Shadow.png" alt="" id="card_image2" >
      <!-- partial:index.partial.html -->
  
  
      
      <div class="container_card_Login">
          <div class="Login_card" >
            <div ><img src="images/Login_text.png" alt="" class="Mood_text" ></div>


          
          </div>
     
  
          <div class="registerform_login" >
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row2">
                    <a onclick="history.back()"><i class="fas fa-arrow-left" id="icon"></i></a><br><br>
                      <div class="title">
                        
                         <h1>Welcome Back!</h1>
                      </div>
                       <br>
                       <div class="input-container_register">
                        <label for="" >Username</label><br>
                        <input type="text" name="username" class="input_text" required placeholder="Ex:Michel" />
                    </div>
                    <div class="input-container_register">
                      <label for="password">Password</label><br>
                      <div class="password-input">
                          <input type="password" id="password" name="password" required class="input_text" placeholder="Ex:Vaz342#" />
                          <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                      </div>
                  </div>
       
           
                               
                    <div >
                      <button class="Side_button_register" name="login">Let's Start</button>
                      
                </div>
 <br>
                <div class="last_text">
                    <i><p>You don't have an account yet?  <a href="register.php">Register</a></i> 
                 </div>
                   </div>
               </div>
               
           </form>
                  
              </form>
          </div>

          <script src="https://unpkg.com/swup@4"></script>
          <script src="JS/Script.js"></script>
          <script>
            const swup = new Swup();
          </script>
          
          <script>
            function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var toggleIcon = document.querySelector(".toggle-password");
          
            if (passwordInput.type === "password") {
              passwordInput.type = "text";
              toggleIcon.style.backgroundImage = "url('images/open-eye.png')"; 
            } else {
              passwordInput.type = "password";
              toggleIcon.style.backgroundImage = "url('images/close-eye (1).png')";
            }
          }
          
          </script>


</html>
