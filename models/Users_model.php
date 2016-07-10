<?php
//include 'mail.php';
class Users_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
				//$this->load->model('mail_model');
        }
		
public function get_page($slug = FALSE)
{
        if ($slug === FALSE)
        {
        $query = $this->db->get('pages');
        return $query->result_array();
        }

        $query = $this->db->get_where('pages', array('slug' => $slug));
        return $query->row_array();
}


public function get_sub_page($slug = FALSE)
{
        if ($slug === FALSE)
        {
        $query = $this->db->get('sub_page');
        return $query->result_array();
        }

        $query = $this->db->get_where('sub_page', array('slug' => $slug));
        return $query->row_array();
}



public function register_application()
{
$data=array();

		unset($_POST['submit']);
		unset($_POST['confirm']);
	   foreach($_POST as $key=>$value){
	   $data[$key]=$value;
	  }
	 
	  date_default_timezone_set('Africa/Lagos');
     $data['year']=date("Y");
	 $query = $this->db->get_where('all_form', $data);
	 $fetched = $query->row_array();
	 if($fetched!=null)
	 return false;
	 $query = $this->db->query('SELECT * FROM all_form');
     $total= $query->result_array();
	 if($total!=null)
	 $quant=count($total)+1;
	 else
	 $quant=1;
	 $data['hash']=sha1($quant);
     if($this->db->insert('all_form', $data)){
	 $done=$this->send_link($data['email'],$data['hash'],'putme');
	 return true;
	 }else{
	 return false;
	 }
}


public function submit_form($id)
{
$data=array();

	  unset($_POST['submit']);
	  unset($_POST['form_id']);
	  foreach($_POST as $key=>$value){
	  $data[$key]=$value;
	  }
	 date_default_timezone_set('Africa/Lagos');
     //$data['year']=date("Y");
	 $form=$id;
	 $query = $this->db->get_where($form, $data);
	 $fetched = $query->row_array();
	 if($fetched!=null)
	 return false;
	 $query = $this->db->query('SELECT * FROM '.$form);
     $total= $query->result_array();
	 if($total!=null)
	 $quant=count($total)+1;
	 else
	 $quant=1;
	 $data['hash']=sha1($quant);
     if($this->db->insert($form, $data)){
	 if(isset($data['email']))
	 $done=$this->send_link($data['email'],$data['hash'],'prend');
	 //var_dump($done);
	 return true;
	 }else{
	 return false;
	 }
}


		function send_link($email,$id,$pass){
		$sender="admin@fourfold.com.ng";
		$from="admin@fourfold.com.ng";
		$to=$email;
	   // $id=$this->generate_id($id);
		$message="You have been successfully registered on our system. Visit  http://fourfold.com.ng  to access your dashboard \n\n Your login details are: \n\n";
		$message.="Membership ID: {$id} \n Temporary Password: {$pass}. \n\n You are strongly advised to change your password after your first login. \n\n\n\n Thanks for joining us ";
		
	    //$message="<h2>From: ".$sender."</h2><br/>".$message;
	    $mail_options = array("sender" => $from,
        "to" => $to,
		"cc" => "admin@fourfold.com.ng,oaadedayo@gmail.com",
        "subject" => "Four Fold Integrated Resources",
		"textBody" => $message);
	
        $subject = "Four Fold Integrated Resources";

        $body = $message;
        date_default_timezone_set('Africa/Lagos');
        $boundary =md5(date('r', time())); 

        $headers = "From: admin@fourfold.com.ng";
		$body=$message;
		
       return $this->send_mail($to,$from,$message,$headers);     
	
}


		function send_extended_link($email,$user,$cat){
		$sender="admin@fourfold.com.ng";
		$from="admin@fourfold.com.ng";
		$to=$email;
	   // $id=$this->generate_id($id);
		$message="You have been automatically registered for Amount Category {$cat} by {$user} on fourfold.com.ng. Visit  http://fourfold.com.ng to access your dashboard.";
		
	    //$message="<h2>From: ".$sender."</h2><br/>".$message;
	    $mail_options = array("sender" => $from,
        "to" => $to,
		"cc" => "admin@fourfold.com.ng,oaadedayo@gmail.com",
        "subject" => "Fourfold Integrated Resources",
		"textBody" => $message);
	
        $subject = "Fourfold Integrated Resources";

        $body = $message;
        date_default_timezone_set('Africa/Lagos');
        $boundary =md5(date('r', time())); 

        $headers = "From: admin@fourfold.com.ng";
		$body=$message;
		
       return $this->send_mail($to,$from,$message,$headers);     
	
}

