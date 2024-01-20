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


$creator_id = $_SESSION['user_id'];


if(!isset($creator_id)){
   header('location:login.php');
};


if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    header('location:index.php');
}


if(isset($_POST['post_job'])){

    header('location:post_job.php');
}else{
   
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Job</title>
    <link rel="stylesheet" href="css/job_create.css">
    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
    <!--Navigation bar start-->
    <section class="navigation_section">
        <nav class="Navigation_Bar">
          <ul>
            <li><a href="creator_main.php" style="margin-left:-100px;"><i class="fa-solid fa-arrow-left"></i></a></li>
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
                    <h1>CREATE NEW JOB</h1>
                </div>
                <div class="desc">
                    <p>Music creators have the ability to generate a task for listeners, wherein they can request an analysis of the emotions in their music by engaging the perspectives of actual listeners.</p>
                </div>
                <div class="dots">
                    <img src="images/dots.png">
                </div>
               
               <div class="buttons">
                    <!-- <a href="post_job.php" class="button">POST JOB</a> -->
                    <input type="submit" name="post_job" value="POST JOB" class="button">
               </div>
            
        </div>
        
    </form>

</section>
<section class="my-jobs">
    <h1>My Jobs</h1>
    <table>
        <tr>
            <th>Job Name</th>
            <th>Needed Listners</th>
            <th>Completed</th>
        </tr>

            <?php
            
            $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE creater_id='$creator_id'") or die('query failed');
            if(mysqli_num_rows($select_jobs) > 0){
                while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
            ?>
            <tr>
                <td> <?php echo $fetch_jobs['song_name']; ?></td>
                <td> <?php echo $fetch_jobs['workers_need']; ?></td>
                
                <td> <?php 
                $complete_no=$fetch_jobs['completed']; 
                $works=$fetch_jobs['workers_need'];
                $persontage=$complete_no/$works *100;

                if($persontage>75){
                    echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:green;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }elseif($persontage>45){
                    echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:yellow;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }else{
                    echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:red;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }
                ?></td>
            </tr>
            <?php
                }
            }
            ?>
    </table>

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