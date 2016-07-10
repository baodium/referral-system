<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
		public function get_news($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('slug' => $slug));
        return $query->row_array();
}

public function get_news_by_id($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('news');
                return $query->result_array();
        }

        $query = $this->db->get_where('news', array('id' => $id));
        return $query->row_array();
}

public function get_gallery($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('image_gallery');
                return $query->result_array();
        }

        $query = $this->db->get_where('image_gallery', array('id' => $id));
        return $query->row_array();
}

public function set_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text'),
		'image' => $this->input->post('image')
    );

    return $this->db->insert('news', $data);
}

public function update_news()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    if($this->input->post('image')!=""){
    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'image'=>$this->input->post('image'),
        'text' => $this->input->post('text')
    );
	}else{
	 $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'text' => $this->input->post('text')
    );
	}
    $this->db->where('id', $this->input->post('id'));
   return $this->db->update('news', $data);
    
}

public function delete_news()
{
var_dump($this->input->post('id'));
 $query = $this->db->get_where('news', array('id' => $this->input->post('id')));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM news WHERE id='{$this->input->post('id')}' ");
 if(is_file($this->config->config['home_dir'].'/'.'news_files/'.$evt['image']) && $done)
 unlink( $this->config->config['home_dir'].'/news_files/'.$evt['image']);
 return $done;
    
}


}