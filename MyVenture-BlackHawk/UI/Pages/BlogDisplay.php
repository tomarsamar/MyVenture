	
	<style type="text/css">
	
		.MBlogBox
		{
			
			height: 120px;
			background-color:#EDEBD5;
		}
		#MblogContainer{
		}
	
	
	</style>
<div>
<div id="leftContent" style="float: left;">
   	   <div style="margin-left: 70px;margin-top: 70px;">
   	   		<table>
   	   		<tr><td><a href="#" style="TEXT-DECORATION: none">Paras</a></td></tr>
   	   		<tr><td> <div style="height:10px;"></div>  </td></tr>
   	   		<tr><td><img alt="" src="../../public/Image/007.jpg"  style="height:150px;width:150px"/></td></tr>
   	   		</table>
		   	
	   </div>  
 </div>


<div  style="float: right; background-color: #F7F5D7; border-left: 1px;;border-left-style:solid;border-left-color: #999;height:550px;border-radius:5px;">	
	<div id="MBlogBox" class="MBlogBox" style="border-radius:5px;" >
		<div><span style="font-family: Helvetica; font-weight: bold;color: #999;margin-left: 5px;" >Whats in your Mind : </span></div>
    	<div> 
    		<div class="fltlft"><textarea rows="4" style="width:522px;margin-left: 2px;" id="txtArea_MBlog" maxlength="120" ></textarea> </div>
    		<div class="fltrt" style="margin-left: 1px;"><input type="button" value="Update" style="height: 70px;color: #999;" onclick="javascript:BlogDisplay_Obj.PublishMBlog();" /></div>
    		<div class="clearfloat"></div>
       	</div>
   </div>
        
        <div  style="height:10px;"></div>
        
        <?php
        
       require_once '../../Library/Contracts/ICommonFacade.php';
       require_once '../../Library/Factory/CommonFactory.php';
        
       $commonFactoryObj = new \MyVenture\Factory\CommonFactory();
       
       $commonServiceFacade = $commonFactoryObj->GetCommonServiceFacade();
       
       $arry = $commonServiceFacade->GetMySubscribedMBlogs(123);
    	
   		
   		
   		
   		$arry -> rewind();
    	
    	
      	while($arry->valid())
        {
        ?>
          <div id="MblogContainer">
	       <div id="MBlogs">
	       		<div  style="border-color: #999;border-width: 1px; width:100%;border-bottom-style:solid;">
		       	<div class="fltlft" style="height:48px;width:48px;vertical-align: middle;">
		       		<img alt="" src="../../public/Image/007.jpg"  style="height:48px;width:48px"/>
		       	</div>
		       	<div class="fltrt" style="width:560px;  ">
			       	<div><span style="font-weight:bold;font-family:Helvetica;"> <?php  $obj_t= $arry->current();
			       	
			  		  echo   	$obj_t->authorName;
			       	    	
						//echo get_class($obj_t); //MBlog
			  		  
			       	    ?> </span></div>	
			       	<div  style="font-family:Helvetica;"><?php echo $obj_t->Content;  $arry->next(); ?>  	</div>
			       	
			       	<div  style="font-family:Helvetica;"  id="Content_Template">
			       			
			       			<span  style="font-weight:lighter;color: blue;">Ads: Motor Car, Chair car, You N me </span>
			       	
			       	</div>	
		       	</div>
		       	<div class="clearfloat"></div>
		       	
	       </div>
	       
	       <div style="height: 10px;" ></div>
	       <?php  }?>
	       </div>
       </div>
     </div>  
  </div>
  <script type="text/javascript">

  var BlogDisplay_Type=function(){};

  BlogDisplay_Type.prototype={

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

	var BlogDisplay_Obj=new BlogDisplay_Type();
	
  </script>
  
   <div id="MBlogs_Template"  style="display:none;">
	<div  style="border-color: #999;border-width: 1px; width:100%;border-bottom-style:solid;">
       	<div class="fltlft" style="height:48px;width:48px;vertical-align: middle;">
       		<img  id="img_template" alt="" src=""  style="height:48px;width:48px"/>
       	</div>
       	<div class="fltrt" style="width:560px;  ">
       	<div><span style="font-weight:bold;font-family:Helvetica;" id="AuthorName_Template">
       	 </span></div>	
       	<div  style="font-family:Helvetica;" id="Content_Template"></div>
       	<div  style="font-family:Helvetica;"  id="Content_Template">
			       			
			<span  style="font-weight:lighter;color: blue;">Ads: Motor Car, Chair car, You N me </span>
			       	
		</div>		
       	</div>
       	<div class="clearfloat"></div>
   </div>
       <div style="height: 10px;" ></div>
  </div>
  
  