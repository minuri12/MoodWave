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



if(isset($_GET['id'])){
    $id=$_GET['id'];
}

if(isset($_POST['submit'])){
    $listener_id = $_SESSION['user_id'];
    $job_id=$_GET['id'];
    $comments = $_POST['comments'];
    
    if(isset($_GET['annotate'])){
        $annotate=$_GET['annotate'];
        $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE job_id='$job_id'") or die('query failed');
        $fetch_jobs = mysqli_fetch_assoc($select_jobs);

        $amount = $fetch_jobs['workers_earn'];
        $placed_on = date('d-M-Y');
        $completed = $fetch_jobs['completed'];
        $new_completed = $completed +1;

        
        mysqli_query($conn, "UPDATE jobs SET completed = '$new_completed' WHERE job_id='$job_id'") or die(mysqli_error($conn));

        mysqli_query($conn, "INSERT INTO `job_complete`(job_id,listener_id,comments,annotate,amount,placed_on) VALUES('$job_id', '$listener_id','$comments','$annotate', '$amount','$placed_on')") or die(mysqli_error($conn));
        
        $select_balance = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id='$listener_id'") or die('query failed');
        $fetch_balance = mysqli_fetch_assoc($select_balance);
        $balance=$fetch_balance['balance'];
        $balance=$balance+$amount;
        
        mysqli_query($conn, "UPDATE users SET balance = '$balance' WHERE user_id='$listener_id'") or die(mysqli_error($conn));
        
        $message[] = 'payement done successfully!';
        //header("location:Withdraw.php");
        echo "<script> window.location.href='Withdraw.php'</script>";
    }else{
        $message[] = 'You have to anotate First';
    }

    
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />




    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/job_complete.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body  id="swup" class="transition-fade" style="overflow-x: hidden">
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
            <li><a id="Withdraw" href="#" class="ABOUT transition-fade">WITHDRAW</a></li>
            <li>
              <button name="logout">Logout</button>
            </li>
          </ul>
        </nav>
      </section>
    </center>

    <!--Navigation bar end-->
    <br /><br /><br /><br />
    <section class="Land">
    <?php
            
            $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE job_id='$id'") or die('query failed');
            $fetch_jobs = mysqli_fetch_assoc($select_jobs);
          ?>
            <div class="Main_topic_sides"><?php echo $fetch_jobs['song_name']; ?></div>
            <div class="Small_topic_sides"><?php echo $fetch_jobs['singers']; ?><br /><br />
            </div>
            <br>
            <div class="grit_card_section_create" >
              <div class="card_section_project" style="height: 100px; padding: 0%; margin: 0%;">
                <h2 style="font-size: 20px; font-weight: 400;align-items: center;padding-bottom: 5px;">Needed Workers</h2>
                <p style="text-align: center; font-size: 15px; font-weight: 300;padding: 0%; margin: 0%;">
                <?php echo $fetch_jobs['workers_need']; ?>
                </p>
                
               
              </div>
              <div class="card_section_project" style="height: 100px; padding: 0%; margin: 0%;">
                <h2 style="font-size: 20px; font-weight: 400; text-align: center; padding-bottom: 5px;">EARN </h2>
                <p style="text-align: center; font-size: 15px; font-weight: 300; ">
                <?php echo 'LKR '.$fetch_jobs['workers_earn'].'.00'; ?>
                </p>
         
          
        </div>
       

        </div>

        <br>
        <br><br><br><br><br>
      
      </div>

      <div class="audio-player-container">
        <audio controls id="audioPlayer">
          <source src="uploads/<?php echo $fetch_jobs['music']; ?>" type="audio/mp3">
          <!-- <source src="uploads/new1.mp3" type="audio/mpeg"> -->
        </audio>
      </div>

      <div class="Small_topic_sides">
        <i >Note : The Anotation bar is not unloack untill you listening the song 2 times completely</i><br /><br />
      </div>
      <img  src="images/Shadow.png" alt="" id="card_image1" >
      <div class="description">
        <div class="sub_topic_sides" data-aos="zoom-in" data-aos-duration="2000">Annotate Here</div>
      </div>
      <img  src="images/Shadow.png" alt="" id="card_image2">

<center>

  <div class="s0">
    <!-- Image Map Generated by http://www.image-map.net/ -->
    <img src="images/anotate_s1.png" usemap="#image-map1">

      <map name="image-map1">
        <area target="" alt="sad-calm" title="sad-calm" href="Job_complete.php?id=<?php echo $id ?>&annotate=sad-calm" coords="162,154,67,244,163,292" shape="poly">
        <area target="" alt="calm-chiled" title="calm-chiled" href="Job_complete.php?id=<?php echo $id ?>&annotate=calm-chiled" coords="162,153,164,289,266,252" shape="poly">
        <area target="" alt="chiled-happy" title="chiled-happy" href="Job_complete.php?id=<?php echo $id ?>&annotate=chiled-happy" coords="165,152,260,253,305,153" shape="poly">
        <area target="" alt="happy-uplifting" title="happy-uplifting" href="Job_complete.php?id=<?php echo $id ?>&annotate=happy-uplifting" coords="164,151,303,152,264,53" shape="poly">
        <area target="" alt="uplifting-energtic" title="uplifting-energtic" href="Job_complete.php?id=<?php echo $id ?>&annotate=uplifting-energtic" coords="163,9,163,150,266,53" shape="poly">
        <area target="" alt="energtic-aggresive" title="energtic-aggresive" href="Job_complete.php?id=<?php echo $id ?>&annotate=energtic-aggresive" coords="164,150,61,48,161,7" shape="poly">
        <area target="" alt="aggersive-dark" title="aggersive-dark" href="Job_complete.php?id=<?php echo $id ?>&annotate=aggersive-dark" coords="167,152,21,153,63,52" shape="poly">
        <area target="" alt="dark-sad" title="dark-sad" href="Job_complete.php?id=<?php echo $id ?>&annotate=dark-sad" coords="167,149,67,249,21,152" shape="poly">
      </map>

  </div>
  <div class="s1">
  <img src="images/anotate_s2.png" usemap="#image-map2">



    <map name="image-map2">
        <area target="" alt="sad-calm" title="sad-calm" href="Job_complete.php?id=<?php echo $id ?>&annotate=sad-calm" coords="238,222,96,365,243,430" shape="poly">
        <area target="" alt="calm-chiled" title="calm-chiled" href="Job_complete.php?id=<?php echo $id ?>&annotate=calm-chiled" coords="238,222,243,436,382,365" shape="poly">
        <area target="" alt="chiled-happy" title="chiled-happy" href="Job_complete.php?id=<?php echo $id ?>&annotate=chiled-happy" coords="382,365,449,222,239,221" shape="poly">
        <area target="" alt="happy-uplifting" title="happy-uplifting" href="Job_complete.php?id=<?php echo $id ?>&annotate=happy-uplifting" coords="242,222,443,221,385,81" shape="poly">
        <area target="" alt="uplifting-energtic" title="uplifting-energtic" href="Job_complete.php?id=<?php echo $id ?>&annotate=uplifting-energtic" coords="239,224,239,20,390,78" shape="poly">
        <area target="" alt="energtic-aggresive" title="energtic-aggresive" href="Job_complete.php?id=<?php echo $id ?>&annotate=energtic-aggresive" coords="99,81,240,21,241,223" shape="poly">
        <area target="" alt="aggersive-dark" title="aggersive-dark" href="Job_complete.php?id=<?php echo $id ?>&annotate=aggersive-dark" coords="241,222,33,225,94,79" shape="poly">
        <area target="" alt="dark-sad" title="dark-sad" href="Job_complete.php?id=<?php echo $id ?>&annotate=dark-sad" coords="239,221,95,369,41,223" shape="poly">
    </map>

    
  </div>
  <div class="s2">
    <img src="images/anotate_s3.png" usemap="#image-map3">
    <map name="image-map3">
          <area target="" alt="sad-calm" title="sad-calm" href="Job_complete.php?id=<?php echo $id ?>&annotate=sad-calm" coords="335,305,138,504,339,592" shape="poly">
          <area target="" alt="calm-chiled" title="calm-chiled" href="Job_complete.php?id=<?php echo $id ?>&annotate=calm-chiled" coords="336,309,339,590,538,511" shape="poly">
          <area target="" alt="chiled-happy" title="chiled-happy" href="Job_complete.php?id=<?php echo $id ?>&annotate=chiled-happy" coords="339,313,533,506,619,314" shape="poly">
          <area target="" alt="happy-uplifting" title="happy-uplifting" href="Job_complete.php?id=<?php echo $id ?>&annotate=happy-uplifting" coords="340,308,619,310,541,114" shape="poly">
          <area target="" alt="uplifting-energtic" title="uplifting-energtic" href="Job_complete.php?id=<?php echo $id ?>&annotate=uplifting-energtic" coords="338,311,335,29,542,112" shape="poly">
          <area target="" alt="energtic-aggresive" title="energtic-aggresive" href="Job_complete.php?id=<?php echo $id ?>&annotate=energtic-aggresive" coords="334,306,141,113,339,25" shape="poly">
          <area target="" alt="aggersive-dark" title="aggersive-dark" href="Job_complete.php?id=<?php echo $id ?>&annotate=aggersive-dark" coords="335,309,50,310,143,114" shape="poly">
          <area target="" alt="dark-sad" title="dark-sad" href="Job_complete.php?id=<?php echo $id ?>&annotate=dark-sad" coords="135,513,334,311,53,314" shape="poly">
      </map>

  </div>
  <div class="s3">
    <img src="images/anotate.png" usemap="#image-map4">

    <map name="image-map4">
      <area target="" alt="sad-calm" title="sad-calm" href="Job_complete.php?id=<?php echo $id ?>&annotate=sad-calm" coords="194,659,444,762,446,411" shape="poly">
      <area target="" alt="calm-chiled" title="calm-chiled" href="Job_complete.php?id=<?php echo $id ?>&annotate=calm-chiled" coords="442,763,697,662,445,413" shape="poly">
      <area target="" alt="chiled-happy" title="chiled-happy" href="Job_complete.php?id=<?php echo $id ?>&annotate=chiled-happy" coords="695,663,802,411,448,410" shape="poly">
      <area target="" alt="happy-uplifting" title="happy-uplifting" href="Job_complete.php?id=<?php echo $id ?>&annotate=happy-uplifting" coords="801,411,693,157,445,412" shape="poly">
      <area target="" alt="uplifting-energtic" title="uplifting-energtic" href="Job_complete.php?id=<?php echo $id ?>&annotate=uplifting-energtic" coords="697,158,446,55,443,411" shape="poly">
      <area target="" alt="energtic-aggresive" title="energtic-aggresive" href="Job_complete.php?id=<?php echo $id ?>&annotate=energtic-aggresive" coords="443,55,192,159,444,408" shape="poly">
      <area target="" alt="aggersive-dark" title="aggersive-dark" href="Job_complete.php?id=<?php echo $id ?>&annotate=aggersive-dark" coords="196,158,89,412,443,408" shape="poly">
      <area target="" alt="dark-sad" title="dark-sad" href="Job_complete.php?id=<?php echo $id ?>&annotate=dark-sad" coords="88,411,439,410,192,664" shape="poly">
    </map>
  </div>



<br><br><br>

  <div class="comment">- Add Comment -</div>
</center>
<br>
<center>

    
    <textarea  data-aos="zoom-in" data-aos-duration="1000" name="comments"  id="create_job_inputField"  placeholder="Type your comment here..."  />
</textarea>


<div class="button_holder" >
  <br><br>            

  

</div>
</center>


<center>
  <div>
    <button class="middle_button_Creator_main" name="submit" >Submit</button>
    </div>
</center>




      <br /><br />  <br /><br />
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
    <script>
      function previewFile() {
        var preview = document.querySelector("audio");
        var fileInput = document.querySelector("input[type=file]");
        var file = fileInput.files[0];
        var reader = new FileReader();

        reader.addEventListener(
          "load",
          function () {
            preview.src = reader.result;
          },
          false
        );

        if (file) {
          reader.readAsDataURL(file);
          updateButtonAppearance();
        }
      }

      function updateButtonAppearance() {
        var fileInput = document.querySelector("input[type=file]");
        fileInput.classList.add("file-uploaded");
      }
    </script>

    <!--Needed-->

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
        //audioPlayer.src = URL.createObjectURL(file);
      }
    </script>
        <script>
      document.getElementById("Withdraw").addEventListener("click", function(event) {
      event.preventDefault(); 
      window.location.href = 'Withdraw.php';
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
