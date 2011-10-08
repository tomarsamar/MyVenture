<?php


 require_once 'GlobalConfig.php';

 require_once '/Library/Data/DataBlock/PDODb.php';

 
 
 
 
// foreach($_SERVER  as $v)
 //{
 	//echo "<BR />";
 	//echo $v;
 	
// }
 
 
 
 
 
 $action = isset($_GET["action"]) ? $_GET["action"] : 'Showlogin';
 
 
 echo $action;
 //print_r($_REQUEST);
 
 
 
 switch($action){
 
 	case 'GetArray':
 		PublishBlog("123","just testing the things");
 		
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
 
 	$commonFacade = MyVenture\Factory\CommonFactory::GetCommonServiceFacade();
 	$commonFacade->PublishMBlog($UID, $content);
 
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
 <form >
 
 <input type="button" onclick="javascript:TestService();" value="test" />
 
 </form>
 
 <script  type="text/javascript">

	function TestService()
	{

		debugger;


		var obj = {};
		obj.a = "1234";
		obj.b = "afafasas";

		var str=JSON.stringify(obj);

		
		
		var returnObj = $.ajax({url:"RnD.php?action=GsetArray",data:str,error:erro,async:false});


		
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



	
