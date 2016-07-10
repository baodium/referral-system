<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>

<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>assets/js/jscripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
<!--

tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "safari,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		content_css : "css/content.css",

		// Drop lists for link/image/media/template dialogs
		template_external_list_url : "<?php echo $this->config->config['base_url']?>assets/js/lists/template_list.js",
		external_link_list_url : "<?php echo $this->config->config['base_url']?>assets/js/lists/link_list.js",
		external_image_list_url : "<?php echo $this->config->config['base_url']?>assets/js/lists/image_list.js",
		media_external_list_url : "<?php echo $this->config->config['base_url']?>assets/js/lists/media_list.js",

		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
//-->
</script>
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
										<li><a href="<?php echo $this->config->config['base_url']?>myadmin/news">News</a></li>
										<li><a href="javascript:void(0);">Edit News</a></li>
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

<?php echo isset($item)?form_open_multipart('myadmin/edit_news/'.$item['id'].''):form_open_multipart('myadmin/create_news')?>

    <label for="title">Title</label>
    <input type="input" name="title" class="form-control" value="<?php echo isset($item)?$item['title']:""; ?>" /><br />

    <label for="text">Text</label>
    <textarea name="text" class="form-control" rows="25" ><?php echo isset($item)?('<img src="'.$this->config->config['base_url'].'news_files/'.$item['image'].'" style="width:600px; height:350px" />'):""; ?><br/><?php echo isset($item)?$item['text']:""; ?></textarea><br />
	<?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
   <label for="banner">Image</label>
	<input type="file" class="form-control" name="file"><br/>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect"  name="<?php echo isset($item)?"create_item":"save_item"; ?>" value="<?php echo isset($item)?"Save news item":"Create news item"; ?>" />

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


				
				
