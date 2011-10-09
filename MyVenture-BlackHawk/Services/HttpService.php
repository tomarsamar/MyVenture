<?php


 require_once '../GlobalConfig.php';
 require_once '../Global/Globals.php';

 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("Mblog","/Library/Entities/");
 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("CommonFactory","/Library/Factory/");
 \GlobalContext::GetCurrentGlobalContext()->App_LoadFile("PrimaryServiceEngine","/Library/Service/");

 
 class HttpService{
 
 	private $action;
 	
 	function __construct($action)
 	{
 		$this->action = $action;
 		
 	}
 	
 	public function Execute()
 	{
 		
 		switch($this->action){
 		
 			case 'PublishBlog':
 				  
 				  $json=$_REQUEST['UserDetails'];
 				  
 				
 				  $arry=json_decode($json);
 				  
 				  
 				  
 				  $this->PublishBlog($arry->UserId, $arry->Content);
 				  
 				  
 				  echo '{"status":"OK"}';
 				  
 				break;
 			case 'GetMySubscribedMBlogs':
 				
 				$json=$_REQUEST['UserDetails'];
 				  
 				
 				$arry=json_decode($json);
 				
 				
 				//print_r($arry);
 				
 				$returnObj = $this->GetMySubscribedMBlogs($arry->UserId, $arry->LastblogTime);
 				
 				//print_r($returnObj);
 				
 				echo json_encode($returnObj);
 				
 				break;
 			case 'OperationNotFound':
 				echo "The requested Operation not found in service, please check operation name";
 				break;
 		}
 		
 		
 		
 	}
 	
 	function PublishBlog($UID,$content)
	{
	
		$commonFacade = \MyVenture\Factory\CommonFactory::GetCommonServiceFacade();
		$commonFacade->PublishMBlog($UID, $content);
	
	} 
	
	function GetMySubscribedMBlogs($UID,$LastblogTime)
	{
		
		$commonFactoryObj = new \MyVenture\Factory\CommonFactory();
			
		$commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
			
		$arry = $commonServiceFacade->GetMySubscribedMBlogs($UID,$LastblogTime);
			
		return  $arry;
		
		
	}
 }
 
 //main
 
 $action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'OperationNotFound';
 
 // validate action so as to default to the login screen
 if ( !in_array($action, array('PublishBlog', 'GetMySubscribedMBlogs'), true))
 {
 	$action = 'OperationNotFound';
 }
 
 $HttpService_obj=new HttpService($action);
 $HttpService_obj->Execute();
 