<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link href="../CSS/Main.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container">
  <div class="header">
       <!-- end .header --></div>
  <div class="content">
  
  
  	<?php 
  	
      	require_once 'Page.php';
      	require_once '../../Config/GlobalConfig.php';
      	
      	       	 
      	try{
      		
      		throw new Exception('testing exception');
      		get_Conten();
      		
      		
      		
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
  <!-- end .container --></div>
</body>
</html>