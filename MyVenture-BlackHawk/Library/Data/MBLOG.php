<?php


namespace MyVenture\Data;


\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlog","/Library/Entities/");
\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("mysqldatabase","/Library/Data/DataBlock/");
 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("PDODb", "/Library/Data/DataBlock/");

class MBlog
{
	
	
	private $con;
	
	
	public function PublishBlog($UID,$Content)
	{
		
		$stat= \MyVenture\Data\DbFactory::GetStatement(1,"call Usp_PublishBlog(:_UID,:_Content)");
		$stat->AddInParam(":_UID",$UID);
		$stat->AddInParam(":_Content",$Content);
		$array=$stat->executeAll();
		//$stat->CloaseInnerConnection();
		return $array;
		
	
	}
	
	
	/*
	 * 
	 * 
	 * 
	 * */
	public function GetMySubscribedMBlogs($UID)
	{
		//echo "in data layer";
		
		
		$stat= \MyVenture\Data\DbFactory::GetStatement(1,"call USp_GetMBlogs(:_UID)");
		$stat->AddInParam(":_UID",$UID);
		$array=$stat->executeAll();
		
		
		
	if(count($array) > 1)
	{
		//print_r($array);
		
		
		$array_MBlog = new \SplObjectStorage();

					for($i =0 ; $i < count($array); $i++) {
						
						$obj= new \MyVenture\Entities\MBlog();
							
						$obj->authorName = $array[$i]['authorName'];
							
						$obj->Content = $array[$i]['content'];;
							
						$obj->ID = $array[$i]['blogId'];;
							
						$obj->authorUID = $array[$i]['authorId'];
							
						$obj->adContent = $array[$i]['adContent'];
						
						$obj->adURL = $array[$i]['adUrl'];
						
						$obj->authorImg = $array[$i]['authorImg'];
												
						
						$array_MBlog ->attach($obj);
						
						
					}
					
			//		mysql_free_result($result);
				
			
		//	mysql_close($this->con);
		
			return $array_MBlog;
		
		}
	}
	
	private function GetResult($query)
	{
		
		/*$db = MySqlDatabase::getInstance();
		
		  //try {
			      $db->connect(Global_Config_DatabaseServerName,Global_Config_DatabaseServerUserId, Global_Config_DatabaseServerPassword, Global_Config_DataBaseName);
			  }
			  catch (Exception $e) {
				      die($e->getMessage());
			}
		
			
			$db->query($query); */
		
		$result;
		
		$this->con = mysql_connect(Global_Config_DatabaseServerName,Global_Config_DatabaseServerUserId,Global_Config_DatabaseServerPassword);
		
		if (!$this->con)
		{
			//echo "not connected";
			die('Could not connect: ' . mysql_error());
		}
		else{
			//echo "connected ";
				
			mysql_select_db(Global_Config_DataBaseName,$this->con);
				
			$result = mysql_query($query,$this->con);
		}
		
		
	return 	$result;
		
	}
	
	
}