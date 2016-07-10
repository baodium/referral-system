
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">News Detail</h1></div>
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
										<li><a href="javascript:void(0);">News detail</a></li>
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
									<div class="entry-media">
										<div class="entry-thumbnail">
											<img class="img-responsive" src="<?php echo $this->config->config['base_url']?>news_files/<?php echo $news_item['image']; ?>" width="760" height="320" alt="Foto">
										</div>
									</div>
									<div class="post-inner decor decor_mod-a clearfix">
									<?php $date=$news_item['date_added'];
									$date=explode(" ",$date);
									$date=explode("-",$date[0]);
									date_default_timezone_set('Africa/Lagos');
									//var_dump($date);
									?>
										<div class="box-date" style="padding-top:0px"><span class="number"><?php echo $date[2] ?></span><?php echo date('M', strtotime($date[1]. '01'));?><br/><?php echo $date[0] ?></div>
										<div class="entry-main">
			
											<h3 class="entry-title ui-title-inner"><?php echo $news_item['title']; ?></h3>
											<div class="entry-content">
											
												<p style="font-size:120%"> <?php echo $news_item['text'] ?></p>

												

												</div>
										</div>
										<div class="footer-panel">
											<i class="icon stroke icon-Tag"></i>
											
											<img src="<?php echo $this->config->config['base_url']?>/assets/img/share.jpg" height="20" width="91" alt="share">
										</div>
									</div>
								</article><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">

								<section class="widget widget-default widget_courses">
									<h3 class="widget-title ui-title-inner decor decor_mod-a">LATEST NEWS</h3>
									<div class="block_content">
										<ul class="list-courses list-unstyled">
										<?php rsort($news); $i=0; foreach ($news as $n_item): ?>
										<?php $i++; if($i<5){?>
											<li class="list-courses__item">
												<section>
													<div class="list-courses__img"><img class="img-responsive" src="<?php echo $this->config->config['base_url']?>news_files/<?php echo $n_item['image']; ?>" height="90" width="90" alt="foto"></div>
													<div class="list-courses__inner">
														<h4 class="list-courses__title"><a href="<?php echo $this->config->config['base_url']."news/".$n_item['slug'] ?>"><?php echo $n_item['title'] ?></a></h4>
														<div class="list-courses__meta"><?php echo $n_item['date_added'] ?></div>
														<div class="list-courses__price"><?php echo (strtolower(substr($n_item['text'],0,15)."...")) ?><br/><a href="<?php echo $this->config->config['base_url']."news/".$n_item['slug'] ?>">Read more</a></div>
													</div>
												</section>
											</li>
											<?php } ?>
										<?php endforeach ?>
											
										</ul>
									</div><!-- end block_content -->
								</section><!-- end widget -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->

