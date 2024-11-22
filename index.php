<?php
if(isset($_POST['register'])){
  //header('location:register.php'); 
  echo "<script> window.location.href='register.php'</script>";
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Landing.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body bgcolor="#0C070F"  id="swup" class="transition-fade"></main>>

      <!--PreLoad start-->
      <div id="preloader"></div>
      <!--PreLoad End-->
      

    <!--Navigation bar start-->
    <center>

      <form action="" method="POST" enctype="multipart/form-data">
      <section class="navigation_section">

        <nav class="Navigation_Bar">
          <ul>
            <li><a href="index.php"><img src="images/Logo.png" alt="MoodWave_logo" /></a></li>
            <li class="features"><a href="#test">FEATURES</a></li>
            <li><a id="About_us" href="#" class="ABOUT transition-fade" >ABOUT US</a></li>
            <li><button name="register">Join</button></li>
          </ul>
        </nav>
    </section>
    </center>
    <!--Navigation bar end-->


    <center>

      <!--Main image start-->
      <img  src="images/Shadow.png" alt="" class="card_image_MoodWave" >
      <section class="Land">
        <div class="icon_head">
          <img src="images/Icon_head.png" alt="Play_icon" />
        </div>
        <div class="Main_topic_mood">MOODWAVE</div><br>
        <!--Scroll start-->
        <Div class="scroll1" ></Div>
    <Div class="scroll2" ></Div>
<!--scroll end-->
        <br><br><br>

        <!--Main image end-->

<!-- card start-->
  <div class="head_Why" id="test" data-aos="zoom-in" >Why Use MoodWave?</div><br>
  <div class="spacer"></div>
        <div class="container">
          <div class="card" data-aos="zoom-in-right" data-aos-duration="1500">
            <div class="content">
              <h2>🎧</h2>
              <h3>MUSIC + AI</h3>
            
              <ul>
                <li>
                  Music creators can upload their compositions to our platform and
                  leverage a user-friendly feature that analyzes and identifies the
                  emotional nuances embedded their music or songs.
                </li>
              </ul>
              
            </div>
          </div>
          
          <div class="card" data-aos="zoom-in" data-aos-duration="1500">
            <div class="content">
              <h2>🎼</h2>
              <h3>TASKS</h3>
    
              <ul>
                <li>
                  Music creators have the ability to generate a task for listeners, wherein they can request an analysis of the emotions in their music by engaging the perspectives of actual listeners.
                </li>
              </ul>
            </div>
          </div>
          
          <div class="card"  data-aos="zoom-in-left" data-aos-duration="1500">
            <div class="content">
              <h2>🎙️</h2>
              <h3>PAYMENTS</h3>
    
              <ul>
                <li>
                  The creators of the Music pay for  listeners based on the they assigned tasks, ensuring a fair and rewarding exchange for their valuable input on emotion analysis.
                </li>
              </ul>
              
            </div>
            
          </div>
          <img  src="images/Shadow.png" alt="" class="card_image2">

          <br>

<!-- card end-->

<!--why MoodWave start-->
<div>
  <div class="How" data-aos="zoom-in">How It Works ?</div>
  <img src="images/Card.png" class="how_work" data-aos="fade-up"
  data-aos-duration="2000">
</div>


<!--why MoodWave End-->

  <img  src="images/Shadow.png" alt="" class="card_image2" >

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



<!-- Footer start-->
<div class="container_footer">

  <footer> 
    <div class="Icon_bar">
    <a href="#"></a><i class="fab fa-facebook-square"></i></a>
  <a href="#"></a><i class="fab fa-instagram"></i></a>
  <a href="#"></a><i class="fab fa-twitter"></i></a>

  </div>
  </footer>
</div>
<div class="box">Copyright | FOC - SUSL</div>
<!-- Footer end-->
</section>

 <script src="JS/vanilla-tilt.min.js"></script>
<script src="JS/Script.js"></script>
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
</script>



      </section>
    </center>
  </body>
</html>
