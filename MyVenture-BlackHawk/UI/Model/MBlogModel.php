<?php

namespace MyVenture\Model;

GlobalContext::GetCurrentGlobalContext()->App_LoadFile("ICommonFacade", "/Library/Contracts/");
GlobalContext::GetCurrentGlobalContext()->App_LoadFile("CommonFactory", "/Library/Factory/");
GlobalContext::GetCurrentGlobalContext()->App_LoadFile("AppModel", "/Library/Contracts/");


use MyVenture\Contracts;

class MBlogModel extends  AppModel{
	
	private $UID;
	
	function __construct($UID)
	{
		$this->UID = $UID;
		
	}
	
	function Execute(){
	
			$commonFactoryObj = new \MyVenture\Factory\CommonFactory();
			
			$commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
			
			$arry = $commonServiceFacade->GetMySubscribedMBlogs($this->UID);
			
			return  $arry;
	
	}
	
	
} 





