<?php
include "Products.php";
include "Users.php";
include "Outlets.php";
class Myadmin extends CI_Controller {
//$product;
       public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();
                $this->load->model('news_model');
				$this->load->model('admin_model');
				
				//$this->load->model('users_model');
				//$this->load->model('product_model');
				//$this->product=new products();
				//$this->product= new Products();
				//$this->user= new Users();
				//$this->load->controller('products');
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
        $this->load->view('admin/'.$page, $data);
        $this->load->view('templates/admin_footer', $data);
        }
	
public function logout()
{
unset($_SESSION['admin']);
header('location:login');
}
	
	
public function login()
{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $data['title'] = 'Login';
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE)
    {
        //$this->load->view('templates/admin_header', $data);
		$this->load->view('admin/login');
        //$this->load->view('templates/admin_footer');
    }
    else
    {
	
    $admin_detail= $this->admin_model->admin_login();
	if($admin_detail==null){
	$data['done'] = false; 
	$data['title'] = "Invalid username or password";
    $this->load->view('admin/login',$data);
	//$this->load->view('templates/admin_footer');
	}else{
	$_SESSION['admin']=$admin_detail;
	header('location:'.$this->config->config['base_url'].'myadmin/entitlement_requests');

    }
   }
}	
		
public function create_news()
{
	
	 $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Create a news item';
	$data['error'] = '';
	 unset($data['item']);
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Body', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_news',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$url="/news?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload())
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			  // $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_news',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['image']=$detail["upload_data"]["file_name"];
				 //$_POST['id']=$id;
                 $data['done'] = true; 
	             $data['title'] = "Create News"; 
                 $done=$this->news_model->set_news();
				 if($done){
				 $data['news']=$this->news_model->get_news();
				 $this->load->view('templates/admin_header', $data);
				 $this->load->view('admin/news',$data); 
                 $this->load->view('templates/admin_footer');
                 
				 }else{
				 $data['error'] = "You have already added this event";
				  $this->load->view('templates/admin_header', $data);
				  $this->load->view('admin/create_news',$data);
                  $this->load->view('templates/admin_footer');
				  
				 }
                }	  

    }	
}




public function create_event()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add event';
	$data['error'] = '';
	 unset($data['item']);
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_event',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$url="/gallery?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload())
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_event',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				// var_dump($detail);
				 $_POST['image']=$detail["upload_data"]["file_name"];
				 //var_dump($_POST);
                 $data['done'] = true; 
	             $data['title'] = "Event gallery"; 
                 $done=$this->admin_model->set_event();
				 if($done){
				 $data['galleries']=$this->admin_model->get_event();
				 $this->load->view('templates/admin_header', $data);
				 $this->load->view('admin/gallery',$data); 
                 $this->load->view('templates/admin_footer');
                 
				 }else{
				 $data['error'] = "You have already added this event";
				  $this->load->view('templates/admin_header', $data);
				  $this->load->view('admin/create_event',$data);
                  $this->load->view('templates/admin_footer');
				  
				 }
                }	  

    }
}



public function edit_event($id=NULL)
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Edit event';
	$data['error'] = '';
	$data['item']=$this->admin_model->get_event($id);
	$data['item']['url']=$this->config->config['base_url'].'gallery_files/'.$data['item']['image'];
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_event',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	
	$url="/gallery?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload() && $_FILES['file']['name']!="")
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_event',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['image']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Event Gallery"; 
                 $done=$this->admin_model->set_event($id);
				
				 $data['galleries']=$this->admin_model->get_event();
				 $this->load->view('templates/admin_header', $data);
                 $this->load->view('admin/gallery',$data); 
				 $this->load->view('templates/admin_footer',$data); 
				 
                }	  

    }
}


