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
	public function GetMySubscribedMBlogs($UID,$LastblogTime)
	{
		//echo "in data layer";
		
		
		
		$stat= \MyVenture\Data\DbFactory::GetStatement(1,"call USp_GetMBlogs(:_UID,:_lstBlogDate)");
		
		$stat->AddInParam(":_UID",$UID);
		
		
		
		if($LastblogTime == "")
		{
			$stat->AddInParam(":_lstBlogDate",null);
		
		}else
		{
			//echo "in real time blog fetch";

		/*	$dbh = new \PDO('mysql:host=localhost;dbname=MyVenture', "root", "kob115");
			$stat= $dbh->prepare("call USp_GetMBlogs(:_UID,:_lstBlogDate)");
			//$a='2011-10-09 06:35:36';
			//$b=1;
			
			$stat->bindParam(":_lstBlogDate",$LastblogTime);
			
			$stat->bindParam(":_UID",$UID);
			
			$stat->execute();
			
			print_r($stat->fetchAll());
			//print_r($ss);
			
			print_r($dbh->errorInfo());
			print_r($dbh->errorCode());
			*/
			
			//$LastblogTime= '"' . $LastblogTime . '"';
			
			//echo $LastblogTime;
			
			$stat->AddInParam(":_lstBlogDate",$LastblogTime);
			
		}
		
		$array=$stat->executeAll();
		
		print_r($array);
		
		//echo "above if block";
		
		
		
	if(count($array) > 1)
	{
		
		//echo count($array);
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
						
						$obj->dateOfCreation = $array[$i]['DateOfCreation'];
												
						
						$array_MBlog ->attach($obj);
						
						
					}
					
			//		mysql_free_result($result);
				
			
		//	mysql_close($this->con);
		
			return $array_MBlog;
		
		}
	}
	
	function test($UID,$lastDate)
	{	try {
		$dbh = new \PDO('mysql:host=localhost;dbname=MyVenture', "root", "kob115");
		
		$query='select a.content,a.id blogId,a.UID authorId,a.DateOfCreation,b.Name
        authorName,b.imgUrl authorImg,c.AdContent adContent,c.URl adUrl from mblog a 
    inner join user b on b.Uid = a.UID
    inner join Adcontainer c on c.id = a.adId  
    where
    a.UID in (select following from connections where Uid ='  .   $UID . ') and  DateOfCreation > \'' . $lastDate .
    '\'order by DateOfCreation desc
    LIMIT 0,25;';
		
		//echo $query;
		
		$ss = $dbh->query($query);

		//print_r($ss);
		$array_MBlog = array();
		
		$i = 0;
		
		foreach($ss as $row) {
			
		
			$obj= new \MyVenture\Entities\MBlog();
				
			$obj->authorName = $row['authorName'];
				
			$obj->Content = $row['content'];;
				
			$obj->ID = $row['blogId'];;
				
			$obj->authorUID = $row['authorId'];
				
			$obj->adContent = $row['adContent'];
			
			$obj->adURL = $row['adUrl'];
			
			$obj->authorImg = $row['authorImg'];
			
			$obj->dateOfCreation = $row['DateOfCreation'];
			
			
			$array_MBlog[$i]= $obj ;
			//print_r($row);
			
			$i++;
		}
		
		
		return $array_MBlog;
		
		$dbh = null;
	} catch (PDOException $e) {
		print "Error!: " . $e->getMessage() . "<br/>";
		die();
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