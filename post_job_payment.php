
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




if(isset($_POST['submit'])){

   if(isset($_GET['job_id'])){
      // $job_id = $_GET['job_id'];
      $job_id = mysqli_real_escape_string($conn, $_GET['job_id']);
      //echo $job_id;
    }


    if($_POST['name_on_card']==""){
        $message[] = 'Please enter name on card';
    }elseif($_POST['card_details']==""){
        $message[] = 'Please enter card details';
    }elseif($_POST['expiary']==""){
        $message[] = 'Please enter expiary date';
    }elseif($_POST['cvv']==""){
        $message[] = 'Please enter cvv';
    }else{
        $name_on_card = $_POST['name_on_card'];
        $card_details = $_POST['card_details'];
    //  $expiary=mysqli_real_escape_string($conn, $_POST['expiary']);
        $expiary=$_POST['expiary'];
        $cvv = $_POST['cvv'];
        $placed_on = date('d-M-Y');


        mysqli_query($conn, "INSERT INTO `payment`(job_id,creater_id,name_on_card,card_details,expiary,cvv,placed_on) VALUES('$job_id', '$creator_id', '$name_on_card', '$card_details', '$expiary', '$cvv','$placed_on')") or die(mysqli_error($conn));

        $message[] = 'payement done successfully!';

        header("location:creator_main.php");
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job Payement</title>
    <link rel="stylesheet" href="css/post_job_payment.css">
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
<section class="middle">
    <!-- <img src="images/gradient.png"> -->
</section>
<section class="content">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            
            <div class="row1">
               <div class="description">
                  <h1>NOTICE !</h1>
                  <p>At our website, we understand the importance of safeguarding your privacy, especially when it comes to financial transactions. Our platform provides a secure and seamless way for you to make payments using your card, ensuring your confidential information is treated with the utmost care.</p>
               </div>
            </div>
            <div class="row2">
               <div class="title">
                  <h1>PAYMENT</h1>
               </div>
               <div class="input-container">
                    <label for="" >Name on card</label><br>
                    <input type="text" name="name_on_card" class="input" />
                </div>
               <div class="input-container">
                    <label for="" >Card Details</label><br>
                    <input type="text" name="card_details" class="input" />
                </div>

                <div class="sub-row">
                    <div class="input-container">
                        <label for="">Expiary </label><br>
                        <input type="date" name="expiary" src="images/input-box.png" class="input sub-input" />
                    </div>
                    <div class="input-container">
                        <label for="">CVV</label><br>
                        <input type="number" name="cvv" class="input sub-input" />
                    </div>
                </div>
                <div class="lines">
                     <div class="dot box2">
                     </div>
                     <div class="dot box1">
                     </div>
               </div>
               <div class="buttons">
                     <input type="submit" name="submit" value="SUBMIT" class="button">
               </div>
            </div>
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
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>