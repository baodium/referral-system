<?php if(!isset($_SESSION['user_data'])){
header('location:'.$this->config->config['base_url']);
}

?>
<br/><br/><br/><br/><br/>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active" style="color:#fff">Change Password</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_full">
					 <div class="grid images_3_of_2">
						 <br/><br/>
							<div>
							<center><div style="width:50%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
			<?php echo validation_errors(); ?>
<?php echo isset($item)?form_open('users/changepass'):form_open('users/changepass')?>

    <label for="title"><h4>Current Password</h4></label>
    <input type="input" name="current_pass" class="form-control"  /><br />
	<label for="title"><h4>New Password</h4></label>
    <input type="password" name="newpass1" class="form-control" /><br />
    <label for="title"><h4>Retype new password</h4></label>
    <input type="password" name="newpass2" class="form-control" /><br />
<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_data']['id']; ?>">
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="change_pass" value="Submit" />
	</form>
</div>
</div>
</div></center><br/><br/>
							 
							</div>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				 
				  <div class="clearfix"></div>
				  				  					
		    </div>
			
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>

<br/><br/><br/>