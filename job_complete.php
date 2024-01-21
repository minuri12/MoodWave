
<?php

@include 'config.php';

session_start();



$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};



if(isset($_GET['id'])){
    $id=$_GET['id'];
}

if(isset($_POST['submit'])){
    $comments = $_POST['comments'];
    
    if(isset($_GET['annotate'])){
        $annotate=$_GET['annotate'];
        header("location:listener_withdraw.php?job_id=$id&annotate=$annotate&comments=$comments");
    }else{
        $message[] = 'You have to anotate First';
    }
    
    
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Complete</title>
    <link rel="stylesheet" href="css/job_complete.css">
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

        <?php
            
            $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE job_id='$id'") or die('query failed');
            $fetch_jobs = mysqli_fetch_assoc($select_jobs);
        ?>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <div class="title">
                    <h1><?php echo $fetch_jobs['song_name']; ?></h1>
                    <h3><?php echo $fetch_jobs['singers']; ?></h3>
                </div>
                <div class="row">
                    <div class="desc_box">
                        <div class="topic">
                            <h1>Need Workers</h1>
                        </div>
                        <div class="desc">
                            <p><?php echo $fetch_jobs['workers_need']; ?></p>
                        </div>
                    </div>
                    <div class="desc_box">
                        <div class="topic">
                            <h1>Earn</h1>
                        </div>
                        <div class="desc">
                            <p><?php echo 'LKR '.$fetch_jobs['workers_earn'].'.00'; ?></p>
                        </div>
                    </div>
                        
                </div>
        </div>

        <div id="demo" class="demo">
            <!-- (A) AUDIO TAG -->
            <?php
                $myAudioFile = $fetch_jobs['music']; ;
                echo '<audio controls class="demoAudio">
                <source src="uploads/'.$myAudioFile.'" type="audio/mpeg">
                </audio>';
            ?>
        </div>

        <div class="anotate">
            <h1>Annotate Here</h1>
            <img src="images/anotate.png" usemap="#image-map">

            <map name="image-map">
                <area target="" alt="sad-calm" title="sad-calm" href="job_complete.php?id=<?php echo $id ?>&annotate=sad-calm" coords="194,659,444,762,446,411" shape="poly">
                <area target="" alt="calm-chiled" title="calm-chiled" href="job_complete.php?id=<?php echo $id ?>&annotate=calm-chiled" coords="442,763,697,662,445,413" shape="poly">
                <area target="" alt="chiled-happy" title="chiled-happy" href="job_complete.php?id=<?php echo $id ?>&annotate=chiled-happy" coords="695,663,802,411,448,410" shape="poly">
                <area target="" alt="happy-uplifting" title="happy-uplifting" href="job_complete.php?id=<?php echo $id ?>&annotate=happy-uplifting" coords="801,411,693,157,445,412" shape="poly">
                <area target="" alt="uplifting-energtic" title="uplifting-energtic" href="job_complete.php?id=<?php echo $id ?>&annotate=uplifting-energtic" coords="697,158,446,55,443,411" shape="poly">
                <area target="" alt="energtic-aggresive" title="energtic-aggresive" href="job_complete.php?id=<?php echo $id ?>&annotate=energtic-aggresive" coords="443,55,192,159,444,408" shape="poly">
                <area target="" alt="aggersive-dark" title="aggersive-dark" href="job_complete.php?id=<?php echo $id ?>&annotate=aggersive-dark" coords="196,158,89,412,443,408" shape="poly">
                <area target="" alt="dark-sad" title="dark-sad" href="job_complete.php?id=<?php echo $id ?>&annotate=dark-sad" coords="88,411,439,410,192,664" shape="poly">
            </map>
        </div>

        <div class="submit">
            <h1>Add Comments</h1>
            <textarea name="comments"></textarea>
            <input type="submit" name="submit" value="SUBMIT" class="button"></input>
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
    <script src="audio.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>