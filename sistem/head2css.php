* {box-sizing:border-box;
    color : white}

/* Slideshow container */
.slideshow-container {
  max-width: 100%;
  position: relative;
  margin: auto;
  height : 250px
  
}
.kotak{
  max-width: 90%;
  position: relative;
  margin: auto;
  
  min-height: 5%;
  max-height: 10%;
  overflow: hidden;
  
}

/* Hide the images by default */
.mySlides {
  display: none;
  width:100%;
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
  animation-duration: 0.3s;
}

@keyframes fade1 {
  from {position: absolute;
        top : 100%}
  to {position: absolute;
        top : 0}
}
.fade2 {
  animation-name: fade2;
  animation-duration: 0.3s;
}

@keyframes fade2 {
  from {position: absolute;
        top : -100%}
  to {position: absolute;
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
  transition: 2s;
	position: absolute;
  top : 0; 
  left : 0;
  opacity: 100;
  width: 100%;
}
.tka{
  transition: 2s;
	position: absolute;
  left : 150%;
  width : 10px;
}
.tki{
  transition: 2s;
	position: absolute;
  left : -150%;
  width : 10px;
}