   <?php
    session_start();
    include("language.php");
    ?>
  <?php include("config.php"); ?>
  <?php
  $newTenderCutoff = (new DateTimeImmutable('today'))->modify('-2 months');
  $isRecentTender = function ($publishedOn) use ($newTenderCutoff) {
      $publishedDate = DateTimeImmutable::createFromFormat('!d-m-Y', $publishedOn);
      return $publishedDate !== false && $publishedDate >= $newTenderCutoff;
  };
  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>ICMR NITHR | Tenders</title>
         
    <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>

  
    <style>
        /* ROOT COLORS FOR HEADER */
        :root {
            --primary: #09203f;
            --primary-light: #537895;
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

        /* GLOBAL */
        body {
            background: #f4f7f6;
            font-family: 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            color: #334155;
            -webkit-font-smoothing: antialiased;
        }

        /* SECTION */
        .v-section {
            margin-top: 30px;
            margin-bottom: 30px;
        }

        /* HEADINGS */
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

        .v-employee h2 {
            border-left-color: #3b82f6;
        }

        /* RESPONSIVE WRAPPER */
        .table-responsive {
            overflow-x: auto;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            border: 1px solid #e2e8f0;
        }

        /* TABLE */
        .v-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .v-table th {
            background: #2583bd;
            padding: 14px 16px;
            font-size: 14px;
            font-weight: 600;
            text-align: left;
            color: #ffffff;
            text-transform: none;
            letter-spacing: normal;
            white-space: nowrap;
            border: 1px solid #d5d5d5;
        }

        .v-table td {
            padding: 16px;
            font-size: 15px;
            border-bottom: 1px solid #f1f5f9;
            line-height: 1.5;
            vertical-align: middle;
            transition: background-color 0.2s ease;
        }

        .v-table tr:last-child td {
            border-bottom: none;
        }

        .v-table td:nth-child(2) {
            font-size: 17px;
            font-weight: 600;
            color: #0f172a;
        }

        .v-table tr:hover td {
            background-color: #f8fafc;
        }

        .v-table td:last-child {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
        }

        .v-action-buttons {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            gap: 8px;
        }

        /* BUTTON BASE */
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

        .v-employee .v-btn, .v-btn {
            background: #eff6ff;
            color: #1d4ed8 !important;
            border-color: #bfdbfe;
        }

        .v-employee .v-btn:hover, .v-btn:hover {
            background: #3b82f6;
            color: #ffffff !important;
            border-color: #3b82f6;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
        }

        .archive-link {
            box-sizing: border-box;
            width: 220px;
            max-width: 100%;
            padding: 15px 24px;
            border-radius: 8px;
            font-size: 17px;
            font-weight: 600;
            white-space: nowrap;
        }

        .v-table tfoot td,
        .v-table tfoot td:last-child {
            display: table-cell;
            border: 0 !important;
            border-top: 1px solid #d5d5d5 !important;
            background: transparent !important;
            padding-top: 28px !important;
            padding-bottom: 24px !important;
        }

        .v-table tfoot tr:hover td {
            background: transparent !important;
        }

        /* 🔍 SEARCH BAR */
        .v-search-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }

        .v-search-bar {
            padding: 10px 16px;
            font-size: 14px;
            width: 100%;
            max-width: 300px;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            outline: none;
            transition: all 0.2s ease;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
        }

        .v-search-bar:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }

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

          <!-- Header Start -->
          <?php include("header.php"); ?>

          <div class="page-header">
            <h1 style="color: #ffffff !important;">Tenders</h1>
        </div>

        <div class="main-section">
            <div class="container">

                <div class="cs-shortcode-table">

                    <div class="v-section v-employee">
                        <div style="display: flex; flex-wrap: wrap; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                            <h2 style="margin-bottom: 0;">Latest Tenders</h2>
                            <div class="v-search-container" style="margin-bottom: 0;">
                                <input type="text" id="searchInput" class="v-search-bar" placeholder="Search tenders...">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="v-table">
                                          <thead>
                                              <tr>
                                                  <th>S.No.</th>
                                                  <th>Tender</th>
                                                  <th>Published On</th>
                                                  <th>Actions</th>
                                              </tr>
                                          </thead>
                                          <tbody>
                                              
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Non IT Professional Service with Reverse Charge Mechanism- 200000; CA GEM/2026/B/8182739<?php if ($isRecentTender('26-10-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>29-10-2026</td>
                                                  <td><a href="tender/2026/IT GeM.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Custom Bid for Services - AMC services for Make-BioRAD D10 HPLC GEM/2026/B/7993096<?php if ($isRecentTender('26-10-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>26-10-2026</td>
                                                  <td><a href="tender/2026/Store_e-receiptno.1339594_AMCofequipments_correspondence_1428756_2026_NIRTH1_27-10-2026_09-40-42am.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Customized AMC/CMC for Pre-owned Products - AMC Services for Genetic Analyzer; Invitrogen; Annual Maintenance Contract (AMC); Six-Monthly GEM/2026/B/7960855<?php if ($isRecentTender('21-09-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>21-09-2026</td>
                                                  <td><a href="tender/2026/Store_AMC_3730GeneticAnalyser_02_correspondence_1401464_2026_NIRTH1_22-09-2026_12-57-35pm.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Canteen Service - Employee Welfare Model - Vegetarian; Breakfast, Lunch, Dinner, Snacks, Beverages; Inside Building Premises (exclusive for employees/ patients/ in house personnel) GEM/2026/B/7869220<?php if ($isRecentTender('10-09-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>10-09-2026</td>
                                                  <td><a href="tender/2026/ICMR-NIRTH_STORE_CANTEEN_2025.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Hiring of Cab, Taxi and Vehicle Services on Monthly and Per-Vehicle-Day Basis for Local and Outstation Travel GEM/2026/B/7857744<?php if ($isRecentTender('01-09-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>01-09-2026</td>
                                                  <td><a href="tender/2026/NO.ICMR_NIRTH_Store_HiringofVehicle_2025_correspondence_1383742_2026_NIRTH1_03-09-2026_10-42-31am.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                                <tr>
                                                  <td class="sn"></td>
                                                  <td>Fully Automatic Biochemistry Analyzer (V2) (Q2) GEM/2026/B/7645627<?php if ($isRecentTender('06-07-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>06-07-2026</td>
                                                  <td><a href="tender/2026/8aa9df3b-278a-4845-b3ed-2436a03fc8d2.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Biomedical Waste Management Service - weight basis - Lifting, Transportation, Treatment, Disposal; Research Instiute; Injections & needles, Face Mask, PPE kits, Needle Cutters, Gloves, Broken Glass, Scalpels, Medicines, Chemical disinfectants GEM/2026/B/7596862<?php if ($isRecentTender('29-05-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>29-05-2026</td>
                                                  <td><a href="tender/2026/GeM-Bidding-9392726 (2).pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Custom Bid for Services - AMC Services for Genetic Analyzer GEM/2026/B/7416542<?php if ($isRecentTender('13-05-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>13-05-2026</td>
                                                  <td><a href="tender/2026/ed482903-b88d-4725-a69e-fe4decb17331.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Manpower Outsourcing Services - Fixed Remuneration - Multiple Posts GEM/2026/B/7491140<?php if ($isRecentTender('30-04-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>30-04-2026</td>
                                                  <td><a href="tender/2026/GeM-Bidding-9275087-1.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>High End Desktop Computer (Q2) GEM/2026/B/7407673<?php if ($isRecentTender('16-04-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>16-04-2026</td>
                                                  <td><a href="tender/2026/0459e31a-f028-4505-be46-0b6b80c0ae6e.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Custom Bid for Services - Re-Cabling of LAN Infrastructure (Rs 6,00,000) GEM/2026/B/7406776<?php if ($isRecentTender('07-04-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>07-04-2026</td>
                                                  <td><a href="tender/2026/2e008bf8-7512-43fe-8207-5b49902d180d.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Calibration Services - Mechanical, Electrical, Thermal, Fluid flow, Optical calibration, Radiological calibration, Medical; Dimension, Mass and Volume, Pressure and Vacuum, Force, Speed & Acceleration, Hardness & impact, Density and Viscosity, Voltage..  GEM/2026/B/7291037<?php if ($isRecentTender('11-03-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>11-03-2026</td>
                                                  <td><a href="tender/2026/307a747c-0cfa-4b32-b2c4-b4a91289165a.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Vulnerability and Penetration Testing - Web Application; Secure Configuration Review (Devices/OS), Application Security Audit (OWASP Top 10), Malware Analysis, Security Code Review; Vulnerability Addressing  GEM/2026/B/7213406<?php if ($isRecentTender('03-03-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>03-03-2026</td>
                                                  <td><a href="tender/2026/a3b7efe4-bf75-484a-8c97-d98406232239.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Fixed Computer Workstation (Q2) GEM/2026/B/7221655<?php if ($isRecentTender('18-02-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>18-02-2026</td>
                                                  <td><a href="tender/2026/69631b97-75d0-49d1-a199-a227c4bdaebb.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td> Custom Bid for Services - AMC Serivices for lieca microscope GEM/2025/B/7032472<?php if ($isRecentTender('18-02-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>18-02-2026</td>
                                                  <td><a href="tender/2026/ac8ff4b2-abdd-4f90-b9b5-3ada5c7af265.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td> Shaker Incubator (Q2) GEM/2026/B/7079495<?php if ($isRecentTender('12-02-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>12-02-2026</td>
                                                  <td><a href="tender/2026/b41198fb-59b1-4c4e-863c-dfcbf465b795.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td>Biosafety Cabinet (Q2) GEM/2026/B/7074076<?php if ($isRecentTender('12-02-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>12-02-2026</td>
                                                  <td><a href="tender/2026/027c0a57-7aed-48ac-822e-d56b531c82eb.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td> Gel Documentation System (Q2) GEM/2026/B/7079611<?php if ($isRecentTender('12-02-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>12-02-2026</td>
                                                  <td><a href="tender/2026/177edf7f-ac3d-4557-aed1-ed3fae4d9e77.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td> Laboratory Deep Freezer (V2) (Q2)  GEM/2026/B/7102720<?php if ($isRecentTender('27-01-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>27-01-2026</td>
                                                  <td><div class="v-action-buttons"><a href="tender/2026/17f5a372-2861-4a1b-a19e-43859c4f400d.pdf" target="_blank" class="v-btn">View</a>
                                                  <a href="tender/2026/59fd3362-4f3f-4e55-9e04-386a374a9f5c.pdf" target="_blank" class="v-btn">Extended</a></div></td>

                                                </tr>
<tr>
                                                  <td class="sn"></td>
                                                  <td> Laboratory Refrigerator (V2) (Q2)  GEM/2026/B/7102854<?php if ($isRecentTender('27-01-2026')): ?><img src="new.gif" /><?php endif; ?></td>
                                                  <td>27-01-2026</td>
                                                  <td><a href="tender/2026/47fc8878-6eae-465c-ba31-67ae903bd70c.pdf" target="_blank" class="v-btn">View</a></td>
                                                </tr>
                                          </tbody>
                                          <tfoot>
                                              <tr>
                                                  <td colspan="4" style="text-align: center; padding: 18px!important;"><a href="tenders_archive.php" target="_blank" rel="noopener" class="v-btn archive-link">Archive</a></td>
                                              </tr>
                                          </tfoot>
                                      </table>
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
          
          document.getElementById('searchInput').addEventListener('keyup', function() {
              var filter = this.value.toUpperCase();
              var rows = document.querySelectorAll('.v-table tbody tr');
              
              var visibleCount = 1;
              for (var i = 0; i < rows.length; i++) {
                  var rowText = rows[i].textContent || rows[i].innerText;
                  if (rowText.toUpperCase().indexOf(filter) > -1) {
                      rows[i].style.display = "";
                      // Optionally update serial numbers for visible rows
                      var snCol = rows[i].querySelector('.sn');
                      if (snCol) {
                          snCol.innerHTML = visibleCount + ".";
                      }
                      visibleCount++;
                  } else {
                      rows[i].style.display = "none";
                  }
              }
          });
      </script>
      <script src="assets/scripts/responsive.menu.js"></script>
      <script src="assets/scripts/chosen.select.js"></script>
      <script src="assets/scripts/slick.js"></script>
      <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
      <!-- Put all Functions in functions.js -->
      <script src="assets/scripts/functions.js"></script>
  </body>

  </html>
