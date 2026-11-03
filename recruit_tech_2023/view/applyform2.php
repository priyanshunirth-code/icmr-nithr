<?php require_once("../class/Post.php"); ?>
<?php ob_start(); ?>

<div id='msgErrorTxt' class="error"></div>

<form method="post" name="applyform" action="../controller/applyform_c.php" enctype="multipart/form-data"  onsubmit="return submit_createfile(document.applyform)">
    <table border="0" cellpadding="6" cellspacing="2">
        <tr>
        <td class="t1">Post:<span style="color:#ff0000;">*</span></td>
        <td colspan="3" class="t1"><select name="ddPost" class="ddl"><option value = "0">Select Post applied</option>
			<?php $pObj = new Post; $pObj->readPost(); ?></select></td>
        </tr>

		<tr>
		<td class="t1">Demand Draft Number:</td>
		<td class="t1"><input type="text" name="txtpostal_oder_no" Id="txtpostal_oder_no" maxlength="80" class="txt"/></td>
		<td class="t1">Demand Draft Date:</td>
		<td class="t1"><input type="text" name="txtpostal_order_date" id="txtpostal_order_date" class="txtdt" readonly="readonly" onfocus="javascript:NewCssCal('txtpostal_order_date','yyyymmdd')" />
        <a href="javascript:NewCssCal('txtpostal_order_date','yyyymmdd')"><img src="../common/img/b_calendar.png" width="16" height="16" border="0"/></a>
        </td>
		</tr>

		<tr>
		<td class="t1">Full Name:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><select name="ddtitle"> <option>Mr.</option><option>Ms.</option><option>Mrs.</option><option>Dr.</option><option>Prof.</option></select> 
		<input type="text" name="txtName" Id="txtName" maxlength="100" class="txt"/></td>
		<td class="t1">Father/Husband's Name:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtfather_name" Id="txtfather_name" maxlength="150" class="txt"/></td>
		</tr>

        <tr>
        <td class="t1">Date of Birth:<span style="color:#ff0000;">*</span></td>
        <td class="t1"><input type="text" name="txtdob" id="txtdob" class="txtdt" readonly="readonly" onfocus="javascript:NewCssCal('txtdob','yyyymmdd')" />
        <a href="javascript:NewCssCal('txtdob','yyyymmdd')"><img src="../common/img/b_calendar.png" width="16" height="16" border="0"/></a>
        </td>
		<td class="t1">Gender:</td>
		<td class="t1"><select class="dd" name="ddGender"><option>Male</option><option>Female</option></select></td>
		</tr>

        <tr>
                <td class="t1" colspan="3">Do you need age relaxation? (If 'Yes', which ground?):</td>
                
                <script>
                	
                	function show1(){
  document.getElementById('div11').style.display ='none';
  document.getElementById('div12').style.display ='none';
  document.getElementById('div13').style.display ='none';
  document.getElementById('div14').style.display ='none';
  document.getElementById('div15').style.display ='none';
}
function show2(){
  document.getElementById('div11').style.display = 'table-row';
  document.getElementById('div12').style.display = 'table-row';
  document.getElementById('div13').style.display = 'table-row';
  document.getElementById('div14').style.display = 'table-row';
  document.getElementById('div15').style.display = 'table-row';
}
                </script>
        <td class="t1">
        						<input type="radio" name="relaxation" value="Yes"  onclick="show2();">
            <label for="Choice1">Yes</label>
            					<input type="radio" name="relaxation" value="No" onclick="show1();">
            <label for="Choice2">No</label>
        </td></tr>
      
        
	  
        
        
        <tr id="div11" style="display: none;">
        >
                <td class="t1" colspan="3">Are you a Person with disability (PWD)?:</td>
        <td class="t1"><input type="radio" name="physically_handicaped" id="myRadio" value="Yes">
            <label class="wrap">Yes</label>
            <input type="radio" name="physically_handicaped" id="myRadio" value="No">
            <label class="wrap">No</label>
        </td></tr>
        <tr id="div12" style="display: none;">
        >
        <td class="t1" colspan="3">Are you an Ex-Servicemen?:</td>
        <td class="t1"><input type="radio" name="exservicemen" id="myRadio" value="Yes">
            <label class="wrap">Yes</label>
            <input type="radio" name="exservicemen" id="myRadio" value="No">
            <label class="wrap">No</label>
        </td>
	    </tr>
	    
	    <tr id="div13" style="display: none;">
                <td class="t1" colspan="3">Are you Widow?:</td>
        <td class="t1"><input type="radio" name="widow" id="myRadio" value="Yes">
            <label class="wrap">Yes</label>
            <input type="radio" name="widow" id="myRadio" value="No">
            <label class="wrap">No</label>
        </td>
        </tr>
        <tr id="div14" style="display: none;">
        <td class="t1" colspan="3">Are you a project employee of ICMR Institutes?:</td>
        <td class="t1"><input type="radio" name="projectemployee" id="myRadio" value="Yes">
            <label class="wrap">Yes</label>
            <input type="radio" name="projectemployee" id="myRadio" value="No">
            <label class="wrap">No</label>
        </td>
	    </tr>
	    
	    <tr id="div15" style="display: none;">
                <td class="t1" colspan="3">Are you a Central/State/Autonomous Bodies employee and have continuous service?:</td>
        <td class="t1" colspan="2"><input type="radio" name="regularemployee" id="myRadio" value="Yes">
            <label class="wrap">Yes</label>
            <input type="radio" name="regularemployee" id="myRadio" value="No">
            <label class="wrap">No</label>
        </td>
        </tr>
        

		<tr>
		<td class="t1">Marital Status:</td>
		<td class="t1"><select class="dd" name="ddmaritalstatus"><option>Unmarried</option><option>Married</option><option>Other</option></select></td>
		<td class="t1">Category:</td>
		<td class="t1"><select class="dd" name="ddcategory"><option>General</option> <option>OBC</option><option>SC</option> <option>ST</option></select></td>
		</tr>

		
		
		<tr>
		<td class="t1" colspan='4'>Communication Address:</td>
		</tr>
		
        <tr>
        <td class="t1">Address1:<span style="color:#ff0000;">*</span><br>(H.No./Q.No./Ward)</td>
		<td class="t1"><input type="text" name="txtcommunication_address1" Id="txtcommunication_address1" maxlength="50" class="txt"/></td>
		<td class="t1">Address2:<span style="color:#ff0000;">*</span><br>(Village/Town/City)</td>
		<td class="t1"><input type="text" name="txtcommunication_address2" Id="txtcommunication_address2" maxlength="50" class="txt"/></td>
        </tr>
               <tr>
              <td class="t1">Post Office:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtpostoffice1" Id="txtpostoffice1" maxlength="30" class="txt"/></td>
         
                <td class="t1">District:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtdistrict1" Id="txtdistrict1" maxlength="30" class="txt"/></td>
		
        </tr>

               <tr>
		<td class="t1">Pin Code:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtpin" ID="txtpin" maxlength="10" class="txt"/></td>
         
		<td class="t1">State:</td>
		<td class="t1">
			<select class="dd" Id="ddState1" name="ddState1"><option>Andhra      Pradesh</option> <option>Arunachal Pradesh</option> <option>Assam</option> <option>Bihar</option> <option>Chhattisgarh</option> <option>Goa</option> <option>Gujarat</option> <option>Haryana</option> <option>Himachal Pradesh</option> <option>Jammu & Kashmir</option> <option>Jharkhand</option> <option>Karnataka</option> <option>Kerala</option> <option selected>Madhya Pradesh</option> <option>Maharashtra</option> <option>Manipur</option> <option>Meghalaya</option> <option>Mizoram</option> <option>Nagaland</option> <option>Odisha (Orissa)</option> <option>Punjab</option>  <option>Rajasthan</option> <option>Sikkim</option> <option>Tamil Nadu</option> <option>Telangana</option> <option>Tripura</option> <option>Uttar Pradesh</option> <option>Uttarakhand</option> <option>Andaman & Nicobar Island</option> <option>Chandigarh</option> <option>Dadra & Nagar Haveli</option> <option>Daman and Diu</option> <option>Lakshadweep</option> <option>Delhi</option> <option>Puducherry</option> <option>West Bengal</option></select>
		</td>
		</tr>

		<tr>
		<td class="t1" colspan='4'>Permanent Address:</td>
		</tr>
		
        <tr>
        <td class="t1">Address1:<span style="color:#ff0000;">*</span><br>(H.No./Q.No./Ward)</td>
		<td class="t1"><input type="text" name="txtpermanent_address1" Id="txtpermanent_address1" maxlength="50" class="txt"/></td>
		<td class="t1">Address2:<span style="color:#ff0000;">*</span><br>(Village/Town/City)</td>
		<td class="t1"><input type="text" name="txtpermanent_address2" Id="txtpermanent_address2" maxlength="50" class="txt"/></td>
        </tr>
                 <tr>                                
		<td class="t1">Post Office:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtpostoffice" Id="txtpostoffice" maxlength="30" class="txt"/></td>
         
                <td class="t1">District:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtdistrict" Id="txtdistrict" maxlength="30" class="txt"/></td>
		
        </tr>

               <tr>
		<td class="t1">Pin Code:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtpinno" ID="txtpinno" maxlength="10" class="txt"/></td>
         
		<td class="t1">State:</td>
		<td class="t1">
			<select class="dd" Id="ddState" name="ddState"><option>Andhra      Pradesh</option> <option>Arunachal Pradesh</option> <option>Assam</option> <option>Bihar</option> <option>Chhattisgarh</option> <option>Goa</option> <option>Gujarat</option> <option>Haryana</option> <option>Himachal Pradesh</option> <option>Jammu & Kashmir</option> <option>Jharkhand</option> <option>Karnataka</option> <option>Kerala</option> <option selected>Madhya Pradesh</option> <option>Maharashtra</option> <option>Manipur</option> <option>Meghalaya</option> <option>Mizoram</option> <option>Nagaland</option> <option>Odisha (Orissa)</option> <option>Punjab</option>  <option>Rajasthan</option> <option>Sikkim</option> <option>Tamil Nadu</option> <option>Telangana</option> <option>Tripura</option> <option>Uttar Pradesh</option> <option>Uttarakhand</option> <option>Andaman & Nicobar Island</option> <option>Chandigarh</option> <option>Dadra & Nagar Haveli</option> <option>Daman and Diu</option> <option>Lakshadweep</option> <option>Delhi</option> <option>Puducherry</option> <option>West Bengal</option></select>
		</td>
            </tr>

             <tr>
            <td class="t1">Country:</td>
		<td class="t1"><select class="dd" name="ddcountry"><option>India</option></select>                    </td>
		<td class="t1">Adhaar Number:</td>
		<td class="t1"><input type="text" name="txtadhaar" Id="txtadhaar" maxlength="100" class="txt"/></td>
		</tr>
 

		<tr>
		<td class="t1">Mobile No.:<span style="color:#ff0000;">*</span></td>
		<td class="t1"><input type="text" name="txtmobile" Id="txtmobile" maxlength="30" class="txt"/></td>
		<td class="t1">Email-Id:</td>
		<td class="t1"><input type="text" name="txtemail" Id="txtemail" maxlength="50" class="txt"/></td>
		</tr>

		<tr>
		<td class="t1" colspan='4'>Academic Qualification(s)</td>
		</tr>

		<tr><td colspan="4" align="center" class="t1">
		<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td rowspan="2" align="center" class="t1">Name of the Examination/<br/>Degree/Diploma Obtained</td>
			<td rowspan="2" align="center" class="t1">Name of the Education <br/> Board/University</td>
			<td rowspan="2" align="center" class="t1">Year of<br/>Passing</td>
			<td rowspan="2" align="center" class="t1">Division</td>
			<td colspan="2" align="center" class="t1"> Detail of Marks</td>
			<td rowspan="2" align="center" class="t1">Subject(s) Taken</td>
		</tr>
		<tr>
			<td align="center" class="t1">Total</td>
			<td align="center" class="t1">Obtained</td>
		</tr>
		<tr>
			<td align="center"><input type="text" name="txtaqdegree1" Id="txtaqdegree1" maxlength="70" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqboard1" Id="txtaqboard1" maxlength="80" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqpassingyear1" Id="txtaqpassingyear1" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqdivision1" Id="txtaqdivision1" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqtotalmark1" Id="txtaqtotalmark1" maxlength="4" value="" class="txtsml" /></td>
			<td align="center"><input type="text" name="txtaqmarksobtained1" Id="txtaqmarksobtained1" value="" class="txtsml" maxlength="4"/></td>
			<td align="center"><input type="text" name="txtaqsubjecttaken1" Id="txtaqsubjecttaken1" maxlength="190" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtaqdegree2" Id="txtaqdegree2" maxlength="70" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqboard2" Id="txtaqboard2" maxlength="80" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqpassingyear2" Id="txtaqpassingyear2" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqdivision2" Id="txtaqdivision2" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqtotalmark2" Id="txtaqtotalmark2" maxlength="4" value="" class="txtsml" /></td>
			<td align="center"><input type="text" name="txtaqmarksobtained2" Id="txtaqmarksobtained2" value="" class="txtsml" maxlength="4"/></td>
			<td align="center"><input type="text" name="txtaqsubjecttaken2" Id="txtaqsubjecttaken2" maxlength="190" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtaqdegree3" Id="txtaqdegree3" maxlength="70" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqboard3" Id="txtaqboard3" maxlength="80" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqpassingyear3" Id="txtaqpassingyear3" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqdivision3" Id="txtaqdivision3" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqtotalmark3" Id="txtaqtotalmark3" maxlength="4" value="" class="txtsml" /></td>
			<td align="center"><input type="text" name="txtaqmarksobtained3" Id="txtaqmarksobtained3" value="" class="txtsml" maxlength="4"/></td>
			<td align="center"><input type="text" name="txtaqsubjecttaken3" Id="txtaqsubjecttaken3" maxlength="190" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtaqdegree4" Id="txtaqdegree4" maxlength="70" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqboard4" Id="txtaqboard4" maxlength="80" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqpassingyear4" Id="txtaqpassingyear4" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqdivision4" Id="txtaqdivision4" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqtotalmark4" Id="txtaqtotalmark4" maxlength="4" value="" class="txtsml" /></td>
			<td align="center"><input type="text" name="txtaqmarksobtained4" Id="txtaqmarksobtained4" value="" class="txtsml" maxlength="4"/></td>
			<td align="center"><input type="text" name="txtaqsubjecttaken4" Id="txtaqsubjecttaken4" maxlength="190" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtaqdegree5" Id="txtaqdegree5" maxlength="70" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqboard5" Id="txtaqboard5" maxlength="80" class="txt"/></td>
			<td align="center"><input type="text" name="txtaqpassingyear5" Id="txtaqpassingyear5" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqdivision5" Id="txtaqdivision5" maxlength="15" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtaqtotalmark5" Id="txtaqtotalmark5" maxlength="4" value="" class="txtsml" /></td>
			<td align="center"><input type="text" name="txtaqmarksobtained5" Id="txtaqmarksobtained5" value="" class="txtsml" maxlength="4"/></td>
			<td align="center"><input type="text" name="txtaqsubjecttaken5" Id="txtaqsubjecttaken5" maxlength="190" class="txt"/></td>
		</tr>
		</table>
		</td></tr>

		<tr>
        <td class="t1">Any additional qualification:<br/> <span class="spans">(Technical & desirable qualification <br/> may be mentioned here)</span></td>
        <td colspan="3" class="t1"><textarea NAME="txtadditiona_qualification" ID="txtadditiona_qualification" cols="80" rows="2"></textarea></td>
        </tr>

		<tr>
        <td class="t1">Computer Knowledge:<span class="spans"> <br/> (Specify degree/diploma obtained <br/> and/or experiences of using computer)</span></td>
        <td colspan="3" class="t1"><textarea name="txtcomputer_knowledge" ID="txtcomputer_knowledge" cols="80" rows="2"></textarea></td>
        </tr>

		<tr>
		<td class="t1" colspan='4'>Employment History</td>
		</tr>

		<tr><td colspan="4" class="t1" align="center">
		<table border="1" cellpadding="0" cellspacing="0">
		<tr>
			<td align="center" rowspan="2" class="t1">Name of Employer</td>
			<td align="center" colspan="2" class="t1">Period</td>
			<td align="center" rowspan="2" class="t1">Experience<br/>in Years</td>
			<td align="center" rowspan="2" class="t1">Designation</td>
			<td align="center" rowspan="2" class="t1">Last Salary <br/> Drawn (in Rs.)</td>
			<td align="center" rowspan="2" class="t1">Nature of Work</td>
		</tr>

		<tr>			
			<td align="center" class="t1">From</td>
			<td align="center" class="t1">To</td>			
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtehfirm1" Id="txtehfirm1" maxlength="100" class="txt"/></td>
			<td align="center"><input type="text" name="txtehfrom1" Id="txtehfrom1" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehto1" Id="txtehto1" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehexperienceinyear1" Id="txtehexperienceinyear1" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehdesignation1" Id="txtehdesignation1" maxlength="30" class="txt"/></td>
			<td align="center"><input type="text" name="txtehsalary1" Id="txtehsalary1" maxlength="10" class="txt"/></td>
			<td align="center"><input type="text" name="txtehnature1" Id="txtehnature1" maxlength="200" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtehfirm2" Id="txtehfirm2" maxlength="100" class="txt"/></td>
			<td align="center"><input type="text" name="txtehfrom2" Id="txtehfrom2" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehto2" Id="txtehto2" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehexperienceinyear2" Id="txtehexperienceinyear2" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehdesignation2" Id="txtehdesignation2" maxlength="30" class="txt"/></td>
			<td align="center"><input type="text" name="txtehsalary2" Id="txtehsalary2" maxlength="10" class="txt"/></td>
			<td align="center"><input type="text" name="txtehnature2" Id="txtehnature2" maxlength="200" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtehfirm3" Id="txtehfirm3" maxlength="100" class="txt"/></td>
			<td align="center"><input type="text" name="txtehfrom3" Id="txtehfrom3" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehto3" Id="txtehto3" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehexperienceinyear3" Id="txtehexperienceinyear3" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehdesignation3" Id="txtehdesignation3" maxlength="30" class="txt"/></td>
			<td align="center"><input type="text" name="txtehsalary3" Id="txtehsalary3" maxlength="10" class="txt"/></td>
			<td align="center"><input type="text" name="txtehnature3" Id="txtehnature3" maxlength="200" class="txt"/></td>
		</tr>

		<tr>
			<td align="center"><input type="text" name="txtehfirm4" Id="txtehfirm4" maxlength="100" class="txt"/></td>
			<td align="center"><input type="text" name="txtehfrom4" Id="txtehfrom4" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehto4" Id="txtehto4" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehexperienceinyear4" Id="txtehexperienceinyear4" maxlength="30" class="txtsml"/></td>
			<td align="center"><input type="text" name="txtehdesignation4" Id="txtehdesignation4" maxlength="30" class="txt"/></td>
			<td align="center"><input type="text" name="txtehsalary4" Id="txtehsalary4" maxlength="10" class="txt"/></td>
			<td align="center"><input type="text" name="txtehnature4" Id="txtehnature4" maxlength="200" class="txt"/></td>
		</tr>
		</table>
		</td></tr>

		<tr>
        <td class="t1">Award & Scholarship:<br/> <span class="spans">(if any)</span></td>
        <td colspan="3" class="t1"><textarea name="txtaward" ID="txtaward" cols="80" rows="2" ></textarea></td>
        </tr>

		<tr>
        <td class="t1">Research Experience:<span class="spans"> <br/> (Specify point wise)</span></td>
        <td colspan="3" class="t1"><textarea name="txtresearch_experience" ID="txtresearch_experience" cols="80" rows="2"></textarea></td>
        </tr>

		<tr>
        <td class="t1">Details of Postgraduate <br/>Work & Published Papers:<span class="spans"> <br/> (Give titles of paper published <br/> and enclosed reprints))</span></td>
        <td colspan="3" class="t1"><textarea name="txtpublished_paper" ID="txtpublished_paper" cols="80" rows="2"></textarea></td>
        </tr>

		<tr>
        <td class="t1">Secure Code:<span style="color:#ff0000;">*</span></td>
        <td colspan="3" class="t1"><input type="text" name="txtCaptcha" Id="txtCaptcha" maxlength="5" class="txt">
		<img src="captcha.php" id="capt">
		</td>
        </tr>

		<tr>
        <td class="t1">Photo Upload:<span style="color:#ff0000;">*</span></td>
        <td class="t1"><input type="file" name="file" size="50" />
		</td>
		<td class="t1">Sign Upload:<span style="color:#ff0000;">*</span></td>
        <td class="t1"><input type="file" name="file1" size="20" />
		</td>
        </tr>

		<tr>
        <td colspan="4" align="right" class="t1"><input type="submit" value="Submit >>" name="btnSubmit" class="btn" title="Click to submit" /></td>
        </tr>

    </table>
</form>

<?php
$pagetitle = "Apply Form - NIRTH, Jabalpur";
$mainContent = ob_get_contents();
ob_end_clean();
require_once("masterpage.php");
?>