/*
function send_sms($phone,$id,$pass){
$id=generate_id($id);
$message="You have been successfully registered on fourfold integrated resources. Your membership ID=".$id." and your temporary password is: ".$pass.". Go to www.fourfold.com to access your dashboard";
    $message=str_replace(" ","%20",$message);
     $url="http://thrillhousesms.com/components/com_spc/smsapi.php?username=oauifesu&password=Confidence@2&sender=GreatIfeApp@&recipient=@@+234".$phone."@@&message=".$message;
   
	$send_sms=file_get_contents($url);
}
*/
/*
function generate_id($id){

if(strlen($id)==6){
return $id;
}else{
$id="0".$id;
return generate_id($id);
}
} 
*/
public function get_acategory($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('amount_category');
                return $query->result_array();
        }
        $query = $this->db->get_where("amount_category", "acat_id='{$id}' OR acat_name='{$id}' ");
        return $query->row_array();
}


public function search_user($term)
{
        $query = $this->db->get_where("users", "name LIKE '%{$term}%' OR referral_id LIKE '%{$term}%' " );
        return $query->result_array();
}


public function get_user($id = FALSE)
{
//var_dump($id); exit;
        if ($id === FALSE)
        {
                $query = $this->db->get_where("users","referral_id <> 'u111j7373' ");
                return $query->result_array();
        }
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
}

public function get_state($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('states');
                return $query->result_array();
        }
        $query = $this->db->get_where('states', array('state_id' => $id));
        return $query->row_array();
}

public function get_entitlements($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('entitlement');
                return $query->result_array();
        }
        $query = $this->db->get_where('entitlement,users', array('entitlement.user_id' => $id,'users.id' => $id));
        return $query->result_array();
}

public function get_referrals($ref_id)
{
//var_dump($ref_id); exit;
        $query = $this->db->get_where('users', array('id' => $ref_id));
        $rid= $query->row_array();
      // var_dump($rid); exit;
        $query = $this->db->get_where('users', array('referred_by' => $rid['referral_id'],'amount_category'=>$rid['amount_category']));
        return $query->result_array();
}

public function get_referral_name($id)
{

        $query = $this->db->get_where('users', array('referral_id' => $id));
		$val=$query->row_array();
        return $val['name'];
}


public function increment_referral($ref_id,$amount_category){
    $query = $this->db->get_where('users', array('referral_id' => $ref_id,'amount_category'=>$amount_category));
     $res= $query->row_array();
	 $total=$res['number_of_referral'];
	 $ent=$res['entitlement_count'];
	 $total++;
	 $ent++;
	$this->db->where('referral_id', $ref_id);
    return $this->db->update('users', array('number_of_referral'=>$total,'entitlement_count'=>$ent));
}

