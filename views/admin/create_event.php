<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>

<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"></div>
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
										<li><a href="<?php echo $this->config->config['base_url']?>myadmin/gallery">Event gallery</a></li>
										<li><a href="javascript:void(0);"><?php echo (isset($item))?"Edit event":"Create event"; ?></a></li>
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
<br/><br/>
<center><div style="width:60%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
<center><p style="color:red"><?php echo $error; ?></p></center>
<center><p style="color:red"><?php echo validation_errors(); ?></p></center>
<?php $id= isset($item['id'])?$item['id']:''; ?>
<?php echo isset($item['id']) ?form_open_multipart('myadmin/edit_event/'.$id.''):form_open_multipart('myadmin/create_event')?>

    <label for="title">Title</label>
    <input type="input" name="label" class="form-control" value="<?php echo isset($item)?$item['title']:''; ?>" /><br />
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
   <?php if(isset($item)){ ?>
   <img src="<?php echo $item['url']; ?>" style="width:100%; height:60%" /><br/>
   <?php } ?>
   <label for="banner">Image</label>
	<input type="file" class="form-control" name="file"><br/>
    <input type="submit" name="submit" class="btn btn-primary btn-effect" style="float:right" value="<?php echo isset($item)?"Save ":"Upload"; ?>" />
</form>
</span>
</div>
</div>
</div>
</section><br/><br/>


								
								</article><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


				
				

