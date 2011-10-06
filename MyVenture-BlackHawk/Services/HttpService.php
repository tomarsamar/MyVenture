<?php


 require_once '../GlobalConfig.php';
 require_once '../Global/Globals.php';

 GlobalContext::GetCurrentGlobalContext()->App_LoadFile("Mblog","/Library/Entities/");

 
 class HttpService{
 
 
 function PublishBlog($UID,$content)
	{
	
	$commonFacade = \MyVenture\Factory\CommonFactory::GetCommonServiceFacade();
	$commonFacade->PublishMBlog($UID, $content);
	
	} 
 }
 
 $HttpService_obj=new HttpService();
 
 //main
 
 $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'OperationNotFound';
 
 // validate action so as to default to the login screen
 if ( !in_array($action, array('PublishBlog', 'GetMySubscribedMBlogs'), true))
 {
 	$action = 'OperationNotFound';
 }
 
 
 
 switch($action){
 
 	case 'PublishBlog':
 			//$json=$_REQUEST['Jsondata'];
 			echo "teting";
 			//$arry=json_decode($json,false,1);
 			//$HttpService_obj->PublishBlog($arry, $arry[]);
 		break;
  	case 'GetMySubscribedMBlogs':
 			echo "This operation not implemented Yet";
 		break;
 	case 'OperationNotFound':
 			echo "The requested Operation not found in service, please check operation name";
 		break;
 }
 
 





