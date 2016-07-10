<?php
class Product_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		


public function get_product($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('products');
                return $query->result_array();
        }
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
}

public function get_product_by_slug($slug)
{

        $query = $this->db->get_where('products', array('slug' => $slug));
        return $query->row_array();
}

public function get_product_by_category($cat)
{
        if($cat=="all"){
		$query = $this->db->get('products');
		}else{
		$c= $this->db->get_where('product_category', array('name' => $cat));
		$c=$c->row_array();
		//var_dump($c);exit;
        $query = $this->db->get_where('products', array('pcategory' => $c['pcat_id']));
        return $query->result_array();
		}
}


public function get_pcategory($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('product_category');
                return $query->result_array();
        }
        $query = $this->db->get_where('product_category', array('pcat_id' => $id));
        return $query->row_array();
}


public function add_pcategory()
{
    $this->load->helper('url');
    unset($_POST['add_pcategory']);
	$data=array();
	foreach($_POST as $key=>$value)
    $data[$key]=$value;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
    $query = $this->db->get_where('product_category', $data);
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
    return $this->db->insert('product_category', $data);
}

public function add_product()
{
    $this->load->helper('url');
    unset($_POST['add_product']);
	$slug = url_title($this->input->post('p_name'), 'dash', TRUE);
	$data=array();
	$sql="CREATE TABLE products (id INT(10) AUTO_INCREMENT,";
	foreach($_POST as $key=>$value){
	$sql.=$key." VARCHAR(255), ";
	if($key=="outlets")
	$value=implode(",",$value);
    $data[$key]=$value;
	}
	$sql.=" date_added VARCHAR (100), PRIMARY KEY (ID) );";
	//var_dump($this->db->query($sql)); exit;
	
	$data['slug']=$slug;
    $query = $this->db->get_where('products', $data);
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
    return $this->db->insert('products', $data);
}

public function save_pcategory()
{
    $this->load->helper('url');
	$id=$this->input->post('id');
    unset($_POST['save_pcategory']);
	$data=array();
	foreach($_POST as $key=>$value){
    $data[$key]=$value;
	}
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	
	$this->db->where('pcat_id', $this->input->post('pcat_id'));
    return $this->db->update('product_category', $data);
}

public function save_product()
{
    $this->load->helper('url');
		$slug = url_title($this->input->post('p_name'), 'dash', TRUE);
	$id=$this->input->post('id');
    unset($_POST['save_product']);
	//if(!isset($_POST['file']) && $_POST['file']=="")
	//unset($_POST['file']);
	
	$data=array();
	foreach($_POST as $key=>$value){
	if($key=="outlets")
	$value=implode(",",$value);
    $data[$key]=$value;
	}
	date_default_timezone_set('Africa/Lagos');
    $data['date_added']=date("d/m/Y h:i:s");
	$data['slug']=$slug;
	if(isset($_POST['file']) && $_POST['file']!=""){
	 $query = $this->db->get_where('products', array('id' => $id));
     $dat = $query->row_array();
	 @unlink("product_files/".$dat["file"]);
	}
	
	$this->db->where('id', $this->input->post('id'));
    return $this->db->update('products', $data);
}

public function delete_pcategory($id)
{
	$this->db->where('pcat_id', $id);
    return $this->db->delete('product_category');
}

public function delete_product($id)
{
	
	 $query = $this->db->get_where('products', array('id' => $id));
     $data = $query->row_array();
	 @unlink("product_files/".$data["file"]);
	 $this->db->where('id', $id);
     return $this->db->delete('products');
}

}