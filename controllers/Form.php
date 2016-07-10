<?php
class Form extends CI_Controller {

        public function __construct()
        {
               // parent::__construct();
				parent::__construct();
				session_start();
                $this->load->model('prend_model');
				$this->load->model('users_model');
				$this->load->model('news_model');
				$this->load->model('admin_model');
        }

 public function index()
        {

        $this->load->helper('form');

        }
		
     public function view($id = NULL,$data=null)
{
 $this->load->helper('form','url');
    $this->load->library('form_validation');
        date_default_timezone_set('Africa/Lagos');
	    $form_det=$this->admin_model->get_form($id);
       // var_dump($id); exit;
        if (empty($form_det))
        {
                show_404();
        }
		
		 $data['pages']=$this->admin_model->get_page();
        if($data['pages']!=null){
        $i=0;
        foreach($data['pages'] as $pg){
        $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($pg['id']);
        $i++;
        }
        }
        $data['page_info']=null;
		$data['news']=$this->news_model->get_news();
        $data['title'] = $form_det['title'];
        $data['form_detail']=$form_det;		
        $this->load->view('templates/header', $data);
        $this->load->view('templates/form_default', $data);
        $this->load->view('templates/footer');
      }
	  
	  public function detail($id = NULL)
{
//var_dump($id); exit;
        date_default_timezone_set('Africa/Lagos');
        $data['form_item'] = $this->admin_model->get_form_detail($id);

		
		$data['form_name']=$this->admin_model->get_form_name($id);
		//var_dump($data['form_name']);

        $data['title'] = 'Form Detail <br/>('.$data['form_name']['title'].')';
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/forms', $data);
        $this->load->view('templates/admin_footer');
      }
	  
	   public function print_detail($hash = NULL,$data=null)
{
          date_default_timezone_set('Africa/Lagos');
	    $status=$this->admin_model->get_prend_status(date("Y"));
		$data['prend_status']=$status;
        $data['prend_detail'] = $this->prend_model->get_prend_detail_by_hash($hash);
		//var_dump($data['prend_detail']);
        if (empty($data['prend_detail']))
        {
                show_404();
        }
        $data['pages']=$this->admin_model->get_page();
        if($data['pages']!=null){
        $i=0;
        foreach($data['pages'] as $page){
        $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
        $i++;
        }
        }
        $data['title'] = 'Pre ND Detail';
        $this->load->view('templates/header', $data);
        $this->load->view('pages/prend_print', $data);
        $this->load->view('templates/admin_footer');
      }
	  
	  
	  		
	public function process_form()
    {
    $this->load->helper('form','url');
    $this->load->library('form_validation');
   
	date_default_timezone_set('Africa/Lagos');	

	$id=$_POST['form_id'];
	    $data['pages']=$this->admin_model->get_page();
        if($data['pages']!=null){
        $i=0;
        foreach($data['pages'] as $pg){
        $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($pg['id']);
        $i++;
        }
        }
		
		$data['schools']=$this->admin_model->get_school();
        if($data['schools']!=null){
        $i=0;
        foreach($data['schools'] as $sch){
        $data['schools'][$i]['dept']=$this->admin_model->get_department($sch['id']);
        $i++;
        }
        }
		//var_dump($_POST); exit;
	foreach($_POST as $key=>$val){
	$this->form_validation->set_rules($key, ucwords($key), 'required');
	}
	 $stack=array();
    
	//var_dump($_FILES); exit;
	foreach($_POST as $key=>$val){
	$data[$key]=$val;
	}
     $data['error']='';
	 
    if ($this->form_validation->run() === FALSE)
    {
	$stack[]=false;
    $this->view($_POST['form_id']);
    }
    else
    {
	      if(!empty($_FILES)){
		 //var_dump($_FILES);
		  foreach($_FILES as $key=>$value){
		  $url='/form?';
		  $field_name = $_FILES[$key]['name'];//"passport";
		  //}
		  $config['upload_path']          = $url;
		  
		  $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 100;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;				
					//var_dump($_FILES);exit;
					//var_dump($config);
	            $this->load->library('upload', $config);             
                if ( ! $this->upload->do_upload($field_name))
                {
				$stack[]=false;
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST[$key]=$detail["upload_data"]["file_name"];
				 
                  $stack[]=true;     					
                }	  
		  }
		  }else{

		        $data['title'] = "<b>You have successfully registered!</b><br/><h4>We will get in touch as soon your application has been processed</h4> "; 
                $done=$this->users_model->submit_form($_POST['form_id']);
				if($done){
	            $this->load->view('templates/header', $data);
                $this->load->view('admin/success',$data);
	            $this->load->view('templates/footer');
				}else{
				$data['error']="You have already registered!";
				$this->view($id,$data);
				}
		   }		  
		  
		
	}	
	      
    }
	  
	  
}