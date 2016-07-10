<?php
class Products extends CI_Controller {
public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();

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
		
		
	    public function view($cat = 'all')
        {
		//var_dump($cat); exit;
		//var_dump($page);

	    $data['title']="Products";
        $data['category'] = ucfirst($cat); // Capitalize the first letter
	    $data['products']=$this->product_model->get_product_by_category($cat);
		$data['product_category']=$this->product_model->get_pcategory();
        $this->load->view('templates/header', $data);
        $this->load->view('pages/products', $data);
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
	 $data['item']=$this->product_model->get_pcategory($this->input->post('id'));
	 }else if($this->input->post('delete')!=null){
	 $this->product_model->delete_pcategory($this->input->post('id'));
	
	 }else{ 
	 $this->form_validation->set_rules('name', 'name', 'required');
	 }
    if ($this->form_validation->run() === FALSE)
    {

        $this->load->view('templates/admin_header', $data);
		if($this->input->post('delete')!=null)
	     $this->load->view('admin/pcategory');
	    else
		$this->load->view('admin/add_pcategory');
      
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('add_pcategory')!=null){
	   $this->load->view('templates/admin_header', $data);
	   $data['title'] = "The product category has been successfully added"; 
       $done=$this->product_model->add_pcategory();
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
       $done=$this->product_model->save_pcategory();
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

public function list_pcategory(){
 $this->load->helper('form');
 $data['title'] = 'All categories';
 $data['category']=$this->product_model->get_pcategory();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pcategory');
        $this->load->view('templates/admin_footer');
}

public function list_products(){
 $this->load->helper('form');
 $data['title'] = 'Products';
 $data['products']=$this->product_model->get_product();
 $data['product_category']=$this->product_model->get_pcategory();
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/product');
        $this->load->view('templates/admin_footer');
}


	public function add_product()
    {
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add new product';
    // var_dump("yess");exit;
	$data['outlets']=$this->outlet_model->get_outlet();
	$data['pcategory']=$this->product_model->get_pcategory();
	//var_dump($data['pcategory']); exit;
	 if($this->input->post('edit')!=null){
	 $data['title'] = 'Edit product';
	 $data['item']=$this->product_model->get_product($this->input->post('id'));
	 }else if($this->input->post('delete')!=null){
	 
	 $this->product_model->delete_product($this->input->post('id'));
	  $data['products']=$this->product_model->get_product();
	 }else{ 
	 $this->form_validation->set_rules('p_name', 'product name', 'required');
	 $this->form_validation->set_rules('price', 'product price', 'required');
	 $this->form_validation->set_rules('description', 'product description', 'required');
	 }
	 
    if ($this->form_validation->run() === FALSE)
    {
	//var_dump("Here"); exit;

        $this->load->view('templates/admin_header', $data);
		if($this->input->post('delete')!=null)
	     $this->load->view('admin/product');
	    else
		$this->load->view('admin/add_product',$data);    
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	
	if($this->input->post('add_product')!=null){
	   $this->load->view('templates/admin_header', $data);
	   
       $rep=$this->uploader("/product?","gif|jpg|png|jpeg");
	   
       $done=$this->product_model->add_product();
	   if($done){
	   $data['title'] = "The product has been successfully added";
       $this->load->view('admin/success',$data);
	   }else{
	   $data['title'] = "Add product"; 
	   $data['error']="The product already exist";
	   $this->load->view('admin/add_product',$data);   
	   }

	}elseif($this->input->post('save_product')!=null){
	   $this->load->view('templates/admin_header', $data);
	   
	   $rep=$this->uploader("/product?","gif|jpg|png|jpeg");
	   
	   $data['title'] = "The product information has been successfully updated"; 
       $done=$this->product_model->save_product();
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	   //$data['user_id']=$this->input->post('user_id');
	   $data['title'] = "Edit product "; 
	   $data['error']="The product information could not be saved";
	   $this->load->view('admin/add_product',$data);   
	   }

	}
   }
   //var_dump("yep");exit;
   $this->load->view('templates/admin_footer');   
}

public function uploader($url,$formats){

	   $field_name = "file";
	   $config['upload_path']          = $url;	  
       $config['allowed_types']        = $formats;
       $config['max_size']             = 10000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	
	$this->load->library('upload', $config);             
            
    if ( ! $this->upload->do_upload())
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			  // $_POST['file']="";
			   return $data['error'];
               //$this->load->view('admin/add_product',$data);
        }
          else
        {
				
				 $detail = array('upload_data' => $this->upload->data());
				 //var_dump($detail); exit;
				 $_POST['file']=$detail["upload_data"]["file_name"];
				 return "success";
	    }
}






}
