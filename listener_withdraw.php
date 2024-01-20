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

//=====We have to give this in the final========

// $user_id = $_SESSION['user_id'];


// if(!isset($user_id)){
//    header('location:login.php');
// };

//==================================================

 $listener_id = 1;

 


if(isset($_POST['submit'])){

   if(isset($_GET['job_id'])){
      // $job_id = $_GET['job_id'];
      $job_id = mysqli_real_escape_string($conn, $_GET['job_id']);
      //echo $job_id;
    }
   if(isset($_GET['comments'])){
      $comments = mysqli_real_escape_string($conn, $_GET['comments']);
      
    }
   if(isset($_GET['annotate'])){
      $annotate = mysqli_real_escape_string($conn, $_GET['annotate']);
      
    }

    $name_on_card = $_POST['name_on_card'];
    $card_details = $_POST['card_details'];
    $amount = $_POST['amount'];
    $expiary=$_POST['expiary'];
    $cvv = $_POST['cvv'];
    $placed_on = date('d-M-Y');


   mysqli_query($conn, "INSERT INTO `withdraw`(job_id,listener_id,comments,annotate,name_on_card,amount,card_details,expiary,cvv,placed_on) VALUES('$job_id', '$listener_id','$comments','$annotate', '$name_on_card','$amount', '$card_details', '$expiary', '$cvv','$placed_on')") or die(mysqli_error($conn));

   $message[] = 'payement done successfully!';

   header("location:listener_withdraw.php?correct");
        
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Withdraw</title>
    <link rel="stylesheet" href="css/listener_withdraw.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
<header class="header">
    
    <section class="flex">
        
        <div class="back">
            <a href="post_job.php"><i class="fa-solid fa-arrow-left"></i></a>
        </div>
        <div class="icon">
            
            <img src="images/Logo_k.png">
        </div>

        <nav class="navbar">
            <a href="#">HELP</a>
            <a href="#">ABOUT US<a>
        </nav>

        <div class="logout_button">
            <button>LOG OUT</button>
        </div>
        
    </section>
</header>
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
                  <h1>WITHDRAW</h1>
               </div>
               <div class="sub-row">
                    <div class="input-container">
                        <label for="" >Name on card</label><br>
                        <input type="text" name="name_on_card" class="input sub-input" />
                    </div>
                    <div class="input-container">
                        <label for="">Amount ( LKR )</label><br>
                        <input type="number" name="amount" class="input sub-input" />
                    </div>
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
               <div class="buttons">
                     <input type="submit" name="submit" value="WITHDRAW" class="button">
               </div>
            </div>
        </div>
        
    </form>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>