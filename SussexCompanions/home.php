<?php
	session_start();
	if(!isset($_SESSION["uname"])) {
		header("Location: custlogin.php");
		exit();
	}
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="style4.css">
    <script src="https://kit.fontawesome.com/84932a2cbb.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <meta name="viewport" content="width =device-width, initial-scale=1">
</head>

<body>
    <?php include "home_header.html"?>
    <section id="banner">
        <div class="banner-text">
            <h1>Sussex Companions</h1>
            <p>Happiness is the Ultimate Goal</p>           
        </div>
    </section>
    
    <section id="service">
        <div class="title-text">
            <p>Services</p>
            <h1>Get started</h1>
        </div>
        <div class="service-box">
            <div class="single-service">
                <img src="images/Y.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Book an Event</h3><a href="schedule.php" style="color:white;">
                    <p>Exciting new events coming your way.<br>Hurry limited seats available!<br>Click here to book now</p></a>
                </div>
            </div>
            <div class="single-service">
                <img src="images/e.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Meet New Friends</h3><a href="matching_response.php" style="color:white;">
                    <p>Get matched with new friends.<br> Click here so see your matches</p></a>
                </div>
            </div> 
            <div class="single-service">
                <img src="images/d.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Payments</h3><a href="main.php" style="color:white;">
                    <p>Keep your payments in track<br>Click here so see your payments <br></p></a>
                </div>
            </div>
 			<div class="single-service">
                <img src="images/f.jpg">
                <div class="overlay"></div>
                <div class="service-desc">
                    <h3>Leave a Review</h3><a href="#" style="color:white;">
                    <p>We'd like to know what you think.<br> If you can spare a few minutes to leave us a review we'd be super grateful!</p></a>
                </div>
            </div> 	
        </div>
    </section>
	
	<div class = "about">
   <div class = "us">About Us<br><br>
   <i class="fab fa-facebook"></i>
   <i class="fab fa-twitter-square"></i>
   <i class="fab fa-instagram"></i>
   <i class="fab fa-youtube"></i>
   
 <div style="float:right;">
     Sussex Companions Club<br>
     Brighton<br>
     England<br>
     United Kingdom<br>
     Contact No: +44 7911 132546
	 </div>
 </div>
</div>
 <div class = "footer">  	
<div class="copyright"> © 2021 Copyright: SussexCompanions.com<br><br></div>
  </div>
</body>

</html>
