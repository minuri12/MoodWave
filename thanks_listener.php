<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
  //header('location:Login.php');
  echo "<script> window.location.href='Login.php'</script>";
};
if(isset($_POST['logout'])){

 session_unset();
 session_destroy();

 //header('location:index.php');
 echo "<script> window.location.href='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Thanks</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom admin css file link  -->
   <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/thanks.css" />

</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">   
    <!--Navigation bar start-->
    <center>
      <section class="navigation_section">
        <nav class="Navigation_Bar">
          <ul>
            <li><a id="index" href="#"><img src="images/Logo.png" alt="MoodWave_logo"/></a></li>
            <li class="features"><a id="Need_Help" href="#">HELP</a></li>
            <li><a id="Withdraw" href="#" class="ABOUT transition-fade">WITHDRAW</a></li>
            <li>
              <button name="logout">Logout</button>
            </li>
          </ul>
        </nav>
      </section>
    </center>

    <!--Navigation bar end-->

    <section class="thanks" >
        <div class="image">
            
          <div class="container_card" >
            <div class="card_What_Mood"  >
              <img src="Images/Complete1.png" alt="" style="width: 60px;">
           <br><br>
              <p class="subtitle" style="text-align: center;">
                <h1>Thank you for placing an Withdraw !</h1><br>
                Your money will be taken out of your account as soon as your information are confirmed.
                
                <div ><br>
                  <button class="Side_button_register" name="login"><a href="creator_main.php">Home</a></button>
                  
            </div>
                
            <img  src="images/Shadow.png" alt="" id="card_image_about2" >
                
              </p>
            </div>
            
        
    </div>
</section>
<script src="JS/vanilla-tilt.min.js"></script>
        <script src="JS/Script.js"></script>
        <script>
      document.getElementById("Withdraw").addEventListener("click", function(event) {
      event.preventDefault(); 
      window.location.href = 'Withdraw.php';
      });
      document.getElementById("Need_Help").addEventListener("click", function(event) {
      event.preventDefault(); 
      window.location.href = 'Need_Help.php';
      });
      document.getElementById("index").addEventListener("click", function(event) {
      event.preventDefault(); 
      window.location.href = 'index.php';
      });
    </script>

</body>
</html>