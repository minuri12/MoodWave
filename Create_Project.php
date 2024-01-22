
<?php

@include 'config.php';

session_start();


$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    header('location:index.php');
}



if(isset($_POST['track_start'])){
    if($_POST['project_name']==""){
        $message[] = 'Enter Project Name';
       
    }else{
        $project_name=$_POST['project_name'];
        header("location:Track Mood Analysis.php?project_name=$project_name");
    }
    
}
if(isset($_POST['dynamic_start'])){

    if($_POST['project_name']==""){
        $message[] = 'Enter Project Name';
       
    }else{
        $project_name=$_POST['project_name'];
        header("location:dynamic_emotion_analysis.php?project_name=$project_name");
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
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    />

    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="cSS/glass-menu.css" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body bgcolor="#0C070F">
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
    <!-- Navigation bar start -->
    <section class="navigation_section">
      <nav class="Navigation_Bar">
        <ul>
          <li><img src="images/Logo.png" alt="MoodWave_logo" /></li>
          <li class="features"><a href="#">HELP</a></li>
          <li><a href="#" class="ABOUT">ABOUT US</a></li>
          <li><button>Log Out</button></li>
        </ul>
      </nav>
    </section>
    <!-- Navigation bar end -->
  <form action="" method="POST" enctype="multipart/form-data">
    <section class="Land">
      <div class="Main_topic_sides">
        LET’S START ANALYSIS!<br />
        <input
          type="text"
          name="project_name" 
          class="Project_name"
          placeholder="Enter Your Project Name Here.."
        />
      </div>

      <br /><br />
      <div class="grit_card_section_create">
        <div class="card_section">
          <h2>Track Mood Analysis</h2>
          <p style="text-align: center">
            Compare multiple tracks and find the best one for the emotion you
            want to represent.
          </p>
          <div class="button_holder">
            <input type="submit" name="track_start" value="START" class="Middle_button_start">
            <!-- <button class="Middle_button_start">START</button> -->
          </div>
        </div>

        <div class="card_section">
          <h2>Dynamic Emotion Analysis</h2>
          <p style="text-align: center">
            Upload any audio and get a second-by-second emotion analysis.
          </p>
          <div class="button_holder">
            <!-- <button class="Middle_button_start">START</button> -->
            <input type="submit" name="dynamic_start" value="START" class="Middle_button_start">
          </div>
        </div>
      </div>
      <br /><br />

      <footer style="position: relative; bottom: 0">
        <div class="Icon_bar">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
        </div>
        <div class="box" style="text-align: center; margin-top: 20px">
          Copyright | FOC - SUSL
        </div>
      </footer>
    </section>
</form>

    <script src="JS/vanilla-tilt.min.js"></script>
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 1,
      });
    </script>
  </body>
</html>
