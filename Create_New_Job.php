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
   //header('location:Login.php');
   echo "<script> window.location.href='Login.php'</script>";
};


if(isset($_POST['logout'])){

    session_unset();
    session_destroy();

    //header('location:index.php');
    echo "<script> window.location.href='index.php'</script>";
}


if(isset($_POST['post_job'])){

    //header('location:Create_Job.php');
    echo "<script> window.location.href='Create_Job.php'</script>";
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
  
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/Create_New_Job.css" />

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
    <br /><br /><br /><br /><br /><br />

    <section class="Land">
      <div class="Main_topic_sides">CREATE NEW JOB</div>
      <div class="Small_topic_sides">
        Music creators have the ability to generate a task for listeners,
        wherein they can request an analysis of the emotions in their music by
        engaging the perspectives of actual listeners.They can easily follow few
        steps and create a new job without any problem.Let's start to create new
        job and find the emotion of your music.<br /><br />
        <img src="images/dots.png" alt="" />
      </div>
      <br /><br /><br />
      <div class="button_holder">
        <div>
          <button class="middle_button_Creator_main" name="post_job">New Job</button>
        </div>
      </div>

      <div class="description">
        <div class="sub_topic_sides">My Jobs</div>
      </div>
<center><div
  class="grit_card_section"
  data-aos="fade-up"
  data-aos-duration="3000"
>
  <div class="card_section">
    <table>
      <tr>
        <th>Job Name</th>
        <th>Needed Listeners</th>
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
                    echo  '<span class="percentage">'.intval($persontage).'%</span><div class="colorcode"></div>';
                }elseif($persontage>45){
                    echo  '<span class="percentage">'.intval($persontage).'%</span><div class="colorcode_yellow"></div>';
                }else{
                    echo  '<span class="percentage">'.intval($persontage).'%</span><div class="colorcode_red"></div>';
                }
                ?></td>
            </tr>
            <?php
                }
            }
            ?>
    </table>
  </div>
</div></center>
      
      <br /><br /><br /><br />

      
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

    <script src="JS/vanilla-tilt.min.js"></script>
    <script>
      VanillaTilt.init(document.querySelectorAll(".card"), {
        max: 25,
        speed: 400,
        glare: true,
        "max-glare": 1,
      });
    </script>

    <script src="JS/Script.js"></script>

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
