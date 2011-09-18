<?php


namespace MyVenture\Data;


require_once '../../Library/Entities/Mblog.php';
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
		//echo "in data layer";
		
		$array_MBlog = new \SplObjectStorage();

			for($i=0; $i < 5 ; $i++){
			
			$obj= new \MyVenture\Entities\MBlog();
			
			$obj->authorName ="ksdjsada";
			
			$obj->Content = "teting the fuck";
			
			$obj->ID = $i;
			
			$obj->UID = $i + 1;
			
			$array_MBlog ->attach($obj);
			
		}
		
		//$con = mysql_connect("localhost","root","kob115");
		//if (!$con)
	//	{
		//	die('Could not connect: ' . mysql_error());
		//}
		
		return $array_MBlog;
		
	}
	
	
}