	<?php

	//TODO: see namespace problem
    //namespace MyVenture\controler
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("AppControler", "/Library/Contracts/");
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlogView", "/UI/View/");
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlogModel", "/UI/Model/");
    
    
    class MBlogControler extends \MyVenture\Contracts\AppControler{
   
       Private  $action;
       
       function __construct($action)
       {
       	
       	$this->action = $action;
       	
       }
       
       function Execute()
       {
       	

       		$UID = $_REQUEST["UserId"];
       	
       		$MBlogModel_Obj = new \MyVenture\Model\MBlogModel($UID,"");
       		
       		$viewData = $MBlogModel_Obj->Execute();
       		
       		$appView_Obj = new MBlogView($viewData);
       		
       		$appView_Obj->Execute();
       	
       } 
       
   	}
   	
   	
   	$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'DefaultAction';
   	
   	// validate action so as to default to the defauly Login
   	if ( !in_array($action, array('DefaultAction'), true))
   	{
   		$action = 'DefaultAction';
   	}
   	
   	  	
   	$MBlogControler_Obj=new MBlogControler($action);
   	
   	$MBlogControler_Obj->Execute();
   	
   	
   	
   		