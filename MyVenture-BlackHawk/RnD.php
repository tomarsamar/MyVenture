<?php


 require_once 'GlobalConfig.php';
 require_once 'Global/Globals.php';

 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("Mblog","/Library/Entities/");
 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("CommonFactory","/Library/Factory/");
 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("PrimaryServiceEngine","/Library/Service/");
 
 
 require_once '/Library/Data/DataBlock/PDODb.php';
 

 
 
 
 
// foreach($_SERVER  as $v)
 //{
 	//echo "<BR />";
 	//echo $v;
 	
// }
 
  error_reporting(-1);
 
 
 
 $action = isset($_GET["action"]) ? $_GET["action"] : 'Showlogin';
 
 
 echo $action;
 //print_r($_REQUEST);
 
 
 
 switch($action){
 
 	case 'GetArray':
 		//PublishBlog("1","just testing the things");
 		
 		test();
 		
 		$arr = array("result" => "Ok", "msg"=>"done");
 		$str=json_encode($arr);
 		echo $str;
 		exit;
 		break;
 
 	case 'logout':
 		break;
 
 }
 
 
// $stat= \MyVenture\Data\DbFactory::GetStatement(1,"call USp_Authenticate(:_mailId,:_pass)");
 //$stat->AddInParam(":_mailId","samar.tmr@gmail.com");
 //$stat->AddInParam(":_pass","12345");
 //$array=$stat->executeAll();
 //$stat->CloaseInnerConnection();
 
 function PublishBlog($UID,$content)
 {
 
 	$commonFacade = \MyVenture\Factory\CommonFactory::GetCommonServiceFacade();
 	$commonFacade->PublishMBlog($UID, $content);
 
 }
 
 
 function test()
 {
 	try{
 		
 		
 	
 	//$dbh = new \PDO('mysql:host=localhost;dbname=MyVenture', "root", "kob115");
 	
 	/*$query='select a.content,a.id blogId,a.UID authorId,a.DateOfCreation,b.Name
        authorName,b.imgUrl authorImg,c.AdContent adContent,c.URl adUrl from mblog a 
    inner join user b on b.Uid = a.UID
    inner join Adcontainer c on c.id = a.adId  
    where
    a.UID in (select following from connections where Uid ='  .   '1' . ') and  DateOfCreation > ' . $a .
    'order by DateOfCreation desc
    LIMIT 0,25;';
		
 	
 	
 	//echo $query;
 	
 	$ss = $dbh->query($query);
 	
 	
 	
 print_r($dbh->errorInfo());	
 print_r($dbh->errorCode());
 	*/
 	
 	
 	$json=$_REQUEST['UserDetails'];
 		
 		
 	$arry=json_decode($json);
 		
 		
 	//print_r($arry);
 		
 		$commonFactoryObj = new \MyVenture\Factory\CommonFactory();
			
		$commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
			
		$arry1 = $commonServiceFacade->GetMySubscribedMBlogs($arry->UserId, $arry->LastblogTime);
			
 		
 	//print_r($returnObj);
 		
 	echo json_encode(	$arry1);
 	
 	
 	
 	
 	
 //	$stat= $dbh->prepare("call USp_GetMBlogs(:_UID,:_lstBlogDate)");
 	//$a='2011-10-09 06:35:36';
 	//$b=1;
 	
 	//$stat->bindParam(":_lstBlogDate",$a);

 	//$stat->bindParam(":_UID",$b);
 	
 	//$stat->execute();
 	
 	//print_r($stat->fetchAll()); 
 	//print_r($ss);
 	
 	//print_r($dbh->errorInfo());
 	//print_r($dbh->errorCode());
 	
 	
 	
 	$array_MBlog = array();
 	
 	$i = 0;
 	
 	
 	
 	return $array_MBlog;
 	
 	$dbh = null;
 	} catch (PDOException $e) {
 		print "Error!: " . $e->getMessage() . "<br/>";
 		die();
 	}
 	
 }
 
 //$dsn = 'mysql:dbname=' .  Global_Config_DataBaseName .   ';host=' . Global_Config_DatabaseServerName ;
 
 //$dbh=new PDO($dsn, Global_Config_DatabaseServerUserId, Global_Config_DatabaseServerPassword);
 
 //$uid=123;
 //$pass='';
 
 //$statement=$dbh->prepare("call USp_GetMBlogs(?)");
 
 //$statement->bindParam(1, $uid);
 
 //$statement->execute();
 
 ///$statement->rowCount();
 
 //$array=$statement->fetchAll();
 
 
 //print_r($array);
 
 //$dbh=null;
 
 
 
 
 ?>
 
 
 <!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
 
 <html>
 
 <head>
 <script src="public/scripts/jquery-1.6.4.js"  type="text/javascript" ></script>
 <script src="public/scripts/json2.js"  type="text/javascript" ></script>
 
 </head>
 <form method="post" action="rnd.php?action=GetArray">
 
 <input type="submit" onclick="javascript:TestService();" value="test" />
 <input type="text" name="UserDetails" id="UserDetails"  value="" />
 
 
 </form>
 
 <script  type="text/javascript">

	function TestService()
	{

		debugger;

		LastblogTime='2011-10-09 18:57:24';
		var objTotransfer = '{"UserId":"1","LastblogTime":"' + LastblogTime + '"}';

		


			$("#UserDetails").val(objTotransfer);
		

		

		
/*		var obj = {};
		obj.a = "1234";
		obj.b = "afafasas";

		var str=JSON.stringify(obj);

		
		
		var returnObj = $.ajax({url:"RnD.php?action=GsetArray",data:str,error:erro,async:false});

*/
		
		var str=$.parseJSON(returnObj.responseText);
		var ss="";
		alert(str.result);
		//var obj=eval(returnObj.responseText);
		
		
	}
function erro(rel,b,c)
{

debugger;
	}

	

 </script>
 
 </html>



	
