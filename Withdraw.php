<?php

@include 'config.php';

session_start();


$listener_id = $_SESSION['user_id'];


if(!isset($listener_id)){
   //header('location:Login.php');
   echo "<script> window.location.href='Login.php'</script>";
};


if(isset($_POST['logout'])){

  session_unset();
  session_destroy();

  //header('location:index.php');
  echo "<script> window.location.href='index.php'</script>";
}


if(isset($_POST['submit'])){

    
  $listener_id = $_SESSION['user_id'];

  $select_balance = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id='$listener_id'") or die('query failed');
  $fetch_balance = mysqli_fetch_assoc($select_balance);
  $balance=$fetch_balance['balance'];


    if($_POST['name_on_card']==""){
        $message[] = 'Please enter card holder name';
    }elseif($_POST['card_details']==""){
        $message[] = 'Please enter card details';
    }elseif($_POST['expiary']==""){
        $message[] = 'Please enter expiary date';
    }elseif($_POST['amount']==""){
        $message[] = 'Please enter amount';
    }elseif($_POST['cvv']==""){
        $message[] = 'Please enter cvv';
    }elseif($_POST['amount']>$balance){
        $message[] = 'Your Withdraw amount is greater than your balance';
    }else{
        $name_on_card = $_POST['name_on_card'];
        $card_details = $_POST['card_details'];
        $amount = $_POST['amount'];
        $expiary=$_POST['expiary'];
        $cvv = $_POST['cvv'];
        $placed_on = date('d-M-Y');
    
    
       mysqli_query($conn, "INSERT INTO `withdraw`(listener_id,name_on_card,amount,card_details,expiary,cvv,placed_on) VALUES('$listener_id','$name_on_card','$amount', '$card_details', '$expiary', '$cvv','$placed_on')") or die(mysqli_error($conn));
       
       $balance=$balance-$amount;
       mysqli_query($conn, "UPDATE users SET balance = '$balance' WHERE user_id='$listener_id'") or die(mysqli_error($conn));
       
    
       $message[] = 'payement done successfully!';
    
       //header("location:thanks_listener.php");
       echo "<script> window.location.href='thanks_listener.php'</script>";
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
    <link rel="stylesheet" href="css/Withdraw.css" />
   
    

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

      <img  src="images/Shadow.png" alt="" id="card_image" >
    <!-- partial:index.partial.html -->


    
    <div class="container_card_register"  >
        <div class="card_What_Mood" >
          <p class="subtitle"  >
            <br><br>
            <div>
              <i class="fa-solid fa-money-bill-transfer" ></i></div>
            <br>
            <h3>Balance</h3><br>
            
            <div class="recipt">
            <h3 style="font-size: 20px;">LKR <?php
                  $select_balance = mysqli_query($conn, "SELECT * FROM `users` WHERE user_id='$listener_id'") or die('query failed');
                  $fetch_balance = mysqli_fetch_assoc($select_balance);
                  $balance=$fetch_balance['balance'];
                  echo $balance.'.00';
              ?></h3><br>
              <hr><br>
              <p class="subtitle" >
           
                At our website, we understand the importance of safeguarding your privacy, especially when 
                it comes to financial transactions. Our platform provides a secure and seamless way for you to make payments using 
                your card, ensuring your confidential information is treated with the utmost care.<br><br><br>
                
              </p>
            </div>
            
          </p>
        </div>

        <div class="registerform" >
          <form action="" method="POST" enctype="multipart/form-data">
              <div class="row2">
                  <div class="title">
                     <h2 >WITHDRAW</h2>
                     
                  
                   <br>
                   
                   <div class="input-container-row" >
                    <div class="input-container_register" >
                      <label for="" >Card Holder Name</label><br>
                      <input  class="input_text" placeholder="Michel" name="name_on_card" type="text"  required  id="text1"/>
                  </div>
                  <div class="input-container_register" >
                    <label for="" >Amount(LKR)</label><br>
                    <input  id="amountInput" class="input_text" name="amount"  placeholder="5000" type="number" required   />
                </div>
                   </div>

                   
                  <div class="input-container_register">
                       <label for="" >Card Number</label><br>
                       <input type="text" name="card_details" class="input_text" placeholder="0000-0000-0000-0000" maxlength="16"  required/>
                   </div>
                     <div class="input-container-row" style="display: flex;">
                      <div class="input-container_register" >
                        <label for="" >Exp. Date</label><br>
                        <input type="date" class="input_text"  name="expiary"  placeholder="10/25" type="text" maxlength="5" required id="text1"/>
                    </div>
                    <div class="input-container_register" >
                      <label for="" >CCV</label><br>
                      <input  class="input_text" placeholder="123" name="cvv" type="text" maxlength="3" required  id="text2" />
                  </div>
                     </div>
                   
                </div>
                   </div>
   <br><br>
       
                   <div class="button_holder" >
                    
                      <div>
                        <button class="middle_button_Creator_main" name="submit">Submit</button>
                        </div>
                      
                  
                    </div>
   <br>
                 
               </div>
           </div>
           
       </form>
              
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
 
  var amountInput = document.getElementById("amountInput");
  amountInput.addEventListener("input", function() {
    if (amountInput.value < 5000) {
      amountInput.classList.add("invalid");
    } else {
      amountInput.classList.remove("invalid");
    }
  });
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
