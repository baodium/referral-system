<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>
<style>


.overlay-bg {
    display: none;
    position: absolute;
    top: 0;
    left: 0;
    height:100%;
    width: 100%;
    cursor: pointer;
    z-index: 1000; /* high z-index */
    background: #000; /* fallback */
    background: rgba(0,0,0,0.75);
}
    .overlay-content {
        display: none;
        background: #fff;
        padding: 1%;
        width: 40%;
        position: absolute;
        top: 15%;
        left: 50%;
        margin: 0 0 0 -20%; /* add negative left margin for half the width to center the div */
        cursor: default;
        z-index: 10001;
        border-radius: 4px;
        box-shadow: 0 0 5px rgba(0,0,0,0.9);
    }
 
    .close-btn {
        cursor: pointer;
    }

 
/* media query for most mobile devices */
@media only screen and (min-width: 0px) and (max-width: 480px){
 
    .overlay-content {
        width: 96%;
        margin: 0 2%;
        left: 0;
    }
}
::selection {
    background: #e84c3d;
    color: #999 !important;
}
</style>
<script>
$(document).ready(function(){
 
    // function to show our popups
    function showPopup(whichpopup){
        var docHeight = $(document).height(); //grab the height of the page
        var scrollTop = $(window).scrollTop(); //grab the px value from the top of the page to where you're scrolling
        $('.overlay-bg').show().css({'height' : docHeight}); //display your popup background and set height to the page height
        $('.popup'+whichpopup).show().css({'top': scrollTop+20+'px'}); //show the appropriate popup and set the content 20px from the window top
    }
 
    // function to close our popups
    function closePopup(){
        $('.overlay-bg, .overlay-content').hide(); //hide the overlay
    }
 
    // timer if we want to show a popup after a few seconds.
    //get rid of this if you don't want a popup to show up automatically
    /*
	setTimeout(function() {
        // Show popup3 after 2 seconds
        showPopup(3);
    }, 2000);
 */
 
    // show popup when you click on the link
    $('.show-popup').click(function(event){
        event.preventDefault(); // disable normal link function so that it doesn't refresh the page
        var selectedPopup = $(this).data('showpopup'); //get the corresponding popup to show
         
        showPopup(selectedPopup); //we'll pass in the popup number to our showPopup() function to show which popup we want
    });
   
    // hide popup when user clicks on close button or if user clicks anywhere outside the container
    $('.close-btn, .overlay-bg').click(function(){
        closePopup();
    });
     
    // hide the popup when user presses the esc key
    $(document).keyup(function(e) {
        if (e.keyCode == 27) { // if user presses esc key
            closePopup();
        }
    });
});
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
										
										<li><a href="javascript:void(0);"><?php  echo $title?></a></li>
									</ol>
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->
				
<div class="overlay-bg">
</div>
<div class="overlay-content popup1">
<center><h2>ADD FIELD</h2></center>
<hr />
<form name="field-form" action="#" method="post" >
   <div class="row" >
	<div class="col-md-6">
	<span>
	<h6>Field Name <span style="color:red">*</span></h6>
	<input id="comment-author" type="text" style="height:30px; color:#999"  placeholder="" name="title"  class="form-control">
	</span>
	</div>
	<div class="col-md-6">
	<span>
	<h6>Field Type <span style="color:red"></span></h6>
	<select name="field_type" class="form-control"  onchange="enable_option();" style="height:30px; color:#999">
	<option value="textfield">Textfield</option>
	<option value="textarea">Textarea</option>
	<option value="select">Dropdown list</option>
	<option value="checkbox">Checkbox</option>
	<option value="file">File</option>
	</select>
	</span>
	</div>
	<div id="opt_con">

	</div>
	<div class="col-md-6">
	<span>
	<br/><br/>
	</span>
	
	</div>
	</div>
	<div id="error_box"></div><br/>
	
    <button type="button"   style="margin-left:10px; float:right" onclick="javascript:createForm();">Save</button><button class="close-btn" style="margin-left:10px; float:right" type="button" >Close</button><button class="" onclick="add_option();" style="margin-left:10px; float:right" type="button" >Add Option</button>
</form>
	</div>				
				
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
			<span style="text-align:left;">
			<?php echo "<span style='color:red'>".(isset($error)?$error:'')."</span>"; ?>
			<?php echo "<span style='color:red'>".validation_errors()."</span>"; ?>
<?php echo isset($item)?form_open('myadmin/edit_form'):form_open('myadmin/create_form')?>

    <label for="title"><h4>Form Title</h4></label>
    <input type="input" name="title" class="form-control" value="<?php echo isset($item)?$item['title']:""; ?>" /><br />

    <?php if(isset($item)){ ?>
   <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
   <?php } ?>
   <h3>Fields</h3>
   <div class="row fields" >
	<input type="hidden" name="has_field" id="has_field" value=""  />
	<?php //var_dump($item);
if(isset($item)){
$textfields=explode("**",$item['textfield']);
$textareas=explode("**",$item['textarea']);
$selects=explode("**",$item['select']);
$checkboxes=explode("**",$item['checkbox']);
$files=explode("**",$item['file']);
?>
<?php 
foreach($textfields as $field){
if($field!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$field) ?><span style="color:red"></span></h6>
	<input id="comment-author" type="text"  placeholder="" name="<?php echo $field."&textfield"; ?>"  class="form-control">
	</span>
	</div>
<?php }} ?>

<?php 
foreach($files as $file){
if($file!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$file) ?><span style="color:red"></span></h6>
	<input id="comment-author" type="file"  placeholder="" name="<?php echo $file."&file"; ?>"  class="form-control">
	</span>
	</div>
<?php }} ?>

<?php 
foreach($selects as $select){
if($select!=""){
	$opt=explode("&options=",$select);
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$opt[0]) ?><span style="color:red"></span></h6>
	<select id="comment-author"   placeholder="" name="<?php echo $opt[0]."&select"."&options=".$opt[1];?>"  class="form-control">
	<?php 

     if(count($opt)>1){
	 $op=explode("%",$opt[1]);
	 foreach($op as $o){
	 if($o!=""){
	 ?>
	 <option value="<?php echo $o;?>"><?php echo $o?></option>
	 <?php }
	 }
	 }
	 
	?>
	
	</select>
	</span>
	</div>
<?php }} ?>
<?php 
foreach($checkboxes as $check){
if($check!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$check) ?><input id="comment-author" type="checkbox"  placeholder="" name="<?php echo $check."&checkbox"?>"  ></h6>
	</span>
	</div>
<?php }} ?>
<?php 
foreach($textareas as $area){
if($area!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$area) ?><span style="color:red"></span></h6>
	<textarea id="comment-author"   placeholder="" name="<?php echo $area."&textarea"?>"  class="form-control"></textarea>
	</span>
	</div>
<?php }} }?>
	</div><br/>
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="<?php echo isset($item)?"save_item":"create_item"; ?>" value="<?php echo isset($item)?"Save form":"Create form"; ?>" />
<a class="show-popup btn btn-warning btn-effect" href="#" style="float:right; margin-right:10px" class="btn btn-warning btn-effect" data-showpopup="1" >Add Field</a>


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


				
				
