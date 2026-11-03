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
    <title>Career Opportunity</title>
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
                            <li>Vacancies</li>
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
                                        <h4>Vacancies</h4>
                                        <hr>
                                    </div>

                                </div>

                                <!--<div class="cs-shortcode-table">
                                    <h2>ICMR-NIRTH offers research opportunities in Tribal Health</h2><hr>
                                    <table>                                       
                                        <tbody>
                                            <tr>                                                
                                            <td  colspan="3"><img style="width:1100px;" src="notice_new.jpg"/></td>                                                
                                            </tr>                                    
                                        </tbody>
                                    </table>
                                </div>-->




                                <div class="cs-shortcode-table">
                                    <h2>Permanent Posts</h2>
                                    <hr>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                <th width="70%">Details</th>
                                                <th>Last Date</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <tr>
                                                <td>1</td>
                                                <td>Applications are invited to fill up Account Officer post on deputation basis.</td>
                                                <td>28-02-2023 Extended to 15-03-2023</td>
                                                <td>
                                                    <a href="advertisement/2023/ACO_Hindi_JAN_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Hindi Avdt.</a><br /><br />
                                                    <a href="advertisement/2023/ACO_English_JAN_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> English Avdt.</a><br /><br />
                                                    <a href="advertisement/2023/OM_03_Mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> Circular </a><br /><br />
                                                    <a href="advertisement/2023/Application_form_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-download"></i> Application Form</a>
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>2</td>
                                                <td>To fill up various posts in the Directorate of Employment, Ministry of Labour & Employment on deputation basis
                                                    and deputation/absorption basis
                                                </td>
                                                <td>-</td>
                                                <td><a href="advertisement/deputation.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>


                                            <tr>
                                                <td>3</td>
                                                <td>Corrigendum for cancellation the recruitment process for the posts of Lower Division Clerk and Staff Car Driver (Ordinary Grade)</td>
                                                <td>-</td>
                                                <td><a href="advertisement/May_2020/Eng_corrigendum_2020.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View English</a></br></br>
                                                    <a href="advertisement/May_2020/Hindi_corrigendum_2020.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View Hindi</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>Application fee refund notification for candidates who have submitted the application fee for the posts of Lower Division Clerk and Staff Car Driver (Ordinary Grade)</td>
                                                <td>-</td>
                                                <td><a href="advertisement/May_2020/Fee_refund_website.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <!--<h5>The answer keys to the questions put in the written examinations held on 25th August, 2019 for two categories of vacant posts [LDC and Staff Car Drivers (OG)] are herewith displayed. The candidates appeared for written examination have clarification(s), if any, with regard to the answer keys published herewith can bring to the notice of the Competent Authority by sending an email director@nirth.res.in on or before 5PM of 30th August, 2019 (Friday). </h5>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                <th width="80%">Details</th>
                                                
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td >Answer keys for the post of Lower Division Clerk</td>
                                               
                                                <td><a href="advertisement/LDC_AnswerKey.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td >Answer keys for the post of Staff Car Driver (Ordinary Grade)</td>
                                               
                                                <td><a href="advertisement/Driver_AnswerKey.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>       
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td >Result of Written Examination held on 25/8/2019 for recruitment to the post of Lower Division Clerk & Staff Car Driver (Ordinary Grade) have been declared and candidates may view their result by login website www.nirth.res.in  <Result>. Candidates are advised to visit regularly ICMR-NIRTH, Jabalpur website to know further information regarding Skill/Trade Test and other update of recruitment.</td>
                                               
                                                <td><a href="result.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                        
                                            ----------------Post of Lower Division Clerk (Post Code=01): Category-Unreserved----------------------->

                                    <!--<tr>
                                                <td>1</td>
                                                <td >List of Eligible Candidates for the Post of Lower Division Clerk (Post Code=01): Category-Unreserved</td>
                                               
                                                <td><a href="ldc_ur_e.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                            
                                            <tr>
                                                <td>2</td>
                                                <td >List of Eligible Candidates for the Post of Lower Division Clerk (Post Code=01): Category-OBC(NCL)</td>
                                               
                                                <td><a href="ldc_obc_e.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                            
                                                                                                      
                                           ----------------------Post of Driver 11: ------------------------------- -->


                                    <!--<tr>
                                                <td>3</td>
                                                <td >List of Eligible Candidates for the Post of Staff Car Driver (OG) (Post Code=11): Category-UR</td>
                                               
                                                <td><a href="driver_ur_e.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                            
                                             <tr>
                                                <td>4</td>
                                                <td >List of Eligible Candidates for the  Post of Staff Car Driver (OG) (Post Code=11):  Category-OBC(NCL)</td>
                                               
                                                <td><a href="driver_obc_e.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>       
                                            </tr>
                                            
                                            
                                            
                                            --------------------------------Syllabus-------------------------------------->
                                    <!--<tr>
                                                <td>5</td>
                                                <td >Syllabus for written examination for the  Post of Lower Division Clerk (Post Code=01)</td>
                                               
                                                <td><a href="advertisement/Syllabus19/LDC_eng_syl.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View English</a>
                                                <a href="advertisement/Syllabus19/LDC_hin_syl.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View Hindi</a></td>       
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td >Syllabus for written examination for the  Post of Staff Car Driver (Ordinary Grade) (Post Code=11)</td>
                                               
                                                <td><a href="advertisement/Syllabus19/Driver_eng_syl.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View English</a>
                                                <a href="advertisement/Syllabus19/Driver_hin_syl.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View Hindi</a></td>       
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td >Corrigendum for the following posts:<img src="new.gif"/><br/> 
                                                <ul >
                                                    <li>Technical Assistant (Computer)</li>
                                                    <li>Technical Assistant (Social Science)</li>
                                                    <li>Technician-1 (Computer)</li>
                                                    <li>Technician-1 (Engg. Support-Civil)</li>
                                                    <li>Technician-1 (Engg. Support-Mechanical)</li>
                                                    <li>Laboratory Attendant-1 (Lab/Animal House)</li>
                                                    <li>Library and Information Assistant</li> Advertisement No. ICMR-NIRTH/JBP/Estt/Rectt./2018 dated 25.06.2018
                                               
                                                    </br><li>Scientist-B (Non-Medical - Health Economist)</li> Advertisement No. NIRTH/Estt/Rect/Scientists/2019 dated 01.01.2019
                                                    </ul></td>
                                               
                                                <td><a href="advertisement/corrigendum_May19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a><br/>
                                                </td>       
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td >Format for application fee refund:<img src="new.gif"/><br/> 
                                                <ul >
                                                    <li>All the candidates are requested to submit your bank details in the following format. </br>Candidates who have already sent bank detail through email, please send again in prescribed format.</li>
                                                    </ul></td>
                                               
                                                <td><a href="advertisement/fee_refund_format.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View Format</a><br/>
                                                </td>       
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td >Corrigendum for the following posts:<img src="new.gif"/><br/> 
                                                <ul >
                                                    <li>Laboratory Attendant-1 (Horticulture) - 01 (OBC)</li></br> Advertisement No. ICMR-NIRTH/JBP/Estt/Rectt./2018 dated 25.06.2018
                                               
                                                    </br><li>Scientist-B (Non-Medical - Entomologist) - 01 (OBC)</li></br> Advertisement No. NIRTH/Estt/Rect/Scientists/2019 dated 01.01.2019
                                                    </ul></td>
                                               
                                                <td><a href="advertisement/march19/corrigendum_mar19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a><br/>
                                                </td>       
                                            </tr>
                                            
                                            <tr>
                                                <td>10</td>
                                                <td >Important Notice<img src="new.gif"/><br/></td>
                                               
                                                <td><a href="advertisement/july2019/notice_july19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a><br/>
                                                </td>       
                                            </tr>-->

                                    </tbody>
                                    </table>
                                </div>



                                <br><br>

                                <div class="cs-shortcode-table">
                                    <h2>Project Posts </h2>
                                    <hr>

                                    <a href="https://nirth.res.in/advertisement/New_application_form_project.pdf" target="_blank"><button class="cs-btn cs-bgcolor">Download Application Form</button></a><br><br>
                                    <a href="https://nirth.res.in/froms_2021/No-Dues_Certificate.pdf" target="_blank"><button class="cs-btn cs-bgcolor">Download Project No-Dues Form </button></a><br><br>
                                    <a href="https://nirth.res.in/froms_2021/IDcard_corrected.pdf" target="_blank"><button class="cs-btn cs-bgcolor">Download Project Id Card Form </button></a><br><br>
                                    <table>
                                        <thead>
                                            <tr>
                                                <th width="5%">S.No.</th>
                                                <th width="40%">Project Name</th>
                                                <th>Details</th>
                                                <th>Last Date</th>
                                                <th width="13%">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>
                                                    Walk-in-Interview under the project entitled “(1) A non-inferiority randomized trial to assess the efficacy of 10mg hydroxyurea..., (2) Assessment of new born screening approaches for Sickle Cell disease.... ". <img src="new.gif" />
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Medical Consultant 1 Post – (UR) </li>
                                                        <li>Medical Consultant 1 Post – (UR) </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    25.09.2023 at 9.00 AM onwards
                                                </td>

                                                <td>
                                                    <a href="advertisement/2023/Medical_Cons_Sept_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a> <br><br>
                                                    <a href="advertisement/Application_form_project.pdf" target="_blank" class="cs-btn small cs-bgcolor">Application Form</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>
                                                    Walk-in-Interview under the project entitled “To study the dynamics of sickling inside blood capillary...". <img src="new.gif" />
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Project Assistant 1 Post: - OBC </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    22.09.2023 at 9.00 AM onwards
                                                </td>

                                                <td>
                                                    <a href="advertisement/2023/Advt_Sickling_Sept_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a> <br><br>
                                                    <a href="advertisement/Application_form_project.pdf" target="_blank" class="cs-btn small cs-bgcolor">Application Form</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>
                                                    Walk-in-Interview under the project entitled “Connecting the unconnected". <img src="new.gif" />
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Project Scientist-B (Non-Medical) (Social Science) 1 Post </li>
                                                        <li>Project Research Assistant 4 Posts- (UR-1, EWS-1, ST-1, SC-1) </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    20.09.2023 at 9.00 AM onwards
                                                </td>

                                                <td>
                                                    <a href="advertisement/2023/Advt_SEPT_2023_Connecting_SC(B).pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a> <br><br>
                                                    <a href="advertisement/Application_form_project.pdf" target="_blank" class="cs-btn small cs-bgcolor">Application Form</a>
                                                </td>
                                            </tr>    
                                        
                                            <tr>
                                                <td class="sn"></td>
                                                <td>
                                                    Walk-in-Interview under the project entitled “MRHRU Jheet, Block Patan, District Durg (Chhattisgarh)". <img src="new.gif" />
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Project Scientist-C (Medical) 1 Post: UR </li>
                                                        
                                                    </ul>
                                                </td>
                                                <td>
                                                    22.09.2023 at 9.00 AM onwards
                                                </td>

                                                <td>
                                                    <a href="advertisement/2023/Advt_Sept_2023_MRHRU_JHEET_Scientist-C(M).pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a> <br><br>
                                                    <a href="advertisement/Application_form_project.pdf" target="_blank" class="cs-btn small cs-bgcolor">Application Form</a>
                                                </td>
                                            </tr>
                                            
                                                <td class="sn"></td>
                                                <td>
                                                    Walk-in-Interview under the project entitled ““Elucidating the role of nanoparticles and associated mechanisms in modulating matrix metalloproteinases activities/expressions in dengue viral disease: nanotherapeutics for dengue shock syndrome (DSS/DHF)”– For a period of Six (6) months. <img src="new.gif" />
                                                </td>
                                                <td>
                                                    <ul>
                                                        <li>Junior Research Fellow- 1 Post – (UR)</li>
                                                    </ul>
                                                </td>
                                                <td>
                                                        14.09.2023 at 9.00 AM onwards
                                                </td>

                                                <td>
                                                    <a href="advertisement/2023/JRF_ADVT_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a> <br><br>
                                                    <a href="advertisement/Application_form_project.pdf" target="_blank" class="cs-btn small cs-bgcolor">Application Form</a>
                                                </td>
                                            </tr>
                                            
                                            

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="5" style="padding-left: 0px!important;"><a href="vacancies_archive.php" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-archive"></i>Archive</a></td>
                                            </tr>
                                        </tfoot>
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