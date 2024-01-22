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
          <li><form method="POST"><input type="submit" name="logout" class="logout" value="LOG OUT"></form></li>
        </ul>
      </nav>
    </section>
    <!-- Navigation bar end -->

    <section class="Land">
      <div class="Main_topic_sides">CREATE NEW JOB</div>
      <div class="Small_topic_sides" style="margin-left: 285px;margin-right: 285px;">
        Music creators have the ability to generate a task for listeners, wherein they can request an analysis of 
        the emotions in their music by engaging the perspectives of actual listeners.<br /><br />
        <img src="images/dots.png" alt="" />
      </div>
      <div class="button_holder">

      <li style="list-style-type: none;"><form method="POST"><input type="submit" name="jobs" class="Middle_button" value="POST JOB"></form></li>
      </div>

      <div class="description">
        <div class="sub_topic_sides">
          My Jobs
        </div>
      </div>
      <br /><br />
      <div class="grit_card_section">
        <div class="card_section" style="width: 1000px;">
         
          <table >
            <tr>
                <th>Job Name</th>
                <th>Needed Listeners</th>
                <th>Completed 
                   
                </th>
            </tr>
            <!-- <tr>
                <td>You Belong with Me</td>
                <td>100</td>
                <td> <span class="percentage">40%</span><div class="colorcode"></div>
                </td>
            </tr>
            <tr>
                <td>Jocker and Queen</td>
                <td>45</td>
                <td> <span class="percentage">50%</span><div class="colorcode_yellow"></div>
                </td>
            </tr>
            <tr>
                <td>Perfect</td>
                <td>300</td>
                <td> <span class="percentage">90%</span><div class="colorcode_red"></div>
                </td>
            </tr>
            <tr>
                <td>Baby</td>
                <td>145</td>
                <td> <span class="percentage">40%</span><div class="colorcode"></div>
                </td>
            </tr> -->
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
                    echo '<span class="percentage">'.intval($persontage).'% </span><div class="colorcode_red"></div>';
                    // echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:green;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }elseif($persontage>45){
                    echo '<span class="percentage">'.intval($persontage).'% </span><div class="colorcode_yellow"></div>';
                    //echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:yellow;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }else{
                    echo '<span class="percentage">'.intval($persontage).'% </span><div class="colorcode"></div>';
                    // echo  '<div class="cbox" style="display:flex;">'.intval($persontage).'% <div style="background-color:red;width:30px;height:10px;border-radius: 3px;margin-top:8px;margin-left:10px"></div></div>';
                }
                ?></td>
            </tr>
            <?php
                }
            }
            ?>
          </table>


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

    <script src="/JS/vanilla-tilt.min.js"></script>
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 1,
      });
    </script>
  </body>
</html>
