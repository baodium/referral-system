   <!--./ NAV BAR END -->
	
    <!--./ HOME SECTION END -->
  
    <!--./ ABOUT SECTION END -->
 
    <!--./ DONARS TESTIMONIALS END --><br/><br/>
    <div id="port-folio" class="pad-top-botm" style="background:#fff" >
        <div class="container">
		<ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active"><a><?php echo $title; ?></a></li>
		 </ol>
            <div class="row text-center ">
              <div class="top-sellers">
			    <h3><?php echo $category?></h3>
		        </div>
            </div>

		
            <div class="row ">
			<?php 
	
			foreach($products as $product){
			?>
                <div class="col-lg-3 col-md-3 col-sm-3 " style="background:#efefef; margin:0px; border-right:1px solid #ccc; margin-bottom:10px">
<br/>
                    <div class="portfolio-item wow rotateIn animated" data-wow-delay="0.4s">
                        <img src="<?php echo $this->config->config['base_url']."/product_files/".$product['file']?>" style="width:300px; height:200px" class="img-responsive " alt="" />
					
                        <div class="overlay">
                            <p>
                                <?php echo strtoupper($product['p_name'])?>
                            </p>
                            <a class="preview  " title="Image Title Here" href="<?php echo $this->config->config['base_url']."/product_files/".$product['file']?>"><i class="fa fa-search-plus fa-5x"></i></a>

                        </div>
                    </div>
					<div><center>
					<b><?php echo strtoupper($product['p_name'])?></b><br/>
					Price:#<?php echo $product['price']?><br/>
					<a href="<?php echo $this->config->config['base_url']?>detail/<?php echo $product['slug']?>" class="btn btn-warning btn-effect" >View Detail</a>
					</center><br/></div>
                </div>
			
            <?php } ?>
			<?php if(count($products)<1){?>
			<center><h2>No product under this category</h2></center>
			<?php } ?>
            </div>

        </div>
    </div>

<br/><br/>