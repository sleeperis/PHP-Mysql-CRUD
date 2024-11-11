
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
function plusSlide(cek) {
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
  showSlide(cek);  
  setTimeout(back,2000, cek);
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
function showSlide(ka) {
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
//   setTimeout(showSlides, 2000); // Change image every 2 seconds
// }
a = 1;
b=2;
a,b=b,a;