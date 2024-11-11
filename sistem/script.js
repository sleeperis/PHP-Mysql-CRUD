let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n, cek) {
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  console.log(n);
  if (cek==1) {
    for (i = 0; i < slides.length; i++) {
    slides[i].className = slides[i].className.replace("fade", "fade1");
  }
  }else {
    for (i = 0; i < slides.length; i++) {
      slides[i].className = slides[i].className.replace("fade1", "fade");
    }
  }
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
 
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n==1) {
    for (i = 0; i < slides.length; i++) {
    slides[i].className = slides[i].className.replace("fade", "fade1");
  }
  }else {
    for (i = 0; i < slides.length; i++) {
      slides[i].className = slides[i].className.replace("fade1", "fade");
    }
  }
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
// g=0;
// function game(){
//     gam = document.querySelector(".gbtn");
//     gam.innerHTML = "STOP";
//   }
