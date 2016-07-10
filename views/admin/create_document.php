<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>

<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page"><?php echo $title?></h1></div>
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

<center><div style="width:80%;  border:1px solid #ccc; padding:20px; font-size:14px;  border-radius:5px" >						
	<div class="row">
			<div class="col-md-12">
			<span style="text-align:left">
<center><p style="color:red"><?php echo $error; ?></p></center>
<center><p style="color:red"><?php echo validation_errors(); ?></p></center>
<?php $id= isset($item['id'])?$item['id']:''; ?>
<?php echo isset($item['id']) ?form_open_multipart('myadmin/edit_document/'.$id.''):form_open_multipart('myadmin/create_document')?>

    <label for="title">Title</label>
    <input type="input" name="label" class="form-control" value="<?php echo isset($item)?$item['title']:''; ?>" /><br />
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
   <label for="banner">Document</label>
	<input type="file" name="file" class="form-control" ><br/>
    <input type="submit" name="submit" class="btn btn-primary btn-effect" style="float:right" value="<?php echo isset($item)?"Save ":"Upload"; ?>" />
<?php if(isset($item)){ ?>
   <a href="<?php echo $this->config->config['base_url'].'document_files/'.$item['url'] ?>"><?php echo $item['url']; ?>" </a><br/>
   <?php } ?>
</form>
</span>
</div>
</div>
</div>
</section>


								
								</article><!-- end post -->

							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->


				
				

