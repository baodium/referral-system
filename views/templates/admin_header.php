<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui">
<title>Fourfold Integrated Services</title>
<meta name="description" content="Connection" />


 <link href="<?php echo $this->config->config['base_url']?>/assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Font-Awesome Style -->
	<link href="<?php echo $this->config->config['base_url']?>/assets/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/font-awesome.min.css" rel="stylesheet" />
    <!--  Animation Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/animate.css" rel="stylesheet" />
    <!--  Pretty Photo Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/prettyPhoto.css" rel="stylesheet" />
	 <link href="<?php echo $this->config->config['base_url']?>/assets/css/memenu.css" rel="stylesheet" />
   
    <!--  Custom Style -->
    <link href="<?php echo $this->config->config['base_url']?>/assets/css/style.css" rel="stylesheet" />

<link href="<?php echo $this->config->config['base_url']?>/assets/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<!--<link href="assets/css/bootstrap2.css" rel="stylesheet" type="text/css" media="all" />-->
<link href="<?php echo $this->config->config['base_url']?>/assets/css/style2.css" rel="stylesheet" type="text/css" media="all" />

<script src="<?php echo $this->config->config['base_url']?>/assets/js/jquery.min.js"></script>

<script src="<?php echo $this->config->config['base_url']?>/assets/js/simpleCart.min.js"> </script>

<script src="<?php echo $this->config->config['base_url']?>assets/js/functions.js"> </script>



<!-- jQuery (necessary JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="<?php echo $this->config->config['base_url']?>/assets/s2/css/style.css" rel='stylesheet' type='text/css' />
<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>assets/js/jscripts/tiny_mce/tiny_mce.js"></script>
	<link rel="stylesheet" href="<?php echo $this->config->config['base_url']?>zebra/css/zebra_pagination.css" type="text/css">
	<script type="text/javascript" src="<?php echo $this->config->config['base_url']?>zebra/javascript/zebra_pagination.js"></script>
 <!--etalage-->


 
 
 <style>
    .multiselect {
        width: 100%;
    }
    .selectBox {
        position: relative;
    }
    .selectBox select {
        width: 100%;
        font-weight: bold;
    }
    .overSelect {
        position: absolute;
        left: 0; right: 0; top: 0; bottom: 0;
    }
    #checkboxes {
        display: none;
        border: 1px #dadada solid;
    }
    #checkboxes label {
        display: block;
    }
    #checkboxes label:hover {
        background-color: #1e90ff;
    }
</style>
 

 <style type="text/css">
  ul {list-style: none;padding: 0px;margin: 0px;}
  ul li {display: block;position: relative;}
  li ul {display: none;}
 #drop-nav ul li a {display: block;padding: 5px 10px 5px 10px;text-decoration: none;
           white-space: nowrap;color: #fff;}
 /*ul li:hover{background: #f00;  } */
  li:hover ul {display: block; position: absolute;}
  li:hover li {float: none;}
 
  li:hover li a:hover {background: #000; text-decoration:none}
  #drop-nav li ul li {border-top: 1px; solid #fff;}
  .active{color:#fff;}
</style>
</head>
<body>
    <div id="pre-div">
        <div id="loader">
        </div>
    </div>
    <!--/. PRELOADER END -->
    <div class="navbar navbar-default navbar-fixed-top move-me ">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

               <a class="navbar-brand" href="#" style="padding:0px;padding-top:5px;  background:">
                 <span style="font-size:38px; color:#fff; "><b><img src="<?php echo $this->config->config['base_url']?>assets/images/log.png" style="width:250px; height:50px; ">
				
				 <!--<img src="<?php echo $this->config->config['base_url']?>assets/images/site2.png" style="width:250px; height:250px" class="navbar-brand-logo " alt="" />
                  -->
                </a>
            </div>
            <div class="navbar-collapse collapse move-me">
                <ul class="nav navbar-nav navbar-right" id="drop-nav" >

                    	<li style="padding-left:20px; width:100px">
                        <a href="#">
						Requests
                        </a>
                      <ul class="navbar-default">
				     <li><a href="<?php echo $this->config->config['base_url']?>myadmin/partnership_requests">Partnership Requests</a></li>
				      <li><a href="<?php echo $this->config->config['base_url']?>myadmin/entitlement_requests">Entitlements Requests</a></li>
                         
                         </ul>
                    </li>
                
				<li><a href="<?php echo $this->config->config['base_url']?>myadmin/users">Users</a></li>
<li><a href="<?php echo $this->config->config['base_url']?>myadmin/amount_category">Amount Category</a></li>	
                    <li><a href="<?php echo $this->config->config['base_url']?>myadmin/outlets">Outlets</a></li>
					<li><a href="<?php echo $this->config->config['base_url']?>myadmin/entitlements">Entitlements</a></li>
                    <li><a href="<?php echo $this->config->config['base_url']?>myadmin/pcategory">Product Category</a></li>
                    <li><a href="<?php echo $this->config->config['base_url']?>myadmin/product">Products</a></li>
                    				
<li><a href="<?php echo $this->config->config['base_url']?>myadmin/gallery">Gallery</a></li>
 <li><a href="<?php echo $this->config->config['base_url']?>myadmin/logout">Logout</a></li>
                </ul>
            </div>

        </div>
    </div>

	<?php //var_dump($_SESSION); ?>
	
	<br/><br/><br/><br/>