public function delete_event($id=NULL)
{
$data['title'] = 'Event Gallery';
 $done=$this->admin_model->delete_event($id);
 //var_dump($this->config->config['home_dir']);
//var_dump($done);
 if($done){
 $data['error']='';
 }else{
 $data['error']='Event could not be deleted';
 }
 $data['galleries']=$this->admin_model->get_event();
 $this->load->view('templates/admin_header', $data);
 $this->load->view('admin/gallery',$data); 
 $this->load->view('templates/admin_footer',$data);    
   
 }
 
 public function delete_subpage($id=NULL)
{
$data['title'] = 'Pages';
 $done=$this->admin_model->delete_subpage($id);
$this->list_pages();    
   
 }

 
 public function delete_news($id=NULL)
{
$data['title'] = 'News';
$_POST['id']=$id;
 $done=$this->news_model->delete_news();

 if($done){
 $data['error']='';
 }else{
 $data['error']='News could not be deleted';
 }
 $data['news']=$this->news_model->get_news();
 $this->load->view('templates/admin_header', $data);
 $this->load->view('admin/news',$data); 
 $this->load->view('templates/admin_footer',$data);    
   
 }





public function create_banner()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add banner';
	$data['error'] = '';
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_banner',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$url="/banner?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload())
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_banner',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['url']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Banners"; 
                 $done=$this->admin_model->set_banner();
				 if($done){
				 $data['banners']=$this->admin_model->get_banner();
                 $this->list_banners();//load->view('admin/banners',$data); 
				 }else{
				 $data['error'] = "You have already added this banner";
				 $this->load->view('templates/admin_header',$data);
				 $this->load->view('admin/create_banner',$data);
                 $this->load->view('templates/admin_footer',$data);				 
				 }
                }	  

    }
}



public function edit_banner($id=NULL)
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Edit banner';
	$data['error'] = '';
	$data['item']=$this->admin_model->get_banner($id);
	$data['item']['url']=$this->config->config['base_url'].'banner_files/'.$data['item']['url'];
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_banner',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	
	$url="/banner?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 1000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	
	//var_dump($_FILES);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload() && $_FILES['file']['name']!="")
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_banner',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 //var_dump($detail);
				 $_POST['url']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Banners"; 
                 $done=$this->admin_model->set_banner($id);
				
				 $data['banners']=$this->admin_model->get_banner();
				 $this->load->view('templates/admin_header', $data);
                 $this->load->view('admin/banners',$data); 
				 $this->load->view('templates/admin_footer',$data); 
				 
                }	  

    }
}


public function delete_banner($id=NULL)
{
$data['title'] = 'Home page banner';
 $done=$this->admin_model->delete_banner($id);
 //var_dump($this->config->config['home_dir']);
//var_dump($done);
 if($done){
 $data['error']='';
 }else{
 $data['error']='Banner could not be deleted';
 }
 $data['banners']=$this->admin_model->get_banner();
 $this->load->view('templates/admin_header', $data);
 $this->load->view('admin/banners',$data); 
 $this->load->view('templates/admin_footer',$data);    
   
 }
 
 public function delete_department($id=NULL)
{
 $done=$this->admin_model->delete_department($id);
  header('location:'.$this->config->config['base_url'].'myadmin/schools'); 
 }
 
 
 public function create_document()
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Add document';
	$data['error'] = '';
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_document',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$url="/document?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'pdf|doc|docx';
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
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_document',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['url']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Documents"; 
                 $done=$this->admin_model->set_document();
				 if($done){
				 $data['documents']=$this->admin_model->get_document();
                 $this->load->view('admin/documents',$data); 
				 }else{
				 $data['error'] = "You have already added this document";
				 $this->load->view('admin/create_document',$data); 
				 }
                }	  

    }
}



public function edit_document($id=NULL)
{
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Edit document';
	$data['error'] = '';
	$data['item']=$this->admin_model->get_document($id);
	$data['item']['url']=$this->config->config['base_url'].'document_files/'.$data['item']['url'];
	if(!isset($_POST['create']) ){
	$this->form_validation->set_rules('label', 'Title', 'required');
    }

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_document',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	
	$url="/document?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'pdf|doc|docx';
    $config['max_size']             = 10000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload() && $_FILES['file']['name']!="")
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['label'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_document',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['url']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Documents"; 
                 $done=$this->admin_model->set_document($id);
				
				 $data['documents']=$this->admin_model->get_document();
				 $this->load->view('templates/admin_header', $data);
                 $this->load->view('admin/documents',$data); 
				 $this->load->view('templates/admin_footer',$data); 
				 
                }	  

    }
}


