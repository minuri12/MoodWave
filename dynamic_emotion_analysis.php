
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
            // $message[] = "The file " . htmlspecialchars(basename($_FILES["mp3File"]["name"])) . " has been uploaded.";
            $message[] = "Analyse part will comming soon";
            
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
          <li><form action="" method="POST" enctype="multipart/form-data"><input type="submit" name="logout" class="logout" value="LOG OUT"></li>
        </ul>
      </nav>
    </section>
    <!-- Navigation bar end -->

    <section class="Land">
      <div class="Main_topic_sides" style="margin-top: 70px;">Dynamic Emotion Analysis</div><br>
      <div class="Small_topic_sides" style="margin-left: 285px;margin-right: 285px;">
      
        
        <input type="file" onchange="previewFile()"  name="mp3File" accept="audio/*" class="audio_input">
      
        <div style="font-size: 15px; font-weight: 100; opacity: 20%; padding-top: 10px;"><i>Click here for choose file(mp3)</i></div>

        <br>
        


<audio controls src=""></audio>
<div id="result"></div>

<div class="button_holder">

  <li style="list-style-type: none;"><input type="submit" name="analyse" class="Middle_button" value="ANALYSIS"></form></li>
  
  </div>



      </div>
      
      <div class="description">
        <div class="sub_topic_sides">
          Analysis
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
    <script>
      function previewFile() {
        var preview = document.querySelector('audio');
        var fileInput = document.querySelector('input[type=file]');
        var file = fileInput.files[0];
        var reader = new FileReader();
    
        reader.addEventListener("load", function () {
          preview.src = reader.result;
        }, false);
    
        if (file) {
          reader.readAsDataURL(file);
          updateButtonAppearance();
        }
      }
    
      function updateButtonAppearance() {
        var fileInput = document.querySelector('input[type=file]');
        fileInput.classList.add('file-uploaded');
      }
    </script>

  </body>
</html>
