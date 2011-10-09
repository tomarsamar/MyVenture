<?php

namespace MyVenture\Factory;



\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("PrimaryServiceEngine","/Library/Service/");

class CommonFactory{
	
	public static function  GetCommonServiceFacade()
	{
		$obj= new \MyVenture\Service\PrimaryServiceEngine();
		
		return $obj;
		
	}
	
	
}