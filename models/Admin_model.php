<?php
class Admin_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
		
public function admin_login()
{

        $query = $this->db->get_where('admin', array('username' => $this->input->post('username'),'password'=>$this->input->post('password')));
        return $query->row_array();
}

public function add_page()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body')
    );

    $query = $this->db->get_where('pages', array('slug'=>$slug));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
    return $this->db->insert('pages', $data);
}


public function add_school()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug
    );
	
	$query = $this->db->get_where('schools', array('slug'=>$slug));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
    return $this->db->insert('schools', $data);
}

public function add_form()
{
    $this->load->helper('url');
    $title = $this->input->post('title');
	//$title=str_ireplace(" ","_",$form)."_form";
	
   //var_dump($_POST); exit;
    $data = array();

	$query = $this->db->query("SELECT * FROM form_description WHERE title='{$title}' ");//, array('school_id' => $school_id));
    $fetched = $query->row_array();
	if($fetched!=null)
	return false;
	
	$query = $this->db->get('form_description');
    $total = count($query->result_array());
	$total+=1;
	
	$fields="";
	//var_dump($_POST);
	unset($_POST['title']);
	unset($_POST['create_item']);
	unset($_POST['has_field']);
	
	$textfield="";
	$textarea="";
	$checkbox="";
	$select="";
	
	foreach($_POST as $key=>$value){
	if(!in_array($key,$data)){
	$key=explode("&",$key);
	$data[]=$key[0];
	if($key[1]=="textfield")
	$textfield.=$key[0]."**";
	if($key[1]=="textarea")
	$textarea.=$key[0]."**";
	if($key[1]=="select")
	
	$select.=$key[0].(isset($key[2])?"&".$key[2]:"")."**";
	if($key[1]=="checkbox")
	$checkbox.=$key[0]."**";
	
	
	$fields.=$key[0]." VARCHAR (200),";
	}
	}
	
	$form="form_".$total;
	$d=array('form_name'=>$form,'title'=>$title,'textfield'=>$textfield,'select'=>$select,'checkbox'=>$checkbox,'textarea'=>$textarea);
	$done1= $this->db->insert('form_description', $d);
	$fields.=" hash VARCHAR(200), reg_date timestamp";

	$sql="CREATE TABLE {$form} ( id int(10) PRIMARY KEY AUTO_INCREMENT, ".$fields.");";
    $yes=$this->db->query($sql);
	if($yes)
    return true;
	return false;
}

public function save_form()
{
    $this->load->helper('url');
    $title = $this->input->post('title');
	//$title=str_ireplace(" ","_",$form)."";
	$fields="";
	$id=$this->input->post('id');
	//var_dump($_POST);
	//$form="form_".$id;
	$textfield="";
	$textarea="";
	$checkbox="";
	$select="";
	$file="";
	$id=$_POST['id'];
	$data=array();
	//var_dump($title);exit;
	unset($_POST['title']);
	unset($_POST['save_item']);
	unset($_POST['has_field']);
	unset($_POST['id']);

	foreach($_POST as $key=>$value){
	if(!in_array($key,$data)){
	$key=explode("&",$key);
	$data[]=$key[0];
	if($key[1]=="textfield")
	$textfield.=$key[0]."**";
	if($key[1]=="textarea")
	$textarea.=$key[0]."**";
	if($key[1]=="select")
	$select.=$key[0].(isset($key[2])?"&".$key[2]:"")."**";
	if($key[1]=="file")
	$file.=$key[0]."**";
	if($key[1]=="checkbox")
	$checkbox.=$key[0]."**";
	}
	}
	//var_dump($data);
	//var_dump($this->input->post('id')); exit;
	//$form="form_".$id;
	$d=array('title'=>$title,'textfield'=>$textfield,'select'=>$select,'checkbox'=>$checkbox,'textarea'=>$textarea,'file'=>$file);
	$this->db->where('id', $id);
    $done= $this->db->update('form_description', $d);
	if($done){
	$query=$this->db->query("SELECT * FROM form_description WHERE id='{$id}' ");
	$fields=$query->row_array();

	

	if($fields !=null){
	$que=@$this->db->query("SELECT * FROM ".$fields['form_name']."");
	$c=$que->row_array();
	$total=count($c);
	if($total>0){
	var_dump($total); exit;
	$total=($total-3);
	
	//var_dump($data); exit;
	foreach($data as $key=>$val){
	if($val!="" && $key+1 > $total){
	$d=@$this->db->query("ALTER TABLE ".$fields['form_name']." ADD ".$val." VARCHAR(200)");
	}
	}
	}
	
	}
	
	
	}
    
}

public function add_subpage()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	
	
    $data = array(
	    'parent_id' => $this->input->post('parent'),
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body')
    );
	$query = $this->db->get_where('sub_page', array('title'=>$data['title'],'parent_id'=>$data['parent_id']));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
    return $this->db->insert('sub_page', $data);
}

