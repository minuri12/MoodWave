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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body bgcolor="#0C070F">
   

    <!--Navigation bar start-->
    <section class="navigation_section">
        <nav class="Navigation_Bar">
          <ul>
            <li><a href="index.php"><img src="images/Logo.png" alt="MoodWave_logo" /></a></li>
            <li class="features"><a href="#test">FEATURES</a></li>
            <li><a href="About_us.php" class="ABOUT">ABOUT US</a></li>
            <li><button onclick="window.location.href = 'register.php'">Join</button></li>
          </ul>
        </nav>
    </section>
    <!--Navigation bar end-->


    <center>

      <!--Main image start-->
      <section class="Land">
        <div class="icon_head">
          <img src="images/Icon_head.png" alt="Play_icon" class="icon_set" />
        </div>
        <div class="Main_topic">MOODWAVE</div>
        <div class="arrow"><img src="images/Arrow.png" alt="arrow" /></div>
        <!--Main image end-->

<!-- card start-->
  <div class="head" id="test">Why Use MoodWave?</div>
        <div class="container">
          <div class="card">
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
          
          <div class="card">
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
          
          <div class="card">
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
          <img  src="images/Shadow.png" alt="" class="card_image" style="  left: 90px;top: -120px; z-index: -1;">


<!-- card end-->

<!--why MoodWave start-->
<div class="How">How It Works ?</div>
<img src="images/Card.png" class="how_work">
<!--why MoodWave End-->

  <img  src="images/Shadow.png" alt="" class="card_image" >
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



        <script>
          VanillaTilt.init(document.querySelectorAll(".card"), {
            max: 25,
            speed: 400,
            glare: true,
            "max-glare": 1,
          });
        </script>



      </section>
    </center>
  </body>
</html>
