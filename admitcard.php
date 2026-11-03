<?php 
session_start();
include("language.php");
?>
<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Result</title>
           
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
						<li>Admit Card</li>
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
                        	<h4>Admit Card</h4>
                            <hr>
                        </div>

                    </div>
                    
            
                   
           

            <div class="cs-shortcode-table">
                                    <!--<h2>Download call letter for Skill test (Computer knowledge & typing test) for the post of Lower Division Clerk</h2><hr>
                                  
                                    <table style="align: center; width: 50%">
                                        
                                        
                                            <form name="download" id="download" method="post" action="old/recruit_keylong/view/download.php">
                                            	<tr><td style="text-align: right; ">Registration Number</td>
                                            	<td style="text-align: left; "> <input type="text" id="username" name="username" style="border-color:red"/></td></tr>
                                              <tr><td style="text-align: right; ">Password (DD-MM-YYYY)</td><td style="text-align: left; ">
                                              <input type="text" id="password" name="password" width="20" style="border-color:red"/></td></tr>
                                              <tr><td colspan="2" style="text-align: center;">
                                              <input type="submit" id="submit" value="Download" /></td></tr>
                                            </form>
                                            
                                    </table>
                                    <h2>Download call letter for Trade test for the post of Staff Car Driver (Ordinary Grade)</h2><hr>
                                  
                                    <table style="align: center; width: 50%">
                                        
                                        
                                            <form name="download" id="download" method="post" action="old/recruit_keylong/view/download1.php">
                                            	<tr><td style="text-align: right; ">Registration Number</td>
                                            	<td style="text-align: left; "> <input type="text" id="username" name="username" style="border-color:red"/></td></tr>
                                              <tr><td style="text-align: right; ">Password (DD-MM-YYYY)</td><td style="text-align: left; ">
                                              <input type="text" id="password" name="password" width="20" style="border-color:red"/></td></tr>
                                              <tr><td colspan="2" style="text-align: center;">
                                              <input type="submit" id="submit" value="Download" /></td></tr>
                                            </form>
                                            
                                    </table>
                                    <h3>Instructions for downloading call letters</h2><hr>
                                  
                                    <table style="text-align: left; ">
                                            <tr>
                                                <td width="5%">1</td>
                                                <td width="40%">Use 4 digit registration number in "registration number" field which is already shown in the list of eligible candidates.</td>
                                                <td width="40%">‘‘पंजीकरण संख्या‘‘ फ़ील्ड में 4 अंकों की पंजीकरण संख्या का उपयोग करें जो पहले से ही योग्य उम्मीदवारों की सूची में दिखाया गया है।</td>
                                            </tr>
                                            <tr>
                                                <td width="5%">2</td>
                                                <td width="40%">In "Password" field, use your date of birth in the form of DD-MM-YYYY (Ex. 12-07-2019)</td>
                                                <td width="40%">‘‘पासवर्ड‘‘ फ़ील्ड में अपनी जन्मतिथि का उपयोग DD-MM-YYYY के रूप में करें। (उदाहरण के लिए 12-07-2019)</td>
                                            </tr>
                                    </table>-->
                                   
                                        
                                        
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