public function add_user()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    unset($_POST['add_user']);
	$data=array();
	foreach($_POST as $key=>$value)
    $data[$key]=$value;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
    $query = $this->db->get_where('users', $data);
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
     $rf_id=$this->input->post('referred_by');
	/* if referral id and user category exists increment referral, else create another amount category for the referring user */
	if($this->referral_exist($this->input->post('referred_by')) && $rf_id!='u111j7373'){
	$qry = $this->db->get_where('users', array('referral_id' => $this->input->post('referred_by')));
	$refered_by=$qry->row_array();
	$qry = $this->db->get_where('users', array('referral_id' => $data['referred_by'],'amount_category'=>$data['amount_category']));
	$ref=$qry->row_array();
	//var_dump($ref); exit;
	if(empty($ref)){
	$refered_by['amount_category']=$data['amount_category'];
	$refered_by['number_of_referral']="0";
	$refered_by['entitlement_count']="0";
	$refered_by['entitlement_processed']="0";
	$refered_by['extended_reg']='1';
	$refered_by['date_added']=$data['date_added'];
	unset($refered_by['id']);
	//var_dump();
	$this->db->insert('users', $refered_by);
	$this->send_extended_link($refered_by['email'],$data['name'],$data['amount_category']);
	}else{
	
	$this->increment_referral($this->input->post('referred_by'),$data['amount_category']);
	}
	}
	
	$query = $this->db->get('users');
	$fetched = $query->result_array();
	$data['referral_id']=$this->generate_referral(count($fetched)+1);
	//var_dump($data['referral_id']); exit;
	$pass = substr(sha1((count($fetched)+1)."pass_user"),0,10);
	$data['temp_password']=$pass;
	$data['password']=sha1($pass);
	
	$this->send_link($data['email'],$data['referral_id'],$data['temp_password']);
	$this->send_sms($data['phone_number'],$data['referral_id'],$data['temp_password']);
    return $this->db->insert('users', $data);
}

function generate_referral($id){
//$done=true;
$gen_id=substr(sha1($id+1),0,10);
$i=1;
while($this->referral_exist($gen_id)){
$gen_id=substr(sha1($id+1),$i,$i+10);
$i++;
}
return $gen_id;
}

public function add_entitlement()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    unset($_POST['process_now']);
	unset($_POST['status']);
	$data=array();
	
	foreach($_POST as $key=>$value){
    if($key=="outlets"){
	unset($value[0]);
	$value=implode(",",$value);
	
	}
	$data[$key]=$value;
	}
	
	//var_dump($data); exit;
	$data['user_id']=$data['user_id'];
	unset($data['id']);
	
    $query = $this->db->get_where('entitlement', array('request_id'=>$data['request_id']));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
   if ($this->db->insert('entitlement', $data))
   return $this->settle($data['user_id']);
}


function settle($id){
    $this->db->where('id', $id);
	$query="entitlement_processed=(entitlement_processed+1),entitlement_count=(entitlement_count-5)";
    $done= $this->db->update('users', $query);
	$query="status='cleared'";
    return $this->db->update('entitlement_request', $query);
}

public function save_user()
{
    $this->load->helper('url');
	$id=$this->input->post('user_id');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    unset($_POST['save_user']);
	$data=array();
	foreach($_POST as $key=>$value)
    $data[$key]=$value;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	$this->db->where('id', $this->input->post('id'));
    return $this->db->update('users', $data);
}


public function delete_user($id)
{
	$this->db->where('id', $id);
    return $this->db->delete('users');
}

public function disable_user($id)
{
	$data=array('status'=>'disabled');
	$this->db->where('id', $id);
    return $this->db->update('users', $data);
}

public function enable_user($id)
{
	$data=array('status'=>'active');
	$this->db->where('id', $id);
    return $this->db->update('users', $data);
}


public function save_acategory()
{

//var_dump($this->input->post('id')); exit;
    $this->load->helper('url');
	$id=$this->input->post('acat_id');
    unset($_POST['save_acategory']);
	$data=array();
	foreach($_POST as $key=>$value)
    $data[$key]=$value;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	$this->db->where('acat_id', $this->input->post('acat_id'));
    return $this->db->update('amount_category', $data);
}

public function user_login()
{
    unset($_POST['login']);
	$data=array();
	foreach($_POST as $key=>$value){
    if($key=="password")
	$data[$key]=sha1($value);
	else
	 $data[$key]=$value;
	}
	//var_dump($data); exit;
	$data['status']='active';
	//var_dump($data);exit;
	 $query = $this->db->get_where('users', $data);
	 //var_dump($query); exit;
	 $result=$query->row_array();

	 return $query->row_array();
	// else return false;
}

public function referral_exist($ref_id){
        $query = $this->db->get_where('users', array('referral_id' => $ref_id));
        $result=$query->row_array();
		//var_dump($ref_id); exit;
		if(!empty($result))
		return true;
		return false;
}


