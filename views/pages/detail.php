<?php if(!isset($product_detail)){
header($this->config->config['base_url']);
}
?>
<br/><br/><br/><br/><br/>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="../../home">Home</a></li>
			 <li class="active"><a>Detail</a></li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_left">
					 <div class="grid images_3_of_2">
						 
								<div href="optionallink.html" style="width:330px; background:#F3F3F3;  padding:15px 15px 35px 15px">
									<img class="etalage_thumb_image" style="width:300px; height:270px; " src="<?php echo $this->config->config['base_url']?>product_files/<?php echo $product_detail['file']; ?>" class="img-responsive" />
										<h3><center><?php echo strtoupper($product_detail['p_name']); ?></center></h3>	
											</div>
							
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				  <div class="single-right">
					 <h3><?php echo strtoupper($product_detail['p_name']); ?></h3>
					 <h5>Category: <?php 
					 $cat=$this->product_model->get_pcategory($product_detail['pcategory']);
					 //var_dump($cat);
					 echo strtoupper($cat['name']); 
					 ?></h5>
					 <!--
					  <div class="cost">
						 <div class="prdt-cost">
							 <ul style="margin-left:0px; padding:0px">
																 
								 <li class="active">Price:#<?php echo $product_detail['price']; ?></li>
								<li >Quantity:<input type="number" name="quantity" style="width:50px" value="1"  min="1" /></li>
								 <a href="#" class="btn btn-warning btn-effect">Add to cart</a>
							 </ul>
						 </div>
						
						 <div class="clearfix"></div>
					  </div>-->
					  
					  <div class="single-bottom1" >
						<h6 style="font-size:22px"><b>Details</b></h6>
						<p class="prod-desc" style="font-size:14px"><?php echo ucwords($product_detail['description']); ?></p>
					 </div>	
                      <div class="single-bottom1" >
						<h6 style="font-size:22px"><b>Outlets</b></h6>
						<p class="prod-desc" style="font-size:14px">
						<?php $outlets=explode(",",$product_detail['outlets']);
					    //var_dump($outlets);
						?>
						<?php if(count($poutlets>0)){ ?>
						<?php $i=1; foreach ($poutlets as $outlet){  ?>
						<p><h3 style="color:#EF5F21;"><?php echo $i;?>.<b><?php echo ucwords($outlet['name']);?></b></h3>
						<h3><b>Adrress:</b> <?php echo $outlet['address'];?></h3>
						<hr/>
						</p>
						<?php $i++; }}?>
						</p>
					 </div>						 
				  </div>
				  <div class="clearfix"></div>
				  				  					
		    </div>
			
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<br/><br/><br/>