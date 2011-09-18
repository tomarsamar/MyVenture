<?php

require_once 'Roles.php';

 class User
{
 public  $name;

 public  $role;
 
 public $Authinticated=flase;
 
 
 public function Authinticate()
 {
 	
 	//write authintication logic
 	
 	//if authinticated than set $Authinticated=true
 	
 	$Authinticated=true;
 	
 	$role=Roles.Admin;
 	
 	return $Authinticated;
 	
 }
 
 
 
}

