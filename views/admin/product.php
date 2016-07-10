<?php if(!isset($_SESSION['admin'])){
header('location:'.$this->config->config['base_url'].'myadmin/login');
} 

?>


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
									<ol class="breadcrumb" >
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i>&nbsp;Admin</a></li>
										<li><a href="javascript:void(0);"><?php echo $title?></a></li>
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

								<article class="post post_mod-j clearfix" style="width:100%;padding-top:0px">
									
									<ul class="list-collapse list-unstyled">
                
                                    </ul><br/><br/>
<section class="comment-reply-form">
<center><div style=" font-size:14px;  border-radius:5px" >	
<a href="add_product" style="float:left; margin-right:5px" class="btn btn-primary btn-effect">Add new product</a><br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Product Name</th>
<th>Category</th>
<th>Product Price</th>
<th>Product Description</th>
<th>Outlets</th>
<th>Image</th>
<th>Date Added</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<tr>
<th>&nbsp;</th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<?php 
//var_dump($pages);
if(isset($products) && $products !=null){

$records_per_page = 15;
require 'zebra/Zebra_Pagination.php';
$pagination = new Zebra_Pagination();
$pagination->records(count($products));
$pagination->records_per_page($records_per_page);
if($products!=NULL){
$products = array_slice(
    $products,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);
}
$i=0;
foreach($products as $product){
$i++;
?>

<form action="<?php echo $this->config->config['base_url']?>myadmin/add_product" method="post" name="product_form" >
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i ?><input type="hidden" name="id" value="<?php echo $product['id'] ?>" /></td>
<td><?php echo $product['p_name'] ?></td>
<td><?php echo $product['pcategory'] ?></td>
<td><?php echo $product['price'] ?></td>
<td><?php echo $product['description'] ?></td>
<td><?php $out= $this->outlet_model->get_outlet($product['outlets']); echo $out['name'] ;?></td>
<td><img src="<?php echo $this->config->config['base_url']."product_files/".$product['file'] ?>" width="150px" height="100px" /></td>
<td><?php echo $product['date_added'] ?></td>
<td><input type="submit" name="edit" style="margin-top:10px" class="btn btn-warning btn-effect" value="Edit" /><br/><br/></td>
<td><input type="submit" name="delete" style="margin-top:10px" class="btn btn-primary btn-effect" onclick="return checkDelete('product_form');" value="Delete" /><br/><br/></td>

</tr>

</form>
<?php 
}
}
?>
</table>
<br/>
<?php
// render the pagination links
$pagination->render();

?>

								
								</article><!-- end post -->
								</div>
								</section>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


				
				
