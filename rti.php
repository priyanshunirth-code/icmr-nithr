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
    <title>Right to Information (RTI)</title>

    <?php include("GlobalCss.php"); ?>
    <?php include("GlobalJs.php"); ?>
    <style>
        :root {
            --primary: #09203f;
            --primary-light: #537895;
            --accent: #1565c0;
            --text-main: #334155;
            --bg-light: #f8fafc;
        }

        body {
            background: #f4f7f6;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: var(--text-main);
            -webkit-font-smoothing: antialiased;
        }

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

        .page-header h1 {
            font-size: 2.75rem;
            font-weight: 700;
            color: #ffffff !important;
            margin: 0;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .rti-container {
            margin-bottom: 60px;
        }

        .rti-section {
            background: #ffffff;
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }

        .rti-section h2 {
            font-size: 1.5rem;
            color: #000000;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f1f5f9;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .rti-item {
            margin-bottom: 25px;
            padding-bottom: 20px;
            border-bottom: 1px dashed #e2e8f0;
        }

        .rti-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .rti-label {
            font-weight: 700;
            color: #b90000;
            display: block;
            margin-bottom: 8px;
            font-size: 1.1rem;
            text-transform: uppercase;
        }

        .rti-content {
            line-height: 1.7;
            text-align: justify;
        }

        .rti-list {
            padding-left: 20px;
            margin-top: 10px;
        }

        .rti-list li {
            margin-bottom: 8px;
        }

        .note-box {
            background: #fffbeb;
            border-left: 5px solid #f59e0b;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 30px;
            color: #92400e;
            font-weight: 500;
        }

        .table-responsive {
            margin-top: 20px;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e2e8f0;
        }

        .v-table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }

        .v-table th {
            background: #f8fafc;
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #64748b;
            text-transform: uppercase;
            font-size: 0.85rem;
            border-bottom: 2px solid #e2e8f0;
        }

        .v-table td {
            padding: 20px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: top;
        }

        .officer-info {
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .officer-name {
            font-weight: 700;
            color: var(--primary);
            font-size: 1.05rem;
        }

        .officer-detail {
            font-size: 0.95rem;
            color: #64748b;
        }

        .v-btn {
            display: inline-flex;
            align-items: center;
            background: #eff6ff;
            color: #1d4ed8 !important;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            border: 1px solid #bfdbfe;
            transition: all 0.2s;
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .v-btn:hover {
            background: #3b82f6;
            color: #ffffff !important;
            box-shadow: 0 4px 6px -1px rgba(59, 130, 246, 0.3);
        }

        @media (max-width: 768px) {
            .page-header { padding: 60px 20px; }
            .page-header h1 { font-size: 2.2rem; }
            .rti-section { padding: 20px; }
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">

        <?php include("header.php"); ?>

        <div class="page-header">
            <h1>Right to Information (RTI)</h1>
        </div>

        <div class="main-section">
            <div class="container rti-container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="note-box">
                            <strong>Note:</strong> The Postal orders/ Demand Draft related to RTI shall be in favour of <strong>The Director, ICMR- NITHR Jabalpur</strong>
                        </div>

                            <!-- English Content -->
                            <div class="rti-section">
                                <h2>Right to Information Act, 2005</h2>
                                
                                <div class="rti-item">
                                    <span class="rti-label">What is RTI?</span>
                                    <div class="rti-content">
                                        17 items (manuals) prescribed in clause (b) sub-section 1 of section 4 which every public authority required to publish within one hundred and twenty days from the enactment of this Act.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(1) Particulars of organisation, functions and duties.</span>
                                    <div class="rti-content">
                                        ICMR-National Institute of Health Research, Jabalpur, formerly known as ICMR-National Institue of Research in Tribal Health was established in 1984, under the aegis of the Indian Council of Medical Research (ICMR), New Delhi, India. ICMR is an Autonomous Body registered under the Society Act XXI of 1860, fully funded by Department of Health Research (DHR), Ministry of Health and Family Welfare, Government of India. Besides its Headquarters at New Delhi, the ICMR has 27 permanent Institutes/Centres located in different parts of the country. ICMR-NITHR is one of the permanent institute, and it is engaged in planning, executing and monitoring the regional health problems of the tribal, in and around Central India. The thrust area of research is communicable diseases and Heamoglobinopathies. The institute is estimating the magnitude of health problems posed by common diseases such as Malaria, Tuberculosis, Fluorosis etc. Studies on abnormal hemoglobin and other genetic health problems are undertaken. Socio-economic, cultural and demographic profile gives an insight about how they play vital and important role in complicating and enhancing the magnitude of the problem. Further training for communicable diseases is imparted to local expertise.
                                    </div>
                                    <div class="rti-content" style="margin-top:15px;">
                                        <strong>Vision:</strong> To improve health, nutrition and educational awareness of tribals through basic, applied and operational research to levels that they are no longer considered under privileged communities of the country.
                                    </div>
                                    <div class="rti-content" style="margin-top:15px;">
                                        <strong>Objectives:</strong>
                                        <ul class="rti-list">
                                            <li>To plan, conduct and coordinate research in order to bring out the specific health problems and health needs of the tribals of the country</li>
                                            <li>To conduct epidemiological studies of communicable and non-communicable diseases among the tribals.</li>
                                            <li>To investigate haemoglobinopathies in tribals and other communities</li>
                                            <li>To advise and assist the Government in planning, executing, monitoring and evaluation of tribal health programmes and in training of health functionaries.</li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(2) The Power and Duties of its Officers and employees.</span>
                                    <div class="rti-content">
                                        <strong>Scientists:</strong> Scientists are responsibly for planning and executing the research projects. They also assist the director of the centre in carrying out the research activities and technical coordination. They organize and participate in the training programmes as well as awareness programmes of Institute mandates.<br><br>
                                        <strong>Administrative Officer:</strong> The Administrative Officer handles all administrative matters of the centre. The Administrative Officer assists and advises the Director of the centre for administrative matters/issues. The Administrative Officer of the centre is assisted by Section Officers, Assistants/ Upper Division Clerk/Lower Division Clerk, etc. The role and powers of Administrative officer are contained in Appendix III of the Rules and Regulations of the Council.<br><br>
                                        <strong>Account Officer:</strong> The Account Officer handles all budget and financial matters of the centre. The Account Officer assists and advises the Director of the centre for financial related matters/issues. The Account officer of the centre is assisted by accounts staff, Section Officers, Assistants, Upper Division Clerk/Lower Division Clerk. The role and powers of Accounts officer are contained in Appendix III of the Rules and Regulations of the Council.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(3) Procedure followed in the decision making process including channels of supervision and accountability.</span>
                                    <div class="rti-content">
                                        Each unit/sections of the centre is tasked with the responsibility of managing the intramural activities of that unit/sections. The extramural activities are handled by the director office.
                                        <ol class="rti-list">
                                            <li>The decision making process involves processing of administrative and scientific issues by the subordinate officials on file for a decision by the Director, Administrative Officer/ Account Officer respectively.</li>
                                            <li>Proposals requiring the approval of the Director of the centre are submitted to the director office.</li>
                                            <li>Proposals requiring the approval of the Director General or ICMR Head Quarter Officials are submitted through the Director of the institute.</li>
                                            <li>All proposals having a financial implication are examined in consultation with the Financial Adviser, ICMR HQ, Delhi before their submission to the DG.</li>
                                        </ol>

                                        <h5 style="margin-top: 25px; color: var(--primary);">Review Mechanism:</h5>
                                        <ol class="rti-list" style="list-style-type: upper-alpha;">
                                            <li><strong>Scientific Advisory Committee (SAC):</strong> Reputed national in the field of bio-medical specialities and tribal health are nominated as Chairman and Members of Scientific Advisory Committee (SAC). The chairman and members of SAC are free from any administrative control of DG or Director of the Institute. They meet at annually and critically evaluate the scientific and developmental activities of the institute.</li>
                                            <li><strong>Scientific Advisory Group (SAG):</strong> The annual report of RMRCT along with the SAC Observation / Recommendation presented by the Director in SAG at division of Epidemiology and Communicable Disease (ECD), ICMR for their expert advice</li>
                                            <li><strong>Ethics Committees:</strong> The Institute constituted a committee under the Chairmanship of a Professor from Medical College with experts from Medical Colleges, NGOs, and Governmental Institutions. Every year, after the SAC the committee meets and offers their comments in each new project</li>
                                            <li><strong>Scientific & Financial Audit:</strong>  The Principal Directorate of Audit, Scientific Department, Kolkatta is undertaking the audit of the institute accounts as well as projects accounts. The scientific activities of the projects as well as the financial activities of the Institute are also being reviewed by the Principal Directorate of Audit, Scientific Department, Kolkatta. The internal audit team from our Headquarters, ICMR, New Delhi is also doing the audit of the centres and projects accounts</li>
                                        </ol>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(4) Norms set by it for the discharge of the function.</span>
                                    <div class="rti-content">
                                        The NITHR follows ICMR By-LAWS, i.e. ICMR Memorandum of Associations Rules and Regulations.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(5) The rules, regulation, instructions, manuals and records, held by it or under its control or used by its employees for discharging its function.</span>
                                    <div class="rti-content">
                                        In addition to the ICMR rules and regulations, the institute also follows mutatis-mutandis the CCS rules of Govt. of India and guidelines issued from time to time by Govt. of India.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(6) A statement of categories of documents that are held by it or under its control.</span>
                                    <div class="rti-content">
                                        The institute holds under its control files dealing with the processing of intra/extramural research proposals, the files relating to the work/task assigned by the different Divisions of the ICMR Headquarters. The files relating to selection of Group B, C, and D employees. Files related to financial statements, budgets, purchase documents, and research data and samples are commonly held by the centre in addition to the routine papers. The files related to the selection of Group 'A' employees are held at ICMR HQ, Delhi.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(7) The particulars of any arrangement that exists for consultation with or representation by the member of the public in relation to the formulation for its policies or implementation thereof.</span>
                                    <div class="rti-content">
                                        While there is no provision requiring the association of members of the public on its various committees etc., the Centre actively avails of the services of eminent scientists working as well as retired on its Committees viz Scientific Advisory Committees (SAC), Ethical Committee, Selection Committees, Technical Purchase Committee, Building Committees, etc.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(8) Boards, councils committees and other bodies consisting of two or more persons constituted as its part or for the purpose of its advice, and as to whether meeting of those boards, councils, committees and other bodies are open to the public or the minutes of such meeting are accessible for public.</span>
                                    <div class="rti-content">
                                        The Institute's main committees are:
                                        <ul class="rti-list">
                                            <li>Scientific Advisory Committee (SAC)</li>
                                            <li>Institutional Ethics Committee</li>
                                            <li>Institutional Academic Committee</li>
                                            <li>Publication Screening Committee</li>
                                            <li>Student Grievance Redressal Committee</li>
                                            <li>Institutional Refreshments Committee</li>
                                            <li>Institutional Communication Committee</li>
                                        </ul>
                                        <div style="margin-top: 15px;">
                                            The Institute Ethical Committee (IEC) has public representation.
                                        </div>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(9) A directory of its officers and employees.</span>
                                    <div class="rti-content">
                                        To view the directory of officers and employees, click the link below:
                                        <div style="margin-top: 10px;">
                                            <a href="https://nirth.res.in/staff.php" target="_blank" class="v-btn">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(10) The Monthly enumeration received by each of officers and employees including the system of compensations provided in its regulations.</span>
                                    <div class="rti-content">
                                        To view the monthly enumeration details, click the link below:
                                        <div style="margin-top: 10px;">
                                            <a href="https://nirth.res.in/old/common/renumeration_staff.pdf" target="_blank" class="v-btn">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(11) The budget allocated to each of its agency, indicating the particulars of all plans, proposed expenditure and report of disbursement made.</span>
                                    <div class="rti-content">
                                        To view the budget grant and expenditure details, click the link below:
                                        <div style="margin-top: 10px;">
                                            <a href="https://nirth.res.in/old/common/budget_grant.docx" target="_blank" class="v-btn">View</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(12) The manner of execution of subsidy programmes, indicating the amounts allocated and the details of beneficiaries of such programs.</span>
                                    <div class="rti-content">
                                        The institute does not deal with any programme involving release of subsidy.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(13) Particulars of recipients of concession, permits or authorisation granted by it.</span>
                                    <div class="rti-content">
                                        The institute does not grant any concessions/permits/authorizations.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(14) Details in respect of the information, available to or held by it, reduced in an electronic form.</span>
                                    <div class="rti-content">
                                        The information with regard to NITHR is available in electronic form at NITHR website NIRTH.RES.IN and ICMR website ICMR.GOV.IN. The institute held all scientific data, salary disbursements and annual account statements, etc. in electronic form. The electronic copies of centre's Annual Report, Publications, Tribal Health Bulletin, RMRCT Update are available on institute's web-site.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(15) The particulars of facilities available to citizens for obtaining information including the working hours of a library or reading room, if maintained for public use.</span>
                                    <div class="rti-content">
                                        There is not a Public Library as such but public can use the Institute's library which is open from 9.00 AM to 5.30 PM on all working days. The centre furnishes information on request to any citizen visiting its office. It also places many scientific documents/reports on this website as a regular feature.
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(16) The names, designation and other particulars of the Public Information Officers</span>
                                    
                                    <h5 style="color: var(--accent); margin: 20px 0 10px;">RTI Officers for Administrative & Financial Matter</h5>
                                    <div class="table-responsive">
                                        <table class="v-table">
                                            <thead>
                                                <tr>
                                                    <th>Designation</th>
                                                    <th>Officer Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Central Public Information Officer (CPIO)</strong></td>
                                                    <td>
                                                        <div class="officer-info">
                                                            <span class="officer-name">Shri Ankit Mishra</span>
                                                            <span class="officer-detail">Section Officer (Establishment)</span>
                                                            <span class="officer-detail">ICMR-National Institute for Tribal Health Research, Jabalpur</span>
                                                            <span class="officer-detail">Telephone no. 0761-2370845, 0761-2370800</span>
                                                            <span class="officer-detail">Email: ankitk.mishra[at]icmr[dot]gov[dot]in</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Appellate Authority</strong></td>
                                                    <td>
                                                        <div class="officer-info">
                                                            <span class="officer-name">Shri Abhishek Saraf</span>
                                                            <span class="officer-detail">Administrative Officer</span>
                                                            <span class="officer-detail">ICMR-National Institute for Tribal Health Research, Jabalpur</span>
                                                            <span class="officer-detail">Telephone no. 0761-2370845, 0761-2370800</span>
                                                            <span class="officer-detail">Email: abhishek[dot]saraf[at]icmr[dot]gov[dot]in</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <h5 style="color: var(--accent); margin: 30px 0 10px;">RTI Officers for Scientific Matter</h5>
                                    <div class="table-responsive">
                                        <table class="v-table">
                                            <thead>
                                                <tr>
                                                    <th>Designation</th>
                                                    <th>Officer Details</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><strong>Central Public Information Officer (CPIO)</strong></td>
                                                    <td>
                                                        <div class="officer-info">
                                                            <span class="officer-name">Dr Harshwardhan V. Shende</span>
                                                            <span class="officer-detail">Scientist 'B'</span>
                                                            <span class="officer-detail">ICMR-National Institute for Tribal Health Research, Jabalpur</span>
                                                            <span class="officer-detail">Telephone no. 0761-2370800</span>
                                                            <span class="officer-detail">Email: shende[dot]hv[at]icmr[dot]gov[dot]in</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td><strong>Appellate Authority</strong></td>
                                                    <td>
                                                        <div class="officer-info">
                                                            <span class="officer-name">Dr. Vijay Nema</span>
                                                            <span class="officer-detail">Scientist 'F'</span>
                                                            <span class="officer-detail">ICMR-National Institute for Tribal Health Research, Jabalpur</span>
                                                            <span class="officer-detail">Telephone no. 0761-2370800</span>
                                                            <span class="officer-detail">Email: vnema[dot]nari[at]gov[dot]in</span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <div class="rti-item">
                                    <span class="rti-label">(17) Such other information as may be prescribed - on website (tender, employment Notice, News And Events).</span>
                                    <div class="rti-content">
                                        The institute timely furnishes all relevant information related to tenders, employments, events and students summer training programmes on its website as a regular feature.
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>
</html>