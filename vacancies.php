<?php
session_start();
include("language.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vacancies</title>

    <?php include("GlobalCss.php"); ?>
    <?php include("GlobalJs.php"); ?>
    <style>
        /* ROOT COLORS FOR HEADER */
        :root {
            --primary: #09203f;
            /* Deep Midnight Blue */
            --primary-light: #537895;
            /* Soft Muted Blue */
        }

        /* PAGE HEADER */
        .page-header {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary) 100%);
            color: #FFFFFF;
            text-align: center;
            padding: 80px 20px;
            margin-bottom: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
        }

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.03) 0%, transparent 60%);
            transform: rotate(30deg);
            pointer-events: none;
        }

        .page-header h1 {
            font-size: 2.75rem;
            font-weight: 700;
            color: #FFFFFF;
            margin: 0;
            letter-spacing: -0.5px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* 🌟 GLOBAL */
        body {
            background: #f4f7f6;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        /* 📦 SECTION */
        .v-section {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* 🧾 HEADINGS */
        .v-section h2 {
            font-size: 18px;
            padding: 12px 16px;
            font-weight: 600;
            margin-bottom: 20px;
            background: #ffffff;
            border-radius: 6px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #1565c0;
            color: #1e293b;
        }

        /* CATEGORY COLORS */
        .v-permanent h2 {
            border-left-color: #10b981;
        }

        /* Modern Green */
        .v-project h2 {
            border-left-color: #10b981;
        }

        /* Modern Orange */
        .v-archive h2 {
            border-left-color: #3b82f6;
        }

        /* Modern Blue */

        /* 📁 COLLAPSIBLE ARCHIVE */
        .v-archive h2 {
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            user-select: none;
        }

        .v-archive h2:hover {
            background: #f1f5f9;
            border-left-width: 8px;
        }

        .v-chevron {
            font-size: 14px;
            transition: transform 0.3s ease;
            color: #64748b;
        }

        .section-hidden {
            display: none !important;
        }

        .chevron-rotated {
            transform: rotate(-90deg);
        }

        /* 📊 RESPONSIVE WRAPPER */
        .table-responsive {
            overflow-x: auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        /* 📊 TABLE */
        .v-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
            /* Forces scroll on small screens instead of squishing */
        }

        /* HEADER */
        .v-table th {
            background: #f8fafc;
            padding: 14px 16px;
            font-size: 12px;
            font-weight: 600;
            text-align: left;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }

        /* BODY */
        .v-table td {
            padding: 16px;
            font-size: 14px;
            border-bottom: 1px solid #f1f5f9;
            line-height: 1.5;
            vertical-align: middle;
            transition: background-color 0.2s ease;
        }

        /* Remove last border cleanly */
        .v-table tr:last-child td {
            border-bottom: none;
        }

        /* 🔥 JOB TITLE (important highlight) */
        .v-table td:nth-child(2) {
            font-weight: 500;
            color: #0f172a;
        }

        /* hover */
        .v-table tr:hover td {
            background-color: #f8fafc;
        }

        /* Keep action cells in the table layout so row columns stay aligned. */
        .v-table td:last-child {
            display: table-cell;
        }

        .v-table td:last-child .v-btn {
            margin: 0 6px 6px 0;
            vertical-align: middle;
        }

        /* Lists in Table */
        .v-table td ul {
            margin: 0;
            padding-left: 20px;
            list-style-type: disc;
            color: #475569;
        }

        .v-table td ul li {
            margin-bottom: 5px;
        }

        .v-table td ul li:last-child {
            margin-bottom: 0;
        }

        /* 🔘 BUTTON BASE */
        .v-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 6px 14px;
            font-size: 13px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 500;
            border: 1px solid transparent;
            transition: all 0.2s ease-in-out;
        }

        /* 🟢 Permanent Buttons */
        .v-permanent .v-btn {
            background: #ecfdf5;
            color: #047857 !important;
            border-color: #a7f3d0;
        }

        .v-permanent .v-btn:hover {
            background: #10b981;
            color: #ffffff !important;
            border-color: #10b981;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }

        /* 🟠 Project Buttons */
        .v-project .v-btn {

            background: #10b981;
            color: #ffffff !important;
            border-color: #10b981;
        }

        .v-project .v-btn:hover {
            background: #ecfdf5;
            color: #047857 !important;
            border-color: #a7f3d0;
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.2);
        }

        /* 🔵 Archive Buttons */
        .v-archive .v-btn {
            background: #eff6ff;
            color: #1d4ed8 !important;
            border-color: #bfdbfe;
        }

        .v-archive .v-btn:hover {
            background: #3b82f6;
            color: #ffffff !important;
            border-color: #3b82f6;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
        }

        /* 📌 NOTE BOX */
        .v-note {
            padding: 16px;
            background: #fffbeb;
            border-left: 4px solid #f59e0b;
            color: #92400e;
            border-radius: 6px;
            font-size: 14px;
            box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        }

        /* 🔥 NEW BADGE */
        .new-badge {
            background: #ef4444;
            color: #fff;
            font-size: 11px;
            font-weight: 600;
            padding: 2px 8px;
            margin-left: 8px;
            border-radius: 9999px;
            /* Pill shape */
            display: inline-block;
            vertical-align: middle;
        }

        /* 📱 RESPONSIVE */
        @media (max-width: 768px) {
            .v-section h2 {
                font-size: 16px;
                padding: 10px 14px;
            }

            .page-header {
                padding: 60px 20px;
            }

            .page-header h1 {
                font-size: 2.2rem;
            }
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">

        <?php include("header.php"); ?>

        <div class="page-header">
            <h1 style="color: #ffffff !important;">Vacancies</h1>
        </div>

        <div class="main-section">
            <div class="container">

                <div class="cs-shortcode-table">

                    <!-- ðŸŸ¢ PERMANENT -->
                    <div class="v-section v-permanent">
                        <h2>Permanent Vacancies</h2>
                        <div class="v-note">
                            Currently no active permanent vacancies available.
                        </div>
                    </div>

                    <!-- ðŸŸ¡ PROJECT -->
                    <div class="v-section v-project">
                        <h2>Project Vacancies</h2>
                        
                        <!--
                        <div class="v-note">
                            Currently no active project vacancies available.
                        </div>
                        -->
                        
                        
                        
                        <div style="margin-bottom: 25px; display: flex; gap: 12px; flex-wrap: wrap;">
                            <a href="https://nirth.res.in/advertisement/2026/appli form.pdf"
                                target="_blank" class="v-btn">Download Application Form</a>
                            <a href="https://nirth.res.in/froms_2021/No-Dues_Certificate.pdf" target="_blank"
                                class="v-btn">Download Project No-Dues Form</a>
                            <a href="https://nirth.res.in/froms_2021/IDcard_corrected.pdf" target="_blank"
                                class="v-btn">Download Project Id Card Form</a>
                        </div>

                        <div class="table-responsive">
                            <table class="v-table">
                                <thead>
                                    <tr>
                                        <th width="3%">S.No.</th>
                                        <th width="40%">Project Details</th>
                                        <th width="25%">Post(s)</th>
                                        <th width="15%">Interview Date / Time</th>
                                        <th>Downloads / Result</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $proj_sno = 1; ?>
                                    
                                    <tr>
                                        <td><?php echo $proj_sno++; ?></td>
                                        <td>
                                            <strong>VACANCY NOTIFICATION- Advt. No.- 06/2026-27</strong>
                                            <br>
                                            <br>
                                            Walk-in-Interview for a period of three months or till the finalisation of Manpower Outsourcing Gem Contract (GeM Bid No. GEM/2026/B/7491140) whichever is earlier, under the ICMR-NITHR, Jabalpur <img src="new.gif" />
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Project Research Scientist-II (Medical/Non-Medical), Post-01</li>
                                                <li>Project Research Scientist-II, (Non-Medical) Post-01</li>
                                                <li>Project Research Scientist-I (Non-Medical), Post-01</li>
                                                <li>Project Research Scientist-I (Non-Medical), Post-01</li>
                                                <li>Consultant (Medical), Post-01</li>
                                                <li>Project Nurse-IV, Posts-02</li>
                                                <li>Project Nurse-III, Posts-10</li>
                                                <li>Project Field Officer, Post-01</li>
                                                <li>Project Technical Support-III, Post-01</li>
                                                <li>Project Technical Support-III, Post-01</li>
                                                <li>Project Technical Support-III, Post-01</li>
                                                <li>Project Assistant Multipurpose (Admin), Post-01</li>
                                                <li>Project Technical Support-II, Post-02</li>
                                                <li>Project Lab Technician-2 (Project Technical Support-II) Post-01</li>
                                            </ul>
                                        </td>
                                        <td>
                                            05.11.2026 and 06.11.2026
                                        </td>
                                        <td>
                                            <a href="advertisement/2026/Advt 06 - Hindi.pdf" target="_blank" 
                                                class="v-btn">View in Hindi</a> 
                                            <a href="advertisement/2026/Advt 06 - English.pdf" target="_blank" 
                                                class="v-btn">View in English</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $proj_sno++; ?></td>
                                        <td>
                                            <strong>VACANCY NOTIFICATION- Advt. No.- 06/2026-27</strong>
                                            <br>
                                            <br>
                                            Walk-in-Interview for engagement of Young Professional-I (Admin) on a purely temporary contract basis under the ICMR-NITHR, Jabalpur <img src="new.gif" />
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Young Professional - I (Admin) - 01 Post</li>
                                            </ul>
                                        </td>
                                        <td>
                                            06.11.2026
                                        </td>
                                        <td>
                                            <a href="advertisement/2026/YP-I Admin - Hindi.pdf" target="_blank" 
                                                class="v-btn">View in Hindi</a> 
                                            <a href="advertisement/2026/YP-I Admin - English.pdf" target="_blank" 
                                                class="v-btn">View in English</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $proj_sno++; ?></td>
                                        <td>
                                            Walk-in-Interview under the project entitled "Identifying the gaps and challenges in healthcare delivery system in tribal areas: A multicentric study" at XISS, Ranchi (Nodal Institute: ICMR-NITHR, Jabalpur)
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Project Technical Support – I (Data Entry) - 01 Post (UR)</li>
                                            </ul>
                                        </td>
                                        <td>
                                            28.09.2026 at 09:00 AM onwards at XISS, Dr. Camil Bulcke Path, PB. 7, Ranchi – 834001, Jharkhand
                                        </td>
                                        <td>
                                            <a href="advertisement/2026/advt xiss_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                        </td>
                                    </tr>
                                    <!--<tr>
                                        <td><?php echo $proj_sno++; ?></td>
                                        <td>
                                            Walk-in-Interview under the project entitled "Identifying the gaps and challenges in healthcare delivery system in tribal areas: A multicentric study" at XISS, Ranchi (Nodal Institute: ICMR-NITHR, Jabalpur) <img src="new.gif" />
                                        </td>
                                        <td>
                                            <ul>
                                                <li>Project Research Scientist-I (Non-Medical) (Social Science) - 01 Post (UR)</li>
                                                <li>Project Technical Support – III - 03 Posts (UR)</li>
                                                <li>Project Technical Support – I (Data Entry) - 01 Post (UR)</li>
                                            </ul>
                                        </td>
                                        <td>
                                            25.07.2026 at 09:00 AM onwards at XISS, Dr. Camil Bulcke Path, PB. 7, Ranchi – 834001, Jharkhand
                                        </td>
                                        <td>
                                            <a href="advertisement/2026/Advertisement for different POSTs ICMR NITHR AND XISS.pdf" target="_blank"
                                                class="v-btn">View</a>
                                        </td>
                                    </tr>-->
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- 🔵 ARCHIVE -->
                    <div class="v-section v-archive">
                        <h2>Archive / Results <span class="v-chevron chevron-rotated">▼</span></h2>

                        <div id="archiveContent" class="table-responsive">
                            <table class="v-table">
                                <thead>
                                    <tr>
                                        <th width="5%">S.No.</th>
                                        <th width="65%">Details</th>
                                        <th width="10%">Type</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $a_sno = 1; ?>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>VACANCY NOTIFICATION- Advt. No.- 05/2026-27</strong>
                                            <br>
                                            <br>
                                            Walk-in-Interview for a period of three months or till the finalisation of Manpower Outsourcing Gem Contract (GeM Bid No. GEM/2026/B/7491140) whichever is earlier, under the ICMR-NITHR, Jabalpur
                                            <ul>
                                                <li>Project Research Scientist- III (Medical/Non-medical), Post-01</li>
                                                <li>Project Research Scientist-II, (Non-Medical) Post-01</li>
                                                <li>Project Research Scientist-I (Non-Medical), Post-01 (EWS)</li>
                                                <li>Project Research Scientist-I (Medical), Post-01 (OBC)</li>
                                                <li>Project Research Scientist-I (Non-Medical) (Social Science), Post-01 (UR)</li>
                                                <li>Project Research Scientist I (Non-Medical) Post - 01 (UR)</li>
                                                <li>Project Research Scientist I (Non-Medical) Post - 01 (UR)</li>
                                                <li>Project Research Scientist I (Non-Medical) Post - 01 (SC)</li>
                                                <li>Project Administrative Officer, Post-01 (UR)</li>
                                                <li>Project Field Officer, Post-01 (OBC)</li>
                                                <li>Project Technical Support - III, Post-01 (ST)</li>
                                                <li>Project Technical Support - III, Post-03 (SC-1, EWS-1, OBC-1)</li>
                                                <li>Project Technical Support - III, Post-02 (UR-2)</li>
                                                <li>Project Technical Support - III, Post-01 (OBC)</li>
                                                <li>Senior Project Assistant, Post-01 (UR)</li>
                                                <li>Project Technical Support - III, Post-01 (SC)</li>
                                                <li>Project Technical support-II Post -01 (UR)</li>
                                                <li>Project Technical support-II Post -01 (OBC)</li>
                                                <li>Project Technical Support-I, Post-01 (SC)</li>
                                                <li>Project Technical Support-I, Post-01 (UR)</li>
                                                <li>Project Assistant Multipurpose (Admin) Post-01 (ST)</li>
                                                <li>Project MTS Post-01 (UR)</li>
                                                <li>Young Professional - I (Admin) - 01 Post</li>
                                            </ul>
                                            
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Advt 05 - Hindi.pdf" target="_blank" 
                                                class="v-btn">View in Hindi</a> 
                                            <a href="advertisement/2026/Advt 05 - English.pdf" target="_blank" 
                                                class="v-btn">View in English</a>
                                            <a href="advertisement/2026/Young Professional (YP-I) - Hindi.pdf" target="_blank"
                                                class="v-btn">View in Hindi</a>
                                            <a href="advertisement/2026/Young Professional (YP-I) - English.pdf" target="_blank"
                                                class="v-btn">View in English</a>
                                            <a href="https://nirth.res.in/advertisement/2026/Walk in Interview Result.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>
                                            Vacancy Notification (Advt. No.- 02/2026-27) for Engagement of Two Consultants (Scientific Non-Medical) at ICMR-NITHR, Jabalpur</strong>
                                            <ul>
                                                <li>Consultant (Scientific - Non-Medical) - 02 Posts</li>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/_Con. Advt Hindi.PDF" target="_blank"
                                                class="v-btn">View in Hindi</a>
                                            <a href="advertisement/2026/_con. Advt eng.PDF" target="_blank"
                                                class="v-btn">View in English</a>
                                            <a href="https://nirth.res.in/advertisement/2026/Xerox Scan_18082026111858.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>VACANCY NOTIFICATION- Advt. No.- 04/2026-27
                                            <br>
                                            <br>
                                            Walk-in-Interview for a period of three months or till the finalisation of Manpower Outsourcing Gem Contract (GeM Bid No. GEM/2026/B/7491140) whichever is earlier, at ICMR-NITHR, Jabalpur</strong>
                                            <ul>
                                                <li>Project Research Scientist - III (Medical / Non Medical), Post-01 </li>
                                                <li>Project Research Scientist - II (Medical / Non Medical), Posts-02 </li>
                                                <li>Project Research Scientist - II (Non Medical), Post-01 </li>
                                                <li>Lab Technician (Project Technical Support II), Post-01 (UR)</li>
                                                <li>Data Entry Operator, Post-01 (SC)</li>
                                                <li>Project Research Scientist - II (Medical) Post-01 </li>
                                                <li>Project Research Scientist - I (Non Medical) (Social Science), Post-01 (EWS) </li>
                                                <li>Project Technical Support - I, Posts-02 (EWS, UR)</li>
                                                <li>Field Worker (Project Technical Support - II), Post-01 (UR) </li>
                                                <li>Project Assistant Multipurpose (Admin), Post-01 (OBC) </li>
                                                <li>Project Technical Support - III (Project Associate - I), Post-01 (UR)</li>
                                                <li>Project Assistant Multipurpose (Admin), Post-01 (UR) </li>
                                                <li>Project Associate - I, Post-01 (UR) </li>
                                                <li>Project Technical Support - I, Post-01 (OBC)</li>
                                                <li>Project Technical Support - III (Project Assistant - I), Post-01 (OBC)</li>
                                                <li>Project Technical Support - II, Posts-02 (OBC, EWS) </li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Advt. 04-2026-27 H_rotated.pdf" target="_blank"
                                                class="v-btn">View in Hindi</a>
                                            <a href="advertisement/2026/Advt. 04 2026-27 E_rotated.pdf" target="_blank"
                                                class="v-btn">View in English</a>
                                            <a href="advertisement/2026/Result Advt. 04.pdf" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>VACANCY NOTIFICATION- Advt. No.- 03/2026-27
                                            <br>
                                            Walk-in-Interview under the project entitled "Study on anxiety and depression among sickle cell disease (SCD) patients" at ICMR-NITHR, Jabalpur</strong>
                                            <ul>
                                                <li>Project Technical Support – III - 01 Post (SC)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Advt. 03 Anxiety Hindi _02.pdf" target="_blank"
                                                class="v-btn">View in Hindi</a>
                                            <a href="advertisement/2026/Advt. 03 Anxiety_03.pdf" target="_blank"
                                                class="v-btn">View in English</a>
                                            <a href="advertisement/2026/Anxiety 638.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview for Vacancy Notification (Advt. No.- 01/2026-27) for Engagement of Young Professionals (YP-I & YP-II) at ICMR-NITHR, Jabalpur</strong>
                                            <ul>
                                                <li>Young Professional-II (Legal) - 01 Post</li>
                                                <li>Young Professional-I (Admin) - 02 Posts</li>
                                                <li>Young Professional-I (Finance & Accounts) - 01 Post</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/YPs hindi.PDF" target="_blank"
                                                class="v-btn">View in Hindi</a>
                                            <a href="advertisement/2026/YPs english.PDF" target="_blank"
                                                class="v-btn">View in English</a>
                                            <a href="advertisement/2026/Xerox Scan_20072026164753.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Pan India Surveillance for respiratory viruses through DHR-ICMR VRDL Network"</strong>
                                            <ul>
                                                <li>Project Technical Support III (Project Assistant) - 01 Posts (UR)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Pan_27052026101717_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/Xerox Scan_09062026171357.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Implementation Research for optimizing the comprehensive Sickle Cell Anemia (SCA) care services under the National SCA Elimination Mission"</strong>
                                            <ul>
                                                <li>Consultant (Scientific Medical) - 01 Post (UR)</li>
                                                <li>Project Technical Support III - 02 Posts (01 UR, 01 OBC)</li>
                                                <li>Project Technical Support I - 02 Posts (01 SC, 01 OBC)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Xerox Scan_22052026115300 (1)_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/Project Result Declaration - 1.PDF" target="_blank"
                                                class="v-btn">Result-Post 1</a>
                                            <a href="advertisement/2026/Xerox Scan_19062026102206.PDF" target="_blank"
                                                class="v-btn">Result-Post 2</a>
                                            <a href="advertisement/2026/Result SCA PTS-I.PDF" target="_blank"
                                                class="v-btn">Result-Post 3</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Unraveling the genetic basis of placental senescence and its contribution to preeclampsia and preterm delivery, at ICMR-NIRTH Jabalpur"</strong>
                                            <ul>
                                                <li>Project Associate I - 01 Posts (UR)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Xerox Scan_22052026121902_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/Xerox Scan_11062026095605.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Identifying the gaps and challenges in healthcare delivery system in tribal areas: A multicentric study"</strong>
                                            <ul>
                                                <li>Project Research Scientist I (Non-Medical) Social Science - 01 Posts (OBC)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Xerox Scan_22052026121939_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/Xerox Scan_17062026172749.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "IMPROVING DETECTION OF POSTPARTUM HEMORRHAGE: A CLUSTER NONTANDOMIZED TRIAL COMPARING CALIBRATED DRAPES WITH VISUAL ESTIMATION FOR POST-PARTUM BLOOD LOSS ESTIMATION"</strong>
                                            <ul>
                                                <li>Project Nurse III - 02 Posts (UR)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/DocScanner 21-May-2026 11-17 am_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="https://nirth.res.in/advertisement/2026/Nurse result.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Connecting the unconnected: An incentive based model to connect the Baiga tribe traditional healers to the public health system" </strong>
                                            <ul>
                                                <li>Project Research Scientist I (Non Medical) Social Science - 01 Post (UR)</li>
                                                <li>Project Technical Support III - 04 Posts (01 OBC, 01 ST, 01 SC, 01 EWS)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Xerox Scan_04052026160600_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="https://nirth.res.in/advertisement/2026/result connecting the unconnected.pdf" target="_blank"
                                                class="v-btn">Result</a>
                                                
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled ""State level Viral Research and diagnosis Laboratory at ICMR-NIRTH, Jabalpur under managing Epidemics and Natural Calamities" ICMR-NIRTH JBP" </strong>
                                            <ul>
                                                <li>Project Research Scientist II (Scientist C) (Medical) - 01 Post (UR)</li>
                                                <li>Project Research Scientist II (Scientist C) (Non-Medical) - 01 Post (UR)</li>
                                                <li>Project Technical Support III (Project Assistant) - 01 Post (UR)</li>
                                                <li>Project Technical Support II (Field Worker) - 01 Post (OBC)</li>
                                                <li>Project Multi Tasking Staff - 01 Post (OBC)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/DocScanner 07-May-2026 5-40 pm_rotated.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/Xerox Scan_25052026114016.PDF" target="_blank"
                                                class="v-btn">Result</a>
                                                
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Model Rural Health Research Unit (MRHRU) Datia" at BADONI DATIA" </strong>
                                            <ul>
                                                <li>Project Scientist C - 01 Post (UR)</li>
                                                <li>Project Technical Support III - 03 Posts (02 UR, 01 OBC)</li>
                                                <li>Lab Technical II - 03 Posts (02 UR, 01 OBC)</li>
                                                <li>Project Assistant Multipurpose - 01 Post (SC)</li>
                                                <li>MTS - 01 Post (SC)</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/mrhru daita advt.pdf" target="_blank" class="v-btn">View</a>
                                            <a href="advertisement/2026/Xerox Scan_18052026172208.PDF" target="_blank" class="v-btn">Result - 1</a>
                                            <a href="advertisement/2026/MRHRU DATIA LAB TECHNICIAN RESULT.PDF" target="_blank" class="v-btn">Result - 2</a> 
                                                
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Unraveling the genetic basis of placental senescence..."</strong>
                                            <ul>
                                                <li>Project Associate - I - 01 Post (UR)</li>
                                                <li>Interview Date: 20.04.2026</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Xerox Scan_10042026174055.PDF" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2026/DocScanner 11-May-2026 5-23 pm.pdf" target="_blank"
                                                class="v-btn">Office Order</a> 
                                        </td>
                                    </tr>

                                    <!-- Project Archive -->
                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Exploration and validation of new drug targets..."</strong>
                                            <ul>
                                                <li>Project Technical Support - III - 01 Post (OBC)</li>
                                                <li>Interview Date: 09.02.2026</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Advt (1)_rotated.pdf" target="_blank" class="v-btn">View</a>
                                            <a href="advertisement/2026/Result - 09-02-2026.PDF" target="_blank" class="v-btn">Result</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>
                                            <strong>Walk-in-Interview under the project entitled "Effectiveness of Lifestyle Modification Using M Health..."</strong>
                                            <ul>
                                                <li>Project Scientist - C (Medical) - 01 Post (UR)</li>
                                                <li>Interview Date: 08.01.2026</li>
                                            </ul>
                                        </td>
                                        <td>Project</td>
                                        <td>
                                            <a href="advertisement/2026/Advertisement - 08-01-2026.pdf" target="_blank" class="v-btn">View</a>
                                            <a href="advertisement/2026/Result - Jan 2026.PDF" target="_blank" class="v-btn">Result</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>VACANCY NOTIFICATION - for LDC Post - Advertisement No. NIRTH/Admn/01/2024
                                        </td>
                                        <td>Permanent</td>
                                        <td>
                                            <a href="advertisement/2024/Advertisement_For_LDC_Post.pdf" target="_blank"
                                                class="v-btn">View</a>
                                            <a href="advertisement/2024/LDC_Advt_2024_HINDI.pdf" target="_blank"
                                                class="v-btn">Hindi</a>
                                            <a href="advertisement/2024/Annexure_1_to_V_ LDC.pdf" target="_blank"
                                                class="v-btn">Annexure</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>VACANCY NOTIFICATION - Technical Posts - Advertisement No.
                                            NIRTH/Tech/01/2024</td>
                                        <td>Permanent</td>
                                        <td>
                                            <a href="advertisement/2024/Final_ Advertisement_Technical.pdf"
                                                target="_blank" class="v-btn">View</a>
                                            <a href="advertisement/2024/Detailed_Tech_Advt_2024_HINDI.pdf"
                                                target="_blank" class="v-btn">Hindi</a>
                                            <a href="advertisement/2024/Annexure_I_to_XIV_Technical.pdf" target="_blank"
                                                class="v-btn">Annexure</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>CORRIGENDUM DT-20.03.2024 for TECH & LDC</td>
                                        <td>Permanent</td>
                                        <td>
                                            <a href="advertisement/2024/Corrigendum_ADMN.pdf" target="_blank"
                                                class="v-btn">ADMN</a>
                                            <a href="advertisement/2024/Corrigendum_TECH.pdf" target="_blank"
                                                class="v-btn">TECH</a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>DECLARATION OF PROVISIONAL RESULTS FOR TECHNICAL CADRE</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/labatt_tech_result.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Corrigendum 26.02.2024</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/ta_result/Corrigendum  26.02.2024.pdf"
                                                target="_blank" class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>DECLARATION OF PROVISIONAL RESULTS FOR TECHNICAL CADRE POSTS</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/technical_assistant_result.php"
                                                target="_blank" class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Admit Card Notice</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/admitcardnotice.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>CBT Information</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/examnotice.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>CBT Eligible Candidates Info</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/informationregardingcbt.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>PwBD Notice</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/renoticeforpwbd.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Scribe Notice</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/noticeforpwbd.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Revised List</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/rerevisedprovisionalapplicationlist.php"
                                                target="_blank" class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Final Revised List</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/revisedprovisionalapplicationlist.php"
                                                target="_blank" class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>Eligible / Not Eligible List</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/provisionalapplicationlist.php"
                                                target="_blank" class="v-btn">View</a></td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $a_sno++; ?></td>
                                        <td>CBT Syllabus</td>
                                        <td>Permanent</td>
                                        <td><a href="https://nirth.res.in/syllabus.php" target="_blank"
                                                class="v-btn">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>

    </div>

    <!-- JS -->
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <script src="assets/scripts/functions.js"></script>

    <script>
        // Archive Toggle Logic
        document.addEventListener('DOMContentLoaded', function () {
            const archiveHeader = document.querySelector('.v-archive h2');
            const archiveContent = document.getElementById('archiveContent');
            const chevron = document.querySelector('.v-archive .v-chevron');

            if (archiveHeader && archiveContent && chevron) {
                archiveHeader.addEventListener('click', function () {
                    const isHidden = archiveContent.classList.toggle('section-hidden');
                    chevron.classList.toggle('chevron-rotated', isHidden);

                    // Optional: Update label if needed
                    // archiveHeader.childNodes[0].textContent = isHidden ? 'Show Archive ' : 'Archive ';
                });
            }
        });
    </script>

</body>

</html>