<?php 
session_start();
include("language.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Facilities | ICMR-NIRH</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php include("GlobalCss.php"); ?>
<?php include("GlobalJs.php"); ?>

<style>
/* ROOT COLORS & VARIABLES */
:root {
    --primary: #0f172a;
    --primary-light: #1e293b;
    --accent: #0ea5e9;
    --accent-hover: #0284c7;
    --bg-gradient-start: #f8fafc;
    --bg-gradient-end: #f1f5f9;
    --card-bg: rgba(255, 255, 255, 0.9);
    --text-main: #334155;
    --text-muted: #64748b;
}

/* BASE STYLES */
body {
    font-family: 'Inter', 'Poppins', sans-serif;
    background: linear-gradient(135deg, var(--bg-gradient-start), var(--bg-gradient-end));
    margin: 0;
    padding: 0;
    color: var(--text-main);
}

/* PAGE HEADER */
.page-header {
    background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
    color: #FFFFFF;
    text-align: center;
    padding: 80px 20px;
    margin-bottom: 60px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    position: relative;
    overflow: hidden;
}
.page-header::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(255,255,255,0.03) 0%, transparent 60%);
    transform: rotate(30deg);
    pointer-events: none;
}
.page-header h1 {
    font-size: 2.75rem;
    font-weight: 700;
    color: #FFFFFF;
    margin: 0;
    letter-spacing: -0.5px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.3);
}

/* FACILITY SECTION */
.facility-section {
    max-width: 1200px;
    margin: auto;
    padding: 20px 20px 80px;
}

/* FACILITY ROW */
.facility-row {
    display: flex;
    gap: 50px;
    margin-bottom: 90px;
    align-items: center;
    opacity: 0;
    transform: translateY(40px);
    transition: 0.8s cubic-bezier(0.25, 0.8, 0.25, 1);
    transition-property: opacity, transform;
}
.facility-row.show {
    opacity: 1;
    transform: translateY(0);
}
.facility-row.reverse {
    flex-direction: row-reverse;
}

/* IMAGE CONTAINER */
.facility-img {
    flex: 1.2;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
    box-shadow: 0 20px 40px rgba(0,0,0,0.12);
    transition: transform 0.5s ease, box-shadow 0.5s ease;
}
.facility-img:hover {
    transform: translateY(-8px);
    box-shadow: 0 25px 50px rgba(0,0,0,0.2);
}

/* SLIDER */
.slider {
    position: relative;
    width: 100%;
    aspect-ratio: 16/10;
    overflow: hidden;
    background: #e2e8f0;
}
.slide {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    opacity: 0;
    transition: opacity 0.8s ease-in-out, transform 8s ease;
    transform: scale(1.05);
}
.slide.active {
    opacity: 1;
    transform: scale(1);
}

/* SLIDER DOTS */
.dots {
    position: absolute;
    bottom: 20px;
    width: 100%;
    text-align: center;
    z-index: 10;
    display: flex;
    justify-content: center;
    gap: 8px;
}
.dots span {
    width: 12px;
    height: 12px;
    display: block;
    background: rgba(255, 255, 255, 0.4);
    border-radius: 50%;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    backdrop-filter: blur(4px);
    border: 1px solid rgba(255,255,255,0.6);
}
.dots span:hover {
    background: rgba(255, 255, 255, 0.8);
}
.dots span.active {
    background: #ffffff;
    transform: scale(1.4);
    border-color: transparent;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}

/* CONTENT CONTAINER */
.facility-content {
    flex: 1;
    background: var(--card-bg);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    padding: 45px;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    border: 1px solid rgba(255,255,255,0.6);
    transition: all 0.4s ease;
}
.facility-content:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.08);
}
.facility-content h3 {
    color: var(--primary);
    font-size: 2.1rem;
    font-weight: 700;
    margin-top: 0;
    margin-bottom: 15px;
    position: relative;
    display: inline-block;
    letter-spacing: -0.5px;
}
.facility-content h3::after {
    content: '';
    position: absolute;
    bottom: -5px;
    left: 0;
    width: 50px;
    height: 4px;
    background: var(--accent);
    border-radius: 2px;
    transition: width 0.3s ease;
}
.facility-content:hover h3::after {
    width: 100%;
}
.facility-content p {
    font-size: 1.15rem;
    color: var(--text-muted);
    line-height: 1.6;
    margin-bottom: 30px;
}

