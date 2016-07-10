<?php
class Users extends CI_Controller {
public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();
				$this->load->model('users_model');	
                $this->load->model('product_model');
				$this->load->model('outlet_model');
				//$this->load->helper(array('form', 'url'));			
        }

		public function admin_view($page = 'home')
        {
		//var_dump($page);
		 if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
	
        $data['title'] = ucfirst($page); // Capitalize the first letter
		if($page!="login")
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/'.$page, $data);
        $this->load->view('templates/admin_footer', $data);
        }
		
		
			public function refer($ref_id = NULL)
        {
		//var_dump($page);
        $ref_exist=$this->users_model->refferal_exist($ref_id);
		if($ref_exist)
		$_SESSION['referred_by']=$ref_id;
	
        $data['title'] = ucfirst($page); // Capitalize the first letter
		if($page!="login")
        $this->load->view('templates/admin_header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/admin_footer', $data);
        }
		
		
		public function view($page = 'home')
        {
		//var_dump($page);
		 if ( ! file_exists(APPPATH.'/views/admin/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
	
        $data['title'] = ucfirst($page); // Capitalize the first letter
		if($page!="login")
        $this->load->view('templates/admin_header', $data);
	
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/admin_footer', $data);
        }
		
		
public function add_user($subpage=null)
{

if($this->input->post('process')!=null){
	 $this->process_entitlement($this->input->post('id'));
	  //exit;
}else{
	 
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add new user';
	$data['acat']=$this->users_model->get_acategory();
	 
	if($this->input->post('id')!=null){
	 $data['item']=$this->users_model->get_user($this->input->post('id'));
	 }
	 if($this->input->post('edit')!=null){
	 $data['title'] = 'Edit user';
	 $data['item']=$this->users_model->get_user($this->input->post('id'));
	 }else if($this->input->post('delete')!=null){
	 $data['update']=$this->users_model->delete_user($this->input->post('id'));
	 }else if($this->input->post('disable')!=null){ 
	 $data['update']=$this->users_model->disable_user($this->input->post('id'));
	 }else if($this->input->post('enable')!=null){ 
	 $data['update']=$this->users_model->enable_user($this->input->post('id'));
	 }else{
	 
	$email= $this->input->post('email');
	$amount_category= $this->input->post('amount_category');
	$this->form_validation->set_rules('name', 'name', 'required');
    $this->form_validation->set_rules('email', 'email', 'required');
	$this->form_validation->set_rules('amount_category', 'amount category', 'required');
	//var_dump($this->users_model->email_exist($email)); exit;
	
	/*Check if the user is already registered in the selected amount category */
	if($this->input->post('id')==null){
	if($this->users_model->email_exist($email,$amount_category))
	$this->form_validation->set_rules('email exist', 're is a user with this email and same amount category. The ', 'required');
	}
	
	if($this->input->post('id')!=null){
	if($this->users_model->reg_exist($this->input->post('referral_id'),$this->input->post('amount_category')))
	$this->form_validation->set_rules('user', 'user is already registered in the selected amount category, .The', 'required');
	}
	
	if(!$this->users_model->referral_exist($this->input->post('referred_by')))
	$this->form_validation->set_rules('No referral', 're is no user with this referral id, you can use <span style="color:blue">u111j7373</span> if the user is not referred by anybody. The', 'required');
    $this->form_validation->set_rules('phone_number', 'phone number', 'required');
	}
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		if($this->input->post('delete')!=null || $this->input->post('disable')!=null || $this->input->post('enable')!=null ){
		$data['users']=$this->users_model->get_user();
		$this->load->view('admin/users',$data);
		}else{
		$this->load->view('admin/add_user');
      }
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_user')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The user has been successfully added"; 
       $done=$this->users_model->add_user();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Add user"; 
	   $data['error']="The user already exist";
	   $this->load->view('admin/add_user',$data);   
	   }

	}elseif($this->input->post('save_user')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The user information has been successfully updated"; 
       $done=$this->users_model->save_user();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit user"; 
	   $data['error']="The user information could not be saved";
	   $this->load->view('admin/add_user',$data);   
	   }

	}
   }
  $this->load->view('templates/admin_footer');
}  
}

