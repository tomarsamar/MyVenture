<?php
function get_View($viewName)
{
	global	 $Global_Config_ApplicationPath;
	
	$path=$Global_Config_ApplicationPath . '/UI/View/' . $viewName . '.php';
	
	require_once $path;
	
	
}

function get_Controlar()
{
	
	/*
	* check if page query string is set than display that or show default page
	*
	* */
	
	$page=isset($_GET["Controlar"]) ? $_GET["Controlar"]  : "SignIn";
	
	global	 $Global_Config_ApplicationPath;
	
	$path=$Global_Config_ApplicationPath . '/UI/Controlars/' . $page . '.php';
	
	//$page=isset($_GET["Controlar"]) ? $_GET["Controlar"] . '.php' : "BlogDisplay.php";
	 
	return require_once $path;
	
}





