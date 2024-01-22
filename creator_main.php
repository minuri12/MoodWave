<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    header('location:index.php');
}

if(isset($_POST['projects'])){

    header('location:Create_Project.php');
}
if(isset($_POST['jobs'])){

    header('location:Create_New_Job.php');
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
    <link rel="stylesheet" href="css/glass-menu.css" />

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
          <li><a href="index.php"><img src="images/Logo.png" alt="MoodWave_logo" /></a></li>
          <li class="features"><a href="#">HELP</a></li>
          <li><a href="#" class="ABOUT">ABOUT US</a></li>
          <li><form method="POST"><input type="submit" name="logout" class="logout" value="LOG OUT"></form></li>
        </ul>
      </nav>
    </section>
    <!-- Navigation bar end -->

    <section class="Land">
      <div class="Main_topic_sides">Let The Waves of Emotion Begin!</div>
      <div class="Small_topic_sides">
        They can analyze the emotions by using projects. First, they need to
        create a project.Select the type of the project .Click the Submit button
        to analyze the music.Click the Job button.Add the Job Details and the
        music or song.<br /><br />
        <img src="images/dots.png" alt="" />
      </div>
      <div class="button_holder">
      <li style="list-style-type: none;"><form method="POST"><input type="submit" name="projects" class="Middle_button" value="PROJECTS"></form></li>
      <li style="list-style-type: none;"><form method="POST"><input type="submit" name="jobs" class="Middle_button" value="JOBS"></form></li>
      </div>

      <div class="description">
        <div class="sub_topic_sides">
          Feel the waves of emotion, ride the MOODWAVE!
        </div>
      </div>
      <br /><br />
      <div class="grit_card_section">
        <div class="card_section">
          <p style="padding-bottom: 20px">
            <b style="font-size: 25px">MUSIC + AI</b><br />
            Music creators can upload their compositions to our platform and
            leverage a user-friendly feature.
          </p>

          <img src="images/Desktop.png" alt="" style="padding: 0" />
        </div>
        <div class="card_section">
          <p style="padding-top: 5px; padding-bottom: 5px">
            <b style="font-size: 25px">TASKS</b><br />
            Music creators have the ability to generate a task for listeners,
            wherein they can request an analysis of the emotions in their music
            by engaging the perspectives of actual listeners.

            <img src="images/Complete.png" alt="" style="padding: 0" />
          </p>
        </div>
      </div>
      <div class="grit_card_section">
        <div class="card_section">
          <img src="images/Payment.png" alt="" style="padding: 0" />
          <h2>Payment</h2>
          <p style="text-align: center">
            The creators of the Music pay for listeners based on the they
            assigned tasks, ensuring a fair and rewarding exchange for their
            valuable input on emotion analysis.
          </p>
        </div>
        <div class="card_section">
          <img src="images/Withdraw.png" alt="" style="padding: 0" />
          <h2>Withdraw</h2>
          <p style="text-align: center">
            At MOODWAVE, we value your contributions and believe in rewarding
            your efforts. It is provide a way to easily withdraw the money by
            using different methods.
          </p>
        </div>
        <div class="card_section">
          <img src="images/Analysis.png" alt="" style="padding: 0" />
          <h2>Analysis</h2>
          <p style="text-align: center">
            At MOODWAVE, we've integrated advanced emotion analysis tools to
            provide you with a comprehensive understanding of the emotional
            content within your music.
          </p>
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

    <script src="/JS/vanilla-tilt.min.js"></script>
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
