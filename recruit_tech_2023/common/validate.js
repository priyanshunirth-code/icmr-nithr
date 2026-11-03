function submit_createfile(frm)
{
var err = document.getElementById("msgErrorTxt");

if(frm.ddPost.value==0) {err.innerHTML="Please Select Post";return false;}


if (isEmpty(frm.txtName)) {err.innerHTML="Please Enter Name";return false;}
if (isEmpty(frm.txtfather_name)) {err.innerHTML="Please Enter Father/Husband's Name";return false;}
if (isEmpty(frm.txtdob)) {err.innerHTML="Please Enter Date of Birth";return false;}
if (isEmpty(frm.txtid_card_number)) {err.innerHTML="Please Enter Identity Card Number";return false;}
if (isEmpty(frm.txtdistrict)) {err.innerHTML="Please Enter District";return false;}
if (isEmpty(frm.txtcommunication_address)) {err.innerHTML="Please Enter Communication Address";return false;}
if (isEmpty(frm.txtpermanent_address)) {err.innerHTML="Please Enter Permanent Address";return false;}
if (isEmpty(frm.txtpinno)) {err.innerHTML="Please Enter Pin/Zip Code";return false;}
if (isEmpty(frm.txtmobile)) {err.innerHTML="Please Enter Mobile No.";return false;}
if (isEmpty(frm.txtCaptcha)) {err.innerHTML="Please Enter Secure Code";return false;}
if (isEmpty(frm.file)) {err.innerHTML="Please Upload Photo";return false;}


var r = confirm("Do you want to save the record!");
    if (r == true) { return true;} 
	else { return false;}

return true;
}


// code to check, whether string is empty or not
function isEmpty(xx){
var yy = xx.value.replace(/^\s*/, "");
if(yy == ""){xx.focus();return true;}
return false;
}