<?php

namespace MyVenture\Factory;

require_once '../../Library/Service/PrimaryServiceEngine.php';



class CommonFactory{
	
	public static function  GetCommonServiceFacade()
	{
		$obj= new \MyVenture\Service\PrimaryServiceEngine();
		
		return $obj;
		
	}
	
	
}