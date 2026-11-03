<?php 
session_start();
include("language.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Photo Gallery</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php include("GlobalCss.php"); ?>
  <?php include("GlobalJs.php"); ?>
  <style>
       body{
font-family:'Segoe UI',Arial,sans-serif;
background:linear-gradient(120deg,#f4f7fb,#eef2f7);
margin:0;
}

/* Title */

h1{
text-align:center;
font-size:36px;
margin:50px 0 10px;
font-weight:700;
background:linear-gradient(90deg,#003973,#0056b3);
-webkit-background-clip:text;
-webkit-text-fill-color:transparent;
}

/* Gallery Grid */

.albums{
display:grid;
grid-template-columns:repeat(auto-fit,minmax(260px,1fr));
gap:35px;
max-width:1250px;
margin:auto;
padding:20px;
}

/* Album Card */

.album{
background:#fff;
border-radius:16px;
overflow:hidden;
cursor:pointer;
box-shadow:0 10px 28px rgba(0,0,0,0.1);
transition:all .4s ease;
position:relative;
}

/* Hover Glow */

.album:hover{
transform:translateY(-10px) scale(1.02);
box-shadow:0 20px 45px rgba(0,0,0,0.25);
}

/* Image */

.album img{
width:100%;
height:220px;
object-fit:cover;
transition:transform .5s ease;
}

.album:hover img{
transform:scale(1.12);
}

/* Overlay */

.album::after{
content:"View Gallery";
position:absolute;
top:50%;
left:50%;
transform:translate(-50%,-50%);
background:rgba(0,0,0,0.6);
color:#fff;
padding:8px 16px;
border-radius:20px;
font-size:14px;
opacity:0;
transition:.3s;
}

.album:hover::after{
opacity:1;
}

/* Album Title */

.album h3{
text-align:center;
padding:16px;
margin:0;
font-size:18px;
font-weight:600;
color:#333;
background:#fff;
}

/* Popup */

.popup{
display:none;
position:fixed;
z-index:999;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(0,0,0,0.96);
justify-content:center;
align-items:center;
backdrop-filter:blur(6px);
}

.image-counter{
position:absolute;
top:15px;
left:20px;
background:rgba(0,0,0,0.6);
color:#fff;
padding:6px 14px;
border-radius:20px;
font-size:14px;
font-weight:600;
}
/* Popup Viewer */

.popup-content{
position:relative;
width:90%;
max-width:1000px;
height:620px;
border-radius:14px;
background:#000;
display:flex;
align-items:center;
justify-content:center;
box-shadow:0 25px 70px rgba(0,0,0,0.8);
overflow:hidden;
}

/* Image */

.popup-content img{
max-width:100%;
max-height:100%;
object-fit:contain;
}

/* Close Button */

.close{
position:absolute;
top:15px;
right:20px;
font-size:36px;
color:#fff;
cursor:pointer;
z-index:1002;
transition:.3s;
}

.close:hover{
transform:scale(1.2);
}

/* Slideshow Controls */

.slideshow-controls{
position:absolute;
bottom:20px;
left:50%;
transform:translateX(-50%);
display:flex;
gap:14px;
z-index:1001;
}

/* Buttons */

.slideshow-controls button{
padding:8px 18px;
border:none;
border-radius:30px;
background:linear-gradient(135deg,#ffffff,#e3e8ef);
font-weight:600;
cursor:pointer;
transition:.3s;
}

.slideshow-controls button:hover{
transform:scale(1.08);
box-shadow:0 6px 18px rgba(0,0,0,0.3);
}

/* Image Counter */

.image-counter{
position:absolute;
top:18px;
left:20px;
background:rgba(0,0,0,0.6);
color:#fff;
padding:6px 14px;
border-radius:20px;
font-size:14px;
}

/* Mobile */

@media(max-width:768px){

.popup-content{
height:420px;
}

.album img{
height:180px;
}

h1{
font-size:28px;
}

}
    </style>
</head>
<body class="wp-smartstudy">
<div class="wrapper">

  <!-- Header -->
  <?php include("header.php"); ?>	

  <!-- Breadcrumb -->
  <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <ul class="cs-breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li>Photo Gallery</li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <!-- Gallery Section -->
  <h1>Photo Gallery</h1>

  <div class="albums">
    
    <div class="album" onclick="openGallery('foundation-day')">
      <img src="assets/extra-images/foundation-.jpeg" alt="Foundation Day">
      <center><h3>43rd Foundation Day</h3></center>
    </div>
    <div class="album" onclick="openGallery('science_day')">
      <img src="assets/extra-images/director_26.jpg" alt="science day">
      <center><h3>National Science Day </h3></center>
    </div>
    <div class="album" onclick="openGallery('swachhata')">
      <img src="assets/extra-images/drawing1.jpg" alt="swachhata">
      <center><h3>Swachhata Pakhwada</h3></center>
      </div>
    <div class="album" onclick="openGallery('Republic-Day-2026-1')">
      <img src="assets/extra-images/republic1.jpg" alt="Republic-Day-2026-1">
      <center><h3>Republic day 2026</h3></center>
    </div>
    <div class="album" onclick="openGallery('Khelo India initiative by Sports Authority of India')">
      <img src="assets/gallery/Khelo India initiative by Sports Authority of India/KheloIndia0.jpg" alt="Khelo India initiative by Sports Authority of India">
      <center><h3>Khelo India by SAI</h3></center>
    </div>
    <div class="album" onclick="openGallery('world-health-day')">
      <img src="assets/extra-images/Foundation1.jpg" alt="World Health Day">
      <center><h3>World Health Day</h3></center>
    </div>
    <div class="album" onclick="openGallery('womens-day')">
      <img src="assets/extra-images/womanday1.jpg" alt="Women's Day">
      <center><h3>Women's Day</h3></center>
    </div>
    <div class="album" onclick="openGallery('yogaday')">
      <img src="assets/extra-images/yogadayjpg.jpg" alt="Yoga Day">
      <center><h3>Yoga Day</h3></center>
    </div>
    <div class="album" onclick="openGallery('Sickle_Cell')">
      <img src="assets/extra-images/Sickle_Day.jpg" alt="World Sickle Cell Day">
      <center><h3>World Sickle Cell Day</h3></center>
    </div>
    <div class="album" onclick="openGallery('inbix-2025')">
      <img src="assets/extra-images/inbix.jpeg" alt="Inbix-2025">
      <center><h3>Inbix-2025</h3></center>
    </div>
     
       <div class="album" onclick="openGallery('independence_day')">
      <img src="assets/extra-images/Independence.jpg" alt="independence day">
      <center><h3>Independence day</h3></center>
      </div>
    
     
   <!-- <div class="album" onclick="openGallery('workshop')">
      <img src="assets/extra-images/WORKSHOP.jpg" alt="workshop">
      <center><h3>Workshop</h3></center>
    </div>
   <div class="album" onclick="openGallery('conference')">
      <img src="assets/extra-images/conference.jpeg" alt="Malaria Conference">
      <center><h3>Malaria Conference</h3></center>
    </div>-->
     <div class="album" onclick="openGallery('shine')">
      <img src="assets/gallery/shine/shine1.jpeg" alt="shine">
      <center><h3>Shine</h3></center>
    </div>
  </div>
   <!-- Popup Lightbox -->
 <div id="popup" class="popup">

  <div class="popup-content">

    <div class="image-counter" id="imageCounter"></div>

    <span class="close" onclick="closeGallery()">&times;</span>

    <img id="slideshow-img" src="" alt="Gallery Image">

    <div class="slideshow-controls">
      <button onclick="prevImage()">Prev</button>
      <button onclick="pauseSlideshow()">Pause</button>
      <button onclick="resumeSlideshow()">Play</button>
      <button onclick="nextImage()">Next</button>
    </div>

  </div>

</div>

  <!-- Footer -->
  <?php include("footer.php"); ?>

</div>

<!-- Scripts -->
<script>
  let slideshowInterval;
  let currentImageIndex = 0;
  let currentImages = [];
  let currentFolder = '';

  function openGallery(folder) {
    const galleryImages = {
  'Republic-Day-2026-1': ['RepublicDay2026-1.jpeg','RepublicDay2026-2-1.jpg','RepublicDay2026-22.jpeg','RepublicDay2026-3.jpeg','RepublicDay2026-4-1.jpg','RepublicDay2026-5-1.jpg','RepublicDay2026-6.jpeg','RepublicDay2026-7.jpeg','RepublicDay2026-8.jpeg','RepublicDay2026-9.jpeg','RepublicDay2026-10-1.jpg'],
  'Khelo India initiative by Sports Authority of India': ['KheloIndia0.jpg', 'KheloIndia01.jpg', 'KheloIndia1.jpg', 'KheloIndia2.jpg', 'KheloIndia3.jpg', 'KheloIndia4.jpg', 'KheloIndia5.jpg', 'KheloIndia6.jpg', 'KheloIndia7.jpg', 'KheloIndia8.jpg', 'KheloIndia9.jpg'],
  'foundation-day': ['foundation-day0.jpg', 'foundation-day1.jpg', 'foundation-day2.jpg', 'foundation-day3.jpg', 'foundation-day4.jpg','foundation-day5.jpg', 'foundation-day6.jpg', 'foundation-day7.jpg', 'foundation-day8.jpg'],
  'world-health-day': ['wolrd.jpg', 'HealthDay.jpg', 'HealthDay1.jpg', 'HealthDay3.jpg'],
  'womens-day': ['womanday.jpg','womanday1.jpg','womanday2.jpg','womanday3.jpg'],
  'yogaday': ['yogaday1.jpg', 'yoga-day2.jpg'],
  'Sickle_Cell': ['Sickle_Day.jpg', 'Sickle-cellDay.jpg'],
  'conference': ['conference.jpeg', 'conference2.jpeg'],
  'workshop': ['WORKSHOP.jpg'],
  'inbix-2025':['inbix.jpg','inbix4.jpg','inbix1.jpg','inbix3.jpg','inbix2.jpg'],
  'independence_day': ['Independenceday3.jpg'],
  'shine': ['shine1.jpeg','shine2.jpeg','shine3.jpeg','shine4.jpeg','shine5.jpeg','shine6.jpeg'],
  'swachhata': ['drawing.jpg','drawing1.jpg','swachhatapakhwada2026.jpg','swachhatapakhwada.jpg','swachhatapakhwada1.jpg','drawing2.jpg'],
  'science_day': ['science_day.jpeg','science_day1.jpeg','science_daylab.jpg','science_daylab2.jpg','science_day5.jpg'],
  
};


    currentImages = galleryImages[folder] || [];
    if (currentImages.length === 0) return;

    currentImageIndex = 0;
    currentFolder = folder;
    updateImage();

    document.getElementById('popup').style.display = 'flex';

    startSlideshow();
  }

 function updateImage() {

const img = document.getElementById('slideshow-img');

img.src = `assets/gallery/${currentFolder}/${currentImages[currentImageIndex]}`;

document.getElementById("imageCounter").innerText =
(currentImageIndex + 1) + " / " + currentImages.length;

  }

  function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % currentImages.length;
    updateImage();
  }

  function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + currentImages.length) % currentImages.length;
    updateImage();
  }

  function startSlideshow() {
    clearInterval(slideshowInterval);
    slideshowInterval = setInterval(nextImage, 3000);
  }

  function pauseSlideshow() {
    clearInterval(slideshowInterval);
  }

  function resumeSlideshow() {
    startSlideshow();
  }

  function closeGallery() {
    document.getElementById('popup').style.display = 'none';
    clearInterval(slideshowInterval);
  }
</script>

<script src="assets/scripts/responsive.menu.js"></script> 
<script src="assets/scripts/chosen.select.js"></script> 
<script src="assets/scripts/slick.js"></script>
<script src="assets/scripts/jquery.mobile-menu.min.js"></script> 
<script src="assets/scripts/functions.js"></script>
<script></script>

</body>
</html>
