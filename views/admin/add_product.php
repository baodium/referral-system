<?php if(!isset($_SESSION['admin'])){
header('location:login');
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
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i>&nbsp;Admin</a></li>
										<li><a href="<?php echo $this->config->config['base_url']?>myadmin/pages"><?php echo $title?></a></li>
										
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

								<article class="post post_mod-j clearfix" style="width:100%; background:#f7f7f7;padding-top:0px">
									
									<ul class="list-collapse list-unstyled">
                
                                    </ul>
	<section class="comment-reply-form">
<br/><br/><center><h3>New Product </h3>
<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
			<?php echo validation_errors(); ?>
			<?php if(isset($error)){ echo $error; } ?>
<?php echo isset($item)?form_open_multipart('myadmin/add_product'):form_open_multipart('myadmin/add_product')?>

    <label for="title"><h4>Product name </h4></label>
    <input type="input" name="p_name" class="form-control" value="<?php echo isset($item)?$item['p_name']:""; ?>" /><br />
	
	<label for="title"><h4>Product Category </h4></label>
	
     <select  name="pcategory" class="form-control" >><option value="">--Select category--</option>
	 
	 <?php if(isset($pcategory)){
	foreach($pcategory as $pcat){
	 ?>
	 <option value="<?php echo $pcat['pcat_id'] ?>" <?php if(isset($item)&& $item['pcategory']==$pcat['pcat_id']){ ?> selected <?php } ?>><?php echo $pcat['name'] ?></option>
	 <?php } }?>
	 </select><br />
	
	<label for="title"><h4>Outlets </h4></label>	
	<div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select class="form-control" name="outlets[]">
            </select>
            <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
		<?php 
		//var_dump($outlets[0]);
		if(isset($item))
         $outletss=explode(",",$item['outlets']);
        
		  ?>
		   <?php foreach($outlets as $outlet){ ?>
            <label for="one"><input type="checkbox" name="outlets[]" <?php if(isset($item) && in_array($outlet['id'],$outletss)){ ?> checked <?php } ?> value="<?php echo $outlet['id']; ?>" id="one"/><?php echo $outlet['name']; ?></label>
          <?php  } ?>
        </div>
    </div>
	
	
	<label for="title"><h4>Price </h4></label>
    <input type="input" name="price" class="form-control" value="<?php echo isset($item)?$item['price']:""; ?>" /><br />
	
	<label for="title"><h4>Product Description </h4></label>
    <textarea name="description" class="form-control"  /><?php echo isset($item)?$item['description']:""; ?></textarea><br />
	
	 <label for="banner">Product Image</label>
   <?php if(isset($item)){ ?>
   <img src="<?php echo $this->config->config['base_url']."/product_files/".$item['file']; ?>" style="width:200px; height:150px" /><br/>
   <?php } ?>
	<input type="file" class="form-control" name="file"><br/>
	
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="<?php echo isset($item)?"save_product":"add_product"; ?>" value="<?php echo isset($item)?"Save":"Submit"; ?>" />
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


		<script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>
		
				
