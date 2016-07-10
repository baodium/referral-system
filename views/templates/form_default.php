 <script>
	
	document.addEventListener('DOMContentLoaded', function () {
//show_map();
print_country("country");

    });
	</script>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page"><?php echo $title ?></h1></div>
						</div>
                    </div><!-- end container-->
</div><!-- end wrap-title-page -->

<div class="section-breadcrumb">
					<div class="container">
						<div class="row">
							<div class="col-xs-12">
								<div class="wrap-breadcrumb clearfix">
									<ol class="breadcrumb">
										<li><a href="javascript:void(0);"><i class="icon stroke icon-House"></i>&nbsp;Home</a></li>
										<li><a href="javascript:void(0);"><?php echo $title ?></a></li>
										
									</ol>
									
									
									
									
									<section class="comment-reply-form">
									
									<?php if(isset($form_detail) && $form_detail!=null){?>
								
									<p style="color:blue; text-align:center; font-size:12px">Please fill all fields</p>
									<?php echo "<span style='color:red'>".(isset($error)?$error:'')."</span><br/><br/>"; ?>
			<?php echo "<span style='color:red'>".validation_errors()."</span>"; ?>
<?php echo form_open_multipart('process_form') ?>
   <div class="row fields" style="border:1px solid #ccc; border-radius:3px" >
	<?php //var_dump($form_detail);
if(isset($form_detail)){
$textfields=explode("**",$form_detail['textfield']);
$textareas=explode("**",$form_detail['textarea']);
$selects=explode("**",$form_detail['select']);
$checkboxes=explode("**",$form_detail['checkbox']);
?>
<?php 
foreach($textfields as $field){
if($field!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$field) ?><span style="color:red"></span></h6>
	<input id="comment-author" type="text"  placeholder="" name="<?php echo $field; ?>"  class="form-control">
	</span>
	</div>
<?php }} ?>
<?php 
foreach($selects as $select){
$opt=explode("&options=",$select);
if($select!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$opt[0]) ?><span style="color:red"></span></h6>
	<select id="comment-author" required   placeholder="" name="<?php echo $opt[0]?>"  class="form-control">
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
<h6><?php echo str_ireplace("_"," ",$check) ?><input id="comment-author" required type="checkbox"  placeholder="" name="<?php echo $check?>"  ></h6>
	</span>
	</div>
<?php }} ?>
<?php 
foreach($textareas as $area){
if($area!=""){
?>
<div class="col-md-6"><span>
<h6><?php echo str_ireplace("_"," ",$area) ?><span style="color:red"></span></h6>
	<textarea id="comment-author"   placeholder="" name="<?php echo $area?>" required  class="form-control"></textarea>
	</span>
	</div>
<?php }} }?>
	</div><br/>
	<input type="hidden" name="form_id" value="<?php echo $form_detail['form_name']; ?>">
    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="submit" value="submit" />


</form><?php } ?>
								    </section>
									
									
								</div>
							</div>
						</div><!-- end row -->
					</div><!-- end container -->
				</div><!-- end section-breadcrumb -->

