<?php

@include 'config.php';

session_start();

$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    header('location:index.php');
}

if(isset($_POST['projects'])){

    header('location:analysis_select.php');
}
if(isset($_POST['jobs'])){

    header('location:job_create.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crator Main</title>
    <link rel="stylesheet" href="css/creator_main.css">
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
                    <h1>Let The Waves of Emotion Begin!</h1>
                </div>
                <div class="desc">
                    <p>They can analyze the emotions by using projects. First, they need to create a project.Select the type of the project .Click the Submit button to analyze the music.Click the Job button.Add the Job Details and the music or song.</p>
                </div>
                <div class="dots">
                    <img src="images/dots.png">
                </div>
               
               <div class="buttons">
                    <!-- <a href="post_job.php" class="button">POST JOB</a> -->
                    <input type="submit" name="projects" value="PROJECTS" class="button">&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="submit" name="jobs" value="JOBS" class="button">
               </div>
            
        </div>
        <img src="images/Creator_Main.png">
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