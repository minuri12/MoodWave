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

 $creator_id = 1;


if(isset($_POST['next'])){


    $song_name = $_POST['song_name'];
    $song_writter = $_POST['song_writter'];
    $singers = $_POST['singers'];
    $workers_need = $_POST['workers_need'];
    $workers_earn = $_POST['workers_earn'];
    $placed_on = date('d-M-Y');



    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["mp3File"]["name"]);
    $uploadOk = 1;
    $mp3FileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (you can adjust this limit)
    if ($_FILES["mp3File"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow only specific file formats
    if ($mp3FileType != "mp3") {
        echo "Sorry, only MP3 files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Move the file to the specified directory
        if (move_uploaded_file($_FILES["mp3File"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["mp3File"]["name"])) . " has been uploaded.";
        } else {
            
            echo "Sorry, there was an error uploading your file.";
            echo "Error: " . $_FILES["mp3File"]["error"];

        }
    }
    $new_audio_name=htmlspecialchars(basename($_FILES["mp3File"]["name"])) ;



    $job_query = mysqli_query($conn, "SELECT * FROM `jobs` WHERE song_name = '$song_name' ") or die(mysqli_error($conn));

   if(mysqli_num_rows($job_query) > 0){
        $message[] = 'Job placed already!';
      
    }else{
        mysqli_query($conn, "INSERT INTO `jobs`(creater_id,song_name,song_writter,singers,music,workers_need,workers_earn,placed_on) VALUES('$creator_id', '$song_name', '$song_writter', '$singers', '$new_audio_name', '$workers_need', '$workers_earn','$placed_on')") or die(mysqli_error($conn));

        $message[] = 'job placed successfully!';

        $job_id_query = mysqli_query($conn, "SELECT * FROM `jobs` WHERE song_name = '$song_name' && creater_id='$creator_id' && placed_on='$placed_on' ") or die(mysqli_error($conn));
        $fetch_job_id = mysqli_fetch_assoc($job_id_query);
        $job_id=$fetch_job_id['job_id'];
        
        header("location:post_job_payment.php?job_id='$job_id'");
        
    }
}else{
    // header('location:post_job_payment.php?jdedjed');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job</title>
    <link rel="stylesheet" href="css/post_job.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"> -->
</head>
<body>
<header class="header">
    
    <section class="flex">
        
        <div class="back">
            <a href="#"><i class="fa-solid fa-arrow-left"></i></a>
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
    <div class="title">
        <h1>CREATE NEW JOB</h1>
    </div>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        
            <div class="row1">
                <div class="input-container">
                    <label for="" >Song Name</label><br>
                    <input type="text" name="song_name" class="input" />
                </div>
                <div class="input-container">
                    <label for="">Song Writer Name</label><br>
                    <input type="text" name="song_writter" class="input" />
                </div>
                <div class="input-container">
                    <label for="">Singers</label><br>
                    <input type="text" name="singers" class="input" />
                </div>
            </div>
            <div class="row2">
                <!-- <img src="images/input-box.png"> -->
                <div class="input-container">
                    <label for="">Music</label><br>
                    <!-- <input type="file" name="music" class="input music-input" /> -->
                    <label for="mp3File" class="drop-container" id="dropcontainer">
                    <span class="drop-title">Browse File to Upload ( Mp3)</span>
                    
                    <input type="file" id="mp3File" name="mp3File" class="uploading">
                </label>
                </div>

                

                <div class="sub-row">
                    <div class="input-container">
                        <label for="">Workers needed </label><br>
                        <input type="number" name="workers_need" src="images/input-box.png" class="input sub-input" />
                    </div>
                    <div class="input-container">
                        <label for="">Workers Will earn(LKR)</label><br>
                        <input type="number" name="workers_earn" class="input sub-input" />
                    </div>
                </div>
            </div>
        </div>
        <div class="lines">
            <div class="box box1">
            </div>
            <div class="box box2">
            </div>
        </div>
        <div class="buttons">
            <input type="submit" name="next" value="Next" class="button">
        </div>
    </form>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>