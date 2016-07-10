   <!--./ NAV BAR END -->
	
    <!--./ HOME SECTION END -->
  
    <!--./ ABOUT SECTION END -->
 
    <!--./ DONARS TESTIMONIALS END --><br/><br/>
    <div id="port-folio" class="pad-top-botm" style="background:#fff" >
        <div class="container">
		<ol class="breadcrumb">
			 <li><a href="index.html">Home</a></li>
			 <li class="active"><a><?php echo $title; ?></a></li>
		 </ol>
            <div class="row text-center ">
              <div class="top-sellers"><br/><br/><br/>
			    <table style="width:97%; align:center; margin-left:15px; border-radius:5%">
		<tr style="border-bottom:1px solid purple; margin-bottom:10px "><th>ID</td><th>Outlet Name</th><th style="width:25%">Address</th><th>Product Categories</th><th>Contact Phone</th></tr>
		<?php if(isset($outlets) && $outlets!=null){ $i=0; 
		foreach($outlets as $out){ $i++;
		?>
		<tr style="border-bottom:1px solid #ccc; text-align:left "><td><?php echo ucfirst($i); ?></td><td><?php echo $out['name'] ?><br/></td><td><?php echo ucwords($out['address']) ?></td><td><?php echo ucwords($out['product_category']); ?></td><td><?php echo $out['phone_number'] ?></td></tr>
		<?php }} ?>
		</table>
		        </div>
            </div>
          
        </div>
    </div>

<br/><br/>