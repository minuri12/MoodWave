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
 
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/About.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="CSS/Nevigation.css"/>
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body  id="swup" class="transition-fade" >

    



  <div class="about">
    <div class="About_header">
        <ul>
            <li><a onclick="history.back()"><i class="fas fa-arrow-left" id="back_arrow"></i></a></li>
            <li >About Us</li>
        </ul>
    </div>
      <img  src="images/Shadow.png" id="card_image_about" >

      
    <!-- partial:index.partial.html -->
    <div class="container_card">
        <div class="card_What_Mood" >
          <h1 class="title"><img src="images/Logo.png" alt="" /></h1>
       
          <p class="subtitle">
            Welcome to MoodWave, where emotion meets music in a harmonious blend of innovation and creativity. Our platform is more than just a music streaming service; it's an immersive journey through the intricate landscapes of emotions embedded in every note.<br><br>

            Discover a personalized experience where creators analyze and share the emotional essence of their compositions. Engage with music on a deeper level, as MoodWave seamlessly weaves technology and emotion, offering a unique and enriching listening adventure.<br><br>
            
            <i>Join us on a wave of emotions. Welcome to MoodWave – Where Music Resonates with Feeling.</i>
            
          </p>
        </div>

  
        <div class="card_What_Mood" >
         
            <div class="title">Meet the Team</div>
            <p class="subtitle" >
                M.S Hewage <br>
                Email: minurisenara@gmail.com<br>
               
                <br>
                 K.Sathursana <br>
                Email: sathusabapathy@gmail.com<br>
                
                <br>
                H.A.I.J.Perera<br>
                Email: jayaru234@gmail.com<br>
                
                <br>
                K.M.Andarawewa<br>
                Email:kushanandarawewa1@gmail.com<br>
              

            </p>
          </div>
          <img  src="images/Shadow.png" alt="" id="card_image_about2" >

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
<script src="https://unpkg.com/swup@4"></script>
<script>
  const swup = new Swup();
</script>



</html>
