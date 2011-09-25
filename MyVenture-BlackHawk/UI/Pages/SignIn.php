

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
 
 	<form action="Home.php?Controlar=SignIn&action=login&Param=1" method="post">
	   <div id="textBoxHolder" class="LoginBox">
	   	
	   		<h2>
	   		Sign In
	   		</h2>
	   		
    		<label>
	    		<strong class="textboxLabel">Email Id </strong>
	    		<input type="text" id="txt_UserName"  />
	    	</label>
    		<label>
    			<strong class="textboxLabel">Password </strong>
    			<input type="password" id="txt_Pass"  />
    		</label>
    		<input type="submit" id="btn_SignIn" value="Sign In"  />
        </div>
        </form>

	<?php
	
	require_once '../../Library/Contracts/ICommonFacade.php';
	require_once '../../Library/Factory/CommonFactory.php';
	        
	        $commonFactoryObj = new \MyVenture\Factory\CommonFactory();
	       
			$commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
	 
			$arry = $commonServiceFacade->GetMySubscribedMBlogs(123);
	 
			$arry -> rewind();
	 
	?>
		</div> <!--  end Right  Pane -->
</div> <!--  end outer content Pane -->
<script type="text/javascript">

  var SignIn_Type=function(){};

  SignIn_Type.prototype={

	AddMBlog:function (Content,AuthorName,imgPath)
	{
		var templateObject = $("#MBlogs_Template");

		var templateObject_obj=templateObject.clone();
		
		var mBlogContainer= $("#MblogContainer");

		templateObject_obj.css("display","block");
		
	    $("#AuthorName_Template",templateObject_obj).get(0).innerText = AuthorName;

	    $("#Content_Template",templateObject_obj).get(0).innerText = Content;

	    $("#img_template",templateObject_obj).get(0).src = imgPath;
	
	   
	    mBlogContainer.prepend(templateObject_obj);
	
	},PublishMBlog:function()
	{

		
		  var text=$("#txtArea_MBlog").val();
		  $("#txtArea_MBlog").val("");
		
		this.AddMBlog(text,"Paras","../../public/Image/007.jpg");
		

	}

	}

	var SignIn_Obj=new SignIn_Type();
	
  </script>
  
 