public function delete_document($id=NULL)
{
$data['title'] = 'Documents';
 $done=$this->admin_model->delete_document($id);
 //var_dump($this->config->config['home_dir']);
//var_dump($done);
 if($done){
 $data['error']='';
 }else{
 $data['error']='Document could not be deleted';
 }
 $data['documents']=$this->admin_model->get_document();
 $this->load->view('templates/admin_header', $data);
 $this->load->view('admin/documents',$data); 
 $this->load->view('templates/admin_footer',$data);    
   
 }
 
public function edit_news($id=null)
{

$this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Edit news item';
	$data['error'] = '';
	$data['title'] = 'Edit news item';
    $data['item']=$this->news_model->get_news_by_id($id);

	if(!isset($_POST['edit']) ){
	$this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('text', 'Body', 'required');
    }
	//var_dump($_FILES['file']);

    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_news',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$new=explode("</p>",$_POST['text']);
	$_POST['text']=count($new>1)?$new[1]:$new[0];
	
	$url="/news?";
	$field_name = "file";
	$config['upload_path']          = $url;	  
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 2000;
   // $config['min_width']            = 1024;
   // $config['min_height']           = 768;				
	//var_dump($_FILES);exit;
	//var_dump($config);
	$this->load->library('upload', $config);             
    if ( ! $this->upload->do_upload() && $_FILES['file']['name']!="")
       {
               $error = array('error' => $this->upload->display_errors());
			   $data['error']=$error['error'];
			   $data['label']=$_POST['title'];
			    $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_news',$data);
        $this->load->view('templates/admin_footer');
                }
                else
                {
				//var_dump($this->upload->data());
				 $detail = array('upload_data' => $this->upload->data());
				 $_POST['image']=$detail["upload_data"]["file_name"];
				 
                 $data['done'] = true; 
	             $data['title'] = "Edit News"; 
				 $_POST['id']=$id;
                 $done=$this->news_model->update_news();
				
				 $data['news']=$this->news_model->get_news();
				 $this->load->view('templates/admin_header', $data);
                 $this->load->view('admin/news',$data); 
				 $this->load->view('templates/admin_footer',$data); 
				 
                }	  

    }	
   
	
    
}

public function list_news(){
$this->load->helper('form');
 $data['title'] = 'news page';
$data['news']=$this->news_model->get_news();
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/news');
        $this->load->view('templates/admin_footer');
}

public function list_pages(){
$this->load->helper('form');
 $data['title'] = 'All pages';
$data['pages']=$this->admin_model->get_page();
if($data['pages']!=null){
$i=0;
foreach($data['pages'] as $page){
$data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
$i++;
}
}
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/pages');
        $this->load->view('templates/admin_footer');
}

/*
public function list_users(){
 $this->load->helper('form');
 $data['title'] = 'All users';
 $data['users']=$this->admin_model->get_user();

        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/users');
        $this->load->view('templates/admin_footer');
}
*/

public function list_schools(){
$this->load->helper('form');
 $data['title'] = 'Schools';
$data['schools']=$this->admin_model->get_school();
if($data['schools']!=null){
$i=0;
foreach($data['schools'] as $school){
$data['schools'][$i]['departments']=$this->admin_model->get_department($school['id']);
$i++;
}
}
//var_dump($data); exit;
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/schools',$data);
        $this->load->view('templates/admin_footer');
}

public function list_forms(){
$this->load->helper('form');
 $data['title'] = 'Forms';
$data['forms']=$this->admin_model->get_form();
//var_dump($data); exit;
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/forms',$data);
        $this->load->view('templates/admin_footer');
}

public function list_banners(){
$this->load->helper('form');
$data['title'] = 'Home page banners';
$data['error']='';

$data['banners']=$this->admin_model->get_banner();
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/banners');
        $this->load->view('templates/admin_footer');
}

