<?php

@include 'config.php';

session_start();

if(isset($_POST['register'])){

    if(!isset($_POST['select_type'])){
        $message[] = 'Plaese select user type';
    }elseif($_POST['username']==""){
        $message[] = 'Plaese enter Username';
    }elseif($_POST['email']==""){
        $message[] = 'Plaese enter Email';
    }elseif($_POST['password']==""){
        $message[] = 'Plaese enter Password';
    }else{
        $user_type = $_POST['select_type'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        // $filter_pass = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
        // $password = mysqli_real_escape_string($conn, md5($filter_pass));


        $placed_on = date('d-M-Y');


        $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

        if(mysqli_num_rows($select_users) > 0){
            $message[] = 'user already exist!';
        }else{
                mysqli_query($conn, "INSERT INTO `users`(username,email,password,user_type,placed_on) VALUES('$username', '$email', '$password', '$user_type', '$placed_on')") or die(mysqli_error($conn));
                $message[] = 'Login successfully!';
                //header("location:Login.php");
                echo "<script> window.location.href='Login.php'</script>";
                
        }
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
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/register.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

   
    

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
  <div class="about">
    <div class="About_header">
        <ul>
            <li><a onclick="history.back()"><i class="fas fa-arrow-left" id="Back_register"></i></a></li>
            <li ></li>
        </ul>
    </div>
      <img  src="images/Shadow.png" alt="" id="card_image" >
    <!-- partial:index.partial.html -->


    
    <div class="container_card_register">
        <div class="card_What_Mood">
          <img src="images/Logo.png" alt="" id="moodvave_logo" /><br><br>


          <p class="subtitle">
            <h3>Fast and free registration !</h3><br><br>
            Register now for free and start immediately with your music analyses.<br><br>
            <h3>Better understand & communicate music</h3><br>
            With MOODWAVE you can make important music decisions faster and communicate them more easily.
          </p>
        </div>

        <div class="registerform" >
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row2">
                    <div class="title">
                       
                    </div>
                    <div class="radio-btn">
                         <input type="radio" id="Listener" name="select_type" value="Listener"  >
                         <label for="Listener">Listener</label>
                         <input type="radio" id="Creator" name="select_type" value="Creator">
                         <label for="Creator">Creator</label>
                     </div>
                     <br>
                    <div class="input-container_register">
                         <label for="" >Username</label><br>
                         <input type="text" name="username" class="input_text" placeholder="Ex:Michel" required/>
                     </div>
                    <div class="input-container_register">
                         <label for="" >Email</label><br>
                         <input type="text" name="email" class="input_text" placeholder="Ex:MichelVaz@gmail.com" required/>
                     </div>
                     <div class="input-container_register">
                      <label for="password">Password</label><br>
                      <div class="password-input">
                          <input type="password" id="password" name="password" class="input_text" placeholder="Ex:Vaz342#" required/>
                          <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                      </div>
                  </div>
                     </div>
     
         
                    <div >
                          <input type="submit" name="register" value="REGISTER" class="Side_button_register" style="border-radius: 10px;margin: 0;height: 40px;">
                    </div>
     <br>
                    <div class="last_text">
                        <i><p>You already have an account? <a id="loginLink" href="#">Login</a></i> 
                     </div>
                 </div>
             </div>
             
         </form>
                
            </form>
        </div>

        <button class="chatbot-toggler">
        <span class="material-symbols-outlined">mode_comment</span>
        <span class="material-symbols-outlined">close</span>
    </button>
    <div class="chatbot">
        <header>
            <h2>Moody</h2>
            <span class="close-btn material-symbols-outlined">close</span>
        </header>
        <ul class="chatbox">
            <li class="chat incoming">
                <span class="material-symbols-outlined">smart_toy</span>
                <p>Hi there 🖐️ <br> How can I help you today?</p>
            </li>
            
        </ul>
        <div class="chat-input">
            <textarea name="" id="" cols="20" rows="2" placeholder='Enter a message...'></textarea>
            <span id="send-btn" class="material-symbols-outlined">send</span>
        </div>
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
<script>
            document.getElementById("loginLink").addEventListener("click", function(event) {
                event.preventDefault(); // Prevent default link behavior (i.e., navigating to href)
                window.location.href = 'Login.php'; // Redirect to register.php
            });
          </script>

</html>