/* FEATURES PILLS */
.features {
    display: flex;
    flex-wrap: wrap;
    gap: 12px;
}
.features span {
    display: inline-flex;
    align-items: center;
    background: #ffffff;
    padding: 10px 20px;
    border-radius: 30px;
    font-size: 0.95rem;
    font-weight: 500;
    color: var(--text-main);
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    border: 1px solid #e2e8f0;
    transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
}
.features span:hover {
    background: var(--accent);
    color: #ffffff;
    transform: translateY(-3px);
    border-color: var(--accent);
    box-shadow: 0 8px 15px rgba(14, 165, 233, 0.25);
}

/* RESPONSIVE DESIGN */
@media(max-width: 900px){
    .facility-row {
        gap: 30px;
    }
    .facility-content {
        padding: 30px;
    }
}
@media(max-width: 768px){
    .page-header {
        padding: 60px 20px;
    }
    .page-header h1 {
        font-size: 2.2rem;
    }
    .facility-row, .facility-row.reverse {
        flex-direction: column;
        margin-bottom: 60px;
        gap: 0;
    }
    .facility-img {
        width: 100%;
        border-radius: 20px 20px 0 0;
        box-shadow: none;
    }
    .facility-content {
        width: 90%;
        margin: -40px auto 0;
        position: relative;
        z-index: 2;
        padding: 30px 20px;
    }
}
</style>
</head>

<body>

<div class="wrapper">
<?php include("header.php"); ?>

<div class="page-header">
    <h1 style="color: #ffffff !important;">Facilities</h1>
</div>

<div class="facility-section">

<!-- ITEM 1 -->
<div class="facility-row">
    <div class="facility-img">
        <div class="slider">
            <img src="assets/facility/auditorium1.jpg" class="slide active">
            <img src="assets/facility/auditorium3.jpg" class="slide">
            <img src="assets/facility/auditorium4.jpg" class="slide">
        </div>
        <div class="dots"></div>
    </div>

    <div class="facility-content">
        <h3>AUDITORIUM</h3>
        <p>Modern space for workshops & events</p>
        <div class="features">
            <span>🎯 120+ Seats</span>
            <span>📽 Projector</span>
            <span>🔊 Audio System</span>
        </div>
    </div>
</div>

<!-- ITEM 2 -->
<div class="facility-row reverse">
    <div class="facility-img">
        <div class="slider">
            <img src="assets/facility/conference1.jpg" class="slide active">
            <img src="assets/facility/comference4.jpg" class="slide">
            <img src="assets/facility/conference2.jpg" class="slide">
        </div>
        <div class="dots"></div>
    </div>

    <div class="facility-content">
        <h3>CONFERENCE HALL</h3>
        <p>Perfect for meetings & seminars</p>
        <div class="features">
            <span>💼 Meetings</span>
            <span>📊 Presentations</span>
            <span>🎤 Discussion</span>
        </div>
    </div>
</div>

<!-- ITEM 3 - GUEST HOUSE -->
<div class="facility-row">
    <div class="facility-img">
        <div class="slider">
            <img src="assets/facility/guest.jpg" class="slide">
            <img src="assets/facility/guest1.jpg" class="slide active">
            <img src="assets/facility/guest2.jpg" class="slide">
            <img src="assets/facility/guest3.jpg" class="slide">
            <img src="assets/facility/guest4.jpg" class="slide">
            <img src="assets/facility/guest5.jpg" class="slide">
        </div>
        <div class="dots"></div>
    </div>
    
    <div class="facility-content">
        <h3>GUEST HOUSE</h3>
        <p>A well-furnished, welcoming accommodation offering a comfortable and relaxing stay for visiting scientists, scholars, and official guests.</p>
        <div class="features">
            <span>🛏 18 Rooms</span>
            <span>🛏 2 Suites</span>
            <span>🍽 Dining Area</span>
        </div>
    </div>
