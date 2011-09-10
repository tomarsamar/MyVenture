<html>
<?php 
//use Data;
	//$obj= new   MBlog();
	include '../../Data/DataLayerSource.php';

 $obj = new MBlog();
 
 $msg=$obj->GetMySubscribedMBlogs("qweeqe");
 
	echo $msg;
	
	
?>

</html>
