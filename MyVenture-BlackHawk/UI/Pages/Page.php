<?php
function get_Conten()
{
	/*
	 * check if page query string is set than display that or show default page
	 * 
	 * */
   $page=isset($_GET["Page"]) ? $page : "BlogDisplay.php";
   
	return require_once $page;
	
}