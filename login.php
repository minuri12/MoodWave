<?php

@include 'config.php';

session_start();


if(isset($_POST['login'])){

   
    $username = $_POST['username'];
    $password = $_POST['password'];

    $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username' AND password = '$password'") or die('query failed');


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
       $message[] = 'incorrect username or password!';
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
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />
   
    

    <link rel="icon" href="../images/icon.ico" type="image/x-icon" />
    <title>MoodWave</title>
  </head>

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
  <body style="margin: 0; padding: 0; height: 100%; display: flex; flex-direction: column;">


      <img  src="images/Shadow.png" alt="" class="card_image" style="width:700px ;z-index: -1; height: 500px;">
    <!-- partial:index.partial.html -->

   
        <img  src="images/Shadow.png" alt="" class="card_image" style="width:700px ;z-index: -1; height: 500px;">
    <!-- partial:index.partial.html -->
  
  
      
      <div class="container_card_Login">
          <div class="Login_card" >
            <div ><img src="images/Login_text.png" alt="" class="Mood_text" ></div>


          
          </div>
     
  
          <div class="registerform">
              <form action="" method="POST" enctype="multipart/form-data">
                  <div class="row2">
                    <i class="fas fa-arrow-left" style="color: rgb(255, 255, 255);"></i><br><br>
                      <div class="title">
                        
                         <h1>Welcome Back!</h1>
                      </div>
                       <br>
                      <div class="input-container">
                           <label for="" >UserName</label><br>
                           <input type="text" name="username" class="input" />
                       </div>
                      <div class="input-container">
                           <label for="" >Password</label><br>
                           <input type="text" name="password" class="input" />
                       </div>
       
           
                      <div >
                            <input type="submit" name="login" value="Login" class="Middle_button_start" style="border-radius: 10px;margin: 0;height: 40px;">
                      </div>
       <br>
                      <div class="last_text">
                           <p>You don't have an account yet? <a href="register.php">Register</a>
                       </div>
                   </div>
               </div>
               
           </form>
                  
              </form>
          </div>




</html>