/* Add amount category */
public function add_acategory($subpage=null)
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add new amount category';
	 if($this->input->post('edit')!=null){
	 $data['title'] = 'Edit amount category';
	 $data['item']=$this->users_model->get_acategory($this->input->post('id'));
	 }else if($this->input->post('delete')!=null){
	 $this->users_model->delete_acategory($this->input->post('id'));
	 }else{
	 
	 
	$this->form_validation->set_rules('acat_name', 'category name', 'required');
    $this->form_validation->set_rules('price', 'amount', 'required');
	$this->form_validation->set_rules('entitlement', 'entitlement', 'required');
	if(!is_numeric($this->input->post('price')) )
	$this->form_validation->set_rules('price & ', 'price must be numeric and the ', 'required');
	if( !is_numeric($this->input->post('entitlement')) )
	$this->form_validation->set_rules('price & entitlement', 'entitlement must be numeric and the ', 'required');
	}
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		if($this->input->post('delete')!=null){
		$data['users']=$this->users_model->get_acategory();
		$this->load->view('admin/amount_category',$data);
		}else{
		$this->load->view('admin/add_acategory');
      }
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_acategory')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The amount category has been successfully added"; 
       $done=$this->users_model->add_acategory();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Add amount category"; 
	   $data['error']="The amount category already exist";
	   $this->load->view('admin/add_acategory',$data);   
	   }

	}elseif($this->input->post('save_acategory')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The amount category information has been successfully updated"; 
       $done=$this->users_model->save_acategory();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	  // $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit amount category"; 
	   $data['error']="The amount category information could not be saved";
	   $this->load->view('admin/add_acategory',$data);   
	   }

	}
   }
  $this->load->view('templates/admin_footer');   
}



/* Add amount category */
public function process_entitlement($id=FALSE)
{

if(!$id)
$id=$this->input->post('request_id');
if($id==null)
header('location:users');
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Process Entitlement';
	$data['item']=$this->users_model->get_entitlement_requests($id);
	if(!isset($data['item']))
	header('location:entitlement_requests');
	
	
	$data['item']['outlets']=$this->outlet_model->get_outlet(); 
	

	 if($this->input->post('process_now')!=null){
	// var_dump($_POST); exit;
	 $type=$this->input->post('type');
	 if($type=="product"){
	 $this->form_validation->set_rules('products', 'Products', 'required');
     //$this->form_validation->set_rules('price', 'Worth of products (price)', 'required');
	 $this->form_validation->set_rules('outlets[]', 'Product outlet', 'required');
	 }
	 $this->form_validation->set_rules('date_collected', 'Date collected', 'required');
	 $this->form_validation->set_rules('status', 'approve entitlement', 'required');
	
	 }
	//}
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		$this->load->view('admin/process_entitlement',$data);
		//$this->load->view('templates/admin_footer');
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('process_now')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The entitlement been successfully processed"; 
       $done=$this->users_model->add_entitlement();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	  // $data['item']=$this->users_model->get_entitlement_requests($id);
	//var_dump($data);exit;
	   //$data['item']['outlets']=$this->outlet_model->get_outlet(); 
	   //var_dump($data); exit;
	   $data['title'] = "Process Entitlement"; 
	   $data['error']="The entitlement has already been added";
	   $this->load->view('admin/process_entitlement',$data);   
	   }

	}else{
	  // $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Process Entitlement"; 
	   $data['error']="The entitlement could not be processed";
	   $this->load->view('admin/process_entitlement',$data);   
	   }

	}

  $this->load->view('templates/admin_footer');   
}


public function list_users(){
 $this->load->helper('form');
 $data['title'] = 'All users';
 $data['users']=$this->users_model->get_user();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/users');
        $this->load->view('templates/admin_footer');
}

public function search_user($term){
 $this->load->helper('form');
 $data['title'] = 'Search Result';
 $data['users']=$this->users_model->search_user($term);

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/users');
        $this->load->view('templates/admin_footer');
}


public function list_acategory(){
 $this->load->helper('form');
 $data['title'] = 'All Amount Categories';
 $data['category']=$this->users_model->get_acategory();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/amount_category');
        $this->load->view('templates/admin_footer');
}


