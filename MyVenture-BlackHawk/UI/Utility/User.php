<?php

namespace MyVenture\Utility;

App_LoadFile("Roles", "/UI/Utility/");
App_LoadFile("User", "/Library/Data/");


class User
{
 public  $name;

 public  $role;
 public  $mailId;
 public  $UId;
 public  $imgURL;
 
 public $Authinticated = FALSE;
 
 
 public function Authinticate()
 {
 	
 	//write authintication logic
 	
 	//if authinticated than set $Authinticated=true
 	
 	
 	
 	if(1==2 && isset($_COOKIE["authCookie"])){
 		
 			$str=$_COOKIE["authCookie"];
    		$atringArray=split("~", $str);
    	
    		$this->name =$atringArray[0];
    		$this->role =$atringArray[1];
    		$this->mailId=$atringArray[2];
    		$this->UId=$atringArray[3];
    		$this->imgURL=$atringArray[4];
    		$this->Authinticated = TRUE;
    		
 	}
 		$user =new \MyVenture\Data\User();
 	 	
 		$mailId=$_POST["txt_UserName"];
 		$pass=$_POST["txt_Pass"];
 		
 		$array=$user->Authinticate($mailId, $pass);

 	 	if(count($array) < 1)
 		{
 			
 			return $this;
 			
 		}
 	
 		print_r($array);
 		
 		
 		
 	$this->Authinticated = TRUE;
 	
 	$this->role=$array[0]["Role"];
 	$this->name=$array[0]["Name"];
 	$this->mailId=$array[0]["MailId"];
 	$this->UId=$array[0]["Uid"];
 	$this->imgURL=$array[0]["imgURL"];
 	
 	$cookieValue=$this->name . "~" . $this->role . "~" . $this->mailId . "~" . $this->UId ."~" . $this->imgURL;
 	
 	setcookie("authCookie",$cookieValue,time() + 60*60*24*7);//set authintication cookie
 	
 	return $this;
 	
 }
 
 function IsAdmin()
 {
 	return $this->role == "Admin";
 }
 
}