public function add_department()
{
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	
	
    $data = array(
	    'school_id' => $this->input->post('school'),
        'title' => $this->input->post('title'),
        'slug' => $slug);
	$query = $this->db->get_where('departments', array('title'=>$data['title'],'school_id'=>$data['school_id']));
	$fetched = $query->row_array();
	if($fetched!=null)
	return false;
    return $this->db->insert('departments', $data);
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



public function get_school($slug = FALSE)
{
        if ($slug === FALSE)
        {
                $query = $this->db->get('schools');
                return $query->result_array();
        }

        $query = $this->db->get_where('schools', array('slug' => $slug));
        return $query->row_array();
}

public function get_form($id = FALSE)
{
        if ($id === FALSE)
        {
                $query = $this->db->get('form_description');
                return $query->result_array();
        }
        $query=$this->db->query("SELECT * FROM form_description WHERE id='{$id}' OR form_name='{$id}' ");
        //$query = $this->db->get_where('form_description', array('id' => $id));
		//var_dump(); exit;
        return $query->row_array();
}

public function get_form_detail($form = FALSE)
{
        if ($form === FALSE)
        {
               return null;
        }

		$query=$this->db->query("SELECT * FROM {$form}  ");
		//var_dump($query->result_array()); exit;
		return $query->result_array();
}

public function get_form_name($id = FALSE)
{
        if ($id === FALSE)
        {
               return null;
        }

		$query=$this->db->query("SELECT title FROM form_description  WHERE form_name='{$id}'  ");
		return $query->row_array();
}


public function get_subpage($parent_id=null,$child_id=null)
{
        if($child_id!=null){
		//var_dump($parent_id);
		$query = $this->db->get_where('sub_page', array('id'=>$child_id));
		return $query->row_array();
		}else{
		$query = $this->db->get_where('sub_page', array('parent_id' => $parent_id));
        return $query->result_array();
		}
}

public function get_department($school_id=null,$dept_id=null)
{
        if($dept_id!=null){
		//var_dump($parent_id);
		$query = $this->db->get_where('departments', array('id'=>$dept_id));
		return $query->row_array();
		}elseif($school_id!=null){
		$query = $this->db->get_where('departments', array('school_id' => $school_id));
        return $query->result_array();
		}else{
		$query = $this->db->query('SELECT * FROM departments ');//, array('school_id' => $school_id));
        return $query->result_array();
		}
}

public function get_banner($id= FALSE)
{
        if ($id === FALSE)
        {
				$query = $this->db->query('SELECT * FROM banners ORDER BY date DESC');
                return $query->result_array();
        }

        $query = $this->db->get_where('banners', array('id' => $id));
        return $query->row_array();
}

public function get_document($id= FALSE)
{
        if ($id === FALSE)
        {
				$query = $this->db->query('SELECT * FROM documents ORDER BY date_added DESC');
                return $query->result_array();
        }

        $query = $this->db->get_where('documents', array('id' => $id));
        return $query->row_array();
}

public function get_event($id= FALSE)
{
        if ($id === FALSE)
        {
				$query = $this->db->query('SELECT * FROM image_gallery ORDER BY date_added DESC');
                return $query->result_array();
        }

        $query = $this->db->get_where('image_gallery', array('id' => $id));
        return $query->row_array();
}


public function set_banner($id= FALSE)
{

if($this->input->post('url')!=""){
  $data = array(
        'title' => $this->input->post('label'),
        'url' => $this->input->post('url')
    );
}else{
$data = array(
        'title' => $this->input->post('label'),
    );
}
        if ($id === FALSE)
        {
		$query = $this->db->get_where('banners', array('title'=>$data['title']));
	 $fetched = $query->row_array();
	 if($fetched!=null)
	 return false;
     return $this->db->insert('banners', $data);        
        }
		$this->db->where('id', $this->input->post('id'));
        return $this->db->update('banners', $data);
     
}

public function set_document($id= FALSE)
{

if($this->input->post('url')!=""){
  $data = array(
        'title' => $this->input->post('label'),
        'url' => $this->input->post('url')
    );
}else{
$data = array(
        'title' => $this->input->post('label'),
    );
}
        if ($id === FALSE)
        {
		$query = $this->db->get_where('documents', array('title'=>$data['title']));
	 $fetched = $query->row_array();
	 if($fetched!=null)
	 return false;
     return $this->db->insert('documents', $data);        
        }
		$this->db->where('id', $this->input->post('id'));
        return $this->db->update('documents', $data);
     
}

public function set_event($id= FALSE)
{
if($this->input->post('image')!=""){
  $data = array(
        'title' => $this->input->post('label'),
        'image' => $this->input->post('image')
    );
}else{
$data = array(
        'title' => $this->input->post('label'),
    );
}
	//var_dump($data);
        if ($id === FALSE)
        {
	 $query = $this->db->get_where('image_gallery', array('title'=>$data['title']));
	 $fetched = $query->row_array();
	 if($fetched!=null)
	 return false;
     return $this->db->insert('image_gallery', $data);        
        }
		$this->db->where('id', $this->input->post('id'));
        return $this->db->update('image_gallery', $data);
     
}

public function delete_banner($id= FALSE)
{
 $query = $this->db->get_where('banners', array('id' => $id));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM banners WHERE id='{$id}' ");
 if(is_file($this->config->config['home_dir'].'/'.'banner_files/'.$evt['url']) && $done)
 unlink( $this->config->config['home_dir'].'/banner_files/'.$evt['url']);
 return $done;
}

public function delete_form($id= FALSE)
{
//$form="form_".$id;
//var_dump($id);exit;
 $query = $this->db->get_where('form_description', array('id' => $id));
 $form=$query->row_array();
 $form=$form['form_name'];
 //var_dump($form);exit;
 
 $done = $this->db->query("DELETE FROM form_description WHERE id='{$id}' ");
 $done = $this->db->query("DROP TABLE ".$form);
 return $done;
}

public function delete_document($id= FALSE)
{
 $query = $this->db->get_where('documents', array('id' => $id));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM documents WHERE id='{$id}' ");
 if(is_file($this->config->config['home_dir'].'/'.'document_files/'.$evt['url']) && $done)
 unlink( $this->config->config['home_dir'].'/document_files/'.$evt['url']);
 return $done;
}

public function delete_page($id= FALSE)
{
 $query = $this->db->get_where('pages', array('id' => $id));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM pages WHERE id='{$id}' ");
 return $done;
}

public function delete_subpage($id= FALSE)
{
 $done = $this->db->query("DELETE FROM sub_page WHERE id='{$id}' ");
 return $done;
}

public function delete_school($id= FALSE)
{
 $query = $this->db->get_where('schools', array('id' => $id));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM schools WHERE id='{$id}' ");
 return $done;
}


public function delete_department($id= FALSE)
{
//var_dump($id);
 $query = $this->db->get_where('departments', array('id' => $id));
 $evt=$query->row_array();
 $done = $this->db->query("DELETE FROM departments WHERE id='{$id}' ");
 return $done;
}

public function delete_event($id= FALSE)
{
 $query = $this->db->get_where('image_gallery', array('id' => $id));
 $evt=$query->row_array();
 //var_dump($evt);
 $done = $this->db->query("DELETE FROM image_gallery WHERE id='{$id}' ");
 if(is_file($this->config->config['home_dir'].'/'.'gallery_files/'.$evt['image']) && $done)
 unlink( $this->config->config['home_dir'].'/gallery_files/'.$evt['image']);
 return $done;
}



public function update_page()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
        'body' => $this->input->post('body')
    );
    $this->db->where('id', $this->input->post('id'));
   return $this->db->update('pages', $data);
    
}

