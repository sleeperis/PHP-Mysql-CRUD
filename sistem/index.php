<?php
session_start();
if (!isset($_SESSION["game"])) {
  $_SESSION["game"] = 0;
}
if (isset($_POST["game"])) {
  $_SESSION["game"] += 1;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="w3.css">
  <script type="module" src="./cek map.js"></script>
	<title>tes skripsi</title>
	<style>
    /* The side navigation menu */
.sidebar {
  margin: 0;
  padding: 0;
  width: 200px;
  background-color:rgb(173, 255, 149);
  position: fixed;
  height: 100%;
  overflow: auto;
}

/* Sidebar links */
.sidebar a {
  display: block;
  color: black;
  padding: 16px;
  text-decoration: none;
  font-weight: 900;
}
  

/* Active/current link */
.sidebar a.active {
  background-color: #04AA6D;
  color: white;
}

/* Links on mouse-over */
.sidebar a:hover:not(.active) {
  background-color: #555;
  color: white;
}

/* Page content. The value of the margin-left property should match the value of the sidebar's width property */
div.content {
  margin-left: 200px;
  padding: 1px 16px;
  height: 3000px;
  background-color:black;
}

/* On screens that are less than 700px wide, make the sidebar into a topbar */
@media screen and (max-width: 700px) {
  .sidebar {
    width: 100%;
    height: auto;
    position: relative;
  }
  .sidebar a {float: left;}
  div.content {margin-left: 0;}
}

/* On screens that are less than 400px, display the bar vertically, instead of horizontally */
@media screen and (max-width: 400px) {
  .sidebar a {
    text-align: center;
    float: none;
  }
}
		* {box-sizing:border-box;
    color : white;}

/* Slideshow container */
.slideshow-container {
  max-width: 90%;
  position: relative;
  margin: auto;
  height : 250px;
  
}
.kotak{
  max-width: 90%;
  position: relative;
  margin: auto;
  
  min-height: 5%;
  max-height: 10%;
  overflow: hidden;
  z-index: 52;
  
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: blue;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
  background-color: rgba(203, 201, 236, 0.699);
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(255,255,255,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade1 {
  animation-name: fade1;
  animation-duration: 0.5s;
  overflow: hidden;
}

@keyframes fade1 {
  from {position: relative;
    opacity: 0;
        left : 100%}
  to {position: relative;
        left : 0}
}
.fade2 {
  animation-name: fade2;
  animation-duration: 0.5s;
}

@keyframes fade2 {
  from {position: relative;
    opacity: 0;
        top : -100%;
         }
  to {position: relative;
        top : 0}
}
.list{
  height: 250px;
}
.gambar1{
  position: absolute;
        left : -150%;
        width : 10px;
        opacity: 0;
}
.gambar2{
  position: absolute;
  top : 0; 
  left : 0;
  width: 100%;
  height : auto;
}
.gambar3{
  position: absolute;
  left : 150%;
  width : 10px;
  opacity: 0;
}
.tk{
  transition: 0.5s;
	position: absolute;
  top : 0; 
  left : 0;
  opacity: 100;
  width: 100%;
}
.tka{
  transition: 0.5s;
	position: absolute;
  left : 150%;
  width : 10px;
}
.tki{
  transition: 0.5s;
	position: absolute;
  left : -150%;
  width : 10px;
}
.rightcolumn, .leftcolumn {
  color:Black;
  background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(27,11,154,1) 0%, rgba(68,134,224,1) 34%, rgba(104,210,223,1) 60%, rgba(35,164,209,1) 85%);
   padding: 20px;
  margin-top: 20px;
}
.card{
  /* margin: 5%; */
  opacity: 0.9;
         background-image: radial-gradient(#444cf7 0.5px, #1f1f97 0.5px);
         background-size: 10px 10px;
         /* margin-top:4%; */
  }
  .row{
      margin: 1% 5%;
  }
  .fakeimg {
    opacity: 0.9;
         background-image: radial-gradient(#444cf7 0.5px, black 0.5px);
         background-size: 10px 10px;
  width: 100%;
  padding: 20px;
}
.istilah{
  position: fixed;
  top : 90%;
  left: 3%;
  z-index: 1000;
}
/* CSS */
.gbtn {
  appearance: none;
  background-color: #FFFFFF;
  border-radius: 40em;
  border-style: none;
  box-shadow: #ADCFFF 0 -12px 6px inset;
  box-sizing: border-box;
  color: #000000;
  cursor: pointer;
  display: inline-block;
  font-family: -apple-system,sans-serif;
  font-size: 1.2rem;
  font-weight: 700;
  letter-spacing: -.24px;
  margin: 0;
  outline: none;
  padding: 1rem 1.3rem;
  quotes: auto;
  text-align: center;
  text-decoration: none;
  transition: all .15s;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  position: relative;
  /* top: 85%; */
  left: 45%;
}

.gbtn:hover {
  background-color: #FFC229;
  box-shadow: #FF6314 0 -6px 8px inset;
  transform: scale(1.125);
}

.gbtn:active {
  transform: scale(1.025);
}

@media (min-width: 768px) {
  .gbtn {
    font-size: 1.5rem;
    padding: .75rem 2rem;
  }
}
h2{
    color: white;
    font-weight: 900;
    z-index: 100;
    opacity: 1;
    font-family: "Lucida Handwriting", cursive;
  }
  #canvas1 {
	border: 5px solid black;
	position: relative;
	/* top: 50%; */
	left: 20%;
	/* transform: translate(-50%, -50%); */
	max-width: 100%;
	max-height: 100%;
}

#player, #layer1,#layer2,#layer3,#layer4,#layer5, #enemy_fly, #enemy_plant, #enemy_spider_big, #boom{
	display: none;
}
td, th{
  color: white;
  font-family: "Times New Roman", Times, serif;}
	</style>
</head>
<body>
  <button class="w3-button w3-blue istilah" onclick ="istilah()">Istilah</button>
  <!-- The sidebar -->
<?php
include "menu.php";
?>

<!-- Page content -->
    <div class="content">
                      <br>
                
          
                    
                    <!-- <br>a<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> -->
                    <!-- <h2 align="center">PROFIL 2</h2> -->

                    <div class="kotak">


		<div class="list">
              <img class='gambar2' src="img/logo digita.png" style="width:100%;" >
						  <img class='gambar3' src='img/reserv.png' style="width:100%;" >
						  <img class='gambar1' src='img/RM.png' style="width:100%;" >
						  <br><br>
	    </div>
      <a class="prev" onclick="plusSlide1(-1)">&#10094;</a>
              <a class="next" onclick="plusSlide1(1)">&#10095;</a>
              <br><br>
  
	</div>
  <!-- <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span>
                    <span class="dot" onclick="currentSlide(2)"></span>
                    <span class="dot" onclick="currentSlide(3)"></span>
                    </div> -->
     
	<!--  Slideshow container -->

  <?php
  include "isi.php";
  ?>
<!-- </div> -->
<?php
// include "reserv.php";
?>
</div>

</body>

<script >
 

let slideIndex = 1;
// cek = slideIndex;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
  let slides = document.getElementsByClassName("mySlides");
  if (n == -1 ) {
    for (i = 0; i < slides.length; i++) {
    slides[i].className += " fade1";
    }
  } else {
    for (i = 0; i < slides.length; i++) {
    slides[i].className += " fade2";
  }
  }
  setTimeout(rem,300);
}
function rem() {
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].classList.remove("fade1","fade2");
  }
}
// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}


