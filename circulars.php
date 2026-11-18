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
<title>ICMR-NITHR | Circulars</title>

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

    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li>Circulars</li>
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
                        	<h4>Circulars</h4>
                            <hr>
                        </div>

                    </div>



           <div class="cs-shortcode-table">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="70">S.No.</th>
                                                <th>Form</th>

                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;">
                                                    New Doc 11-04-2026 10.57
                                                    <img src="new.gif" alt="New" style="margin-left: 8px; vertical-align: middle;"/>
                                                </td>
                                                <td style="text-align: left; padding-left: 20px;"><a href="/New%20Doc%2011-04-2026%2010.57.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>
                                            <tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;">Office Order for Compliance and Implementation of Official Language Policy </td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/2026/Circular-416.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
											<tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;">OM - Renaming of ICMR-NIRH, Jabalpur to ICMR-National Institute for Tribal Health Research (NITHR), Jabalpur </td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/2026/Office memorandum 08.06.2026.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
											<tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;">Office Order – Appointment of Shri Abhishek Saraf as Appellate Authority  </td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/2026/Office-Order-278.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
											<tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;">Office Order – Appointment of Dr. Harshvardhan Vijay Shende as CPIO (Scientific Affairs) </td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/2026/Office Order – Appointment of Dr Harshvardhan Vijay Shende as CPIO 16122026.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
											<tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['life_certificate-pensioners'];?> </td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/Life Certificate for Pensioners 2025.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
											<tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Vigilance-Officer-Notification'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/Vigilance Officer - Circular.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
                                            <tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Cashless-Medical-Facility'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/880 Cashless Hospitals for NIRTH.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>
                                           <!-- <tr>
											    <td style="font-size: 20px;">4</td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Hindi-Pakhwada'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/rajbhasha_hindi_pakhwada.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>-->
                                             <tr>
											    <td style="font-size: 20px;" class="sn"></td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Air-Tickets'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/employees_corner/circular_724_01_07_2022.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>

											 <!--<tr>
											    <td style="font-size: 20px;">6</td>
												<td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Promotion'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/assets/images/hindi_19-05-2022.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
											</tr>

										    <!-- <tr>
											    <td style="font-size: 20px;">7</td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['nodal-officer'];?></td>

                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/employees_corner/comp.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                             </tr>-->



										    <tr>
											    <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['ICMR-Policy'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/assets/images/ripe_policy.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>

                                           <!--  <tr>

                                                <td style="font-size: 20px;">9</td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Voluntary-donation'];?></td>

                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/old/common/voluntary_donation.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>


                                            <tr>
                                                <td style="font-size: 20px;">10</td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Circular-Publication'];?></td>

                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/old/employees_corner/Circular_Publication_Screening_Committee_1195.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>-->

                                            <tr>
                                                <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Format-Publication'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/old/employees_corner/Format_Publication_Committee.doc" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>

                                                <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['IT-Circular'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/employees_corner/IT Circular 2023-24.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>
                                            <tr>
                                                <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Hindi-Fortnight23'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="https://nirth.res.in/employees_corner/Hindi Circular-merged.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
                                            </tr>
                                            <tr>
                                               <td style="font-size: 20px;" class="sn"></td>
                                               <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Incentive-scheme']; ?></td><td style="text-align: left; padding-left: 20px;"> <a href="/Circular/Hindi_Circular_for_Protsahan_2024.pdf" target="_blank" class="cs-btn small cs-bgcolor">
                                                      <i class="icon-uniF129"></i> Download
                                               </a>
                                                   </td>
                                                           </tr>
											<tr>
                                                <td style="font-size: 20px;" class="sn"></td>
                                                <td style="font-size: 20px; text-align: left; padding-left: 20px;"><?php echo $lang['Hindi-Fortnight25'];?></td>
                                                <td style=" text-align: left; padding-left: 20px;"><a href="/Circular/Hindi pakhwada.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Download</a></td>
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
	<?php include("footer.php");?>
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
