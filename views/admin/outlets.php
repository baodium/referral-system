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
<a href="add_outlet" style="float:left; margin-right:5px" class="btn btn-primary btn-effect">Add new outlet</a><br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th style="width:15%">Outlet Name</th>
<th>Email</th>
<th>Phone number</th>
<th>Product Category</th>
<th style="width:25%">Address</th>
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
if(isset($outlets) && $outlets !=null){
$i=0;
foreach($outlets as $outlet){
$i++;
?>
<?php echo form_open('myadmin/add_outlet') ?>
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i ?><input type="hidden" name="id" value="<?php echo $outlet['id'] ?>" /></td>
<td><?php echo $outlet['name'] ?></td>
<td><?php echo $outlet['email'] ?></td>
<td><?php echo $outlet['phone_number'] ?></td>
<td><?php echo $outlet['product_category'] ?></td>
<td><?php echo $outlet['address'] ?></td>
<td><input type="submit" name="edit" style="margin-top:10px" class="btn btn-warning btn-effect" value="Edit" /><br/><br/></td>
<td><input type="submit" name="delete" disabled style="margin-top:10px" class="btn btn-primary btn-effect" value="Delete" /><br/><br/></td>

</tr>

</form><br/>
<?php 
}
}
?>
</table>

								
								</article><!-- end post -->
								</div>
								</section>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


				
				
