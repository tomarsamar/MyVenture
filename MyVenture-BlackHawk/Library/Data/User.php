<?php

namespace MyVenture\Data;

\GlobalContext::GetCurrentGlobalContext()->App_LoadFile("PDODb", "/Library/Data/DataBlock/");

class User{
	
	
	function Authinticate($mailId,$pass)
	{
		
		$stat= \MyVenture\Data\DbFactory::GetStatement(1,"call USp_Authenticate(:_mailId,:_pass)");
		$stat->AddInParam(":_mailId",$mailId);
		$stat->AddInParam(":_pass",$pass);
		$array=$stat->executeAll();
		$stat->CloaseInnerConnection();
		
		return $array;
		
	}
	
	
}