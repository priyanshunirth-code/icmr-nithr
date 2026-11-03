<?php
session_start();
include("language.php");
?>
<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ICMR-NITHR</title>
    <?php include("GlobalCss.php"); ?>
    <!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <?php include("GlobalJs.php"); ?>
    <style type="text/css">
        .modal-content iframe {
            margin: 0 auto;
            display: block;
        }

        .iisf {
            background-color: white;
            padding: 10px;
            font-size: 16px;
            font-weight: 800;
            width: 450px;
            padding: 10px;
            opacity: .9;
            text-align: center;

        }

        .iisf a {
            color: red;

        }

        .iisf big {
            color: blue;
        }

        .blink {
            animation: blink-animation 1s steps(5, start) infinite;
            -webkit-animation: blink-animation 1s steps(5, start) infinite;
        }

        @keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        @-webkit-keyframes blink-animation {
            to {
                visibility: hidden;
            }
        }

        /* STARTS HERE */
        .important-links-title {
            font-size: 20px;
            font-weight: bold;
            color: #333;
            margin: 20px 0;
            text-align: left;
            padding-left: 20px;
        }

        /* Outer container for the scrolling effect */
        .marquee-container {
            overflow: hidden;
            white-space: nowrap;
            background-color: #f8f8f8;
            padding: 20px;
            border-top: 1px solid #cccccc;
            border-bottom: 1px solid #cccccc;
        }

        /* Inner container to hold and animate the logos */
        .marquee-content {
            display: inline-flex;
            align-items: center;
            animation: scroll 30s linear infinite; /* Controls speed and looping */
        }

        /* Animation for the scrolling effect */
        @keyframes scroll {
            from { transform: translateX(30%); }
            to { transform: translateX(-100%); }
        }

        /* Each logo link box */
        .link-item {
            display: inline-block;
            margin: 0 30px;
            transition: transform 0.3s;
        }

        .link-item img {
            height: auto; /* Keeps image aspect ratio */
            width: auto; /* Keeps image aspect ratio */
            max-width: none; /* Allows the image to expand to its full width */
            max-height: none; /* Allows the image to expand to its full height */
            transition: transform 0.3s ease;
        }

        .link-item img:hover {
            transform: scale(1.05); /* Slight zoom on hover */
        }
        .cs-top-categories {
        background-color: #f4f4f4; /* Light gray background */
        }

        /* Notification Bar CSS */
        .notification-bar {
            display: flex;
            align-items: center;
            background-color: #005ea2;
            color: white;
            padding: 10px;
            font-family: Arial, sans-serif;
            overflow: hidden;
        }
        .notification-title {
            font-weight: bold;
            margin-right: 10px;
            white-space: nowrap;
        }
        .notification-ticker {
            position: relative;
            width: 100%;
            overflow: hidden;
        }
        .ticker-content {
            display: inline-block;
            white-space: nowrap;
            animation: ticker-scroll 30s linear infinite;
        }
        .ticker-content span {
            display: inline-block;
            padding-right: 50px;
        }
        .notification-bar a {
            color: black;
            text-decoration: underline;
            background-color: white;
            padding: 2px 6px;
            border-radius: 4px;
            margin-left: 5px;
            font-style: italic;
        }
        @keyframes ticker-scroll {
            0% {
                transform: translateX(100%);
            }
            100% {
                transform: translateX(-100%);
            }
        }

        /* Rebranding Modal Styles */
        .rebrand-modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.55);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            animation: rebrandFadeIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        .rebrand-modal-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            border: 1px solid rgba(255, 255, 255, 0.7);
            width: 90%;
            max-width: 580px;
            padding: 40px;
            position: relative;
            transform: scale(0.9) translateY(20px);
            animation: rebrandScaleIn 0.5s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
            font-family: 'Poppins', Arial, sans-serif;
            text-align: center;
        }

        .rebrand-close-btn {
            position: absolute;
            top: 15px;
            right: 20px;
            background: transparent;
            border: none;
            font-size: 28px;
            color: #888;
            cursor: pointer;
            transition: color 0.2s, transform 0.2s;
            line-height: 1;
        }

        .rebrand-close-btn:hover {
            color: #333;
            transform: scale(1.1);
        }

        .rebrand-icon {
            width: 70px;
            height: 70px;
            background: rgba(0, 94, 162, 0.1);
            color: #005ea2;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            margin-bottom: 20px;
            animation: rebrandPulse 2s infinite;
        }

        .rebrand-modal-card h2 {
            font-size: 26px;
            color: #111;
            margin: 0 0 10px 0;
            font-weight: 700;
            letter-spacing: -0.5px;
        }

        .rebrand-subtitle {
            color: #005ea2;
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 25px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        /* Name transition container */
        .rebrand-transition-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            background: #f4f6f8;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 25px;
            border: 1px dashed #ccd3db;
        }

        .rebrand-name {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex: 1;
        }

        .rebrand-name .abbr {
            font-size: 18px;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 6px;
            margin-bottom: 4px;
        }

        .rebrand-name .full {
            font-size: 11px;
            color: #666;
            font-weight: 500;
            line-height: 1.2;
        }

        .rebrand-name.old .abbr {
            background: #e2e8f0;
            color: #718096;
        }

        .rebrand-name.new .abbr {
            background: #005ea2;
            color: white;
            box-shadow: 0 4px 12px rgba(0, 94, 162, 0.25);
            animation: activeScale 1.5s infinite alternate;
        }

        .rebrand-arrow {
            color: #005ea2;
            display: flex;
            align-items: center;
            animation: arrowBounce 1.5s infinite;
        }

        .rebrand-desc {
            font-size: 14px;
            color: #444;
            line-height: 1.6;
            margin-bottom: 30px;
            text-align: justify;
        }

        .rebrand-desc strong {
            color: #111;
        }

        .rebrand-action-btn {
            background: linear-gradient(135deg, #005ea2 0%, #004475 100%);
            color: white;
            border: none;
            padding: 14px 40px;
            font-size: 15px;
            font-weight: 600;
            border-radius: 50px;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(0, 94, 162, 0.3);
            transition: all 0.3s ease;
            width: auto;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .rebrand-action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(0, 94, 162, 0.4);
            background: linear-gradient(135deg, #0072c2 0%, #005ea2 100%);
        }

        .rebrand-action-btn:active {
            transform: translateY(1px);
        }

        /* Animations */
        @keyframes rebrandFadeIn {
            to { opacity: 1; }
        }

        @keyframes rebrandScaleIn {
            to { transform: scale(1) translateY(0); }
        }

        @keyframes rebrandPulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 94, 162, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(0, 94, 162, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 94, 162, 0); }
        }

        @keyframes activeScale {
            0% { transform: scale(1); }
            100% { transform: scale(1.05); }
        }

        @keyframes arrowBounce {
            0%, 100% { transform: translateX(0); }
            50% { transform: translateX(5px); }
        }

        /* Rebranding Ribbon Styles */
        .rebrand-ribbon-bar {
            background: linear-gradient(90deg, #00335c 0%, #005ea2 50%, #00335c 100%);
            color: white;
            padding: 10px 20px;
            text-align: center;
            font-family: 'Poppins', Arial, sans-serif;
            font-size: 14px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            position: relative;
            z-index: 999;
            animation: ribbonSlideDown 0.5s ease-out forwards;
        }

        .rebrand-ribbon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            max-width: 1200px;
            margin: 0 auto;
            padding-right: 30px;
        }

        .rebrand-ribbon-badge {
            background: #ffc107;
            color: #002240;
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 50px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            animation: ribbonBadgePulse 1.5s infinite alternate;
        }

        .rebrand-ribbon-text {
            font-weight: 500;
            letter-spacing: 0.2px;
        }

        .rebrand-ribbon-text strong {
            color: #ffc107;
            font-weight: 700;
        }

        .rebrand-ribbon-close {
            position: absolute;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 22px;
            cursor: pointer;
            transition: all 0.2s ease;
            line-height: 1;
        }

        .rebrand-ribbon-close:hover {
            color: #ffc107;
            transform: translateY(-50%) scale(1.2);
        }

        @keyframes ribbonSlideDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }

        @keyframes ribbonBadgePulse {
            0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(255, 193, 7, 0.4); }
            100% { transform: scale(1.05); box-shadow: 0 0 0 6px rgba(255, 193, 7, 0); }
        }
    </style>


    <script type="text/javascript">
        $(document).ready(function() {
            /* Get iframe src attribute value i.e. YouTube video url
            and store it in a variable */
            var url = $("#cartoonVideo").attr('src');


            /* Assign empty url value to the iframe src attribute when
            modal hide, which stop the video playing */
            $("#myModal").on('hide.bs.modal', function() {
                $("#cartoonVideo").attr('src', '');
            });

            /* Assign the initially stored url back to the iframe src
            attribute when modal is displayed again */
            $("#myModal").on('show.bs.modal', function() {
                $("#cartoonVideo").attr('src', url);
            });

        });

        $(document).ready(function() {
            /* Get iframe src attribute value i.e. YouTube video url
            and store it in a variable */
            var url2 = $("#cartoonVideo2").attr('src');


            /* Assign empty url value to the iframe src attribute when
            modal hide, which stop the video playing */
            $("#myModal2").on('hide.bs.modal', function() {
                $("#cartoonVideo2").attr('src', '');
            });

            /* Assign the initially stored url back to the iframe src
            attribute when modal is displayed again */
            $("#myModal2").on('show.bs.modal', function() {
                $("#cartoonVideo2").attr('src', url2);
            });

        });




    </script>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">
        <!-- Rebranding Announcement Ribbon (Option B) -->
        <div id="rebrandRibbon" class="rebrand-ribbon-bar" style="display: none;">
            <div class="rebrand-ribbon-container">
                <a href="https://www.nirth.res.in/employees_corner/2026/Office memorandum 08.06.2026.pdf" style="text-decoration: none; color: inherit; cursor: pointer;">
                    <span class="rebrand-ribbon-badge">ANNOUNCEMENT</span>

                <span class="rebrand-ribbon-text">
                    Important: <strong>ICMR-NIRTH</strong> has officially been renamed to <strong>ICMR-NITHR</strong> (ICMR-National Institute for Tribal Health Research, Jabalpur).
                </span>
                </a>
                <button class="rebrand-ribbon-close" id="closeRebrandRibbon" aria-label="Close Announcement">&times;</button>
            </div>
        </div>

        <!-- Side Menu Start -->
        <div id="overlay"></div>

        <!-- Side Menu End -->
        <!-- Header Start -->
        <?php include('header.php'); ?>

        <div class="notification-bar">
            <div class="notification-title">Notifications |
            </div>
            <div class="notification-ticker">
                <div class="ticker-content" id="ticker-content">
                    <span>
                    <!-- <img src="/assets/new-gif.gif" alt="New" width="30" height="17"> -->
                    <!-- Inbix2025 – Action Toward Genomics & Community Health (ATGC) Conference -->
                    <!-- <a href="event.php">Apply Online</a> -->
                    <!--    |    -->
                    <!-- <img src="/assets/new-gif.gif" alt="New" width="30" height="17"> -->
                    <!-- Six-Months M.Sc. Dissertation Programme – Jan to Jun 2026 Session at ICMR-NIRTH, Jabalpur -->
                    <!-- <a href="student_corner.php">View</a> -->
                    <!--    |    -->
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Call for M.Sc. dissertation at ICMR-NITHR, Jabalpur (Jan-June 2027)
                    <a href="student_corner.php">View</a>
                    <!--
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Result - Project Scientist C (Medical) for Walk-in-Interview held on 08.01.2026 at 09:00 AM
                    <a href="https://www.nirth.res.in/advertisement/2026/Result%20-%20Jan%202026.PDF">Result</a>
                    |
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Selected candidates for AcSIR-ICMR PhD programme, Jan 2026 Session
                    <a href="https://www.nirth.res.in/phd_program.php">View</a>

                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Result - Project Technical Support - III for Walk-in-Interview held on 09.02.2026 at 09:00 AM
                    <a href="https://www.nirth.res.in/advertisement/2026/Result%20-%2009-02-2026.PDF">Result</a>

                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    AcSIR-ICMR PhD programme, August 2026 Session: Last date extended till 30th April, 2026
                    <a href="https://www.nirth.res.in/phd_program.php">View</a>

                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Walk-in-Interview - Various posts on 05.10.2026 at 09:00 AM and 06.10.2026 at 09:00 AM
                    <a href="https://www.nirth.res.in/vacancies.php">View</a>
                    -->
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Declaration of Result of Walk-in Interview Held for various projects
                    <a href="https://www.nirth.res.in/vacancies.php">Result</a>
                    |
                    <!--
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Hands-on workshop on Large Language Models (LLMs) for clinical & translational research | ICMR-NITHR
                    <a href="workshop-flyer.php" target="_blank" style="font-weight:bold;color:#005ea2;">View</a>
                    |
                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    Office Order for Compliance and Implementation of Official Language Policy
                    <a href="https://www.nirth.res.in/circulars.php">View</a>
                    |

                    <img src="/assets/new-gif.gif" alt="New" width="30" height="17">
                    List of Selected candidates for AcSIR-ICMR PhD programme, August 2026 Session
                    <a href="https://www.nirth.res.in/phd_program.php">List</a>
                    -->
                    </span>

                    <!-- Add more items as needed -->
                </div>
            </div>
        </div>

        <!-- Script for Notification Bar -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
            const ticker = document.getElementById('ticker-content');
            ticker.addEventListener('mouseover', () => ticker.style.animationPlayState = 'paused');
            ticker.addEventListener('mouseout', () => ticker.style.animationPlayState = 'running');
            });
        </script>

        <!-- Header End -->
        <!--<marquee behavior="scroll" scrollamount="5"><a class="text-danger "  href="vacancies.php" target="_blank" ><img src="new.gif" />
       <b><span style="color:red">Last date extended upto 21/08/2023</span> - Applications are invited for the regular posts of Technical Cadre (Technical Assistant/Technician I/Lab. Attendant I). Advertisement. No. NIRTH/Tech/01/2023<img src="new.gif" /> </b></a>
        </marquee>-->
   <!--     <marquee behavior="scroll" scrollamount="5">

        <a class="text-danger "  href="/student_corner/Selection Template SESSION JAN 2025 -  Final.pdf" target="_blank" ><img src="new.gif" />
       <b> <?php echo $lang['head2']; ?><img src="new.gif" /></b></a>&nbsp&nbsp&nbspAnnouncements

        <a class="text-danger "  href="https://nirth.res.in/Test_Vaccancy_LDC_Tech.php" target="_blank" ><img src="new.gif" />
       <b>आईसीएमआर-एनआईआरटीएच, जबलपुर के तकनीकी संवर्ग एवं एल.डी.सी. के पदों के लिए रिक्ति अधिसूचना/VACANCY NOTIFICATI ON--===== शुद्धिपत्र =======Corrigendum=== - FOR TECHNICAL POSTS AND FOR LDC  POST
  <img src="new.gif" /></b></a>&nbsp&nbsp&nbsp

            <a class="text-danger "  href="https://nirth.res.in/labatt_tech_result.php" target="_blank" ><img src="new.gif" />
       <b>आईसीएमआर-एनआईआरटीएच, जबलपुर के तकनीकी संवर्ग (तकनीशियन-1 और लैब अटेंडेंट-1) पदों के लिए अनंतिम परिणामों की घोषणा/DECLARATION OF PROVISIONAL RESULTS FOR THE TECHNICAL CADRE(TECHNICIAN-1 AND LAB. ATTENDANT-1)  POSTS OF ICMR-NIRTH, JABALPUR