public function user_login()
{
//var_dump("ok"); exit;
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Login';
	
	$data['products']=$this->product_model->get_product();
    $data['amount_category']=$this->users_model->get_acategory();
	$data['product_category']=$this->product_model->get_pcategory();

    $this->form_validation->set_rules('referral_id', 'Membership ID', 'required');
	$this->form_validation->set_rules('amount_category', 'amount category', 'required');
	$this->form_validation->set_rules('password', 'password', 'required');
  
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);		
		$this->load->view('pages/home');
      
    }
    else
    {
	$done=false;
	//var_dump($_POST); exit;
	if($this->input->post('login')!=null){
	   $this->load->view('templates/header', $data);
	   $data['title'] = "Login"; 
       $done=$this->users_model->user_login();
	 // var_dump($done); exit;
	   if(!empty($done)){
	   $_SESSION['user_data']=$done;
	   
	   $data['referral_history']=$this->users_model->get_referrals($done['id']);
	    //var_dump($data['referral_history']); exit;
	   $data['entitlement_history']=$this->users_model->get_entitlements($done['id']);
	  
       $this->load->view('pages/dashboard',$data);
	    header('location:dashboard');
	   }else{
	   //$data['title'] = "Add user"; 
	   $data['error']="Invalid ID or password";
	   $this->load->view('pages/home',$data);   
	   }

	}else{
	//var_dump("here"); exit;
	    $this->load->view('templates/header', $data);		
		$this->load->view('pages/home');
	}
   }
  $this->load->view('templates/footer');   
}



public function changepass()
{
//var_dump("ok"); exit;
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Change password';

    $this->form_validation->set_rules('current_pass', 'current password', 'required');
	$this->form_validation->set_rules('newpass1', 'new password', 'required');
	$this->form_validation->set_rules('newpass2', 're-type new password', 'required');
	if($this->input->post()!=null){
	if(!$this->users_model->check_password_correct($this->input->post('user_id'),$this->input->post('current_pass')))
	$this->form_validation->set_rules('original', 'current password is not correct and the', 'required');
	}
	
  
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/header', $data);		
		$this->load->view('pages/changepass');
      
    }
    else
    {
	$done=false;
	  $done=$this->users_model->changepass();
	   if($done){
	   $data['title'] = "The password has been successfully changed"; 
	   $this->load->view('templates/header', $data);	
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Change password"; 
	   $data['error']="The password could not be added";
       $this->load->view('templates/header', $data);		
	   $this->load->view('pages/changepass');	   
	   }
	 
	
   }
  $this->load->view('templates/footer');   
}




function get_entitlement($id){
$data=$this->users_model->get_entitlements($id); 
echo json_encode($data,true);
}


	public function request_entitlement()
    {
	$data['product_category']=$this->product_model->get_pcategory();
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Partnership Form';
	//$data['product_category']=$this->product_model->get_pcategory();
     //var_dump($_POST);exit;
	
	  $type= $this->input->post('type');
	  //var_dump($_POST); exit;
	  if($type=="cash"){
	  $this->form_validation->set_rules('account_name', 'Account name', 'required');
	   $this->form_validation->set_rules('account_number', 'Account number', 'required');
	   $this->form_validation->set_rules('bank_name', 'Bank name', 'required');
	   }else{
	    $this->form_validation->set_rules('product_category[]', 'Product category', 'required');
		}
	
	 
	
    if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('templates/header', $data);
		$this->load->view('pages/entitlement_request');
      
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('request_now')!=null){
	   $this->load->view('templates/header', $data);
	   $data['title'] = "Entitlement request has been successfully sent. We will get back to you as soon as the request has been reviewed "; 
       $done=$this->users_model->request_entitlement();
	   if($done){
       $this->load->view('pages/success',$data);
	   }else{
	   $data['title'] = "Entitlement Request Form"; 
	   $data['error']="A company with this name already exist on our system";
	   $this->load->view('pages/entitlement_request',$data);   
	   }

	}elseif($this->input->post('save_now')!=null){
	   $this->load->view('templates/header', $data);
	   $data['title'] = "Request information has been successfully updated"; 
       $done=$this->users_model->save_entitlemet_request();
	   if($done){
       $this->load->view('pages/success',$data);
	   }else{
	  // $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit Entitlement request information"; 
	   $data['error']="Entitlement request could not be saved";
	   $this->load->view('pages/entitlement_request',$data);   
	   }

	}
   }
   $this->load->view('templates/footer');   
}

public function list_entitlement_requests(){
 $this->load->helper('form');
 $data['title'] = 'Entitlement Requests';
 $data['outlets']=$this->users_model->get_entitlement_requests();

        $this->load->view('templates/admin_header', $data);
		//var_dump("yar"); exit;
        $this->load->view('admin/entitlement_requests');
        $this->load->view('templates/admin_footer');
}

public function list_entitlements(){
 $this->load->helper('form');
 $data['title'] = 'Entitlements';
 $data['outlets']=$this->users_model->get_entitlements();

        $this->load->view('templates/admin_header', $data);
		//var_dump("yar"); exit;
        $this->load->view('admin/entitlements');
        $this->load->view('templates/admin_footer');
}

}
