<?Php
session_start();
header ("Content-type: image/png");
if(isset($_SESSION['my_captcha']))
{
unset($_SESSION['my_captcha']); // destroy the session if already there
}
//////Part 1 Random string generation ////////
$string1="abcdefghf6849576sffijkfs6789fsfmnased2345pqcbcrstuvhf234hhwxyz";
$string2="23456789";
$string=$string1.$string2;
$string= str_shuffle($string);
$random_text= substr($string,0,5); // change the number to change number of chars
/////End of Part 1 ///////////

$_SESSION['my_captcha'] =$random_text; // Assign the random text to session variable


///// Create the image ////////
$im = @ImageCreate (60, 20)
or die ("Cannot Initialize new GD image stream");
$background_color = ImageColorAllocate ($im, 230, 230, 230); // Assign background color
$text_color = ImageColorAllocate ($im, 0, 0, 255);      // text color is given 
ImageString($im,5,5,2,$_SESSION['my_captcha'],$text_color); // Random string  from session added 

ImagePng ($im); // image displayed
imagedestroy($im); // Memory allocation for the image is removed. 
?>