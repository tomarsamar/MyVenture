<?php

namespace MyVenture\Factory;

require_once '../../Library/Service/PrimaryServiceEngine.php';



class CommonFactory{
	
	function GetCommonServiceFacade()
	{
		$obj= new \MyVenture\Service\PrimaryServiceEngine();
		
		return $obj;
		
	}
	
	
}