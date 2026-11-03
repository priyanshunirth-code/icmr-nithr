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
<title>Organogram - ICMR NIRTH</title>

<?php include("GlobalCss.php"); ?>

<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php include("GlobalJs.php"); ?>

<style type="text/css">

/* ============================================================
   ORG CHART TREE - SmartArt Style
   ============================================================ */

.org-chart-wrap {
    overflow-x: auto;
    padding: 20px 10px 40px;
}

.org-chart {
    min-width: 1100px;
    font-family: Arial, sans-serif;
    font-size: 12px;
}

/* Generic box */
.org-box {
    display: inline-block;
    padding: 6px 10px;
    border-radius: 3px;
    text-align: center;
    line-height: 1.4;
    font-weight: bold;
    border: 1px solid #aaa;
}

/* ---- Colour tiers ---- */
.box-director {
    background: #17375e;
    color: #fff;
    border-color: #17375e;
    font-size: 13px;
    min-width: 180px;
    padding: 8px 14px;
}

.box-division {
    background: #4472c4;
    color: #fff;
    border-color: #2e4f9a;
    min-width: 120px;
}

.box-pillar {
    background: #8eaadb;
    color: #1a1a1a;
    border-color: #4472c4;
    min-width: 100px;
    font-weight: normal;
}

.box-scientist {
    background: #dce6f1;
    color: #1a1a1a;
    border-color: #8eaadb;
    width: 110px;
    min-height: 48px;
    font-weight: normal;
    font-size: 11px;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    vertical-align: top;
    box-sizing: border-box;
}

.box-vacant {
    background: #f2f2f2;
    color: #888;
    border: 1px dashed #bbb;
    width: 110px;
    min-height: 48px;
    font-weight: normal;
    font-size: 11px;
    font-style: italic;
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    vertical-align: top;
    box-sizing: border-box;
}

/* ============================================================
   TREE LAYOUT USING FLEX + BORDERS (connector lines via CSS)
   ============================================================ */

/* ---- Level 0: Director centred ---- */
.level-director {
    display: flex;
    justify-content: center;
    margin-bottom: 0;
    position: relative;
}
.level-director::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 20px;
    background: #555;
}

/* ---- Level 1: Three divisions ---- */
.divisions-connector {
    position: relative;
    display: flex;
    justify-content: center;
    margin-top: 20px;
}
/* horizontal bar spanning divisions */
.divisions-connector::before {
    content: '';
    position: absolute;
    top: 0;
    left: 16.7%;
    right: 16.7%;
    height: 2px;
    background: #555;
}

.division-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}
/* vertical drop from horizontal bar down to each division box */
.division-col::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 2px;
    height: 20px;
    background: #555;
}

.division-box-wrap {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    position: relative;
}
/* drop line from division to pillars */
.division-box-wrap::after {
    content: '';
    position: absolute;
    bottom: -20px;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 20px;
    background: #555;
}

/* ---- Level 2: Pillars ---- */
.pillars-connector {
    position: relative;
    display: flex;
    justify-content: center;
    margin-top: 20px;
    width: 100%;
}
.pillars-connector::before {
    content: '';
    position: absolute;
    top: 0;
    left: 16.7%;
    right: 16.7%;
    height: 2px;
    background: #777;
}

.pillar-col {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    padding: 0 4px;
}
.pillar-col::before {
    content: '';
    position: absolute;
    top: 0;
    left: 50%;
    width: 2px;
    height: 20px;
    background: #777;
}

.pillar-box-wrap {
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    position: relative;
}
.pillar-box-wrap::after {
    content: '';
    position: absolute;
    bottom: -15px;
    left: 50%;
    transform: translateX(-50%);
    width: 2px;
    height: 15px;
    background: #777;
}

/* ---- Level 3: Scientists ---- */
.scientists-list {
    margin-top: 15px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 6px;
    width: 100%;
    padding: 0 2px;
}

/* connector lines between scientist boxes */
.scientists-list .org-box:not(:last-child)::after {
    /* not needed - flex gap handles it */
}