public function list_documents(){
$this->load->helper('form');
$data['title'] = 'Documents';
$data['error']='';

$data['documents']=$this->admin_model->get_document();
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/documents');
        $this->load->view('templates/admin_footer');
}

public function list_events(){
$this->load->helper('form');
$data['title'] = 'Event gallery';
$data['error']='';

$data['galleries']=$this->admin_model->get_event();
$this->load->view('templates/admin_header', $data);
        $this->load->view('admin/gallery');
        $this->load->view('templates/admin_footer');
}



public function create_department(){
return $this->create_school(true);
}

public function create_school($subpage=null)
{
//var_dump($_POST);
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Create School';

    if($subpage){
	$this->form_validation->set_rules('title', 'department', 'required');
	$data['title'] = 'Create department';
	$data['error'] = '';
	$data['schools'] =$this->admin_model->get_school();
	}

	$this->form_validation->set_rules('title', 'school', 'required');
    //$this->form_validation->set_rules('body', 'Body', 'required');
	
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		if($subpage)
        $this->load->view('admin/create_department');
		else
		$this->load->view('admin/create_school');
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('preview')!=null){
	$data['pages']=$this->admin_model->get_page();
    if($data['pages']!=null){
    $i=0;
    foreach($data['pages'] as $page){
    $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
    $i++;
    }
   }
	
	$data['title'] = $this->input->post('title'); 
	$data['body'] = $this->input->post('body'); 
	$this->load->view('templates/header', $data);
	//open another tab/window
    $this->load->view('admin/preview',$data);
    $this->load->view('templates/admin_footer');
	}else{
	   $this->load->view('templates/admin_header', $data);
	   if($subpage){
	   $data['title'] = "The department has been successfully added"; 
       $done=$this->admin_model->add_department();
	   }else{
	   $data['title'] = "The school has been successfully added"; 
       $done=$this->admin_model->add_school();
	   }
	//var_dump($done); exit;
	   if($done){
	   header('location:schools');
       //$this->list_schools();
	   }else{
	   if($subpage){
	   $data['title'] = "Create department"; 
	   $data['error']="The department already exist";
	   $this->load->view('admin/create_department',$data);
	   }else{
	    $data['title'] = "Create school"; 
	   $data['error']="The school already exist";
	   $this->load->view('admin/create_school',$data);
	   }
	   }
	   $this->load->view('templates/admin_footer');
	}
   }		
}




public function create_form()
{
//var_dump($_POST);
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Create Form';
	$data['error']="";
	$this->form_validation->set_rules('title', 'title', 'required');
	$this->form_validation->set_rules('has_field', 'form fields', 'required');
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		$this->load->view('admin/create_form');
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('save_item')!=null){
	$this->load->view('templates/admin_header', $data);  
	   $data['title'] = "The form has been successfully updated"; 
       $done=$this->admin_model->save_form();
	   if($done){
	   header('location:forms');
	   }else{
	   $data['title'] = "Edit form"; 
	   $data['error']="The form could not be updated";
	   $this->load->view('admin/create_form',$data);
	   }
	   $this->load->view('templates/admin_footer');
	}else{
	   $this->load->view('templates/admin_header', $data);  
	   $data['title'] = "The form has been successfully added"; 
       $done=$this->admin_model->add_form();
	   if($done){
	   header('location:forms');
	   }else{
	   $data['title'] = "Create form"; 
	   $data['error']="The form already exist";
	   $this->load->view('admin/create_form',$data);
	   }
	   $this->load->view('templates/admin_footer');
	}
   }		
}


