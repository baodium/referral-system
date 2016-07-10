<?php
class Pages extends CI_Controller {
public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();
                $this->load->model('users_model');
				$this->load->model('admin_model');
				$this->load->model('news_model');
				$this->load->model('product_model');
				$this->load->model('outlet_model');
				
				//$this->load->helper(array('form', 'url'));
				
        }
			
	public function logout(){
	unset($_SESSION['user_data']);
	$this->view('home');
	}
	
 	public function view($page = 'home')
        {
		//var_dump($page); exit;
		   $this->load->helper('form');
           $this->load->library('form_validation');
		//var_dump($page);
		 if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }
	    $data['amount_category']=$this->users_model->get_acategory();
		$data['gallery']=$this->news_model->get_gallery();
		$data['product_category']=$this->product_model->get_pcategory();
        $data['title'] = ucfirst($page); // Capitalize the first letter
		if($page=="home"){
		$data['products']=$this->product_model->get_product();	
		}
		
	  // var_dump($_SESSION['user_data']); exit;
		if(!isset($_SESSION['user_data'])){
		
		}else{
		$data['referral_history']=$this->users_model->get_referrals($_SESSION['user_data']['referral_id']);
	    $data['entitlement_history']=$this->users_model->get_entitlements($_SESSION['user_data']['id']);
		//var_dump($data); exit;
		}
		
		if($page!="login")
        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
        }	

public function detail($slug)
        {
		//var_dump($page);
		$product=$this->product_model->get_product_by_slug($slug);
		if($product!=null){
		$outlets=explode(",",$product['outlets']);
		foreach($outlets as $outlet){
		$data['poutlets'][]=$this->outlet_model->get_outlet($outlet);
		}
		}
		 if ( $product==null)
        {
                show_404();
        }
	    $data['product_detail']=$product;
		 $data['amount_category']=$this->users_model->get_acategory();
		$data['product_category']=$this->product_model->get_pcategory();
        $data['title'] ="Detail" ; // Capitalize the first letter
		
        $this->load->view('templates/header', $data);
        $this->load->view('pages/detail', $data);
        $this->load->view('templates/footer', $data);
        }			

 public function add_pcategory()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add new product category';
     //var_dump($_POST);exit;
	 if($this->input->post('edit')!=null){
	 $data['title'] = 'Edit product category';
	 $data['item']=$this->admin_model->get_pcategory($this->input->post('id'));
	 }else{
	  
	$this->form_validation->set_rules('name', 'name', 'required');

	}
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		$this->load->view('admin/add_pcategory');
      
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_pcategory')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The product category has been successfully added"; 
       $done=$this->admin_model->add_user();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Add product category"; 
	   $data['error']="The product category already exist";
	   $this->load->view('admin/add_pcategory',$data);   
	   }

	}elseif($this->input->post('save_pcategory')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The product category information has been successfully updated"; 
       $done=$this->admin_model->save_user();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   $data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit product category"; 
	   $data['error']="The product category information could not be saved";
	   $this->load->view('admin/add_pcategory',$data);   
	   }

	}
   }
  $this->load->view('templates/admin_footer');   
}

}
