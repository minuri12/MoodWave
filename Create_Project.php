<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
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


<<<<<<< Updated upstream

=======
>>>>>>> Stashed changes
if(isset($_POST['track_start'])){
    if($_POST['project_name']==""){
        $message[] = 'Enter Project Name';
       
    }else{
        $project_name=$_POST['project_name'];
<<<<<<< Updated upstream
        header("location:Track Mood Analysis.php?project_name=$project_name");
    }
=======
        header("location:track_mood_analysis.php?project_name=$project_name");
    }

    
>>>>>>> Stashed changes
    
}
if(isset($_POST['dynamic_start'])){

<<<<<<< Updated upstream
    if($_POST['project_name']==""){
        $message[] = 'Enter Project Name';
       
    }else{
        $project_name=$_POST['project_name'];
        header("location:dynamic_emotion_analysis.php?project_name=$project_name");
    }
    
}

?>

=======
  if($_POST['project_name']==""){
      $message[] = 'Enter Project Name';
     
  }else{
      $project_name=$_POST['project_name'];
      header("location:dynamic_emotion_analysis.php?project_name=$project_name");
  }
  
}

?>
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream

=======
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
>>>>>>> Stashed changes
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
<<<<<<< Updated upstream
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="cSS/glass-menu.css" />
=======

    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/Create_Project.css" />
>>>>>>> Stashed changes

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
<<<<<<< Updated upstream
  <body bgcolor="#0C070F">
  <?php
=======
  <body  id="swup"
  class="transition-fade" >
  <?php

>>>>>>> Stashed changes
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
=======
        <!--Navigation bar start-->
        <center>
          <section class="navigation_section">
            <nav class="Navigation_Bar">
              <ul>
                <li>
                  <a href="index.php"
                    ><img src="images/Logo.png" alt="MoodWave_logo"
                  /></a>
                </li>
                <li class="features"><a href="Need_Help.php">HELP</a></li>
                <li>
                  <a href="About_us.php" class="ABOUT transition-fade">ABOUT US</a>
                </li>
                <li>
                  <button name="logout">Logout</button>
                </li>
              </ul>
            </nav>
          </section>
        </center>
    
        <!--Navigation bar end-->
        <br /><br /><br />
        <form action="" method="POST" enctype="multipart/form-data">
    <section >
      <div class="Main_topic_sides">
        LET'S START HERE !</div><br>
        <center>
          <div class="create_job_form-field" >
            
            <input type="text" name="project_name" id="create_job_inputField" class="create_job_input-field" placeholder="Type your project name here..."  style="padding: 10px;text-align: center;"/>
        </div>
        </center>

      
      <div class="grit_card_section_create">
        <div class="card_section_project">
          <h2 >Track Mood</h2><br>
          <p >
            Compare multiple tracks and find the best one for the emotion.
          </p>
          <br>
          <div  class="icon-container"><button name="track_start"><i class="fa-solid fa-circle-play"></i></div>
        </div>
        <div class="card_section_project">
          <h2 >Dynamic Emotion </h2><br>
          <p >
            Upload any audio and get a second-by-second emotion analysis.
          </p>
          <br>
          <div  class="icon-container"><button name="dynamic_start" ><i class="fa-solid fa-circle-play"></i></div>
        </div>
        <img  src="images/Shadow.png" alt="" class="card_image">
       

        </div>
      </div>
      

        <script src="JS/vanilla-tilt.min.js"></script>
    <script src="JS/Script.js"></script>
>>>>>>> Stashed changes
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 1,
      });
    </script>
<<<<<<< Updated upstream
=======
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!--Loader script end-->
    <script src="https://unpkg.com/swup@4"></script>
    <script>
      const swup = new Swup();
    </script>
  

    
>>>>>>> Stashed changes
  </body>
</html>
