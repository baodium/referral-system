
<br/><br/><br/><br/><br/>

<div class="single-sec">
	 <div class="container">
		 <ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active" style="color:#fff">Partnership Form</li>
		 </ol>
		 <!-- start content -->	
			<div class="col-md-12 det">
				  <div class="single_full">
					 <div class="grid images_3_of_2">
						 <br/>
						 <center><h3 class="entry-title ui-title-">PARTNERSHIP REQUEST FORM</h3></center>
						 <br/>
							<div>
							<center><div style="width:70%;  border:1px solid #ccc; padding:40px; font-size:14px;  border-radius:5px" >						
	<div class="row">
	
			<div class="col-md-12">
			<span style="text-align:left">
			<?php echo validation_errors(); ?>
           <?php if(isset($error)){ echo '<span style="color:red">* '.$error.'</span>' ; }?>
<form name="request_form" action="<?php echo isset($item)?'add_company':'add_company'?>" method="post" >

    <label for="title"><h4>Company Name</h4></label>
    <input type="input" name="name" class="form-control"  />
	<label for="title"><h4>Business Type</h4></label>
    <select class="form-control" name="type">
	<option value="Small scale">Small Scale</option>
	<option value="Medium scale">Medium Scale</option>
	<option value="Large scale">Large Scale</option>
    </select>
	<label for="title"><h4>Product Category</h4></label>
    <div class="multiselect">
        <div class="selectBox" onclick="showCheckboxes()">
            <select class="form-control" name="product_category[]">
            </select>
            <div class="overSelect"></div>
        </div>
        <div id="checkboxes">
		<?php 
         
         $cat=(isset($item))?$item['product_category']:"";
		 $cat=explode(",",$cat);
		 //var_dump($cat);
		  ?>
		  <?php foreach($product_category as $pcat){
			//$pcats=explode(",",$pcat["name"]);
		  ?>
		  
            <label for="one"><input type="checkbox" name="product_category[]" <?php if(isset($item) && in_array($pcat['name'],$cat)){ ?> checked <?php } ?> value="<?php echo $pcat['id']; ?>" id="one"/><?php echo $pcat['name']; ?></label>
          <?php  } ?>
		</div>
    </div>

    <label for="title"><h4>State</h4></label>

	<select id="states"  name="state" class="form-control"  onchange="populateLga('states','lga');">
                                                                                         
                                                                                       </select>
                                                                                    <script>
                                                                                        populateState("states");
                                                                                     </script>
	 <label for="title"><h4>Local Government Area</h4></label>
	  <select name="lga" id="lga" class="form-control" /></select>
	  <label for="title"><h4>Address</h4></label>
	  <textarea  name="address" class="form-control" /><?php echo isset($item)?$item['address']:(isset($_POST['address'])?$_POST['address']:""); ?></textarea>
    <label for="title"><h4>Contact Phone</h4></label>
    <input type="input" name="phone_number" class="form-control" value="<?php echo isset($item)?$item['phone_number']:(isset($_POST['phone_number'])?$_POST['phone_number']:""); ?>" />
	<label for="title"><h4>Contact Email Address</h4></label>
    <input type="email" name="email" class="form-control" value="<?php echo isset($item)?$item['email']:(isset($_POST['email'])?$_POST['email']:""); ?>" /><br/>

    <input type="submit" style="float:right" class="btn btn-primary btn-effect" name="add_outlet" value="Submit" />
	</form>
</div>
</div>
</div></center><br/><br/>
							 
							</div>
						 <div class="clearfix"></div>		
				      </div>
				  </div>
				 
				  <div class="clearfix"></div>
				  				  					
		    </div>
			
		</div>	     				
		     <div class="clearfix"></div>
	  </div>	 
</div>
<script>
    var expanded = false;
    function showCheckboxes() {
        var checkboxes = document.getElementById("checkboxes");
        if (!expanded) {
            checkboxes.style.display = "block";
            expanded = true;
        } else {
            checkboxes.style.display = "none";
            expanded = false;
        }
    }
</script>		
<br/><br/><br/>