<img src="new.gif" /></b></a>&nbsp&nbsp&nbsp

            <a class="text-danger "  href="https://nirth.res.in/technical_assistant_result.php" target="_blank" ><img src="new.gif" />
       <b>आईसीएमआर-एनआईआरटीएच, जबलपुर के तकनीकी संवर्ग पदों के लिए अनंतिम परिणामों की घोषणा/DECLARATION OF PROVISIONAL RESULTS FOR THE TECHNICAL CADRE POSTS OF ICMR-NIRTH, JABALPUR
<img src="new.gif" /></b></a>&nbsp&nbsp&nbsp

        </marquee>-->
        <!-- Banner Start -->



   <style>
        /* Existing CSS for banner-img.jpg section */

        /* Image Slider CSS */
        .image-slider {
            position: relative;
            width: 100%;
            height: 560px; /* Adjust height as needed */
            overflow: hidden;
        }
        .slides {
            display: flex;
            width: 100%;
            height: 95%;
            transition: transform 3s ease-in-out;
        }
        .slide {
            min-width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }
        .slider-label {
            position: absolute;
            bottom: 20px;
            left: 30px; /* Change to right: 30px for right alignment */
            background-color: rgba(0, 0, 0, 0.6);
            color: #fff;

            padding: 10px 20px;
            font-size: 18px;
            border-radius: 5px;
            max-width: 60%;
        }

    </style>
