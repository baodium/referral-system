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
										<li><a href="javascript:void(0);">Documents</a></li>
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

<a href="<?php echo $this->config->config['base_url'].'index.php/myadmin/create_event' ?>" style="float:left">Add new document</a>
<br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Title</th>
<th>Document</th>
<th>Edit event</th>
<th>Delete event</th>
</tr>
<tr>
<th>&nbsp;</th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<?php 
//var_dump($this->config->config['base_url']);
if(isset($documents)){
?>
<?php
$i=0;
foreach($documents as $document){
$i++;
//var_dump($this->config->config['base_url'].'index.php/myadmin/delete_banner/'.$banner['url']);
?>
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i; ?></td>
<td><?php echo $document['title'] ?></td>
<td><a href="<?php echo $this->config->config['base_url'].'document_files/'.$document['url']; ?>" ><?php echo $document['url'] ?></a></td>
<td><a href='<?php echo $this->config->config['base_url'].'myadmin/edit_document/'.$document['id'] ?>' class="btn btn-warning btn-effect">Edit <a/></td>
<td><a href='<?php echo $this->config->config['base_url'].'myadmin/delete_document/'.$document['id'] ?>' class="btn btn-primary btn-effect">Delete <a/></td>
</tr>
<?php 
}
if(count($documents)<1)
echo "<tr><td>No document</td></tr>";
?>
<?php 
}
?>
</table>

								
								</article><!-- end post -->
								</div>
								</section>
								</article>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->

