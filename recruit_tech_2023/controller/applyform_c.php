<?php  require_once("../class/BaseClass.php"); require_once("../class/Applyform.php"); ?>
<?php session_start(); ?>


<?php
        $obj = new BaseClass;
	$obj->dbConnect();
	
if(isset($_POST['btnSubmit'])){
		if($_POST['txtCaptcha'] == $_SESSION['my_captcha']){
			$obj = new ApplyForm;
			$obj->setPost_id($_POST['ddPost']);
			$obj->setpostal_oder_no($_POST['txtpostal_oder_no']);
			$obj->setpostal_order_date($_POST['txtpostal_order_date']);
			$obj->setname($_POST['ddtitle']." ".$_POST['txtName']);
			$obj->setfather_name($_POST['txtfather_name']);
			$obj->setdob($_POST['txtdob']);
			$obj->setgender($_POST['ddGender']);
			$obj->setrelaxation($_POST['txtrelaxation']);
			$obj->setscst($_POST['scst']);
			$obj->setobc($_POST['obc']);
			$obj->setphysically_handicaped($_POST['physically_handicaped']);
			$obj->setexservicemen($_POST['exservicemen']);
			$obj->setwidow($_POST['widow']);
			$obj->setprojectemployee($_POST['projectemployee']);
			$obj->setregularemployee($_POST['regularemployee']);
			$obj->setmarital_status($_POST['ddmaritalstatus']);
			$obj->setcategory($_POST['ddcategory']);
			$obj->setidnumber($_POST['ddicard']." ".$_POST['txtid_card_number']);
			$obj->setcommunication_address1($_POST['txtcommunication_address1']);
			$obj->setcommunication_address2($_POST['txtcommunication_address2']);
			$obj->setpostoffice1($_POST['txtpostoffice1']);
                        $obj->setdistrict1($_POST['txtdistrict1']);
                        $obj->setpin($_POST['txtpin']);
                        $obj->setstate1($_POST['ddState1']);
                        
			$obj->setpermanent_address1($_POST['txtpermanent_address1']);
			$obj->setpermanent_address2($_POST['txtpermanent_address2']);
			$obj->setpostoffice($_POST['txtpostoffice']);
                        $obj->setdistrict($_POST['txtdistrict']);
                        $obj->setpinno($_POST['txtpinno']);
                        $obj->setstate($_POST['ddState']);
                        $obj->setcountry($_POST['ddcountry']);
			$obj->setmobile($_POST['txtmobile']);
			$obj->setemail($_POST['txtemail']);

			$obj->setaqdegree1($_POST['txtaqdegree1']);
			$obj->setaqboard1($_POST['txtaqboard1']);
			$obj->setaqpassingyear1($_POST['txtaqpassingyear1']);
			$obj->setaqdivision1($_POST['txtaqdivision1']);
			$obj->setaqtotalmark1($_POST['txtaqtotalmark1']);
			$obj->setaqmarksobtained1($_POST['txtaqmarksobtained1']);
			$obj->setaqsubjecttaken1($_POST['txtaqsubjecttaken1']);

			$obj->setaqdegree2($_POST['txtaqdegree2']);
			$obj->setaqboard2($_POST['txtaqboard2']);
			$obj->setaqpassingyear2($_POST['txtaqpassingyear2']);
			$obj->setaqdivision2($_POST['txtaqdivision2']);
			$obj->setaqtotalmark2($_POST['txtaqtotalmark2']);
			$obj->setaqmarksobtained2($_POST['txtaqmarksobtained2']);
			$obj->setaqsubjecttaken2($_POST['txtaqsubjecttaken2']);

			$obj->setaqdegree3($_POST['txtaqdegree3']);
			$obj->setaqboard3($_POST['txtaqboard3']);
			$obj->setaqpassingyear3($_POST['txtaqpassingyear3']);
			$obj->setaqdivision3($_POST['txtaqdivision3']);
			$obj->setaqtotalmark3($_POST['txtaqtotalmark3']);
			$obj->setaqmarksobtained3($_POST['txtaqmarksobtained3']);
			$obj->setaqsubjecttaken3($_POST['txtaqsubjecttaken3']);

			$obj->setaqdegree4($_POST['txtaqdegree4']);
			$obj->setaqboard4($_POST['txtaqboard4']);
			$obj->setaqpassingyear4($_POST['txtaqpassingyear4']);
			$obj->setaqdivision4($_POST['txtaqdivision4']);
			$obj->setaqtotalmark4($_POST['txtaqtotalmark4']);
			$obj->setaqmarksobtained4($_POST['txtaqmarksobtained4']);
			$obj->setaqsubjecttaken4($_POST['txtaqsubjecttaken4']);

			$obj->setaqdegree5($_POST['txtaqdegree5']);
			$obj->setaqboard5($_POST['txtaqboard5']);
			$obj->setaqpassingyear5($_POST['txtaqpassingyear5']);
			$obj->setaqdivision5($_POST['txtaqdivision5']);
			$obj->setaqtotalmark5($_POST['txtaqtotalmark5']);
			$obj->setaqmarksobtained5($_POST['txtaqmarksobtained5']);
			$obj->setaqsubjecttaken5($_POST['txtaqsubjecttaken5']);

			$obj->setadditional_qualification($_POST['txtadditiona_qualification']);
			$obj->setcomputer_knowledge($_POST['txtcomputer_knowledge']);


			$obj->setehfirm1($_POST['txtehfirm1']);
			$obj->setehduration1($_POST['txtehfrom1']."-".$_POST['txtehto1']);
			$obj->setehexperinceyear1($_POST['txtehexperienceinyear1']);
			$obj->setehdesignation1($_POST['txtehdesignation1']);
			$obj->setehsalary1($_POST['txtehsalary1']);
			$obj->setehnature1($_POST['txtehnature1']);

			$obj->setehfirm2($_POST['txtehfirm2']);
			$obj->setehduration2($_POST['txtehfrom2']."-".$_POST['txtehto2']);
			$obj->setehexperinceyear2($_POST['txtehexperienceinyear2']);
			$obj->setehdesignation2($_POST['txtehdesignation2']);
			$obj->setehsalary2($_POST['txtehsalary2']);
			$obj->setehnature2($_POST['txtehnature2']);

			$obj->setehfirm3($_POST['txtehfirm3']);
			$obj->setehduration3($_POST['txtehfrom3']."-".$_POST['txtehto3']);
			$obj->setehexperinceyear3($_POST['txtehexperienceinyear3']);
			$obj->setehdesignation3($_POST['txtehdesignation3']);
			$obj->setehsalary3($_POST['txtehsalary3']);
			$obj->setehnature3($_POST['txtehnature3']);

			$obj->setehfirm4($_POST['txtehfirm4']);
			$obj->setehduration4($_POST['txtehfrom4']."-".$_POST['txtehto4']);
			$obj->setehexperinceyear4($_POST['txtehexperienceinyear4']);
			$obj->setehdesignation4($_POST['txtehdesignation4']);
			$obj->setehsalary4($_POST['txtehsalary4']);
			$obj->setehnature4($_POST['txtehnature4']);


			$obj->setaward($_POST['txtaward']);
			$obj->setresearch_experience($_POST['txtresearch_experience']);
			$obj->setpublished_paper($_POST['txtpublished_paper']);


			$rndno =  rand (10789,98892645299);
			$rndno =  str_replace(" ","",$_POST['txtName']).$rndno;
			$rndno .= ".jpg";
			$retrrn = uplaodImage($rndno);
			if ($retrrn == 1){
				$obj->setphoto($rndno);
				$obj->setsign($rndno);
				$obj->setentry_date(date("y/m/d h:i:s"));
				$result = $obj->insert();
				$rndno1 = rand (1000,9999);
				if($result == 1) {
					echo("<script>window.location='../view/displayform.php?rnd=$rndno1'</script>");
				}
				else {
					echo "<h1>TEST1</h1>";
				}
			}
		}
		else {
			echo "Invalid Secure Code";
		}
	}
?>

	<?php
	function uplaodImage($rndno)
	{
		$newimg_Name = $rndno;
		if ($_FILES["file"]["size"] > 40000) {  echo "Sorry, your photo file is too large."; return 0;}
		move_uploaded_file($_FILES["file"]["tmp_name"],	"../uploadedimages/" .  $newimg_Name );
		if ($_FILES["file1"]["size"] > 40000) {  echo "Sorry, your sign file is too large."; return 0;}
		move_uploaded_file($_FILES["file1"]["tmp_name"],	"../uploadedimages1/" .  $newimg_Name );
		return 1;
	}
	
	
	?>