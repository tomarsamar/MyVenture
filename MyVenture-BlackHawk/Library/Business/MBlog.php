<?php
namespace MyVenture\Business;

//spl_autoload_call("\MyVenture\Data\MBlog");

require_once '../../Library/Data/MBlog.php';

class MBlog{
	
	
public $MBlogDTO;
	
	
	
public function PublishBlog($UID,$Content)
{
	
	
	
}
	
public function GetMySubscribedMBlogs($UID)
{
	//echo "in business MBlog";
	
	 $obj= new \MyVenture\Data\MBlog();
	 
	return  $obj->GetMySubscribedMBlogs($UID);
	 	
}
	
	
	
	
}