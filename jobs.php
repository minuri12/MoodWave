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

//Testing
$user_id=1;


//=====We have to give this in the final========

// $user_id = $_SESSION['user_id'];


// if(!isset($user_id)){
//    header('location:login.php');
// };

//==================================================



if(isset($_POST['search'])){
    $search_value = $_POST['job_name'];
    
    header("location:job_search_page.php?searching=$search_value");
 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs</title>
    <link rel="stylesheet" href="css/jobs.css">
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

<section class="content">
    
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <div class="title">
                    <h1>JOBS</h1>
                </div>
                <div class="desc">
                    <p>Complete the task with honesty, and rest assured that we will initiate payment once we have verified the thoroughness and accuracy of your work. Your commitment to quality is greatly appreciated, and our payment process is designed to ensure fair compensation for your dedicated efforts.</p>
                </div>

                <div class="input-container">
                    <input type="text" name="job_name" class="input" placeholder="Search the Artist or Song"/>
                    <input type="submit" name="search" class="search-btn"></input>
                </div>
        </div>
        <div class="box-container">

                <?php
                
                $select_jobs = mysqli_query($conn, "SELECT * FROM `jobs` WHERE creater_id='$user_id'") or die('query failed');
                if(mysqli_num_rows($select_jobs) > 0){
                    while($fetch_jobs = mysqli_fetch_assoc($select_jobs)){
                ?>
                    <?php $id=$fetch_jobs['job_id'];?>
                    <a href="job_complete.php?id=<?php echo $id ?>">
                    <div class="box" id="box">
                        <div class="name">
                            <div class="s_name">
                                <?php echo $fetch_jobs['song_name']; ?>
                            </div>
                            <div class="s_singer">
                                <?php echo $fetch_jobs['singers']; ?>
                            </div>
                                
                            
                        </div>

                        <div class="complete">
                            <div class="complete_desc">
                                <?php 
                                    $complete_no=$fetch_jobs['completed']; 
                                    $works=$fetch_jobs['workers_need'];
                                    $remaning=$works-$complete_no;
                                    echo $remaning.' of '.$works.' remaining';
                                ?>
                            </div>
                            <?php
                                if($remaning>=90){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:180px;background-color: green;"></div> 
                                    <div class="complete_bar_2" style="width:20px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=80){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:120px;background-color: green;"></div> 
                                    <div class="complete_bar_2" style="width:80px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=70){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:60px;background-color: green;"></div> 
                                    <div class="complete_bar_2" style="width:140px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=60){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:180px;background-color: yellow;"></div> 
                                    <div class="complete_bar_2" style="width:20px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=50){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:120px;background-color: yellow;"></div> 
                                    <div class="complete_bar_2" style="width:80px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=40){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:60px;background-color: yellow;"></div> 
                                    <div class="complete_bar_2" style="width:140px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=30){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:180px;background-color: red;"></div> 
                                    <div class="complete_bar_2" style="width:20px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=20){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:140px;background-color: red;"></div> 
                                    <div class="complete_bar_2" style="width:60px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>=10){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:80px;background-color: red;"></div> 
                                    <div class="complete_bar_2" style="width:120px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning>0){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:5px;background-color: red;"></div> 
                                    <div class="complete_bar_2" style="width:195px;background-color: white;"></div> 
                                    </div>';
                                }elseif($remaning<=0){
                                    echo '<div class="complete_bar">
                                    <div class="complete_bar_1" style="width:0px;background-color: red;"></div> 
                                    <div class="complete_bar_2" style="width:200px;border-top-left-radius: 5px;border-bottom-left-radius: 5px;background-color: white;"></div> 
                                    </div>';
                                }
                            ?>
                            
                            
                            
                            
                            
                        </div>

                        <div class="price">
                            LKR &nbsp;<?php echo $fetch_jobs['workers_earn']; ?>.00
                        </div>
                    </div>
                    </a>
                <?php
                    }
                }else{
                    echo '<p class="empty">no Jobs placed yet!</p>';
                }
                ?>
   </div>
        
    </form>
    <?php 
        echo "<script>
            const myDiv = document.querySelector('#myDiv');

            // add a click event listener to the div
            myDiv.addEventListener('click', function() {
            // specify the action to take when the div is clicked
            console.log('Div was clicked!');
            });
        </script>";
    ?>
    <div class="footer-images">
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-square-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
    </div>

</section>
    <script src="https://kit.fontawesome.com/f05855486d.js" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>
</html>