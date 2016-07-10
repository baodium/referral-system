<script src="<?php echo $this->config->config['base_url']?>/assets/js/validation.js"></script>
<script src="<?php echo $this->config->config['base_url']?>/assets/js/countries.js"></script>
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
										<li><a href="<?php echo $this->config->config['base_url'].'home' ?>"><i class="icon stroke icon-House"></i>&nbsp;Home</a></li>
										
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
<article><?php date_default_timezone_set('Africa/Lagos'); ?> 

<?php
if(isset($putme_detail) && $putme_detail !=null){
$detail=$putme_detail[0];
?>
<center><fieldset style="padding:20px; width:98%; ">
<div id="to_print">
<center><table><tr><td rowspan="2"><img src="<?php echo $this->config->config['base_url']?>assets/img/logo_mod-a.png" style="width:40px; height:40px; margin-top:-40px"></td><td><center><h4>THE FEDERAL POLYTECHNIC,ILE-OLUJI,ONDO STATE</h4></center></td></tr><tr><td><center><h4>POST UTME APPLICATION DETAILS</h4></center></td></tr></table></center>
	<br/><br/><h5 style="text-align:left;">PERSONAL INFORMATION</h5>
	<table style="width:100%;  font-size:14px; " >
              			  
			  <tr >
			   <td > Candidate Name:</td><td style="width:75%"><?php echo ucwords($detail['surname']." ".$detail['middle_name']." ".$detail['first_name']); ?></td><td rowspan="5"><img src="<?php echo $this->config->config['base_url']."putme_passports/".$detail['passport'];?>" style="width:100px; height:100px; border;1px solid #ccc" /></td>
			   </tr>
			   <tr >
			   <td > Patient Sex:</td><td style="width:75%"><?php echo ucwords($detail['sex']); ?></td>
			   </tr>
			   <tr >
			   <td > Date of birth:</td><td style="width:75%"><?php echo ucwords($detail['date_of_birth']); ?></td>
			   </tr>
			   <tr >
			   <tr >
			   <td > Religion:</td><td style="width:75%"><?php echo ucwords($detail['religion']); ?></td>
			   </tr>
			   <td > Nationality:</td><td style="width:75%"><?php echo ucwords($detail['nationality']); ?></td>
			   </tr>
			   <tr >
			   <td > State of origin:</td><td style="width:75%"><?php echo ucwords($detail['state_of_origin']); ?></td>
			   </tr>
			    <tr >
			   <td > Local Government:</td><td style="width:75%"><?php echo ucwords($detail['lga']); ?></td>
			   </tr>
			    <tr >
			   <td > Email:</td><td style="width:75%"><?php echo ucwords($detail['email']); ?></td>
			   </tr>
			    <tr >
			   <td > Phone Number:</td><td style="width:75%"><?php echo ucwords($detail['candidate_phone']); ?></td>		   
			   </tr>
			   <tr >
			   <td > Residential & Postal Address:</td><td style="width:75%"><?php echo ucwords($detail['residential_address']); ?></td>
			   </tr>
     	 </table><br/>
		 <h5  style="text-align:left">PARENTS/GUARDIANS DATA</h5>
          	<table style="width:100%;  font-size:14px; " >
             
			   <tr >
			   <td > Parent Name:</td><td style="width:75%"><?php echo ucwords($detail['parent_name']); ?></td>
			   </tr>
			   <tr >
			   <td > Relationship:</td><td style="width:75%"><?php echo ucwords($detail['relationship']); ?></td>
			   </tr>
			   <tr >
			   <td > Residential & Postal Address:</td><td style="width:75%"><?php echo ucwords($detail['parent_address']); ?></td>
			   </tr>
			   <tr >
			   <td > Phone Number:</td><td style="width:75%"><?php echo ucwords($detail['parent_phone']); ?></td>
			   </tr>
			  
     	 </table><br/>
		 <h5  style="text-align:left">PAYMENT DETAIL</h5>
          	<table style="width:100%;  font-size:14px; " >
             
			   <tr >
			   <td > Bank Name:</td><td style="width:75%"><?php echo ucwords($detail['bank_name']); ?></td>
			   </tr>
			   <tr >
			   <td > Teller Number:</td><td style="width:75%"><?php echo ucwords($detail['teller_number']); ?></td>
			   </tr>
			  
     	 </table><br/>
		 <h5  style="text-align:left">ACADEMIC RECORD</h5>
          	<table style="width:100%;  font-size:14px; " >
             
			   <tr >
			   <td > Post Primary School Attended with dates:</td><td style="width:75%"><?php $schools=explode(",",$detail['post_primary_schools']); foreach($schools as $sc){echo ucwords($sc);} ?></td>
			   </tr>
			   <tr >
			   <td > Exam Name:</td><td style="width:75%"><?php $exams=explode(",",$detail['exam_name']); echo ucwords($detail['exam_name']); ?></td>
			   </tr>
			   <tr >
			   <td > Exam Number:</td><td style="width:75%"><?php echo ucwords($detail['exam_no']); ?></td>
			   </tr>
			   <tr >
			   <td > Subjects offered with Grades (<?php echo $exams[0]; ?>):</td><td style="width:75%"><?php $grades=explode("\n\r",$detail['subjects']); foreach($grades as $sc){echo ucwords($sc);} ?></td>
			   </tr>
			   <?php if(count($exams)>1){?>
			    <tr >
			   <td > Subjects offered with Grades (<?php echo $exams[1]; ?>):</td><td style="width:75%"><?php $grades2=explode("\n\r",$detail['subjects2']); foreach($grades2 as $sc){echo ucwords($sc);} ?></td>
			   </tr>
			   <?php } ?> 
			  <tr >
			   <td > Remarks:</td><td style="width:75%"><?php echo $detail['remarks'] ?></td>
			   </tr>
     	 </table><br/>
		 
		 <h5  style="text-align:left">PROGRAMME OF STUDY</h5>
          	<table style="width:100%;  font-size:14px; " >
             
			   <tr >
			   <td > First Choice College:</td><td ><?php echo ucwords($detail['college1']); ?></td><td > First Choice Course:</td><td ><?php echo ucwords($detail['course1']); ?></td>
			   </tr>
			    <tr >
			   <td > Second Choice college:</td><td ><?php echo ucwords($detail['college2']); ?></td><td > Second Choice Course:</td><td ><?php echo ucwords($detail['course2']); ?></td>
			   </tr>
			   
			   <tr >
			   <td > UTME Number:</td><td ><?php echo ucwords($detail['utme_no']); ?></td><td > UTME Score:</td><td ><?php echo ucwords($detail['utme_score']); ?></td>
			   </tr>
			    <tr >
			   <td > Degree In View:</td><td ><?php echo ucwords($detail['course2']); ?></td>
			   </tr>
			  
     	 </table><br/>
		 </div>
		 <div style="border-bottom:1px solid #ccc">&nbsp;</div><br/>
		 <input type="submit" name="submit" class="btn btn-primary btn-effect" style="float:right" onclick="javascript:PrintElem('to_print');" value="Print" />
			 </fieldset></center>
<?php 
}
?>

								
								</article><!-- end post -->
								</div>
								</section>
							</main><!-- end main-content -->

						</div><!-- end col -->


						
					</div><!-- end row -->
				</div><!-- end container -->
				