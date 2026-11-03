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
<title>Student Corner</title>
     
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
						<li>Student Corner</li>
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
                    <h2><?php echo $lang['student_corner']; ?></h2><hr>
                    <table>   
                        <thead>
                            <tr>
                                <th width="5%">S.No.</th>
                                <th width="60%">Details</th>
                                <th>Link for Online Application</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                          <!--
                          <tr>                                      
                            <td>1</td>
                            <td>
                              <a href="student_corner/Dissertation Guidelines 2024-25.pdf" target="_blank">Call for M.Sc. Dissertation Training Programme (6 Months: Jan-June 2025)<?php echo $lang['msc-dissertation-training-programme']; ?></a>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://forms.gle/dP4ZJ2Azg9FduVAR8" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['registration']; ?></a>
                            </td>
                          </tr>
                          -->
                        
                        
                        <tr>
                            <td>1</td>
                            <td>
                               <a href="student_corner/Call for M.Sc. dissertation at ICMR-NITHR, Jabalpur (Jan-June 2027).pdf" target="_blank">Call for M.Sc. dissertation at ICMR-NITHR, Jabalpur (Jan-June 2027)
                            <br>Last Date to Apply: 20th November, 2026<img src="new.gif" alt="New"/></a>
                            <td style="vertical-align: middle;">
                                <a href="https://docs.google.com/forms/d/15rXtD2aJqFOHYvddK-rTtyQQP6kXIH6aI5NfCgh_FBM/edit" target="_blank"  class="cs-btn small cs-bgcolor">CLICK TO APPLY</a>
                                </td>
                        </tr>
                        <!--
                        <tr>      
                        <td>2</td>
                             <td>
                               <a href="student_corner/Dissertation Guidelines 2025-26.doc" target="_blank">Call of application for Six-Month M.Sc. Dissertation Programme – Jan to Jun 2026</a> <br> 
                               <a href="student_corner/Undertaking 2025-26 for dissertation.pdf" target="_blank">Undertaking for dissertation<img src="new.gif" alt="New"/></a> 
                               <a href="student_corner/Time lines for dissertation Jan to June 2025.doc" target="_blank">Time lines for dissertation</a>
                         <td style="vertical-align: middle;">
                               <a href="https://forms.gle/7LHpVZyUgutTy1Nw8" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['registration']; ?></a>
                        </td></tr>
                        
                          <tr>      
                            <td>3</td>
                            <td>
                              <a href="student_corner/Final List.pdf" target="_blank">Result of M.Sc. Dissertation Programme 2024-2025 </a>
                            <td></td>
                          </tr> 
                          
                          <tr>                                      
                            <td>2</td>
                            <td>
                              <a href="student_corner/Results of the MSc dissertation 2023-24.pdf" target="_blank">Results for M.Sc. Dissertation Training Programme 2023-24 (Jan to June 2024)</a>
                          </tr>
                          <tr>      
                            <td>4</td>
                            <td>
                              <a href="/downloadsDissertation Guidelines 2024-25.pdf" target="_blank"><?php echo $lang['Entomology']; ?></a>
                            <td></td>
                          </tr> 

                          <tr>
                              <td>5</td>
                            <td style="font-size: 16px;">
                              <a href="https://nirth.res.in/student_corner/ccras_post_doctoral_fellowship_scheme.pdf" target="_blank"><?php echo $lang['CCRAS']; ?></a>
                            </td>
                            <td></td>
                          </tr>
                        </tbody>
                    </table>-->

                    <!-- <h2>Dissertation Application Form</h2><hr>
                    <table>                                       
                        <tbody>
                          <tr>                                                
                            <td style="font-size: 16px;">
                              <a href="https://nirth.res.in/student_corner/dissertation_form.pdf" target="_blank">Download Application Form.</a>
                            </td>
                          </tr>
                        </tbody>
                    </table> -->

                    <h2>Information for PhD students</h2><hr>
                    <table>     
                        <thead>
                            <tr>
                                <th width="5%">S.No.</th>
                                <th width="60%">Details</th>
                                 <th>Link for Online Application</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                          
                        <tr>
                            <td>1</td>                                                
                            <td >
                              <?php echo $lang['PHD_Notice_August2025']; ?> 
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/NoticecentralizedInterview_09th-June-2.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['viewlist']; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>                                                
                            <td >
                              <b>Advertisement (CLOSED):</b> <br>ICMR-NIRH in collaboration with AcSIR invites applications for Ph.D. Program of January 2026 Session
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/AcSIR PhD Admission January 2026 Session.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['Advertisement-btn']; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>                                                
                            <td >
                              <?php echo $lang['PHD_Notice_August2025']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/NoticecentralizedInterview_09th-June-2.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['viewlist']; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>                                                
                            <td >
                              <b>Advertisement (CLOSED):</b> <br><?php echo $lang['Advertisement-Aug-2025']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="/PHD/AcSIR Admissions extended date Aug 25.jpg" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['Advertisement-btn']; ?></a>
                            </td>
                        </tr>
                        
                        <tr>
                            <td>3</td>                                                
                            <td >
                            <b>Result:</b> <br><?php echo $lang['result-2']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="/student_corner/Selection Template SESSION JAN 2025 -  Final.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['result-btn']; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>                                                
                            <td >
                              <?php echo $lang['Advertisement2']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/Shortlisted candidates for the PhD Program - 2025 Jan Session.pdf.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['viewlist']; ?></a>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>                                                
                            <td >
                              <b>Advertisement (CLOSED):</b> <br><?php echo $lang['Advertisement']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/PHD January 2025 - Updated.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['Advertisement-btn']; ?></a>
                            </td>
                        </tr>
                          <tr>
                              <td>6</td>                                                
                            <td >
                              <b>Result:</b> <br><?php echo $lang['result-1']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/Selection PhD-Lab Name-ICMR-NIRTH.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['result-btn']; ?></a>
                            </td>
                          </tr>
                          <tr>
                              <td>7</td>                                                
                            <td >
                              <?php echo $lang['Advertisement1']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/Result - Shortlisted candidates for the PhD Programme.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['viewlist']; ?></a>
                            </td>
                          </tr>
                          <tr>
                              <td>8</td>                                                
                            <td >
                              <b>Advertisement (CLOSED):</b> <br><?php echo $lang['Advertisement-CLOSED']; ?>
                            </td>
                            <td style="vertical-align: middle;">
                                <a href="https://nirth.res.in/student_corner/PHD Advertisement - Flyer 2024.pdf" target="_blank"  class="cs-btn small cs-bgcolor"><?php echo $lang['Advertisement-btn']; ?></a>
                            </td>
                          </tr>
                          <!--
                          <tr>
                              <td>1</td>                                                
                            <td >
                              <a href="https://nirth.res.in/student_corner/phd_form.pdf" target="_blank">PhD form 2017.</a>
                            </td>
                            <td></td>
                          </tr>
                          <tr>                                                
                            <td>2</td>
                            <td style="font-size: 16px;">
                              <a href="https://nirth.res.in/student_corner/phd_guidelines.pdf" target="_blank">PhD guidelines 2017.</a>
                            </td>
                            <td></td>
                        </tr>
						    <tr>                                                
						    <td>3</td>
                            <td style="font-size: 16px;">
                              <a href="https://nirth.res.in/student_corner/circular-1345.pdf" target="_blank">Circular for PhD students (Weekly Journal Club).</a>
                            </td>
                            <td></td>
                          </tr>
                          -->
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