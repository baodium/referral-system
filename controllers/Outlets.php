<?php
class Outlets extends CI_Controller {
public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();

				$this->load->model('outlet_model');
				$this->load->model('product_model');
				
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
		

		
	public function add_outlet()
    {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add new outlet';
	$data['product_category']=$this->product_model->get_pcategory();
     //var_dump($_POST);exit;
	 if($this->input->post('edit')!=null){
	 $data['title'] = 'Edit outlet';
	 $data['item']=$this->outlet_model->get_outlet($this->input->post('id'));
	 }else if($this->input->post('delete')!=null){
	 $this->outlet_model->delete_outlet($this->input->post('id'));
	 }else{ 
	  $email= $this->input->post('email');
	 $this->form_validation->set_rules('name', 'name', 'required');
	 if($this->outlet_model->email_exist($email))
	$this->form_validation->set_rules('email exist', 'contact email already exist and the ', 'required');
	 }
    if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('templates/admin_header', $data);
		if($this->input->post('delete')!=null)
	     $this->load->view('admin/outlets');
	    else
		$this->load->view('admin/add_outlet');
      
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_outlet')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The outlet been successfully added"; 
       $done=$this->outlet_model->add_outlet();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Add outlet"; 
	   $data['error']="The product category already exist";
	   $this->load->view('admin/add_outlet',$data);   
	   }

	}elseif($this->input->post('save_outlet')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The outlet information has been successfully updated"; 
       $done=$this->outlet_model->save_outlet();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	  // $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit outlet"; 
	   $data['error']="The outlet information could not be saved";
	   $this->load->view('admin/add_outlet',$data);   
	   }

	}
   }
   $this->load->view('templates/admin_footer');   
}


	public function add_company()
    {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Partnership Form';
	$data['product_category']=$this->product_model->get_pcategory();
     //var_dump($_POST);exit;
	
	  $email= $this->input->post('email');
	  $this->form_validation->set_rules('name', 'Company name', 'required');
	   $this->form_validation->set_rules('state', 'State', 'required');
	    $this->form_validation->set_rules('email', 'Email', 'required');
	    $this->form_validation->set_rules('lga', 'Local government area', 'required');
		 $this->form_validation->set_rules('product_category[]', 'Product category', 'required');
	  $this->form_validation->set_rules('phone_number', 'Contact phone', 'required');
	  if($this->outlet_model->email_exist($email))
	  $this->form_validation->set_rules('email exist', 'Contact email already exist and the ', 'required');
	
    if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('templates/header', $data);
		$this->load->view('pages/partnership_form');
      
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_outlet')!=null){
	   $this->load->view('templates/header', $data);
	   $data['title'] = "Partnership request has been successfully sent. We will get back to you as soon as the request has been reviewed "; 
       $done=$this->outlet_model->add_outlet();
	   if($done){
       $this->load->view('pages/success',$data);
	   }else{
	   $data['title'] = "Partnership Form"; 
	   $data['error']="A company with this name already exist on our system";
	   $this->load->view('pages/partnership_form',$data);   
	   }

	}elseif($this->input->post('save_outlet')!=null){
	   $this->load->view('templates/header', $data);
	   $data['title'] = "Company information has been successfully updated"; 
       $done=$this->outlet_model->save_outlet();
	   if($done){
       $this->load->view('pages/success',$data);
	   }else{
	  // $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit Company Information"; 
	   $data['error']="Company information could not be saved";
	   $this->load->view('pages/partnership_form',$data);   
	   }

	}
   }
   $this->load->view('templates/footer');   
}

public function list_outlets(){
 $this->load->helper('form');
 $data['title'] = 'Outlets';
 $data['outlets']=$this->outlet_model->get_outlet();

        $this->load->view('templates/admin_header', $data);
		//var_dump("yar"); exit;
        $this->load->view('admin/outlets');
        $this->load->view('templates/admin_footer');
}

public function list_partnership_request(){
 $this->load->helper('form');
 $data['title'] = 'Partnership Requests';

        $this->load->view('templates/admin_header', $data);
		//var_dump("yar"); exit;
  if($this->input->post('approve')!=null){
  $id=$this->input->post('id');
   $done=$this->outlet_model->approve_outlet($id);
   }
   
    if($this->input->post('reject')!=null){
  $id=$this->input->post('id');
   $done=$this->outlet_model->reject_outlet($id);
   }
   
      $data['outlets']=$this->outlet_model->get_partnership_requests();
	  //var_dump($data); exit;

        $this->load->view('admin/partnership_requests',$data);
        $this->load->view('templates/admin_footer');
}

public function get_outlets(){
 $this->load->helper('form');
 $data['title'] = 'Outlets';
 $data['outlets']=$this->outlet_model->get_outlet();
 $data['products']=$this->product_model->get_product();
 $data['product_category']=$this->product_model->get_pcategory();
        $this->load->view('templates/header', $data);
		//var_dump("yar"); exit;
        $this->load->view('pages/outlets');
        $this->load->view('templates/footer');
}


function get_state(){
echo $this->outlet_model->get_state();
}



function get_lga($state_id){
echo $this->outlet_model->get_lga($state_id);
}

	




}
