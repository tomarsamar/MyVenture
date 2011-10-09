<?php
namespace MyVenture\Business;

//spl_autoload_call("\MyVenture\Data\MBlog");

\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlog","/Library/Data/");



class MBlog{
	
	
public $MBlogDTO;
	
	
	
public function PublishBlog($UID,$Content)
{
	
	
	
	$obj= new \MyVenture\Data\MBlog();
	
	return  $obj->PublishBlog($UID,$Content);
	
	
}
	
public function GetMySubscribedMBlogs($UID,$LastblogTime)
{
	//echo "in business MBlog";
	
	 $obj= new \MyVenture\Data\MBlog();
	 
	return  $obj->GetMySubscribedMBlogs($UID,$LastblogTime);
	 	
}
	
	
	
	
}