<?php if(!isset($_SESSION['admin'])){
header('location:login');
} 

?>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page"><?php echo $title?><?php if(isset($form_item) && $form_item !=null){
echo "<br/>(".$form_name['title'].")";
}
?></h1></div>
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
										<li><a href="javascript:void(0);">Forms</a></li>
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
<center></center>
<section class="comment-reply-form">
<center><div style=" font-size:14px;  border-radius:5px" >	
<?php if(isset($form_item) && $form_item !=null) { ?>
<a href="#" style="float:left; margin-right:5px">Applicants</a><br/><br/>
<?php } else{ ?>
<a href="create_form" style="float:left; margin-right:5px">Create form</a><br/><br/>
<?php } ?>
<article>
<table style="width:100%">
<?php 
//var_dump($years);
if(isset($form_item)){
$i=0;
if($form_item ==null){
?>
<tr style="border-bottom:1px solid purple; margin-bottom:10px "><td> No record</td></tr>
<?php }else{ ?>
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">

<?php foreach($form_item[0] as $key=>$value){
if($key!='hash'){
 ?>
<td><?php echo $key ?></td>
<?php } } ?>
</tr>
<?php
foreach($form_item as $tem){
$i++;
?>

<tr style="border-bottom:1px solid purple; margin-bottom:10px ">

<?php foreach($tem as $key=>$val){
if($key!='hash'){
?>
<td><?php echo $val ?></td>
<?php }} ?>
</tr>

<?php 
}}
}else{
?>

<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Form Name</th>
<th>View Applications</th>
<th>Edit Form</th>
<th>Delete Form</th>
</tr>
<tr>
<th>&nbsp;</th>
<th></th>
<th></th>
<th></th>
<th></th>
</tr>
<?php 
//var_dump($schools);
if(isset($forms) && $forms !=null){
$i=0;
foreach($forms as $form){
$i++;
?>
<?php echo form_open('myadmin/edit_form') ?>
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i ?><input type="hidden" name="id" value="<?php echo $form['id'] ?>" /></td>
<td><a ><?php echo $form['title'] ?></a></td>
<td><a href="forms/<?php echo $form['form_name'] ?>">View applications</a></td>
<td><br/><input type="submit" name="edit" class="btn btn-warning btn-effect" value="Edit" /><br/></td>
<td><br/><input type="submit" name="delete" class="btn btn-primary btn-effect" value="Delete" /><br/></td>
</tr>

</form>
<?php 
}
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
				