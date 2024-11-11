////////////////Input
let slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("focus");
  // let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].autofocus = false;
  }
  // for (i = 0; i < dots.length; i++) {
  //   dots[i].className = dots[i].className.replace(" active", "");
  // }
  // slides[slideIndex-1].autofocus = true;
  // slides[slideIndex-1].setAttribute("autofocus", "autofocus");
  slides[slideIndex-1].focus();
  // dots[slideIndex-1].className += " active";
  //console.log(slides[1]);
}
window.addEventListener("keydown", e => {
  if(e.key === "ArrowUp"){
    plusSlides(-1);
  }else if(e.key === "ArrowDown"){
    plusSlides(1);
  }else if(e.key === "="){
    update();
  };
  //console.log(e.key === "ArrowDown");
})