let i = 0;


setTimeout(plusSlide1,5000, 1);


function plusSlide1(cek) {
  c =[];
  g=[];
for (let i = 1; i < 4; i++) {
        a = 'gambar'+i;
        
        inputg(a,i-1);
        // console.log(a[1]);  

    }
    for (let i = 0; i < g.length; i++) {
    if (g[i].classList.value=="gambar2") {
    c[i] = true;
    }else{
      c[i] = false;
    }
}
  // document.querySelector(".kotak").style.overflow = "visible";
  showSlide1(cek);  
  setTimeout(back,500, cek);
  setTimeout(plusSlide1,5000, 1);
}

function back(ka) {
  // ko = ka-1;
  // kc = ka+1;
  // ke = ka+2;
  // k = ka;
  // kx = ka+1;
  // ky = ka+2;
  
  // if (kx > g.length) {kx = 1}
  // if (kx < 1) {kx = g.length}
  // if (ky > g.length) {ky = 1}
  // if (ky < 1) {ky = g.length}
  // if (k > g.length-1) {k = 0}
  // if (k < 0) {k = g.length-1}
  // if (ko > g.length-1) {ko = 0}
  // if (ko < 0) {ko = g.length-1}
  // if (kc > g.length-1) {kc = 0}
  // if (kc < 0) {kc = g.length-1}
  // if (ke > g.length-1) {ke = 0}
  // if (ke < 0) {ke = g.length-1}
  // if (ka > g.length) {ka = 1}
  // if (ka < 1) {ka = g.length}
  // document.querySelector(".kotak").style.overflow = "hidden";
  g[0].classList.remove("tk","tka","tki");
  g[1].classList.remove("tk","tka","tki");
  g[2].classList.remove("tk","tka","tki");
 
  // g[0].classList.replace("gambar1", "gambar2"); 
  // g[1].classList.replace("gambar2", "gambar3");

 
  if (c[0] == true && ka == -1) {
  g[0].classList.replace("gambar2", "gambar3"); 
  g[1].classList.replace("gambar3", "gambar1");
  g[2].classList.replace("gambar1", "gambar2"); 
  }
  if (c[1] == true && ka == -1) {
  g[0].classList.replace("gambar1", "gambar2"); 
  g[1].classList.replace("gambar2", "gambar3");
  g[2].classList.replace("gambar3", "gambar1"); 
  }
  if (c[2] == true && ka == -1) {
  g[0].classList.replace("gambar3", "gambar1"); 
  g[1].classList.replace("gambar1", "gambar2");
  g[2].classList.replace("gambar2", "gambar3"); 
  }
  if (c[0] == true && ka == 1) {
  g[0].classList.replace("gambar2", "gambar1"); 
  g[1].classList.replace("gambar1", "gambar3");
  g[2].classList.replace("gambar3", "gambar2"); 
  }
  if (c[1] == true && ka == 1) {
  g[0].classList.replace("gambar1", "gambar3"); 
  g[1].classList.replace("gambar2", "gambar1");
  g[2].classList.replace("gambar3", "gambar2"); 
  }
  if (c[2] == true && ka == 1) {
  g[0].classList.replace("gambar3", "gambar2"); 
  g[1].classList.replace("gambar1", "gambar3");
  g[2].classList.replace("gambar2", "gambar1"); 
  } 
  
  // console.log("gambar"+ka+k+g.length);
}

