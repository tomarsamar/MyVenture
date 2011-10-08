<?php

class GlobalContext{
 
	
private static $globalObject = null;
private static $currentUser=null;
	
function App_GetView($viewName)
{
	$this->App_LoadFile($viewName,"/UI/View/");
}

function App_GetControler()
{
	/*
	* check if page query string is set than display that or show default page
	*
	* */
	
	$page=isset($_GET["Controler"]) ? $_GET["Controler"]  : "SignIn";
	
	if($page != "SignIn" && !$this->GetCurrentUser()->IsUserAuthinticated())
	{

		$URL= 'Home.php?Controler=SignIn';
		
		echo $URL;
		
		header('Location:' . $URL);
		exit;
		
	}
	
	$this->App_LoadFile($page,"/UI/Controllers/");
	
	
}

function App_LoadFile($fileName,$relativePath)
{
	global	 $Global_Config_ApplicationPath;
	
	$path=$Global_Config_ApplicationPath . $relativePath . $fileName . '.php';
	
	require_once $path;
	
	
}


public function GetCurrentUser()
{
	 $this->App_LoadFile("User", "/UI/Utility/");
	
	if(!isset(self::$currentUser)){
		
		self::$currentUser=new \MyVenture\Utility\User();
	}
	
	return self::$currentUser;
	
	
}
	
public static function  GetCurrentGlobalContext()
{
	
	if(!isset(self::$globalObject)){
		
		self::$globalObject=new GlobalContext();
	}
	
	return self::$globalObject;
}	
	
}










