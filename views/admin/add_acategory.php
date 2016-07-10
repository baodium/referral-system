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
										<li><a href="<?php echo $this->config->config['base_url']?>myadmin/pages"><?php echo $title?></a></li>
										
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
							<br/><br/><center><h3>Amount Category Form</h3>
							<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
							<div class="row">
								<div class="col-md-12">
									<span style="text-align:left">
									<?php echo validation_errors(); ?>
								<?php echo isset($item)?form_open('myadmin/add_acategory'):form_open('myadmin/add_acategory')?>
							<label for="title"><h4>Amount category name </h4></label>
							<input type="input" name="acat_name" class="form-control" value="<?php echo isset($item)?$item['acat_name']:""; ?>" /><br />
							<label for="title"><h4>Amount </h4></label>
							<input type="number" name="price" class="form-control" min="10" value="<?php echo isset($item)?$item['price']:""; ?>" /><br />	
							<label for="title"><h4>Entitlement </h4></label>
							<input type="number" name="entitlement" class="form-control" min="10" value="<?php echo isset($item)?$item['entitlement']:""; ?>" /><br />	
							
							
							<?php if(isset($item)){ ?>
							<input type="hidden" name="acat_id" value="<?php echo $item['acat_id']; ?>" />
							<?php } ?>
							<input type="submit" style="float:right" class="btn btn-primary btn-effect" name="<?php echo isset($item)?"save_acategory":"add_acategory"; ?>" value="<?php echo isset($item)?"Save":"Submit"; ?>" />
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