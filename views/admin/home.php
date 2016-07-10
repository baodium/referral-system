<?php if(!isset($_SESSION['admin'])){
header('location:myadmin/login');
} ?>
<h1>Admin Page</h1>
<h3>Hello world</h3>