<!--
<li class="event-item">
  <a href="event.php" class="event-link">
    <i class="icon-">&#xf073;</i>
    <div class="marquee">
      <span>🎉🌿 Inbix2025 – Action Toward Genomics & Community Health (ATGC) Conference 🎉</span>
    </div>
  </a>
</li>
-->


<style>
.event-item {
  list-style: none;
  margin: 0;
  width: 100%;
}

.event-link {
  background: #696969;
  display: flex;
  align-items: center;
  width: 100%;
  height: 40px;
  padding: 0 20px;
  color: #fff;
  font-size: 20px;
  font-weight: 600;
  font-family: Arial, sans-serif;
  border-radius: 10px;
  text-decoration: none;
  border: 1px solid #696969;
  box-shadow: 0 4px 10px #555;
  overflow: hidden;
  position: relative;
}

.event-link:hover {
  background: #555;
  border-color: #333;
  transform: scale(1.01);
  transition: 0.3s ease;
}

/* Marquee container */
.marquee {
  flex: 1;
  overflow: hidden;
  white-space: nowrap;
  position: relative;
}

/* Marquee text */
.marquee span {
  display: inline-block;
  white-space: nowrap;
  padding-left: 100%;
  animation: scrollText 25s linear infinite;
}

/* Pause animation on hover */
.event-link:hover .marquee span {
  animation-play-state: paused;
}

/* Animation right → left */
@keyframes scrollText {
  from { transform: translateX(0%); }
  to   { transform: translateX(-100%); }
}

.event-link i {
  margin-right: 15px;
  font-size: 28px;
}

/* Container jo Square aur Grey rahega */
.cs-team.fancy .cs-media figure {
    width: 250px !important;
    height: 250px !important;
    background-color: #ffffff !important; /* Rajiv Bahl jaisa grey */
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    margin: 0 auto !important;
    border-radius: 0% !important; /* Bahar ka box square rakhne ke liye */
    overflow: hidden !important;
}

