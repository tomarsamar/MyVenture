	<div>
		<div><span style="font-family: Helvetica; font-weight: bold;color: #999;" >Whats in your Mind : </span></div>
    	<div> 
    		<div class="fltlft"><textarea rows="4" style="width:522px;margin-left: 2px;" ></textarea> </div>
    		<div class="fltrt" style="margin-left: 1px;"><input type="button" value="Update" style="height: 70px;color: #999;" /></div>
    		<div class="clearfloat"></div>
       	</div>
        </div>
        
        <div style="height: 50px;" ></div>
        
        <?php
        
        require_once '../../Library/Contracts/CommonFacade.php';
        require_once '../../Library/Factory/CommonFactory.php';
        
        
        
       $commonFactoryObj= new \MyVenture\Factory\CommonFactory();
       
       $commonServiceFacade=$commonFactoryObj->GetCommonServiceFacade();
       
    	$arry = $obj->GetMySubscribedMBlogs(123);
    	
        for($i=0;$i < $arry->count() ; $i++ )
        {
        
        ?>
       <div id="MBlogs">
       
       		<div  style="border-color: #999;border-width: 1px; width:100%;border-bottom-style:solid;  height:70px">
	       	<div class="fltlft" style="height:70px;width:70px;vertical-align: middle;">
	       		<img alt="" src="../Image/007.jpg"  style="height:48px;width:48px">
	       	</div>
	       	<div class="fltrt" style="height:50px;width:526px;  ">
		       	<div><span style="font-weight:bold;font-family:Helvetica;"> <?php $arry[$i]->$authorName ?> </span></div>	
		       	<div  style="font-family:Helvetica;"><?php $arry[$i]->$Content ?>  	</div>	
	       	</div>
	       	<div class="clearfloat"></div>
	       	
       </div>
       
       <div style="height: 10px;" ></div>
       <?php }?>
       
       </div>
       