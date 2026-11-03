<?php require_once("../class/BaseClass.php"); require_once("../class/Post.php"); ?>
<?php
class ApplyForm extends Post {

private $recruitment_id;  public function getrecruitment_id(){return $this->recruitment_id;} public function setrecruitment_id($recruitment_id){$this->recruitment_id = $recruitment_id;}

private $postal_oder_no; public function getpostal_oder_no(){return $this->postal_oder_no;} public function setpostal_oder_no($postal_oder_no){$this->postal_oder_no = $postal_oder_no;}

private $postal_order_date; public function getpostal_order_date(){return $this->postal_order_date;} public function setpostal_order_date($postal_order_date){$this->postal_order_date = $postal_order_date;}

private $name; public function getname(){return $this->name;} public function setname($name){$this->name = $name;}


private $father_name; public function getfather_name(){return $this->father_name;} public function setfather_name($father_name){$this->father_name = $father_name;}

private $dob; public function getdob(){return $this->dob;} public function setdob($dob){$this->dob = $dob;}

private $gender; public function getgender(){return $this->gender;} public function setgender($gender){$this->gender = $gender;}

private $marital_status; public function getmarital_status(){return $this->marital_status;} public function setmarital_status($marital_status){$this->marital_status = $marital_status;}

private $category; public function getcategory(){return $this->category;} public function setcategory($category){$this->category = $category;}

private $physically_handicaped; public function getphysically_handicaped(){return $this->physically_handicaped;} public function setphysically_handicaped($physically_handicaped){$this->physically_handicaped = $physically_handicaped;}

private $communication_address; public function getcommunication_address(){return $this->communication_address;} public function setcommunication_address($communication_address){$this->communication_address = $communication_address;}

private $permanent_address; public function getpermanent_address(){return $this->permanent_address;} public function setpermanent_address($permanent_address){$this->permanent_address = $permanent_address;}

private $country; public function getcountry(){return $this->country;} public function setcountry($country){$this->country = $country;}

private $state; public function getstate(){return $this->state;} public function setstate($state){$this->state = $state;}

private $district; public function getdistrict(){return $this->district;} public function setdistrict($district){$this->district = $district;}

private $pinno; public function getpinno(){return $this->pinno;} public function setpinno($pinno){$this->pinno = $pinno;}

private $contact_no; public function getcontact_no(){return $this->contact_no;} public function setcontact_no($contact_no){$this->contact_no = $contact_no;}

private $mobile; public function getmobile(){return $this->mobile;} public function setmobile($mobile){$this->mobile = $mobile;}

private $email; public function getemail(){return $this->email;} public function setemail($email){$this->email = $email;}


private $aqdegree1; public function getaqdegree1(){return $this->aqdegree1;} public function setaqdegree1($aqdegree1){$this->aqdegree1 = $aqdegree1;}

private $aqboard1; public function getaqboard1(){return $this->aqboard1;} public function setaqboard1($aqboard1){$this->aqboard1 = $aqboard1;}

private $aqpassingyear1; public function getaqpassingyear1(){return $this->aqpassingyear1;} public function setaqpassingyear1($aqpassingyear1){$this->aqpassingyear1 = $aqpassingyear1;}

private $aqdivision1; public function getaqdivision1(){return $this->aqdivision1;} public function setaqdivision1($aqdivision1){$this->aqdivision1 = $aqdivision1;}

private $aqtotalmark1; public function getaqtotalmark1(){return $this->aqtotalmark1;} public function setaqtotalmark1($aqtotalmark1){$this->aqtotalmark1 = $aqtotalmark1;}

private $aqmarksobtained1;  public function getaqmarksobtained1(){return $this->aqmarksobtained1;} public function setaqmarksobtained1($aqmarksobtained1){$this->aqmarksobtained1 = $aqmarksobtained1;}

private $aqsubjecttaken1; public function getaqsubjecttaken1(){return $this->aqsubjecttaken1;} public function setaqsubjecttaken1($aqsubjecttaken1){$this->aqsubjecttaken1 = $aqsubjecttaken1;}


private $aqdegree2;
private $aqboard2;
private $aqpassingyear2;
private $aqdivision2;
private $aqtotalmark2;
private $aqmarksobtained2;
private $aqsubjecttaken2;

public function getaqdegree2(){return $this->aqdegree2;} public function setaqdegree2($aqdegree2){$this->aqdegree2 = $aqdegree2;}

public function getaqboard2(){return $this->aqboard2;} public function setaqboard2($aqboard2){$this->aqboard2 = $aqboard2;}

public function getaqpassingyear2(){return $this->aqpassingyear2;} public function setaqpassingyear2($aqpassingyear2){$this->aqpassingyear2 = $aqpassingyear2;}

public function getaqdivision2(){return $this->aqdivision2;} public function setaqdivision2($aqdivision2){$this->aqdivision2 = $aqdivision2;}

public function getaqtotalmark2(){return $this->aqtotalmark2;} public function setaqtotalmark2($aqtotalmark2){$this->aqtotalmark2 = $aqtotalmark2;}

public function getaqmarksobtained2(){return $this->aqmarksobtained2;} public function setaqmarksobtained2($aqmarksobtained2){$this->aqmarksobtained2 = $aqmarksobtained2;}

public function getaqsubjecttaken2(){return $this->aqsubjecttaken2;} public function setaqsubjecttaken2($aqsubjecttaken2){$this->aqsubjecttaken2 = $aqsubjecttaken2;}


private $aqdegree3;
private $aqboard3;
private $aqpassingyear3;
private $aqdivision3;
private $aqtotalmark3;
private $aqmarksobtained3;
private $aqsubjecttaken3;

public function getaqdegree3(){return $this->aqdegree3;} public function setaqdegree3($aqdegree3){$this->aqdegree3 = $aqdegree3;}

public function getaqboard3(){return $this->aqboard3;} public function setaqboard3($aqboard3){$this->aqboard3 = $aqboard3;}

public function getaqpassingyear3(){return $this->aqpassingyear3;} public function setaqpassingyear3($aqpassingyear3){$this->aqpassingyear3 = $aqpassingyear3;}

public function getaqdivision3(){return $this->aqdivision3;} public function setaqdivision3($aqdivision3){$this->aqdivision3 = $aqdivision3;}

public function getaqtotalmark3(){return $this->aqtotalmark3;} public function setaqtotalmark3($aqtotalmark3){$this->aqtotalmark3 = $aqtotalmark3;}

public function getaqmarksobtained3(){return $this->aqmarksobtained3;} public function setaqmarksobtained3($aqmarksobtained3){$this->aqmarksobtained3 = $aqmarksobtained3;}

public function getaqsubjecttaken3(){return $this->aqsubjecttaken3;} public function setaqsubjecttaken3($aqsubjecttaken3){$this->aqsubjecttaken3 = $aqsubjecttaken3;}


private $aqdegree4;
private $aqboard4;
private $aqpassingyear4;
private $aqdivision4;
private $aqtotalmark4;
private $aqmarksobtained4;
private $aqsubjecttaken4;

public function getaqdegree4(){return $this->aqdegree4;} public function setaqdegree4($aqdegree4){$this->aqdegree4 = $aqdegree4;}

public function getaqboard4(){return $this->aqboard4;} public function setaqboard4($aqboard4){$this->aqboard4 = $aqboard4;}

public function getaqpassingyear4(){return $this->aqpassingyear4;} public function setaqpassingyear4($aqpassingyear4){$this->aqpassingyear4 = $aqpassingyear4;}

public function getaqdivision4(){return $this->aqdivision4;} public function setaqdivision4($aqdivision4){$this->aqdivision4 = $aqdivision4;}

public function getaqtotalmark4(){return $this->aqtotalmark4;} public function setaqtotalmark4($aqtotalmark4){$this->aqtotalmark4 = $aqtotalmark4;}

public function getaqmarksobtained4(){return $this->aqmarksobtained4;} public function setaqmarksobtained4($aqmarksobtained4){$this->aqmarksobtained4 = $aqmarksobtained4;}

public function getaqsubjecttaken4(){return $this->aqsubjecttaken4;} public function setaqsubjecttaken4($aqsubjecttaken4){$this->aqsubjecttaken4 = $aqsubjecttaken4;}


private $aqdegree5;
private $aqboard5;
private $aqpassingyear5;
private $aqdivision5;
private $aqtotalmark5;
private $aqmarksobtained5;
private $aqsubjecttaken5;


public function getaqdegree5(){return $this->aqdegree5;} public function setaqdegree5($aqdegree5){$this->aqdegree5 = $aqdegree5;}

public function getaqboard5(){return $this->aqboard5;} public function setaqboard5($aqboard5){$this->aqboard5 = $aqboard5;}

public function getaqpassingyear5(){return $this->aqpassingyear5;} public function setaqpassingyear5($aqpassingyear5){$this->aqpassingyear5 = $aqpassingyear5;}

public function getaqdivision5(){return $this->aqdivision5;} public function setaqdivision5($aqdivision5){$this->aqdivision5 = $aqdivision5;}

public function getaqtotalmark5(){return $this->aqtotalmark5;} public function setaqtotalmark5($aqtotalmark5){$this->aqtotalmark5 = $aqtotalmark5;}

public function getaqmarksobtained5(){return $this->aqmarksobtained5;} public function setaqmarksobtained5($aqmarksobtained5){$this->aqmarksobtained5 = $aqmarksobtained5;}

public function getaqsubjecttaken5(){return $this->aqsubjecttaken5;} public function setaqsubjecttaken5($aqsubjecttaken5){$this->aqsubjecttaken5 = $aqsubjecttaken5;}

private $additional_qualification; public function getadditional_qualification(){return $this->additional_qualification;} public function setadditional_qualification($additional_qualification) {$this->additional_qualification = $additional_qualification;}
private $computer_knowledge; public function getcomputer_knowledge(){return $this->computer_knowledge;} public function setcomputer_knowledge($computer_knowledge){$this->computer_knowledge = $computer_knowledge;}


private $ehfirm1;
private $ehduration1;
private $ehexperinceyear1;
private $ehdesignation1;
private $ehsalary1;
private $ehnature1;

public function getehfirm1(){return $this->ehfirm1;} public function setehfirm1($ehfirm1){$this->ehfirm1 = $ehfirm1;}
public function getehduration1(){return $this->ehduration1;} public function setehduration1($ehduration1) {$this->ehduration1 = $ehduration1;}
public function getehexperinceyear1(){return $this->ehexperinceyear1;} public function setehexperinceyear1($ehexperinceyear1){$this->ehexperinceyear1 = $ehexperinceyear1;}
public function getehdesignation1(){return $this->ehdesignation1;} public function setehdesignation1($ehdesignation1){$this->ehdesignation1 = $ehdesignation1;}
public function getehsalary1(){return $this->ehsalary1;} public function setehsalary1($ehsalary1){$this->ehsalary1 = $ehsalary1;}
public function getehnature1(){return $this->ehnature1;} public function setehnature1($ehnature1){$this->ehnature1 = $ehnature1;}



private $ehfirm2;
private $ehduration2;
private $ehexperinceyear2;
private $ehdesignation2;
private $ehsalary2;
private $ehnature2;

public function getehfirm2(){return $this->ehfirm2;} public function setehfirm2($ehfirm2){$this->ehfirm2 = $ehfirm2;}
public function getehduration2(){return $this->ehduration2;} public function setehduration2($ehduration2) {$this->ehduration2 = $ehduration2;}
public function getehexperinceyear2(){return $this->ehexperinceyear2;} public function setehexperinceyear2($ehexperinceyear2){$this->ehexperinceyear2 = $ehexperinceyear2;}
public function getehdesignation2(){return $this->ehdesignation2;} public function setehdesignation2($ehdesignation2){$this->ehdesignation2 = $ehdesignation2;}
public function getehsalary2(){return $this->ehsalary2;} public function setehsalary2($ehsalary2){$this->ehsalary2 = $ehsalary2;}
public function getehnature2(){return $this->ehnature2;} public function setehnature2($ehnature2){$this->ehnature2 = $ehnature2;}


private $ehfirm3;
private $ehduration3;
private $ehexperinceyear3;
private $ehdesignation3;
private $ehsalary3;
private $ehnature3;

public function getehfirm3(){return $this->ehfirm3;} public function setehfirm3($ehfirm3){$this->ehfirm3 = $ehfirm3;}
public function getehduration3(){return $this->ehduration3;} public function setehduration3($ehduration3) {$this->ehduration3 = $ehduration3;}
public function getehexperinceyear3(){return $this->ehexperinceyear3;} public function setehexperinceyear3($ehexperinceyear3){$this->ehexperinceyear3 = $ehexperinceyear3;}
public function getehdesignation3(){return $this->ehdesignation3;} public function setehdesignation3($ehdesignation3){$this->ehdesignation3 = $ehdesignation3;}
public function getehsalary3(){return $this->ehsalary3;} public function setehsalary3($ehsalary3){$this->ehsalary3 = $ehsalary3;}
public function getehnature3(){return $this->ehnature3;} public function setehnature3($ehnature3){$this->ehnature3 = $ehnature3;}


private $ehfirm4;
private $ehduration4;
private $ehexperinceyear4;
private $ehdesignation4;
private $ehsalary4;
private $ehnature4;

public function getehfirm4(){return $this->ehfirm4;} public function setehfirm4($ehfirm4){$this->ehfirm4 = $ehfirm4;}
public function getehduration4(){return $this->ehduration4;} public function setehduration4($ehduration4) {$this->ehduration4 = $ehduration4;}
public function getehexperinceyear4(){return $this->ehexperinceyear4;} public function setehexperinceyear4($ehexperinceyear4){$this->ehexperinceyear4 = $ehexperinceyear4;}
public function getehdesignation4(){return $this->ehdesignation4;} public function setehdesignation4($ehdesignation4){$this->ehdesignation4 = $ehdesignation4;}
public function getehsalary4(){return $this->ehsalary4;} public function setehsalary4($ehsalary4){$this->ehsalary4 = $ehsalary4;}
public function getehnature4(){return $this->ehnature4;} public function setehnature4($ehnature4){$this->ehnature4 = $ehnature4;}


private $award; public function getaward(){return $this->award;} public function setaward($award){$this->award = $award;}

private $research_experience; public function getresearch_experience(){return $this->research_experience;} public function setresearch_experience($research_experience){$this->research_experience = $research_experience;}

private $published_paper; public function getpublished_paper(){return $this->published_paper;} public function setpublished_paper($published_paper){$this->published_paper = $published_paper;}

private $photo; public function getphoto(){return $this->photo;} public function setphoto($photo){$this->photo = $photo;}
 
private $entry_date; public function getentry_date(){return $this->entry_date;} public function setentry_date($entry_date){$this->entry_date = $entry_date;}



public function insert(){
	$obj = new BaseClass;
	$obj->dbConnect();
        $stmt = $obj->dbconn->prepare("insert into recruitment(post_id, postal_oder_no, postal_order_date, name, father_name, dob, gender, marital_status, category, physically_handicaped, communication_address, permanent_address, country, state, district,pinno,contact_no, mobile, email, aqdegree1, aqboard1, aqpassingyear1, aqdivision1, aqtotalmark1, aqmarksobtained1, aqsubjecttaken1, aqdegree2, aqboard2, aqpassingyear2, aqdivision2, aqtotalmark2, aqmarksobtained2, aqsubjecttaken2, aqdegree3, aqboard3, 		aqpassingyear3, aqdivision3, aqtotalmark3, aqmarksobtained3, aqsubjecttaken3, aqdegree4, aqboard4, aqpassingyear4, aqdivision4, aqtotalmark4, aqmarksobtained4, aqsubjecttaken4, aqdegree5, aqboard5, aqpassingyear5, aqdivision5, aqtotalmark5, aqmarksobtained5, aqsubjecttaken5, additional_qualification, computer_knowledge, ehfirm1, ehduration1, ehexperinceyear1, ehdesignation1, ehsalary1, ehnature1, ehfirm2, ehduration2, ehexperinceyear2, ehdesignation2, ehsalary2, ehnature2, ehfirm3, ehduration3, ehexperinceyear3, ehdesignation3, ehsalary3, ehnature3, ehfirm4, ehduration4, ehexperinceyear4, ehdesignation4, ehsalary4, ehnature4, award, research_experience, published_paper, photo, entry_date) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param('issssssssssssssssssssssiisssssiisssssiisssssiisssssiissssssssssssssssssssssssssssssss',$this->getPost_id(), $this->postal_oder_no, $this->postal_order_date, $this->name, $this->father_name, $this->dob, $this->gender, $this->marital_status, $this->category, $this->physically_handicaped, $this->communication_address, $this->permanent_address, $this->country, $this->state, $this->district, $this->pinno, $this->contact_no, $this->mobile, $this->email, $this->aqdegree1, $this->aqboard1, $this->aqpassingyear1, $this->aqdivision1, $this->aqtotalmark1, $this->aqmarksobtained1, $this->aqsubjecttaken1, $this->aqdegree2, $this->aqboard2, $this->aqpassingyear2, $this->aqdivision2, $this->aqtotalmark2, $this->aqmarksobtained2, $this->aqsubjecttaken2, $this->aqdegree3, $this->aqboard3, $this->aqpassingyear3, $this->aqdivision3, $this->aqtotalmark3, $this->aqmarksobtained3, $this->aqsubjecttaken3, $this->aqdegree4, $this->aqboard4, $this->aqpassingyear4, $this->aqdivision4, $this->aqtotalmark4, $this->aqmarksobtained4, $this->aqsubjecttaken4, $this->aqdegree5, $this->aqboard5, $this->aqpassingyear5, $this->aqdivision5, $this->aqtotalmark5, $this->aqmarksobtained5, $this->aqsubjecttaken5, $this->additional_qualification, $this->computer_knowledge, $this->ehfirm1, $this->ehduration1, $this->ehexperinceyear1, $this->ehdesignation1, $this->ehsalary1, $this->ehnature1, $this->ehfirm2, $this->ehduration2, $this->ehexperinceyear2, $this->ehdesignation2, $this->ehsalary2, $this->ehnature2, $this->ehfirm3, $this->ehduration3, $this->ehexperinceyear3, $this->ehdesignation3, $this->ehsalary3, $this->ehnature3, $this->ehfirm4, $this->ehduration4, $this->ehexperinceyear4, $this->ehdesignation4, $this->ehsalary4, $this->ehnature4, $this->award, $this->research_experience, $this->published_paper, $this->photo, $this->entry_date);
        $stmt->execute();
        return $stmt->affected_rows;
        $stmt->close();
}


public function displayform(){
$obj = new BaseClass;
	$obj->dbConnect();
        $stmt = $obj->dbconn->prepare (" Select recruitment_id, post.post_name, postal_oder_no, postal_order_date, name, father_name, DATE_FORMAT(dob,'%d-%b-%Y'), gender, marital_status, category, physically_handicaped, communication_address, permanent_address, country, state, district,pinno,contact_no, mobile, email, aqdegree1, aqboard1, aqpassingyear1, aqdivision1, aqtotalmark1, aqmarksobtained1, aqsubjecttaken1, aqdegree2, aqboard2, aqpassingyear2, aqdivision2, aqtotalmark2, aqmarksobtained2, aqsubjecttaken2, aqdegree3, aqboard3, aqpassingyear3, aqdivision3, aqtotalmark3, aqmarksobtained3, aqsubjecttaken3, aqdegree4, aqboard4, aqpassingyear4, aqdivision4, aqtotalmark4, aqmarksobtained4, aqsubjecttaken4, aqdegree5, aqboard5, aqpassingyear5, aqdivision5, aqtotalmark5, aqmarksobtained5, aqsubjecttaken5, additional_qualification, computer_knowledge, ehfirm1, ehduration1, ehexperinceyear1, ehdesignation1, ehsalary1, ehnature1, ehfirm2, ehduration2, ehexperinceyear2, ehdesignation2, ehsalary2, ehnature2, ehfirm3, ehduration3, ehexperinceyear3, ehdesignation3, ehsalary3, ehnature3, ehfirm4, ehduration4, ehexperinceyear4, ehdesignation4, ehsalary4, ehnature4, award, research_experience, published_paper, photo, entry_date from recruitment inner join post on recruitment.post_id = post.post_id  where recruitment_id in (select max(recruitment_id) from recruitment)");

		$stmt->execute();
        $stmt->bind_result($recruitment_id, $post_name, $postal_oder_no, $postal_order_date, $name, $father_name, $dob, $gender, $marital_status, $category, $physically_handicaped, $communication_address, $permanent_address, $country, $state, $district,$pinno, $contact_no, $mobile, $email, $aqdegree1, $aqboard1, $aqpassingyear1, $aqdivision1, $aqtotalmark1, $aqmarksobtained1, $aqsubjecttaken1, $aqdegree2, $aqboard2, $aqpassingyear2, $aqdivision2, $aqtotalmark2, $aqmarksobtained2, $aqsubjecttaken2, $aqdegree3, $aqboard3, $aqpassingyear3, $aqdivision3, $aqtotalmark3, $aqmarksobtained3, $aqsubjecttaken3, $aqdegree4, $aqboard4, $aqpassingyear4, $aqdivision4, $aqtotalmark4, $aqmarksobtained4, $aqsubjecttaken4, $aqdegree5, $aqboard5, $aqpassingyear5, $aqdivision5, $aqtotalmark5, $aqmarksobtained5, $aqsubjecttaken5, $additional_qualification, $computer_knowledge, $ehfirm1, $ehduration1, $ehexperinceyear1, $ehdesignation1, $ehsalary1, $ehnature1, $ehfirm2, $ehduration2, $ehexperinceyear2, $ehdesignation2, $ehsalary2, $ehnature2, $ehfirm3, $ehduration3, $ehexperinceyear3, $ehdesignation3, $ehsalary3, $ehnature3, $ehfirm4, $ehduration4, $ehexperinceyear4, $ehdesignation4, $ehsalary4, $ehnature4, $award, $research_experience, $published_paper, $photo, $entry_date);
        
		while($stmt->fetch())
             { 
				$this->setrecruitment_id($recruitment_id);
				$this->setPost_name($post_name);
				$this->setname($name);
				$this->setphoto($photo);
				$this->setfather_name($father_name);
				$this->setpostal_oder_no($postal_oder_no);
				$this->setpostal_order_date($postal_order_date);
				$this->setdob($dob);
				$this->setgender($gender);
				$this->setmarital_status($marital_status);
				$this->setcategory($category);
				$this->setphysically_handicaped($physically_handicaped);

				$this->setcommunication_address($communication_address);
				$this->setpermanent_address($permanent_address);
				$this->setdistrict($district);
				$this->setstate($state);
				$this->setcountry($country);
				$this->setpinno($pinno);
				$this->setcontact_no($contact_no);
				$this->setmobile($mobile);
				$this->setemail($email);

				$this->setaqdegree1($aqdegree1);
				$this->setaqboard1($aqboard1);
				$this->setaqpassingyear1($aqpassingyear1);
				$this->setaqdivision1($aqdivision1);
				$this->setaqtotalmark1($aqtotalmark1);
				$this->setaqmarksobtained1($aqmarksobtained1);
				$this->setaqsubjecttaken1($aqsubjecttaken1);

				$this->setaqdegree2($aqdegree2);
				$this->setaqboard2($aqboard2);
				$this->setaqpassingyear2($aqpassingyear2);
				$this->setaqdivision2($aqdivision2);
				$this->setaqtotalmark2($aqtotalmark2);
				$this->setaqmarksobtained2($aqmarksobtained2);
				$this->setaqsubjecttaken2($aqsubjecttaken2);

				$this->setaqdegree3($aqdegree3);
				$this->setaqboard3($aqboard3);
				$this->setaqpassingyear3($aqpassingyear3);
				$this->setaqdivision3($aqdivision3);
				$this->setaqtotalmark3($aqtotalmark3);
				$this->setaqmarksobtained3($aqmarksobtained3);
				$this->setaqsubjecttaken3($aqsubjecttaken3);

				$this->setaqdegree4($aqdegree4);
				$this->setaqboard4($aqboard4);
				$this->setaqpassingyear4($aqpassingyear4);
				$this->setaqdivision4($aqdivision4);
				$this->setaqtotalmark4($aqtotalmark4);
				$this->setaqmarksobtained4($aqmarksobtained4);
				$this->setaqsubjecttaken4($aqsubjecttaken4);

				$this->setaqdegree5($aqdegree5);
				$this->setaqboard5($aqboard5);
				$this->setaqpassingyear5($aqpassingyear5);
				$this->setaqdivision5($aqdivision5);
				$this->setaqtotalmark5($aqtotalmark5);
				$this->setaqmarksobtained5($aqmarksobtained5);
				$this->setaqsubjecttaken5($aqsubjecttaken5);

				$this->setadditional_qualification($additional_qualification);
				$this->setcomputer_knowledge($computer_knowledge);

				$this->setehfirm1($ehfirm1);
				$this->setehduration1($ehduration1);
				$this->setehexperinceyear1($ehexperinceyear1);
				$this->setehdesignation1($ehdesignation1);
				$this->setehsalary1($ehsalary1);
				$this->setehnature1($ehnature1);

				$this->setehfirm2($ehfirm2);
				$this->setehduration2($ehduration2);
				$this->setehexperinceyear2($ehexperinceyear2);
				$this->setehdesignation2($ehdesignation2);
				$this->setehsalary2($ehsalary2);
				$this->setehnature2($ehnature2);

				$this->setehfirm3($ehfirm3);
				$this->setehduration3($ehduration3);
				$this->setehexperinceyear3($ehexperinceyear3);
				$this->setehdesignation3($ehdesignation3);
				$this->setehsalary3($ehsalary3);
				$this->setehnature3($ehnature3);

				$this->setehfirm4($ehfirm4);
				$this->setehduration4($ehduration4);
				$this->setehexperinceyear4($ehexperinceyear4);
				$this->setehdesignation4($ehdesignation4);
				$this->setehsalary4($ehsalary4);
				$this->setehnature4($ehnature4);

				$this->setaward($award);
				$this->setresearch_experience($research_experience);
				$this->setpublished_paper($published_paper);
			 }
		return $this;

}


}//end of class
?>