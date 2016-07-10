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
<?php //var_dump($item);?>
								<article class="post post_mod-j clearfix" style="width:100%; background:#f7f7f7;padding-top:0px">
									
									<ul class="list-collapse list-unstyled">
                
                                    </ul>
	<section class="comment-reply-form">

<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
			<?php echo validation_errors(); ?>
<?php echo isset($item)?form_open('myadmin/add_user'):form_open('myadmin/add_user')?>

    <label for="title"><h4>Full Name</h4></label>
    <input type="input" name="name" class="form-control" value="<?php echo isset($item)?$item['name']:""; ?>" /><br />
	<label for="title"><h4>Email</h4></label>
    <input type="input" name="email" class="form-control" value="<?php echo isset($item)?$item['email']:""; ?>" /><br />
    <label for="title"><h4>Phone number</h4></label>
    <input type="number" name="phone_number" class="form-control" value="<?php echo isset($item)?$item['phone_number']:""; ?>" /><br />
    <label for="title"><h4>Amount Category</h4></label>
	<select name="amount_category" class="form-control" >
	<?php foreach($acat as $cat){?>
	<option value="<?php echo $cat['acat_id']?>"> <?php echo $cat['acat_name']?></option>
	<?php } ?>
	</select><br />
	<label for="title"><h4>Referred By</h4></label>
    <input type="input" name="referred_by" class="form-control" placeholder="please provide the referral id of your referral" value="<?php echo isset($item)?$item['referred_by']:"u111j7373"; ?>" /><br />
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <input type="hidden" name="referral_id" value="<?php echo $item['referral_id']; ?>" />
   <?php } ?>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="<?php echo isset($item)?"save_user":"add_user"; ?>" value="<?php echo isset($item)?"Save":"Submit"; ?>" />
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


				
				
