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


if(isset($_POST['next'])){

  if($_POST['name_on_card']==""){
      $message[] = 'Please enter name on card';
  }elseif($_POST['card_details']==""){
      $message[] = 'Please enter card details';
  }elseif($_POST['expiary']==""){
      $message[] = 'Please enter expiary date';
  }elseif($_POST['cvv']==""){
      $message[] = 'Please enter cvv';
  }else{
      $new_audio_name = $_GET['music'];
      $song_name = $_GET['song_name'];
      $song_writter = $_GET['song_writter'];
      $singers = $_GET['singers'];
      $workers_need = $_GET['workers_need'];
      $workers_earn = $_GET['workers_earn'];
      $name_on_card = $_POST['name_on_card'];
      $card_details = $_POST['card_details'];
      $expiary=$_POST['expiary'];
      $cvv = $_POST['cvv'];
      $placed_on = date('d-M-Y');
      $total=$workers_need*$workers_earn;

      mysqli_query($conn, "INSERT INTO `jobs`(creater_id,song_name,song_writter,singers,music,workers_need,workers_earn,name_on_card,card_number,expiary,cvv,total,placed_on) VALUES('$creator_id', '$song_name', '$song_writter', '$singers', '$new_audio_name', '$workers_need', '$workers_earn','$name_on_card', '$card_details', '$expiary', '$cvv','$total','$placed_on')") or die(mysqli_error($conn));


      $message[] = 'payement done successfully!';

      //header("location:thanks_creator.php");
      echo "<script> window.location.href='thanks_creator.php'</script>";
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">


    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
   
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/Payment.css" />

   
    

    <link rel="icon" href="images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>
  <body  id="swup" class="transition-fade">
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
      <br> <br> <br> <br> <br> <br> <br> 

  <div class="about">

      <img  src="images/Shadow.png" alt="" id="card_image">
    <!-- partial:index.partial.html -->


    
    <div class="container_card_register" >
        <div class="card_What_Mood" >
          <p class="subtitle"  >
            <br><br>
            <div>
              <i class="fa-brands fa-cc-visa" id="back_icon"></i></div>
            <br>
            <h3>Summary</h3><br>
            
            <div class="recipt">
              <table class="Payment_Table">
              <tr>
                  <td>Number of workers</td>
                  <td><?php echo $_GET['workers_need'];?></td>
      
                </tr>
                <tr style="border-bottom: 1px white solid;">
                  <td>Workers will earn</td>
                  <td><?php echo $_GET['workers_earn'];?>.00</td>
                  <!-- <td>LKR.20.00</td> -->
                </tr>
                <tr>
                  <th>Total</th>
                  <td><?php echo $_GET['workers_earn']*$_GET['workers_need'];?>.00</td>
                  <!-- <th>LKR.4000.00</th> -->
                </tr>
              </table>
            </div>
            
          </p>
        </div>

        <div class="registerform" >
              <div class="row2">
                  <div class="title">
                     <h2 >Payment Details</h2>
                  
                   <br>
                  <div class="input-container_register">
                       <label for="" >Card Holder Name</label><br>
                       <input type="text" name="name_on_card" class="input_text" placeholder="S K S Michel" required />
                   </div>
                  <div class="input-container_register">
                       <label for="" >Card Number</label><br>
                       <input type="text" name="card_details" class="input_text" placeholder="0000-0000-0000-0000" required />
                   </div>
                     <div class="input-container-row" id="ex">
                      <div class="input-container_register" >
                        <label for="" >Exp. Date</label><br>
                        <input type="date" name="expiary" class="input_text" placeholder="10/25" type="text" required id="text1" />
                    </div>
                    <div class="input-container_register" >
                      <label for="" >CCV</label><br>
                      <input  class="input_text" name="cvv" placeholder="123" type="text" maxlength="3" required id="text2" />
                  </div>
                     </div>
                   
                </div>
                   </div>
   <br><br>
       
                   <div class="button_holder" >
                    <div>
                    <a onclick="history.back()"><button class="middle_button_Creator_main" ><i class="fa-solid fa-arrow-left"></i></button></a
                      >
                      </div>
                      <div>
                        <button class="middle_button_Creator_main2" name="next">Submit</button>
                        </div>
                      
                  
                    </div>
   <br>
                 
               </div>
           </div>
           

              
          </form>
        </div>

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

</html>
