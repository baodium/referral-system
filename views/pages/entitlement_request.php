<?php if(!isset($_SESSION['user_data'])){
header('location:'.$this->config->config['base_url']);
}
?>
<br/><br/><br/><br/><br/>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active" style="color:#fff">Entitlement Request Form</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_full">
					 <div class="grid images_3_of_2">
						 <br/>
						 <center><h3 class="entry-title ui-title-">ENTITLEMENT REQUEST FORM</h3></center>
						 <br/>
							<div>
							<center><div style="width:70%;  border:1px solid #ccc; padding:40px; font-size:14px;  border-radius:5px" >						
	<div class="row">
	
			<div class="col-md-12">
			<span style="text-align:left">
			
<?php if(!isset($_POST['next_pag'])){?>
<form name="request_form" action="" method="post" >
	<label for="title"><h4>Which type of entitlement would you prefer?</h4></label>
    <select class="form-control" name="type">
	<option value="cash">Cash Entitlement</option>
	<option value="product">Product Entitlement</option>
    </select>
	<br/>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="next_pag" value="Continue" />
	</form>
<?php } else{
$type=$_POST['type'];
?>			
			
			
			<?php echo validation_errors(); ?>
           <?php if(isset($error)){ echo '<span style="color:red">* '.$error.'</span>' ; }?>
<form name="request_form" action="<?php echo isset($item)?'request_entitlement':'request_entitlement'?>" method="post" >

    <label for="title"><h4>Name</h4></label>
    <input type="input" name="name" value="<?php echo ucwords($_SESSION['user_data']['name'])?>" disabled class="form-control"  />
	<label for="title"><h4>Amount Category</h4></label>
    <input type="input" name="name" value="<?php 
		$a_cat=$this->users_model->get_acategory($_SESSION['user_data']['amount_category']);
        echo $a_cat['acat_name'];
	//echo ucwords($_SESSION['user_data']['amount_category'])
	?>"  disabled class="form-control"  />
	<label for="title"><h4>Membership/Referral ID</h4></label>
    <input type="input" name="name" class="form-control" disabled value="<?php echo ucwords($_SESSION['user_data']['referral_id'])?>"  />
		<input type="hidden" name="type" value="<?php echo $type; ?>" class="form-control"  />
		<label for="title"><h4>Entitlement Worth</h4></label>
    <input type="input" name="name" class="form-control" disabled value="N<?php $amt=$this->users_model->get_acategory($_SESSION['user_data']['amount_category']); echo $amt['entitlement']*(floor($_SESSION['user_data']['entitlement_count']/5)) ?>"  />
	
	<?php if($type=="cash"){?>
	<label for="title"><h4>Account Name</h4></label>
    <input type="input" name="account_name" class="form-control"  />
	<label for="title"><h4>Account Number</h4></label>
    <input type="number" name="account_number" class="form-control" min="0"  />
	<label for="title"><h4>Bank Name</h4></label>
    <input type="text" name="bank_name" class="form-control"   />
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_data']['id'] ?>" class="form-control"  />
		<input type="hidden" name="next_pag" value="yes" class="form-control"  />
	<?php }else{?>
	<input type="hidden" name="type" value="<?php echo $type ?>" />
	<label for="title"><h4>Product Category(Select the type of product(s) you want)</h4></label>
    <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select class="form-control" name="product_category[]">
            </select>
            <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
		<?php 
         
         $cat=(isset($item))?$item['product_category']:"";
		 $cat=explode(",",$cat);
		 //var_dump($cat);
		  ?>
		  <?php foreach($product_category as $pcat){
			//$pcats=explode(",",$pcat["name"]);
		  ?>
		  
            <label for="one"><input type="checkbox" name="product_category[]" <?php if(isset($item) && in_array($pcat['name'],$cat)){ ?> checked <?php } ?> value="<?php echo $pcat['name']; ?>" id="one"/><?php echo $pcat['name']; ?></label>
          <?php  } ?>
		</div>
    </div>
	<label for="title"><h4>Preferred Outlet</h4></label>
	<?php $outlete=$this->outlet_model->get_outlet();?>
	 <select class="form-control"  class="form-control" name="outlet">
	 <?php 
	 foreach($outlete as $outlet){
	 ?>
	 <option value="<?php echo $outlet['id']?>"><?php echo $outlet['name']?></option>
	 <?php } ?>
    </select>
	<label for="title"><h4>Description(briefly describe the product or your preferred outlet)</h4></label>
	<textarea name="description" class="form-control" placeholder=""  >
	</textarea>
	<input type="hidden" name="user_id" value="<?php echo $_SESSION['user_data']['id'] ?>" class="form-control"  />
    <input type="hidden" name="next_pag" value="yes" class="form-control"  />
    <?php } ?>
	<br/><br/>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="request_now" value="Submit Request" /><a href="<?php echo $this->config->config['base_url']?>dashboard" style="float:right; margin-right:20px;" class="btn btn-danger btn-effect" >Cancel Request</a>
	</form>
	<?php } ?>
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
<script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>		
<br/><br/><br/>