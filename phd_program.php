<?php 
session_start();
include("language.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>PhD Programme Admissions | ICMR-NITHR</title>

<!-- Standard Styles -->
<link href="assets/css/bootstrap.css" rel="stylesheet">
<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
<link href="assets/css/iconmoon.css" rel="stylesheet">
<link href="style.css" rel="stylesheet">
<link href="assets/css/color.css" rel="stylesheet">
<link href="assets/css/responsive.css" rel="stylesheet">

<!-- Font Awesome for nice icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script src="assets/scripts/jquery.js"></script>
<script src="assets/scripts/bootstrap.min.js"></script>

<style>
    /* ═══════════════════════
       DESIGN TOKENS & STYLES
       ═══════════════════════ */
    .phd-section {
        --primary: #005ea2;
        --primary-dark: #004a80;
        --primary-mid: #0073c4;
        --primary-100: #e8f4fd;
        --primary-200: #cce4f6;

        --success-bg: #d4edda; --success-text: #155724;
        --danger-bg:  #f8d7da; --danger-text:  #721c24;
        --warning-bg: #fff3cd; --warning-text: #856404;
        --info-bg:    #d1ecf1; --info-text:    #0c5460;

        --text-heading: #1a2332;
        --text-body: #2c3e50;
        --text-muted: #6c7a8d;
        --border: #e8ecf1;
        --surface: #ffffff;
        --surface-alt: #f8f9fc;
        --bg-page: #f4f6f9;

        --radius-lg: 16px;
        --radius-md: 12px;
        --radius-sm: 10px;
        --radius-pill: 50px;

        --shadow: 0 4px 25px rgba(0,0,0,0.07);
        --shadow-hover: 0 8px 35px rgba(0,94,162,0.12);

        --ease: all 0.3s ease;

        padding: 40px 0 60px;
        background: var(--bg-page);
    }

    .phd-section .container { max-width: 1200px; }

    /* ─── Merged Info Box ─── */
    .merged-info-box {
        background: var(--surface);
        border-radius: var(--radius-lg);
        padding: 35px 40px;
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        margin-bottom: 30px;
        transition: var(--ease);
        animation: fadeInUp 0.6s ease forwards;
    }

    .merged-info-box:hover { box-shadow: var(--shadow-hover); }

    .merged-info-box .info-grid {
        display: grid;
        grid-template-columns: 1.6fr 1fr;
        gap: 35px;
    }

    .merged-info-box .info-grid .left-section {
        border-right: 1px solid var(--border);
        padding-right: 35px;
        min-width: 0;
    }

    .merged-info-box .info-grid .right-section { padding-left: 5px; min-width: 0; }

    .merged-info-box .section-label {
        display: flex;
        align-items: center;
        gap: 14px;
        margin-bottom: 20px;
        color: var(--primary);
        font-weight: 700;
        font-size: 19px;
    }

    .merged-info-box .section-label .icon-circle {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 44px;
        height: 44px;
        background: linear-gradient(135deg, var(--primary-100) 0%, var(--primary-200) 100%);
        border-radius: 50%;
        color: var(--primary);
        font-size: 20px;
        flex-shrink: 0;
    }

    .merged-info-box .section-label .icon-circle.link-icon {
        background: linear-gradient(135deg, #fff3e0 0%, #ffe0b2 100%);
        color: #e65100;
    }

    .merged-info-box .info-text {
        color: var(--text-body);
        line-height: 1.9;
        font-size: 15px;
    }

    .merged-info-box .info-text p { margin-bottom: 15px; }
    .merged-info-box .info-text strong { color: var(--primary); }

    .merged-info-box .info-text ul {
        padding-left: 0;
        margin-bottom: 0;
        list-style: none;
    }

    .merged-info-box .info-text ul li {
        margin-bottom: 12px;
        padding-left: 28px;
        position: relative;
        background: var(--surface-alt);
        padding: 12px 15px 12px 35px;
        border-radius: var(--radius-sm);
        border: 1px solid var(--border);
    }

    .merged-info-box .info-text ul li:before {
        content: "\f0a4"; /* FontAwesome hand-point-right */
        font-family: "Font Awesome 6 Free";
        font-weight: 900;
        color: var(--primary);
        position: absolute;
        left: 12px;
        top: 12px;
    }

    .merged-info-box .info-text ul li .update-highlight {
        color: #c53030;
        font-weight: bold;
    }

    /* ─── Links / Portals Details ─── */
    .merged-info-box .contact-details {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    .portal-btn {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px 20px;
        background: #ffffff;
        border-radius: var(--radius-md);
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid var(--border);
        text-decoration: none !important;
        color: var(--text-heading);
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
    }

    .portal-btn:hover {
        border-color: var(--primary-200);
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,94,162,0.08);
    }

    .portal-btn .icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--primary-100);
        color: var(--primary);
        border-radius: 12px;
        font-size: 20px;
        flex-shrink: 0;
        transition: all 0.3s ease;
    }

    .portal-btn:hover .icon {
        background: var(--primary);
        color: #ffffff;
        transform: scale(1.05);
    }

    .portal-btn.btn-acsir .icon { background: #e3f2fd; color: #1565c0; }
    .portal-btn.btn-acsir:hover .icon { background: #1565c0; color: #ffffff; }

    .portal-btn.btn-official .icon { background: #e8f5e9; color: #2e7d32; }
    .portal-btn.btn-official:hover .icon { background: #2e7d32; color: #ffffff; }

    .portal-btn .details {
        display: flex;
        flex-direction: column;
        flex: 1;
        justify-content: center;
    }

    .portal-btn .details .label {
        font-size: 11.5px;
        color: #64748b;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }

    .portal-btn .details .value {
        font-size: 15px;
        font-weight: 600;
        color: #1e293b;
        line-height: 1.5;
    }

    .portal-btn .details .value a {
        transition: color 0.2s ease;
    }
    .portal-btn .details .value a:hover {
        color: var(--primary) !important;
    }

    /* ─── Coordinator Card ─── */
    .coordinator-card {
        background: #ffffff;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .coordinator-card:hover {
        border-color: var(--primary-200);
        box-shadow: 0 10px 25px rgba(0,94,162,0.08);
        transform: translateY(-3px);
    }
    .coordinator-header {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 20px;
        background: var(--surface-alt);
        border-bottom: 1px solid var(--border);
    }
    .coordinator-header .icon {
        width: 50px;
        height: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #e3f2fd;
        color: #1565c0;
        border-radius: 12px;
        font-size: 22px;
        flex-shrink: 0;
    }
    .coordinator-header .details {
        display: flex;
        flex-direction: column;
    }
    .coordinator-header .details .label {
        font-size: 11.5px;
        color: #64748b;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.8px;
        margin-bottom: 4px;
    }
    .coordinator-header .details .value {
        font-size: 16px;
        font-weight: 700;
        color: #1e293b;
        line-height: 1.4;
    }
    .coordinator-header .details .value small {
        font-size: 13px;
        font-weight: 500;
        color: #64748b;
    }
    .coordinator-body {
        padding: 15px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .coordinator-body .contact-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        font-size: 14.5px;
        color: #475569;
        text-decoration: none;
    }
    .coordinator-body .contact-item i {
        color: var(--primary);
        font-size: 16px;
        margin-top: 3px;
        width: 16px;
        text-align: center;
    }
    .coordinator-body .contact-item span {
        display: flex;
        flex-direction: column;
        gap: 4px;
    }
    .coordinator-body .contact-item a {
        color: inherit;
        text-decoration: none;
        transition: color 0.2s;
    }
    .coordinator-body .contact-item a:hover {
        color: var(--primary);
    }

    /* ─── Table / PDF Wrapper ─── */
    .document-wrapper {
        background: var(--surface);
        border-radius: var(--radius-lg);
        box-shadow: var(--shadow);
        border: 1px solid var(--border);
        overflow: hidden;
        margin-bottom: 30px;
        transition: var(--ease);
        animation: fadeInUp 0.6s ease 0.15s forwards;
        opacity: 0;
    }

    .document-wrapper:hover { box-shadow: var(--shadow-hover); }

    .section-heading {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 20px 25px;
        background: linear-gradient(135deg, var(--surface-alt) 0%, #eef1f5 100%);
        border-bottom: 2px solid var(--border);
    }

    .section-heading i {
        font-size: 24px;
        color: var(--primary);
        background: var(--surface);
        padding: 10px;
        border-radius: var(--radius-md);
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }

    .section-heading h3 {
        font-size: 20px;
        font-weight: 700;
        color: var(--text-heading);
        margin: 0;
        line-height: 1.2;
    }

    .pdf-container {
        padding: 25px;
        background: var(--surface);
        text-align: center;
    }

    .pdf-viewer {
        width: 100%;
        border-radius: var(--radius-md);
        border: 1px solid var(--border);
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: inset 0 2px 10px rgba(0,0,0,0.05);
    }

    .btn-download {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary);
        color: #fff !important;
        padding: 10px 25px;
        border-radius: var(--radius-pill);
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: var(--ease);
        box-shadow: 0 4px 10px rgba(0,94,162,0.2);
    }
    .btn-download:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(0,94,162,0.3);
    }

    /* ─── Page Title Header ─── */
    .page-title-header {
        background: linear-gradient(135deg, #005ea2 0%, #003b6f 100%);
        color: #fff !important;
        padding: 40px 0;
        text-align: center;
        margin-bottom: 0;
    }
    .page-title-header h1 {
        margin: 0;
        font-weight: 800;
        font-size: 32px;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #fff !important;
    }
    .page-title-header p {
        font-size: 16px;
        margin-top: 10px;
        opacity: 0.9;
        margin-bottom: 0;
        color: #fff !important;
    }

    /* ─── Animations ─── */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to   { opacity: 1; transform: translateY(0); }
    }
    .document-wrapper { opacity: 1; }

    @media (prefers-reduced-motion: reduce) {
        .merged-info-box, .document-wrapper { animation: none; opacity: 1; }
    }

    /* ─── Responsive ─── */
    @media (max-width: 992px) {
        .merged-info-box .info-grid { grid-template-columns: 1fr; gap: 25px; }
        .merged-info-box .info-grid .left-section {
            border-right: 0; padding-right: 0;
            border-bottom: 1px solid var(--border); padding-bottom: 25px;
        }
        .merged-info-box .info-grid .right-section { padding-left: 0; }
    }

    @media (max-width: 768px) {
        .merged-info-box { padding: 25px; }
        .portal-btn { padding: 12px 15px; }
        .portal-btn .icon { width: 38px; height: 38px; font-size: 16px; }
        .section-heading { padding: 15px 20px; }
        .page-title-header h1 { font-size: 26px; }
    }
</style>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<?php include("header.php");?>

    <!-- Header Banner -->
    <div class="page-title-header">
        <div class="container">
            <h1>PhD Programme Admission</h1>
            <p>January 2027 Session</p>
        </div>
    </div>

	<div class="phd-section">
        <div class="container">
            
            <!-- ─── MERGED INFO BOX ─── -->
            <div class="merged-info-box">
                <div class="info-grid">
                    <!-- Left: Basic Details -->
                    <div class="left-section">
                        <div class="section-label">
                            <span class="icon-circle">
                                <i class="fas fa-university"></i>
                            </span>
                            <span>Programme Details</span>
                        </div>
                        <div class="info-text" >
                            <p style="text-align: justify;">
                                The <strong>Academy of Scientific and Innovative Research</strong> was established as an “Institution of National Importance” through an Act of Parliament in 2012. AcSIR is an overarching institution encompassing 78 prestigious Research Institutes, which among others include: <strong>38</strong> Institutes of the Council of Scientific and Industrial Research (CSIR), <strong>28</strong> Institutes of the Indian Council of Medical Research (ICMR), <strong>5</strong> Institutes of Department of Science & Technology (DST).
                                <strong>AcSIR</strong> is the largest academic institution for doctoral research in India, having awarded <strong>958 Ph.D degrees</strong> in 2025 under STEM, with more than <strong>7,000 students</strong> currently registered in its Ph.D programs. 
                                This Institute is recognized as a research centre for the Ph.D. program in <strong>Medical Research</strong> under the <strong>Academy of Scientific and Innovative Research (AcSIR)</strong>. Ph.D. admissions are conducted twice a year, in two academic cycles. 
                                Interested candidates may <strong>apply online</strong> through the AcSIR Admission Portal. 
                            </p>
                            
                            <ul>
                                <li>
                                    <strong>AcSIR Offers</strong>
                                    <br>
                                    Ph.D (Science) – Biological Sciences, Chemical Sciences, Physical Sciences, Agricultural Sciences, Mathematical & Information Sciences
                                    <br>
                                    Ph.D (Medical Research)
                                    <br>
                                    Ph.D (Engineering)
                                    <br>
                                    IDDP* (M.Tech + Ph.D in Engineering) * Integrated Dual Degree Program
                                    <br>
                                    M.Tech
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Right: Important Links -->
                    <div class="right-section">
                        <div class="section-label">
                            <span class="icon-circle">
                                <i class="fas fa-university"></i>
                            </span>
                            <span>Coordinator Details</span>
                        </div>

                        <div class="coordinator-card">
                            <div class="coordinator-header">
                                <span class="icon"><i class="fas fa-user-tie"></i></span>
                                <div class="details">
                                    <span class="label">COORDINATOR</span>
                                    <span class="value">Dr Kalyan Brata Saha<br><small>Scientist-G and AcSIR coordinator</small></span>
                                </div>
                            </div>
                            <div class="coordinator-body">
                                <a href="tel:6264546184" class="contact-item">
                                    <i class="fas fa-phone-alt"></i>
                                    <span>6264546184</span>
                                </a>
                                <div class="contact-item">
                                    <i class="fas fa-envelope"></i>
                                    <span style="word-break: break-all;">
                                        <a href="mailto:coordinator.icmr-nirth@acsir.res.in">coordinator.icmr-nirth@acsir.res.in</a>
                                        <a href="mailto:saha.kalyan@icmr.gov.in">saha.kalyan@icmr.gov.in</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="section-label">
                            <span class="icon-circle link-icon">
                                <i class="fas fa-external-link-alt"></i>
                            </span>
                            <span>Important Links</span>
                        </div>

                        <div class="contact-details">
                            <a href="https://acsir.emli.in/ACSIRAdmissionPortal/online-admission/portal/acsir-online-adm-portal/index.php#/" target="_blank" class="portal-btn btn-acsir">
                                <span class="icon"><i class="fas fa-user-graduate"></i></span>
                                <div class="details">
                                    <span class="label">Admission</span>
                                    <span class="value">AcSIR Student Portal</span>
                                </div>
                            </a>

                            <a href="https://acsir.res.in/admissions/" target="_blank" class="portal-btn btn-official">
                                <span class="icon"><i class="fas fa-globe"></i></span>
                                <div class="details">
                                    <span class="label">Website</span>
                                    <span class="value">Official AcSIR Portal</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ─── DOCUMENT WRAPPER ─── -->
            <div class="document-wrapper">
                <div class="section-heading">
                    <i class="fas fa-file-pdf"></i>
                    <h3>ADMISSION NOTICE (January - 2027 Session)</h3>
                </div>
                
                <div class="pdf-container">
                    <div class="pdf-viewer">
                        <embed src="/student_corner/AcSIR Admission-Jan 2027 advertisement.pdf" width="100%" height="700px" type="application/pdf">
                    </div>
                    
                    <a href="https://nirth.res.in/student_corner/AcSIR Admission-Jan 2027 advertisement.pdf" target="_blank" class="btn-download">
                        <i class="fas fa-download"></i> Download PDF
                    </a>
                </div>
            </div>

        </div>
    </div>

	<?php include("footer.php");?>
</div>

<script src="assets/scripts/functions.js"></script>
</body>
</html>