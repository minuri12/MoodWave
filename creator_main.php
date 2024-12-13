<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   //header('location:Login.php');
   echo "<script> window.location.href='Login.php'</script>";
}


if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    //header('location:index.php');
    echo "<script> window.location.href='index.php'</script>";

}

if(isset($_POST['projects'])){

    //header('location:Create_Project.php');
    echo "<script> window.location.href='Create_Project.php'</script>";
}
if(isset($_POST['jobs'])){

    //header('location:Create_New_Job.php');
    echo "<script> window.location.href='Create_New_Job.php'</script>";

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
    <link rel="stylesheet" href="css/creator_main.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body id="swup" class="transition-fade" id="swup" class="transition-fade">
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

    <section class="creator_main">
      <div class="Main_topic_sides">Let The Waves of Emotion Begin!</div>
      <div class="Small_topic_sides">
        <br /><br />
        MoodWave can analyze the emotions by using projects. First, You need to
        create a project.Select the type of the project .Click the Submit button
        to analyze the music.Click the Job button.Add the Job Details and the
        music or song.<br /><br />
        <img src="images/dots.png" alt="" /><br />
      </div>
      <div class="button_holder">
        <div>
          <button class="middle_button_Creator_main" name="projects">PROJECTS</button>
          
        </div>
        <br />
        <div>
          <button class="middle_button_Creator_main" name="jobs">JOBS</button>
          
        </div>
      </div>

      <div class="description">
        <div
          class="sub_topic_sides"
          data-aos="zoom-in"
          data-aos-duration="1000"
        >
          Feel the waves of emotion, ride the MOODWAVE!
        </div>
      </div>

      <div class="grit_card_section">
        <div
          class="card_section"
          data-aos="fade-right"
          data-aos-offset="100"
          data-aos-easing="ease-in-sine"
        >
          <p>
            <b>MUSIC + AI</b><br />
            Music creators can upload their compositions to our platform and
            leverage a user-friendly feature.
          </p>

          <img src="images/Desktop.png" alt="" class="p1" />
        </div>
        <div
          class="card_section"
          data-aos="fade-left"
          data-aos-offset="100"
          data-aos-easing="ease-in-sine"
        >
          <p>
            <b>TASKS</b><br />
            Music creators have the ability to generate a task for listeners,
            wherein they can request an analysis of the emotions in their music
            by engaging the perspectives of actual listeners.

            <img src="images/Complete.png" alt="" class="p1"/>
          </p>
        </div>
      </div>
      <div class="grit_card_section">
        <div
          class="card_section"
          data-aos="fade-right"
          data-aos-offset="200"
          data-aos-easing="ease-in-sine"
          data-aos-duration="600"
        >
          <img src="images/Payment.png" alt="" />
          <h2>Payment</h2>
          <p style="text-align: center">
            The creators of the Music pay for listeners based on the they
            assigned tasks, ensuring a fair and rewarding exchange for their
            valuable input on emotion analysis.
          </p>
        </div>
        <div
          class="card_section"
          data-aos="zoom-in-up"
          data-aos-offset="200"
          data-aos-easing="ease-in-sine"
          data-aos-duration="800"
        >
          <img src="images/Withdraw.png" alt="" />
          <h2>Withdraw</h2>
          <p id="box21">
            At MOODWAVE, we value your contributions and believe in rewarding
            your efforts. It is provide a way to easily withdraw the money by
            using different methods.
          </p>
        </div>
        <div
          class="card_section"
          data-aos="fade-left"
          data-aos-offset="200"
          data-aos-easing="ease-in-sine"
          data-aos-duration="600"
        >
          <img src="images/Analysis.png" alt=""  />
          <h2>Analysis</h2>
          <p id="box21">
            At MOODWAVE, we've integrated advanced emotion analysis tools to
            provide you with a comprehensive understanding of the emotional
            content within your music.
          </p>
        </div>
      </div>
      <!-- Footer start-->
      <div class="container_footer">

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

<footer> 
  <div class="Icon_bar">
  <a href="#"></a><i class="fab fa-facebook-square"></i></a>
<a href="#"></a><i class="fab fa-instagram"></i></a>
<a href="#"></a><i class="fab fa-twitter"></i></a>

</div>

<!-- There is a error in this footer -->
<!-- <div class="box" >Copyright | FOC - SUSL</div> -->
</footer>
<!-- Footer end-->

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