/* Photo ko Gol (Circle) karne ke liye */
.cs-team.fancy .cs-media figure img {
    width: 200px !important;  /* Circle ka size */
    height: 200px !important;
    border-radius: 50% !important; /* Isse photo gol hogi */
    background-color: #ffffff !important; /* Photo ke peeche ka white color */
    padding: 5px !important; /* White border jaisa dikhega */
    object-fit: cover !important;
    object-position: center top !important;
    border: 1px solid #ddd !important;
}
</style>





    <div class="image-slider">
        <div class="slides">

             <img src="assets/extra-images/banner-img.jpg" alt="Main Building" class="slide">
             <img src="assets/extra-images/Union Health Minister Visit 2026.jpeg" alt="Union Health Minister Visit 2026" class="slide">
             <img src="assets/extra-images/Anupriya_Patel.jpg" alt="Minister of State for Health and Family Welfare Visit 2026" class="slide">
             <img src="assets/extra-images/SAC 2026 Photo.jpg" alt="38th Scientific Advisory Committee Meeting, 17th August 2026" class="slide">
             <img src="assets/extra-images/MRHRU.jpg" alt="MRHRU Jheet" class="slide">
             <img src="assets/extra-images/MRHRU_Datia.jpeg" alt="MRHRU Datia" class="slide">

        </div>

        <div class="slider-label" id="sliderLabel">National Institute Building</div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const slidesContainer = document.querySelector('.slides');
            const slides = document.querySelectorAll('.slide');
            const slideWidth = slides[0].getBoundingClientRect().width;
            const label = document.getElementById('sliderLabel');

            // 🏷️ Define your labels (same order as images)
            const labels = [
                'Main Lab Building',
                'Union Health Minister Visit 2026',
                'Minister of State for Health and Family Welfare Visit 2026',
                '38th Scientific Advisory Committee Meeting, 17th August 2026',
                'MRHRU Jheet',
                'MRHRU Datia',

            ];
            let currentIndex = 0;
            let intervalId;

            // Clone the first slide and append it to the end
            const firstClone = slides[0].cloneNode(true);
            slidesContainer.appendChild(firstClone);

            function updateLabel(index) {
                label.textContent = labels[index % labels.length]; // Loop correctly
            }

            function startSlideshow() {
                intervalId = setInterval(() => {
                    currentIndex++;
                    slidesContainer.style.transition = 'transform 1s ease-in-out';
                    slidesContainer.style.transform = `translateX(-${currentIndex * slideWidth}px)`;

                    updateLabel(currentIndex);

                    // Reset to the first slide seamlessly
                    if (currentIndex === slides.length) {
                        setTimeout(() => {
                            slidesContainer.style.transition = 'none';
                            slidesContainer.style.transform = 'translateX(0)';
                            currentIndex = 0;
                            updateLabel(0);

                        }, 1000); // Match the transition duration
                }
            }, 5500); // Change image every 7 seconds
        }
        function stopSlideshow() {
            clearInterval(intervalId);
        }

        slidesContainer.addEventListener('mouseenter', stopSlideshow);
        slidesContainer.addEventListener('mouseleave', startSlideshow);

        updateLabel(0); // Show initial label
        startSlideshow();
    });

    </script>

        <!-- Banner End -->

        <!-- Main Start -->
        <div class="main-section">
            <div class="page-section" style="margin-bottom:0px;margin-top:-30px;">  <!--margin-bottom is for spaces at bottom -->
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                            <ul class="cs-top-categories">
                                <li><a href="about.php" style="background:#8a9045;"><i class="icon-office"></i>
                                    NITHR PROFILE</a>
                                </li>
                                <li><a href="scientists.php" style="background:#c16622;"><i class="icon-user-tie"></i>
                                    <?php echo $lang['scientist']; ?></a>
                                </li>
                                <li><a href="publications.php" style="background:#896ca9;"><i class="icon-books"></i>
                                    <?php echo $lang['publication']; ?></a>
                                </li>
                                <li><a href="vacancies.php" style="background:#3e769a;"><i class="icon-bullhorn"></i>
                                    <?php echo $lang['vacancies']; ?></a>
                                </li>
                                <li><a href="photos.php" style="background:#C4B395;"><i class="icon-">&#xf03e;</i>

                                    <?php echo $lang['photo_gallery']; ?></a>
                                </li>

                                <li><a href="press.php" style="background:#800000;"><i class="icon-news"></i>
                                    NITHR IN NEWS</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-section">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2.5 col-md-3 col-sm-3 col-xs-12">
                            <div class="cs-team">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-element-title" style="margin-bottom:30px;">
                                            <!-- <h2>Heading can be used here</h2> -->
                                        </div>
                                    </div>
                                    <style>
                                      /* Team section styles */
.cs-team.fancy {

    margin-bottom: 1px;
}

/* Media container */
.cs-team .cs-media {
    max-width: 220px; /* Adjust max width */

}

/* Image styling */
.team-img {
    width: 100%;
    height: 100px; /* Adjust height as needed */
    object-fit: cover; /* Ensures image fills the container without distortion */
    display: block;
}


                                    </style>
                                    <div class="cs-team fancy">
                                        <div class="cs-media">
                                            <figure>
                                               <img src="assets/extra-images/DG1-modified.png" alt="Dr Rajiv Bahl">
                                            </figure>
                                        </div>
                                        <div class="cs-text">
                                            <h5><?php echo $lang['rajiv_bahl']; ?></h5>
                                            <span><?php echo $lang['director_general']; ?></span>
                                            <p style="text-align: justify;">
                                                <?php echo $lang['director_general_profile']; ?>
                                                <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-element-title" style="margin-bottom:30px;">
                                            <!-- <h2>Heading can be used here</h2> -->
                                        </div>
                                    </div>
                                    <div class="cs-team fancy">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/extra-images/praveen_dir sir.jpeg" alt="Dr Praveen Kumar Bharti">
                                            </figure>
                                        </div>
                                        <div class="cs-text">
                                            <h5><a class="cs-color" href="director.php"><?php echo $lang['praveen_bharti']; ?></a></h5>
                                            <strong><span><?php echo $lang['director']; ?></span></strong>

                                            <!-- READMORE SECTION CAN BE ADDED USING :-
                                            <p style="text-align: justify;">
                                                <?php echo $lang['director_profile_short']; ?>
                                                <br>
                                                <a style="font-size:13px;font-weight:700;line-height:19px;padding:10px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="director.php"><?php echo $lang['readmore']; ?></a>
                                            </p> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
       <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                            <div class="row">
                                <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                                    <div class="row">


   <div class="main-section">
    <div class="page-section">
        <div class="container">
            <div class="row">
                <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                            <!-- Video Section -->
                         <!--   <div class="cs-section-title text-center">
                                <h5>हिंदी दिवस (14 सितम्बर)</h5>
                            </div>
                            <div class="video-wrapper text-center" style="margin-bottom:20px;">
                                <video width="640" height="360" controls>
                                    <source src="/assets/gallery/Hindi_Diwas_2025/1757482999_hindidivas.mp4" type="video/mp4">
                                    <source src="your-video.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                    </video>
                                </div>-->
                                <!-- End Video Section -->

    <div class="cs-section-title text-center">
    <h5><?php echo $lang['whats_new']; ?></h5>
    <hr><br>
</div>

<div class="cs-shortcode-table">

<style>
.scroll-wrapper {
    position: relative;
    display: flex;
    width: 100%;
    min-width: 0;
    max-width: 100%;
}

/* SCROLL BOX */
.scroll-container {
    flex: 1 1 0;
    min-width: 0;
    max-width: 100%;
    height: 400px;
    overflow: hidden;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 6px;
    padding: 10px;
    box-sizing: border-box;
}

/* BUTTONS (RIGHT SIDE PERFECT ALIGN) */
.controls {
    margin-left: 8px;
    display: flex;
    flex-direction: column;
    gap: 8px;
    justify-content: flex-start;
}

