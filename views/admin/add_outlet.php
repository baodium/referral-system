<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>

<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>assets/js/jscripts/tiny_mce/tiny_mce.js"></script>
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
										<li><a href=""><?php echo $title ?></a></li>
										
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

<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
			<?php //var_dump($product_category);?>
			<?php echo validation_errors(); ?>
<?php echo isset($item)?form_open('myadmin/add_outlet'):form_open('myadmin/add_outlet')?>

    <label for="title"><h4>Outlet name</h4></label>
    <input type="input" name="name" class="form-control" value="<?php echo isset($item)?$item['name']:(isset($_POST['name'])?$_POST['name']:""); ?>" /><br />
	<label for="title"><h4>Contact email</h4></label>
    <input type="input" name="email" class="form-control" value="<?php echo isset($item)?$item['email']:(isset($_POST['email'])?$_POST['email']:""); ?>" /><br />
    <label for="title"><h4>Contact phone number</h4></label>
    <input type="input" name="phone_number" class="form-control" value="<?php echo isset($item)?$item['phone_number']:(isset($_POST['phone_number'])?$_POST['phone_number']:""); ?>" /><br />
    <label for="title"><h4>Product category</h4></label>
	<?php //var_dump($product_category);?>
	<div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select class="form-control" name="product_category[]">
            </select>
            <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
		<?php 
         
         $cat=(isset($item))?$item['product_category']:"";
		 $cat=explode(",",$cat);
		 //var_dump($cat);
		  ?>
		  <?php foreach($product_category as $pcat){
			//$pcats=explode(",",$pcat["name"]);
		  ?>
		  
            <label for="one"><input type="checkbox" name="product_category[]" <?php if(isset($item) && in_array($pcat['name'],$cat)){ ?> checked <?php } ?> value="<?php echo $pcat['id']; ?>" id="one"/><?php echo $pcat['name']; ?></label>
          <?php  } ?>
		</div>
    </div>
<br />
	<label for="title"><h4>Address</h4></label>
    <textarea name="address" class="form-control" ><?php echo isset($item)?$item['address']:(isset($_POST['address'])?$_POST['address']:""); ?></textarea><br />
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="<?php echo isset($item)?"save_outlet":"add_outlet"; ?>" value="<?php echo isset($item)?"Save":"Submit"; ?>" />
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
