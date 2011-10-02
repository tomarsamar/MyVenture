

<style type="text/css">


.LoginBox h2
{

font-size:16px;
color:#222;
font-weight: normal;
display:inline-block;
margin:0 0 1.0em;

}

.LoginBox input[type="text"],.LoginBox input[type="password"]
{

	height:25px;
	width:275px;

}


.LoginBox input[type="submit"]{

margin:0 0 0 1.5em;
height:30px;
width:75px;

}

.LoginBox label{

	margin: 0 0 1.5em ;
	display:block;
	margin:0 0 1.5em 1.5em;

}

.LoginBox .textboxLabel{


display:block;

}



.LoginBox{

height:230px;
width:335px;
float:right;
background: whiteSmoke;
margin:50px;
border: 1px solid #E5E5E5;

}

<!--border-left: 1px;
 border-left-style:solid;
 border-left-color: #999; 
  -->

</style>
<div id="outerContentPane">
<div id="leftPane" class="leftPane">
	
</div>

<div  id="RightPane" class="righttPane">

<?php 

App_LoadFile("User", "/UI/Utility/");

class SignIn{
	
	
	function Execute($action)
	{
		$action=isset($_GET["Action"]) ? $_GET["Action"] : "none";
	}
	
}

$SignIn_obj=new SignIn();

//main 

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : 'Showlogin';

// validate action so as to default to the login screen
if ( !in_array($action, array('logout', 'lostpassword', 'retrievepassword', 'resetpass', 'rp', 'register', 'Showlogin','login'), true))
{
	$action = 'Showlogin';
}



switch($action){
	
	case 'Showlogin':
		App_LoadFile("LoginModel", "/UI/Model/");
		global $View_Data;
		$View_Data = new \MyVenture\Model\LoginModel();
		$View_Data->error = FALSE;
		App_GetView('LoginView');
	break;
	
	case 'logout':
			echo "teting the actions";
	break;
	case 'login':
		
		$usr = new \MyVenture\Utility\User();
		$usr->Authinticate();
		
		
		if($usr->Authinticated){
			header("Location: Home.php?Controlar=MBlogControlar");/* if you prefix it with / than it will continue from root localhost/Home
			 if not prefic with / than it will take relative path from current page */
		} else {
			
			App_LoadFile("LoginModel", "/UI/Model/");
			global $View_Data;
			$View_Data=new \MyVenture\Model\LoginModel();
			$View_Data->error = TRUE;
			$View_Data->erroMSG = Messages::$UserIdPassNotCorrect;
			App_GetView('LoginView');
		}
		
		break;
}
	?>
		</div> <!--  end Right  Pane -->
</div> <!--  end outer content Pane -->
<script type="text/javascript">

  var SignIn_Type=function(){};

  SignIn_Type.prototype={


	}

	var SignIn_Obj=new SignIn_Type();
	
  </script>
  
 