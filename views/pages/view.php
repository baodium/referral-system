<?php 
if(!isset($_GET['id']))
exit;

$id=$_GET['id'];

data=$this->users_model->get_entitlements($id); 
echo json_encode($data,true);

?>