public function edit_form($form_id=null)
{
    $this->load->helper('form');
    $this->load->library('form_validation');
	$data['title'] = 'Edit form';	
	$data['error'] = '';
	//var_dump($this->input->post('id'));exit;
    $data['item']=$this->admin_model->get_form($this->input->post('id'));
	
    
	if(!isset($_POST['edit']) ){
	$this->form_validation->set_rules('title', 'Form title', 'required');
    }
	
	if(isset($_POST['delete'])){
	//var_dump($data['item']['id']);exit;
	$this->admin_model->delete_form($data['item']['id']);
	header('location:forms');
	}

	
     if ($this->form_validation->run() === FALSE)
    {
		//var_dump("here");
        $this->load->view('templates/admin_header', $data);
        $this->load->view('admin/create_form',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$data['done'] = true; 
	if($this->input->post('preview')!=null){
	$data['title'] = $this->input->post('title'); 
	//$data['body'] = $this->input->post('body'); 
	$data['pages']=$this->admin_model->get_page();
    if($data['pages']!=null){
    $i=0;
    foreach($data['pages'] as $page){
    $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
    $i++;
    }
    }
	$this->load->view('templates/admin_header', $data);
    $this->load->view('admin/preview',$data);
    $this->load->view('templates/admin_footer');
	}else{
	$data['title'] = "Form has been successfully updated"; 	
    $this->admin_model->save_form();	
	header('location:forms');
	}
    }     
}



public function create_subpage(){
return $this->create_page(true);
}

public function create_page($subpage=null)
{
//var_dump($_POST);
    $this->load->helper('form');
    $this->load->library('form_validation');
    $data['title'] = 'Create a new page';

    if($subpage){
	$this->form_validation->set_rules('parent', 'Parent Page', 'required');
	$data['title'] = 'Create a sub page';
	$data['error'] = '';
	$data['pages'] =$this->users_model->get_page();
	}

	$this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
	
    if ($this->form_validation->run() === FALSE)
    {
        $this->load->view('templates/admin_header', $data);
		if($subpage)
        $this->load->view('admin/create_subpage');
		else
		$this->load->view('admin/create_page');
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$done=false;
	$data['done'] = true; 	
	if($this->input->post('preview')!=null){
	$data['pages']=$this->admin_model->get_page();
    if($data['pages']!=null){
    $i=0;
    foreach($data['pages'] as $page){
    $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
    $i++;
    }
   }
	
	
	$data['title'] = $this->input->post('title'); 
	$data['body'] = $this->input->post('body'); 
	$this->load->view('templates/header', $data);
	//open another tab/window
    $this->load->view('admin/preview',$data);
    $this->load->view('templates/admin_footer');
	}else{
	   $this->load->view('templates/admin_header', $data);
	   if($subpage){
	   $data['title'] = "The subpage has been successfully added"; 
       $done=$this->admin_model->add_subpage();
	   }else{
	   $data['title'] = "The page has been successfully added"; 
       $done=$this->admin_model->add_page();
	   }
	
	   if($done){
       $this->load->view('admin/success',$data);
	   }else{
	    if($subpage){
	   $data['title'] = "Create subpage"; 
	   $data['error']="The subpage already exist";
	   $this->load->view('admin/create_subpage',$data);
	   }else{
	    $data['title'] = "Create page"; 
	   $data['error']="The page already exist";
	   $this->load->view('admin/create_page',$data);
	   }
	   
	   }
	   $this->load->view('templates/admin_footer');
	}
   }		
}









public function edit_subpage($parent_id=null,$child_id=null){
//var_dump($_POST);
if(isset($_POST['parent'])){
$parent_id=$_POST['parent']?$_POST['parent']:null;
$child_id=$_POST['id']?$_POST['id']:null;
}
if($parent_id!=null && $child_id!=null)
$this->edit_page(true,$parent_id,$child_id);
else
$this->list_pages();
}

public function edit_department($school_id=null,$dept_id=null){
//var_dump($_POST);
if(isset($_POST['school'])){
$school_id=$_POST['school']?$_POST['school']:null;
$dept_id=$_POST['id']?$_POST['id']:null;
}
if($school_id!=null && $dept_id!=null)
$this->edit_school(true,$school_id,$dept_id);
else
$this->list_schools();
}



public function edit_page($subpage=null,$parent_id=null,$child_id=null)
{
//var_dump($subpage);
//var_dump($_POST);
    $this->load->helper('form');
    $this->load->library('form_validation');
	$data['pages'] =$this->users_model->get_page();
	
	if($subpage)
	$data['title'] = 'Edit sub page';
	else
	$data['title'] = 'Edit page';
	
	$data['error'] = '';
    $data['item']=$this->admin_model->get_page($this->input->post('slug'));
	if($parent_id!=null && $child_id!=null)
	$data['item']=$this->admin_model->get_subpage($parent_id,$child_id);
    
	if(!isset($_POST['edit']) ){
	$this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('body', 'Body', 'required');
    }
	
	if(isset($_POST['delete'])){
	$this->admin_model->delete_page($data['item']['id']);
	//$this->list_pages();
	header('location:pages');
	}
	

	
     if ($this->form_validation->run() === FALSE)
    {
		//var_dump("here");
        $this->load->view('templates/admin_header', $data);
		if($subpage)
		$this->load->view('admin/create_subpage',$data);
		else
        $this->load->view('admin/create_page',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$data['done'] = true; 

	if($this->input->post('preview')!=null){
	$data['title'] = $this->input->post('title'); 
	$data['body'] = $this->input->post('body'); 
	$data['pages']=$this->admin_model->get_page();
    if($data['pages']!=null){
    $i=0;
    foreach($data['pages'] as $page){
    $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
    $i++;
    }
    }
	
	$this->load->view('templates/admin_header', $data);
	//open another tab/window
    $this->load->view('admin/preview',$data);
    $this->load->view('templates/admin_footer');
	}else{
	$data['title'] = "The page has been successfully updated"; 
	if($subpage){
	$_POST['parent_id']=$_POST['parent'];
	$this->admin_model->update_subpage();
	$_POST['id']=$child_id;
	}else{
    $this->admin_model->update_page();
	}
	$this->list_pages();
	}
    }       
}








public function edit_school($subpage=null,$school_id=null,$dept_id=null)
{
//var_dump($subpage);
//var_dump($_POST);
    $this->load->helper('form');
    $this->load->library('form_validation');
	$data['schools'] =$this->admin_model->get_school();
	
	if($subpage)
	$data['title'] = 'Edit department';
	else
	$data['title'] = 'Edit school';
	
	$data['error'] = '';
    $data['item']=$this->admin_model->get_school($this->input->post('slug'));
	if($school_id!=null && $dept_id!=null)
	$data['item']=$this->admin_model->get_department($school_id,$dept_id);
    
	if(!isset($_POST['edit']) ){
	$this->form_validation->set_rules('title', 'name ', 'required');
    //$this->form_validation->set_rules('body', 'Body', 'required');
    }
	
	if(isset($_POST['delete'])){
	$this->admin_model->delete_school($data['item']['id']);
	//$this->list_schools();
	header('location:schools');
	}

	
     if ($this->form_validation->run() === FALSE)
    {
		//var_dump("here");
        $this->load->view('templates/admin_header', $data);
		if($subpage)
		$this->load->view('admin/create_department',$data);
		else
        $this->load->view('admin/create_school',$data);
        $this->load->view('templates/admin_footer');
    }
    else
    {
	$data['done'] = true; 
	if($this->input->post('preview')!=null){
	$data['title'] = $this->input->post('title'); 
	//$data['body'] = $this->input->post('body'); 
	$data['pages']=$this->admin_model->get_page();
    if($data['pages']!=null){
    $i=0;
    foreach($data['pages'] as $page){
    $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($page['id']);
    $i++;
    }
    }
	$this->load->view('templates/admin_header', $data);
	//open another tab/window
    $this->load->view('admin/preview',$data);
    $this->load->view('templates/admin_footer');
	}else{
	$data['title'] = "School has been successfully updated"; 
	if($subpage){
	$_POST['school_id']=$_POST['school'];
	$this->admin_model->update_department();
	$_POST['id']=$dept_id;
	}else{
    $this->admin_model->update_school();
	}
	header('location:schools');
	//$this->list_schools();
	}
    }     
}


public function get_prend_status($year){
return $this->admin_model->get_prend_status($year);
}

public function get_putme_status($year){
return $this->admin_model->get_putme_status($year);
}

public function open_prend_application(){
if($this->input->post('open')!=null){
$done=$this->admin_model->open_prend_application("open");
}else if($this->input->post('close')!=null){
$done=$this->admin_model->open_prend_application("closed");
}
header('location:prend');
}

public function open_putme_application(){
if($this->input->post('open')!=null){
$done=$this->admin_model->open_putme_application("open");
}else if($this->input->post('close')!=null){
$done=$this->admin_model->open_putme_application("closed");
}
header('location:postutme');
}


		function send_link(){
		//$sender=$_POST['sender'];
		//var_dump($email);
		//var_dump($hash); exit;
		$email="oaadedayo@gmail.com";
		$hash="zs123Erggsjsk";
		$form="putme";
		
		$sender="admin@fedpolel.edu.ng";
		$from="admin@fedpolel.edu.ng";
		$to=$email;
		if($form=="putme")
		$message="Your Post UTME registration has been received click on this link  <a href='http:fedpolel.edu.ng/prend/".$hash."' >http://fedpolel.udu.ng/putme/".$hash."</a> to print your registration detail";
		else
		$message="Your Pre-ND registration has been received click on this link  <a href='http:fedpolel.edu.ng/prend/".$hash."' >http://fedpolel.udu.ng/prend/".$hash."</a> to print your registration detail";
	
	    $message="<h2>From: ".$sender."</h2><br/>".$message;
	    $mail_options = array("sender" => $from,
        "to" => $to,
        "subject" => "Federal Polytechnic Ile-Oluji",
		"textBody" => $message);
	
        $subject = "Federal Polytechnic Ile-Oluji";

        $body = $message;
        date_default_timezone_set('Africa/Lagos');
        $boundary =md5(date('r', time())); 

        $headers = "From: admin@fedpolel.edu.ng\r\nReply-To: admin@fedpolel.edu.ng";
        $headers .= "\r\nMIME-Version: 1.0\r\nContent-Type: multipart/mixed; boundary=\"_1_$boundary\"";

		$body=$message;
		/*
        $body="
--_1_$boundary
Content-Type: multipart/alternative; boundary=\"_2_$boundary\"

--_2_$boundary

Content-Type: text/plain; charset=\"iso-8859-1\"
Content-Transfer-Encoding: 7bit

$body

--_2_$boundary--
--_1_$boundary
Content-Type: application/octet-stream; name=\"$filename\" 
Content-Transfer-Encoding: base64 
Content-Disposition: attachment 

$attachment
--_1_$boundary--";
*/

try {
    @mail($to, $subject, $body, $headers);
echo "sent"; exit;
} catch (InvalidArgumentException $e) {
//var_dump("no");
 //return false;
 echo "Not sent"; exit;
}    
	
}

function add_user($subpage=null){
$users=new Users();
return $users->add_user($subpage);
}



function list_users(){
$users=new Users();
return $users->list_users();
}

function partnership_requests(){
$users=new Outlet();
return $users->list_partnership_requests();
}

function entitlement_requests(){
$users=new Users();
return $users->list_entitlement_requests();
}

function search_user(){
$users=new Users();
return $users->search_user($this->input->post('search'));
}

function add_pcategory(){
//var_dump("hello"); exit;
$product=new Products();
return $product->add_pcategory(); 
}

function add_product(){
$product=new Products();
return $product->add_product(); 
}

public function list_pcategory(){
$product=new Products();
return $product->list_pcategory();
}

public function list_products(){
$product=new Products();
return $product->list_products();
}

function add_acategory(){
$user=new Users();
return $user->add_acategory(); 
}


public function list_acategory(){
$user=new Users();
return $user->list_acategory();
}



function add_outlet(){
$outlet=new Outlets();
return $outlet->add_outlet(); 
}


public function list_outlets(){
$outlet=new Outlets();
return $outlet->list_outlets();
}

}
