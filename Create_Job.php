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

  $targetDirectory = "uploads/";
        $targetFile = $targetDirectory . basename($_FILES["mp3File"]["name"]);
        $uploadOk = 1;
        $mp3FileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        /// Check file size (you can adjust this limit)
        if ($_FILES["mp3File"]["size"] > 5000000) {
            $message[] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }

        // Allow only specific file formats
        if ($mp3FileType != "mp3") {
            $message[] = 'Sorry, only MP3 files are allowed.';
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $message[] = 'Sorry, your file was not uploaded.';
        } else {
            // Move the file to the specified directory
            if (move_uploaded_file($_FILES["mp3File"]["tmp_name"], $targetFile)) {
                $message[] = "The file " . htmlspecialchars(basename($_FILES["mp3File"]["name"])) . " has been uploaded.";
                
            } else {
                $message[] = "Error: " . $_FILES["mp3File"]["error"];
            }
        }
        $new_audio_name=htmlspecialchars(basename($_FILES["mp3File"]["name"])) ;

    if($_POST['song_name']==""){
        $message[] = 'Please enter song name';
    }elseif($_POST['song_writter']==""){
        $message[] = 'Please enter song writers';
    }elseif($_POST['singers']==""){
        $message[] = 'Please enter singers';
    }
    elseif($new_audio_name==""){
        $message[] = 'Please import the mp3 file';
    }
    else{
        $song_name = $_POST['song_name'];
        $song_writter = $_POST['song_writter'];
        $singers = $_POST['singers'];

        $job_query = mysqli_query($conn, "SELECT * FROM `jobs` WHERE song_name = '$song_name' ") or die(mysqli_error($conn));

    if(mysqli_num_rows($job_query) > 0){
            $message[] = 'Job placed already!';
        
        }else{  
            //header("location:Create_Job_Step_2.php?music=$new_audio_name&song_name=$song_name&song_writter=$song_writter&singers=$singers");
            echo "<script> window.location.href='Create_Job_Step_2.php?music=$new_audio_name&song_name=$song_name&song_writter=$song_writter&singers=$singers'</script>";
            
        }
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
    

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/Nevigation.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link rel="stylesheet" href="css/glass-menu.css" />
    <link rel="stylesheet" href="css/Common.css" />
    <link rel="stylesheet" href="css/Create_Job.css" />
   
    

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
      <div class="Main_topic_sides" > 
        CREATE NEW JOB<br />
      </div>
    
      <div class="container_mp3">
        <div class="card_mp3">
          
          <div class="drop_box">
            <header>
              <h4>Upload Song</h4>
            </header>
            <p>Files Supported: mp3</p>
            <input type="file" id="fileInput" name="mp3File" onchange="handleFileSelect(event)" accept=".mp3">
            <label for="fileInput" class="btn">Choose File</label>
          </div>
      
        </div>
      </div>
      <br><br>
      
      <center>
        <div class="Important">- Important Details -</div>
        <br><br>
        
        <div class="create_job_form-field">
          <label for="create_job_inputField" class="create_job_input-label">Song Name *</label>
          <input type="text" name="song_name"  id="create_job_inputField" class="create_job_input-field" placeholder="Type your song name here..." required/>
      </div>

      <div class="create_job_form-field">
        <label for="create_job_inputField" class="create_job_input-label">Writer *</label>
        <input type="text" name="song_writter" id="create_job_inputField" class="create_job_input-field" placeholder="Writer of the Song..." required />
    </div>

    <div class="create_job_form-field">
      <label for="create_job_inputField" class="create_job_input-label">Singer(s) *</label>
      <input multiple type="text" name="singers" id="create_job_inputField" class="create_job_input-field" placeholder="You can add more than one singer..." required/>
       </div>

<br><br>
       <div class="button_holder">
        <div>
          <button class="middle_button_Creator_main" name="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>

  </div>

  
<br><br>


      
      </center>
      
      </form>

            
            
           
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

<!--Loader script end-->
<script src="https://unpkg.com/swup@4"></script>
<script>
  const swup = new Swup();
</script>

<script>
  function handleFileSelect(event) {
    const fileInput = event.target; // Get the file input element
    const fileName = fileInput.files[0].name; // Get the name of the selected file
    const header = document.querySelector('.drop_box header h4'); // Get the h4 element

    // Update the content of the h4 element with the file name
    header.textContent = fileName;
  }
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
