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


if(isset($_POST['analyse'])){

    $targetDirectory = "uploads-analysis/";
    $targetFile = $targetDirectory . basename($_FILES["mp3File"]["name"]);
    $uploadOk = 1;
    $mp3FileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    

    // Check file size (you can adjust this limit)
    if ($_FILES["mp3File"]["size"] > 5000000) {
        $message[] = 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Allow only specific file formats
    if ($mp3FileType != "mp3") {
        $message[] = 'Sorry, only MP3 files are allowed.';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message[] = 'Sorry, your file was not uploaded.';
    } else {
        // Move the file to the specified directory
        if (move_uploaded_file($_FILES["mp3File"]["tmp_name"], $targetFile)) {
            $message[] = "The file " . htmlspecialchars(basename($_FILES["mp3File"]["name"])) . " has been uploaded.";
            
        } else {
            $message[] = "Error: " . $_FILES["mp3File"]["error"];
        }
    }
    $new_audio_name=htmlspecialchars(basename($_FILES["mp3File"]["name"])) ;



    //=====================================================
                    //Machine Learning Part
    //=====================================================
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

    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/dynamic_emotion_analysis.css" />

    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body id="swup" class="transition-fade">
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
    <br /><br /><br /><br /><br /><br /><br />
    <section class="Land">
      <div class="Main_topic_sides">DYNAMIC EMOTION ANALYZE<br /></div>
      <div class="container_mp3">
        <div class="card_mp3">
          <div class="drop_box">
            <header>
              <h4>Upload Song</h4>
            </header>
            <p>Files Supported: mp3</p>
            <input
              type="file"
              id="fileInput"
              style="display: none"
              onchange="handleFileSelect(event)"
              accept=".mp3"
              name="mp3File"
            />
            <label for="fileInput" class="btn">Choose File</label>
          </div>
        </div>
      </div>

      <div class="audio-player-container">
        <audio controls id="audioPlayer"></audio>
      </div>

      <div class="description">
        <div class="sub_topic_sides">Analysis</div>
      </div>
      
      <div class="comming_soon">
        <h1>Comming Soon</h1>
      </div>
      <br /><br />
     
    <!--Needed-->


          
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
      function handleFileSelect(event) {
        const fileInput = event.target;
        const file = fileInput.files[0];
        const audioPlayer = document.getElementById("audioPlayer");
        const fileName = fileInput.files[0].name;
        const header = document.querySelector(".drop_box header h4");
        header.textContent = fileName;
        audioPlayer.src = URL.createObjectURL(file);
      }
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
