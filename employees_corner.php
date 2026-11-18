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
    <title>Employee's Corner</title>

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

        /*  HEADINGS */
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
            font-size: 15px;
            border-bottom: 1px solid #f1f5f9;
            line-height: 1.5;
            vertical-align: middle;
            transition: background-color 0.2s ease;
        }

        /* Remove last border cleanly */
        .v-table tr:last-child td {
            border-bottom: none;
        }

        /* ßFORM TITLE (important highlight) */
        .v-table td:nth-child(2) {
            font-size: 17px;
            font-weight: 600;
            color: #0f172a;
        }

        /* hover */
        .v-table tr:hover td {
            background-color: #f8fafc;
        }

        /* Action Td */
        .v-table td:last-child {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            align-items: center;
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

        /* Employee Buttons */
        .v-employee .v-btn {
            background: #eff6ff;
            color: #1d4ed8 !important;
            border-color: #bfdbfe;
        }

        .v-employee .v-btn:hover {
            background: #3b82f6;
            color: #ffffff !important;
            border-color: #3b82f6;
            box-shadow: 0 2px 4px rgba(59, 130, 246, 0.2);
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

        <!-- Header Start -->
        <?php include("header.php"); ?>

        <div class="page-header">
            <h1 style="color: #ffffff !important;">Employee's Corner</h1>
        </div>

        <div class="main-section">
            <div class="container">

                <div class="cs-shortcode-table">

                    <div class="v-section v-employee">
                        <h2>Download Forms</h2>

                        <div class="table-responsive">
                            <table class="v-table">
                                <thead>
                                    <tr>
                                        <th width="10%">S.No.</th>
                                        <th width="70%">Form</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $sno = 1; ?>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td>
                                            Circular regarding the submission of "Life Certificate" (November 2026) for Institute Pensioners/Family Pensioners
                                            <img src="new.gif" alt="New" style="margin-left: 8px; vertical-align: middle;"/>
                                        </td>
                                        <td>
                                            <a href="/Life_Certificate_for_November_2026.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['casual-leave']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/ICMR NIRTH - Casual Leave CL , RH , Compensatory Leave - New Format.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['charge-report']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Charge Report New.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['child-care-leave']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/child_care_leave.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Earned-Leave']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/earned_leave.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['ltc-form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/ltc_form2.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Medical-Reimburshment-Form-A']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/medical_reimburshment_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Medical-Reimburshment-Form-B']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/medical_reimburshment_form_B.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['POL-Advance-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/pol_advance_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['POL-Adjustment-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/pol_adjustment_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Vehicle-Request-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Vehicle Request Form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['TA/DA-Adjustment-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/ta_da_adjustment_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['LTC-Adjustment-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/ltc_bill_1.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Tour-Programme-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Modified Tour Programme - Word.docx" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['POL-Advance-Form1']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/TA Certificate.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['TA/DA-Expenditure-Certificate']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/CERTIFICATE.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Tution-Fee-Reimburshment-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/tution_fee_reimburshment_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['GPF-Advance-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/gpf_advance_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['GPF-Withdrawl-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/gpf_withdrawl_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Unfit/Fitness-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/unfit_fitness_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Material-Indent-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/material_indent_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Honorarium-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/honorarium_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['Mandate-Form']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/mendate_form.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td>
                                            <?php echo $lang['Holdays_26']; ?>
                                            <img src="new.gif" alt="New" style="margin-left: 8px; vertical-align: middle;"/>
                                        </td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Holiday List - 2026-1.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['gate-pass']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Gate pass.docx" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td><?php echo $sno++; ?></td>
                                        <td><?php echo $lang['life_certificate-pensioners']; ?></td>
                                        <td>
                                            <a href="https://nirth.res.in/employees_corner/Life Certificate for Pensioners 2025.pdf" target="_blank" class="v-btn">
                                                <?php echo $lang['download']; ?>
                                            </a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer Start -->
        <?php include("footer.php"); ?>
        <!-- Footer End -->

    </div>

    <!-- JS -->
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <script src="assets/scripts/functions.js"></script>
</body>

</html>
