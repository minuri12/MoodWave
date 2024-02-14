<?php

@include 'config.php';

session_start();



$user_id = $_SESSION['user_id'];


if(!isset($user_id)){
   header('location:login.php');
};


if(isset($_POST['search'])){
    $search_value = $_POST['job_name'];
    
    header("location:job_search_page.php?searching=$search_value");
 }


if(isset($_GET['searching'])){
    $search_results=$_GET['searching'];
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
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
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
    <link rel="stylesheet" href="css/job.css" />

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body bgcolor="#0C070F" id="swup" class="transition-fade">
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
    <form action="" method="POST" enctype="multipart/form-data">
    <center>
      <section class="navigation_section">
        <nav class="Navigation_Bar">
          <ul>
            <li>
              <a href="index.php"
                ><img src="images/Logo.png" alt="MoodWave_logo"
              /></a>
            </li>
            <li class="features"><a href="Need_Help.php">HELP</a></li>
            <li>
              <a href="Withdraw.php" class="ABOUT transition-fade"
                >WITHDRAW</a
              >
            </li>
            <li>
              <button name="logout">Logout</button>
            </li>
          </ul>
        </nav>
      </section>
    </center>

    <!--Navigation bar end-->

    <section class="Land">
      <br /><br /><br /><br />
      <div class="Main_topic_sides">JOBS</div>
      <div class="Small_topic_sides">
        Complete the task with honesty, and rest assured that we will initiate
        payment once we have verified the thoroughness and accuracy of your
        work. Your commitment to quality is greatly appreciated, and our payment
        process is designed to ensure fair compensation for your dedicated
        efforts.<br /><br />
      </div>
      <br />
      <center>
        <div class="wrap">
          <div class="search">
            <input
              type="text"
              class="searchTerm"
              name="job_name"
              placeholder="Artist Name/Song"
            />
            <button type="submit" name="search" class="searchButton">
              <i class="fa fa-search"></i>
            </button>
          </div>
        </div>
        <br><br><br>
        <div class="description" style="padding-top: 80px">
          <div class="sub_topic_sides" data-aos="zoom-in-up">
            Available Jobs
          </div>
        </div>

        <?php
                
                $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE song_name LIKE '%$search_results%'") or die('query failed');
                if(mysqli_num_rows($select_jobs) > 0){
                    while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
                ?>
                    <?php $id=$fetch_jobs['job_id'];
                          $complete_no=$fetch_jobs['completed']; 
                          $works=$fetch_jobs['workers_need'];
                          $remaning=$works-$complete_no;
                          $persentages=(int) $complete_no/$works*100;
                    ?>

                    <div class="grit_card_section_available_job">
                    <div class="Available_Job">
                      <table>
                        
                          <?php if ($remaning!=0): ?>
                          <tr style="border: none" onclick="window.location.href='job_complete.php?id=<?php echo $id ?>';">
                          <?php else: ?>
                          <tr style="border: none"> <?php endif; ?>
                        
                          <td><?php echo $fetch_jobs['song_name']; ?><br /><?php echo $fetch_jobs['singers']; ?></td>
                          <td>
                          <?php 
                            echo $remaning.' of '.$works.' remaining<br />';
                          ?>
                            <progress id="file" value="<?php echo $persentages ?>" max="100"><?php echo $persentages ?>%</progress>
                          </td>
                          <td>
                            <span class="percentage">LKR <?php echo $fetch_jobs['workers_earn']; ?>.00</span>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div> 
                <?php
                    }
                }else{
                    echo '<p class="empty">no Jobs placed yet!</p>';
                }
                ?>


      </center>
      <img
        src="images/Shadow.png"
        alt=""
        class="card_image"
        style="top: 400px; left: -900px"
      />
      <br /><br /><br />
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
  </body>
</html>
