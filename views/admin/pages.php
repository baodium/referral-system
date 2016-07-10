<?php if(!isset($_SESSION['admin'])){
header('location:'.$this->config->config['base_url'].'myadmin/login');
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
										<li><a href="javascript:void(0);">Pages</a></li>
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
                
                                    </ul>
<section class="comment-reply-form">
<center><div style=" font-size:14px;  border-radius:5px" >	
<a href="create_page" style="float:left; margin-right:5px">Create page</a>&nbsp;<a style="float:left" href="create_subpage">Create Sub-link</a><br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Pages</th>
<th>Edit Page</th>
<th>Delete Page</th>
<th>Sub-links</th>
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
if(isset($pages) && $pages !=null){
$i=0;
foreach($pages as $page){
$i++;
?>
<?php echo form_open('myadmin/edit_page') ?>
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i ?><input type="hidden" name="slug" value="<?php echo $page['slug'] ?>" /></td>
<td><a href='<?php if(count($page['sub_pages'])<1){?><?php echo $this->config->config['base_url']."pages/". $page['slug']."' target='_blank'"?><?php } ?>'><?php echo $page['title'] ?></a></td>
<td><input type="submit" name="edit" style="margin-top:10px" class="btn btn-warning btn-effect" value="Edit" /><br/><br/></td>
<td><input type="submit" name="delete" style="margin-top:10px" class="btn btn-primary btn-effect" value="Delete" /><br/><br/></td>
<td><table style="width:100%"><?php if($page['sub_pages']!=null){ foreach($page['sub_pages'] as $sublink){?><tr><td><a href="<?php echo $this->config->config['base_url']?>pages/<?php echo $sublink['slug'];?>" target="blank"><?php echo $sublink['title'];?></a></td><td><a href="edit_subpage/<?php echo $page['id']."/".$sublink['id'] ?>">Edit sub-link</a></td><td><a href="delete_subpage/<?php echo $sublink['id']?>">Delete sub-link</a></td></tr><?php }} ?></table></td>
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


				
				
