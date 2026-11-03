<?php
session_start();
include("language.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Workshop Flyer | ICMR-NITHR</title>

<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
<link href="assets/css/iconmoon.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">

<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>

<style>

.flyer-container{
    margin:30px auto;
    width:98%;
}

.flyer-card{
    background:#fff;
    border:2px solid #005ea2;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 8px 20px rgba(0,0,0,.10);
}

.flyer-header {
    background: #005ea2;
    padding: 25px;
    text-align: center;
}

.flyer-header h2 {
    margin: 0;
    color: #ffffff !important; /* Forcefully white color apply karega */
    font-weight: bold;
    font-size: 28px; /* Professional look ke liye size adjust kiya */
}

.flyer-body{
    padding:35px;
    text-align:center;
}

.flyer-body h3{
    color:#005ea2;
    font-weight:bold;
    margin-bottom:15px;
}

.flyer-body p{
    font-size:18px;
    color:#555;
    line-height:30px;
}

.btn-download{
    background:#005ea2;
    color:#fff !important;
    padding:14px 35px;
    border-radius:5px;
    display:inline-block;
    text-decoration:none;
    font-weight:bold;
    margin-top:20px;
}

.btn-download:hover{
    background:#004b82;
    text-decoration:none;
}

.pdf-box{
    margin-top:30px;
}

.pdf-box embed{
    width:100%;
    height:900px;
    border:1px solid #ddd;
}

</style>

</head>

<body class="wp-smartstudy">

<div class="wrapper">

<?php include("header.php"); ?>

<div class="container-fluid flyer-container">

<div class="flyer-card">

<div class="flyer-header">

<h2>Hands-on workshop on Large Language Models(LLMs) for clinical & translational research</h2>

</div>

<div class="flyer-body">

<h3>ICMR - National Institute for Tribal Health Research, Jabalpur</h3>

<p>
    Please read the workshop flyer carefully

</p>

<a href="student_corner/Flyer for NITHR workshop.pdf"
target="_blank"
class="btn-download">

Download Flyer PDF

</a>

</div>

</div>

<div class="pdf-box">

<embed
src="student_corner/Flyer for NITHR workshop.pdf"
type="application/pdf">

</div>

</div>

<?php include("footer.php"); ?>

</div>

<script src="assets/scripts/functions.js"></script>

</body>
</html>