.controls button {
    width: 34px;
    height: 34px;
    border: none;
    background: #f1f1f1;
    cursor: pointer;
    border-radius: 50%;
    font-size: 14px;
    transition: 0.3s;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

.controls button:hover {
    background: #007bff;
    color: #fff;
}

/* TABLE */
table {
    width: 100%;
    border-collapse: collapse;
}

.scroll-container table {
    width: 100%;
    table-layout: fixed;
}

td {
    padding: 12px;
    border-bottom: 1px solid #eee;
    font-size: 14px;
}

.scroll-container td {
    white-space: normal;
    word-break: break-word;
    overflow-wrap: anywhere;
}

@media (max-width: 767px) {
    .scroll-wrapper {
        flex-direction: column;
        align-items: stretch;
    }

    .scroll-container {
        flex: none;
        width: 100%;
        height: 360px;
        overflow-x: hidden;
        overflow-y: auto;
        -webkit-overflow-scrolling: touch;
        touch-action: pan-y;
    }

    .controls {
        flex-direction: row;
        justify-content: center;
        margin: 8px 0 0;
    }
}

/* VIEW BUTTON */
.scroll-container a.cs-btn {
    display: block;
    width: max-content;
    max-width: 100%;
    float: none;
    margin: 6px 0 2px auto;
    padding: 6px 14px;
    background: #007bff;
    color: #fff;
    border: 1px solid #006fe6;
    border-radius: 3px;
    box-sizing: border-box;
    text-decoration: none;
    font-size: 13px;
    box-shadow: 0 3px 8px rgba(0, 86, 179, 0.25);
    transition: background-color 0.2s ease, box-shadow 0.2s ease, transform 0.2s ease;
}

.scroll-container a.cs-btn:hover {
    background: #0056b3;
    color: #fff;
    box-shadow: 0 5px 12px rgba(0, 86, 179, 0.35);
    transform: translateY(-2px);
}

.scroll-container a.cs-btn:focus-visible {
    outline: 2px solid #003f83;
    outline-offset: 2px;
}
</style>

<div class="scroll-wrapper">

    <!-- SCROLL BOX -->
    <div class="scroll-container" id="scrollBox">
        <table>
            <tbody>

<tr>
<td>
Non IT Professional Service with Reverse Charge Mechanism - 200000; CA GEM/2026/B/8182739
<br><small>Source: Tenders | Published on: 29-10-2026</small><br>
<a href="https://www.nirth.res.in/tender/2026/IT%20GeM.pdf" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
Custom Bid for Services - AMC services for Make-BioRAD D10 HPLC GEM/2026/B/7993096
<br><small>Source: Tenders | Published on: 26-10-2026</small><br>
<a href="https://www.nirth.res.in/tender/2026/Store_e-receiptno.1339594_AMCofequipments_correspondence_1428756_2026_NIRTH1_27-10-2026_09-40-42am.pdf" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
Customized AMC/CMC for Pre-owned Products - AMC Services for Genetic Analyzer; Invitrogen; Annual Maintenance Contract (AMC); Six-Monthly GEM/2026/B/7960855
<br><small>Source: Tenders | Published on: 21-09-2026</small><br>
<a href="https://www.nirth.res.in/tender/2026/Store_AMC_3730GeneticAnalyser_02_correspondence_1401464_2026_NIRTH1_22-09-2026_12-57-35pm.pdf" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
Canteen Service - Employee Welfare Model - Vegetarian; Breakfast, Lunch, Dinner, Snacks, Beverages; Inside Building Premises (exclusive for employees/ patients/ in house personnel) GEM/2026/B/7869220
<br><small>Source: Tenders | Published on: 10-09-2026</small><br>
<a href="https://www.nirth.res.in/tender/2026/ICMR-NIRTH_STORE_CANTEEN_2025.pdf" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
AcSIR PhD Programme Admission Notice - January 2027 Session
<br><small>Source: PhD Programme | January 2027 session</small><br>
<a href="https://nirth.res.in/student_corner/AcSIR%20Admission-Jan%202027%20advertisement.pdf" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
Walk-in Interview - Multiple Project Posts (Advt. 06/2026-27)
<br><small>Source: Vacancies | Interview dates: 05-06 November 2026</small><br>
<a href="vacancies.php" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>
<tr>
<td>
Young Professional-I (Admin) - Project Vacancy
<br><small>Source: Vacancies | Interview date: 06 November 2026</small><br>
<a href="vacancies.php" target="_blank" rel="noopener" class="cs-btn">View</a>
</td>
</tr>

            </tbody>
        </table>
    </div>

    <!-- BUTTONS (RIGHT SIDE PERFECT) -->
    <div class="controls">
        <button onclick="scrollUp()">▲</button>
        <button onclick="pauseScroll()">⏸</button>
        <button onclick="playScroll()">▶</button>
        <button onclick="scrollDown()">▼</button>
    </div>

</div>

</div>

<script>
const scrollBox = document.getElementById("scrollBox");
const scrollBody = scrollBox.querySelector("tbody");
const originalRows = Array.from(scrollBody.rows);
originalRows.forEach(row => {
    const clone = row.cloneNode(true);
    clone.setAttribute("aria-hidden", "true");
    clone.querySelectorAll("a, button").forEach(element => element.setAttribute("tabindex", "-1"));
    scrollBody.appendChild(clone);
});
let speed = 1;
let scrollInterval;
let loopHeight = 0;
let scrollResumeTimeout;
let isManuallyPaused = false;
let isUserScrolling = false;

function updateLoopHeight() {
    const firstClone = scrollBody.rows[originalRows.length];
    if (originalRows.length && firstClone) {
        loopHeight = firstClone.getBoundingClientRect().top - originalRows[0].getBoundingClientRect().top;
    }
}

function startScroll() {
    if (isManuallyPaused || isUserScrolling) return;
    clearInterval(scrollInterval);

    scrollInterval = setInterval(() => {
        updateLoopHeight();
        if (loopHeight <= 0) return;

        scrollBox.scrollTop += speed;

        if (scrollBox.scrollTop >= loopHeight) {
            scrollBox.scrollTop %= loopHeight;
        }
    }, 30);
}

function pauseScroll() {
    isManuallyPaused = true;
    isUserScrolling = false;
    clearInterval(scrollInterval);
    clearTimeout(scrollResumeTimeout);
}

function playScroll() {
    isManuallyPaused = false;
    isUserScrolling = false;
    clearTimeout(scrollResumeTimeout);
    startScroll();
}

function pauseForUserScroll() {
    if (isManuallyPaused) return;
    isUserScrolling = true;
    clearInterval(scrollInterval);
    clearTimeout(scrollResumeTimeout);
}

function resumeAfterUserScroll() {
    if (isManuallyPaused || !isUserScrolling) return;

    clearTimeout(scrollResumeTimeout);
    scrollResumeTimeout = setTimeout(() => {
        isUserScrolling = false;
        startScroll();
    }, 1800);
}

scrollBox.addEventListener("touchstart", pauseForUserScroll, { passive: true });
scrollBox.addEventListener("touchend", resumeAfterUserScroll, { passive: true });
scrollBox.addEventListener("touchcancel", resumeAfterUserScroll, { passive: true });
scrollBox.addEventListener("wheel", () => {
    pauseForUserScroll();
    resumeAfterUserScroll();
}, { passive: true });
scrollBox.addEventListener("scroll", resumeAfterUserScroll, { passive: true });

function scrollUp() {
    pauseForUserScroll();
    scrollBox.scrollTop -= 60;
    resumeAfterUserScroll();
}

function scrollDown() {
    pauseForUserScroll();
    scrollBox.scrollTop += 60;
    resumeAfterUserScroll();
}

startScroll();

</script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




                                        </ul>
                                    </div>
                                </div>

                                <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
                                    <div class="widget cs-widget-links">
                                        <ul>
                                            <li><a href="phd_program.php"><?php echo $lang['phd_program']; ?></a> <img src="new.gif" /></li>
                                         <!--   <li><a href="result.php"><?php echo $lang['result']; ?></a></li>
                                            <li><a href="vacancies.php"><?php echo $lang['vacancies_permanent']; ?></a></li>-->
                                            <li><a href="vacancies.php"><?php echo $lang['vacancies']; ?></a></li>
                                            <li><a href="emloyeelinks.php"><?php echo $lang['employee_links']; ?></a></li>
                                            <li><a href="staff.php"><?php echo $lang['staff_list']; ?></a></li>
                                            <!--<li><a href="analytical_instrument_facility.php"><?php echo $lang['sophisticated_analytical_instrument_facility']; ?></a></li>-->
                                            <li><a href="student_corner.php"><?php echo $lang['student_corner']; ?></a></li>
                                            <li><a href="circulars.php"><?php echo $lang['circular']; ?></a></li>
                                            <!--<li><a href="corona.php"><?php echo $lang['novel_corona']; ?></a></li>-->
                                             <li><a href="facility-gallery.php"><?php echo $lang['facility']; ?></a></li>
                                            <!--<li><a href="adjunct.php"><?php echo $lang['adjunct_faculty_scheme_icmr']; ?></</li>-->
                                            <li><a href="employees_corner.php"><?php echo $lang['downloads']; ?></a></li>
                                            <li><a href="committee.php"><?php echo $lang['committee']; ?></a></li>
                                            <!--<li><a href="mrhru.php">MRHRU Units</a></li>-->
                                        </ul>
                                    </div>
                                </div>
                            </div>


                            <br>
                                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                    <div class="cs-element-title" style="margin-bottom:30px;">
                                        <h2><?php echo $lang['scientist']; ?> <a href="scientists.php"><small><?php echo $lang['view_All']; ?></small></a>
                                        </h2>
                                    </div>
                                </div>
                                <ul class="cs-teamlist-slider">
                                    <?php
                                    $sql = "SELECT * FROM scientists_new GROUP BY sc_id ORDER BY order_series ASC";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="cs-team listing loop">
                                                <div class="cs-media">
                                                    <figure>
                                                        <a href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']); ?>"><img src="assets/images/scientists/<?php echo $row['sc_photo']; ?>" alt="#"></a>
                                                    </figure>
                                                </div>
                                                <div class="cs-text">
                                                    <h5>
                                                        <a href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']); ?>" class="cs-color"><?php if ($_SESSION['language'] == 'hi' && $row['sc_name_hindi'] != '') {
                                                                                                                                                    echo $row['sc_name_hindi'];
                                                                                                                                                } else {
                                                                                                                                                    echo $row['sc_name'];
                                                                                                                                                } ?></a>
                                                    </h5>
                                                    <span><?php if ($_SESSION['language'] == 'hi' && $row['sc_designation_hindi'] != '') {
                                                                echo $row['sc_designation_hindi'];
                                                            } else {
                                                                echo $row['sc_designation'];
                                                            } ?></span>
                                                    <p><?php if ($_SESSION['language'] == 'hi' && $row['sc_headline_hindi'] != '') {
                                                            echo $row['sc_headline_hindi'];
                                                        } //else {echo $row['sc_headline'];}
                                                        ?></p>
                                                    <a style="font-size:13px;font-weight:700;line-height:19px;padding:10px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']); ?>"><?php echo $lang['view_profile']; ?></a>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
            </div>
