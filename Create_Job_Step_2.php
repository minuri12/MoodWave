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

    if($_POST['workers_need']==""){
        $message[] = 'Please enter amount of needed workers';
    }elseif($_POST['workers_earn']==""){
        $message[] = 'Please enter workers earn money';
    }else{

        $new_audio_name = $_GET['music'];
        $song_name = $_GET['song_name'];
        $song_writter = $_GET['song_writter'];
        $singers = $_GET['singers'];
        $workers_need =$_POST['workers_need'];
        $workers_earn =$_POST['workers_earn'];
        
        //header("location:Payment.php?music=$new_audio_name&song_name=$song_name&song_writter=$song_writter&singers=$singers&workers_need=$workers_need&workers_earn=$workers_earn");
        echo "<script> window.location.href='Payment.php?music=$new_audio_name&song_name=$song_name&song_writter=$song_writter&singers=$singers&workers_need=$workers_need&workers_earn=$workers_earn'</script>";    
        
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
   
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/Create_Job_Step_2.css" />
    <link rel="stylesheet" href="ChatBot/botstyle.css">
    <script src="ChatBot/botscript.js" defer></script>
   
    

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
<br><br><br><br><br><br><br><br>
  <div class="about">

    <!-- partial:index.partial.html -->


    <section class="Land" >
      
      
      
      
      <center>
        
        <br><br>
        
        <div class="Listner_head">- Listners Details -</div>
<br>
  <div class="create_job_form-field">
    <label for="create_job_inputField" class="create_job_input-label">Workers Will earn ( LKR ) *</label>
    <input type="number" min="20" name="workers_earn" id="create_job_inputField" required class="create_job_input-field" placeholder="More than LKR.20.00..." />
</div>

<div class="create_job_form-field">
  <label for="create_job_inputField" class="create_job_input-label">Workers needed *</label>
  <div class="slider">
  
    <input type="range" min="5" max="1000" value="200" name="workers_need" required oninput="rangeValue.innerText = this.value">
    <p id="rangeValue">200</p>
    </div> 
</div>





<br /><br />

<br>
<div class="button_holder">
  <div>
    <a href="Create_Job.php"
      ><button class="middle_button_Creator_main" ><i class="fa-solid fa-arrow-left"></i></button></a
    >
    </div>
    <br />
    <button class="middle_button_Creator_main" name="next"><i class="fa-solid fa-arrow-right"></i></button>
  </div>

  </div>
<br><br>




    


      
      
      </center>
      
      </form>

            <!--<div class="input__box">
              <span class="details">Workers needed</span>
              <input type="number"  placeholder="0" min="1" max="200">
            </div>


            <div class="input__box">
              <span class="details">Workers Will earn ( LKR )</span>
  <select id="pay" name="pay">
 
      <option value="50" style="margin-top: 20px;">50</option>
      <option value="75">75</option>
      <option value="100">100</option>
      <option value="150">150</option>
    -->

  </select>
  <!--<button class="Middle_button" >Submit</button>-->
            
            
           
        </div>

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
          let counter = 0;

function increment() {
  counter++;
}

function decrement() {
  counter--;
}

function get() {
  return counter;
}

const inc = document.getElementById("increment");
const input = document.getElementById("input");
const dec = document.getElementById("decrement");

inc.addEventListener("click", () => {
  increment();
  input.value = get();
});

dec.addEventListener("click", () => {
  if (input.value > 0) {
    decrement();
  }
  input.value = get();
});
        </script>

<!--Need-->
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

<script>

  var inputField = document.getElementById("create_job_inputField");

 
  inputField.addEventListener("input", function() {

    var value = parseFloat(inputField.value);

    if (value < 20) {
     
      inputField.style.borderColor = "red";
    } else {
      
      inputField.style.borderColor = "#026eee";
    }
  });
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
