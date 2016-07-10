<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>

<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>assets/js/jscripts/tiny_mce/tiny_mce.js"></script>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
					
						</div>
                    </div><!-- end container-->
</div><!-- end wrap-title-page -->
<div class="section-breadcrumb" style="margin-bottom:5px">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i>&nbsp;Admin</a></li>
										<li><a href="<?php echo $this->config->config['base_url']?>myadmin/<?php echo  $title; ?>"><?php echo  $title; ?></a></li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->
				
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<main class="main-content">

								<article class="post post_mod-j clearfix" style="width:100%; background:#f7f7f7;padding-top:0px">
									
									<ul class="list-collapse list-unstyled">
                
                                    </ul>
	<section class="comment-reply-form">

<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
	<center><h3>ENTITLEMENT PROCESS FORM<br/>
	<?php //var_dump($item);?>
	</h3>
	(Please make sure the user has been given his entitlement before proceeding to submit this form)
	</center>
			<div class="col-md-12">
			<span style="text-align:left">
			<?php echo validation_errors(); ?>
			<p style="color:red"><?php if(isset($error)){ echo $error;} ?></p>
<?php echo isset($item)?form_open('myadmin/process_entitlement'):form_open('myadmin/process_entitlement')?>

    <label for="title"><h4>Full Name</h4></label>
    <input type="input" name="name" class="form-control" disabled value="<?php echo isset($item)?$item['name']:""; ?>" /><br />
	
	<label for="title"><h4>Entitlement Type</h4></label>
	 <input type="input" name="type" class="form-control" disabled  value="<?php echo isset($item)?$item['type']:""; ?>" />
	<input type="hidden" name="type" class="form-control" value="<?php echo isset($item)?$item['type']:""; ?>" /><br />
	
    <label for="title"><h4>Amount Category</h4></label>
	 <input type="input" name="name" class="form-control" disabled  value="<?php echo isset($item)?$item['amount_category']:""; ?>" /><br />
	
	 <label for="title"><h4>Entitlement Amount</h4></label>
	  <?php $amt=$this->users_model->get_acategory($item['amount_category']); //echo $amt['entitlement']*(floor($user_info['entitlement_count']/5)) ?>
	 <input type="input" name="name" class="form-control" disabled  value="<?php echo isset($item)?$amt['entitlement']*(floor($item['entitlement_count']/5)):""; ?>" /><br />
	<input type="hidden" name="entitlement_amount" value="<?php echo isset($item)?$amt['entitlement']*(floor($item['entitlement_count']/5)):""; ?>"  />
	
	<?php if(isset($item) && $item['type'] =="cash"){?>
	 <label for="title"><h4>Account Name</h4></label>
	 <input type="input" name="name" class="form-control" disabled  value="<?php echo isset($item)?$item['account_name']:""; ?>" /><br />
	
	 <label for="title"><h4>Account Number</h4></label>
	 <input type="input" name="name" class="form-control" disabled  value="<?php echo isset($item)?$item['account_number']:""; ?>" /><br />
	
	 <label for="title"><h4>Bank Name</h4></label>
	 <input type="input" name="name" class="form-control" disabled  value="<?php echo isset($item)?$item['bank_name']:""; ?>" /><br />
	
	<?php }else{ ?>
	<label for="title"><h4>Product(s) Category</h4></label>
    <input type="input" disabled name="products" class="form-control" value="<?php echo isset($item)?$item['product_category']:""; ?>" /><br />
	
	<label for="title"><h4>Products worth(price)</h4></label>
    <input type="number" min="1" name="price" class="form-control" disabled value="<?php echo isset($item)?$amt['entitlement']*(floor($item['entitlement_count']/5)):""; ?>" /><br />
	<input type="hidden" min="1" name="price" class="form-control" value="<?php echo isset($item)?$amt['entitlement']*(floor($item['entitlement_count']/5)):""; ?>" />
	
	
	<label for="title"><h4>Products (seperate by comma if more than one)</h4></label>
    <input type="input"  name="products" class="form-control" value="" /><br />
	
	<label for="title"><h4>Product outlet</h4></label>
    <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select class="form-control" name="outlets[]">
			<option > --select--</option>
            </select>
            <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
		<?php 
		if(isset($item['outlets'])){
		//var_dump($outlets[0]);
         $outlets=$item['outlets'];
        
		  ?>
		   <?php foreach($outlets as $outlet){ ?>
            <label for="one"><input type="checkbox" name="outlets[]"  value="<?php echo $outlet['name']; ?>" id="one"/><?php echo $outlet['name']; ?></label>
          <?php  } 
		  }
		  ?>
        </div>
    </div>
	<?php } ?>

	<?php date_default_timezone_set('Africa/Lagos'); ?><br/>
	<label for="title"><h4>Date Collected</h4></label>
	<?php 
	$date="";
	if (isset($item)){
   $date=explode(" ",$item['date']);
   $date=explode("/",$date[0]);
   $date[1]=strlen($date[1]>1)?$date[1]:"0".$date[1];
   $date[2]=strlen($date[2]>1)?$date[2]:"0".$date[2];
   $date=$date[2]."-".$date[1]."-".$date[0];
     }	
	//echo $date;
	?>
    <input type="date" name="date_collected" class="form-control"  max="<?php echo date("Y-m-d")?>" min="<?php echo $date; ?>" /><br />
	
	
	<?php if(isset($item)){ ?>
   <input type="hidden" name="request_id" value="<?php echo $item['request_id']; ?>" />
      <input type="hidden" name="user_id" value="<?php echo $item['user_id']; ?>" />
   <?php } ?>
   <label for="title"><h4>Remark</h4></label>
	<textarea name="remark" class="form-control" placeholder=""  >
	</textarea><br/>
   <input type="checkbox" name="status" value="approve">Approve Entitlement
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="process_now" value="<?php echo isset($item)?"Process":"Submit"; ?>" /><a href="<?php echo $this->config->config['base_url']?>entitlement_requests" style="float:right; margin-right:20px;" class="btn btn-danger btn-effect" >Cancel</a>
	</form>
</div>
</div>
</div>
</section>


								
								</article><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


				
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
