<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
				if(!isset($_SESSION))
				session_start();
                $this->load->model('news_model');
				$this->load->model('users_model');
				$this->load->model('admin_model');
        }

        public function index()
        {
		$data['news'] = $this->news_model->get_news();
        $data['title'] = 'News archive';
        
		$data['pages']=$this->admin_model->get_page();
        if($data['pages']!=null){
        $i=0;
        foreach($data['pages'] as $pg){
        $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($pg['id']);
        $i++;
        }
        }
		
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');
        }

     public function view($slug = NULL)
{
        $data['news_item'] = $this->news_model->get_news($slug);

        if (empty($data['news_item']))
        {
                show_404();
        }

        $data['title'] = $data['news_item']['title'];
       $data['news'] = $this->news_model->get_news();
	   $data['pages']=$this->admin_model->get_page();
        if($data['pages']!=null){
        $i=0;
        foreach($data['pages'] as $pg){
        $data['pages'][$i]['sub_pages']=$this->admin_model->get_subpage($pg['id']);
        $i++;
        }
        }
	   
        $this->load->view('templates/header', $data);
        $this->load->view('news/detail', $data);
        $this->load->view('templates/footer');
      }
}