public function check_password_correct($id,$pass){
        $query = $this->db->get_where('users', array('id' => $id,'password'=>sha1($pass)));
        $result=$query->row_array();
		//var_dump($ref_id); exit;
		if(!empty($result))
		return true;
		return false;
}


public function email_exist($email,$amt_cat){
        $query = $this->db->get_where('users', array('email' => $email,'amount_category'=>$amt_cat));
        $result=$query->row_array();
		if(!empty($result))
		return true;
		return false;
}

public function reg_exist($ref_id,$amt_cat){
        $query = $this->db->get_where('users', array('referral_id' => $ref_id,'amount_category'=>$amt_cat));
        $result=$query->row_array();
		if(!empty($result))
		return true;
		return false;
}

public function delete_acategory($id)
{
	$this->db->where('acat_id', $id);
    return $this->db->delete('amount_category');
}

public function add_acategory()
{
    $this->load->helper('url');
    unset($_POST['add_acategory']);
	$data=array();
	foreach($_POST as $key=>$value)
    $data[$key]=$value;
	date_default_timezone_set('Africa/Lagos');
  
  /*
  $sql="CREATE TABLE amount_category (acat_id INT(10) AUTO_INCREMENT,";
	foreach($_POST as $key=>$value)
	$sql.=$key." VARCHAR(255), ";
	$sql.=" date_added VARCHAR (100), PRIMARY KEY (acat_id) );";
	var_dump($this->db->query($sql)); exit;
	//if($key=="outlets")
	//$value=implode(",",$value);
  */
    $query = $this->db->get_where('amount_category', array('acat_name'=>$data['acat_name']));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
	$data['date_added']=date("d/m/Y h:i:s");
    return $this->db->insert('amount_category', $data);
}

public function changepass()
{
	$id=$this->input->post('user_id');

	$data=array();
    $data['password']=sha1($this->input->post('newpass1'));
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	$this->db->where('id', $id);
    return $this->db->update('users', $data);
}

public function is_referral_pending($user_id){
$query = $this->db->get_where('entitlement_request', array('user_id'=>$user_id,'status'=>'pending'));
$fetched = $query->row_array();
if($fetched!=null)
return true;
return false;
}
	

public function request_entitlement()
{
    //$this->load->helper('url');
    unset($_POST['request_now']);
	unset($_POST['next_pag']);
	$data=array();
	foreach($_POST as $key=>$value){
    $data[$key]=$value;
	if($key=="product_category")
	$data[$key]=implode(",",$value);
	}
	//var_dump($this->db->query($sql)); exit;
	
	
    $query = $this->db->get_where('entitlement_request', $data);
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
	date_default_timezone_set('Africa/Lagos');
    $data['date']=date("d/m/Y h:i:s");
    return $this->db->insert('entitlement_request', $data);
}

	public function get_entitlement_requests($id=FALSE)
{
//var_dump($id); exit;
 if ($id === FALSE)
        {
                 $query = $this->db->get_where("entitlement_request,users", "entitlement_request.status='pending' AND users.id=entitlement_request.user_id " );
                return $query->result_array();
        }
        $query = $this->db->get_where("entitlement_request,users", "entitlement_request.request_id='{$id}' AND entitlement_request.status='pending' AND users.id=entitlement_request.user_id " );
        return $query->row_array();
}


public function send_mail($to,$subject,$headers){	
 try {
    @mail($to, $subject, $body, $headers);
	//var_dump("yes");
return true;
} catch (InvalidArgumentException $e) {
//var_dump("no");
 return false;
}
}

function send_sms($phone,$id,$pass){
$phone=ltrim($phone,"0");
$message="You have been successfully registered with fourfold integrated resources. Your membership ID=".$id." and temporary password is: ".$pass.". Go to www.fourfold.com.ng to access your dashboard";
    $message=str_replace(" ","%20",$message);
     $url="http://thrillhousesms.com/components/com_spc/smsapi.php?username=oauifesu&password=Confidence@2&sender=FourfoldResources@&recipient=@@+234".$phone."@@&message=".$message;
   //var_dump($url); exit;
    try {
    return @file_get_contents($url);
    } catch (InvalidArgumentException $e) {
    return false;
   }

}

}