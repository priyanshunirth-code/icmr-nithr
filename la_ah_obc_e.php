<?php 
session_start();
include("language.php");
?>
<?php include("config1.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Vacancies</title>
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
						<li><a href="vacancies.php">Vacancies</a></li>
						<li>Laboratory Attendant-1 (Lab/Animal House)(OBC-NCL)</li>
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
                        	<h4>PROVISIONAL STATUS OF CANDIDATES FOR THE POST OF  LABORATORY ATTENDANT-1(LABORATORY/ANIMAL HOUSE)(POST CODE 26): CATEGORY-OBC-NCL</h4>
                            <hr>
                        </div>

                    </div>
                    
            
                   
           

            <div class="cs-shortcode-table">
                                    <h2>LIST OF PROVISIONALLY ELIGIBLE CANDIDATES</h2><hr>
										<?php
										

										$sql = "SELECT * FROM la_ah_obc_e";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											echo "<table style='text-align: left;'><thead><tr><th width='5%'>S.NO.</th><th>ONLINE APPLICATION REGISTRATION NO.</th><th>NAME OF CANDIDATE</th><th>FATHER'S NAME</th><th>INDIVIDUAL CATEGORY</th><th>POST CATEGORY</th><th>ACTION REQUIRED</th></tr></thead>";
											// output data of each row
											while($row = $result->fetch_assoc()) {
												echo "<tbody><tr><td>".$row["id"]."</td><td>".$row["reg"]."</td><td>".$row["name"]."</td><td>".$row["fname"]."</td><td>".$row["individual_cat"]."</td><td>".$row["post_cat"]."</td><td>".$row["remark"]."</td></tr></tbody>";
											}
											echo "</table>";
										} else {
											echo "0 results";
										}
										
										$conn->close();
										?>
                                    
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