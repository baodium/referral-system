<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page">News</h1></div>
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
										<li><a href="javascript:void(0);">News</a></li>
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
<a href="<?php echo $this->config->config['base_url'].'myadmin/create_news' ?>" style="float:left; margin-right:5px">Add news</a>
<br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Title</th>
<th>Image</th>
<th>Edit news</th>
<th>Delete news</th>
</tr>
<tr>
<th>&nbsp;</th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<?php 
//var_dump($news);
if(isset($news) && $news !=null){
$i=0;
foreach($news as $news_item){
$i++;
?>
<tr style="border-bottom:1px solid #ccc; ">
<td><input type="hidden" name="slug" value="<?php echo $news_item['slug'] ?>" /><?php echo $i?></td>
<td><a href="<?php echo $this->config->config['base_url']?>news/<?php echo $news_item['slug'] ?>" target="_blank"><?php echo $news_item['title'] ?></a></td>
<td><br/><img src="<?php echo $this->config->config['base_url'].'news_files/'.$news_item['image']; ?>" style="width:200px; height:100px" /><br/><br/></td>
<td><a href='<?php echo $this->config->config['base_url'].'myadmin/edit_news/'.$news_item['id'] ?>' class="btn btn-warning btn-effect" >Edit <a/></td>
<td><a href='<?php echo $this->config->config['base_url'].'myadmin/delete_news/'.$news_item['id'] ?>' class="btn btn-primary btn-effect">Delete <a/></td>
</tr>
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


				
				