function inputg(a, b){
        tes = document.getElementsByClassName(a);
        g[b]= tes[0];
    }
    

// console.log(g);
function showSlide1(ka) {
  if (c[0] == true && ka == -1) {
    g[0].classList.add("tka");
    g[2].classList.add("tk");
  }
  if (c[1] == true && ka == -1) {
    g[1].classList.add("tka");
    g[0].classList.add("tk");
  }
  if (c[2] == true && ka == -1) {
    g[2].classList.add("tka");
    g[1].classList.add("tk");
  }
  if (c[0] == true && ka == 1) {
    g[0].classList.add("tki");
    g[1].classList.add("tk");
  }
  if (c[1] == true && ka == 1) {
    g[1].classList.add("tki");
    g[2].classList.add("tk");
  }
  if (c[2] == true && ka == 1) {
    g[2].classList.add("tki");
    g[0].classList.add("tk");
  }
  // g[1].classList.add("tka");
  // g[2].classList.add("tk");
}



// let slideIndex = 0;
// showSlides();

// function showSlides() {
//   let i;
//   let slides = document.getElementsByClassName("mySlides");
//   for (i = 0; i < slides.length; i++) {
//     slides[i].style.display = "none";
//   }
//   slideIndex++;
//   if (slideIndex > slides.length) {slideIndex = 1}
//   slides[slideIndex-1].style.display = "block";
//   setTimeout(showSlides, 500); // Change image every 2 seconds
// }
a = 1;
b=2;
a,b=b,a;
// console.log(g[1].classList.value, c)


(g=>{var h,a,k,p="The Google Maps JavaScript API",c="google",l="importLibrary",q="__ib__",m=document,b=window;b=b[c]||(b[c]={});var d=b.maps||(b.maps={}),r=new Set,e=new URLSearchParams,u=()=>h||(h=new Promise(async(f,n)=>{await (a=m.createElement("script"));e.set("libraries",[...r]+"");for(k in g)e.set(k.replace(/[A-Z]/g,t=>"_"+t[0].toLowerCase()),g[k]);e.set("callback",c+".maps."+q);a.src=`https://maps.${c}apis.com/maps/api/js?`+e;d[q]=f;a.onerror=()=>h=n(Error(p+" could not load."));a.nonce=m.querySelector("script[nonce]")?.nonce||"";m.head.append(a)}));d[l]?console.warn(p+" only loads once. Ignoring:",g):d[l]=(f,...n)=>r.add(f)&&u().then(()=>d[l](f,...n))})
        ({key: "AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg", v: "weekly"});
        // Initialize and add the map

function istilah(){
  p=document.getElementById('petugas4');
  p.style.display = "block";
}

</script>
</html>

