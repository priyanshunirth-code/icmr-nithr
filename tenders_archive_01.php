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
    <title>Tenders Archive</title>
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
                            <li><a href="tenders.php">Tenders</a></li>
                            <li>Tenders Archive</li>
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
                                        <h4>Tenders Archive</h4>
                                        <hr>
                                    </div>

                                </div>

                                <div class="cs-shortcode-table">

                                    <table>
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Tender</th>
                                                <th>Published On</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- paste here -->
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of sodium test kit erba/accucare sodm 100 (Q3) Bid.No. GEM/2023/B/3210160</td>
                                                <td>20-03-2023</td>
                                                <td><a href="tender/2023/GeM_Bid_20_Mar_01_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Laboratory Vials (Q3) Bid.No. GEM/2023/B/3278082</td>
                                                <td>17-03-2023</td>
                                                <td><a href="tender/2023/GeM_Bid_20_Mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Power Sybrgreen PCR Mastermix, Thermo Fisher Scientific,Cat. No: 4367659 (Q3) Bid.No. GEM/2023/B/3227482</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/PowerSybrgreen_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of RNeasy Mini Kit (250) , Qiagen, Cat. No: 74106 (Q3) Bid.No. GEM/2023/B/3227439</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/RNeasyMiniKit_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of GeneRuler 100bp Plus DNA Ladder, 5x50? g,Thermoscientific, Cat. No: SM0322 (Q3) Bid.No. GEM/2023/B/3228666</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/GenerulerDNALadder_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of 6X DNA Loading Dye, 5 x 1 mL, Thermoscientific, Cat. No: R0611 (Q3) Bid.No. GEM/2023/B/3228695</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/LoadingDye_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of PCR Master Mix (2X) , 1000x50μ L reactions, Thermo Scientific, K0172 (Q3) Bid.No. GEM/2023/B/3219213</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/PCRMastermic_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of QuantiTect Rev. Transcription Kit (200) , Qiagen, Cat. No:205313 (Q3) Bid.No. GEM/2023/B/3227335</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/QuantitectRevTransKit_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of UltraPure Agarose, 500gm, Thermoscientific, Cat. No:16500500 (Q3) Bid.No. GEM/2023/B/3228622</td>
                                                <td>06-03-2023</td>
                                                <td><a href="tender/2023/Agarose_mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of QIAamp DNA Microbiome kit QIAGEN 51704 (Q3) Bid.No. GEM/2023/B/3198593</td>
                                                <td>28-02-2023</td>
                                                <td><a href="tender/2023/GeMBid_02_Mar_2023_01.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of DESKTOP COMPUTER Bid.No. GEM/2023/B/3199471</td>
                                                <td>28-02-2023</td>
                                                <td><a href="tender/2023/GeMBid_02_Mar_2023_02.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of DNA Blood Mini Kit (Q3) Bid.No. GEM/2023/B/3180779</td>
                                                <td>24-02-2023</td>
                                                <td><a href="tender/2023/GeMBid_02_Mar_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Split Air Conditioner Including Green AC (Version 3) (Q2) Bid.No. GEM/2023/B/3157411</td>
                                                <td>20-02-2023</td>
                                                <td><a href="tender/2023/GeMBid_23_Feb_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of TwistAmp Basic kit Biolinkk TABAS03KIT (Q3) Bid.No. GEM/2023/B/3136721</td>
                                                <td>15-02-2023</td>
                                                <td><a href="tender/2023/GeMBid_16_Feb_2023.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of DNA Blood Mini Kit (Q3)</td>
                                                <td>12-01-2023</td>
                                                <td><a href="tender/2023/GeM_Bidding_Jan_2023_05.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Laboratory Vials (Q3) </td>
                                                <td>11-01-2023</td>
                                                <td><a href="tender/2023/GeM_Bidding_Jan_2023_04.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Chelex-100 Sodium form(50-100 mesh),cation, Hi media MB 160-25 G (Q3)</td>
                                                <td>03-01-2023</td>
                                                <td><a href="tender/2023/GeM_Bidding_Jan_2023_03.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Ultra low temperature laboratory deep freezer</td>
                                                <td>03-01-2023</td>
                                                <td><a href="tender/2023/GeM_Bidding_Jan_2023_01.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of DNA Blood Mini Kit (Q3)</td>
                                                <td>02-01-2023</td>
                                                <td><a href="tender/2023/GeM_Bidding_Jan_2023_02.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Hemotype Sc (Q3)</td>
                                                <td>03/01/2023</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_002.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of autoclave bags</td>
                                                <td>26/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_003.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Go Taq G2 hot start green master mix 1000rxns</td>
                                                <td>26/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_004.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Hex Bhq1 Labelled primer oligo 50mM , Cy5 Bhq3 LabelledPrimer Oligo 50mM , Primer oligonucleotides</td>
                                                <td>26/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_005.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of ERBA 360 Diluent 20L , ERBA H360 Lyse 500ml , ERBA Elite H Clean 50ml</td>
                                                <td>26/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_006.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Sickle Scan (Q3)</td>
                                                <td>26/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_001.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of Hemoglobin Variant Kit (Q3)</td>
                                                <td>19/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_008.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of High Performance Liquid Chromatography (HPLC) System (Q3) ( PAC Only )</td>
                                                <td>16/12/2022</td>
                                                <td><a href="tender/2023/GeM_Bid_Jan_2023_007.pdf" target="_blank" class="cs-btn 
                                                    small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Hiring of Manpower Services(Unskilled Sweeper & Unskilled Labour) GeM Bid</td>
                                                <td>20/05/2022</td>
                                                <td><a href="https://nirth.res.in/tender/BID_DETAILS.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i>View</a></td>
                                            </tr>

                                            <tr>

                                                <td class="sn"></td>
                                                <td>Procurement of equipment, good and services costing between Rs. 25 lakhs and Rs. 1 Crore and above</td>
                                                <td>10/02/2022</td>
                                                <td><a href="https://nirth.res.in/tender/5th_Set_of_bid_details.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <td class="sn"></td>
                                            <td>ICMR_CPC_GeM_2022_04_dated_02.02.2022__GeM_Bid>
                                            <td>03/02/2022</td>
                                            <td><a href="https://nirth.res.in/tender/4th_set_of_bid_details.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Procurement of equipment, good and services costing between Rs. 25 lakhs and Rs. 1 Crore and above</td>
                                                <td>14/12/2021</td>
                                                <td><a href="https://nirth.res.in/tender/Tender2021.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Opening the Financial Bid on 25.02.2021>
                                                <td>24/02/2021</td>
                                                <td><a href="https://nirth.res.in/tender/Bid_opening_24.02.2021.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Limited Tender
                                                <td>22/02/2021</td>
                                                <td><a href="https://nirth.res.in/tender/limited_tender_220221.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>UPS
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/ups_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Vehicle Hiring
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/vehicle_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Housekeeping
                                                </td>
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/housekeeping_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Rate contract
                                                </td>
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/rate_contract_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Computer
                                                </td>
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/computer_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Canteen
                                                </td>
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/canteen_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Air conditioner
                                                </td>
                                                <td>10/10/2020</td>
                                                <td><a href="https://nirth.res.in/tender/ac_09102020.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>vehicle hiring
                                                </td>
                                                <td>27/07/2020</td>
                                                <td><a href="https://nirth.res.in/tender/vehicle.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Corringdum
                                                </td>
                                                <td>12/05/2020</td>
                                                <td><a href="https://nirth.res.in/tender/corrigendum.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Corringdum
                                                </td>
                                                <td>24/01/2020</td>
                                                <td><a href="https://nirth.res.in/tender/cor_ftir.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Corringdum I
                                                </td>
                                                <td>24/01/2020</td>
                                                <td><a href="https://nirth.res.in/tender/cor_1.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Corringdum II
                                                </td>
                                                <td>24/01/2020</td>
                                                <td><a href="https://nirth.res.in/tender/cor_2.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Online Tenders in DOUBLE BID SYSTEM for purchase of
                                                    following equipment during the current financial year 2019-2020. Detailed specifications of the equipment’s,
                                                    EMD, terms and condition etc have been uploaded in CPPP eProcurement portal
                                                    https://eprocure.gov.in/eprocure/app during the current financial year 2019-2020.
                                                </td>
                                                <td>06/02/2020</td>
                                                <td><a href="https://nirth.res.in/tender/tender_notice.pdf" target="_blank" class="cs-btn 
                                        small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Notice inviting for Limited Tender Sickle Cell under Madhya Pradeh Sickle Cell Anemia Control Programe Funded by Ministry of Tribal Affairs, Government of Madhya Pradesh upto 02.07.2019</td>
                                                <td>03/06/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Limited Tender-Sickle Cell-June-2019.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Notice inviting for Limited Tender State level VRDL under State level VRDL establishment of a network of laboratories for managing epidermics and Natural Calamities recommemded by Department of Health Research, Government of India upto 02.07.2019.</td>
                                                <td>03/06/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Limited-Tender-State-level-VRDL-June-2019.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Notice inviting for Open Tender State level VRDL under State level VRDL establishment of a network of laboratories for managing epidermics and Natural Calamities recommemded by Department of Health Research, Government of India upto 02.07.2019.</td>
                                                <td>03/06/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Open Tender- State-level-VRDL-June-2019.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Notice inviting tender for hiring of Vehicle upto 12.03.2019.</td>
                                                <td>14/02/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Tender_feb19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Inviting limited tender in double bid system up to 08.03.2019.</td>
                                                <td>15/02/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Limited_Tender19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>
                                            <tr>
                                                <td class="sn"></td>
                                                <td>Inviting open tender in double bid system up to 08.03.2019.</td>
                                                <td>15/02/2019</td>
                                                <td><a href="https://nirth.res.in/tender/Open_Tender19.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Inviting tender for Comprehensive annual maintenance contract for computers, computer-ups, laptops and printers</td>
                                                <td>12/10/2018</td>
                                                <td><a href="https://nirth.res.in/tender/Tender_Notice_Computers_Nov_2018.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
                                            </tr>

                                            <tr>
                                                <td class="sn"></td>
                                                <td>Inviting tender for Comprehensive annual maintenance contract for air conditioners</td>
                                                <td>12/10/2018</td>
                                                <td><a href="https://nirth.res.in/tender/Tender_Notice_AC_Nov_2018.pdf" target="_blank" class="cs-btn small cs-bgcolor"><i class="icon-uniF129"></i> View</a></td>
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