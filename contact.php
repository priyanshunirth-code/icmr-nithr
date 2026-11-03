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
<title>Contact Us</title> 

          
    <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>


</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
  
  <!-- Header Start -->
  <?php include("header.php");?>
  <div class="page-section" style="">
    <div class="cs-maps loader">
      

      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3668.630544265627!2d79.87667521505733!3d23.14717591746793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3981b22b0929eeb7%3A0xe75ccf5bcd320afc!2sNational+Institute+for+Research+In+Tribal+Health!5e0!3m2!1sen!2sin!4v1537939128083" height="392" frameborder="0" style="border: 0px none; width: 100%; pointer-events: none;" allowfullscreen></iframe>
    </div>
  </div>
  <div style="border-bottom:1px solid #f4f4f4; margin-bottom:-40px;" class="page-section">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <ul class="cs-breadcrumb">
            <li><a href="index.php"><?php echo $lang['home'];?></a></li>
            <li><a href="about.php"><?php echo $lang['about'];?></a></li>
           
            <li><?php echo $lang['contact_us'];?></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Header End --> 
  
  <!-- Main Start -->
  <div class="main-section"> 
    
    <!--Page Section Wide With Left SideBar-->
    <div class="page-section" style="padding-top:38px; margin-bottom:100px;">
      <div class="container">
        <div class="row">
          
          <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="row"> 
              <!--Element Section Start-->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="cs-section-title left">
                  <h2><?php echo $lang['contact_us'];?></h2>
                
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <ul class="cs-contact-fancy center">
                      <li>
                        <div class="cs-media"> <span> <i class="icon-mobile-phone cs-color" style="font-size:50px;line-height:31px; "></i> </span> </div>
                      </li>
                      <li>
                        <div class="cs-text">
                          <h5>+91-761-2370800, 2370818</h5>
                        </div>
                      </li>
                      
                    </ul>
                  </div>
                  <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <ul class="cs-contact-fancy center">
                      <li>
                        <div class="cs-media"> <span> <i class="icon-envelope2 cs-color"></i> </span> </div>
                      </li>
                      <li>
                        <div class="cs-text">
                          <b><a href="mailto:director-nirth@icmr.gov.in">director-nirth[at]icmr[dot]gov[dot]in</a></b>
                        </div>
                      </li>
                     
                    </ul>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                  <div class="cs-contact-info">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="cs-section-title">
                        <h2><?php echo $lang['main_campus']; ?></h2>
                      </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                      <ul>
                        <li>
                          <div class="cs-media"> <i class="icon-uniF10D"></i> </div>
                          <div class="cs-text"> <span><?php echo $lang['icmr']; ?> (<?php echo $lang['nithr']; ?>) </span>
                            <p> 
<small>Formerly: ICMR - National Institute of Research in Tribal Health, Jabalpur <br>
<?php echo $lang['indian_council_of_medical_research']; ?> <br>
<?php echo $lang['department_of_health_research']; ?>, <?php echo $lang['ministry_of_health_family_welfare']; ?> <br>
<?php echo $lang['address']; ?></small></p>
                          </div>
                        </li>
                        
                      </ul>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"> 
                      <!--Image Frame Start-->
                      <div class="image-frame defualt">
                        <div class="cs-media">
                          <figure> <img src="assets/images/contact-us-building.jpg" alt=""/> </figure>
                        </div>
                      </div>
                      <!--Image Frame End--> 
                    </div>
                  </div>
                </div>
              </div>
              
              <!--Element Section End--> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Main End --> 
  
  <!-- Footer Start -->
  <?php include("footer.php");?>
  <!-- Footer End --> 
</div>
<script src="assets/scripts/responsive.menu.js"></script> 
<script src="assets/scripts/chosen.select.js"></script> 
<script src="assets/scripts/slick.js"></script> 
<script src="assets/scripts/jquery.mobile-menu.min.js"></script> 

<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>
</body>
</html>