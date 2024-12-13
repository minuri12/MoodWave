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
    <link rel="stylesheet" href="css/Need_Help.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body  id="swup" class="transition-fade">


  <div class="about">
    <div >
        <ul class="Need_help" >
            <li ><a onclick="history.back()"><i class="fas fa-arrow-left"  id="Need_help_back"></i></a></i></a></li>
            <center><li  id="need">Need Help?</li></center>
        </ul>
    </div>
      <img  src="images/Shadow.png" alt="" id="card_image" >
    <!-- partial:index.partial.html -->
    <center>
      <div class="container_card">
        <div class="card_What_Mood" >
          <h1 class="title" ><img  src="images/Logo.png" alt="" /></h1>
       
          <p class="subtitle" >
            <b>Music  Creator</b><br>
            They can analyze the emotions in their music. First, they need to create a project. Select the type of the project (Track Mood Analysis or Dynamic Emotion Analysis).Click the Submit button                  to analyze the music.
            <br><br><b>For creating a Job</b><br>
            Click the Job button.Add the Job Details and the music or song.
            <br><br><b>Listener</b><br>
            Select the Job.Add their emotions according to how they  feel.Complete the Job.

            
          </p>
        </div>
    </center>

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
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
                AOS.init();
        </script>
        
        <!--Loader script end-->
        <script src="https://unpkg.com/swup@4"></script>
        <script>
          const swup = new Swup();
        </script>

      </body>


</html>
