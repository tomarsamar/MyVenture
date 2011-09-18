<?php

namespace MyVenture\Factory;

require_once '../Service/PrimaryServiceEngine.php';

class CommonFactory{
	
	function GetCommonServiceFacade()
	{
		
		return new MyVenture\Service\PrimaryServiceEngine();
		
	}
	
	
}