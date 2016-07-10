   <!--./ NAV BAR END -->
   
    <div id="home" >
        <div class="overlay">
            <div class="container">			
                <div class="row ">
				
				
				
                    <div class="col-lg-9 col-md-9 head-text">
                       
						  <div class="col-lg-12 col-md-12 wow bounceInDown animated" style="padding: 10px;" data-wow-delay="0.6s"    >
                    <div id="carousel-slider" class="carousel slide" data-ride="carousel">

                        <div class="carousel-inner">
                            <div class="item">
							<h1 id="divDisp" style="color:#fff"  >GET ATTRACTIVE CASH & PRODUCT ENTITLEMENTS</h1>
						<br/>
						 <span  >
                            <i class="fa fa-lightbulb-o " ></i>Joint with initial deposit category
                        </span>
                         <span  >
                            <i class="fa fa-lightbulb-o " ></i>Get up to x4 worth of cash or product
                        </span>
                       
                        
                        
                      
                            </div>
                         <div class="item active">
                             <h1 id="divDisp" style="color:#fff">GROW YOUR NETWORK & INCREASE YOUR ENTITLEMENTS</h1>
						<br/>
                        
						<span >
                            <i class="fa fa-lightbulb-o" ></i>Every 5 referrals earns you surprising entitlements
                        </span>
                        <span >
                            <i class="fa fa-lightbulb-o" ></i>Increase your referral and get even more entitlements
                        </span>
                       
                        </div>
						<div class="item">
							<h1 id="divDisp" style="color:#fff"  >REGISTER YOUR OUTLET FOR MILLIONS OF PEOPLE TO SEE</h1>
						<br/>
                             <span >
                            <i class="fa fa-lightbulb-o" ></i>Fourfold Integrated Resources provides one shop for various products
                        </span>  
                        <span >
                            <i class="fa fa-lightbulb-o" ></i>Make your products widely known
                        </span>
                       
                            </div>
                       
                        </div>
                        <!--INDICATORS--><br/><br/>
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-slider" data-slide-to="0" class=""></li>
                            <li data-target="#carousel-slider" data-slide-to="1" class=""></li>
                            <li data-target="#carousel-slider" data-slide-to="2" class="active"></li>
                        </ol>

                    </div>
                </div>
				
				
                      
                    </div>
				<?php if(!isset($_SESSION['user_data'])){?>	
                    <div class="col-lg-3 col-md-3">
                        <div class="div-trans text-center">					
                   <?php echo form_open('user_login')?>
                            <h3>LOGIN </h3>
                            <?php echo validation_errors(); ?>
								<?php if(isset($error)){?>
								<?php echo "<span style='color:red'>*".$error."</span>"?>
								<?php } ?>
                            <div class="col-lg-12 col-md-12 col-sm-12" >

                           
                                <div class="form-group">
                                    <input type="text" class="form-control" name="referral_id" required="required" placeholder="Membership/Referral ID">
                                </div>
                               <div class="form-group">
                                    <select class="form-control" required="required" name="amount_category" placeholder="amount category">
						
									<?php foreach($amount_category as $category){ ?>
									<option value="<?php echo $category['acat_id'] ?>" style="color:#000"><?php echo $category['acat_name'] ?></option>
									<?php } ?>
									</select>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" required="required" placeholder="Password">
                                </div>
								
                                <div class="form-group">
                                    <input type="submit"  class="btn btn-primary btn-effect btn-block btn-lg" name="login"  value="LOGIN">
                                </div>
								<h5>No account? read <a href="<?php echo $this->config->config['base_url']?>about#join" style="color:#428bca">this instruction</a> on how to become a member</h5>
								
								
                             </div>
                      </form>
                        </div>
                    </div>
					<?php }?>
                </div>

            </div>

        </div>


    </div>
	
	
	
	
		<div class="recommendation">
	 <div class="container">
		 <div class="recmnd-head">
			 <center><h2 style="border-bottom:1px solid #ccc; padding:5px "><b>JOIN US</b></h2></center>
		 </div>
		 
		 <div class="bikes-grids">			 
			 <ul id="flexiselDemo1">
				 <li>
					 <a ><img src="<?php echo $this->config->config['base_url']?>/assets/images/step1.png" alt=""/></a>	
					<h4>Register</h4>
					<p style="font-size:14px">Click <a href="<?php echo $this->config->config['base_url']?>about#join" style="color:blue">here</a> to register</p>
				 </li>
				 <li>
					 <a ><img src="<?php echo $this->config->config['base_url']?>/assets/images/step2.png" alt=""/></a>		
					<h4>Grow your network  </h4>
					 <p style="font-size:14px">Send your referral Id to friends and family</p>
				
				 </li>
				 <li>
					  <a ><img src="<?php echo $this->config->config['base_url']?>/assets/images/step3.png" alt=""/></a>	
					 <h4>Claim your entitlement</h4>	
					 <p style="font-size:14px">Various products are available for grab!</p>
				 </li>
			
		    </ul>
			<script type="text/javascript">
			 $(window).load(function() {			
			  $("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 10000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover:true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: { 
					portrait: { 
						changePoint:480,
						visibleItems: 1
					}, 
					landscape: { 
						changePoint:640,
						visibleItems: 2
					},
					tablet: { 
						changePoint:768,
						visibleItems: 3
					}
				}
			});
			});
			</script>
			<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>/assets/js/jquery.flexisel.js"></script>			 
	 </div>
	 </div>
</div>
	
	
	
	
    <!--./ HOME SECTION END -->
  
    <!--./ ABOUT SECTION END -->
 
    <!--./ DONARS TESTIMONIALS END -->
    <div id="port-folio" class="pad-top-botm" >
        <div class="container">
            <div class="row text-center ">
                <div class="recmnd-head">
			    <h2><b>AVAILABLE PRODUCTS</b></h2>
		        </div>
            </div>

            <div class="row " >
			<?php $i=0; foreach($products as $product){
			if($i<4){
			?>
                <div class="col-lg-3 col-md-3 col-sm-3 " style="background:#fff; margin:0px; border-right:1px solid #ccc; margin-bottom:10px">
<br/>
                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                        <img src="<?php echo $this->config->config['base_url']."/product_files/".$product['file']?>" style="width:350px; height:200px" class="img-responsive " alt="" />
					
                        <div class="overlay">
                            <p>
                                <?php echo strtoupper($product['p_name'])?>
                            </p>
                            <a class="preview  " title="<?php echo strtoupper($product['p_name'])?>" href="<?php echo $this->config->config['base_url']."/product_files/".$product['file']?>"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
					<div><center>
					<b><?php echo strtoupper($product['p_name'])?></b><br/>
					Price:#<?php echo $product['price']?><br/>
					<a href="<?php echo $this->config->config['base_url']?>detail/<?php echo $product['slug']?>"  class="btn btn-warning btn-effect "  >View Detail</a>
					</center><br/></div>
                </div>
			<?php  $i++; }} ?>
            </div>
<br/><br/>
      <center><h3><a href="<?php echo $this->config->config['base_url']?>products" style="color:#428bca">More products</a></h3></center>
        </div>
    </div>	