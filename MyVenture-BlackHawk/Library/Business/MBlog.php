<?php
namespace MyVenture\Business;

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