/* Legend */
.org-legend {
    margin-top: 20px;
    padding: 10px 15px;
    border: 1px solid #ccc;
    display: inline-block;
    font-size: 12px;
    background: #fafafa;
}
.org-legend span {
    display: inline-block;
    width: 16px;
    height: 12px;
    margin-right: 5px;
    vertical-align: middle;
    border: 1px solid #aaa;
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
                        <li><a href="about.php">About Us</a></li>
                        <li>Organogram</li>
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
                        <div class="cs-section-title">
                            <h4>Organogram of the Institute</h4>
                            <hr>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="org-chart-wrap">
                    <div class="org-chart">

                        <!-- ================================================
                             LEVEL 0: DIRECTOR
                        ================================================= -->
                        <div class="level-director">
                            <div class="org-box box-director">
                                Director<br>
                                <strong>Dr. Praveen Kumar Bharti, Ph.D.</strong>
                            </div>
                        </div>

                        <!-- ================================================
                             LEVEL 1: DIVISIONS  (horizontal connector + 3 cols)
                        ================================================= -->
                        <div class="divisions-connector">

                            <!-- =================== DIVISION 1: Communicable Diseases =================== -->
                            <div class="division-col">
                                <div class="division-box-wrap">
                                    <div class="org-box box-division">Communicable<br>Diseases</div>
                                </div>

                                <!-- Pillars Row for CD -->
                                <div class="pillars-connector">

                                    <!-- Pillar: Development -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Development</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Rituraj Niranjan<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Vijay Nema<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Diya Bajaj<br><small>M.D.<br>(Medical)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Delivery -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Delivery</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Pushpendra Singh<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Vidhan Jain<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Veterinary Sciences)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Descriptive -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Descriptive</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Satyendra Pandey<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Non-Medical)</small></div>
                                        </div>
                                    </div>

                                </div><!-- /pillars-connector CD -->
                            </div><!-- /division-col CD -->

                            <!-- =================== DIVISION 2: Non-Communicable Diseases =================== -->
                            <div class="division-col">
                                <div class="division-box-wrap">
                                    <div class="org-box box-division">Non-Communicable<br>Diseases</div>
                                </div>

                                <!-- Pillars Row for NCD -->
                                <div class="pillars-connector">

                                    <!-- Pillar: Development -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Development</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Ravindra Kumar<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Suyesh Shrivastava<br><small>M.D.<br>(Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Medical)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Delivery -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Delivery</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Ranjana Choudhari<br><small>MBBS<br>(Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Non-Medical)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Descriptive -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Descriptive</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-vacant">Vacant<br><small>(Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Medical)</small></div>
                                        </div>
                                    </div>

                                </div><!-- /pillars-connector NCD -->
                            </div><!-- /division-col NCD -->

                            <!-- =================== DIVISION 3: RCN =================== -->
                            <div class="division-col">
                                <div class="division-box-wrap">
                                    <div class="org-box box-division">RCN</div>
                                </div>

                                <!-- Pillars Row for RCN -->
                                <div class="pillars-connector">

                                    <!-- Pillar: Development -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Development</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Anil Kumar Verma<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Harshwardhan V. Shende<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Aman Sachdeva<br><small>M.D.<br>(Medical)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Delivery -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Delivery</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. Dinesh Kumar<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-scientist">Dr. Rohit Kumar Das<br><small>M.D.<br>(Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Medical)</small></div>
                                        </div>
                                    </div>

                                    <!-- Pillar: Descriptive -->
                                    <div class="pillar-col">
                                        <div class="pillar-box-wrap">
                                            <div class="org-box box-pillar">Descriptive</div>
                                        </div>
                                        <div class="scientists-list">
                                            <div class="org-box box-scientist">Dr. K.B. Saha<br><small>Ph.D.<br>(Non-Medical)</small></div>
                                            <div class="org-box box-vacant">Vacant<br><small>(Medical)</small></div>
                                        </div>
                                    </div>

                                </div><!-- /pillars-connector RCN -->
                            </div><!-- /division-col RCN -->

                        </div><!-- /divisions-connector -->

                        <!-- Legend -->
                        <div class="org-legend">
                            <strong>Legend:</strong>&nbsp;&nbsp;
                            <span style="background:#17375e; border-color:#17375e;"></span> Director &nbsp;&nbsp;
                            <span style="background:#4472c4; border-color:#2e4f9a;"></span> Division &nbsp;&nbsp;
                            <span style="background:#8eaadb; border-color:#4472c4;"></span> Pillar &nbsp;&nbsp;
                            <span style="background:#dce6f1; border-color:#8eaadb;"></span> Scientist &nbsp;&nbsp;
                            <span style="background:#f2f2f2; border:1px dashed #bbb;"></span> Vacant Position
                        </div>

                    </div><!-- /org-chart -->
                    </div><!-- /org-chart-wrap -->
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
<script src="assets/scripts/functions.js"></script>
</body>
</html>
