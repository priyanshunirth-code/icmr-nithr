<?php require_once("../class/Post.php"); require_once("../class/Applyform.php"); ?>
<?php $obj = new ApplyForm; $obj->displayform();  ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Application Form - NIRTH, Jabalpur</title>
<meta name="generator" content="editplus">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="author" content="Avinash - NIRTH Jabalpur">
<meta name="keywords" content="online application form">
<meta name="description" content="">
<link rel="stylesheet" type="text/css" href="../common/style.css"/>  
</head>
<body>
<table border="1" cellpadding="3" cellspacing="0" align="center" width="750px;"><tr><td>
 <table border="0" cellpadding="4" cellspacing="1" align="center">
	<tr>
	<td rowspan="4" align="center"><IMG SRC="../common/img/ICMR_Logo.jpg" WIDTH="110" HEIGHT="110" BORDER="0" ALT=""></td>
	<td colspan="2" align="center"><span style="font: bold 18px times new roman;">NATIONAL INSTITUTE FOR RESEARCH IN TRIBAL HEALTH</span></td>
	</tr>
	<tr>
	<td colspan="2" align="center" span style="font: normal 18px times new roman;">(Indian Council of Medical Research)</td>
	</tr>
	<tr>
	<td colspan="2" align="center" span style="font: normal 16px times new roman;">(Department of Health Research, Ministry of Health & Family Welfare)</td>
	</tr>
	<tr>
	<td colspan="2" align="center" span style="font: normal 14px times new roman;">Nagpur Road, P.O. - Garha, Jabalpur - 482 003 (Madhya Pradesh)</td>
	</tr>
	
		<tr><td colspan="3"><hr/></td></tr>

		<tr><td colspan="3" align="center" span style="font: bold 14px times new roman;"><u>APPLICATION FORM</u></td></tr>

		<tr><td></td><td></td><td align="center" rowspan="6"><img src="../uploadedimages/<?php echo $obj->getphoto(); ?>" height="150" width="120"  border="1"></td></tr>
 		<tr><td>Name of Post:</td> <td class="tts"><strong><?php echo $obj->getPost_name(); ?></strong></td></tr>
		<tr><td>Registration No.:</td><td class="tts"><?php echo $obj->getrecruitment_id(); ?></td></tr>
		<tr><td>Name:</td><td class="tts"><strong><?php echo $obj->getname(); ?></strong></td></tr>
		<tr><td>Father/Husband's Name:</td><td class="tts"><?php echo $obj->getfather_name(); ?></td></tr>
		<tr><td>Postal Order No. & Date:</td><td class="tts"><?php echo $obj->getpostal_oder_no()." ".$obj->getpostal_order_date(); ?></td></tr>
		<tr><td>Date of Birth:</td><td class="tts" colspan="2"><?php echo $obj->getdob(); ?></td></tr>
		<tr><td>Gender:</td><td class="tts" colspan="2"><?php echo $obj->getgender(); ?></td></tr>  
		<tr><td>Marital Status:</td><td class="tts" colspan="2"><?php echo $obj->getmarital_status(); ?></td></tr>
		<tr><td>Category:</td><td class="tts" colspan="2"><?php echo $obj->getcategory(); ?> </td></tr>		
		<tr><td> Is Physically Handicaped:</td><td class="tts" colspan="2"><?php echo $obj->getphysically_handicaped(); ?> </td></tr>
		<tr><td>Communication Address:</td><td class="tts" colspan="2"><?php echo $obj->getcommunication_address(); ?></td></tr>
		<tr><td>Permanent Address:</td><td class="tts" colspan="2"><?php echo $obj->getpermanent_address(); ?></td></tr>
		<tr><td>District: </td><td class="tts" colspan="2"><?php echo $obj->getdistrict(); ?></td></tr>		
		<tr><td>State:</td><td class="tts" colspan="2"><?php echo $obj->getstate(); ?></td></tr>
		<tr><td>Country:</td><td class="tts" colspan="2"><?php echo $obj->getcountry(); ?></td></tr>
		<tr><td>Pin Code:</td><td class="tts" colspan="2"><?php echo $obj->getpinno(); ?> </td></tr>
		<tr><td>Contact No.:</td><td class="tts" colspan="2"><?php echo $obj->getcontact_no(); ?></td></tr>
		<tr><td>Mobile No.:</td><td class="tts" colspan="2"> <?php echo $obj->getmobile(); ?> </td></tr>
		<tr><td>Email:</td> <td class="tts" colspan="2"><?php echo $obj->getemail(); ?></td></tr>
		
		
		<tr><td colspan="3" style="page-break-after:always;"><p style="page-break-after:always;"></p></td></tr>
		
		<tr><td colspan="3">Academic Qualification(s)</td></tr>
		<tr><td colspan="3">
				<table border="1" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center" rowspan="2">Examination/Degree/<br/>Diploma Obtained</td>
					<td align="center" rowspan="2">Name of the Education Board/University</td>
					<td align="center" rowspan="2">Year of Passing</td>
					<td align="center" rowspan="2">Division</td>
					<td colspan="2" align="center">Detail of Marks</td>					
					<td align="center" rowspan="2">Subject(s) Taken</td>
				</tr>
				<tr>
					<td align="center">&nbsp;Total&nbsp;</td>
					<td align="center">Obtained</td>
				</tr>
				<tr>
					<td class="tts" align="center"><?php echo $obj->getaqdegree1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqboard1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqpassingyear1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqdivision1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqtotalmark1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqmarksobtained1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqsubjecttaken1(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getaqdegree2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqboard2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqpassingyear2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqdivision2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqtotalmark2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqmarksobtained2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqsubjecttaken2(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getaqdegree3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqboard3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqpassingyear3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqdivision3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqtotalmark3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqmarksobtained3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqsubjecttaken3(); ?></td>
				</tr>
				
				<tr>
					<td class="tts" align="center"><?php echo $obj->getaqdegree4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqboard4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqpassingyear4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqdivision4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqtotalmark4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqmarksobtained4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqsubjecttaken4(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getaqdegree5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqboard5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqpassingyear5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqdivision5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqtotalmark5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqmarksobtained5(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getaqsubjecttaken5(); ?></td>
				</tr>
				</table>
		</td></tr>

		

		<tr><td>Any additional qualification:</td> <td class="tts" colspan="2"><?php echo $obj->getadditional_qualification(); ?></td></tr>

		<tr><td>Computer Knowledge:</td> <td class="tts" colspan="2"><?php echo $obj->getcomputer_knowledge(); ?></td></tr>

		<tr><td colspan="3">Employment History</td></tr>

			<tr><td colspan="3">
				<table border="1" align="center" cellpadding="0" cellspacing="0">
				<tr>
					<td align="center">Name of Employer</td>
					<td align="center">Period</td>
					<td align="center">Experience in Years</td>
					<td align="center">Designation</td>
					<td align="center">Last Salary Drawn</td>
					<td align="center">Nature of work</td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getehfirm1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehduration1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehexperinceyear1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehdesignation1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehsalary1(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehnature1(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getehfirm2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehduration2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehexperinceyear2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehdesignation2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehsalary2(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehnature2(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getehfirm3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehduration3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehexperinceyear3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehdesignation3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehsalary3(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehnature3(); ?></td>
				</tr>

				<tr>
					<td class="tts" align="center"><?php echo $obj->getehfirm4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehduration4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehexperinceyear4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehdesignation4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehsalary4(); ?></td>
					<td class="tts" align="center"><?php echo $obj->getehnature4(); ?></td>
				</tr>
				</table>
			</td></tr>

			<tr><td>Award & Scholarship:</td> <td class="tts" colspan="2"><?php echo $obj->getaward(); ?></td></tr>
			<tr><td>Research Experience:</td> <td class="tts" colspan="2"><?php echo $obj->getresearch_experience(); ?></td></tr>
			<tr><td>Details of postgraduate work <br/> & published papers:</td> <td class="tts" colspan="2"><?php echo $obj->getpublished_paper(); ?></td></tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr><td colspan="3" align="center"><u><strong>DECLARATION</strong></u></td></tr>
			<tr><td colspan="3" align="justify">I hereby declare that all statements made in the application are true, complete and correct to the best of my knowledge and belief.  I understand that in the event of any information being found untrue / false / incorrect or I do not satisfy the eligibility criteria, my candidature/appointment will be cancelled / terminated, without assigning any reasons thereof. I have read the contents of the advertisement and agree to abide by the rules, regulations and procedure for appointment to the post applied for.</td></tr>
			<tr><td colspan="3">&nbsp;</td></tr>
			<tr><td colspan="3">Date:</td></tr>
			<tr><td colspan="2" align="left">Place:</td><td align="center">(Signature of Applicant)</td></tr>
			<tr><td colspan="3" align="center"><button onclick="myFunction()">Print</button></td></tr>
    </table>	

<script>
function myFunction() {
    window.print();
}
</script>

</td></tr></table>
</body>
</html>