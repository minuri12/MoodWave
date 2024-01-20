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
<?php

@include 'config.php';

session_start();

//=====We have to give this in the final========

// $user_id = $_SESSION['user_id'];


// if(!isset($user_id)){
//    header('location:login.php');
// };

//==================================================


if(isset($_POST['track_start'])){
    $project_name=$_POST['project_name'];

    header("location:track_mood_analysis.php?project_name=$project_name");
}
if(isset($_POST['dynamic_start'])){
    $project_name=$_POST['project_name'];

    header("location:dynamic_emotion_analysis.php?project_name=$project_name");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analysis Select</title>
    <link rel="stylesheet" href="css/analysis_select.css">
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
<header class="header">
    
    <section class="flex">
        
        <div class="back">
            <a href="creator_main.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="icon">
            
            <img src="images/Logo_k.png">
        </div>

        <nav class="navbar">
            <a href="#">HELP</a>
            <a href="#">ABOUT US<a>
        </nav>

        <div class="logout_button">
            <button>LOG OUT</button>
        </div>
        
    </section>
</header>

<section class="content">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <div class="title">
                    <h1>LET'S START ANALYSIS</h1>
                </div>
                <div class="input-container">
                    <input type="text" name="project_name" class="input" placeholder="Project Name"/>
                </div>
                <div class="row">
                    <div class="desc_box">
                        <div class="topic">
                            <h1>Track Mood Analysis</h1>
                        </div>
                        <div class="desc">
                            <p>Compare multiple tracks in order to find the best one for the emotion you want to represent.</p>
                        </div>
                        <div class="buttons">
                            <input type="submit" name="track_start" value="Start" class="button">
                        </div>
                    </div>
                    <div class="desc_box">
                        <div class="topic">
                            <h1>Dynamic Emotion Analysis</h1>
                        </div>
                        <div class="desc">
                            <p>Upload any audio and get a second-by-second emotion analysis.</p>
                        </div>
                        <div class="buttons btn2">
                            <input type="submit" name="dynamic_start" value="Start" class="button">
                        </div>
                    </div>
                        
                </div>
        </div>
        
    </form>
    <div class="footer-images">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
    </div>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>