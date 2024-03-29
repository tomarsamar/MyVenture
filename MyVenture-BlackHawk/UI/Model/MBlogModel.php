<?php

namespace MyVenture\Model;

\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("ICommonFacade", "/Library/Contracts/");
\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("CommonFactory", "/Library/Factory/");
\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("AppModel", "/Library/Contracts/");




class MBlogModel extends  \MyVenture\Contracts\AppModel{
	
	private $UID;
	private $LastblogTime;
	function __construct($UID,$LastblogTime)
	{
		$this->UID = $UID;
		$this->LastblogTime = $LastblogTime;
		
	}
	
	function Execute(){
	
			$commonFactoryObj = new \MyVenture\Factory\CommonFactory();
			
			$commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
			
			$arry = $commonServiceFacade->GetMySubscribedMBlogs($this->UID,$this->LastblogTime);
			
			return  $arry;
	
	}
	
	
} 





