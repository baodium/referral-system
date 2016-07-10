<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
<title>Fourfold Integrated Services</title>
<meta name="description" content="Connection" />

	<link href="<?php echo $this->config->config['base_url']?>/assets/favicon.ico" type="image/x-icon" rel="shortcut icon">

 <link href="<?php echo $this->config->config['base_url']?>/assets/css/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--  Animation Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/animate.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/prettyPhoto.css" rel="stylesheet" />
	 <link href="<?php echo $this->config->config['base_url']?>/assets/css/memenu.css" rel="stylesheet" />
    <!--  Google Font Style -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <!--  Custom Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/style.css" rel="stylesheet" />
<link href="<?php echo $this->config->config['base_url']?>/assets/css/memenu.css" rel="stylesheet" type="text/css" media="all" />

<!--<link href="assets/css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />-->
<link href="<?php echo $this->config->config['base_url']?>/assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />

<script src="<?php echo $this->config->config['base_url']?>/assets/js/jquery.min.js"></script>

</head>

<body>
<!-- Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- Loader end -->
<div class="layout-theme animated-css"  data-header="sticky" data-header-top="200">   
  <div id="wrapper"> 
    
    <!-- HEADER -->

    <!-- end header -->
	<div class="main-content">
	<div class="">
			<br/><br/><br/>	<br/>	<!-- end container-->
      </div><!-- end wrap-title-page -->

		<div class="section-breadcrumb" style="margin-bottom:5px">
					<div class="container">
					
						<div class="row">
						
							<div class="col-xs-12">
							
								<div class="">
								<center><a  href="javascript:void(0);"><img  src="<?php echo $this->config->config['base_url']?>/assets/images/site2.png" height="100px" width="200px" alt="Logo"></a></center>
									<br/>
										<section class="comment-reply-form" style="margin-top:0px">
									<center><div style="width:50%;  border:1px solid #ccc; padding:20px; font-size:14px; background:#f7f7f7; border-radius:5px" >
									<h3>ADMIN LOGIN</h3>
                                    <?php echo "<span style='color:red'>".validation_errors()."</span>"; ?>
									<?php if(isset($done)){ ?><p class="red" style="color:red; font-size:14px"><?php echo $title; ?><?php } ?></p>
                                   <?php echo form_open('myadmin/login') ?>
									
										<div class="row">
											<div class="col-md-12">
												<span style="text-align:left">
												<h3>Username <span style="color:red">*</span></h3>
												<input id="comment-author" type="text" placeholder="" required name="username" value="<?php echo isset($username)?$username:''?>" class="form-control">
												</span>
												<span style="text-align:left">
												<h3>Password <span style="color:red">*</span></h3>
												<input id="comment-author" type="password" placeholder="" required name="password" value="" class="form-control">
												</span>
												
											</div>
											
										</div><!-- end row -->
										<br/>
										<div class="row">
											<div class="col-xs-12">
											 <input type="submit"  style="float:right" name="submit" class="btn btn-warning btn-effect" style="" value="LOGIN" />
												
											</div>
										</div><!-- end row -->
									</form></div>
									</center>
								</section>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->

    </div>
	
  </div>
  <!-- end wrapper --> 
</div>
<!-- end layout-theme --> 

	
    <!--./ FOOTER SECTION END -->
    <!--  Jquery Core Script -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/bootstrap.js"></script>
     <!--  WOW Script -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/wow.min.js"></script>
    <!--  Scrolling Script -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/jquery.easing.min.js"></script>
    <!--  PrettyPhoto Script -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/jquery.prettyPhoto.js"></script>
    <!--  Custom Scripts -->
    <script src="<?php echo $this->config->config['base_url']?>/assets/js/custom.js"></script>
   
</body>
</html>
