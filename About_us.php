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
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body style="margin: 0; padding: 0; height: 100%; display: flex; flex-direction: column;">

    
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



  <div class="about">
    <div class="About_header">
        <ul>
            <li><a href="index.php"><i class="fas fa-arrow-left" style="color: aliceblue;"></i></a></li>
            <li >About Us</li>
        </ul>
    </div>
      <img  src="images/Shadow.png" alt="" class="card_image" style="width:700px ;z-index: -1;">
    <!-- partial:index.partial.html -->
    <div class="container_card">
        <div class="card_What_Mood" style="height: 532px;">
          <h1 class="title"><img src="images/Logo.png" alt="" /></h1>
       
          <p class="subtitle">
            Welcome to MoodWave, where emotion meets music in a harmonious blend of innovation and creativity. Our platform is more than just a music streaming service; it's an immersive journey through the intricate landscapes of emotions embedded in every note.<br><br>

            Discover a personalized experience where creators analyze and share the emotional essence of their compositions. Engage with music on a deeper level, as MoodWave seamlessly weaves technology and emotion, offering a unique and enriching listening adventure.<br><br>
            
            <i>Join us on a wave of emotions. Welcome to MoodWave – Where Music Resonates with Feeling.</i>
            
          </p>
        </div>

  
        <div class="card_What_Mood" style="width: 500px; margin-left: 0;">
            <div class="title">Meet the Team</div>
            <p class="subtitle" >
                M.S Hewage <br>
                Email: minurisenara@gmail.com<br>
                Phone Number: 0787531133<br>
                <br>
                 K.Sathursana <br>
                Email: sathusabapathy@gmail.com<br>
                Phone Number: 0767180183<br>
                <br>
                H.A.I.J.Perera<br>
                Email: jayaru234@gmail.com<br>
                Phone Number: 0712904410<br>
                <br>
                K.M.Andarawewa<br>
                Email:kushanandarawewa1@gmail.com<br>
                Phone Number: 0714249784 

            </p>
          </div>
          
          
      </div><br><br>
      <footer style="margin-top: auto;">
        <div class="Icon_bar">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-instagram"></i></a>
          <a href="#"><i class="fab fa-twitter"></i></a>
          <div class="box" style="margin-top: 20px; width: 100%; margin-bottom: 0;">Copyright | FOC - SUSL</div>
        </div>
      </footer>
        
      <!-- Footer start-->



</html>
