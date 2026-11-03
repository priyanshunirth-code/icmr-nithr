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
    <title>Information Regarding Admit Card</title>
               
    <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>

    <style>
        body, .main-section p, .mce-content-body p {
             color: #000 !important; 
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">

        <!-- Header Start -->
        <?php include("header.php"); ?>

        <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="cs-breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Information Regarding Admit Card</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Start -->
        <div class="main-section">
            <div class="page-section">
                <div class="container">
                    <div class="row">

                        <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title text-center">
                                        <!--<h4>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h4>-->
                                        <h4>एडमिट कार्ड डाउनलोड के संबंध में सूचना<br>(विज्ञापन संख्या एनआईआरटीएच/टेक/01/2023, दिनांक 10.07.2023)</h4>
                                        <h4>Notice Regarding Admit Card
Download<br>(Advt No. NIRTH/Tech/01/2023 dated 10.07.2023)</h4>
                                    </div>
                                    <div class="cs-section-title text-right">
                                        Date: 23.01.2024
                                    </div>
                                    <div class="cs-section-title text-center">
                                        सूचना / Notice<br>
(विज्ञापन संख्या एनआईआरटीएच/टेक/01/2023, दिनांक 10.07.2023)<br>(Advt No. NIRTH/Tech/01/2023 dated 10.07.2023)
                                    </div>
                                    <div class="cs-section-title" style="text-align: justify">
<p>अनंतिम रूप से पात्र सभी उम्मीदवारों के लिए कंप्यूटर आधारित टेस्ट (सीबीटी)
के लिए प्रवेश पत्र उनके संबंधित लॉगिन आईडी और पासवर्ड का उपयोग करके
निम्नलिखित लिंक से डाउनलोड किया जा सकता है:

</p>
<p>Admit Card for Computer Based Test (CBT) for all the provisionally eligible
candidates can be downloaded by using their respective login id and password,
using the following link:
</p>
<p><a href="https://nirth.res.in/application/" target="_blank">https://nirth.res.in/application/</a></p>
                                    </div>

                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title text-left">
                                        
                                        <p class="text-right" style="margin-bottom:0">
                                            प्रशासनिक अधिकारी,
                                            आईसीएमआर-एनआईआरटीएच
                                        </p>
                                        <p class="text-right">
                                            Administrative Officer,
                                            ICMR-NIRTH
                                        </p>
                                        <hr>
                                    </div>

                                </div>
                            </div>
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
    <script>
        var a = document.getElementsByClassName("sn");
        for (var i = 0; i < a.length; i++) {
            a[i].innerHTML = (i + 1) + ".";
        }
    </script>
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <!-- Put all Functions in functions.js -->
    <script src="assets/scripts/functions.js"></script>
</body>

</html>