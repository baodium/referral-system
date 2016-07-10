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

								<section class="comment-reply-form">
									
									<div class="post decor decor_mod-a clearfix">
									<?php if($page_info!=null){ ?>
										<?php echo $page_info['body']?>
									<?php } ?>									
									</div>
								</section><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						<div class="col-md-4">
							<aside class="sidebar sidebar_mod-a">

								


							<aside class="sidebar sidebar_mod-a">
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

							</aside><!-- end sidebar -->

							</aside><!-- end sidebar -->
						</div><!-- end col -->
					</div><!-- end row -->
				</div><!-- end container -->

