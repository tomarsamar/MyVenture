<?php


require_once 'GlobalConfig.php';

 require_once '/Library/Data/DataBlock/PDODb.php';

 
 $stat= \MyVenture\Data\DbFactory::GetStatement(1,"call USp_Authenticate(:_mailId,:_pass)");
 $stat->AddInParam(":_mailId","samar.tmr@gmail.com");
 $stat->AddInParam(":_pass","12345");
 $array=$stat->executeAll();
 $stat->CloaseInnerConnection();
 
 
 

//$dsn = 'mysql:dbname=' .  Global_Config_DataBaseName .   ';host=' . Global_Config_DatabaseServerName ;

//$dbh=new PDO($dsn, Global_Config_DatabaseServerUserId, Global_Config_DatabaseServerPassword);


//$uid=123;
//$pass='';

//$statement=$dbh->prepare("call USp_GetMBlogs(?)");
//$statement->bindParam(1, $uid);
//$statement->execute();


///$statement->rowCount();

//$array=$statement->fetchAll();


	print_r($array);


//$dbh=null;





	
