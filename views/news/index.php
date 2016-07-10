<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page"><?php echo $title ?></h1></div>
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
										<li><a href="javascript:void(0);"><?php echo $title;?></a></li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->

<div class="container">
					<div class="row">
						<div class="col-md-8">
							<main class="main-content">

								<article class="post post_mod-j clearfix">
									
									<section class="widget widget-default widget_courses" style="width:100%">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">LATEST NEWS</h3>
									<div class="block_content">
										<ul class="list-courses list-unstyled">
										<?php rsort($news); $i=0; foreach ($news as $n_item): ?>
										
											<li class="list-courses__item">
												<section>
													<div class="list-courses__img"><img class="img-responsive" src="<?php echo $this->config->config['base_url']?>news_files/<?php echo $n_item['image']; ?>" height="90" width="90" alt="foto"></div>
													<div class="list-courses__inner">
														<h4 class="list-courses__title"><a href="<?php echo $this->config->config['base_url']."news/".$n_item['slug'] ?>"><?php echo $n_item['title'] ?></a></h4>
														<div class="list-courses__meta"><?php echo $n_item['date_added'] ?></div>
														<div class="list-courses__price"><?php echo (strtolower(substr($n_item['text'],0,100)."...")) ?><br/><a href="<?php echo $this->config->config['base_url']."news/".$n_item['slug'] ?>">Read more</a></div>
													</div>
												</section>
											</li>
											
										<?php endforeach ?>
											
										</ul>
									</div><!-- end block_content -->
								</section><!-- end widget -->
								</article><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						<div class="col-md-4">
								
 

							<aside class="sidebar sidebar_mod-b">


								<section class="widget widget-default widget_courses" style="border-top-color:red">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">Quick Links</h3>
					<ul style="list-style:none; padding:0px">
					 <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>prend" style="">Pre-ND application form</a></h4></li>
					 <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>postutme" >Post UTME application form</a></h4></li>
					  <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>admission" >Admissions</a></h4></li>
					  <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>gallery" >Event gallery</a></h4></li>
					 
					  <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>news" >Latest News</a></h4></li>
					   <li><h4 class=""><a href="<?php echo $this->config->config['base_url']?>about" >About Us</a></h4></li>
					  
                   	</ul>		
								
								</section><!-- end widget -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->

