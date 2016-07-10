<?php if(!isset($_SESSION['user_data'])){
header('location:'.$this->config->config['base_url']);
}
?>
<br/><br/><br/><br/><br/>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active" style="color:#fff">Dashboard</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 <?php 
						 $detail=$this->users_model->get_user($_SESSION['user_data']['id']);
						 if(empty($detail)){
						 header('location:'.$this->config->config['base_url']);
						 }
						 //var_dump();
						 //var_dump($detail['id']); exit;
						 $referral_history=$this->users_model->get_referrals($detail['id']);
						 //var_dump($referral_history);
	                     $entitlement_history=$this->users_model->get_entitlements($detail['id']);
						 ?>
								<a href="optionallink.html">
									<img class="etalage_thumb_image" src="<?php echo $this->config->config['base_url']?>assets/images/avatar3.png" class="img-responsive" />
									<!--<input type="file" name="file" value ="Change"/>-->
							</a>
							<div>
							<table>
							<tr>
							<td><h5>Fullname:</h5></td><td colspan="2"><h5><?php echo $detail['name']?></h5></td>
							</tr>
							<tr>
							<td><h5>Email:</h5></td><td colspan="2"><h5><?php echo $detail['email']?> </h5></td>
							</tr>
							<tr>
							<td><h5>Phone Number:</h5></td><td colspan="2"><h5><?php echo $detail['phone_number']?> </h5></td>
							</tr>
							<tr>
							<td><h5>Amount category:</h5></td><td colspan="2"><h5>
							<?php 
							$a_cat=$this->users_model->get_acategory($detail['amount_category']);
                            echo $a_cat['acat_name'];
							//echo $detail['amount_category']
							?></h5></td>
							</tr>
							<tr>
							<td><h5>Referral ID:</h5></td><td colspan="2"><h5><?php echo $detail['referral_id']?></h5></td>
							</tr>
							<tr>
							<td><h5>Referred By :</h5></td><td colspan="2"><h5><?php echo $detail['referred_by']?>[<?php echo $this->users_model->get_referral_name($detail['referred_by']);?>]</h5></td>
							</tr>
							<tr>
							<td><h5>Total Referral:</h5></td><td ><h5><?php echo $detail['number_of_referral']?></h5></td><td></td>
							</tr>
							<tr>
							<td><h5>Entitlement Worthy Referrals:</h5></td><td ><h5>
							<?php 
							echo $detail['entitlement_count']?></h5></td><td>
							<?php 
							$pending=$this->users_model->is_referral_pending($detail['id']);
						    $req=5;
							if($detail['extended_reg']=="1")
							$req=6;
						
							if($detail['entitlement_count']>=$req){ ?>
							<a href="<?php echo $this->config->config['base_url']?>entitlement_request" style="margin-left:20px" <?php if($pending){ ?> disabled <?php } ?>class="btn btn-success btn-effect"><?php if($pending){ ?> Request pending  ... <?php }else{ ?>Claim Entitlement<?php } ?></a>
							<?php } ?></td>
							</tr>
							<tr>
							<td><h5>Date Registered:</h5></td><td colspan="2"><h5><?php echo $detail['date_added']?></h5></td>
							</tr>
							<tr>
							<td><h5><a style="color:blue" href="<?php echo $this->config->config['base_url']?>changepass" >Change Password</a></h5></td><td colspan="2"></td>
							
							</tr>
							
							</table>
							 
							</div>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3></h3>
					 
					  <div class="single-bottom1">
						<h6>Entitlement History</h6>
						<?php 
						//var_dump($referral_history);
						if(count($entitlement_history)>0){
						$i=1;
						?>
						<table style="width:100%">
						<tr style="border-bottom:1px solid purple; margin-bottom:10px " ><th>SN</th><th>PRODUCTS</th><th>OUTLET</th><th>PRODUCT WORTH</th><th>DATE COLLECTED</th></tr>
						<?php 
						foreach($entitlement_history as $ref){
						?>
						<tr style="border-bottom:1px solid #ccc; "><td><?php echo $i; ?></td><td><?php echo $ref['products']; ?></td><td><?php echo $ref['outlets']; ?></td><td><?php echo $ref['price']; ?></td><td><?php echo $ref['date_collected']; ?></td></tr>
						<?php $i++; } ?>
                       </table>
					<?php }else{?>
						<p class="prod-desc" style="font-size:14px">Non</p>
						<?php } ?>
					 </div>	
					  
					  <div class="single-bottom1">
						<h6>Referral History</h6>
						<?php 
						//var_dump($referral_history);
						if(count($referral_history)>0){
						$i=1;
						?>
						<table style="width:100%">
						<tr style="border-bottom:1px solid purple; margin-bottom:10px " ><th>SN</th><th>NAME</th><th>DATE JOINED</th></tr>
						<?php 
						foreach($referral_history as $ref){
						?>
						<tr style="border-bottom:1px solid #ccc; "><td><?php echo $i; ?></td><td><?php echo $ref['name']; ?></td><td><?php echo $ref['date_added']; ?></td></tr>
						
						<?php $i++; } ?>
                       </table>
					<?php }else{?>
						<p class="prod-desc" style="font-size:14px">Non</p>
						<?php } ?>
					 </div>	
                     					 
				  </div>
				  <div class="clearfix"></div>
				  				  					
		    </div>
			
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>

<br/><br/><br/>