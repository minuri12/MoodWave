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


if(isset($_POST['track_start'])){
    if($_POST['project_name']==""){
        $message[] = 'Enter Project Name';
       
    }else{
        $project_name=$_POST['project_name'];
        //header("location:track_mood_analysis.php?project_name=$project_name");
        echo "<script> window.location.href='track_mood_analysis.php?project_name=$project_name'</script>";
    }

    
    
}
if(isset($_POST['dynamic_start'])){

  if($_POST['project_name']==""){
      $message[] = 'Enter Project Name';
     
  }else{
      $project_name=$_POST['project_name'];
      //header("location:dynamic_emotion_analysis.php?project_name=$project_name");
      echo "<script> window.location.href='dynamic_emotion_analysis.php?project_name=$project_name'</script>";
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/Create_Project.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body  id="swup"
  class="transition-fade" >
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
<form action="" method="POST" enctype="multipart/form-data">
        <!--Navigation bar start-->
        <center>
          <section class="navigation_section">
            <nav class="Navigation_Bar">
              <ul>
              <li><a id="index" href="#"><img src="images/Logo.png" alt="MoodWave_logo"/></a></li>
              <li class="features"><a id="Need_Help" href="#">HELP</a></li>
              <li><a id="About_us" href="#" class="ABOUT transition-fade" >ABOUT US</a></li>
                <li>
                  <button name="logout">Logout</button>
                </li>
              </ul>
            </nav>
          </section>
        </center>
    
        <!--Navigation bar end-->
        <br /><br /><br />
    <section >
      <div class="Main_topic_sides">
        LET'S START HERE !</div><br>
        <center>
          <div class="create_job_form-field" >
            
            <input type="text" id="create_job_inputField" name="project_name" class="create_job_input-field" placeholder="Type your project name here..."  style="padding: 10px;text-align: center;"/>
        </div>
        </center>

      
      <div class="grit_card_section_create">
        <div class="card_section_project">
          <h2 >Track Mood</h2><br>
          <p >
            Compare multiple tracks and find the best one for the emotion.
          </p>
          <br>
          <!-- <div  class="icon-container"><button name="track_start"><i class="fa-solid fa-circle-play"></i></button></div> -->
          <div  class="icon-container"><button name="track_start" style="background: transparent; border: none;"><i class="fa-solid fa-circle-play"></i></button></div>
        </div>
        <div class="card_section_project">
          <h2 >Dynamic Emotion </h2><br>
          <p >
            Upload any audio and get a second-by-second emotion analysis.
          </p>
          <br>
          <!-- <div  class="icon-container"><a href="dynamic_emotion_analysis.html" ><i class="fa-solid fa-circle-play"></i></a></div> -->
          <!-- <div  class="icon-container"><button name="dynamic_start" ><i class="fa-solid fa-circle-play"></i></button></div> -->
          <div  class="icon-container"><button name="dynamic_start" style="background: transparent; border: none;"><i class="fa-solid fa-circle-play"></i></button></form></div>
        </div>
        <img  src="images/Shadow.png" alt="" class="card_image">
       

        </div>
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

        <script src="JS/vanilla-tilt.min.js"></script>
    <script src="JS/Script.js"></script>
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 1,
      });
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>

    <!--Loader script end-->
    <script src="https://unpkg.com/swup@4"></script>
    <script>
      const swup = new Swup();
    </script>
    <script>
      document.getElementById("About_us").addEventListener("click", function(event) {
      event.preventDefault(); 
      window.location.href = 'About_us.php';
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
