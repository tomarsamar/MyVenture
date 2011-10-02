<?php


namespace MyVenture\Data;

class Db_DbBlock implements IDatabase
{
	private static $con;
	
	public function GetNewConnection()
	{
		$dsn = 'mysql:dbname=' .  Global_Config_DataBaseName .   ';host=' . Global_Config_DatabaseServerName ;
		
		$dbh=new PDO($dsn, Global_Config_DatabaseServerUserId, Global_Config_DatabaseServerPassword);
		
		return $dbh;
		
	}
	public function GetConnection()
	{
		
		if(isset(self::$con))
		{
			return self::$con;
			
		}
		
		$dsn = 'mysql:dbname=' .  Global_Config_DataBaseName .   ';host=' . Global_Config_DatabaseServerName ;
	
		$dbh=new \PDO($dsn, Global_Config_DatabaseServerUserId, Global_Config_DatabaseServerPassword);
	
		self::$con=$dbh;
		
		return self::$con;
	
	}
	public function CloseConnection()
	{
		self::$con=null;
	}
	
}

interface IDatabase{
	
	public function GetConnection();
	public function GetNewConnection();
	public function CloseConnection();
	
	
}

class DbFactory
{
	/*
	 * 
	 * returns object of IDatabase
	 * 
	 * */
	public static function GetDb($type)
	{
		
		
		return new Db_DbBlock();
	}
	
	
	/*
	 * return object which implements IStatement
	 * 
	 * */
	public static function GetStatement($type,$statement)
	{
	
		return new Statement_DbBlock($statement);
	
	}
	
	
	
}


interface IStatement
{
	/*
	 * returns array which contains all row sets
	 * */
	public function executeAll();
	public function AddInParam($name,$paramValue);
	public function AddOutParam($name,$paramValue);
	public function CloaseInnerConnection();
}


class Statement_DbBlock implements IStatement
{
	
	private	$statement=null;
	private	$con=null;
	private	$Db_Con=null;
	
	
	public function __construct($statement){
		$this->Db_Con=DbFactory::GetDb(1);
		$this->con=$this->Db_Con->GetConnection();
		$this->statement=$this->con->prepare($statement);
		
	}
	
	function executeAll()
	{
		
		$this->statement->execute();
		return $this->statement->fetchAll();
	}
	
	function AddInParam($name,$paramValue)
	{
		$this->statement->bindParam($name, $paramValue);
		
	}
	
	public function AddOutParam($name,$paramValue)
	{
		
		
	}
	
	public function CloaseInnerConnection(){
	
		$this->con=null; 
		$this->Db_Con->CloseConnection();
	
	}
}