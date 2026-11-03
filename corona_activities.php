<?php 
session_start();
include("language.php");
?>
<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252">

<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Adjunct</title>
           
    <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>

<style type="text/css">
    .table-details {
        text-align: left; margin-left: 20px;
    }
</style>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<!-- Header Start -->
	<?php include("header.php");?>	
	 
    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Corona activities</li>
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
                    
                    
                  <div class="cs-shortcode-table">
                    <h2>Corona activities </h2><hr>
                    <table>                                       
                        <tbody>
						<tr>                                                
                            <td style="font-size: 16px;" colspan="3">
                              <a href="https://nirth.res.in/corona_activities/covid_home_care.pdf" target="_blank">Home isolation & care for COVID-19 by AIIMS/ICMR Task Force</a>
                            </td>
                          </tr>
                          <tr>                                                
                            <td style="font-size: 16px;" colspan="3">
                              <a href="https://nirth.res.in/corona_activities/covid.pdf" target="_blank">Corona activities by ICMR-NIRTH.</a>
                            </td>
                          </tr>
                          
                        </tbody>
                    </table>

                    

                  </div>                
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