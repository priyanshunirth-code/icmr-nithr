<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
    <title> <?php echo $pagetitle; ?></title>
    <meta name="author" content="Avinash - NIRTH Jabalpur">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="../common/style.css" />    
    <script language="javascript" src="../common/datetimepicker.js" type="text/javascript"></script>
    <script language="javascript" src="../common/validate.js" type="text/javascript"></script>
</head>
<body>
<div align="center" style="margin: 0px auto;" class="mainDiv"><!-- Main Div start -->
    <!-- Banner start -->
	<center>
		<div>
             <img src="../common/img/logo.jpg" width="100%" alt="logo">
		</div>
	</center>
    <!-- Banner END -->

    <!-- Navigation start -->
    <div align="center"> <?php require_once("menubar.php"); ?> </div>
   <!-- Navigation END -->

   <!-- Body start -->
   <div align="center">
       <div id="content"><?php require_once("bodycontent.php"); ?></div>
   </div>
   <!-- Body End -->

   <div><hr id="dashline"></div>

   <!-- Footer start -->
   <div align="center" > <?php require_once("footer.php"); ?> </div>
   <!-- Footer End -->

</div> <!-- Main Div End -->
</body>
</html>