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
    <title>Refund Applications</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="assets/css/iconmoon.css" rel="stylesheet">
    <link href="assets/css/chosen.css" rel="stylesheet">
    <link href="assets/css/jquery.mobile-menu.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="cs-smartstudy-plugin.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/widget.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/scripts/jquery.js"></script>
    <script src="assets/scripts/modernizr.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <style>
        .blink_me {
          animation: blinker 1s linear infinite;
          color: red;
        }
        
        @keyframes blinker {
          50% {
            opacity: 0.2;
          }
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
                            <li>Refund Applications</li>
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
                                        <h4>Refund Application</h4>
                                        <hr>
                                    </div>

                                </div>

                                <div class="cs-shortcode-table">
                                    <!--<h2>Regular Posts</h2>
                                    <hr>-->
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                <th width="60%">Application No.</th>
                                                <th width="35%">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <tr>
                                                <td>1</td>
                                                <td>T1GCBS755</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>2</td>
                                                <td>TAGBSS434</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>3</td>
                                                <td>TAGBBS1401</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>4</td>
                                                <td>T1GCBS472</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>5</td>
                                                <td>T1GCCS299</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>6</td>
                                                <td>T1GCCS299</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>7</td>
                                                <td>TAGBBS3738</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>8</td>
                                                <td>TAGBBS2188</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>9</td>
                                                <td>TAGBBS1547</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                             <tr>
                                                <td>10</td>
                                                <td>T1GCBS782</td>
                                                <td><b>₹ 300</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <br><br>

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