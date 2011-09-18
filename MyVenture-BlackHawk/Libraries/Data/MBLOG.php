<?php


namespace MyVenture\Data;


require_once '../Entities/Mblog.php';
class MBlog
{
	
	
	public function PublishBlog($UID,$Content)
	{
	
	
	
	}
	
	
	/*
	 * 
	 * 
	 * 
	 * */
	public function GetMySubscribedMBlogs($UID)
	{
		$array_MBlog=new ArrayObject();
		
		for($i=0;$i < 5 ; $i++){
			
			$obj= new MyVenture\Entities\MBlog();
			
			$obj->Content = "teting the fuck";
			
			$obj->ID = $i;
			
			$obj->UID = $i++;
			
			$array_MBlog->append($obj);
			
		}
		
		$con = mysql_connect("localhost","root","kob115");
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}
		
	}
	
	
}