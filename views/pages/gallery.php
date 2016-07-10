<br/><br/><br/><br/>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"></div>
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
										<li><a href="javascript:void(0);"><?php echo $title?></a></li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->
<br/><br/>
<div class="container">
<?php if(count($gallery)<1){?>
							 <br/>
							 <center><h2>No event at the moment</h2></center>
							 <br/>
							  <br/>
							  <br/>
							  <br/>
<?php } ?>
							 
					<div class="row">
						<div class="col-md-8">
							<main class="main-content">
                            <?php foreach($gallery as $gal){?>
								<article class="post post_mod-j clearfix" style="border-bottom:1px solid #ccc; ">
									<div class="entry-media">
										<div class="entry-thumbnail">
											<img class="img-responsive" src="<?php echo $this->config->config['base_url']?>gallery_files/<?php echo $gal['image']; ?>"  alt="Foto">
										   <h3 class="entry-title ui-title-inner"><?php echo $gal['title']; ?> (<?php echo $gal['date_added']; ?>)</h3>
										</div>
									</div>
									
								</article><!-- end post -->
								<hr style="width:100%; background:#000" noshade /><br/>
                             <?php } ?>
							 
							</main><!-- end main-content -->
                         
						</div><!-- end col -->


						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">


							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->