<!-- Tailwind CDN & Config (Preflight Disabled to protect Bootstrap) -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
  tailwind.config = {
    corePlugins: {
      preflight: false,
    }
  }
</script>
<div class="py-10">
    <div class="max-w-[1170px] mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            <!-- Calendar (30%) -->
            <div class="w-full lg:w-[30%] text-center">
                <div class="text-center mb-6">
                    <h5 class="text-[18px] font-medium m-0 leading-tight pb-2">Holiday Calendar 2026</h5>
                    <hr class="border-t border-gray-300 w-full m-0">
                </div>

                <div class="flex justify-between items-center px-2 mb-4">
                    <button id="prevBtnUnified" class="cs-bgcolor text-white px-3 py-1 rounded hover:opacity-90 border-0 outline-none cursor-pointer font-bold text-lg leading-none">
                        &#10094;
                    </button>
                    <h5 id="calendar-month-year" class="cs-color font-semibold m-0 text-base">August 2026</h5>
                    <button id="nextBtnUnified" class="cs-bgcolor text-white px-3 py-1 rounded hover:opacity-90 border-0 outline-none cursor-pointer font-bold text-lg leading-none">
                        &#10095;
                    </button>
                </div>

                <div class="overflow-x-auto mb-4 w-full">
                    <table class="w-full border-collapse border border-gray-200 text-[13px] bg-white">
                        <thead>
                            <tr class="cs-bgcolor text-white">
                                <th class="border border-gray-200 p-2 text-center">Sun</th>
                                <th class="border border-gray-200 p-2 text-center">Mon</th>
                                <th class="border border-gray-200 p-2 text-center">Tue</th>
                                <th class="border border-gray-200 p-2 text-center">Wed</th>
                                <th class="border border-gray-200 p-2 text-center">Thu</th>
                                <th class="border border-gray-200 p-2 text-center">Fri</th>
                                <th class="border border-gray-200 p-2 text-center">Sat</th>
                            </tr>
                        </thead>
                        <tbody id="calendar-body">
                            <!-- JS will populate dates here -->
                        </tbody>
                    </table>
                </div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    // Dictionary of holidays. You only need to update this once a year!
    const holidays = {
        // Format: "YYYY-M-D": { type: "gazetted" | "restricted", name: "Holiday Name" }
        "2026-8-15": { type: "gazetted", name: "Independence Day" },
        "2026-8-26": { type: "gazetted", name: "Milad-un-Nabi" },
        "2026-8-28": { type: "restricted", name: "Raksha Bandhan" },

        "2026-9-14":  { type: "gazetted", name: "Ganesh Chaturthi" },
        "2026-10-2":  { type: "gazetted", name: "Gandhi Jayanti" },
        "2026-10-20": { type: "gazetted", name: "Dussehra" },
        "2026-11-8":  { type: "gazetted", name: "Diwali" },
        "2026-11-24": { type: "gazetted", name: "Guru Nanak Jayanti" },
        "2026-12-25": { type: "gazetted", name: "Christmas Day" },
        "2026-9-4":   { type: "gazetted", name: "Janamashtami" },

        "2026-10-18": { type: "restricted", name: "Dussehra (Maha Saptami)" },
        "2026-10-19": { type: "restricted", name: "Dussehra Maha Ashtami" },
        "2026-10-26": { type: "restricted", name: "Maharishi Valmikis Birthday" },
        "2026-10-29": { type: "restricted", name: "Karaka Chaturthi" },
        "2026-11-9":  { type: "restricted", name: "Govardhan Puja" },
        "2026-11-11": { type: "restricted", name: "Bhai Duj" },
        "2026-11-15": { type: "restricted", name: "Pratihar Sashthi" },
        "2026-12-23": { type: "restricted", name: "Hazarat Ali Birthday" },
        "2026-12-24": { type: "restricted", name: "Christmas Eve" }
    };

    let currentDate = new Date(); // Automatically defaults to today's real date

    const monthYearDisplay = document.getElementById("calendar-month-year");
    const calendarBody = document.getElementById("calendar-body");

    function renderCalendar(date) {
        calendarBody.innerHTML = "";
        const year = date.getFullYear();
        const month = date.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        monthYearDisplay.textContent = monthNames[month] + " " + year;

        let dateCounter = 1;
        const today = new Date();

        for (let i = 0; i < 6; i++) {
            let row = document.createElement("tr");
            let hasCells = false;

            for (let j = 0; j < 7; j++) {
                let cell = document.createElement("td");
                cell.className = "border border-gray-200 p-2 text-center";

                if (i === 0 && j < firstDay) {
                    // Empty cells before month starts
                } else if (dateCounter > daysInMonth) {
                    // Empty cells after month ends
                } else {
                    hasCells = true;
                    cell.textContent = dateCounter;

                    let dateStr = `${year}-${month + 1}-${dateCounter}`;

                    // Highlight Weekends (Sunday = 0, Saturday = 6)
                    if (j === 0 || j === 6) {
                        cell.classList.add("text-red-500");
                    }

                    // Highlight Holidays
                    if (holidays[dateStr]) {
                        const hol = holidays[dateStr];
                        if (hol.type === "gazetted") {
                            cell.classList.add("bg-orange-100", "text-orange-600", "font-bold");
                        } else if (hol.type === "restricted") {
                            cell.classList.add("bg-purple-100", "text-purple-800", "font-bold");
                        }
                        cell.title = hol.name;
                    }

                    // Highlight Today's Date dynamically
                    if (dateCounter === today.getDate() && month === today.getMonth() && year === today.getFullYear()) {
                        cell.classList.add("bg-cyan-100", "font-bold");
                        if(!cell.title) cell.title = "Today";
                    }

                    dateCounter++;
                }
                row.appendChild(cell);
            }
            if(hasCells) calendarBody.appendChild(row);
        }
    }

    renderCalendar(currentDate);

    document.getElementById("prevBtnUnified").addEventListener("click", function() {
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar(currentDate);
    });

    document.getElementById("nextBtnUnified").addEventListener("click", function() {
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar(currentDate);
    });
});
</script>

                <div class="text-xs flex justify-around flex-wrap mb-4">
                    <span class="flex items-center"><span class="w-3 h-3 bg-orange-100 mr-1 block inline-block"></span>Gazetted</span>
                    <span class="flex items-center"><span class="w-3 h-3 bg-purple-100 mr-1 block inline-block"></span>Restricted</span>
                    <span class="flex items-center"><span class="w-3 h-3 bg-red-500 mr-1 block inline-block"></span>Weekend</span>
                    <span class="flex items-center"><span class="w-3 h-3 bg-cyan-100 mr-1 block inline-block"></span>Today</span>
                </div>

                <a class="cs-bgcolor text-white text-[13px] font-bold py-2 px-5 rounded-full inline-block hover:opacity-90 no-underline transition" href="https://nirth.res.in/employees_corner/Holiday%20List%20-%202026-1.pdf" target="_blank">
                    <i class="fa fa-file-pdf-o mr-1"></i> Download Calendar
                </a>
            </div>

            <!-- Social (70%) -->
            <div class="w-full lg:w-[70%] text-center">
                <div class="text-center mb-6">
                    <h5 class="text-[18px] font-medium m-0 leading-tight pb-2">Follow Us</h5>
                    <hr class="border-t border-gray-300 w-full m-0">
                </div>

                <div class="flex flex-col md:flex-row gap-6">
                    <!-- Facebook Feed -->
                    <div class="w-full md:w-1/2">
                        <h6 class="cs-color font-bold mb-4 text-base"><i class="fa fa-facebook mr-1"></i> Facebook</h6>
                        <div class="border border-gray-200 p-1 bg-white rounded-md shadow-sm">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FICMRNITHR&tabs=timeline&width=340&height=350&small_header=true&adapt_container_width=true&hide_cover=false&show_facepile=true" class="w-full h-[350px]" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"></iframe>
                        </div>
                    </div>
                    <!-- Instagram Feed -->
                    <div class="w-full md:w-1/2">
                        <h6 class="cs-color font-bold mb-4 text-base"><i class="fa fa-instagram mr-1"></i> Instagram</h6>
                        <div class="border border-gray-200 p-1 bg-white rounded-md shadow-sm">
                            <iframe src="https://www.instagram.com/icmr_nithr/embed" class="w-full h-[350px]" frameborder="0" scrolling="no" allowtransparency="true" title="ICMR-NITHR Instagram Feed"></iframe>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
            <!--
            <div class="page-section hidden">
                <div class="container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-element-title" style="margin-bottom:30px;">
                            <h2>Vigilance Awareness Week 2019</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="cs-team">
                                <div class="row">
                                    <div class="cs-team fancy">
                                        <div class="cs-media">
                                            <figure><img src="assets/images/vigilance/notice1.jpg" alt=""></figure>
                                        </div>
                                        <div class="cs-text">
                                            <h5><a class="cs-color" href="#">Integrity: A way of life (ईमानदारी - एक जीवन
                                                    शैली)</a></h5>
                                            <span>28-10-2019 to 02-11-2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="cs-team grid">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/images/vigilance/director_office.png">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">

                                    <div class="cs-team grid">
                                        <div class="cs-media">

                                            <figure>
                                                <img src="assets/images/vigilance/maingate2.jpg">
                                            </figure>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="cs-team grid">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/images/vigilance/reception1.jpg">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="cs-team grid">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/images/vigilance/main_gate_2.png">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="cs-team grid">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/images/vigilance/estt1.jpg">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                    <div class="cs-team grid">
                                        <div class="cs-media">
                                            <figure>
                                                <img src="assets/images/vigilance/cashier1.jpg">
                                            </figure>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="page-section" style="margin-bottom:90px;">
            <ul class="row cs-history-slider">
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="assets/extra-images/1984.jpg" alt="" />
                            <figcaption>1984</figcaption>
                        </figure>
                    </div>
                    <div class="cs-text">
                        <h5>Began as RMRCT from three rooms in NSCB </h5>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="assets/extra-images/2002.jpg" alt="" />
                            <figcaption>2002</figcaption>
                        </figure>
                    </div>
                    <div class="cs-text">
                        <h5>Shifted to New Building - RMRCT</h5>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="assets/extra-images/2014.jpg" alt="" />
                            <figcaption>2014</figcaption>
                        </figure>
                    </div>
                    <div class="cs-text">
                        <h5> Re-designated as NIRTH</h5>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="assets/extra-images/history-01.jpg" alt="" />
                            <figcaption>2016</figcaption>
                        </figure>
                    </div>
                    <div class="cs-text">
                        <h5>Mobile Lab Introduced</h5>
                    </div>
                </li>
                <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    <div class="cs-media">
                        <figure>
                            <img src="assets/extra-images/history-03.jpg" alt="" />
                            <figcaption>2018</figcaption>
                        </figure>
                    </div>
                    <div class="cs-text">
                        <h5>Central Animal Facility added to NIRTH</h5>
                    </div>
                </li>
            </ul>
        </div>
        <div class="page-section" style="background-color:#f9fafa; padding:50px 0;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="row cs-counter-holder">
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">500+</strong>
                                        <span>Research & Publication</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">20+</strong>
                                        <span>Ongoing Research Projects</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">17+</strong>
                                        <span>Scientists</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-section" style="margin-bottom:80px;">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="row cs-testimonial main-testimonial">
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-1.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-2.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-3.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-4.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-5.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-1.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-2.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-3.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-4.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/extra-images/testimonial-img-5.jpg" alt="" />
                                <figcaption>
                                    <div class="cs-text">
                                        <p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="page-section" style="margin-bottom:40px;">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">-->

                <div class="row">

                    <div class="container">
                        <div class="important-links-title"><?php echo $lang['organization']; ?></div>
                        </div>
                        <div class="marquee-container">
                            <div class="marquee-content">

                                <!-- ICMR -->
                                <a href="https://www.icmr.gov.in" target="_blank" class="link-item">
                                    <img src="assets/extra-images/ICMR Logo.png" alt="ICMR">
                                </a>

                                <!-- Ministry of Health -->
                                <a href="https://www.mohfw.gov.in" target="_blank" class="link-item">
                                    <img src="assets/extra-images/MOHFW.png" alt="Ministry of Health">
                                </a>

                                <!-- DHR -->
                                <a href="https://dhr.gov.in/" target="_blank" class="link-item">
                                    <img src="assets/extra-images/DHR.png" alt="DHR">
                                </a>

                                <!-- WHO -->
                                <a href="https://www.pmindia.gov.in/en/" target="_blank" class="link-item">
                                    <img src="assets/extra-images/PMIndia.png" alt="PM INDIA">
                                </a>

                                <!-- Duplicate logos for continuous scroll effect -->
                                <!-- ICMR -->
                                <a href="https://www.icmr.gov.in" target="_blank" class="link-item">
                                    <img src="assets/extra-images/ICMR Logo.png" alt="ICMR">
                                </a>

                                <!-- Ministry of Health -->
                                <a href="https://www.mohfw.gov.in" target="_blank" class="link-item">
                                    <img src="assets/extra-images/MOHFW.png" alt="Ministry of Health">
                                </a>

                                <!-- DHR -->
                                <a href="https://dhr.gov.in/" target="_blank" class="link-item">
                                    <img src="assets/extra-images/DHR.png" alt="DHR">
                                </a>

                                <!-- WHO -->
                                <a href="https://www.pmindia.gov.in/en/" target="_blank" class="link-item">
                                    <img src="assets/extra-images/PMIndia.png" alt="PM INDIA">
                                </a>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->
        <!-- Footer Start -->
        <?php include("footer.php"); ?>
        <!-- Footer End -->
    </div>
    </div>
    <script src="assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js -->
    <script src="assets/scripts/chosen.select.js"></script> <!-- Chosen js -->
    <script src="assets/scripts/slick.js"></script> <!-- Slick Slider js -->
    <script src="assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js -->
    <script src="assets/scripts/counter.js"></script><!-- Counter js -->

    <!-- Put all Functions in functions.js -->
    <script src="assets/scripts/functions.js"></script>
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ICMR-NITHR Hindi Documentary</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/7YjVdZyjGCI" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ICMR-NITHR English Documentary</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo2" width="560" height="315" src="//www.youtube.com/embed/6k7jOdoqx_Y" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Rebranding Popup Modal (Option A) -->
    <div id="rebrandModal" class="rebrand-modal-overlay" style="display: none;">
        <div class="rebrand-modal-card">
            <button class="rebrand-close-btn" id="closeRebrandBtn" aria-label="Close Announcement">&times;</button>
            <div class="rebrand-modal-body">
                <div class="rebrand-icon">
                    <i class="icon-bullhorn"></i>
                </div>
                <h2>Important Announcement</h2>
                <p class="rebrand-subtitle">We have updated our official name!</p>

                <div class="rebrand-transition-container">
                    <div class="rebrand-name old">
                        <span class="abbr">ICMR-NIRTH</span>
                        <span class="full">ICMR-National Institute of Research in Tribal Health, Jabalpur</span>
                    </div>
                    <div class="rebrand-arrow">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"/>
                        </svg>
                    </div>
                    <div class="rebrand-name new">
                        <span class="abbr">ICMR-NITHR</span>
                        <span class="full">ICMR-National Institute for Tribal Health Research, Jabalpur</span>
                    </div>
                </div>

                <p class="rebrand-desc">
                    Please be informed that <strong>ICMR-National Institute of Research in Tribal Health (NIRTH)</strong>, Jabalpur has officially been renamed to <strong>ICMR-National Institute for Tribal Health Research (NITHR)</strong>, Jabalpur.
                </p>

                <button class="rebrand-action-btn" id="dismissRebrandBtn">Got It, Thank You!</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    document.addEventListener("DOMContentLoaded", function() {
        // --- Modal (Option A) ---
        if (!sessionStorage.getItem('nihr_rebrand_notified')) {
            const modal = document.getElementById('rebrandModal');
            if (modal) {
                modal.style.display = 'flex';
                document.body.style.overflow = 'hidden';

                const dismissBtn = document.getElementById('dismissRebrandBtn');
                const closeBtn = document.getElementById('closeRebrandBtn');

                function closeModal() {
                    modal.style.transition = 'opacity 0.3s ease';
                    modal.style.opacity = '0';
                    setTimeout(() => {
                        modal.style.display = 'none';
                        document.body.style.overflow = '';
                    }, 300);
                    sessionStorage.setItem('nihr_rebrand_notified', 'true');
                }

                if (dismissBtn) dismissBtn.addEventListener('click', closeModal);
                if (closeBtn) closeBtn.addEventListener('click', closeModal);

                modal.addEventListener('click', function(e) {
                    if (e.target === modal) {
                        closeModal();
                    }
                });
            }
        }

        // --- Ribbon (Option B) ---
        if (!sessionStorage.getItem('nihr_ribbon_dismissed')) {
            const ribbon = document.getElementById('rebrandRibbon');
            if (ribbon) {
                ribbon.style.display = 'block';

                const closeRibbonBtn = document.getElementById('closeRebrandRibbon');
                if (closeRibbonBtn) {
                    closeRibbonBtn.addEventListener('click', function() {
                        ribbon.style.transition = 'all 0.4s ease';
                        ribbon.style.marginTop = `-${ribbon.offsetHeight}px`;
                        ribbon.style.opacity = '0';
                        setTimeout(() => {
                            ribbon.style.display = 'none';
                        }, 400);
                        sessionStorage.setItem('nihr_ribbon_dismissed', 'true');
                    });
                }
            }
        }
    });
    </script>
</body>

</html>
