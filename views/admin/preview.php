<?php 
if(!isset($_SESSION['admin'])){
header('location:login');
} ?>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">Page Preview</h1></div>
						</div>
                    </div><!-- end container-->
</div><!-- end wrap-title-page -->

				<div class="section-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i>&nbsp;Home</a></li>
										<li><a href="javascript:void(0);"><?php echo $title; ?></a></li>
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

								
									
									
										<center><h1 ><?php echo $body; ?></h1></center>
									
								<br/><br/><br/><br/><br/>

							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


