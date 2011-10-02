<?php
function App_GetView($viewName)
{
	App_LoadFile($viewName,"/UI/View/");
}

function App_GetControlar()
{
	
	/*
	* check if page query string is set than display that or show default page
	*
	* */
	
	$page=isset($_GET["Controlar"]) ? $_GET["Controlar"]  : "SignIn";
	
	App_LoadFile($page,"/UI/Controlars/");
	
	
}

function App_LoadFile($fileName,$relativePath)
{
	global	 $Global_Config_ApplicationPath;
	
	$path=$Global_Config_ApplicationPath . $relativePath . $fileName . '.php';
	
	require_once $path;
	
	
}




