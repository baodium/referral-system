<?php if(!isset($_SESSION['admin'])){
//header('location:login');
} 

?>
<style>
.border-table th,.border-table td {border:1px solid #000}
.form-cont {
    padding: 10px;

    background-color: #ffffff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 0;
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    color: #aaa;
    font-weight: 400;
    font-size: 14px;
}
</style>
<div class="wrap-title-page">
					<div class="container">
						<div class="row">
							<div class="col-xs-12"><h1 class="ui-title-page"><?php echo $title;?></h1></div>
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
										<li><a href="<?php echo $this->config->config['base_url'].'myadmin/prend' ?>">Applications</a></li>
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
<br/>

<article><?php date_default_timezone_set('Africa/Lagos'); ?> <form name="app_form" method="post" action="open_prend_application">
<h3 style="float:left">Current application year: <select name="year"><option value="<?php echo date("Y");?>"><?php  echo date("Y");?></option></select>&nbsp;&nbsp;&nbsp; Application status:<?php echo ($prend_status=="closed")?"<span style='color:red'>closed</span>":"<span style='color:blue'>open</span>"?>&nbsp;&nbsp; <?php if($prend_status=="closed"){?> <input type="submit" name="open" value="Open Application" /> <?php }else{ ?><input type="submit" name="close" value="Close Application" /><?php } ?> </h3></form><br/><br/>
<br/>
<table style="width:100%">

<?php 
//var_dump($years);
if(isset($years) && $years !=null){?>
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<th>SN</th>
<th>Application years</th>

</tr>
<tr>
<th>&nbsp;</th>
<th></th>

</tr>
<?php
$i=0; 
foreach($years as $y){
$i++;
?>
<tr>
<td><h3><?php echo $i ?></h3></td>
<td><a href='<?php echo $this->config->config['base_url']?>myadmin/application/<?php echo $y['program'] ?>/<?php echo $y['year'] ?>' ><h3><?php echo $y['year'] ?></h3></a></td>

</tr>

<?php 
}
if(count($years)<1)
echo "No record found";
}
?>
<?php 
//var_dump($years);
if(isset($prend_item) && $prend_item !=null){
$i=0;
?>
<tr style="border-bottom:1px solid purple; margin-bottom:10px ">
<td>SN</td>
<td>Candidate name</td>
<td>Program</td>
<td>Course</td>
<td>Date/time registered</td>
<td>Registration Detail</td>
<td>View passport</td>
</tr>
<?php
foreach($prend_item as $prend){
$i++;
?>

<tr style="margin-bottom:10px; border-bottom:1px solid #ccc">
<td><?php echo $i?></td>
<td><?php echo $prend['surname']." ".$prend['othernames'] ?></td>
<td><?php echo $prend['program'] ?></td>
<td><?php echo $prend['course'] ?></td>
<td><?php echo $prend['reg_date'] ?></td>
<td><a href='<?php echo $this->config->config['base_url']?>prend/detail/<?php echo $prend['id'] ?>'>View Detail</a></td>
<td><img src="<?php echo $this->config->config['base_url']?>appl_passports/<?php echo $prend['passport'] ?>" style="width:200px; height:100px" /></td>
</tr>

<?php 
}
}
?>
</table>
<?php
if(isset($prend_detail) && $prend_detail !=null){
$detail=$prend_detail[0];
?>
<center><fieldset style="padding:20px; width:98%; ">
<div id="to_print">
<center><table><tr><td rowspan="2"><img src="<?php echo $this->config->config['base_url']?>assets/img/logo_mod-a.png" style="width:40px; height:40px; margin-top:-40px"></td><td><center><h4>THE FEDERAL POLYTECHNIC,ILE-OLUJI,ONDO STATE</h4></center></td><td></td></tr><tr><td><center><h4>POST UTME APPLICATION DETAILS</h4></center></td></tr></table></center>
	<br/><br/><div><img src="<?php echo $this->config->config['base_url']?>appl_passports/<?php echo $detail['passport'];?>" style="width:150px; height:150px; border:1px solid #ccc;  "></div><br/>
					<table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th colspan="2" style="padding:5px">1. Personal Details </th></tr>
									<tr ><td style="padding:5px">Title: <?php echo ucwords($detail['user_title']) ?></td>
												<td style="padding:5px">Gender:<?php echo ucwords($detail['sex']) ?></td></tr>
									<tr ><td style="padding:5px" >Surname:<?php echo ucwords($detail['surname']) ?>
												</td><td style="padding:5px" >Maiden Name:<?php echo ucwords($detail['maiden_name']) ?>
												</td></tr>
								    <tr ><td style="padding:5px"  >Other Names:<?php echo ucwords($detail['othernames']) ?>
												</td><td style="padding:5px;" >Other contact Number:<?php echo ucwords($detail['other_contact_number']) ?></tr>
												<tr ><td style="padding:5px" >Date of birth:<?php echo ucwords($detail['date_of_birth']) ?>
												
												</td><td style="padding:5px" >Marital Status:<?php echo ucwords($detail['marital_status']) ?>
												</td></tr>
										
												<tr ><td style="padding:5px" > Correspondence Address:<b><?php echo ucwords($detail['correspondence_address']) ?></b>
												
												</td><td style="padding:5px" >Home Address :<b><?php echo ucwords($detail['home_address']) ?></b>
												</td></tr>
												<tr ><td style="padding:5px"  >Email:<b><?php echo ucwords($detail['email']) ?></b>
												</td><td style="padding:5px"  >State Of Origin::<b><?php echo ucwords($detail['state']) ?></b></td></tr>
												<tr ><td style="padding:5px"  >LGA:<b><?php echo ucwords($detail['lga']) ?></b></td>
												<td style="padding:5px"  >Home Town:<b><?php echo ucwords($detail['home_town']) ?></b></td>
												</tr>
												
												<tr ><td style="padding:5px; " > Mobile:<b><?php echo ucwords($detail['mobile_number']) ?></b>
												
												</td><td style="padding:5px;" >
												</td></tr>
</table>  
<br/><br/>
					<table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th colspan="2" style="padding:5px">2. Programme applied for</th></tr>
									<tr ><td style="padding:5px">Name Of Programme: <b><?php echo ucwords($detail['program']) ?></b></td>
												<td style="padding:5px"><b>Course: <b><?php echo ucwords($detail['course']) ?></b></td></tr>
												
                          </table> <br/><br/>
                          <table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th colspan="6" style="padding:5px">3. Qualifications Obtained</th></tr>
									<tr >
									<td style="padding:5px; border-right:0px" colspan="2"  >Name of School:<b><?php echo ucwords($detail['school_name1']) ?></b></td>
									<td style="padding:5px; border-left:0px"   >Year Awarded:<b><?php echo ucwords($detail['school1_year']) ?></b></td>
									<td style="padding:5px; border-right:0px" colspan="2"  >Name of School:<b><?php echo ucwords($detail['school_name2']) ?></b></td>
									<td style="padding:5px; border-left:0px"   >Year Awarded:<b><?php echo ucwords($detail['school2_year']) ?></b></td>
									
									</tr>
									
									
									<tr >
									<td style="padding:5px" >Serial No</td>
									<td style="padding:5px; width:40%" >Subject</td>
									<td style="padding:5px" >Grade</td>
									
									<td style="padding:5px" >Serial No</td>
									<td style="padding:5px; width:40%" >Subject</td>
									<td style="padding:5px" >Grade</td>
									</tr>
									
									<tr >
									<td style="padding:5px" >1</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject1']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade1']) ?></b></td>
									
									<td style="padding:5px" >1</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject1']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade1']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >2</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject2']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade2']) ?></b></td>
									
									<td style="padding:5px" >2</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject2']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade2']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >3</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject3']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade1']) ?></b></td>
									
									<td style="padding:5px" >3</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject3']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade3']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >4</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject4']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade4']) ?></b></td>
									
									<td style="padding:5px" >4</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject4']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade4']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >5</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject5']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade5']) ?></b></td>
									
									<td style="padding:5px" >5</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject5']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade5']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >6</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject6']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade6']) ?></b></td>
									
									<td style="padding:5px" >6</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject6']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade6']) ?></b></td>
									
									</tr>
									
									
									<tr >
									<td style="padding:5px" >7</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject7']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade7']) ?></b></td>
									
									<td style="padding:5px" >7</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject7']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade7']) ?></b></td>
									
									</tr>
									
								    <tr >
									<td style="padding:5px" >8</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject8']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade8']) ?></b></td>
									
									<td style="padding:5px" >8</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject8']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade8']) ?></b></td>
									
									</tr>
									
									<tr >
									<td style="padding:5px" >9</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['subject9']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['grade9']) ?></b></td>
									
									<td style="padding:5px" >9</td>
									<td style="padding:5px; width:40%" ><b><?php echo ucwords($detail['school2_subject9']) ?></b></td>
									<td style="padding:5px" ><b><?php echo ucwords($detail['school2_grade9']) ?></b></td>
									
									</tr>
									
										
                          </table> 	<br/><br/>

                           <table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th colspan="3" style="padding:5px">4. Information on Parents or Guardians</th></tr>
									
									<tr ><td style="padding:5px" >Full Names:<b><?php echo ucwords($detail['parent_name']) ?></b></td>
									<td style="padding:5px" >Relationship with the Applicant:<b><?php echo ucwords($detail['relationship']) ?></b></td>
									<td style="padding:5px" >Phone Number:<b><?php echo ucwords($detail['parent_phone']) ?></b></td>
									
									</tr>
									<tr ><td style="padding:5px" colspan="2" >Address:<b><?php echo ucwords($detail['parent_address']) ?></b></td>
									<td style="padding:5px" >Occupation:<b><?php echo ucwords($detail['parent_occupation']) ?></b></td>
									
									</tr>					
                          </table>	
