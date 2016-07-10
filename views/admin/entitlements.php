<?php if(!isset($_SESSION['admin'])){
header('location:'.$this->config->config['base_url'].'myadmin/login');
}

//var_dump($this->users_model);
//include ''; 
?>

<script>
function viewDetail(id){

                     var ad_con='<h2>FOURFOLD INTEGRATED RESOURCES</h2>';
			        ad_con+='<h2>Previous Entitlements<span></h2><br/>';

 $.post("<?php echo $this->config->config['base_url']?>users/get_entitlement/"+id,  function(data){			
 if(data!="" && data!="[]" && data !="NULL" && data !=null ){
data=JSON.parse(data,true);


				ad_con+='<fieldset style="height:100%; border:1px solid #ccc; width:98%; padding:10px">&nbsp;';
                                ad_con+='<fieldset id="nhisinfo" style="height:100%; border:0px solid #ccc; width:98%; padding:10px">&nbsp;';
				ad_con+='<table style="width:100%; border:1px solid #ccc;"  >';
                                ad_con+='<center><tr style="background:#DC0A0A; color:#fff; ">';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>FULL NAME</center></th>';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>CATEGORY</center></th>';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>PRODUCTS</center></th>';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>PRODUCT WORTH</center></th>';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>OUTLETS</center></th>';
                                ad_con+='<th style="width:16.67%; height: 30px"><center>DATE COLLECTED </center></th></tr>';
								
								for(i=0; i<data.length; i++){
                               
                                ad_con+='<tr style="width:100%;height:40px; text-align:center; border:1px solid #ccc">';
                                ad_con+='<th style="border:1px solid #ccc" ><center>'+data[i].name+'</center></th>';
								ad_con+='<th style="border:1px solid #ccc"><center>'+data[i].amount_category+'</center></th>';
                                ad_con+='<th style="border:1px solid #ccc"><center>'+data[i].products+'</center></th><th style="border:1px solid #ccc"><center>'+data[i].price+'</center></th><th style="border:1px solid #ccc"><center>'+data[i].outlets+'</center></th>';
                                ad_con+='<th style="border:1px solid #ccc"><center>'+data[i].date_collected+'</center></th></tr>';
								
                                }
								ad_con+='</table></fieldset></fieldset></fieldset><br/><br/>';

var win = window.open("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=680, height=500, top="+(screen.height-400)+", left="+(screen.width-840));
win.document.body.innerHTML = ad_con;
 
 
 }else{
 ad_con+='<hr/><tr><tr colspan="6"><center>No record found</center></td></tr>';
 //ad_con+='</table></fieldset></fieldset></fieldset><br/><br/>';

 
 var win = window.open("", "Title", "toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=680, height=500, top="+(screen.height-400)+", left="+(screen.width-840));
win.document.body.innerHTML = ad_con;
 
 }
});

}
</script>
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
										<li><a href="javascript:void(0);"><?php echo $title?></a></li>
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
                
                                    </ul><br/><br/>
<section class="comment-reply-form">
<center><div style=" font-size:14px;  border-radius:5px" >	
<!--<form action="<?php echo $this->config->config['base_url']?>myadmin/search_user" method="post" name="user_form" >
<input type="submit" name="query" value="Search" style="float:right; margin-right:5px" class="btn btn-primary btn-effect" />
<input type="text" name="search" style="float:right; margin-right:5px"  value="search" /></form><br/>-->
<br/><br/>
<article>
<table style="width:100%">
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>User Name</th>
<th>Amt Category</th>
<th>Type</th>
<th>Amount</th>
<th>Acct Number</th>
<th>Acct Name</th>
<th>Products</th>
<th>Outlet</th>
<th>Date Approved</th>
</tr>

<?php 
//var_dump($pages);
if(isset($outlets) && $outlets !=null){


$records_per_page = 15;
require 'zebra/Zebra_Pagination.php';
$pagination = new Zebra_Pagination();
$pagination->records(count($outlets));
$pagination->records_per_page($records_per_page);
if($outlets!=NULL){
$outlets = array_slice(
    $outlets,
    (($pagination->get_page() - 1) * $records_per_page),
    $records_per_page
);
}


$i=0;
foreach($outlets as $page){
$i++;
?>
<form action="<?php echo $this->config->config['base_url']?>myadmin/add_user" method="post" name="user_form" >
<?php echo form_open('myadmin/add_user'); 
$user_info = $this->users_model->get_user($page['user_id']);
//var_dump($user_info);
?>
<tr style="border-bottom:1px solid #ccc; ">
<td><?php echo $i ?><input type="hidden" name="id" value="<?php echo $page['id'] ?>" /></td>
<td><!--<input type="checkbox" name="users[]" style="width:20px; height:20px;" value="<?php echo $page['id'] ?>" />--><a href="#" style="color:blue" ><?php echo ucwords($user_info['name']); ?></a></td>
<td><?php 
//echo $user_info['amount_category'] 
$a_cat=$this->users_model->get_acategory($user_info['amount_category']);
echo $a_cat['acat_name'];
?></td>
<td><?php echo $page['type'] ?></td>
<td> N<?php echo $page['entitlement_amount'];//$amt=$this->users_model->get_acategory($user_info['amount_category']); echo $amt['entitlement']*(floor($user_info['entitlement_count']/5)) ?></td>
<td><?php echo $page['account_number'] ?></td>
<td><?php echo $page['account_name'] ?></td>
<td><?php echo ($page['products']=="")?"<center>-</center>":$page['products'] ?></td>
<td><?php 
$outl=explode(",",$page['outlets']);
foreach($outl as $ou){

$ou=$this->outlet_model->get_outlet($ou);
echo $ou['name']."<br/>";
}
?></td>
<th><?php echo $page['date_collected'] ?></th>
</tr>

</form>
<?php 
}
}else{
?>
<tr><td colspan="12"><center><br/>No entitlement<br/></center></td></tr>
<?php } ?>
</table><br/><br/>
<?php
// render the pagination links
if(isset($outlets)&& count($outlets)>0){
$pagination->render();
}
?>

								
								</article><!-- end post -->
								</div>
								</section>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->