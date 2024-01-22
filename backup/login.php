<?php

@include 'config.php';

session_start();


if(isset($_POST['login'])){

   
    $email = $_POST['email'];
    $password = $_POST['password'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die('query failed');


    if(mysqli_num_rows($select_users) > 0){
       
       $row = mysqli_fetch_assoc($select_users);
 
       if($row['user_type'] == 'Listener'){
 
          $_SESSION['user_name'] = $row['name'];
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_id'] = $row['user_id'];

          header('location:jobs.php');
 
       }elseif($row['user_type'] == 'Creator'){
 
          $_SESSION['user_name'] = $row['name'];
          $_SESSION['user_email'] = $row['email'];
          $_SESSION['user_id'] = $row['user_id'];

         $tid= $_SESSION['user_id'];
          header("location:creator_main.php");
 
       }else{
          $message[] = 'no user found!';
       }
 
    }else{
       $message[] = 'incorrect email or password!';
    }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
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
<section class="content">
    <div class="back">
        <a href="index.php"><i class="fa-solid fa-arrow-left"></i></a>
    </div>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            
            <div class="row">
                
                <img src="images/login.png" >
            </div>
            
            <div class="row2">
               <div class="title">
                  <h1>Login</h1>
               </div>
               <div class="input-container">
                    <label for="" >Email</label><br><br>
                    <input type="text" name="email" class="input" />
                </div>
               <div class="input-container">
                    <label for="" >Password</label><br><br>
                    <input type="password" name="password" class="input" />
                </div>

    
               <div class="buttons">
                     <input type="submit" name="login" value="LOGIN" class="button">
               </div>

               <div class="last_text">
                    <p>You don't have an account yet? <a href="register.php">Register</a>
                </div>
            </div>
        </div>
        
    </form>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>