<<<<<<< Updated upstream
=======

>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
?>

<!DOCTYPE html>
=======
?><!DOCTYPE html>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />
=======

    <link rel="stylesheet" href="/CSS/glass-menu.css" />
    <link rel="stylesheet" href="CSS/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/register.css" />

>>>>>>> Stashed changes
   
    

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
<<<<<<< Updated upstream
  <body style="margin: 0; padding: 0; height: 100%; display: flex; flex-direction: column;">
=======
  <body id="swup" class="transition-fade">
>>>>>>> Stashed changes
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

<<<<<<< Updated upstream
  <div class="about">
    <div class="About_header">
        <ul>
            <li><i class="fas fa-arrow-left" style="color: aliceblue;"></i></li>
            <li ></li>
        </ul>
    </div>
      <img  src="images/Shadow.png" alt="" class="card_image" style="width:700px ;z-index: -1; height: 500px;">
=======

  <div class="about">
    <div class="About_header">
        <ul>
            <li><a onclick="history.back()"><i class="fas fa-arrow-left" id="Back_register"></i></a></li>
            <li ></li>
        </ul>
    </div>
      <img  src="images/Shadow.png" alt="" id="card_image" >
>>>>>>> Stashed changes
    <!-- partial:index.partial.html -->


    
    <div class="container_card_register">
<<<<<<< Updated upstream
        <div class="card_What_Mood" style="min-height: 400px; width: 400px; margin-right: 50px; ">
          <img src="images/Logo.png" alt="" style="padding-top: 20px;" />


          <p class="subtitle">
            <h3>Fast and free registration</h3><br><br>
=======
        <div class="card_What_Mood">
          <img src="images/Logo.png" alt="" id="moodvave_logo" /><br><br>


          <p class="subtitle">
            <h3>Fast and free registration !</h3><br><br>
>>>>>>> Stashed changes
            Register now for free and start immediately with your music analyses.<br><br>
            <h3>Better understand & communicate music</h3><br>
            With MOODWAVE you can make important music decisions faster and communicate them more easily.
          </p>
        </div>

<<<<<<< Updated upstream
        <div class="registerform" style="margin-top: 0px">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="row2">
                    <div class="title">
                       <h1>It's take only few Minutes!</h1>
                    </div>
                    <div class="radio-btn" style="display:flex;align-items:center" >
                         <input type="radio" id="Listener" name="select_type" value="Listener" style="margin-right:10px;" >
                         <label for="Listener">Listener</label>
                         <input type="radio" id="Creator" name="select_type" value="Creator" style="margin-left:30px;margin-right:10px;">
                         <label for="Creator">Creator</label>
                     </div>
                     <br>
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
     
         
                    <div >
                          <input type="submit" name="register" value="REGISTER" class="Middle_button_start" style="border-radius: 10px;margin: 0;height: 40px;">
                    </div>
     <br>
                    <div class="last_text">
                         <p>You already have an account? <a href="login.php">Login</a>
=======
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
                         <input type="text" name="username" class="input_text" placeholder="Ex:Michel" />
                     </div>
                    <div class="input-container_register">
                         <label for="" >Email</label><br>
                         <input type="text" name="email" class="input_text" placeholder="Ex:MichelVaz@gmail.com" />
                     </div>
                     <div class="input-container_register">
                      <label for="password">Password</label><br>
                      <div class="password-input">
                          <input type="password" id="password" name="password" class="input_text" placeholder="Ex:Vaz342#" />
                          <span class="toggle-password" onclick="togglePasswordVisibility()"></span>
                      </div>
                  </div>
                     </div>
                     
         
                    <div >
                          <input type="submit" name="register" value="REGISTER" class="Side_button_register" style="border-radius: 10px;margin: 0;height: 40px;">
                    </div>
     <br>
                    <div class="last_text">
                        <i><p>You already have an account? <a href="Login.php">Login</a></i> 
>>>>>>> Stashed changes
                     </div>
                 </div>
             </div>
             
         </form>
<<<<<<< Updated upstream
                
=======
                        
>>>>>>> Stashed changes
            </form>
        </div>


<<<<<<< Updated upstream
=======
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
>>>>>>> Stashed changes

</html>
