<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="img/img3.png" style="width:100%; height:500px">
    <div class="text">Caption Text</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="img/img2.jpeg" style="width:100%; height:500px">
    <div class="text">Caption Two</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="img/img1.jpeg" style="width:100%; height:500px">
    <div class="text">Caption Three</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1,-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1,1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
</div>

<div class="leftcon" >
  <h2 align="center">Mini-game</h2>
  <?php
  if (fmod($_SESSION['game'],2) == 1 ) {
    include_once "game.html";?>
    <form action="./" method="post">
  <button class= "gbtn" name ="game" >Stop</button>
  
	</form>
  <?php
    
  }else{
  
  ?>
  <form action="./" method="post">
  <button class= "gbtn" name ="game" >Play</button>
  
	</form>
  <?php
  }
  ?>

</div>
<div class="rightcon">
<?php include "reserv.php"; ?>
</div>