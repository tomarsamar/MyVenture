<?php
namespace MyVenture\Business;

require_once '../Data/MBlog.php';

class MBlog{
	
	
public $MBlogDTO;
	
	
	
public function PublishBlog($UID,$Content)
{
	
	
	
}
	
public function GetMySubscribedMBlogs($UID)
{
	
	 return new \MyVenture\Data\D_MBlog();
		
}
	
	
	
	
}