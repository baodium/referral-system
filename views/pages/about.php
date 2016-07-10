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
              <div class="top-sellers"><br/>
			    				<article class="post post_mod-j clearfix" style="padding:10%; padding-top:0px">
									
									<h3 class="entry-title ui-title-">ABOUT FOURFOLD INTEGRATED SERVICES</h3>
											<p style="font-size:16px; text-align:justify; "> 
											Fourfold Integrated Resources is a registered company in Nigeria that supports individuals and corporate members to acquire resources and services with ease by creating an organized platform for them to network and gain fourfold financial reward to sponsor their desired goods and services upon completion of a five referral network cycle.
                                        There are different amount categories that a member can chose to run, ranging from #3000 to #1,000,000. To qualify for entitlement, you need to bring five people that will register through you i.e. use your membership id in their registration process. You can run two or more categories concurrently. The available categories and the expected entitlement after completing the network of five are as listed below:
	
											</p>
								</article><!-- end post -->
								
								
								<article class="post post_mod-j clearfix" id="category" style="padding:10%; padding-top:0px">
									
									<h3 class="entry-title ui-title-">AMOUNT CATEGORIES</h3>
											<p style="font-size:16px; text-align:justify; "> 
								             <table style="width:97%; align:center; margin-left:15px; border-radius:5%">
		<tr style="border-bottom:1px solid purple; margin-bottom:10px "><th>SN</td><th>Category Name</th><th>Amount</th><th>Entitlement</th></tr>
		<?php if(isset($amount_category) && $amount_category!=null){ $i=0; 
		foreach($amount_category as $out){ $i++;
		?>
		<tr style="border-bottom:1px solid #ccc; text-align:left "><td><br/><?php echo $i; ?></td><td><br/><?php echo $out['acat_name'] ?><br/></td><td><br/>#<?php echo ucwords($out['price']) ?></td><td><br/>#<?php echo ucwords($out['entitlement']); ?></td></tr>
		<?php }} ?>
		</table>
        									</p>
								</article><!-- end post -->
								<article class="post post_mod-j clearfix" id="join" style="padding:10%; padding-top:0px">
									
									<h3 class="entry-title ui-title-">HOW TO JOIN</h3>
											<p style="font-size:16px; text-align:justify; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif "> 
								You can become a member of this system irrespective of your location through any of the existing members or registering with the system directly. The requirement is that you pay the amount category that you have chosen to run to the company’s account. 
<br/><br/>Immediately after payment is made to the NIP’s account, do any of the following:<br/> 
<ul style="font-size:16px; text-align:justify; ">
<li>(i)	Fill registration form in the company’s web site requesting the system administrator to confirm  your payment and send you membership id <br/>

OR</li>
<li>(ii) Send an SMS to 08000000000 containing<br/>
REGISTER ME
<ul style="list-style:bullet">
<li>•	Bank name</li>
<li>•	Branch</li>
<li>•	Amount paid </li>
<li>•	Teller number	 –this may not be necessary if your payment is through online transfer but put a remark that indicate your full name clearly. </li>
<li>•	Your Name	 –please let it be the name you indicated on the bank teller.</li>
<li>•	Referral ID	 – if you do not have any referral, use u111j7373 as the referral ID</li>
<li>•	Your main phone number.</li></ul>
</li>
<li>After any of these is done, you will receive a confirmation text message within 24hours containing your membership ID<br/> 
which is a unique id that anybody coming into the system through you will use as a referral ID. 
<br>By this way the system can track your record and know the number of people coming in through you, <br/>
and you can also check your status online at any given point in time.
</li>
<li><br/>
<b>Before you join, it is important that you read our <a href="<?php echo $this->config->config['base_url']?>terms" style="color:blue">terms and conditions</a></b></li>
</ul>
</p>
								</article><!-- end post -->
								
										<article class="post post_mod-j clearfix" id="join" style="padding:10%; padding-top:0px">
									
									<h3 class="entry-title ui-title-">BENEFITS</h3>
<p style="font-size:16px; text-align:justify; font-family:'Helvetica Neue', Helvetica, Arial, sans-serif "> 
This system gives individual members and cooperate partners unlimited platform to create their own wealth at their own pace such that
 the rate at which a member receive entitlement is anchored on how fast he can network and complete one cycle which consist of five 
 other new registrations through his membership ID. <br/><br/>
 For each completed cycle, for the same amount category (you can be running different amount category concurrently) that you are running,
 you will be qualified for an entitlement to purchase any product worth four times your amount category. For instance, 
 if you are running a #5,000 amount category, you will be entitled to #20,000 worth of product(s) from any of our outlets but you 
 are not restricted to buying from our outlets alone as the money can be made available to you in cash via your bank account. 
 However, buying from us will provide you with additional free item of your choice that worth five percent of your entitlement.  
</p>
								</article><!-- end post -->
		        </div>
            </div>
          
        </div>
    </div>

<br/><br/>