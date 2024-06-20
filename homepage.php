<?php
session_start();
include("connect.php");

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    
      

  
</body>
</html>

<PE html>
    <html lang="en">
      <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Spots</title>
        <link rel="stylesheet" href="style.css" />
      </head>
      <body>
        <nav>
          
            <a href="index.html"><div class="logo">Surf Connect ‎ ‎  ‎  ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎  ‎ ‎ ‎  ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎  ‎ ‎ ‎ ‎ ‎ ‎ ‎ ‎ </div></a>
             Hello <?php 
       if(isset($_SESSION['email'])){
        $email=$_SESSION['email'];
        $query=mysqli_query($conn, "SELECT users.* FROM `users` WHERE users.email='$email'");
        while($row=mysqli_fetch_array($query)){
            echo $row['firstName'].' '.$row['lastName'];
        }
       }
       ?>
       :)
      </p>
          <div class="nav-items">
            <a href="index.html">Home</a> <a href="about.html">About</a> <a href="contact.html">Contact</a> <a href="index.html">Logout</a>
          </div>
        </nav>
        
        <section class="hero">
        <style>
        #surf-spots-title {
            text-align: center;
            font-size: 3em;
            fo
        }
    </style>
</head>
<body>
    <h1 id="surf-spots-title">Surf Spots</h1>
</body>
          
               
        
                       </div>
                   </body>
                   
                   
                   <div class="image-grid">
                       <div>
                           
                           
                           <a href="postsManly/form.php">
                               <img src="Images/Manly.jpg" alt="Image 1">
                           </a>
                         <div class="image-title">Manly</div>
                       </div>
                       <div>
                           <a href="postsDeewhy/form.php">
                           
                        <img src="Images/Deewhy.jpg" alt="Image 2">
                             </a>
                         <div class="image-title">Deewhy</div>
                       </div>
                       <div>
                           <a href="postsFreshwater/form.php"> 
                         <img src="Images/Freshwater.jpg" alt="Image 3">
                       </a>
                         <div class="image-title">Freshwater</div>
                       </div>
                       <div>
                           <a href="postsCurlCurl/form.php">
                         <img src="Images/Curlcurl.jpg" alt="Image 4">
                       </a>
                         <div class="image-title">Curlcurl</div>
                       </div>
                       <div class="centered-image">
                           <a href="postsLongreef/form.php">
                         <img src="Images/Longreef.jpg" alt="Image 5">
                       </a>
                         <div class="image-title">Longreef</div>
                       </div>
                     </div>
            
            </div>
          </div>
        </section>
      </body>
    </html>