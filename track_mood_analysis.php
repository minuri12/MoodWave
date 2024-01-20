
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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Track Mood Analysis</title>
    <link rel="stylesheet" href="css/track_mood_analysis.css">
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
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
    <!--Navigation bar start-->
    <section class="navigation_section">
        <nav class="Navigation_Bar">
          <ul>
            <li><a href="analysis_select.php" style="margin-left:-100px;"><i class="fa-solid fa-arrow-left"></i></a></li>
            <li><a href="index.php"><img src="images/Logo.png" alt="MoodWave_logo" /></a></li>
            <li class="features"><a href="Need_Help.php">HELP</a></li>
            <li><a href="About_us.php" class="ABOUT">ABOUT US</a></li>
            <li><form method="POST"><input type="submit" name="logout" class="logout" value="LOG OUT"></form></li>
          </ul>
        </nav>
    </section>
    <!--Navigation bar end-->

<section class="content">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <div class="title">
                    <h1>Track Mood Analysis</h1>
                </div>
                <div class="input-container">
                    
                    <!-- <input type="file" name="music" class="input music-input" /> -->
                    <label for="mp3File" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Browse File to Upload ( Mp3)</span>
                    
                    <input type="file" id="mp3File" name="mp3File" class="uploading">
                    </label>
                </div>
                <div class="dots">
                    <img src="images/dots.png">
                </div>
               
               <div class="buttons">
                    <!-- <a href="post_job.php" class="button">POST JOB</a> -->
                    <input type="submit" name="analyse" value="ANALYSE" class="button">
               </div>
            
        </div>
        
    </form>
    <div class="footer-images">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
    </div>
    <div class="box">Copyright | FOC - SUSL</div>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>