public function update_school()
{
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug);
    $this->db->where('id', $this->input->post('id'));
   return $this->db->update('schools', $data);
    
}

public function update_subpage()
{
//var_dump($_POST);exit;
    $this->load->helper('url');

    $slug = url_title($this->input->post('title'), 'dash', TRUE);

    $data = array(
        'title' => $this->input->post('title'),
        'slug' => $slug,
		'parent_id' => $this->input->post('parent_id'),
        'body' => $this->input->post('body')
    );
   $this->db->where('id', $this->input->post('id'));
   return $this->db->update('sub_page', $data);   
}

public function update_department()
{//var_dump($_POST);exit;
    $this->load->helper('url');
    $slug = url_title($this->input->post('title'), 'dash', TRUE);
    $data = array(
        'title' => $this->input->post('title'),
		'school_id'=>$this->input->post('school_id'),
        'slug' => $slug
    );
   $this->db->where('id', $this->input->post('id'));
   return $this->db->update('departments', $data);   
}

public function open_prend_application($status)
{//var_dump($_POST);exit;
    $data = array(
        'year' => $this->input->post('year'),
		'status'=>$status
    );
   $this->db->where('id', "1");
   return $this->db->update('prend_application', $data);   
}

public function open_putme_application($status)
{//var_dump($_POST);exit;
    $data = array(
        'year' => $this->input->post('year'),
		'status'=>$status
    );
   $this->db->where('id', "1");
   return $this->db->update('putme_application', $data);   
}

public function get_prend_status($year){
$curr=$this->db->query("SELECT * FROM prend_application WHERE year='{$year}' ");
$curr=$curr->result_array();
if($curr==null)
return "closed";
return $curr[0]['status'];
}

public function get_putme_status($year){
$curr=$this->db->query("SELECT * FROM putme_application WHERE year='{$year}' ");
$curr=$curr->result_array();
if($curr==null)
return "closed";
return $curr[0]['status'];
}

}