<br/><br/>
<table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th  style="padding:5px">5. Payment Information </th></tr>
									<tr ><td style="padding:5px">Remita Number : <b><?php echo ucwords($detail['remita_number']) ?><b></td></tr>
														
                          </table>	<br/><br/>
						
<table class="border-table" style="color:#000; font-size:16px; width:100%; ">
									<tr style="background:#AFCCEA;" ><th  style="padding:5px" colspan="4">6. For Office Use</th></tr>
									<tr ><td style="padding:5px" colspan="4"><b>Admission Recommendation</b></td></tr>
									<tr ><td style="padding:5px" >Recommended for admission</td><td style="width:20%">&nbsp;</td><td style="padding:5px" >Not recommended for admission</td><td style="width:20%">&nbsp;</td></tr>
									<tr ><td style="padding:5px" colspan="2" >Admission Officer:</td><td style="width:20%">Signature:</td><td style="padding:5px" >Date:</td></tr>
														
                          </table>							  
									
									
								<br/><br/>
									
	
	
	
	
		 </div>
		 <div style="border-bottom:1px solid #ccc">&nbsp;</div><br/>
		 <input type="submit" name="submit" class="btn btn-primary btn-effect" style="float:right" onclick="javascript:PrintElem('to_print');" value="Print" />
			 </fieldset></center>
<?php 
}
?>
<?php if((isset($prend_item) && $prend_item==null) || (isset($prend_detail) && $prend_detail==null) ){?> 
								<center><h2>No record found!</h2></center>
								<?php }?>
								
								</article><!-- end post -->
								</div>
								</section>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->