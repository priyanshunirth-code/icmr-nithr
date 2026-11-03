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
	<title>Whats New</title>
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
							<li>Whats New</li>
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
										<h4>Whats New</h4>
										<hr>
									</div>

								</div>

								<div class="cs-shortcode-table">

									<table>
										<thead>
											<tr>
												<th width="5%">S.No.</th>
												<th width="85%">Details</th>
												<th>Actions</th>
											</tr>
										</thead>
										<tbody>

											<tr>
												<td class="sn"></td>
												<td>
													Result of Walk-In-Interview held on 28-04-2023,under the project entitled “Mission Program on Pediatrics Rare Genetic Disorders".<img src="new.gif" />
												</td>
												<td><a href="result/result_04_Apr_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View </a></td>
											</tr>
											<tr>
												<td class="sn"></td>
												<td>
													Result of Walk-In-Interview held on 28-04-2023,under the project entitled “Molecular Mechanisms of Immunomodulation Imparted by Mycobacterium indicus pranii (MIP) Vaccine against multibacillary leprosy".<img src="new.gif" />
												</td>
												<td><a href="result/result_04_Apr_2023_01.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View </a></td>
											</tr>

											<tr>
												<td class="sn"></td>
												<td>
													Walk-in-Interview under the project entitled “Dengue Shock Syndrome (DSS): Study on the role of blood matrix metalloproteinase-14 (MT-1MMP/MMP-14) associated to innate immune cells and its contribution to endothelial dysfunctions". <img src="new.gif" />
												</td>
												<td><a href="advertisement/2023/Avdt_01_May_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View </a></td>
											</tr>
											<tr>
												<td class="sn"></td>
												<td>
													Result of Walk-In-Interview held on 05-04-2023,under the project entitled “Metabolic Syndrome among three PVTGs of Central India".<img src="new.gif" />
												</td>
												<td><a href="result/result_26_Apr_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View </a></td>
											</tr>
											<tr>
												<td class="sn"></td>
												<td>
													Result of Walk-In-Interview held on 12-04-2023.<img src="new.gif" />
												</td>
												<td><a href="result/result_24_Apr_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View </a></td>
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