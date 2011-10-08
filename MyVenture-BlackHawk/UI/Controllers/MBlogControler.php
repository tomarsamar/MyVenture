	
   <?php
        
    namespace MyVenture\Controller;
    
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("AppControler", "/Library/Contracts/");
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlogView", "/Library/Contracts/");
    GlobalContext::GetCurrentGlobalContext()->App_LoadFile("MBlogModel", "/Library/Contracts/");
    
    
    class MBlogControler extends AppControler{
   
       Private  $action;
       
       function __construct($action)
       {
       	
       	$this->action = $action;
       	
       }
       
       function Execute()
       {
       		$MBlogModel_Obj = new \MyVenture\Model\MBlogModel();
       		
       		$viewData = $MBlogModel_Obj->Execute();
       		
       		$appView_Obj = new \MyVenture\View\MBlogView($viewData);
       		
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
   	
   	$MBlogControler_Obj->Execute()
   	
   	
   	?>
   		