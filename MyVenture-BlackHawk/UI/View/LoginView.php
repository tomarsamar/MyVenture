
<?php 

global $View_Data;

if($View_Data->error){
	
?>

<script type="text/javascript">

	alert(" <?php  echo $View_Data->erroMSG; ?> ");
	
</script>

<?php }?>

<form action="Home.php?Controlar=SignIn&action=login&Param=1" method="post">
	<div id="textBoxHolder" class="LoginBox-sdadsdsda">
	<h2>
		Sign In
	</h2>
	<label>
		<strong class="textboxLabel">Email Id </strong>
		<input type="text" id="txt_UserName" name="txt_UserName"  />
	</label>
	<label>
		<strong class="textboxLabel">Password </strong>
		<input type="password" id="txt_Pass" name="txt_Pass"  />
	</label>
	<input type="submit" id="btn_SignIn" value="Sign In"  />
	</div>
</form>

