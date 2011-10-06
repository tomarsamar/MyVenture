<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<link href="../../public/CSS/Main.css" rel="stylesheet" type="text/css" />
<script src="../../public/scripts/jquery-1.6.4.js"  type="text/javascript" ></script>


</head>

<body>

<div class="container">
  <div class="header">
       <!-- end .header --></div>
   
  <div class="content">
  
  
  	<?php 
  	  	
      	require_once '../../GlobalConfig.php';
      	require_once '../../Global/Globals.php';
      	GlobalContext::GetCurrentGlobalContext()->App_LoadFile("LoginModel", "/UI/Model/");
      	       	 
      	
      	try{
      		
      		GlobalContext::GetCurrentGlobalContext()->App_GetControler();
      		
      	}
      	catch(Exception  $ex)
      	{
      		if(Global_Config_IsInDebug)
      			echo	$ex->getMessage();
      		else
      		echo "Server Error , please contact system Administrator  MailId : SystemAdmin@TsInc.com";
      		
      	}
      	
    	
  	
  	?>
  
  
   </div>
		  <div class="footer">
		    
		    <!-- end .footer --></div>
<!-- end .container -->
  </div>
</body>
</html>