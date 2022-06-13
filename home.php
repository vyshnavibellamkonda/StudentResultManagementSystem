<html>
<head></head>
<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;}

.slideshow-container {
  max-width: 1400px;
  position: relative;
  margin: auto;
}

.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

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
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
.image{
color: #fff;
font: 87.5%/1.5em 'Open Sans', sans-serif;
background:url(img/vig1.jpg)no-repeat center center fixed; 
-webkit-background-size: cover;
-moz-background-size: cover;
-o-background-size: cover;
background-size: cover;}
.header1{
    background-color:#000080;
    color:#000080;
}
.header{
    background-color:#000080;
    color:#FFFFFF;
}
.center {
display: block;
margin-left: auto;
margin-right: auto;
width: 30%;
}
.logo{
    background-color:#FFFFFF;
}
ul li{
    display: inline;
}
</style>
<body>
    <div class="logo"><img src="img/v.png" class="center" height="150px"></div>
    <div class="header">
    <ul style="list-style-type:none;">
    <li><a href="about.php" aria-current="page" style="color:#FFFFFF;text-decoration:none;font-family:papyrus;margin-right:10px;">ABOUT</a></li>
    <li><a href="login.php" aria-current="page" style="color:#FFFFFF;text-decoration:none;font-family:papyrus;margin-right:10px;">ADMIN</a></li>
    <li><a href="student.php" aria-current="page" style="color:#FFFFFF;text-decoration:none;font-family:papyrus;margin-right:10px;">STUDENTS</a></li>
    <li><a href="contact.php" aria-current="page" style="color:#FFFFFF;text-decoration:none;font-family:papyrus;margin-right:10px;">CONTACT</a></li>
    </ul>
    </div>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="img/vig1.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img/vig2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img/vig4.jfif" style="width:100%">
  <div class="text">The road to success and the road to failure are almost exactly the same.</div>
</div>
</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 4000);
}
</script>
</body>
</html>