</div>

<!-- ITEM 4 - HOSTEL FACILITIES -->
<div class="facility-row reverse">
    <div class="facility-img">
        <div class="slider">
            <img src="assets/facility/girls1.jpg" class="slide">
            <img src="assets/facility/girls2.jpg" class="slide">
        </div>
        <div class="dots"></div>
    </div>
    
    <div class="facility-content">
        <h3>TRAINEE HOSTEL</h3>
        <p>Safe and comfortable accommodation for boys and girls.</p>
        <div class="features">
            <span>👦 Boys Hostel</span>
            <span>👩 Girls Hostel</span>
            <span>🔐 24/7 Security</span>
            <span>🚿 Clean Washrooms</span>
            <span>🛏 Rooms</span>
        </div>
    </div>
</div>

<!-- ITEM 5 - CIF LAB -->
<div class="facility-row">
    <div class="facility-img">
        <div class="slider">
            <img src="assets/facility/Picture3.jpg" class="slide active">
            <img src="assets/facility/cif2.jpg" class="slide">
            <img src="assets/facility/Picture2.jpg" class="slide">
            <img src="assets/facility/Picture1.png" class="slide">
        </div>
        <div class="dots"></div>
    </div>
    
    <div class="facility-content">
        <h3>CENTRAL INSTRUMENTATION FACILITY</h3>
        <p>High-end equipment including an NGS Facility, Fragment Analyzer System, ddPCR, Automated DNA/RNA Extraction System, SANGER sequencers, and other essential instruments.</p>
        <div class="features">
            <span>🔬 High-End Equipment</span>
            <span>📊 NGS & Auto-Extraction</span>
            <span>🧪 Diagnostics</span>
        </div>
    </div>
</div>

</div>

<?php include("footer.php"); ?>
</div>

<script>
// SLIDER + SMOOTH AUTO
document.querySelectorAll('.slider').forEach((slider)=>{
    let slides = slider.querySelectorAll('.slide');
    let dotsC = slider.parentElement.querySelector('.dots');
    let i = 0;
    let interval;

    slides.forEach((_, idx)=>{
        let dot = document.createElement("span");
        if(idx===0) dot.classList.add("active");

        dot.onclick = ()=>{
            i = idx;
            show();
            resetInterval();
        };

        dotsC.appendChild(dot);
    });

    let dots = dotsC.querySelectorAll("span");

    function show(){
        slides.forEach(s=>s.classList.remove("active"));
        dots.forEach(d=>d.classList.remove("active"));
        slides[i].classList.add("active");
        dots[i].classList.add("active");
    }

    function startInterval() {
        interval = setInterval(()=>{
            i = (i+1) % slides.length;
            show();
        }, 4000);
    }
    
    function resetInterval() {
        clearInterval(interval);
        startInterval();
    }

    startInterval();

    // TOUCH SWIPE SUPPORT
    let startX = 0;
    slider.addEventListener('touchstart', e => {
        startX = e.touches[0].clientX;
        clearInterval(interval);
    }, {passive: true});
    
    slider.addEventListener('touchend', e => {
        let diff = e.changedTouches[0].clientX - startX;
        if(diff > 50){ i = (i-1 + slides.length) % slides.length; show(); }
        else if(diff < -50){ i = (i+1) % slides.length; show(); }
        startInterval();
    }, {passive: true});
});

// SCROLL ANIMATION
function checkScroll() {
    document.querySelectorAll('.facility-row').forEach(row=>{
        if(row.getBoundingClientRect().top < window.innerHeight * 0.85){
            row.classList.add('show');
        }
    });
}
window.addEventListener('scroll', checkScroll);
window.addEventListener('load', checkScroll); // trigger on initial load or reload
</script>

</body>
</html>