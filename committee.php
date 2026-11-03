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
<title>Committee</title>
          
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
						<li>Committee</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	 <style>
    body {
      font-family: Arial, sans-serif;
      padding: 5px;
    }

    .committee-section {
      max-width: 600px;
      margin: auto;
    }

    .committee-header {
      background-color:#1f93e4;
      color: white;
      padding: 4px;
      text-align: center;
      font-size: 22px;
      font-weight: bold;
      border-radius: 0px;
      margin-bottom: 10px;
    }

    .committee-content {
     
    
      background-color: #f9f9f9;
    }

    .committee-content h4 {
      margin-top: 0;
      background-color:#F0F8FF;
      color: white;
      padding: 3px;
      border-radius: 6px;
      cursor: pointer;
      text-align: center;
    }

    .committee-table {
      display: none;
      margin-top: 5px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    table, th, td {
      border: 1px solid #ddd;
    }

    th, td {
      padding: 5px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }
  </style>
	<!-- Main Start -->
	<div class="main-section"> 
		<div class="page-section">
          <div class="container">
            <div class="row">
              
              <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    
                    
                  <div class="cs-shortcode-table">
                    <h2>Committee</h2><hr>
                    <table>   
                        <thead>
                            <tr>
                                <th width="5%">S.No.</th>
                                <th width="60%">Details</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!--
                          <tr>                                      
                            <td>1</td>
                            <td>
                              <a href="committee/womanharassment.pdf" target="_blank">"कार्य-स्थल पर महिलाओं का योन-उत्पीड़न रोकथाम निषेध एवं निवारण” – “आंतरिक शिकायत समिति"</a>
                            </td><!--
                            <td style="vertical-align: middle;">
                                <a href="https://shebox.nic.in/" target="_blank"  class="cs-btn small cs-bgcolor">https://shebox.nic.in/</a>
                            </td>--></table>
                          </tr>
                           
                             

<table>

<tr>                                
                            <td>1</td>
                            <td>
  <div class="committee-content">
    <h4 onclick="toggleTable(this)">SCIENTIFIC ADVISORY COMMITTEE (SAC)</h4>
    
    <div class="committee-table">
      <table>
        <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
        <tr><td>1</td><td>Prof. Deepak B. Saxena</td><td>Chairperson</td></tr>
        <tr><td>2</td><td>Prof. Puneet Misra</td><td>Member</td></tr>
        <tr><td>3</td><td>Prof. Sanjay K. Mohanty</td><td>Member</td></tr>
        <tr><td>4</td><td>Dr Sanjay Kumar Bhadada</td><td>Member</td></tr>
        <tr><td>5</td><td>Prof. Giriraj R. Chandak</td><td>Member</td></tr>
        <tr><td>6</td><td>Prof. Rajpal Singh Kashyap</td><td>Member</td></tr>
        <tr><td>7</td><td>Prof. Amit Awasthi</td><td>Member</td></tr>
        <tr><td>8</td><td>Prof. Tulika Seth</td><td>Member</td></tr>
        <tr><td>9</td><td>Prof. Aquil Ahmed</td><td>Member</td></tr>
        <tr><td>10</td><td>Dr. Reena Tilak</td><td>Member</td></tr>
        <tr><td>11</td><td>Prof. Suman Dhar</td><td>Member</td></tr>
        <tr><td>12</td><td>Dr. Vinod Scaria</td><td>Member</td></tr>
        <tr><td>13</td><td>Head RCN</td><td>Member</td></tr>
        <tr><td>14</td><td>Head NCD</td><td>Member</td></tr>
        <tr><td>15</td><td>Head ECD</td><td>Member</td></tr>
        <tr><td>16</td><td>Program – Officer (Tribal Health)</td><td>Member</td></tr>
        <tr><td>17</td><td>MoTA Representative</td><td>Member</td></tr>
        <tr><td>18</td><td>State Government</td><td>Member</td></tr>
        <tr><td>19</td><td>Director, NIIH</td><td>Member</td></tr>
        <tr><td>20</td><td>Director, NIRH</td><td>Member</td></tr>
      </table>
    </div>
  </div>
</div>

<script>
  function toggleTable(heading) {
    const tableDiv = heading.nextElementSibling;
    tableDiv.style.display = tableDiv.style.display === "block" ? "none" : "block";
  }
</script>



<tr>                                      
                            <td>2</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">INSTITUTIONAL ETHICS COMMITTEE</h4>

  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr Neena Valecha</td><td>Chairperson</td></tr>
        <tr><td>2</td><td>Dr. Pradeep Kumar Kasar</td><td>Vice Chairperson</td></tr>
        <tr><td>3</td><td>Dr. Sradul Singh Sandhu</td><td>Member</td></tr>
        <tr><td>4</td><td>Dr. Monica Lazarus</td><td>Member</td></tr>
        <tr><td>5</td><td>Dr. Sanjay  Gedam</td><td>Member</td></tr>
        <tr><td>6</td><td>Dr. Jatin Bajaj</td><td>Member</td></tr>
        <tr><td>7</td><td>Ms. Anagha Pual </td><td>Member</td></tr>
        <tr><td>8</td><td>Dr. Akhil Khare</td><td>Member</td></tr>
        <tr><td>9</td><td>Dr. Narayan Matolya</td><td>Member</td></tr>
     <tr><td>10</td><td>Dr. Rituraj Niranjan Scientist ‘E’</td><td>Member Secretary</td></tr>
      <tr><td>11</td><td>Dr. Ravindra Kumar Scientist ‘D’</td><td>Member</td></tr>
      <tr><td>12</td><td>Dr. Suyesh Shrivastava Scientist ‘D’</td><td>Member</td></tr>
      

    </table>
  </div>
</div>
 </td>
  </tr><tr>                                      
                            <td>3</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">INSTITUTIONAL ACADEMIC COMMITTEE</h4>

  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
       <tr><td>1</td><td>Dr Bontha V Babu, Director(Incharge)</td><td>Chairperson</td></tr>
      <tr><td>2</td><td>Dr. Kalyan B Saha, Scientist ‘G’</td><td>Chairman Coodinator AcSIR-ICMR and Convener,</td></tr>
      <tr><td>3</td><td>Dr. Pushpendra Singh Scientist ‘F’</td><td>  Member</td></tr>
      <tr><td>4</td><td>Dr. Rituraj Niranjan Scientist ‘E’</td><td>Member</td></tr>
      <tr><td>3</td><td>Dr. Ravindra Kumar, Scientist ‘D’</td><td>Member</td></tr>
      <tr><td>4</td><td>Dr. Anil Kumar Verma, Scientist ‘D’</td><td>Member Secretary</td></tr>
    </table>
  </div>
</div>
</td>
  </tr><!--
<tr>                                      
                            <td>4</td>
                            <td>
  <div class="committee-content">
  <h4 onclick="toggleTable(this)">RECRUITMENT SCRUTINY COMMITTEE</h4>

  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. Vidhan Jain</td><td>Scientist ‘D’</td></tr>
      <tr><td>2</td><td>Dr. Rituraj Niranjan</td><td>Scientist ‘D’</td></tr>
      <tr><td>3</td><td>Dr. Suyesh Shrivastava</td><td>Scientist ‘C’</td></tr>
      <tr><td>4</td><td>Dr. Ravindra Kumar</td><td>Scientist ‘C’</td></tr>
      <tr><td>5</td><td>Dr. Nishant Saxena</td><td>Scientist ‘C’</td></tr>
      <tr><td>6</td><td>Dr. Qaiser Farooq Dar</td><td>Scientist ‘C’</td></tr>
      <tr><td>7</td><td>Mrs. Nazia A. Ali</td><td>Technical Officer – B</td></tr>
      <tr><td>8</td><td>Shri Lalit Kumar Sahare</td><td>Technical Officer – B</td></tr>
      <tr><td>9</td><td>Mr. Mahendra Jaideo Ukey</td><td>Technical Officer – B</td></tr>
      <tr><td>10</td><td>Mr. Surendra Kumar Jhariya</td><td>Technician – II</td></tr>
    </table>
  </div>
</div>
 </td>
  </tr>-->
<tr>                                      
                            <td>4</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">PUBLICATION SCREENING COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. Kalyan B Saha Scientist ‘G’</td><td> Chairman</td></tr>
      <tr><td>2</td><td>Dr. Dinesh Kumar Scientist 'F' </td><td>  Co- Chairman</td></tr>
      <tr><td>3</td><td>Dr. Pushpendra Kumar Singh Scientist ‘F’</td><td> Co- Chairman</td></tr>
      <tr><td>4</td><td>Dr. Vijay Kumar Nema Scientist ‘F’</td><td>  Member Secretary</td></tr>
      <tr><td>5</td><td>Dr. Rituraj Niranjan Scientist ‘E’</td><td> Joint Secretary</td></tr>
      <tr><td>6</td><td>Dr. Vidhan Jain Scientist ‘D’</td><td>  Member</td></tr>
      <tr><td>7</td><td>Dr. Ravindra Kumar Scientist ‘D’</td><td> Member</td></tr>
      <tr><td>8</td><td>Dr. Anil Verma Scientist ‘D’</td><td> Member</td></tr>
      <tr><td>9</td><td>Dr. Suyesh Shrivastava Scientist ‘D’</td><td>  Member</td></tr>
      <tr><td>10</td><td>Dr. Satyendra Pandey Scientist ‘C’ </td><td> Member</td></tr>
      <tr><td>11</td><td>Dr. Harshwardhan Shende Scientist B’ </td><td>  Member</td></tr>
    </table>
  </div>
</div>
   </td>
  </tr>
<!--  
<tr>                                      
                            <td>6</td>
                            <td>
  <div class="committee-content">
  <h4 onclick="toggleTable(this)">ANNUAL REPORT COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. Qaiser Farooq Dar</td><td>Scientist 'C' – Chairperson</td></tr>
      <tr><td>2</td><td>Dr. Satyendra Kumar Pandey</td><td>Scientist ‘C’ – Member</td></tr>
      <tr><td>3</td><td>Dr. Sandeep Kumar Mahiwal</td><td>Scientist ‘B’ – Member</td></tr>
      <tr><td>4</td><td>Sh. Arvind Kavishwar</td><td>Principal Technical Officer – Member</td></tr>
      <tr><td>5</td><td>Sh. Deepanshu Bhatia</td><td>Technical Assistant – Member</td></tr>
      <tr><td>6</td><td>Ms. Diksha Singh</td><td>Technical Assistant – Member</td></tr>
      <tr><td>7</td><td>Ms. Meghna Mondal</td><td>Technical Assistant – Member</td></tr>
    </table>
  </div>
</div></td>
  </tr>-->
 
<tr>                                      
                            <td>5</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">STUDENT GRIEVANCE REDRESSAL COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr Bontha V Babu  Director (InCharge)</td><td> Chairman</td></tr>
      <tr><td>2</td><td>Dr. Kalyan B Saha Scientist ‘G’</td><td> Member</td></tr>
      <tr><td>3</td><td>Dr. Anil Verma Scientist ‘D’</td><td> Member and OBC Representative</td></tr>
    </table>
  </div>
</div>
</td>
  </tr>
<tr>                                      
                            <td>6</td>
                            <td>
  <div class="committee-content">
  <h4 onclick="toggleTable(this)">INSTITUTIONAL REFRESHMENTS COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Ms.Dikha  Singh</td><td>Technical Assistant</td></tr>
      <tr><td>2</td><td>Mr.Vijay kumar Dwivedi</td><td>Technical Assistant</td></tr>
      <tr><td>3</td><td>Mr. Surendra  Kumar jhariya </td><td>Technician-2</td></tr>
      <tr><td>4</td><td>Mr.Vaibhav Bisht</td><td>Technician-1</td></tr>
      <tr><td>5</td><td>Ms.Ayushi Nagaria</td><td>Technician-1</td></tr>
      <tr><td>6</td><td>Mr.Sone Lal Dumar</td><td>Lab. Assistant -1</td></tr>
      <tr><td>7</td><td>Mr. Sontosh KUmar Maravi</td><td>Lab. Assistant-1</td></tr>
    </table>
  </div>
</div>
</td>
  </tr>
<!--
 <tr>                                      
                            <td>9</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">INSTITUTIONAL CAFETERIA COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. K.B Saha</td><td>Scientist- ‘F’ – Chairperson</td></tr>
      <tr><td>2</td><td>Mrs. Reena Shome</td><td>Technical Officer- ‘B’- Member</td></tr>
      <tr><td>3</td><td>Mr. Lalit Kumar Sahare</td><td>Technical Officer- ‘B’- Member</td></tr>
      <tr><td>4</td><td>Mr. Nitish Singh Parihar</td><td>Technical Assistant – Member</td></tr>
      <tr><td>5</td><td>Ms. Anjali Rajput</td><td>Upper Division Clerk- Member</td></tr>
      <tr><td>6</td><td>Mr. Anil Vinodia</td><td>Laboratory Assistant-1 – Member</td></tr>
    </table>
  </div>
</div>
</td>
  </tr>

 <tr>                                      
                            <td>10</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)">INSTITUTIONAL STORE INDENT COMMITTEE</h4>
  <div class="committee-table">
    <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. Tapas Chakma</td><td>Scientist ‘G’</td></tr>
      <tr><td>2</td><td>Dr. Ravindra Kumar</td><td>Scientist ‘C’</td></tr>
      <tr><td>3</td><td>Dr. Nishant Saxena</td><td>Scientist ‘C’</td></tr>
      <tr><td>4</td><td>Sh. R.K Thakur</td><td>Administrative Officer</td></tr>
      <tr><td>5</td><td>Sh. Shokat Azam Sheikh</td><td>Accounts Officer</td></tr>
      <tr><td>6</td><td>Sh. Milind Dixit</td><td>Section Officer (Stores)</td></tr>
    </table>
  </div>
</div>
</td>
  </tr>-->
  
<tr>                                      
                            <td>7</td>
                            <td>
 <div class="committee-content">
  <h4 onclick="toggleTable(this)"> INSTITUTIONAL COMMUNICATION COMMITTEE</h4>
  <div class="committee-table">
   <table>
      <tr><th>S. No.</th><th>Name</th><th>Designation</th></tr>
      <tr><td>1</td><td>Dr. Harshwardhan V shende</td><td>Scientist ‘B’</td></tr>
      <tr><td>2</td><td>Mr. Aprit Maurya</td><td>Technical Assistant</td></tr>
      <tr><td>3</td><td>Mr.Dikha  singh</td><td>Technical Assistant</td></tr>
      <tr><td>4</td><td>Mr.Vijay kumar Dwivedi</td><td>Technical Assistant</td></tr>
      <tr><td>5</td><td>Mr. Deepanshu Bhatia</td><td>Technical Assistant</td></tr>

    </table>
  </div>
  </div>
   </td>
  </tr>
    
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