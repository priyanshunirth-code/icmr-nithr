<?php ob_start(); ?>
<div>
    <table align="center">
	<tr>
	<td align="right"><IMG SRC="../common/img/rmrct-logo.jpg" BORDER="0" ALT=""></td>
	<td align="left" valign="bottom"><H2><tt>National Institute for Research in Tribal Health</tt></H2></td>
	</tr>
	<tr><td colspan="2">
    <tt>The main aim of the project File Tracking System is to provide flexibility to government departments to maintain huge amount of pending files. This system will help all government departments to keep track of every file. This web application is designed for Automation of Department.
    <br><br>
    In this System, We need to process files in Hierarchy and proper action should be taken and necessary permissions are given for the requested Files.
     Sometimes we have to take concern of different departments into consideration.</tt>
    </td></tr>
	</table>
</div>
<?php
$pagetitle = "Index Page";
$indexcss ="selected";
$mainContent = ob_get_contents();
ob_end_clean();
require_once("masterpage.php");
?>